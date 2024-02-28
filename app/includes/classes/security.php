<?php
/*********************************************
	MOO CMS, Copyright (c) 2005 The MOO Dev. Group. All rights reserved.

	This source file is free software; you can redistribute it and/or
	modify it under the terms of the MOO Public License as published
	by the MOO Development Group; either version 1 of the License, or
	(at your option) any later version.

  $Source: /cvs/html/includes/classes/security.php,v $
  $Revision: 9.35 $
  $Author: djmaze $
  $Date: 2007/03/17 15:55:45 $
**********************************************/
/*
	ban_type: 0 = just ban a ip
	          1 = it's a bot
	          2 = email
	          3 = referer
	          4 = email and referer
	          5 = disallowed usernames
	          6 = MAC address
	          7 = flood ban
*/

class Security
{

	function init()
	{
		# Show error page if the http server sends an error
		if (isset($_SERVER['REDIRECT_STATUS']) && $_SERVER['REDIRECT_STATUS'] >= 400 && $_SERVER['REDIRECT_STATUS'] <= 503) {
			cpg_error('', $_SERVER['REDIRECT_STATUS']);
		}
		if (!empty($_SESSION['SECURITY']['banned'])) { cpg_error('', $_SESSION['SECURITY']['banned']); }
		global $MAIN_CFG, $SESS, $db, $prefix;
		# get the visitor IP
		$ip = Security::get_ip();
		# If not a member check for bot or ban
		if ($SESS->new) {
			$_SESSION['SECURITY']['banned'] = false;
			# is it a bot or a ban?
			if (strlen($ip) == 4) {
				list(,$ip4) = unpack('N',$ip);
				if ($result = $db->query('SELECT * FROM '.$prefix."_security WHERE ban_ipv4_s = $ip4 OR (ban_ipv4_s < $ip4 AND ban_ipv4_e >= $ip4) LIMIT 0,1", TRUE, TRUE)) {
					$row = $db->fetch_array($result, SQL_ASSOC);
					$db->free_result($result);
				}
				unset($ip4);
			}
			if (empty($row)) {
				$mac = (strlen($ip) == 16) ? ' OR ban_ipn=\''.$db->escape_binary(substr($ip,-8))."'" : '';
				$ipn = $db->escape_binary($ip);
				if ($result = $db->query('SELECT * FROM '.$prefix."_security WHERE ban_ipn='$ipn'$mac LIMIT 0,1", TRUE, TRUE)) {
					$row = $db->fetch_array($result, SQL_ASSOC);
					$db->free_result($result);
				}
				unset($ip,$ipn,$mac);
			}
			if (!empty($row)) {
				if ($row['ban_type'] == 1) {
					$agent = Security::_detectBot($row['ban_string']);
				} else {
					$_SESSION['SECURITY']['banned'] = 800;
				}
			}
			# is it a referer spam?
			if ($MAIN_CFG['_security']['referers'] && !$_SESSION['SECURITY']['banned'] &&
			    !empty($_SERVER['HTTP_REFERER']) &&
			    strpos($_SERVER['HTTP_REFERER'], $MAIN_CFG['server']['domain']) === false &&
			    !Security::check_domain($_SERVER['HTTP_REFERER']))
			{
				$_SESSION['SECURITY']['banned'] = 801;
			}
		}
		# Detect User-Agent and Operating System
		if (empty($_SESSION['SECURITY']['UA'])) {
			if (empty($agent) && !$_SESSION['SECURITY']['banned']) { $agent = Security::_identifyAgent(); }
			if (!empty($agent['bot'])) { $_SESSION['SECURITY']['nick'] = $agent['bot']; }
			$_SESSION['SECURITY']['UA'] = empty($agent['ua']) ? 'N/A' : $agent['ua'];
			$_SESSION['SECURITY']['OS'] = empty($agent['os']) ? 'N/A' : $agent['os'];
			$_SESSION['SECURITY']['UA_ENGINE'] = empty($agent['engine']) ? 'N/A' : $agent['engine'];
			if (empty($agent) && !$_SESSION['SECURITY']['banned'] && $MAIN_CFG['_security']['uas']) {
				$_SESSION['SECURITY']['banned'] = 802;
			}
		}

		define('SEARCHBOT', ($_SESSION['SECURITY']['UA'] == 'bot') ? $_SESSION['SECURITY']['nick'] : false);

		if (!empty($_SESSION['SECURITY']['banned'])) { cpg_error('', $_SESSION['SECURITY']['banned']); }
	}

	function check()
	{
		if ($_SESSION['SECURITY']['banned']) { return; }
		global $MAIN_CFG;
		# anti-flood protection
		if ($MAIN_CFG['_security']['flooding'] && SEARCHBOT != 'Google') {
			Security::_flood();
		}
	}

	function check_post()
	{
		if ($_SERVER['REQUEST_METHOD'] != 'POST') { return false; }
		global $module_name;
		if ($_SESSION['SECURITY']['page'] != $module_name) { cpg_error(_SEC_ERROR, _ERROR_BAD_LINK); }
		return true;
	}

	function check_domain($domain)
	{
        if (!preg_match('#[^\./]+\.[\w]+($|/)#', $domain)) { return false; }
		$domains = '';
		global $db, $prefix;
		if ($result = $db->query('SELECT ban_string FROM '.$prefix."_security WHERE ban_type IN (3,4)", TRUE, TRUE)) {
			while ($e = $db->fetch_array($result, SQL_NUM)) { $domains .= "|$e[0]"; }
		}
		if (empty($domains)) { return true; }
		return (preg_match('#('.str_replace('.', '\.', substr($domains,1).')#i'), $domain) < 1);
	}

	function check_email(&$email)
	{
		static $domains;
		if (strlen($email) < 6) return 0;
		$email = strtolower($email);
		# Although RFC 1035 doesn't allow 1 char subdomains we
		# allow it due to bug report 641
		if (!preg_match('#^[_\.\+0-9a-z-]+@(([a-z0-9]{1,25}\.)?[0-9a-z-]{2,63}\.[a-z]{2,6}(\.[a-z]{2,6})?)$#', $email, $domain)) {
			return -1;
		}
		if (empty($domains)) {
			$domains = 'domain.tld';
			global $db, $prefix;
			if ($result = $db->query('SELECT ban_string FROM '.$prefix."_security WHERE ban_type IN (2,4)", TRUE, TRUE)) {
				while ($e = $db->fetch_array($result, SQL_NUM)) { $domains .= "|$e[0]"; }
			}
			$domains = '#('.str_replace('.', '\.', $domains).')#i';
		}
		if (preg_match($domains, $domain[1], $match)) {
			$email = array($email, $match[1]);
			return -2;
		}
		return 1;
	}

	function get_ip()
	{
		static $visitor_ip;
		if (!empty($visitor_ip)) { return $visitor_ip; }
		$visitor_ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : $_ENV['REMOTE_ADDR'];
		$ips = array();
		if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] != 'unknown') {
			$ips = explode(', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
		}
		if (!empty($_SERVER['HTTP_CLIENT_IP']) && $_SERVER['HTTP_CLIENT_IP'] != 'unknown') {
			$ips[] = $_SERVER['HTTP_CLIENT_IP'];
		}
		for ($i = 0; $i < count($ips); $i++) {
			$ips[$i] = trim($ips[$i]);
			# IPv4
			if (strpos($ips[$i], '.') !== FALSE) {
				# check for a hybrid IPv4-compatible address
				$pos = strrpos($ips[$i], ':');
				if ($pos !== FALSE) { $ips[$i] = substr($ips[$i], $pos+1); }
				# Don't assign local network ip's
				if (preg_match('#^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$#', $ips[$i]) &&
				    !ereg('^(10|127.0.0|172.(1[6-9]|2[0-9]|3[0-1])|192\.168)\.', $ips[$i]))
				{
					$visitor_ip = $ips[$i];
					break;
				}
			}
			# IPv6
			else if (strpos($ips[$i], ':') !== FALSE) {
				# fix shortened ip's
				$c = substr_count($ips[$i], ':');
				if ($c < 7) { $ips[$i] = str_replace('::', str_pad('::', 9-$c, ':'), $ips[$i]); }
				if (preg_match('#^([0-9A-F]{0,4}:){7}[0-9A-F]{0,4}$#i', $ips[$i])) {
					$visitor_ip = $ips[$i];
					break;
				}
			}
		}
		if (!function_exists('inet_pton')) { require(CORE_PATH.'functions/inet.php'); }
		$visitor_ip = inet_pton($visitor_ip);
		return $visitor_ip;
	}

	function _flood()
	{
		global $db, $prefix;
		$ip = $db->escape_binary(Security::get_ip());
		$flood_time = $flood_count = 0;
		if (!empty($_SESSION['SECURITY']['flood_start'])) {
			$db->query('DELETE FROM '.$prefix.'_security_flood WHERE flood_time <= '.gmtime());
			unset($_SESSION['SECURITY']['flood_start']);
		}
		if (empty($_SESSION['SECURITY']['flood_time'])) {
			# try to load time from log
			if ($result = $db->query('SELECT * FROM '.$prefix."_security_flood WHERE flood_ip = '$ip/'")) {
				$row = $db->fetch_array($result, SQL_ASSOC);
				if (!empty($row)) {
					$flood_time = $row['flood_time'];
					$flood_count = $row['flood_count'];
				}
			}
		} else {
			$flood_time = $_SESSION['SECURITY']['flood_time'];
			$flood_count = $_SESSION['SECURITY']['flood_count'];
		}
		if ($flood_time > gmtime()) {
			# die with message and report
			++$flood_count;
			if ($flood_count <= 5) {
				Security::_flood_log($ip, $flood_count);
				if ($flood_count > 2 && $flood_count <= 5) {
					global $LNG;
					get_lang('errors');
					$flood_time = ($flood_count+1)*2;
					header($_SERVER['SERVER_PROTOCOL'].' 503 Service Unavailable');
					header('Retry-After: '.$flood_time);
					$msg = sprintf($LNG['_SECURITY_MSG']['_FLOOD'], $flood_time);
					if ($flood_count == 5) { $msg .= $LNG['_SECURITY_MSG']['Last_warning']; }
					cpg_error($msg, 'Flood Protection');
				}
			} else {
				if ($db->sql_count($prefix.'_security', "ban_ipn = '$ip' LIMIT 0,1") < 1) {
					$db->query('INSERT INTO '.$prefix."_security (ban_ipn, ban_type, ban_time, ban_details) VALUES ('$ip', '7', '".(gmtime()+86400)."', 'Flooding detected by User-Agent:\n{$_SERVER['HTTP_USER_AGENT']}')");
				}
				cpg_error('', 803);
			}
		} else {
			$flood_time = $_SESSION['SECURITY']['flood_time'] = 0;
			$flood_count = $_SESSION['SECURITY']['flood_count'] = 0;
		}
		Security::_flood_log($ip, $flood_count);
		unset($flood_time, $flood_count);
	}

	function _identifyAgent()
	{
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$data = array();
		$pattern = array(
			# Netscape
			'#^Mozilla/[34]\.[0-8]{1,2}( \[[a-zA-Z\-]{2,5}\])? \(([a-zA-Z0-9]+); [UI]#e',
			# Gecko family: Netscape, Firefox, Thunderbird, Camino, Galeon, Epiphany, Linspire, MultiZilla, K-Meleon, WebWasher, Mozilla
			'#^Mozilla/5\.0 \(([a-zA-Z0-9]+); U; (.*[^;])(; [a-zA-Z\-]{2,5})?; rv:[0-9\.]+.*?\) Gecko/[0-9]{8} .* (Firefox).*#e',
			'#^Mozilla/5\.0 \(([a-zA-Z0-9]+); U; (.*[^;])(; [a-zA-Z\-]{2,5})?; rv:[0-9\.]+.*?\) Gecko/[0-9]{8}( \(No IDN\))? ([a-zA-Z6\-]+)/[0-9\.]+.*#e',
			'#^Mozilla/5\.0 \(([a-zA-Z0-9]+); U; (.*[^;])(; [a-zA-Z\-]{2,5})?; rv:[0-9\.]+.*?\) Gecko/[0-9]{8}( \(No IDN\))?$#e',
			# Galeon
			'#^Mozilla/5\.0 (Galeon)/[0-9\.]+ \(([a-zA-Z0-9]+); (.*[^;]); U\)#e',
			# Konqueror
			'#^Mozilla/5\.0 \(compatible; (Konqueror)/[0-9\.\-rc]+; (i686 )?(Linux|FreeBSD).*#e',
			# Lynx
			'#^(Lynx)/2\.[0-9\.]+(rel|dev)[0-9\.]+ libwww-FM/.*#e',
			# Safari family: Safari, OmniWeb, Shiira, DEVONtech
			'#^Mozilla/5\.0 \(Macintosh; U; (PPC|Intel) Mac OS X; [a-zA-Z\-]{2,5}\) AppleWebKit/.*? \(KHTML, like Gecko.*?\) ([a-zA-Z]+)/.*#e',
			# w3m
			'#^(w3m)/[0-9\.]+#e',
			# Links
			'#^(Links) \([0-9]\.[a-z0-9]+; ([a-zA-Z]+) #e',
			# ELinks
			'#^(ELinks)/0\.[0-9]+ \([a-z]+; ([a-zA-Z]+) #e',
			# Voyager
			'#^Mozilla/4\.0 \(compatible; (Voyager); (AmigaOS).*#e',
			# Opera
			'#^(Opera)/[67]\.[0-9]{1,2} \((.*?); U\)[\ ]{1,2}\[[a-zA-Z\-]{2,5}\]#e', # Opera 6-7
			'#^(Opera)/[89]\.[0-9]{1,2} \((.*?); U; [a-zA-Z\-]{2,5}\)#e', # Opera 8-9
			'#^Mozilla/[45]\.0 \(compatible; MSIE [56]\.0; (.*?)\) (Opera) [567]\.[0-9]{1,2} \[[a-zA-Z\-]{2,5}\]#e', # Opera 6-7 faking IE
			'#^Mozilla/5\.0 \((.*?); U\) (Opera) [67]\.[0-9]{1,2} \[[a-zA-Z\-]{2,5}\]#e', # Opera 6-7 faking Gecko
			'#^Mozilla/4\.0 \(compatible; MSIE 6\.0; (.*?); [a-zA-Z\-]{2,5}\) (Opera) [89]\.[0-9]{1,2}#e', # Opera 8-9 faking IE
			'#^Mozilla/5\.0 \((.*?); U; [a-zA-Z\-]{2,5}\) (Opera) [89]\.[0-9]{1,2}#e', # Opera 8-9 faking Gecko
			# IE
			'#^Mozilla/4\.0 \([a-z]+; MSIE ([4567]\.0|5\.5)[b1]?(; .*[^;])?; (Windows) [A-Z0-9\ \.]+[;)](.*)?#e',
			'#^Mozilla/2\.0 \(compatible; MSIE ([34]\.0)[1]?(; .*[^;])?; (Windows) [A-Z0-9\ \.]+[;)](.*)?#e',
			'#^Mozilla/4\.0 \(compatible; MSIE 5\.[1-2][1-7]; Mac_PowerPC\)#e', # 5.: 13, 16, 17, 21, 22, 23
			# Dillo/0.8.5-i18n-misc
			'#^Dillo/[0-9\.]+.*#e',
			# mobile phones
			'#^KWC-[a-zA-Z0-9]+/[0-9\.]+ UP\.Browser/[0-9\.]+#e',
			'#^LG-[A-Z0-9]+ (.*?)Profile/MIDP-[12]#e',
			'#^Nokia[0-9i]+/[0-9\.]+ \([0-9\.]+\) (.*?)Profile/MIDP-[12]#e',
			'#^SAMSUNG-[A-Z0-9\-]+/[A-Z0-9]+ UP\.Browser/[0-9\.]+#e',
			'#^SonyEricsson[a-zA-Z0-9]+/[A-Z0-9]+ (.*?)Profile/MIDP-[12]#e',
			# PlayStation
			'#^Mozilla/4\.0 \(PSP \(PlayStation Portable\); 2\.00\)#e',
		);
 		$replacement = array(
			# Netscape
			'Security::_set_data(\'Netscape\', \'\\1\', \'Gecko\', \'\', $data)',
			# Gecko family
			'Security::_set_data(\'\\4\', \'\\2\', \'Gecko\', \'\', $data)',
			'Security::_set_data(\'\\5\', \'\\2\', \'Gecko\', \'\', $data)',
			'Security::_set_data(\'Mozilla\', \'\\2\', \'Gecko\', \'\', $data)',
			# Galeon
			'Security::_set_data(\'\\1\', \'\\3\', \'\', \'\', $data)',
			# Konqueror
			'Security::_set_data(\'\\1\', \'\\3\', \'KHTML\', \'\', $data)',
			# Lynx
			'Security::_set_data(\'\\1\', \'\', \'\', \'\', $data)',
			# Safari family
			'Security::_set_data(\'\\2\', \'Mac\', \'Safari\', \'\', $data)',
			# w3m
			'Security::_set_data(\'\\1\', \'\', \'\', \'\', $data)',
			# Links
			'Security::_set_data(\'\\1\', \'\\2\', \'\', \'\', $data)',
			# ELinks
			'Security::_set_data(\'\\1\', \'\\2\', \'\', \'\', $data)',
			# Voyager
			'Security::_set_data(\'\\1\', \'\\2\', \'\', \'\', $data)',
			# Opera
			'Security::_set_data(\'\\1\', \'\\2\', \'\', \'\', $data)',
			'Security::_set_data(\'\\2\', \'\\1\', \'\', \'\', $data)',
			'Security::_set_data(\'\\2\', \'\\1\', \'\', \'\', $data)',
			'Security::_set_data(\'\\1\', \'\\2\', \'\', \'\', $data)',
			'Security::_set_data(\'\\2\', \'\\1\', \'\', \'\', $data)',
			'Security::_set_data(\'\\2\', \'\\1\', \'\', \'\', $data)',
			# IE
			'Security::_set_data(\'MSIE\', \'\\3\', \'\', \'\\4\', $data)',
			'Security::_set_data(\'MSIE\', \'\\3\', \'\', \'\\4\', $data)',
			'Security::_set_data(\'MSIE\', \'Mac\', \'\', \'\\4\', $data)',
			# Dillo
			'Security::_set_data(\'Dillo\', \'Linux\', \'\', \'\', $data)',
			# mobile phones
			'Security::_set_data(\'WAP\', \'\', \'\', \'KWC\', $data)',
			'Security::_set_data(\'WAP\', \'\', \'\', \'LG\', $data)',
			'Security::_set_data(\'WAP\', \'\', \'\', \'Nokia\', $data)',
			'Security::_set_data(\'WAP\', \'\', \'\', \'SAMSUNG\', $data)',
			'Security::_set_data(\'WAP\', \'\', \'\', \'SonyEricsson\', $data)',
			# PlayStation
			'Security::_set_data(\'PlayStation\', \'\', \'\', \'Sony\', $data)',
		);
		preg_replace($pattern, $replacement, $agent);
		unset($pattern, $replacement);
		# If we didn't detect a valid browser check for a bot
		if (!isset($data['ua'])) { return Security::_detectBot(); }
		# Detect IE based browsers
		else if ($data['ua'] == 'MSIE') {
			preg_match_all('#(iRider|Crazy Browser|NetCaptor|Maxthon|Avant Browser)#s', $data['ext'], $regs);
			if (!empty($regs[0])) {
				$data['ua'] = str_replace(' Browser','',$regs[0][count($regs[0])-1]);
				$data['ext'] = '';
			}
		}
		preg_match('#(Win|Mac|Linux|FreeBSD|SunOS|IRIX|BeOS|OS/2|AIX|Amiga)#is', $data['os'], $regs);
		$data['os'] = $regs[0];
		if ($data['os'] == 'Win') $data['os'] = 'Windows';
		return $data;
	}
	function _set_data($ua, $os, $engine, $extra, &$data)
	{
		if (!empty($ua)) {
			$data = array(
				'ua' => $ua,
				'os' => $os,
				'engine' => empty($engine) ? $ua : $engine,
				'ext' => $extra
			);
		}
	}

	function _detectBot($where=false)
	{
		global $db, $prefix;
		$bot = false;
		# Identify bot by UA
		$where = ($where ? " WHERE agent_name LIKE '$where%'" : '');
		$result = $db->query('SELECT agent_name, agent_fullname FROM '.$prefix."_security_agents$where ORDER BY agent_name", TRUE, TRUE);
		while ($row = $db->fetch_array($result, SQL_NUM)) {
			if (empty($row[1])) { continue; }
			if (eregi(preg_quote($row[1]), $_SERVER['HTTP_USER_AGENT'])) {
				$bot = $row[0];
			} else if ($bot && empty($where)) {
				break;
			}
		}
		$db->free_result($result);
		return ($bot === false) ? false : array('ua' => 'bot', 'bot' => $bot, 'engine' => 'bot');
	}

	function _flood_log($ip, $times=0)
	{
		$timeout = (($times+1)*2)+gmtime();
		# maybe the UA doesn't accept cookies so we use another session log as well
		if (!isset($_SESSION['SECURITY']['flood_time'])) {
			global $db, $prefix;
			if ($db->query('INSERT INTO '.$prefix."_security_flood VALUES ('$ip/', '$timeout', '$times')", true) === NULL) {
				$db->query('UPDATE '.$prefix."_security_flood SET flood_time = '$timeout', flood_count = '$times' WHERE flood_ip = '$ip/'");
			}
			$_SESSION['SECURITY']['flood_start'] = true;
		}
		$_SESSION['SECURITY']['flood_time'] = $timeout;
		$_SESSION['SECURITY']['flood_count'] = $times;
	}

}

<?php
/*********************************************
  CPG Dragonfly™ CMS
  ********************************************
  Copyright © 2004 - 2006 by CPG-Nuke Dev Team
  http://dragonflycms.org

  Dragonfly is released under the terms and conditions
  of the GNU GPL version 2 or any later version

  $Source: /cvs/html/includes/functions/display.php,v $
  $Revision: 9.37 $
  $Author: nanocaiordo $
  $Date: 2007/01/29 23:53:14 $
**********************************************/

function public_message() { return ''; }
function get_theme() {
	static $theme;  // Thanks to steven111 at NukeCops for pointing to static vars
	if (isset($theme)) return $theme;
	if (isset($_GET['prevtheme'])) {
		$prevtheme = $_GET['prevtheme'];
		if (!ereg('^([a-zA-Z0-9_\-]+)$', $prevtheme)) { cpg_error(sprintf(_ERROR_BAD_CHAR,'theme'), _SEC_ERROR); }
	}
	global $userinfo, $MAIN_CFG, $CPG_SESS;
	if (!is_admin() && !$MAIN_CFG['member']['allowusertheme']) {
		$CPG_SESS['theme'] = $MAIN_CFG['global']['Default_Theme'];
	}
	if (isset($prevtheme) && file_exists("themes/$prevtheme/theme.php")) {
		$theme = $prevtheme;
	} else if (isset($CPG_SESS['theme']) && file_exists("themes/$CPG_SESS[theme]/theme.php")) {
		$theme = $CPG_SESS['theme'];
	} else if (is_user() && file_exists("themes/$userinfo[theme]/theme.php")) {
		$theme = $userinfo['theme'];
	} else if (file_exists('themes/'.$MAIN_CFG['global']['Default_Theme'].'/theme.php')) {
		$theme = $MAIN_CFG['global']['Default_Theme'];
	}
	$CPG_SESS['theme'] = empty($theme) ? 'default' : $theme;
	return $CPG_SESS['theme'];
}
function rss_content($url) {
	require_once(CORE_PATH.'classes/rss.php');
	if ($rss = CPG_RSS::read($url)) {
		$items =& $rss['items'];
		$site_link =& $rss['link'];
		$content = '';
		for ($i=0;$i<count($items);$i++) {
			$link = $items[$i]['link'];
			$title2 = $items[$i]['title'];
			$content .= "<strong><big>&middot;</big></strong> <a href=\"$link\" target=\"new\">$title2</a><br />\n";
		}
		if (!empty($site_link)) {
			$content .= "<br /><a href=\"$site_link\" target=\"_blank\"><b>"._HREADMORE.'</b></a>';
		}
		// The named character reference &apos; (the apostrophe, U+0027)
		// was introduced in XML 1.0 but does not appear in HTML. Authors
		// should therefore use &#39; instead of &apos; to work as expected
		// in HTML 4 user agents.
		$content = str_replace('&apos;', '&#039;', $content);
		return $content;
	}
	return false;
}
function blocks_visible($side, $special=false) {
	// $showblocks is a bitwise integer value where: 0=none, 1=left, 2=right
	// so 1+2 = 3 = both
	// blocks are swapped from left to right and right to left depending on language _TEXT_DIR
	// for example arabic is RTL so the left blocks are shown on the right
	global $showblocks, $MAIN_CFG;
	$side = strtolower($side[0]);
	if (!$special && defined('MEMBER_BLOCK')) {
		if (!$showblocks || !(blocks('l', true) || blocks('r', true))) return true;
		if (($showblocks == 1 && $side == 'l' && !blocks($side, true)) ||
		    ($showblocks == 2 && $side == 'r' && !blocks($side, true))) {
			return true;
		}
	}
	if (!$special && $side == 'l' && (defined('ADMIN_PAGES') && $MAIN_CFG['global']['admingraphic'] & 2)) {
		return true;
	}
	if (!$showblocks || isset($_GET['hideallblocks']) || !blocks($side, true)) {
		return false;
	}
	if ($side == 'l') {
		return ($showblocks & 1);
	} else if ($side == 'r') {
		return ($showblocks & 2);
	}
	return true;
}
function blocks($side, $count=false) {
	global $db, $prefix, $multilingual, $currentlang, $showblocks, $CLASS, $themeblockside, $module_name;
	static $blocks;
	$side = strtolower($side[0]);
	if (!$count) {
		if ($side == 'l') {
			$themeblockside = 'left';
		} else if ($side == 'r') {
			$themeblockside = 'right';
		}
		if (!defined('SPECIAL_BLOCKS') && ($showblocks == 0 || blocks_visible($side))) {
			if (defined('ADMIN_PAGES') && is_admin()) {
				require_once(CORE_PATH.'classes/cpg_adminmenu.php');
				$CLASS['adminmenu']->display();
			} else if (defined('MEMBER_BLOCK')) {
				member_block();
			}
			define('SPECIAL_BLOCKS', 1);
		}
		if (!blocks_visible($side, true)) {
			$themeblockside = '';
			return;
		}
	}
	$querylang = ($multilingual) ? "AND (blanguage='$currentlang' OR blanguage='')" : '';
	if (!is_array($blocks)) {
		//global $home;
		//if (!$home) $querylang .= " AND (bposition='l' OR bposition='r')";
		$result = $db->sql_query('SELECT bid, bposition, bkey, title, content, url, blockfile, view, refresh, time FROM '.$prefix."_blocks WHERE active='1' $querylang ORDER BY weight ASC");
		while($row = $db->sql_fetchrow($result)) {
			$blocks[$row['bposition']][] = $row;
		}
		$db->sql_freeresult($result);
	}
	if ($count) {
		return (isset($blocks[$side]) ? count($blocks[$side]) : 0);
	}
	if (defined('ADMIN_PAGES') && (isset($_GET['op']) && $_GET['op'] == 'blocks') && isset($_GET['show']) && intval($_GET['show'])) {
		foreach ($blocks as $side => $pos) {
			foreach ($pos as $duplicate => $data) {
				if ($data['bid'] == $_GET['show']) unset($blocks[$side][$duplicate]);
			}
		}
	}
	$module_block = defined('ADMIN_PAGES') ? 'Admin' : $module_name;
	$blocks_list = blocks_list();
	if (isset($blocks[$side])) {
	foreach($blocks[$side] AS $row) {
		if (!isset($blocks_list[$module_block][$row['bid']])) continue;
		//	$blockqueries = $db->num_queries;
		// for multilingual block titles 8/28/2004 3:04PM akamu use: _SELECTLANGUAGE for title of block
		$row['title'] = (defined($row['title']) ? constant($row['title']) : $row['title']);
		if ($row['bkey'] == 'admin') {
			adminblock($row['bid'], $row['title'], $row['content']);
		} elseif ($row['bkey'] == 'userbox') {
			userblock($row['bid']);
		} elseif ($row['bkey'] == '') {
			if (is_admin() || ($row['view'] == 0) ||
				($row['view'] == 1 && is_user()) ||
				($row['view'] == 3 && !is_user()) ||
				($row['view'] > 3 && in_group($row['view']-3))) {
				render_blocks($side, $row);
			}
		}
//	echo "block queries: ".($db->num_queries - $blockqueries);
	}
	}
	$themeblockside = '';
}
function render_blocks($side, &$block) {
	require_once(CORE_PATH.'nbbcode.php');
	if ($block['url'] == '') {
		if ($block['blockfile'] == '') {
			if ($side == 'c' || $side == 'd') {
				themecenterbox($block['title'], decode_bbcode($block['content'], 1, true), $side);
			} else {
				themesidebox($block['title'], decode_bbcode($block['content'], 1, true), $block['bid']);
			}
		} else {
			blockfileinc($block['title'], $block['blockfile'], $side, $block['bid']);
		}
	} else {
		headlines($block['bid'], $side, $block);
	}
}
function blockfileinc($title, $blockfile, $side=1, $bid) {
	if (!file_exists("blocks/$blockfile")) {
		trigger_error($blockfile._BLOCKPROBLEM, E_USER_WARNING);
		return;
	} else {
		include("blocks/$blockfile");
	}
	if (!isset($content) || empty($content)) {
		trigger_error($blockfile._BLOCKPROBLEM2, E_USER_WARNING);
		return; // new debugger handles why no content;
	} else if ($content == 'ERROR') { return; }
	if ($side == 'l' || $side == 'r') {
		themesidebox($title, $content, $bid);
	} else {
		themecenterbox($title, $content, $side);
	}
}
function headlines($bid, $side=0, $row='') {
	global $prefix, $db;
	$bid = intval($bid);
	if (!is_array($row)) {
		$result = $db->sql_query('SELECT title, content, url, refresh, time FROM '.$prefix."_blocks WHERE bid='$bid'");
		$row = $db->sql_fetchrow($result);
		$db->sql_freeresult($result);
	} 
	$content =& $row['content'];

	if ($row['time'] < (gmtime()-$row['refresh'])) {
		$content = rss_content($row['url']);
		$btime = gmtime();
		$db->sql_query('UPDATE '.$prefix.'_blocks SET content=\''.Fix_Quotes($content)."', time='$btime' WHERE bid='$bid'");
	}
	if (empty($content)) {
		trigger_error(_RSSPROBLEM.' ('.$row['title'].')', E_USER_WARNING);
		return;
	}
	$content = '<font class="content">'.$content.'</font>';
	if ($side == 'c' || $side == 'd') {
		themecenterbox($row['title'], $content, $side);
	} else {
		themesidebox($row['title'], $content, $bid);
	}
}
function adminblock($bid, $title, $content='') {
	if (is_admin()) {
		$imgcontent = '';
		global $prefix, $db, $MAIN_CFG, $waitlist;
		if (!defined('ADMIN_PAGES') && $MAIN_CFG['global']['admingraphic'] & 1) {
			global $CLASS;
			require_once(CORE_PATH.'classes/cpg_adminmenu.php');
			$imgcontent = $CLASS['adminmenu']->display('all', 'blockgfx').'<br />';
		}
		themesidebox($title, $imgcontent.$content, $bid);
		$title = _WAITINGCONT;
		$content = '';
		$waitlist = array();
		// Contributed by sengsara
		if (!Cache::array_load('waitlist')) {
			if ($waitdir = dir('admin/wait')) {
				while($waitfile = $waitdir->read()) {
					if (preg_match('/^wait_(.*?)\.php$/', $waitfile, $match)) {
						$waitlist[$match[1]] = "admin/wait/$waitfile";
					}
				}
				$waitdir->close();
			}
			// Dragonfly system
			$waitdir = dir('modules');
			while($module = $waitdir->read()) {
				if (!is_active($module)) continue;
				if (!ereg('[.]',$module) && $module != 'CVS' && file_exists("modules/$module/admin/adwait.inc")) {
					$waitlist[$module] = "modules/$module/admin/adwait.inc";
				}
			}
			$waitdir->close();
			Cache::array_save('waitlist');
		}
		ksort($waitlist);
		foreach($waitlist as $module => $file) {
			require($file);
		}
		if ($content != '') themesidebox($title, $content, $bid."a");
	}
}
function userblock($bid) {
	require_once(CORE_PATH.'nbbcode.php');
	global $userinfo;
	if (is_user() && $userinfo['ublockon']) {
		$title = _MENUFOR." $userinfo[username]";
		themesidebox($title, decode_bbcode($userinfo['ublock'], 1, true), $bid);
	}
}
function themecenterbox($title, $content, $side=0) {
	global $cpgtpl;
	$side = ($side == 'c') ? 'center' : 'bottom';
	$cpgtpl->assign_block_vars($side.'block', array(
		'S_TITLE'   => $title,
		'S_CONTENT' => $content
	));
}
function title($text) {
	# obsolete
}
function hideblock($id) {
	static $hiddenblocks;
	if (!isset($hiddenblocks)) {
		$hiddenblocks = array();
		if (isset($_COOKIE['hiddenblocks'])) {
			$tmphidden = explode(':', $_COOKIE['hiddenblocks']);
			for($i=0; $i<count($tmphidden); $i++) {
				$hiddenblocks[$tmphidden[$i]] = true;
			}
		}
	}
	return (isset($hiddenblocks[$id]) ? true : false);
}
function yesno_option($name, $value=0) {
	$value = ($value>0) ? 1 : 0;
	if (function_exists('theme_yesno_option')) {
		return theme_yesno_option($name, $value);
	} else {
		$sel[$value] = ' checked="checked"';
		return '<input type="radio" name="'.$name.'" id="'.$name.'" value="1"'.$sel[1].' /><label class="rdr" for="'.$name.'">'._YES.'</label><input type="radio" name="'.$name.'" id="'.$name.'" value="0" '.$sel[0].' /><label class="rd" for="'.$name.'">'._NO.'</label> ';
	}
}
function select_option($name, $default, $options) {
	if (function_exists('theme_select_option')) {
		return theme_select_option($name, $default, $options);
	} else {
		$select = '<select class="set" name="'.$name.'" id="'.$name."\">\n";
		foreach($options as $var) {
			$select .= '<option'.(($var == $default)?' selected="selected"':'').">$var</option>\n";
		}
		return $select.'</select>';
	}
}
function select_box($name, $default, $options) {
	if (function_exists('theme_select_box')) {
		return theme_select_box($name, $default, $options);
	} else {
		$select = '<select class="set" name="'.$name.'" id="'.$name."\">\n";
		foreach($options as $value => $title) {
			$select .= "<option value=\"$value\"".(($value == $default)?' selected="selected"':'').">$title</option>\n";
		}
		return $select.'</select>';
	}
}
function viewbanner() {
	//if (is_admin()) { return ''; }
	global $prefix, $db;
	$result = $db->sql_query("SELECT * FROM ".$prefix."_banner WHERE type='0' AND active='1' ORDER BY RAND() LIMIT 0,1");
	if ($db->sql_numrows($result) < 1) return;
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);
	foreach($row as $var => $value) {
		if (isset($$var)) unset($$var);
		$$var = $value;
	}
	if (!is_admin()) {
		$db->sql_query('UPDATE '.$prefix.'_banner SET impmade=' . $impmade . "+1 WHERE bid='$bid'");
	}
	/* Check if this impression is the last one and print the banner */
	if ($imptotal <= $impmade && $imptotal != 0) {
		global $sitename, $nukeurl, $user_prefix;
		$db->sql_query('UPDATE '.$prefix."_banner SET active='0' WHERE bid='$bid'");
		$result = $db->sql_query('SELECT username, user_email FROM '.$user_prefix."_users WHERE user_id='$cid'");
		$row = $db->sql_fetchrow($result);
		$to_name = $row['username'];
		$message = _HELLO." $to_name,\n\n"
			._THISISAUTOMATED."\n\n"
			._THERESULTS."\n\n"
			.BANNER_ID.": $bid\n"
			._TOTALIMPRESSIONS." $imptotal\n"
			._CLICKSRECEIVED." $clicks\n"
			._IMAGEURL." $imageurl\n"
			._CLICKURL." $clickurl\n"
			._ALTERNATETEXT." $alttext\n\n"
			._TEXT_TITLE.": $text_title\n\n"
			._HOPEYOULIKED."\n\n"
			._THANKSUPPORT."\n\n"
			."- $sitename "._TEAM."\n".$nukeurl;
		send_mail($mailer_message, $message,0, "$sitename: "._BANNERSFINNISHED, $row['user_email'], $row['username']);
		$db->sql_freeresult($result);
	}
	if ($textban) {
		return '<table valign="middle" align="center" style="text-align:center;width: '.$text_width.'px; height: '.$text_height.'px;'.(!empty($text_bg) ? ' background-color: #'.$text_bg.';' : '').'"><tr><td><a href="banners.php?bid='.$bid.'"'.(!empty($text_clr) ? ' style="color: #'.$text_clr.'"' : '').' target="_blank">'.$text_title.'</a></td></tr></table>';
	} else {
		return '<a href="banners.php?bid='.$bid.'" target="_blank"><img src="'.$imageurl.'" border="0" alt="'.$alttext.'" title="'.$alttext.'" /></a>';
	}
}
function show_tooltip($tip) {
	global $MAIN_CFG;
	return $MAIN_CFG['global']['admin_help'] ? ' onmouseover="tip(\''.$tip.'\')" onmouseout="untip()"' : '';
//	<img src="images/help.gif" alt="" onmouseover="tip(\''.$tip.'\')" onmouseout="untip()" style="cursor: help;" />
}
function open_form($link='', $form_name=false, $legend=false, $tborder=false) {
	if (function_exists('theme_open_form')) {
		return theme_open_form($link, $form_name, $legend, $tborder);
	} else {
		$leg = ($legend ? "<legend>$legend</legend>" : '');
		$bord = ($tborder ? $tborder : '');
		$form_name = ($form_name ? ' name="'.$form_name.'" id="'.$form_name.'"' : '');
		return '<fieldset '.$bord.'>'.$leg.'<form method="post" action="'.$link.'"'.$form_name.' enctype="multipart/form-data" accept-charset="utf-8">';
	}
}
function close_form() {
	if (function_exists('theme_close_form')) {
		return theme_close_form();
	} else {
		return '</form></fieldset>';
	}
}
function generate_secimg($chars=6) {
	global $CPG_SESS;
	mt_srand((double)microtime()*1000000);
	$id = mt_rand(0, 1000000);
	$time = explode(' ', microtime());
	$CPG_SESS['gfx'][$id] = substr(dechex($time[0]*3581692740), 0, $chars);
	return '<img src="'.getlink("gfx&amp;id=$id").'" border="0" alt="'._SECURITYCODE.'" title="'._SECURITYCODE.'" />
	<input type="hidden" name="gfxid" value="'.$id.'" />';
}
function validate_secimg($chars=6) {
	global $CPG_SESS;
	if (!isset($_POST['gfx_check']) || !isset($_POST['gfxid'])) { return false; }
	$code = $CPG_SESS['gfx'][$_POST['gfxid']];
	return (strlen($code) == $chars && $code == $_POST['gfx_check']);
}
function group_selectbox($fieldname, $current=0, $mvanon=false, $all=true) {
	static $groups;
	if (!isset($groups)) {
		global $db, $prefix;
		$groups = array(0=>_MVALL, 1=>_MVUSERS, 2=>_MVADMIN, 3=>_MVANON);
		$groupsResult = $db->sql_query('SELECT group_id, group_name FROM '.$prefix.'_bbgroups WHERE group_single_user=0');
		while (list($groupID, $groupName) = $db->sql_fetchrow($groupsResult)) {
			$groups[($groupID+3)] = $groupName;
		}
	}
	$tmpgroups = $groups;
	if (!$all) { unset($tmpgroups[0]); }
	if (!$mvanon) { unset($tmpgroups[3]); }
	return select_box($fieldname, $current, $tmpgroups);
}
function cpg_delete_msg($link, $msg, $hidden='') {
	require_once('header.php');
	OpenTable();
	if (function_exists('theme_delete_msg')) {
		echo theme_delete_msg($link, $msg, $hidden);
	}
	global $cpgtpl;
	$cpgtpl->assign_vars(array(
		'MESSAGE_TITLE' => 'Confirm',
		'MESSAGE_TEXT' => $msg,
		'L_YES' => _YES,
		'L_NO' => _NO,
		'S_CONFIRM_ACTION' => $link,
		'S_HIDDEN_FIELDS' => $hidden
	));
	$cpgtpl->set_filenames(array('confirm' => 'confirm_body.html'));
	$cpgtpl->display('confirm');
	CloseTable();
	require('footer.php');
}

function pagination($base_url, $num_items, $per_page, $start_item, $add_prevnext=TRUE)
{
	function pagination_page($page, $url, $first=false) {
		global $cpgtpl;
		$cpgtpl->assign_block_vars('pagination', array('PAGE' => $page, 'URL' => $url, 'FIRST' => $first));
	}
	function pagination_link($url) {
		if (defined('ADMIN_PAGES')) { return adminlink($url); }
		return getlink($url);
	}
	global $cpgtpl;
	$total_pages = ceil($num_items/$per_page);
	$on_page = floor($start_item / $per_page);
	if ($total_pages < 2) { return $cpgtpl->assign_var('B_PAGINATION', false); }
	$cpgtpl->assign_vars(array(
		'B_PAGINATION' => true,
		'PAGINATION_PREV' => ($add_prevnext && $on_page > 1) ? pagination_link($base_url.(($on_page-1)*$per_page)) : false,
		'PAGINATION_NEXT' => ($add_prevnext && $on_page < $total_pages) ? pagination_link($base_url.($on_page+$per_page)) : false,
		'L_PREVIOUS' => _PREVIOUSPAGE,
		'L_NEXT' => _NEXTPAGE,
		'L_GOTO_PAGE' => 'Go to:',
	));
	if ($total_pages > 10) {
		$init_page_max = ($total_pages > 3) ? 3 : $total_pages;
		for ($i = 1; $i <= $init_page_max; $i++) {
			pagination_page($i, ($i == $on_page) ? false : pagination_link($base_url.($i*$per_page)), ($i == 1));
		}
		if ($total_pages > 3) {
			if ($on_page > 1 && $on_page < $total_pages) {
				if ($on_page > 5) { pagination_page(' ... ', false, true); }
				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4 ) ? $on_page : $total_pages - 4;
				for ($i = $init_page_min - 1; $i < $init_page_max + 2; $i++) {
					pagination_page($i, ($i == $on_page) ? false : pagination_link($base_url.($i*$per_page)), ($on_page <= 5 && $i == $init_page_min-1));
				}
				if ($on_page < $total_pages-4) { pagination_page(' ... ', false, true); }
			} else {
				pagination_page(' ... ', false, true);
			}
			for ($i = $total_pages - 2; $i <= $total_pages; $i++) {
				pagination_page($i, ($i == $on_page) ? false : pagination_link($base_url.($i*$per_page)));
			}
		}
	} else {
		for ($i = 1; $i <= $total_pages; $i++) {
			pagination_page($i, ($i == $on_page) ? false : pagination_link($base_url.($i*$per_page)));
		}
	}
}

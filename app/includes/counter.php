<?php
/*********************************************
  CPG Dragonfly™ CMS
  ********************************************
  Copyright © 2004 - 2005 by CPG-Nuke Dev Team
  http://dragonflycms.org

  Dragonfly is released under the terms and conditions
  of the GNU GPL version 2 or any later version

  $Source: /cvs/html/includes/counter.php,v $
  $Revision: 9.6 $
  $Author: djmaze $
  $Date: 2006/01/06 12:53:49 $
**********************************************/
if (!defined('CPG_NUKE')) { exit; }

global $prefix, $db;

if (SEARCHBOT) {
	$browser = 'Bot';
} else if ($_SESSION['SECURITY']['UA'] != 'N/A') {
	$browser = $_SESSION['SECURITY']['UA'];
} else {
	$browser = 'Other';
}
if ($_SESSION['SECURITY']['OS'] != 'N/A') {
	$os = $_SESSION['SECURITY']['OS'];
} else {
	$os = 'Other';
}

$now = explode('-',date('d-m-Y-H'));
/*
$db->sql_query('UPDATE '.$prefix."_counter SET count=count+1 WHERE (var='$browser' AND type='browser') OR (var='$os' AND type='os')");
if (!$db->sql_query('UPDATE '.$prefix."_stats_hour SET hits=hits+1 WHERE (year='$now[2]') AND (month='$now[1]') AND (date='$now[0]') AND (hour='$now[3]')") || !$db->sql_affectedrows()) {
	$db->sql_query('INSERT INTO '.$prefix."_stats_hour VALUES ('$now[2]','$now[1]','$now[0]','$now[3]','1')");
}
*/
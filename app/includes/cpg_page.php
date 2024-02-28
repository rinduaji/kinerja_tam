<?php
/*********************************************
  CPG Dragonfly™ CMS
  ********************************************
  Copyright © 2004 - 2005 by CPG-Nuke Dev Team
  http://dragonflycms.org

  Dragonfly is released under the terms and conditions
  of the GNU GPL version 2 or any later version

  $Source: /cvs/html/includes/cpg_page.php,v $
  $Revision: 9.4 $
  $Author: nanocaiordo $
  $Date: 2006/12/23 02:15:59 $
**********************************************/

function cpg_header($cpginfo) {
	return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>'.$cpginfo.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex" />
<meta name="robots" content="noarchive" />
<link rel="stylesheet" href="includes/css/cpg.css" type="text/css" />
</head>
<body><center>
<table class="table1"><tr><td>
  <table class="head">
  <tr>
<!--    <td width="212" align="left"><img src="images/logo.gif" border="0" alt="CPG-Nuke" title="CPG-Nuke" /></td> -->
    <td align="center" class="header">'.$cpginfo.'</td>
<!--    <td width="212" valign="bottom"><img align="right" height="22" width="202" src="images/shout.gif" alt="" title="" /></td> -->
  </tr>
  </table>
  <table class="table1"><tr><td align="center">
';
}

function cpg_footer() {
	$goback = defined('_GOBACK') ? _GOBACK : '[ <a href="javascript:history.go(-1)"><strong>Go Back</strong></a> ]';
	return '<br /><br />'.$goback.'
  </td></tr></table>
</td></tr></table>
</center></body></html>';
}

<?php
if (!defined('CPG_NUKE')) { exit; }
$j = trim($userinfo['user_ext3']);
//echo "$j";

echo "<script type=\"text/javascript\" src=\"includes/javascript/apymenu.js\"></script>";
if ($j=="Data Entry" || $j=="Duktek"){	
echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_sgde.js\"></script>";	}
else {
echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_sgagent.js\"></script>";	} // agent
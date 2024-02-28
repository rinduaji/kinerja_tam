<?php
if (!defined('CPG_NUKE')) { exit; }
$j = trim($userinfo['user_ext3']);
echo "<script type=\"text/javascript\" src=\"includes/javascript/apymenu.js\"></script>";
if ($j=="SPV Duktek" || $j=="Duktek")
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmit.js\"></script>";}
else if ($j=="Administrasi")
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmadmin.js\"></script>";}
else if ($j=="Supervisor 108" || $j=="Supervisor POTS" || $j=="Supervisor Flexi" || $j=="Supervisor Speedy" || $j=="Supervisor DSB" || $j=="Koordinator Flexi" || $j=="Koordinator POTS" || $j=="Koordinator Speedy" || $j=="Koordinator 108" || $j=="Manager" || $j=="QDB" )
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmspv.js\"></script>";}
else if ($j=="Tabber 147" || $j=="Tabber 108" || $j=="QA 147" || $j=="QA 108" || $j=="HR Support" || $j=="Document Control" || $j=="Data Entry" || $j=="Maintenance" || $j=="HR Support" || $j=="QA POTS" || $j=="QA Flexi")
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmstaff.js\"></script>";}
else {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmagent.js\"></script>";} // agent
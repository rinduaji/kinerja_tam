<?php
if (!defined('CPG_NUKE')) { exit; } 
$j = trim($userinfo['user_ext3']);
echo "$j<p>";
echo "<script type=\"text/javascript\" src=\"includes/javascript/apymenu.js\"></script>";
if ($j=="SPV Duktek" || $j=="Duktek" || $j=="Maintenance")
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmit.js\"></script>";}
else if ($j=="Administrasi")
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmadmin.js\"></script>";}
else if ($j=="Supervisor TAM DCS" || $j=="Supervisor Registrasi" || $j=="Supervisor 108" || $j=="Supervisor Citilink" || $j=="Supervisor POTS" || $j=="Supervisor Flexi" || $j=="Supervisor Speedy" || $j=="Supervisor DSB" || $j=="Koordinator Flexi" || $j=="Koordinator POTS" || $j=="Koordinator Speedy" || $j=="Koordinator 108" || $j=="Manager" || $j=="QDB" || $j=="Document Control"  || $j=="HR Support" || $j=="QA 108" || $j=="Supervisor Jatim" || $j=="Supervisor NTT" || $j=="Supervisor Informasi" || $j=="Supervisor Komplain" || $j=="Koordinator Informasi" || $j=="Koordinator Komplain")
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmspv.js\"></script>";}
else if ($j=="Koordinator TAM DCS")
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmadmin.js\"></script>";}
else if ($j=="Tabber 147" || $j=="Tabber 108" || $j=="Tabber TAM" || $j=="QA 147" || $j=="Data Entry" || $j=="Maintenance" || $j=="QA POTS" || $j=="QA Flexi" || $j=="QA Speedy")
        {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmstaff.js\"></script>";}
else {echo "<script type=\"text/javascript\" src=\"includes/javascript/mn_wfmagent.js\"></script>";} // agent
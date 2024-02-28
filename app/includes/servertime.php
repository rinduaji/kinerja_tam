<?php
error_reporting(0);
$mydate = date("U");
$myoffs = date("Z") - $myServerOffset;
print "var tzoffset = $myoffs + (new Date().getTimezoneOffset()*60);";
print "var servertimeOBJ=new Date(($mydate+tzoffset)*1000);";
print "var dt=$mydate;";
?>
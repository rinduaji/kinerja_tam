<?php
if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}

//echo $tanggal;

if ($tanggal=='01' || $tanggal=='02'|| $tanggal=='03'|| $tanggal=='04'|| $tanggal== '05' || $tanggal=='06' || $tanggal=='07' || $tanggal=='08' || $tanggal=='09' || $tanggal=='10') {
 	echo '[{"periode":"W1","status":"1"}]';
 } elseif ($tanggal=='11' || $tanggal=='12' || $tanggal=='13' || $tanggal=='14' || $tanggal=='15' || $tanggal=='16' || $tanggal=='17' || $tanggal=='18'|| $tanggal=='19' || $tanggal=='20') {
 	echo '[{"periode":"W2","status":"1"}]';
 }else {
 	echo '[{"periode":"W3","status":"1"}]';
}
//echo $tanggal;


 ?>
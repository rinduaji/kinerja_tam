<?
$dsn='10.112.4.17'; //atau sesuai nama DSN anda
$uechi='sa'; //atau sesuai namauser anda
$pechi='duktek'; //atau sesuai password anda
$dbechi='PABX';
$koneksi1= mssql_connect($dsn,$uechi,$pechi);
mssql_select_db($dbechi,$koneksi1);
?>
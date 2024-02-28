<?
$host = '172.5.5.50';
$name = 'db108';
$uname = 'root';
$pass = 'adminccsby';
$conn=mysql_connect("$host","$uname","$pass");
if (!$conn) {die('Koneksi ke Mysql 108 gagal: ' . mysql_error());}
mysql_select_db("$name"); //or die( "Tidak dapat memilih data base");
//define('CONN_CMS', true);
?>
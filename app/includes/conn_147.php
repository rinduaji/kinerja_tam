<?
$host = '10.194.41.7';
$name = 'maincc147';
$uname = 'root';
$pass = 'infonusa';
$conn=mysql_connect("$host","$uname","$pass");
//if (!$conn_cms) {die('Koneksi ke Mysql gagal: ' . mysql_error());}
mysql_select_db("$name"); //or die( "Tidak dapat memilih data base");
//define('CONN_CMS', true);
?>
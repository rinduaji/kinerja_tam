<?
$cmshost = '10.194.194.11';
$cmsname = 'cms_mirror';
$cmsuname = 'contactcenter';
$cmspass = 'admin';
$conn_cms=mysql_connect("$cmshost","$cmsuname","$cmspass");
//if (!$conn_cms) {die('Koneksi ke Mysql gagal: ' . mysql_error());}
mysql_select_db("$cmsname"); //or die( "Tidak dapat memilih data base");
//define('CONN_CMS', true);
?>
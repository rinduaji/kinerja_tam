<?
$cmshost = '172.5.5.69';
$cmsname = 'cms_mirror';
$cmsuname = 'root';
$cmspass = 'Admingcc';
$conn_cms=mysql_connect("$cmshost","$cmsuname","$cmspass");
//if (!$conn_cms) {die('Koneksi ke Mysql gagal: ' . mysql_error());}
mysql_select_db("$cmsname"); //or die( "Tidak dapat memilih data base");
//define('CONN_CMS', true);
?>
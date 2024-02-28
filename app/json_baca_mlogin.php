<?php
if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
include("koneksi.php"); 

$query = "SELECT a.user_id,a.name,a.username,b.user3,b.user7,a.nama_tl,b.user4 FROM cc147_main_users AS a INNER JOIN cc147_main_users_extended AS b ON a.user_id = b.id WHERE a.username = '$id' ";
$resul =mysqli_query($conn, $query);
$result=mysqli_fetch_row($resul);

//echo $result[1];
$tt=date('Y-m');
//echo $tt;
$qq="SELECT * FROM `app_kinerja_nilai` WHERE `user_id` = '$id' AND `tanggal` like '%$tt%'";
$res =mysqli_query($conn, $qq);
$resu=mysqli_num_rows($res);
//echo $resu;


echo '[{"perner_ish":"104210",
		"userid":"104210",
		"username":"'.$result[1].'",
		"userlevel":"Agent TAM",
		"layanan":"Telkom TAM",
		"ket":"'.$result[4].'",
		"user_tl":"'.$result[5].'",
		"gender":"'.$result[6].'",
		"los":"'.$resu.'",
		
		"status":"1"}]';


?>
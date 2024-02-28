<?php
session_start(); 
	 // require_once('koneksi.php');
include 'koneksi.php';
$nama = $_SESSION['name'];
$username = $_GET['user_id'];
	 // $username = $_GET['user_id'];
$token = "1102559532:AAF78YNaYBp1MopW-xaGLba2_CfKzjaRInA";

$user_id = '';
$nama_tl = '';
$nama_agent = '';
$mesg = '';
$mesg1 = '';

$sql=mysqli_query($conn,"Select username,name,user_id_tele,username_tele,nama_tl FROM cc147_main_users where username = '$username'");
while($row = mysqli_fetch_row($sql)){
	$user_id = $row[2];
	// $user_id = 1161628856;
	$nama_agent = $row[1];
	$nama_tl = $row[4];
	//$mesg = 'User ID : '.$user_id.'. Nilai QM kurang dari 100, mohon REMENDING untuk komitmen perbaikan di aplikasi MONIQA';
	$mesg = $user_id;
}

$sql1=mysqli_query($conn,"Select username,name,user_id_tele,username_tele FROM cc147_main_users where username = '$nama_tl'");
while($row1 = mysqli_fetch_row($sql1)){
	$id_tl = $row1[2];
	// $id_tl = 101082871;
	 	// $user_id = 1161628856;
	//$mesg1 = 'Nilai QM agent '.$nama_agent.' kurang dari 100, mohon REMENDING untuk komitmen perbaikan di aplikasi MONIQA';
	$mesg1 = $nama_agent;
}

// header("Location: http://10.194.41.7/moniqa/app/form_insert.php?status=sukses&username=$username&user_id=$user_id&id_tl=$id_tl&nama_tl=$nama_tl&mesg=$mesg&mesg1=$mesg1");
if($_GET['link']=='manual'){
	header("location: http://10.194.41.245/moniqa/index.php?id=$user_id&id_tl=$id_tl&mesg_tl=$mesg1");
	exit();
}
else{
	header("location: http://10.194.41.245/moniqa/index2.php?id=$user_id&id_tl=$id_tl&mesg_tl=$mesg1");
	exit();
}

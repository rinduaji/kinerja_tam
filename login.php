<?php


session_start();

$conn = @mysqli_connect("10.194.176.158", "appdev", "appdev123", "kinerja_tam");
	//cek koneksi error atau tidak
	if (!$conn) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}

$username = $_POST['username'];
$password = MD5($_POST['password']);

$query = "SELECT a.user_id,a.`name`,a.username,b.user3 ,b.user7
FROM cc147_main_users AS a
INNER JOIN cc147_main_users_extended AS b ON a.user_id = b.id WHERE a.username = '$username' AND a.user_password = '$password' AND a.user_active <>'0'";
$resul =mysqli_query($conn, $query);
// echo "$query";

// die();

if (mysqli_num_rows($resul) == 1){
	$row=mysqli_fetch_row($resul);
	$_SESSION["user_id"] = $row[0];
	$_SESSION["username"] = $row[2];
	$_SESSION["name"] = $row[1];
	$_SESSION["jabatan"] = $row[3];
	$jb = explode(" ",trim($row[3]));
	$_SESSION["jb"] = $jb[0];
	$_SESSION["area"] = $row[4];

	header("Location:./app/index.php");

} else {
	header("Location:index.php?pesan=gagal");
}



?>
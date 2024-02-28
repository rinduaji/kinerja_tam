<?php
$servername = "10.194.176.158";
$username = "appdev";
$password = "appdev123";
$database = "kinerja_tam";

// Create connection
//$conn = new mysqli($servername, $username, $password, $database);

$conn = @mysqli_connect("$servername", "$username", "$password", "$database");
	//cek koneksi error atau tidak
	if (!$conn) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}
//mem
?>
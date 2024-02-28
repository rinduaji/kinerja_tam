<?php
$servername = "10.62.172.120";
$username = "admapp";
$password = "4dm1N4Pp5!!";
$database = "smartcollection";

// Create connection
// $conn = new mysqli($servername, $username, $password, $database);

$conn_xena = @mysqli_connect("$servername", "admapp", "$password", "smartcollection");
	//cek koneksi error atau tidak
	if (!$conn_xena) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}
//mem
?>
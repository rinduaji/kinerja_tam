<?php
$servername = "10.60.175.133";
$username = "infomed_malang";
$password = "telkom12345";
$database = "ideasdb";

// Create connection
//$conn = new mysqli($servername, $username, $password, $database);

$conn = @mysqli_connect("$servername", "infomed_malang", "$password", "ideasdb");
	//cek koneksi error atau tidak
	if (!$conn) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}
//mem
?>
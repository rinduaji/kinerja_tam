<?php
	include 'koneksi.php';
$pesan = urlencode($_GET["pesan"]);
$token = "bot"."1102559532:AAF78YNaYBp1MopW-xaGLba2_CfKzjaRInA";
$username = $pilih_cbo;
$proxy = "10.194.41.245:3135";

  $sql=mysqli_query($conn,"Select username,name,user_id_tele,username_tele FROM cc147_main_users where username = '$username'");
	 while($row = mysqli_fetch_row($sql)){
		$user_id = $row[2];
	 	// $user_id = 1161628856;
		$mesg = 'Total nilai Anda Kurang dari 100';
	}
	$request_param = [
		'chat_id' => $user_id,
		'text' => $mesg

	];

$url = "https://api.telegram.org/$token/sendMessage?parse_mode=markdown&chat_id=$chat_id&text=$mesg";

$ch = curl_init();
	
if($proxy==""){
	$optArray = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CAINFO => "..\cacert.pem"	
	);
}
else{ 
	$optArray = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_PROXY => "$proxy",
		CURLOPT_CAINFO => "..\cacert.pem"	
	);	
}
	
curl_setopt_array($ch, $optArray);
$result = curl_exec($ch);
	
$err = curl_error($ch);
curl_close($ch);	
	
if($err<>"") echo "Error: $err";
else echo "Pesan Terkirim";

?>
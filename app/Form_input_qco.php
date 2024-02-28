<?php
include("koneksi.php");
//$date_now = date("Y-m-d");
$date_now = date("Y-m-d",strtotime('2021-08-05'));
$timestamp = date('Y/m/d H:i:s');

$tgl_sebelumnya = date("Y-m-d", strtotime('-1 day', strtotime($date_now)));
$sql_nilai_ideas_kosong = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_ideas WHERE tanggal= '$tgl_sebelumnya'");
$total_nilai_ideas_kosong = mysqli_num_rows($sql_nilai_ideas_kosong);

$tgl_dua_sebelumnya = date("Y-m-d", strtotime('-2 day', strtotime($date_now)));
$sql_nilai_ideas_kosong_dua = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_ideas WHERE tanggal= '$tgl_dua_sebelumnya'");
$total_nilai_ideas_kosong_dua = mysqli_num_rows($sql_nilai_ideas_kosong);

$pkatt = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_ideas WHERE tanggal = '$date_now'");
$total_tanggal = mysqli_num_rows($pkatt);

$sql_cuti = mysqli_query($conn, "SELECT id, username, nama, tanggal, keterangan FROM app_kinerja_cuti WHERE tanggal = '$date_now'");
$total_cuti = mysqli_num_rows($sql_cuti);

$sql_cuti_satu = mysqli_query($conn, "SELECT id, username, nama, tanggal, keterangan FROM app_kinerja_cuti WHERE tanggal = '$tgl_sebelumnya'");
$total_cuti_satu = mysqli_num_rows($sql_cuti_satu);

$sql_cuti_dua = mysqli_query($conn, "SELECT id, username, nama, tanggal, keterangan FROM app_kinerja_cuti WHERE tanggal = '$tgl_dua_sebelumnya'");
$total_cuti_dua = mysqli_num_rows($sql_cuti_dua);


if ($total_tanggal == 0) {
// if($date_now == '2020-08-18' OR $date_now == '2020-08-19'){
	// 	$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554' and b.user1 <> 'dwi'");
	// }
	// else { 
	// 	$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");
	// }
	$query = '';
	if ($total_cuti > 0) {
		while ($tampil_cuti = mysqli_fetch_row($sql_cuti)) {
			$query .= " and b.user1 <> '" . $tampil_cuti[1] . "'";
			$i++;
		}

		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554' $query");
	} else {
		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");
	}

	$i = 0;
	$nama_qco = array();
	$total1 = mysqli_num_rows($pkatt1);
	while ($ckatt1 = mysqli_fetch_row($pkatt1)) {
		$nama_qco[$i] = $ckatt1[2];
		$i++;
	}

	$pkatt2 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Agent Fbcc' and b.user1 <> ''");
	$k = 0;
	$total2 = mysqli_num_rows($pkatt2);
	$array1 = array();
	while ($ckatt2 = mysqli_fetch_row($pkatt2)) {

		$array1[$k] = array($ckatt2[1], $ckatt2[4], $tgl_sebelumnya);
		$k++;
	}

	$random = array();
	$numbers = range(0, ($k - 1));
	shuffle($numbers);
	$random = array_slice($numbers, 0, $k);
	$total = floor($total2 / $total1);
	$data = array();
	$no = 0;

	for ($i = 0; $i < $total2; $i++) {
		for ($j = 0; $j < $total; $j++) {

			$parameter1 = $array1[$random[$no]][0];
			$parameter2 = $array1[$random[$no]][1];
			$parameter3 = $array1[$random[$no]][2];

			if ($no < $k and ($nama_qco[$i] != '' or $nama_qco[$i] != NULL)) {
				$sql = "INSERT INTO `app_kinerja_ideas` (`qco`,`agent`,`area`,`tanggal`) 
				VALUES ('$nama_qco[$i]','$parameter1','$parameter2','$parameter3')";

				mysqli_query($conn, $sql);
			} else {
				$random_lebih = array_rand($nama_qco, 1);
				// $random_angka = rand(0, 4);
				// $lebih = $total1 - 1;
				$sql = "INSERT INTO `app_kinerja_ideas` (`qco`,`agent`,`area`,`tanggal`) 
				VALUES ('$nama_qco[$random_lebih]','$parameter1','$parameter2','$parameter3')";

				mysqli_query($conn, $sql);
			}
			$no++;
		}
	}
}

if ($total_nilai_ideas_kosong == 0) {
	// if($date_now == '2020-08-18' OR $date_now == '2020-08-19'){
	// 	$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554' and b.user1 <> 'dwi'");
	// }
	// else { 
	// 	$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");
	// }
	$query = '';
	if ($total_cuti_satu > 0) {
		while ($tampil_cuti_satu = mysqli_fetch_row($sql_cuti_satu)) {
			$query .= " and b.user1 <> '" . $tampil_cuti_satu[1] . "'";
			$i++;
		}

		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554' $query");
	} else {
		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");
	}

	$i = 0;
	$nama_qco = array();
	$total1 = mysqli_num_rows($pkatt1);
	while ($ckatt1 = mysqli_fetch_row($pkatt1)) {
		$nama_qco[$i] = $ckatt1[2];
		$i++;
	}

	$pkatt2 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Agent Fbcc' and b.user1 <> ''");
	$k = 0;
	$total2 = mysqli_num_rows($pkatt2);
	$array1 = array();
	while ($ckatt2 = mysqli_fetch_row($pkatt2)) {

		$array1[$k] = array($ckatt2[1], $ckatt2[4], $tgl_sebelumnya);
		$k++;
	}

	$random = array();
	$numbers = range(0, ($k - 1));
	shuffle($numbers);
	$random = array_slice($numbers, 0, $k);
	$total = floor($total2 / $total1);
	$data = array();
	$no = 0;

	for ($i = 0; $i < $total2; $i++) {
		for ($j = 0; $j < $total; $j++) {

			$parameter1 = $array1[$random[$no]][0];
			$parameter2 = $array1[$random[$no]][1];
			$parameter3 = $array1[$random[$no]][2];

			if ($no < $k and ($nama_qco[$i] != '' or $nama_qco[$i] != NULL)) {
				$sql = "INSERT INTO `app_kinerja_ideas` (`qco`,`agent`,`area`,`tanggal`) 
				VALUES ('$nama_qco[$i]','$parameter1','$parameter2','$parameter3')";

				mysqli_query($conn, $sql);
			} else {
				$random_lebih = array_rand($nama_qco, 1);
				// $random_angka = rand(0, 4);
				// $lebih = $total1 - 1;
				$sql = "INSERT INTO `app_kinerja_ideas` (`qco`,`agent`,`area`,`tanggal`) 
				VALUES ('$nama_qco[$random_lebih]','$parameter1','$parameter2','$parameter3')";

				mysqli_query($conn, $sql);
			}
			$no++;
		}
	}
}

if ($total_nilai_ideas_kosong_dua == 0) {
	// if($date_now == '2020-08-18' OR $date_now == '2020-08-19'){
	// 	$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554' and b.user1 <> 'dwi'");
	// }
	// else { 
	// 	$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");
	// }
	$query = '';
	if ($total_cuti_dua > 0) {
		while ($tampil_cuti_dua = mysqli_fetch_row($sql_cuti_dua)) {
			$query .= " and b.user1 <> '" . $tampil_cuti_dua[1] . "'";
			$i++;
		}

		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554' $query");
	} else {
		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");
	}

	$i = 0;
	$nama_qco = array();
	$total1 = mysqli_num_rows($pkatt1);
	while ($ckatt1 = mysqli_fetch_row($pkatt1)) {
		$nama_qco[$i] = $ckatt1[2];
		$i++;
	}

	$pkatt2 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Agent Fbcc' and b.user1 <> ''");
	$k = 0;
	$total2 = mysqli_num_rows($pkatt2);
	$array1 = array();
	while ($ckatt2 = mysqli_fetch_row($pkatt2)) {

		$array1[$k] = array($ckatt2[1], $ckatt2[4], $tgl_dua_sebelumnya);
		$k++;
	}

	$random = array();
	$numbers = range(0, ($k - 1));
	shuffle($numbers);
	$random = array_slice($numbers, 0, $k);
	$total = floor($total2 / $total1);
	$data = array();
	$no = 0;

	for ($i = 0; $i < $total2; $i++) {
		for ($j = 0; $j < $total; $j++) {

			$parameter1 = $array1[$random[$no]][0];
			$parameter2 = $array1[$random[$no]][1];
			$parameter3 = $array1[$random[$no]][2];

			if ($no < $k and ($nama_qco[$i] != '' or $nama_qco[$i] != NULL)) {
				$sql = "INSERT INTO `app_kinerja_ideas` (`qco`,`agent`,`area`,`tanggal`) 
				VALUES ('$nama_qco[$i]','$parameter1','$parameter2','$parameter3')";

				mysqli_query($conn, $sql);
			} else {
				$random_lebih = array_rand($nama_qco, 1);
				// $random_angka = rand(0, 4);
				// $lebih = $total1 - 1;
				$sql = "INSERT INTO `app_kinerja_ideas` (`qco`,`agent`,`area`,`tanggal`) 
				VALUES ('$nama_qco[$random_lebih]','$parameter1','$parameter2','$parameter3')";
				// $lebih = $total1 - 1;
				// $sql="INSERT INTO `app_kinerja_ideas` (`qco`,`agent`,`area`,`tanggal`) 
				// VALUES ('$nama_qco[$lebih]','$parameter1','$parameter2','$parameter3')";

				mysqli_query($conn, $sql);
			}
			$no++;
		}
	}
}

 <!DOCTYPE html>
 <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
 <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
 <!--[if !IE]><!-->
 <html lang="en" class="no-js">


 <?php
 
	if ($_GET) {
		extract($_GET, EXTR_OVERWRITE);
	}
	if ($_POST) {
		extract($_POST, EXTR_OVERWRITE);
	}
	// include("koneksi2.php");
	// include("koneksi.php");
	include("koneksi.php");
	//require_once('koneksi.php');
	include('sidebar.php');
	// include 'Form_input_qco.php';
	//require_once('koneksi.php');
	date_default_timezone_set('Asia/Jakarta');
	// $tgl = date("Y-m-d", strtotime("2021-02-08"));
	$tgl = date('Y-m-d');
	$lup = date('Y-m-d h:i:s');

	if (isset($_POST['Search'])) {
		if ($_POST['tanggal'] == '' or $_POST['tanggal'] == NULL) {
			$tanggal_cari = $tgl;
		} else {
			$tanggal_cari = $_POST['tanggal'];
		}
	} else {
		$tanggal_cari = $tgl;
		// $tanggal_cari = date("Y-m-d", strtotime("2021-01-11"));
	}

	$nama_login = $_SESSION['name'];

	if ($_SESSION['jabatan'] == "Tabber Fbcc" || $_SESSION['jabatan'] == "Duktek") :
		$id_kat = "";
		$val_itm = "";
	?>
 	<SCRIPT language=Javascript>
 		function isNumberKey(evt) {
 			var charCode = (evt.which) ? evt.which : event.keyCode
 			if (charCode > 31 && (charCode < 48 || charCode > 57))
 				return false;
 			return true;
 		}
 	</SCRIPT>
 	<style type="text/css">
 		#tgl_ol_text_set {
 			margin-left: -34;
 			border-left-width: -34;
 			padding-left: 12px;
 			width: 37px;
 			padding-top: 6px;
 			padding-right: 12px;
 			margin-top: -30;
 			margin-right: 0px;
 			bottom: -32;
 			top: -32;
 			margin-top: -34;
 			margin-bottom: 0px;
 			margin-left: 34px;
 			padding-bottom: 7px;
 			background: blue;
 		}
 	</style>

 	<!--sidebar end-->
 	<!--main content start-->
 	<section id="main-content">

 		<!-- wrapper start -->
 		<section class="wrapper">

 			<!-- <form name="form1" id="form1" method="post" action="simpan.php" > -->
 			<form id="form" name="demoform" method="post" action="form_ideas_wo.php">

 				<div class="row">

 					<section class="panel">

 						<div class="panel-body">

 							<div class="box">
 								<div class="overlay" id="overlay">
 									<p align="center">
 										<span style="font-size: 6em;">Mohon ditunggu </span><br />
 										<i class="fa fa-refresh fa-spin fa-40x"></i>
 									</p>
 								</div>

 								<div class="adv-table" style="margin-top:-20px; width: auto 100%">

 									<div class="col-lg-12">
 										<section class="panel">
 											<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">
 												<h3><i>Data IDEAS Monitoring</i></h3>
 											</div>

 											<div class="panel-body">

 												<p align="right">
 												</p>

 												<?php
													include 'koneksi.php';

													$tgl_satu_hari_sebelumnya = date("Y-m-d", strtotime('-1 day', strtotime($tanggal_cari)));
													$sql_tapping_kosong = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_nilai WHERE tanggal= '$tgl_satu_hari_sebelumnya'");
													$total_tapping_kosong = mysqli_num_rows($sql_tapping_kosong);

													$date_sekarang = date("D", strtotime($tanggal_cari));
													if ($date_sekarang == date("D", strtotime("Monday")) or $date_sekarang == date("D", strtotime("Sunday")) or $date_sekarang == date("D", strtotime("Saturday"))) {
													?>
 													<table border="0" width="100%">
 														<tr>
 															<td>
 																<label for="start">Cari Tanggal :</label>
 															</td>
 															<td width="74%">
 																<div class="form-group">
 																	<select class="chosen-select" name="tanggal" class="form-control" onChange="">
 																		<option value="">-- Pilih Tanggal --</option>
 																		<?php

																			$cari_tanggal = array();
																			$cari_tanggal1 = date("l, d F Y", strtotime(date("Y-m-d")));
																			$cari_tanggal2 = date("Y-m-d", strtotime(date("Y-m-d")));
																			$cari_tanggal[1] = date("l, d F Y", strtotime('-1 day', strtotime($cari_tanggal1)));
																			$cari_tanggal[2] = date("l, d F Y", strtotime('-2 day', strtotime($cari_tanggal1)));
																			// $cari_tanggal[3] = date("l, d F Y", strtotime('-3 day', strtotime($cari_tanggal1)));
																			for ($i = 0; $i < 4; $i++) {
																				if ($i == 0) {
																					echo (" <option value=$cari_tanggal2>$cari_tanggal1</option>");
																				}
																				$nama_tanggal_cari = $cari_tanggal[$i];
																				$format_tanggal_cari = date("Y-m-d", strtotime($nama_tanggal_cari));
																				echo (" <option value=$format_tanggal_cari>" . $nama_tanggal_cari . "</option>");
																			}

																			?>
 																	</select>
 																</div>
 															</td>

 															<td>

 																<button type="submit" id="Search" name="Search" value="1" class="btn btn-success">Search</button>
 																<button type="button" id="reset" name="reset" class="btn btn-danger">Reset</button>

 															</td>
 														</tr>
 													</table>
 												<?php
													}

													if ($total_tapping_kosong == 0 and ($date_sekarang == date("D", strtotime("Tuesday")) or $date_sekarang == date("D", strtotime("Wednesday")) or $date_sekarang == date("D", strtotime("Thursday")) or $date_sekarang == date("D", strtotime("Friday")))) {
													?>
 													<table border="0" width="100%">
 														<tr>
 															<td>
 																<label for="start">Cari Tanggal :</label>
 															</td>
 															<td width="74%">
 																<div class="form-group">
 																	<select class="chosen-select" name="tanggal" class="form-control" onChange="">
 																		<option value="">-- Pilih Tanggal --</option>
 																		<?php
																			// $pkatt = mysqli_query($conn, "SELECT b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Agent Fbcc' and b.user7='$area_cbo'");
																			// $k=1;
																			// while ($ckatt = mysqli_fetch_row($pkatt)) {
																			//                             //  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
																			// 	if ($pilih_cbo==$ckatt[0]){$sel="selected";} else {$sel="";}
																			// 	echo(" <option value=$ckatt[0] $sel>$ckatt[0] -- $ckatt[1]</option>");
																			// 	$k++;
																			// }

																			$cari_tanggal = array();
																			$cari_tanggal1 = date("l, d F Y", strtotime($tanggal_cari));
																			$cari_tanggal2 = date("Y-m-d", strtotime($tanggal_cari));
																			$cari_tanggal_ditentukan = date("Y-m-d", strtotime('-1 day', strtotime($cari_tanggal1)));
																			$cari_tanggal_ditentukan2 = date("l, d F Y", strtotime($cari_tanggal_ditentukan));
																			// $cari_tanggal[1] = date("l, d F Y", strtotime('-1 day', strtotime($cari_tanggal1)));
																			// $cari_tanggal[2] = date("l, d F Y", strtotime('-2 day', strtotime($cari_tanggal1)));
																			// $cari_tanggal[3] = date("l, d F Y", strtotime('-3 day', strtotime($cari_tanggal1)));
																			for ($i = 0; $i < 2; $i++) {
																				if ($i == 0) {
																					echo (" <option value=$cari_tanggal2>$cari_tanggal1</option>");
																				}
																				if ($i == 1) {
																					echo (" <option value=$cari_tanggal_ditentukan>$cari_tanggal_ditentukan2</option>");
																				}
																				// $nama_tanggal_cari = $cari_tanggal[$i];
																				// $format_tanggal_cari = date("Y-m-d",strtotime($nama_tanggal_cari));
																				// echo(" <option value=$format_tanggal_cari>".$nama_tanggal_cari."</option>");
																			}

																			?>
 																	</select>
 																</div>
 																<!-- <input type="month" class="form-control" name="keyword" size="1" value="<?php echo date("F Y"); ?>"> -->
 															</td>

 															<td>

 																<!--
                                <button type="button" class="btn btn-warning" onClick="caridata();">
                                <font color="#000000">Search</font></button>
                            -->
 																<button type="submit" id="Search" name="Search" value="1" class="btn btn-success">Search</button>
 																<button type="button" id="reset" name="reset" class="btn btn-danger">Reset</button>

 															</td>
 														</tr>
 													</table>
 												<?php
													}
													?>
 												<div class="table-responsive">
 													<table data-toggle="table" class="table table-striped table-bordered table-hover header-fixed" id="sample_xx">
 														<div><br></div>
 														<thead>
 															<tr>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">
 																		No</font>
 																</th>

 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">
 																		AGENT</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">NAMA
 																	</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">
 																		ALAMAT</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">NO TELEPON
 																	</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">TANGGAL CALL
 																	</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">
 																		HUBUNGAN PENERIMA</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">PENERIMA
 																	</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">TANGGAL JANJI BAYAR
 																	</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">KENDALA
 																	</font>
 																</th>
 																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
 																	<font face="Verdana" style="font-size: 9pt">ACTION
 																	</font>
 																</th>




 															</tr>

 														</thead>

 														<tbody>
 															<?php

																include 'koneksi.php';
																// $tanggal_cari = date("Y-m-d", strtotime("2021-08-05"));
																$date_now = $tanggal_cari;

																$data_kinerja_nilai = array();
																$sql_cek = mysqli_query($conn, "SELECT user_id,ani FROM app_kinerja_nilai WHERE tanggal= '$date_now'");

																//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																$angka1 = 0;
																while ($row1 = mysqli_fetch_row($sql_cek)) {
																	$data_kinerja_nilai[$angka1] = array($row1[0], $row1[1]);

																	$angka1++;
																}

																$data_jadi = array();
																// $sql_qco = mysqli_query($conn, "SELECT qco,agent FROM app_kinerja_ideas WHERE tanggal= '$date_now'");

																// //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																// $angka_qco = 0;
																// $total_agent = mysqli_num_rows($sql_qco);
																// while ($row_qco = mysqli_fetch_row($sql_qco)) {
																// 	$data_jadi[$angka_qco] = array($row_qco[0], $row_qco[1]);

																// 	$angka_qco++;
																// }
																include 'koneksi2.php';

																$qq = date('m', strtotime($tanggal_cari));
																$q = date('Y-m', strtotime($tanggal_cari));


																// $date1 = str_replace('-', '/', $date);
																$date1 = str_replace('-', '/', $tanggal_cari);
																$yesterday = date('Y-m-d', strtotime($date1 . "-1 days"));
																$range_tanggal1 = $yesterday . " 00:00:00";
																$range_tanggal2 = $yesterday . " 23:59:59";
																$range_date = date('d', strtotime($date1 . "-1 days"));
																$range_month = date('m', strtotime($date1 . "-1 days"));
																$range_year = date('Y', strtotime($date1 . "-1 days"));

																$no = 1;
																$data = array();
																$i = 0;
																$data_agent = array();
																while ($qq <= date('m')) {
																	if($range_date >= 9 AND $range_date <= 20) {

																	// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																	$sql = mysqli_query($conn, "
            					(SELECT t.UPD_AGENT,t.NAMA_MASTER,t.ALAMAT_MASTER,t.NO_KONTAK,t.TGL_CALL,t.HUB_PENERIMA,t.PENERIMA,t.TRANS_ID,td.TGL_JANJI_BAYAR,td.KENDALA FROM TRANS AS t INNER JOIN TRANS_DETAIL AS td ON t.TRANS_ID = td.TRANS_ID  
            					WHERE t.STATUS_CALL='CONTACTED' AND t.REASON_CALL ='SETUJU' AND t.LUP between '$range_tanggal1' and '$range_tanggal2' 
								
            					GROUP BY t.UPD_AGENT HAVING COUNT(*) < 3 ORDER BY COUNT(*) ASC)

            					UNION 

            					(SELECT f.UPD_AGENT,f.NAMA_MASTER,f.ALAMAT_MASTER,f.NO_KONTAK,f.TGL_CALL,f.HUB_PENERIMA,f.PENERIMA,f.TRANS_ID,ttd.TGL_JANJI_BAYAR,ttd.KENDALA
								FROM 
															(SELECT d.UPD_AGENT,d.NAMA_MASTER,d.ALAMAT_MASTER,d.NO_KONTAK,d.TGL_CALL,d.HUB_PENERIMA,d.PENERIMA,d.TRANS_ID
												FROM TRANS AS d  
															INNER JOIN TRANS_DETAIL as td
															ON d.TRANS_ID = td.TRANS_ID
												JOIN (										
																		SELECT max(d.NO_KONTAK) AS m, d.UPD_AGENT
															FROM TRANS as d
																		INNER JOIN TRANS_DETAIL as td 
																		ON d.TRANS_ID = td.TRANS_ID
															JOIN (
																					SELECT max(t1.NO_KONTAK) AS m, t1.UPD_AGENT
																					FROM TRANS as t1 INNER JOIN TRANS_DETAIL as td1 ON t1.TRANS_ID = td1.TRANS_ID 
																					WHERE t1.STATUS_CALL='CONTACTED' AND t1.REASON_CALL ='SETUJU' AND t1.LUP between '$range_tanggal1' and '$range_tanggal2'
																					AND td1.PRODUCT_STATUS=''
																					AND MONTH(t1.LUP) = '$range_month'
																					AND YEAR(t1.LUP) = '$range_year'
																					GROUP BY t1.UPD_AGENT
															) AS e 
																		ON d.UPD_AGENT=e.UPD_AGENT AND e.m > d.NO_KONTAK 
																		WHERE d.STATUS_CALL='CONTACTED' 
																		AND d.REASON_CALL ='SETUJU' 
																		AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
																	
																		AND MONTH(d.LUP) = '$range_month'
																	AND YEAR(d.LUP) = '$range_year'
																		GROUP BY d.UPD_AGENT ASC
														) AS e 
														ON d.NO_KONTAK >= e.m AND d.UPD_AGENT = e.UPD_AGENT 
											WHERE d.STATUS_CALL='CONTACTED' 
														AND d.REASON_CALL ='SETUJU' 
														AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
										
														AND MONTH(d.LUP) = '$range_month'
														AND YEAR(d.LUP) = '$range_year'
														ORDER BY d.UPD_AGENT, d.NO_KONTAK ASC) AS f 
								JOIN TRANS_DETAIL AS ttd 
								ON f.TRANS_ID= ttd.TRANS_ID
								GROUP BY f.TRANS_ID ORDER BY f.UPD_AGENT ASC)");
																	}
																	else {
																		$sql = mysqli_query($conn, "
            					(SELECT t.UPD_AGENT,t.NAMA_MASTER,t.ALAMAT_MASTER,t.NO_KONTAK,t.TGL_CALL,t.HUB_PENERIMA,t.PENERIMA,t.TRANS_ID,td.TGL_JANJI_BAYAR,td.KENDALA FROM TRANS AS t INNER JOIN TRANS_DETAIL AS td ON t.TRANS_ID = td.TRANS_ID  
            					WHERE t.STATUS_CALL='CONTACTED' AND t.REASON_CALL ='SETUJU' AND t.LUP between '$range_tanggal1' and '$range_tanggal2' 
								AND td.PRODUCT_STATUS = 'JANJI MAU BAYAR'
            					GROUP BY t.UPD_AGENT HAVING COUNT(*) < 3 ORDER BY COUNT(*) ASC)

            					UNION 

            					(SELECT f.UPD_AGENT,f.NAMA_MASTER,f.ALAMAT_MASTER,f.NO_KONTAK,f.TGL_CALL,f.HUB_PENERIMA,f.PENERIMA,f.TRANS_ID,ttd.TGL_JANJI_BAYAR,ttd.KENDALA
								FROM 
															(SELECT d.UPD_AGENT,d.NAMA_MASTER,d.ALAMAT_MASTER,d.NO_KONTAK,d.TGL_CALL,d.HUB_PENERIMA,d.PENERIMA,d.TRANS_ID
												FROM TRANS AS d  
															INNER JOIN TRANS_DETAIL as td
															ON d.TRANS_ID = td.TRANS_ID
												JOIN (										
																		SELECT max(d.NO_KONTAK) AS m, d.UPD_AGENT
															FROM TRANS as d
																		INNER JOIN TRANS_DETAIL as td 
																		ON d.TRANS_ID = td.TRANS_ID
															JOIN (
																					SELECT max(t1.NO_KONTAK) AS m, t1.UPD_AGENT
																					FROM TRANS as t1 INNER JOIN TRANS_DETAIL as td1 ON t1.TRANS_ID = td1.TRANS_ID 
																					WHERE t1.STATUS_CALL='CONTACTED' AND t1.REASON_CALL ='SETUJU' AND t1.LUP between '$range_tanggal1' and '$range_tanggal2'
																					AND td1.PRODUCT_STATUS=''
																					AND MONTH(t1.LUP) = '$range_month'
																					AND YEAR(t1.LUP) = '$range_year'
																					GROUP BY t1.UPD_AGENT
															) AS e 
																		ON d.UPD_AGENT=e.UPD_AGENT AND e.m > d.NO_KONTAK 
																		WHERE d.STATUS_CALL='CONTACTED' 
																		AND d.REASON_CALL ='SETUJU' 
																		AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
																		AND td.PRODUCT_STATUS = 'JANJI MAU BAYAR'
																		AND MONTH(d.LUP) = '$range_month'
																	AND YEAR(d.LUP) = '$range_year'
																		GROUP BY d.UPD_AGENT ASC
														) AS e 
														ON d.NO_KONTAK >= e.m AND d.UPD_AGENT = e.UPD_AGENT 
											WHERE d.STATUS_CALL='CONTACTED' 
														AND d.REASON_CALL ='SETUJU' 
														AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
											AND td.PRODUCT_STATUS = ''
														AND MONTH(d.LUP) = '$range_month'
														AND YEAR(d.LUP) = '$range_year'
														ORDER BY d.UPD_AGENT, d.NO_KONTAK ASC) AS f 
								JOIN TRANS_DETAIL AS ttd 
								ON f.TRANS_ID= ttd.TRANS_ID AND ttd.PRODUCT_STATUS = 'JANJI MAU BAYAR' 
								GROUP BY f.TRANS_ID ORDER BY f.UPD_AGENT ASC)");
																	}

																	//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																	while ($row = mysqli_fetch_row($sql)) {
																		# code...																	
																		$data[$i] = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
																		// $data_agent[$i] = array($row[0]);
																		array_push($data_agent, trim($row[0]));
																		
																		$i++;

																		$no++;
																	}


																	$qq++;
																	$q--;
																}
																
																include 'koneksi.php';
																$data_agent_fix = array();

																array_multisort($data_agent);
																$data_agent_unik = array_unique($data_agent);
																shuffle($data_agent_unik);
																// print_r($data);
																$sql_cuti = mysqli_query($conn, "SELECT id, username, nama, tanggal, keterangan FROM app_kinerja_cuti WHERE tanggal = '$date_now'");
																$total_cuti = mysqli_num_rows($sql_cuti);
																$pkatt = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_ideas WHERE tanggal = '$date_now'");
																$total_tanggal = mysqli_num_rows($pkatt);
																// print_r($data_agent);
																if ($total_tanggal == 0) {

																	$query = '';
																	if ($total_cuti > 0) {
																		while ($tampil_cuti = mysqli_fetch_row($sql_cuti)) {
																			$query .= " and b.user1 <> '" . $tampil_cuti[1] . "'";
																			$i++;
																		}

																		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' $query");
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

																	$k = 0;
																	$array1 = array();
																	$total2 = COUNT($data_agent_unik);
																	while ($k < $total2) {
																		$pkatt2 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user1='" . $data_agent_unik[$k] . "'");
																		while ($ckatt2 = mysqli_fetch_row($pkatt2)) {
																			$array1[$k] = array($ckatt2['1'], $ckatt2['4'], $date_now);
																		}
																		$k++;
																	}

																	
																	$random = array();
																	$numbers = range(0, ($k - 1));
																	shuffle($numbers);
																	$random = array_slice($numbers, 0, $k);
																	$total = floor($total2 / $total1);
																	// 	$data = array();
																	$no_agent = 0;
																	$mod = 0;
																	if ($total2 % $total1 != 0) {
																		$mod = $total2 % $total1;
																		// $k -= $mod - 1;
																	}

																	for ($i = 0; $i < $total1; $i++) {
																		for ($j = 0; $j < $total; $j++) {

																			$parameter1 = $array1[$random[$no_agent]][0];
																			$parameter2 = $array1[$random[$no_agent]][1];
																			$parameter3 = $array1[$random[$no_agent]][2];

																			$data_agent_fix[$no_agent] = array($nama_qco[$i], $parameter1, $parameter2, $parameter3);
																			$sql_insert_agent = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nama_qco[$i]','$parameter1','$parameter2','$parameter3')";

																			mysqli_query($conn, $sql_insert_agent);

																			$no_agent++;
																		}
																	}

																	$angka_acak = 0;
																	$random_lebih = array();
																	$range_angka = range(0, ($total1 - 1));
																	shuffle($range_angka);
																	$random_lebih = array_slice($range_angka, 0, $mod);

																	if ($mod != '') {
																		$k -= $mod;

																		for ($i = $k; $i < $total2; $i++) {
																			$parameter1 = $array1[$random[$no_agent]][0];
																			$parameter2 = $array1[$random[$no_agent]][1];
																			$parameter3 = $array1[$random[$no_agent]][2];
																			$data_agent_fix[$i] = array($nama_qco[$random_lebih[$angka_acak]], $parameter1, $parameter2, $parameter3);
																			$nqco = $nama_qco[$random_lebih[$angka_acak]];
																			$sql_insert_agent_mod = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nqco','$parameter1','$parameter2','$parameter3')";

																			mysqli_query($conn, $sql_insert_agent_mod);
																			$no_agent++;
																			$angka_acak++;
																		}
																	}

																	for ($h = 0; $h < COUNT($data_agent_fix); $h++) {
																		$data_jadi[$h] = array($data_agent_fix[$h][1], $data_agent_fix[$h][2]);
																	}
																} else {
																	$sql_qco = mysqli_query($conn, "SELECT qco,agent FROM app_kinerja_ideas WHERE tanggal= '$date_now' AND qco= '$nama_login'");

																	//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																	$angka_qco = 0;
																	$total_agent = mysqli_num_rows($sql_qco);
																	while ($row_qco = mysqli_fetch_row($sql_qco)) {
																		$data_jadi[$angka_qco] = array($row_qco[0], $row_qco[1]);

																		$angka_qco++;
																	}
																}
																
																// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																/*sampai sini*/
																

																$data_fix = array();
																
																
																if ($data_kinerja_nilai[0] == 0) {
																// if (count($data_kinerja_nilai) == 0) {
																	
																	for ($i = 0; $i < $no; $i++) {
																		for ($j = 0; $j < $total_agent; $j++) {
																			$text_data = str_replace(' ', '', $data[$i][0]);
																			if ($data_jadi[$j][1] == $text_data and $_SESSION['name'] == $data_jadi[$j][0]) {

																				$data_fix[$i] = array($text_data, $data[$i][1], $data[$i][2], $data[$i][3], $data[$i][4], $data[$i][5], $data[$i][6], $data[$i][7], $data[$i][8], $data[$i][9]);
																				
																			}
																		}
																		// $data_fix[$i]=$data[$i];
																	}
																} else {
																	
																	for ($i = 0; $i < ($no-1); $i++) {
																		$cek = true;
																		for ($j = 0; $j < $angka1; $j++) {
																			$text_data = str_replace(' ', '', $data[$i][0]);
																			if ($data_kinerja_nilai[$j][0] != $text_data and $data_kinerja_nilai[$j][1] != $data[$i][3]) {
																				if ($j == $angka1 - 1 and $cek == true) {
																					for ($k = 0; $k < $total_agent; $k++) {
																						
																						// print_r($text_data.' == '.$data_jadi[$k][1].'<br>');
																						// print_r($text_data.' '.$data_jadi[$k][1].'<br>');
                                                                                    	if ($text_data == $data_jadi[$k][1]) {
																							$data_fix[$i] = array($text_data, $data[$i][1], $data[$i][2], $data[$i][3], $data[$i][4], $data[$i][5], $data[$i][6], $data[$i][7], $data[$i][8], $data[$i][9]);
																						}
																					}
																				}
																			} else {
																				$cek = false;
																			}
																			if ($cek == false) {
																				break;
																			}
																		}
																	}
																}
																


																// $date_now = date("Y-m-d");
																array_multisort($data_fix, SORT_ASC);

																$angka2 = 1;
																for ($i = 0; $i < $no; $i++) {
																	if (
																		$data_fix[$i][0] != ""
																		and $data_fix[$i][3] != ""
																	) {
																		// for($j=0;$j<$angka1-1;$j--){
																		// if($data_kinerja_nilai[$j][0] != $data[$i][1] AND $data_kinerja_nilai[$j][1] != $data[$i][4]){
																?>
 																	<tr class="odd gradeX">


 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo $angka2; ?></font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][0]; ?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][1]; ?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][2]; ?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][3]; ?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo date("D, d F Y H:i:s", strtotime($data_fix[$i][4])); ?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][5]; ?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][6]; ?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt">
 																				<?php
																					if ($data_fix[$i][8] == "0000-00-00 00:00:00") {
																						echo $data_fix[$i][8];
																					} else {
																						echo date("D, d F Y H:i:s", strtotime($data_fix[$i][8]));
																					}
																					?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][9]; ?>
 																			</font>
 																		</td>
 																		<td style="padding-top: 2px; padding-bottom: 2px">
 																			<a href="form_ideas_detail.php?agent=<?php echo $data_fix[$i][0]; ?>&telp=<?php echo $data_fix[$i][3]; ?>&id=<?php echo $data_fix[$i][7]; ?>" class="btn btn-primary btn-sm">Detail</a>
 																		</td>


 																	</tr>
 																<?php

																		$angka2++;
																	}
																}


																// $tgl_sebelumnya = date("Y-m-d", strtotime('-1 day', strtotime($date_now)));
																// $sql_nilai_ideas_kosong = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_ideas WHERE tanggal= '$tgl_sebelumnya'");
																// $total_nilai_ideas_kosong = mysqli_num_rows($sql_nilai_ideas_kosong);

																// $tgl_dua_sebelumnya = date("Y-m-d", strtotime('-2 day', strtotime($date_now)));
																// $sql_nilai_ideas_kosong_dua = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_ideas WHERE tanggal= '$tgl_dua_sebelumnya'");
																// $total_nilai_ideas_kosong_dua = mysqli_num_rows($sql_nilai_ideas_kosong);

																// $sql_cuti_satu = mysqli_query($conn, "SELECT id, username, nama, tanggal, keterangan FROM app_kinerja_cuti WHERE tanggal = '$tgl_sebelumnya'");
																// $total_cuti_satu = mysqli_num_rows($sql_cuti_satu);

																// $sql_cuti_dua = mysqli_query($conn, "SELECT id, username, nama, tanggal, keterangan FROM app_kinerja_cuti WHERE tanggal = '$tgl_dua_sebelumnya'");
																// $total_cuti_dua = mysqli_num_rows($sql_cuti_dua);

																// if ($total_nilai_ideas_kosong == 0) {

																// 	$query = '';
																// 	if ($total_cuti > 0) {
																// 		while ($tampil_cuti = mysqli_fetch_row($sql_cuti_satu)) {
																// 			$query .= " and b.user1 <> '" . $tampil_cuti[1] . "'";
																// 			$i++;
																// 		}

																// 		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' $query");
																// 	} else {
																// 		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");
																// 	}

																// 	$i = 0;
																// 	$nama_qco = array();
																// 	$total1 = mysqli_num_rows($pkatt1);
																// 	while ($ckatt1 = mysqli_fetch_row($pkatt1)) {
																// 		$nama_qco[$i] = $ckatt1[2];
																// 		$i++;
																// 	}

																// 	$k = 0;
																// 	$array1 = array();
																// 	$total2 = COUNT($data_agent_unik);
																// 	while ($k < $total2) {
																// 		$pkatt2 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user1='" . $data_agent_unik[$k] . "'");
																// 		while ($ckatt2 = mysqli_fetch_row($pkatt2)) {
																// 			$array1[$k] = array($ckatt2['1'], $ckatt2['4'], $tgl_sebelumnya);
																// 		}
																// 		$k++;
																// 	}

																// 	$random = array();
																// 	$numbers = range(0, ($k - 1));
																// 	shuffle($numbers);
																// 	$random = array_slice($numbers, 0, $k);
																// 	$total = floor($total2 / $total1);
																// 	// 	$data = array();
																// 	$no_agent = 0;
																// 	$mod = 0;
																// 	if ($total2 % $total1 != 0) {
																// 		$mod = $total2 % $total1;
																// 		// $k -= $mod - 1;
																// 	}

																// 	for ($i = 0; $i < $total1; $i++) {
																// 		for ($j = 0; $j < $total; $j++) {

																// 			$parameter1 = $array1[$random[$no_agent]][0];
																// 			$parameter2 = $array1[$random[$no_agent]][1];
																// 			$parameter3 = $array1[$random[$no_agent]][2];

																// 			$data_agent_fix[$no_agent] = array($nama_qco[$i], $parameter1, $parameter2, $parameter3);
																// 			$sql_insert_agent = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nama_qco[$i]','$parameter1','$parameter2','$parameter3')";

																// 			mysqli_query($conn, $sql_insert_agent);

																// 			$no_agent++;
																// 		}
																// 	}
																// 	$angka_acak = 0;
																// 	$random_lebih = array();
																// 	$range_angka = range(0, ($total1 - 1));
																// 	shuffle($range_angka);
																// 	$random_lebih = array_slice($range_angka, 0, $mod);
																// 	if ($mod != '') {
																// 		$k -= $mod;
																// 		for ($i = $k; $i < $total2; $i++) {
																// 			$parameter1 = $array1[$random[$no_agent]][0];
																// 			$parameter2 = $array1[$random[$no_agent]][1];
																// 			$parameter3 = $array1[$random[$no_agent]][2];
																// 			$data_agent_fix[$i] = array($nama_qco[$random_lebih[$angka_acak]], $parameter1, $parameter2, $parameter3);
																// 			$nqco = $nama_qco[$random_lebih[$angka_acak]];
																// 			$sql_insert_agent_mod = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nqco','$parameter1','$parameter2','$parameter3')";

																// 			mysqli_query($conn, $sql_insert_agent_mod);
																// 			$no_agent++;
																// 			$angka_acak++;
																// 		}
																// 	}
																// 	for ($h = 0; $h < COUNT($data_agent_fix); $h++) {
																// 		$data_jadi[$h] = array($data_agent_fix[$h][1], $data_agent_fix[$h][2]);
																// 	}
																// 	print_r($data_jadi);
																// }

																// if ($total_nilai_ideas_kosong_dua == 0) {

																// 	$query = '';
																// 	if ($total_cuti > 0) {
																// 		while ($tampil_cuti = mysqli_fetch_row($sql_cuti_dua)) {
																// 			$query .= " and b.user1 <> '" . $tampil_cuti[1] . "'";
																// 			$i++;
																// 		}

																// 		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' $query");
																// 	} else {
																// 		$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' and b.user1 <> '' and b.id <> '213' and b.id <> '48554'");
																// 	}

																// 	$i = 0;
																// 	$nama_qco = array();
																// 	$total1 = mysqli_num_rows($pkatt1);
																// 	while ($ckatt1 = mysqli_fetch_row($pkatt1)) {
																// 		$nama_qco[$i] = $ckatt1[2];
																// 		$i++;
																// 	}

																// 	$k = 0;
																// 	$array1 = array();
																// 	$total2 = COUNT($data_agent_unik);
																// 	while ($k < $total2) {
																// 		$pkatt2 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user1='" . $data_agent_unik[$k] . "'");
																// 		while ($ckatt2 = mysqli_fetch_row($pkatt2)) {
																// 			$array1[$k] = array($ckatt2['1'], $ckatt2['4'], $tgl_dua_sebelumnya);
																// 		}
																// 		$k++;
																// 	}

																// 	$random = array();
																// 	$numbers = range(0, ($k - 1));
																// 	shuffle($numbers);
																// 	$random = array_slice($numbers, 0, $k);
																// 	$total = floor($total2 / $total1);
																// 	// 	$data = array();
																// 	$no_agent = 0;
																// 	$mod = 0;
																// 	if ($total2 % $total1 != 0) {
																// 		$mod = $total2 % $total1;
																// 		// $k -= $mod - 1;
																// 	}

																// 	for ($i = 0; $i < $total1; $i++) {
																// 		for ($j = 0; $j < $total; $j++) {

																// 			$parameter1 = $array1[$random[$no_agent]][0];
																// 			$parameter2 = $array1[$random[$no_agent]][1];
																// 			$parameter3 = $array1[$random[$no_agent]][2];

																// 			$data_agent_fix[$no_agent] = array($nama_qco[$i], $parameter1, $parameter2, $parameter3);
																// 			$sql_insert_agent = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nama_qco[$i]','$parameter1','$parameter2','$parameter3')";

																// 			mysqli_query($conn, $sql_insert_agent);

																// 			$no_agent++;
																// 		}
																// 	}
																// 	$angka_acak = 0;
																// 	$random_lebih = array();
																// 	$range_angka = range(0, ($total1 - 1));
																// 	shuffle($range_angka);
																// 	$random_lebih = array_slice($range_angka, 0, $mod);
																// 	if ($mod != '') {
																// 		$k -= $mod;
																// 		for ($i = $k; $i < $total2; $i++) {
																// 			$parameter1 = $array1[$random[$no_agent]][0];
																// 			$parameter2 = $array1[$random[$no_agent]][1];
																// 			$parameter3 = $array1[$random[$no_agent]][2];
																// 			$data_agent_fix[$i] = array($nama_qco[$random_lebih[$angka_acak]], $parameter1, $parameter2, $parameter3);
																// 			$nqco = $nama_qco[$random_lebih[$angka_acak]];
																// 			$sql_insert_agent_mod = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nqco','$parameter1','$parameter2','$parameter3')";

																// 			mysqli_query($conn, $sql_insert_agent_mod);
																// 			$no_agent++;
																// 			$angka_acak++;
																// 		}
																// 	}
																// 	for ($h = 0; $h < COUNT($data_agent_fix); $h++) {
																// 		$data_jadi[$h] = array($data_agent_fix[$h][1], $data_agent_fix[$h][2]);
																// 	}
																// }

																if ($date_sekarang == date("D", strtotime("Mon"))) {
																	$date_minggu = date("Y-m-d", strtotime('-1 day', strtotime($tanggal_cari)));
																	$date_sabtu = date("Y-m-d", strtotime('-2 day', strtotime($tanggal_cari)));
																	?>
 																<tr class="odd gradeX">
 																	<td colspan="10">
 																		<h5>Tanggal : <?= date("l, d F Y", strtotime($date_minggu)) ?></h5>
 																	</td>
 																</tr>
 																<?php

																	include 'koneksi.php';
																	$data_kinerja_nilai = array();
																	$sql_cek = mysqli_query($conn, "SELECT user_id,ani FROM app_kinerja_nilai WHERE tanggal= '$date_minggu'");

																	//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																	$angka1 = 0;
																	while ($row1 = mysqli_fetch_row($sql_cek)) {
																		$data_kinerja_nilai[$angka1] = array($row1[0], $row1[1]);
																		$angka1++;
																	}


																	$data_jadi = array();



																	include 'koneksi2.php';


																	$qq = date('m', strtotime($date_minggu));
																	$q = date('Y-m', strtotime($date_minggu));


																	// $date1 = str_replace('-', '/', $date);
																	$date1 = str_replace('-', '/', $date_minggu);
																	$yesterday = date('Y-m-d', strtotime($date1 . "-1 days"));
																	$range_tanggal1 = $yesterday . " 00:00:00";
																	$range_tanggal2 = $yesterday . " 23:59:59";
																	$range_date = date('d',strtotime($date1 . "-1 days"));
																	$range_month = date('m',strtotime($date1 . "-1 days"));
																	$range_year = date('Y', strtotime($date1 . "-1 days"));

																	$no = 1;
																	$data = array();
																	$i = 0;
																	$data_agent = array();
																	while ($qq <= date('m')) {

																		if($range_date >= 9 AND $range_date <= 20) {
																		// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
									$sql = mysqli_query($conn, "
            					(SELECT t.UPD_AGENT,t.NAMA_MASTER,t.ALAMAT_MASTER,t.NO_KONTAK,t.TGL_CALL,t.HUB_PENERIMA,t.PENERIMA,t.TRANS_ID,td.TGL_JANJI_BAYAR,td.KENDALA FROM TRANS AS t INNER JOIN TRANS_DETAIL AS td ON t.TRANS_ID = td.TRANS_ID  
            					WHERE t.STATUS_CALL='CONTACTED' AND t.REASON_CALL ='SETUJU' AND t.LUP between '$range_tanggal1' and '$range_tanggal2' 
								
            					GROUP BY t.UPD_AGENT HAVING COUNT(*) < 3 ORDER BY COUNT(*) ASC)

            					UNION 

            					(SELECT f.UPD_AGENT,f.NAMA_MASTER,f.ALAMAT_MASTER,f.NO_KONTAK,f.TGL_CALL,f.HUB_PENERIMA,f.PENERIMA,f.TRANS_ID,ttd.TGL_JANJI_BAYAR,ttd.KENDALA
								FROM 
															(SELECT d.UPD_AGENT,d.NAMA_MASTER,d.ALAMAT_MASTER,d.NO_KONTAK,d.TGL_CALL,d.HUB_PENERIMA,d.PENERIMA,d.TRANS_ID
												FROM TRANS AS d  
															INNER JOIN TRANS_DETAIL as td
															ON d.TRANS_ID = td.TRANS_ID
												JOIN (										
																		SELECT max(d.NO_KONTAK) AS m, d.UPD_AGENT
															FROM TRANS as d
																		INNER JOIN TRANS_DETAIL as td 
																		ON d.TRANS_ID = td.TRANS_ID
															JOIN (
																					SELECT max(t1.NO_KONTAK) AS m, t1.UPD_AGENT
																					FROM TRANS as t1 INNER JOIN TRANS_DETAIL as td1 ON t1.TRANS_ID = td1.TRANS_ID 
																					WHERE t1.STATUS_CALL='CONTACTED' AND t1.REASON_CALL ='SETUJU' AND t1.LUP between '$range_tanggal1' and '$range_tanggal2'
																					
																					AND MONTH(t1.LUP) = '$range_month'
																					AND YEAR(t1.LUP) = '$range_year'
																					GROUP BY t1.UPD_AGENT
															) AS e 
																		ON d.UPD_AGENT=e.UPD_AGENT AND e.m > d.NO_KONTAK 
																		WHERE d.STATUS_CALL='CONTACTED' 
																		AND d.REASON_CALL ='SETUJU' 
																		AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
																	
																		AND MONTH(d.LUP) = '$range_month'
																	AND YEAR(d.LUP) = '$range_year'
																		GROUP BY d.UPD_AGENT ASC
														) AS e 
														ON d.NO_KONTAK >= e.m AND d.UPD_AGENT = e.UPD_AGENT 
											WHERE d.STATUS_CALL='CONTACTED' 
														AND d.REASON_CALL ='SETUJU' 
														AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
											
														AND MONTH(d.LUP) = '$range_month'
														AND YEAR(d.LUP) = '$range_year'
														ORDER BY d.UPD_AGENT, d.NO_KONTAK ASC) AS f 
								JOIN TRANS_DETAIL AS ttd 
								ON f.TRANS_ID= ttd.TRANS_ID
								GROUP BY f.TRANS_ID ORDER BY f.UPD_AGENT ASC)");
																		}
																		else {
																			$sql = mysqli_query($conn, "
            					(SELECT t.UPD_AGENT,t.NAMA_MASTER,t.ALAMAT_MASTER,t.NO_KONTAK,t.TGL_CALL,t.HUB_PENERIMA,t.PENERIMA,t.TRANS_ID,td.TGL_JANJI_BAYAR,td.KENDALA FROM TRANS AS t INNER JOIN TRANS_DETAIL AS td ON t.TRANS_ID = td.TRANS_ID  
            					WHERE t.STATUS_CALL='CONTACTED' AND t.REASON_CALL ='SETUJU' AND t.LUP between '$range_tanggal1' and '$range_tanggal2' 
								AND td.PRODUCT_STATUS = 'JANJI MAU BAYAR'
            					GROUP BY t.UPD_AGENT HAVING COUNT(*) < 3 ORDER BY COUNT(*) ASC)

            					UNION 

            					(SELECT f.UPD_AGENT,f.NAMA_MASTER,f.ALAMAT_MASTER,f.NO_KONTAK,f.TGL_CALL,f.HUB_PENERIMA,f.PENERIMA,f.TRANS_ID,ttd.TGL_JANJI_BAYAR,ttd.KENDALA
								FROM 
															(SELECT d.UPD_AGENT,d.NAMA_MASTER,d.ALAMAT_MASTER,d.NO_KONTAK,d.TGL_CALL,d.HUB_PENERIMA,d.PENERIMA,d.TRANS_ID
												FROM TRANS AS d  
															INNER JOIN TRANS_DETAIL as td
															ON d.TRANS_ID = td.TRANS_ID
												JOIN (										
																		SELECT max(d.NO_KONTAK) AS m, d.UPD_AGENT
															FROM TRANS as d
																		INNER JOIN TRANS_DETAIL as td 
																		ON d.TRANS_ID = td.TRANS_ID
															JOIN (
																					SELECT max(t1.NO_KONTAK) AS m, t1.UPD_AGENT
																					FROM TRANS as t1 INNER JOIN TRANS_DETAIL as td1 ON t1.TRANS_ID = td1.TRANS_ID 
																					WHERE t1.STATUS_CALL='CONTACTED' AND t1.REASON_CALL ='SETUJU' AND t1.LUP between '$range_tanggal1' and '$range_tanggal2'
																					AND td1.PRODUCT_STATUS='JANJI MAU BAYAR'
																					AND MONTH(t1.LUP) = '$range_month'
																					AND YEAR(t1.LUP) = '$range_year'
																					GROUP BY t1.UPD_AGENT
															) AS e 
																		ON d.UPD_AGENT=e.UPD_AGENT AND e.m > d.NO_KONTAK 
																		WHERE d.STATUS_CALL='CONTACTED' 
																		AND d.REASON_CALL ='SETUJU' 
																		AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
																		AND td.PRODUCT_STATUS = 'JANJI MAU BAYAR'
																		AND MONTH(d.LUP) = '$range_month'
																	AND YEAR(d.LUP) = '$range_year'
																		GROUP BY d.UPD_AGENT ASC
														) AS e 
														ON d.NO_KONTAK >= e.m AND d.UPD_AGENT = e.UPD_AGENT 
											WHERE d.STATUS_CALL='CONTACTED' 
														AND d.REASON_CALL ='SETUJU' 
														AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
											AND td.PRODUCT_STATUS = 'JANJI MAU BAYAR'
														AND MONTH(d.LUP) = '$range_month'
														AND YEAR(d.LUP) = '$range_year'
														ORDER BY d.UPD_AGENT, d.NO_KONTAK ASC) AS f 
								JOIN TRANS_DETAIL AS ttd 
								ON f.TRANS_ID= ttd.TRANS_ID AND ttd.PRODUCT_STATUS = 'JANJI MAU BAYAR' 
								GROUP BY f.TRANS_ID ORDER BY f.UPD_AGENT ASC)");
																		}

																		//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																		while ($row = mysqli_fetch_row($sql)) {
																			# code...																	
																			$data[$i] = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);

																			array_push($data_agent, trim($row[0]));
																			$i++;

																			$no++;
																		}


																		$qq++;
																		$q--;
																	}

																	include 'koneksi.php';
																	$data_agent_fix = array();
																	array_multisort($data_agent);
																	$data_agent_unik = array_unique($data_agent);
																	shuffle($data_agent_unik);
																	$sql_cuti_minggu = mysqli_query($conn, "SELECT id, username, nama, tanggal, keterangan FROM app_kinerja_cuti WHERE tanggal = '$date_minggu'");
																	$total_cuti = mysqli_num_rows($sql_cuti_minggu);
																	$pkatt = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_ideas WHERE tanggal = '$date_minggu'");
																	$total_tanggal = mysqli_num_rows($pkatt);
																	if ($total_tanggal == 0) {

																		$query = '';
																		if ($total_cuti > 0) {
																			while ($tampil_cuti = mysqli_fetch_row($sql_cuti_minggu)) {
																				$query .= " and b.user1 <> '" . $tampil_cuti[1] . "'";
																				$i++;
																			}

																			$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' $query");
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

																		$k = 0;
																		$array1 = array();
																		$total2 = COUNT($data_agent_unik);
																		while ($k < $total2) {
																			$pkatt2 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user1='" . $data_agent_unik[$k] . "'");
																			while ($ckatt2 = mysqli_fetch_row($pkatt2)) {
																				$array1[$k] = array($ckatt2['1'], $ckatt2['4'], date("Y-m-d"));
																			}
																			$k++;
																		}

																		$random = array();
																		$numbers = range(0, ($k - 1));
																		shuffle($numbers);
																		$random = array_slice($numbers, 0, $k);
																		$total = floor($total2 / $total1);
																		// 	$data = array();
																		$no_agent = 0;
																		$mod = 0;
																		if ($total2 % $total1 != 0) {
																			$mod = $total2 % $total1;
																			// $k -= $mod - 1;
																		}

																		for ($i = 0; $i < $total1; $i++) {
																			for ($j = 0; $j < $total; $j++) {

																				$parameter1 = $array1[$random[$no_agent]][0];
																				$parameter2 = $array1[$random[$no_agent]][1];
																				$parameter3 = $array1[$random[$no_agent]][2];

																				$data_agent_fix[$no_agent] = array($nama_qco[$i], $parameter1, $parameter2, $parameter3);
																				$sql_insert_agent = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nama_qco[$i]','$parameter1','$parameter2','$parameter3')";

																				mysqli_query($conn, $sql_insert_agent);

																				$no_agent++;
																			}
																		}
																		$angka_acak = 0;
																		$random_lebih = array();
																		$range_angka = range(0, ($total1 - 1));
																		shuffle($range_angka);
																		$random_lebih = array_slice($range_angka, 0, $mod);
																		if ($mod != '') {
																			$k -= $mod;
																			for ($i = $k; $i < $total2; $i++) {
																				$parameter1 = $array1[$random[$no_agent]][0];
																				$parameter2 = $array1[$random[$no_agent]][1];
																				$parameter3 = $array1[$random[$no_agent]][2];
																				$data_agent_fix[$i] = array($nama_qco[$random_lebih[$angka_acak]], $parameter1, $parameter2, $parameter3);
																				$nqco = $nama_qco[$random_lebih[$angka_acak]];
																				$sql_insert_agent_mod = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nqco','$parameter1','$parameter2','$parameter3')";

																				mysqli_query($conn, $sql_insert_agent_mod);
																				$no_agent++;
																				$angka_acak++;
																			}
																		}
																		for ($h = 0; $h < COUNT($data_agent_fix); $h++) {
																			$data_jadi[$h] = array($data_agent_fix[$h][1], $data_agent_fix[$h][2]);
																		}
																		// print_r($data_jadi);
																	} else {
																		$sql_qco = mysqli_query($conn, "SELECT qco,agent FROM app_kinerja_ideas WHERE tanggal= '$date_minggu' AND qco= '$nama_login'");

																		//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																		$angka_qco = 0;
																		$total_agent = mysqli_num_rows($sql_qco);
																		while ($row_qco = mysqli_fetch_row($sql_qco)) {
																			$data_jadi[$angka_qco] = array($row_qco[0], $row_qco[1]);

																			$angka_qco++;
																		}
																	}
																	?>
 																<?php
																	// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																	/*sampai sini*/

																	$data_fix = array();
																	if ($data_kinerja_nilai[0] == 0) {
																		for ($i = 0; $i < $no; $i++) {
																			for ($j = 0; $j < $total_agent; $j++) {
																				$text_data = str_replace(' ', '', $data[$i][0]);
																				if ($data_jadi[$j][1] == $text_data and $_SESSION['name'] == $data_jadi[$j][0]) {

																					$data_fix[$i] = array($text_data, $data[$i][1], $data[$i][2], $data[$i][3], $data[$i][4], $data[$i][5], $data[$i][6], $data[$i][7], $data[$i][8], $data[$i][9]);
																				}
																			}
																			// $data_fix[$i]=$data[$i];
																		}
																	} else {
																		for ($i = 0; $i < ($no-1); $i++) {
																		$cek = true;
																		for ($j = 0; $j < $angka1; $j++) {
																			$text_data = str_replace(' ', '', $data[$i][0]);
																			if ($data_kinerja_nilai[$j][0] != $text_data and $data_kinerja_nilai[$j][1] != $data[$i][3]) {
																				if ($j == $angka1 - 1 and $cek == true) {
																					for ($k = 0; $k < $total_agent; $k++) {

																						
																						// print_r($text_data.' == '.$data_jadi[$k][1].'<br>');
																						
                                                                                    	if ($text_data == $data_jadi[$k][1]) {
																							$data_fix[$i] = array($text_data, $data[$i][1], $data[$i][2], $data[$i][3], $data[$i][4], $data[$i][5], $data[$i][6], $data[$i][7], $data[$i][8], $data[$i][9]);
																						}
																					}
																				}
																			} else {
																				$cek = false;
																			}
																			if ($cek == false) {
																				break;
																			}
																		}
																	}
																	
																}

																	// $date_now = date("Y-m-d");
																	array_multisort($data_fix, SORT_ASC);

																	$angka2 = 1;
																	for ($i = 0; $i < $no; $i++) {
																		if (
																			$data_fix[$i][0] != ""
																			and $data_fix[$i][3] != ""
																		) {
																			// for($j=0;$j<$angka1-1;$j--){
																			// if($data_kinerja_nilai[$j][0] != $data[$i][1] AND $data_kinerja_nilai[$j][1] != $data[$i][4]){
																	?>
 																		<tr class="odd gradeX">


 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $angka2; ?></font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][0]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][1]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][2]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][3]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo date("D, d F Y H:i:s", strtotime($data_fix[$i][4])); ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][5]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][6]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt">
 																					<?php
																						if ($data_fix[$i][8] == "0000-00-00 00:00:00") {
																							echo $data_fix[$i][8];
																						} else {
																							echo date("D, d F Y H:i:s", strtotime($data_fix[$i][8]));
																						}
																						?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][9]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<a href="form_ideas_detail.php?agent=<?php echo $data_fix[$i][0]; ?>&telp=<?php echo $data_fix[$i][3]; ?>&id=<?php echo $data_fix[$i][7]; ?>" class="btn btn-primary btn-sm">Detail</a>
 																			</td>


 																		</tr>
 																<?php

																			$angka2++;
																		}
																	}

																	include 'koneksi.php';
																	$data_kinerja_nilai = array();
																	$sql_cek = mysqli_query($conn, "SELECT user_id,ani FROM app_kinerja_nilai WHERE tanggal= '$date_sabtu'");

																	//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																	$angka1 = 0;
																	while ($row1 = mysqli_fetch_row($sql_cek)) {
																		$data_kinerja_nilai[$angka1] = array($row1[0], $row1[1]);

																		$angka1++;
																	}


																	$data_jadi = array();

																	include 'koneksi2.php';


																	$qq = date('m', strtotime($date_sabtu));
																	$q = date('Y-m', strtotime($date_sabtu));


																	// $date1 = str_replace('-', '/', $date);
																	$date1 = str_replace('-', '/', $date_sabtu);
																	$yesterday = date('Y-m-d', strtotime($date1 . "-1 days"));
																	$range_tanggal1 = $yesterday . " 00:00:00";
																	$range_tanggal2 = $yesterday . " 23:59:59";
																	$range_date = date('d',  strtotime($date1 . "-1 days"));
																	$range_month = date('m',  strtotime($date1 . "-1 days"));
																	$range_year = date('Y',  strtotime($date1 . "-1 days"));

																	$no = 1;
																	$data = array();
																	$i = 0;
																	$data_agent = array();
																	while ($qq <= date('m')) {

																		if($range_date >= 9 AND $range_date <= 20) {
																		// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
											$sql = mysqli_query($conn, "
            					(SELECT t.UPD_AGENT,t.NAMA_MASTER,t.ALAMAT_MASTER,t.NO_KONTAK,t.TGL_CALL,t.HUB_PENERIMA,t.PENERIMA,t.TRANS_ID,td.TGL_JANJI_BAYAR,td.KENDALA FROM TRANS AS t INNER JOIN TRANS_DETAIL AS td ON t.TRANS_ID = td.TRANS_ID  
            					WHERE t.STATUS_CALL='CONTACTED' AND t.REASON_CALL ='SETUJU' AND t.LUP between '$range_tanggal1' and '$range_tanggal2' 
								
            					GROUP BY t.UPD_AGENT HAVING COUNT(*) < 3 ORDER BY COUNT(*) ASC)

            					UNION 

            					(SELECT f.UPD_AGENT,f.NAMA_MASTER,f.ALAMAT_MASTER,f.NO_KONTAK,f.TGL_CALL,f.HUB_PENERIMA,f.PENERIMA,f.TRANS_ID,ttd.TGL_JANJI_BAYAR,ttd.KENDALA
								FROM 
															(SELECT d.UPD_AGENT,d.NAMA_MASTER,d.ALAMAT_MASTER,d.NO_KONTAK,d.TGL_CALL,d.HUB_PENERIMA,d.PENERIMA,d.TRANS_ID
												FROM TRANS AS d  
															INNER JOIN TRANS_DETAIL as td
															ON d.TRANS_ID = td.TRANS_ID
												JOIN (										
																		SELECT max(d.NO_KONTAK) AS m, d.UPD_AGENT
															FROM TRANS as d
																		INNER JOIN TRANS_DETAIL as td 
																		ON d.TRANS_ID = td.TRANS_ID
															JOIN (
																					SELECT max(t1.NO_KONTAK) AS m, t1.UPD_AGENT
																					FROM TRANS as t1 INNER JOIN TRANS_DETAIL as td1 ON t1.TRANS_ID = td1.TRANS_ID 
																					WHERE t1.STATUS_CALL='CONTACTED' AND t1.REASON_CALL ='SETUJU' AND t1.LUP between '$range_tanggal1' and '$range_tanggal2'
																					
																					AND MONTH(t1.LUP) = '$range_month'
																					AND YEAR(t1.LUP) = '$range_year'
																					GROUP BY t1.UPD_AGENT
															) AS e 
																		ON d.UPD_AGENT=e.UPD_AGENT AND e.m > d.NO_KONTAK 
																		WHERE d.STATUS_CALL='CONTACTED' 
																		AND d.REASON_CALL ='SETUJU' 
																		AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
																		
																		AND MONTH(d.LUP) = '$range_month'
																	AND YEAR(d.LUP) = '$range_year'
																		GROUP BY d.UPD_AGENT ASC
														) AS e 
														ON d.NO_KONTAK >= e.m AND d.UPD_AGENT = e.UPD_AGENT 
											WHERE d.STATUS_CALL='CONTACTED' 
														AND d.REASON_CALL ='SETUJU' 
														AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
											
														AND MONTH(d.LUP) = '$range_month'
														AND YEAR(d.LUP) = '$range_year'
														ORDER BY d.UPD_AGENT, d.NO_KONTAK ASC) AS f 
								JOIN TRANS_DETAIL AS ttd 
								ON f.TRANS_ID= ttd.TRANS_ID
								GROUP BY f.TRANS_ID ORDER BY f.UPD_AGENT ASC)");
																		}
																		else {
																			$sql = mysqli_query($conn, "
            					(SELECT t.UPD_AGENT,t.NAMA_MASTER,t.ALAMAT_MASTER,t.NO_KONTAK,t.TGL_CALL,t.HUB_PENERIMA,t.PENERIMA,t.TRANS_ID,td.TGL_JANJI_BAYAR,td.KENDALA FROM TRANS AS t INNER JOIN TRANS_DETAIL AS td ON t.TRANS_ID = td.TRANS_ID  
            					WHERE t.STATUS_CALL='CONTACTED' AND t.REASON_CALL ='SETUJU' AND t.LUP between '$range_tanggal1' and '$range_tanggal2' 
								AND td.PRODUCT_STATUS = 'JANJI MAU BAYAR'
            					GROUP BY t.UPD_AGENT HAVING COUNT(*) < 3 ORDER BY COUNT(*) ASC)

            					UNION 

            					(SELECT f.UPD_AGENT,f.NAMA_MASTER,f.ALAMAT_MASTER,f.NO_KONTAK,f.TGL_CALL,f.HUB_PENERIMA,f.PENERIMA,f.TRANS_ID,ttd.TGL_JANJI_BAYAR,ttd.KENDALA
								FROM 
															(SELECT d.UPD_AGENT,d.NAMA_MASTER,d.ALAMAT_MASTER,d.NO_KONTAK,d.TGL_CALL,d.HUB_PENERIMA,d.PENERIMA,d.TRANS_ID
												FROM TRANS AS d  
															INNER JOIN TRANS_DETAIL as td
															ON d.TRANS_ID = td.TRANS_ID
												JOIN (										
																		SELECT max(d.NO_KONTAK) AS m, d.UPD_AGENT
															FROM TRANS as d
																		INNER JOIN TRANS_DETAIL as td 
																		ON d.TRANS_ID = td.TRANS_ID
															JOIN (
																					SELECT max(t1.NO_KONTAK) AS m, t1.UPD_AGENT
																					FROM TRANS as t1 INNER JOIN TRANS_DETAIL as td1 ON t1.TRANS_ID = td1.TRANS_ID 
																					WHERE t1.STATUS_CALL='CONTACTED' AND t1.REASON_CALL ='SETUJU' AND t1.LUP between '$range_tanggal1' and '$range_tanggal2'
																					AND td1.PRODUCT_STATUS='JANJI MAU BAYAR'
																					AND MONTH(t1.LUP) = '$range_month'
																					AND YEAR(t1.LUP) = '$range_year'
																					GROUP BY t1.UPD_AGENT
															) AS e 
																		ON d.UPD_AGENT=e.UPD_AGENT AND e.m > d.NO_KONTAK 
																		WHERE d.STATUS_CALL='CONTACTED' 
																		AND d.REASON_CALL ='SETUJU' 
																		AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
																		AND td.PRODUCT_STATUS = 'JANJI MAU BAYAR'
																		AND MONTH(d.LUP) = '$range_month'
																	AND YEAR(d.LUP) = '$range_year'
																		GROUP BY d.UPD_AGENT ASC
														) AS e 
														ON d.NO_KONTAK >= e.m AND d.UPD_AGENT = e.UPD_AGENT 
											WHERE d.STATUS_CALL='CONTACTED' 
														AND d.REASON_CALL ='SETUJU' 
														AND d.LUP between '$range_tanggal1' and '$range_tanggal2' 
											AND td.PRODUCT_STATUS = 'JANJI MAU BAYAR'
														AND MONTH(d.LUP) = '$range_month'
														AND YEAR(d.LUP) = '$range_year'
														ORDER BY d.UPD_AGENT, d.NO_KONTAK ASC) AS f 
								JOIN TRANS_DETAIL AS ttd 
								ON f.TRANS_ID= ttd.TRANS_ID AND ttd.PRODUCT_STATUS = 'JANJI MAU BAYAR' 
								GROUP BY f.TRANS_ID ORDER BY f.UPD_AGENT ASC)");
																		}

																		//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																		while ($row = mysqli_fetch_row($sql)) {
																			# code...																	
																			$data[$i] = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);

																			array_push($data_agent, trim($row[0]));
																			$i++;

																			$no++;
																		}


																		$qq++;
																		$q--;
																	}

																	include 'koneksi.php';
																	$data_agent_fix = array();
																	array_multisort($data_agent);
																	$data_agent_unik = array_unique($data_agent);
																	shuffle($data_agent_unik);
																	$sql_cuti_sabtu = mysqli_query($conn, "SELECT id, username, nama, tanggal, keterangan FROM app_kinerja_cuti WHERE tanggal = '$date_sabtu'");
																	$total_cuti = mysqli_num_rows($sql_cuti_sabtu);
																	$pkatt = mysqli_query($conn, "SELECT tanggal FROM app_kinerja_ideas WHERE tanggal = '$date_sabtu'");
																	$total_tanggal = mysqli_num_rows($pkatt);

																	if ($total_tanggal == 0) {

																		$query = '';
																		if ($total_cuti > 0) {
																			while ($tampil_cuti = mysqli_fetch_row($sql_cuti_sabtu)) {
																				$query .= " and b.user1 <> '" . $tampil_cuti[1] . "'";
																				$i++;
																			}

																			$pkatt1 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber Fbcc' $query");
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

																		$k = 0;
																		$array1 = array();
																		$total2 = COUNT($data_agent_unik);
																		while ($k < $total2) {
																			$pkatt2 = mysqli_query($conn, "SELECT b.id,b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user1='" . $data_agent_unik[$k] . "'");
																			while ($ckatt2 = mysqli_fetch_row($pkatt2)) {
																				$array1[$k] = array($ckatt2['1'], $ckatt2['4'], date("Y-m-d"));
																			}
																			$k++;
																		}

																		$random = array();
																		$numbers = range(0, ($k - 1));
																		shuffle($numbers);
																		$random = array_slice($numbers, 0, $k);
																		$total = floor($total2 / $total1);
																		// 	$data = array();
																		$no_agent = 0;
																		$mod = 0;
																		if ($total2 % $total1 != 0) {
																			$mod = $total2 % $total1;
																			// $k -= $mod - 1;
																		}

																		for ($i = 0; $i < $total1; $i++) {
																			for ($j = 0; $j < $total; $j++) {

																				$parameter1 = $array1[$random[$no_agent]][0];
																				$parameter2 = $array1[$random[$no_agent]][1];
																				$parameter3 = $array1[$random[$no_agent]][2];

																				$data_agent_fix[$no_agent] = array($nama_qco[$i], $parameter1, $parameter2, $parameter3);
																				$sql_insert_agent = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nama_qco[$i]','$parameter1','$parameter2','$parameter3')";

																				mysqli_query($conn, $sql_insert_agent);

																				$no_agent++;
																			}
																		}
																		$angka_acak = 0;
																		$random_lebih = array();
																		$range_angka = range(0, ($total1 - 1));
																		shuffle($range_angka);
																		$random_lebih = array_slice($range_angka, 0, $mod);
																		if ($mod != '') {
																			$k -= $mod;
																			for ($i = $k; $i < $total2; $i++) {
																				$parameter1 = $array1[$random[$no_agent]][0];
																				$parameter2 = $array1[$random[$no_agent]][1];
																				$parameter3 = $array1[$random[$no_agent]][2];
																				$data_agent_fix[$i] = array($nama_qco[$random_lebih[$angka_acak]], $parameter1, $parameter2, $parameter3);
																				$nqco = $nama_qco[$random_lebih[$angka_acak]];
																				$sql_insert_agent_mod = "INSERT INTO app_kinerja_ideas (qco,agent,area,tanggal) VALUES ('$nqco','$parameter1','$parameter2','$parameter3')";

																				mysqli_query($conn, $sql_insert_agent_mod);
																				$no_agent++;
																				$angka_acak++;
																			}
																		}
																		for ($h = 0; $h < COUNT($data_agent_fix); $h++) {
																			$data_jadi[$h] = array($data_agent_fix[$h][1], $data_agent_fix[$h][2]);
																		}
																		// print_r($data_jadi);
																	} else {
																		$sql_qco = mysqli_query($conn, "SELECT qco,agent FROM app_kinerja_ideas WHERE tanggal= '$date_sabtu' AND qco= '$nama_login'");

																		//echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																		$angka_qco = 0;
																		$total_agent = mysqli_num_rows($sql_qco);
																		while ($row_qco = mysqli_fetch_row($sql_qco)) {
																			$data_jadi[$angka_qco] = array($row_qco[0], $row_qco[1]);

																			$angka_qco++;
																		}
																	}
																	?>
 																<tr class="odd gradeX">
 																	<td colspan="10">
 																		<h5>Tanggal : <?= date("l, d F Y", strtotime($date_sabtu)) ?></h5>
 																	</td>
 																</tr>
 																<?php
																	// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																	/*sampai sini*/

																	$data_fix = array();
																	if ($data_kinerja_nilai[0] == 0) {
																		for ($i = 0; $i < $no; $i++) {
																			for ($j = 0; $j < $total_agent; $j++) {
																				$text_data = str_replace(' ', '', $data[$i][0]);
																				if ($data_jadi[$j][1] == $text_data and $_SESSION['name'] == $data_jadi[$j][0]) {

																					$data_fix[$i] = array($text_data, $data[$i][1], $data[$i][2], $data[$i][3], $data[$i][4], $data[$i][5], $data[$i][6], $data[$i][7], $data[$i][8], $data[$i][9]);
																				}
																			}
																			// $data_fix[$i]=$data[$i];
																		}
																	} else {
																		for ($i = 0; $i < ($no-1); $i++) {
																		$cek = true;
																		for ($j = 0; $j < $angka1; $j++) {
																			$text_data = str_replace(' ', '', $data[$i][0]);
																			if ($data_kinerja_nilai[$j][0] != $text_data and $data_kinerja_nilai[$j][1] != $data[$i][3]) {
																				if ($j == $angka1 - 1 and $cek == true) {
																					for ($k = 0; $k < $total_agent; $k++) {

																						
																						// print_r($text_data.' == '.$data_jadi[$k][1].'<br>');
																						
                                                                                    	if ($text_data == $data_jadi[$k][1]) {
																							$data_fix[$i] = array($text_data, $data[$i][1], $data[$i][2], $data[$i][3], $data[$i][4], $data[$i][5], $data[$i][6], $data[$i][7], $data[$i][8], $data[$i][9]);
																						}
																					}
																				}
																			} else {
																				$cek = false;
																			}
																			if ($cek == false) {
																				break;
																			}
																		}
																	}
																}


																	// $date_now = date("Y-m-d");
																	array_multisort($data_fix, SORT_ASC);

																	$angka2 = 1;
																	for ($i = 0; $i < $no; $i++) {
																		if (
																			$data_fix[$i][0] != ""
																			and $data_fix[$i][3] != ""
																		) {
																			// for($j=0;$j<$angka1-1;$j--){
																			// if($data_kinerja_nilai[$j][0] != $data[$i][1] AND $data_kinerja_nilai[$j][1] != $data[$i][4]){
																	?>

 																		<tr class="odd gradeX">


 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $angka2; ?></font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][0]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][1]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][2]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][3]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo date("D, d F Y H:i:s", strtotime($data_fix[$i][4])); ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][5]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][6]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt">
 																					<?php
																						if ($data_fix[$i][8] == "0000-00-00 00:00:00") {
																							echo $data_fix[$i][8];
																						} else {
																							echo date("D, d F Y H:i:s", strtotime($data_fix[$i][8]));
																						}
																						?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<font face="Tahoma" style="font-size: 9pt"><?php echo $data_fix[$i][9]; ?>
 																				</font>
 																			</td>
 																			<td style="padding-top: 2px; padding-bottom: 2px">
 																				<a href="form_ideas_detail.php?agent=<?php echo $data_fix[$i][0]; ?>&telp=<?php echo $data_fix[$i][3]; ?>&id=<?php echo $data_fix[$i][7]; ?>" class="btn btn-primary btn-sm">Detail</a>
 																			</td>


 																		</tr>
 															<?php

																			$angka2++;
																		}
																	}
																}
																?>
 														</tbody>
 													</table>
 												</div>
 										</section>
 									</div>











 									<!-- save end -->

 								</div>
 								<!--<div class="adv-table"> -->
 							</div><!-- <div class="box"> -->

 						</div><!-- <div class="panel-body"> -->


 					</section> <!-- <section class="panel"> -->

 				</div> <!-- <div class="row"> -->


 				<input type="hidden" name="items" class="form-control" value="<?= $id_all; ?>">
 				<input type="hidden" name="value" class="form-control" value="<?= $value; ?>">

 			</form>


 			<!-- show Modal buat msgbox .. cakep -->
 			<div class="modal fade" id="modal_help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 				<div class="modal-dialog">
 					<div class="modal-content">
 						<div class="modal-header">
 							<!--button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button-->
 							<h4 class="modal-title">Tambah Reason Monitoring
 								<div id="msgbox_caption">
 									<!--caption-->
 								</div>
 							</h4>
 						</div>
 						<div class="modal-body">
 							<div class="form-group">
 								<label for="ticket_id" class="col-lg-3 control-label"><strong>Nama Reason Monitoring</label>
 								<div class="col-lg-9">
 									<input type="text" width="50px" class="form-control" name="nama_reason" id="nama_reason" maxlength="100" placeholder="">
 								</div>
 							</div>
 						</div>
 						<div class="modal-footer">
 							<button width="100" type="submit" id="btn_tambah_reason_save" name="Save" class="btn  btm-block btn-success">Save</button>
 							<button id="btn_tambah_reason_close" data-dismiss="modal" class="btn btn-danger" type="button">Close</button>
 						</div>
 					</div>
 				</div>
 			</div>
 			<!-- modal -->


 			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
 				<div class="modal-dialog">
 					<div class="modal-content">
 						<div class="modal-header">
 							<button aria-hidden="true" data-dismiss="modal" class="close" type="button" style="display:none;" id="close_modal">x</button>
 							<h4 class="modal-title">Simpan Data</h4>
 						</div>
 						<div class="modal-body">

 							<form role="form">
 								<div class="form-group">
 									<span style="font-size: 16px;" id="div_kata_err">

 									</span>
 								</div>
 								<div class="form-group">

 									<div class="col-lg-12">
 										<section class="panel tab-bg-dark-navy-blue">
 											<div class="panel-body">
 												<p align="center">
 													<button type="submit" class="btn btn-danger" id="modal_close_gagal">Close</button>
 													<button type="submit" class="btn btn-danger" id="modal_close_berhasil" style="display:none;">Close</button>
 												</p>
 											</div>
 										</section>
 									</div>


 								</div>
 							</form>
 						</div>
 					</div>
 				</div>
 			</div>


 		</section>
 		<!--wrapper end -->
 	</section>
 	<!--main content end-->
 	</section>
 	<!--container end-->


 	<!-- js placed at the end of the document so the pages load faster -->
 	<script src="../js/jquery.js"></script>
 	<script src="../js/jquery-1.8.3.min.js"></script>
 	<script src="../js/bootstrap.min.js"></script>
 	<script src="../js/jquery.scrollTo.min.js"></script>
 	<script src="../js/jquery.nicescroll.js" type="text/javascript"></script>


 	<script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
 	<script type="text/javascript" src="../assets/bootstrap-daterangepicker/date.js"></script>
 	<script type="text/javascript" src="../assets/bootstrap-daterangepicker/daterangepicker.js"></script>



 	<!-- buat graphic -->
 	<!--
	<script src="../assets/morris.js-0.4.3/morris.min.js" type="text/javascript"></script>
	<script src="../assets/morris.js-0.4.3/raphael-min.js" type="text/javascript"></script>
    <script src="../assets/chart-master/Chart.js"></script>
    <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
	<script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
-->


 	<!--<script src="../js/owl.carousel.js" ></script>-->

 	<script src="../js/jquery.customSelect.min.js"></script>
 	<!--common script for all pages-->
 	<script src="../js/common-scripts.js"></script>


 	<!--script for this page-->

 	<!--<script src="../js/morris-script.js"></script>-->
 	<!--<script src="../js/sparkline-chart.js"></script>-->
 	<!--<script src="../js/easy-pie-chart.js"></script>-->
 	<!--<script src="../js/all-chartjs.js"></script>-->
 	<!-- script for this page only-->

 	<script type="text/javascript" src="../assets/gritter/js/jquery.gritter.js"></script>
 	<script type="text/javascript" src="../js/gritter.js"></script>
 	<!--script type="text/javascript" src="test.js"></script-->
 	<script type="text/javascript" src="../assets/bootstrap-autocomplete/chosen.jquery.js"></script>

 	</body>

 </html>


 <script type="text/javascript">
 	$(function() {


 		set_combo_jam();
 		set_combo_durasi();
 		set_combo_aht();
 		set_combo_durasi_wording();

 		$("#overlay").hide();
 		$(".adv-table").show();

 		$('#tgl_ol_text').datetimepicker({
 			format: 'yyyy-MM-dd hh:mm:ss',
 			language: 'pt-BR'
 		}).on('changeDate', function(e) {

 			$("#tgl_ol_text").find("input").val();
 			var date = $("#tgl_ol_text").data("datetimepicker").getDate(),
 				formatted = date.getDate();
 			$("#periode").val("");
 			if (formatted != "") {
 				$.ajax({
 					type: "POST",
 					url: 'json_baca_periode.php',
 					data: 'tanggal=' + formatted,
 					dataType: "json",
 					success: function(data) {
 						//alert(formatted);
 						if (data[0].status == '1') {
 							$("#periode").val(data[0].periode);
 						}
 					}
 				});
 			}
 		});

 		$('#tgl_ol_text_reset').click(
 			function() {
 				$('#tgl_ol_textx').val("");
 				$("#periode").val("");
 			}
 		);

 		$('#tgl_ol_text_set').click(
 			function() {
 				//alert("test");
 				$('#tgl_ol_text').focus();
 			}
 		);

 		$('#tgl_ol_text').blur(function(event) {
 			event.preventDefault();
 			$(this).datepicker('hide');
 		});

 		$('#tgl_nilai_text').datepicker({
 			format: 'yyyy-mm-dd'
 		}).on('changeDate', function(e) {
 			$(this).datepicker('hide');
 		});

 		$('#tgl_nilai_text_reset').click(
 			function() {
 				$('#tgl_nilai_text').val("");
 			}
 		);

 		$('#tgl_nilai_text_set').click(
 			function() {
 				//alert("test");
 				$('#tgl_nilai_text').focus();
 			}
 		);

 		$('#tgl_nilai_text').blur(function(event) {
 			event.preventDefault();
 			$(this).datepicker('hide');
 		});

 		$('#jam').focusin(function(event) {
 			event.preventDefault();
 			if ($("#jam").val() == "") {
 				//var currentdate = new Date();
 				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
 				//$('#jam').val(currenttime);
 			}
 		});
 		$('#durasi').focusin(function(event) {
 			event.preventDefault();
 			if ($("#durasi").val() == "") {
 				//var currentdate = new Date();
 				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
 				//$('#jam').val(currenttime);
 			}
 		});

 		$('#aht').focusin(function(event) {
 			event.preventDefault();
 			if ($("#aht").val() == "") {
 				//var currentdate = new Date();
 				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
 				//$('#jam').val(currenttime);
 			}
 		});

 		$('#cbo_jam').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam').val();
 			var m = $('#cbo_menit').val();
 			var s = $('#cbo_detik').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#jam").val(j);
 		});

 		$('#cbo_menit').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam').val();
 			var m = $('#cbo_menit').val();
 			var s = $('#cbo_detik').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#jam").val(j);
 		});

 		$('#cbo_detik').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam').val();
 			var m = $('#cbo_menit').val();
 			var s = $('#cbo_detik').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#jam").val(j);
 		});


 		$('#cbo_jam2').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam2').val();
 			var m = $('#cbo_menit2').val();
 			var s = $('#cbo_detik2').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#durasi").val(j);
 		});
 		$('#cbo_menit2').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam2').val();
 			var m = $('#cbo_menit2').val();
 			var s = $('#cbo_detik2').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#durasi").val(j);
 		});

 		$('#cbo_detik2').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam2').val();
 			var m = $('#cbo_menit2').val();
 			var s = $('#cbo_detik2').val();
 			var j = "00:" + m + ":" + s;
 			//alert(j);
 			$("#durasi").val(j);
 		});

 		$('#cbo_jam3').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam3').val();
 			var m = $('#cbo_menit3').val();
 			var s = $('#cbo_detik3').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#aht").val(j);
 		});
 		$('#cbo_menit3').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam3').val();
 			var m = $('#cbo_menit3').val();
 			var s = $('#cbo_detik3').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#aht").val(j);
 		});

 		$('#cbo_detik3').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam3').val();
 			var m = $('#cbo_menit3').val();
 			var s = $('#cbo_detik3').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#aht").val(j);
 		});

 		$('#cbo_jam4').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam4').val();
 			var m = $('#cbo_menit4').val();
 			var s = $('#cbo_detik4').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#durasi_wording_value_added_aht").val(j);
 		});
 		$('#cbo_menit4').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam4').val();
 			var m = $('#cbo_menit4').val();
 			var s = $('#cbo_detik4').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#durasi_wording_value_added_aht").val(j);
 		});

 		$('#cbo_detik4').change(function(event) {
 			event.preventDefault();
 			var h = $('#cbo_jam4').val();
 			var m = $('#cbo_menit4').val();
 			var s = $('#cbo_detik4').val();
 			var j = h + ":" + m + ":" + s;
 			//alert(j);
 			$("#durasi_wording_value_added_aht").val(j);
 		});







 		$("#area_cbo").change(function(event) {
 			event.preventDefault();

 			var area = $("#area_cbo").val();
 			// var layanan = $("#layanan_cbo").val();
 			// var segment = $("#segment_cbo").val();
 			var url = "json_cari_user_cbo.php";
 			var data = "area=" + area;
 			// bersihkan_inputan_agent();

 			$.ajax({
 				type: "POST",
 				url: url,
 				data: data,
 				dataType: "json",
 				beforeSend: function() {
 					$("#pilih_cbo").empty();
 				}
 			}).done(function(data) {
 				if (data != "") {
 					var item = data;
 					var obj = item.rows;
 					var len = obj.length;
 					var html = "";
 					//alert(area);
 					for (var i = 0; i < len; i++) {
 						var rows = obj[i];
 						var value = rows.value;
 						var name = rows.name;
 						var html = "<option value='" + value + "'>" + value + " -- " + name + "</option>";
 						$('#pilih_cbo').append(html);
 					}
 					/*
 					response( $.map( data, function( item ) {
 						//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
 					}));
 					*/
 				}

 				$("#pilih_cbo").trigger("chosen:updated");
 				$("#pilih_cbo").trigger("liszt:updated");

 			});
 		});





 		$("#pilih_cbo").change(function(event) {
 			event.preventDefault();

 			val = $("#pilih_cbo").val();

 			bersihkan_inputan_agent();

 			if (val !== "") {
 				$.ajax({
 					type: "GET",
 					url: 'json_baca_mlogin.php',
 					data: 'id=' + val,
 					dataType: "json",
 					success: function(data) {
 						//alert(data);
 						csdm_co.value = val;
 						nama_co.value = data[0].username;
 						userlevel.value = data[0].userlevel;
 						layanan.value = data[0].layanan;
 						ket.value = data[0].ket;
 						user_tl.value = data[0].user_tl;

 						los.value = data[0].los;

 						gender.value = data[0].gender;


 					}

 				});
 			}
 		});



 		$('#modal_close_gagal').click(function(event) {
 			event.preventDefault();
 			$("#overlay").hide();
 			$(".adv-table").show();
 			$("#close_modal").trigger("click");
 		});

 		$('#modal_close_berhasil').click(function(event) {
 			event.preventDefault();
 			window.location = "form_insert_laporan_tabbing.php?wapo_key=n2CesKkdK7ErtKvD%252FUWnBUGtIGpQaFO5stOQyyjY4Is%253D";
 		});


 		$("#").click(function(event) {
 			event.preventDefault();

 			$("#overlay").show();
 			$(".adv-table").hide();

 			$("#div_kata_err").html('<div class="overlay" id="overlay"><p align="center"><span style="font-size: 3em;">Mohon ditunggu </span><br/><i class="fa fa-refresh fa-spin fa-5x"></i></p></div>');

 			$.post("form_insert_taphist_simpan_ajax.php", $("#form1").serialize(), function(data) {
 				//alert(data);
 				var arr = {};
 				var arr = $.parseJSON(data);
 				var err = arr.err;
 				var kata_err = "";

 				if (err > 0) {
 					var obj = arr.kata_err;
 					var len = obj.length;
 					kata_err = kata_err + "<strong> Mohon dicek data anda yang anda input yaitu : </strong> <br/> "
 					for (var i = 0; i < len; i++) {
 						var r = obj[i];
 						kata_err = kata_err + r + " <br/>";
 					}
 					$("#modal_close_gagal").show();
 					$("#modal_close_berhasil").hide();
 					$('#mulai1').trigger("click");
 				} else {
 					kata_err = arr.kata_err;
 					$("#modal_close_gagal").hide();
 					$("#modal_close_berhasil").show();
 				}
 				$("#div_kata_err").html(kata_err);
 			});
 			$("#link_simpan").trigger("click");

 		});

 		$('#reset').click(function(event) {
 			event.preventDefault();
 			document.location.href = 'form_insert_laporan_tabbing.php';

 		});

 		$("#btn_tambah_reason_bersih").click(function(event) {
 			event.preventDefault();

 			$("#nama_reason").val("");
 			$("#btn_tambah_reason").trigger("click");
 		});

 		$("#").click(function(event) {
 			event.preventDefault();

 			var nama_reason = $('#nama_reason').val();
 			var url = "json_simpan_reason.php";
 			var data = "nama_reason=" + nama_reason;

 			$.ajax({
 				type: "POST",
 				url: url,
 				data: data,
 				dataType: "json",
 				beforeSend: function() {
 					// $("#rs_monitoring").empty(); 
 				}
 			}).done(function(data) {
 				if (data != "") {
 					var item = data;
 					var kata_err = item.kata_a;
 					var err = item.err_a;
 					var obj = item.rows;
 					var len = obj.length;
 					var html = "";
 					//alert(len);
 					for (var i = 0; i < len; i++) {
 						var rows = obj[i];
 						var value = rows.value;
 						var name = rows.name;
 						var html = "<option value='" + value + "'>" + name + "</option>";
 						// $('#rs_monitoring').append(html);
 					}

 					if (err == "0") {
 						// $("#btn_tambah_reason_close").trigger("click");
 					}
 					alert(kata_err);
 				}

 				// $("#rs_monitoring").trigger("chosen:updated");				
 			});
 		});

 	});

 	function bersihkan_inputan_agent() {
 		$('#csdm_co').val("");
 		$('#nama_co').val("");
 		$('#userlevel').val("");
 		$('#layanan').val("");
 		$('#ket').val("");
 		$('#user_tl').val("");
 		$('#user_spv').val("");
 		$('#user_manager').val("");
 		$('#los').val("");
 		$('#tenur').val("");
 		$('#gender').val("");
 		$('#nama_ol').val("");
 		//alert($('#layanan').val()+$('#ket').val());
 	}

 	function bersihkan_inputan_qco() {
 		$('#qco').val("");
 		$('#nama_qco').val("");
 		$('#jabatan_qc').val("");
 		$('#area_qc').val("");
 	}

 	function set_combo_jam() {
 		$('#cbo_jam').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});
 		$('#cbo_menit').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});
 		$('#cbo_detik').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});

 		var list_cbo_jam = "";
 		var i = 0;
 		for (i = 0; i <= 23; i++) {
 			if (i < 10) {
 				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i + "</value>";
 			} else {
 				list_cbo_jam = list_cbo_jam + "<option value='" + i + "'>" + i + "</value>";
 			}
 		}
 		$("#cbo_jam").html(list_cbo_jam);
 		$("#cbo_jam").trigger("chosen:updated");
 		$("#cbo_jam").trigger("liszt:updated");

 		var list_cbo_59 = "";
 		var i = 0;
 		for (i = 0; i <= 59; i++) {
 			if (i < 10) {
 				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i + "</value>";
 			} else {
 				list_cbo_59 = list_cbo_59 + "<option value='" + i + "'>" + i + "</value>";
 			}
 		}
 		$("#cbo_menit").html(list_cbo_59);
 		$("#cbo_detik").html(list_cbo_59);

 		$("#cbo_menit").trigger("chosen:updated");
 		$("#cbo_menit").trigger("liszt:updated");

 		$("#cbo_detik").trigger("chosen:updated");
 		$("#cbo_detik").trigger("liszt:updated");
 	}

 	function set_combo_durasi() {
 		$('#cbo_jam2').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});
 		$('#cbo_menit2').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});
 		$('#cbo_detik2').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});

 		var list_cbo_jam = "";
 		var i = 0;
 		for (i = 0; i <= 23; i++) {
 			if (i < 10) {
 				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i + "</value>";
 			} else {
 				list_cbo_jam = list_cbo_jam + "<option value='" + i + "'>" + i + "</value>";
 			}
 		}
 		$("#cbo_jam2").html(list_cbo_jam);
 		$("#cbo_jam2").trigger("chosen:updated");
 		$("#cbo_jam2").trigger("liszt:updated");



 		var list_cbo_59 = "";
 		var i = 0;
 		for (i = 0; i <= 59; i++) {
 			if (i < 10) {
 				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i + "</value>";
 			} else {
 				list_cbo_59 = list_cbo_59 + "<option value='" + i + "'>" + i + "</value>";
 			}
 		}
 		$("#cbo_menit2").html(list_cbo_59);
 		$("#cbo_detik2").html(list_cbo_59);

 		$("#cbo_menit2").trigger("chosen:updated");
 		$("#cbo_menit2").trigger("liszt:updated");

 		$("#cbo_detik2").trigger("chosen:updated");
 		$("#cbo_detik2").trigger("liszt:updated");
 	}


 	function set_combo_aht() {
 		$('#cbo_jam3').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});
 		$('#cbo_menit3').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});
 		$('#cbo_detik3').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});


 		var list_cbo_jam = "";
 		var i = 0;
 		for (i = 0; i <= 23; i++) {
 			if (i < 10) {
 				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i + "</value>";
 			} else {
 				list_cbo_jam = list_cbo_jam + "<option value='" + i + "'>" + i + "</value>";
 			}
 		}
 		$("#cbo_jam3").html(list_cbo_jam);
 		$("#cbo_jam3").trigger("chosen:updated");
 		$("#cbo_jam3").trigger("liszt:updated");


 		var list_cbo_59 = "";
 		var i = 0;
 		for (i = 0; i <= 59; i++) {
 			if (i < 10) {
 				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i + "</value>";
 			} else {
 				list_cbo_59 = list_cbo_59 + "<option value='" + i + "'>" + i + "</value>";
 			}
 		}
 		$("#cbo_menit3").html(list_cbo_59);
 		$("#cbo_detik3").html(list_cbo_59);

 		$("#cbo_menit3").trigger("chosen:updated");
 		$("#cbo_menit3").trigger("liszt:updated");

 		$("#cbo_detik3").trigger("chosen:updated");
 		$("#cbo_detik3").trigger("liszt:updated");
 	}

 	function set_combo_durasi_wording() {
 		$('#cbo_jam4').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});
 		$('#cbo_menit4').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});
 		$('#cbo_detik4').chosen({
 			allow_single_deselect: true,
 			width: "25%",
 			search_contains: true
 		});


 		var list_cbo_jam = "";
 		var i = 0;
 		for (i = 0; i <= 23; i++) {
 			if (i < 10) {
 				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i + "</value>";
 			} else {
 				list_cbo_jam = list_cbo_jam + "<option value='" + i + "'>" + i + "</value>";
 			}
 		}
 		$("#cbo_jam4").html(list_cbo_jam);
 		$("#cbo_jam4").trigger("chosen:updated");
 		$("#cbo_jam4").trigger("liszt:updated");


 		var list_cbo_59 = "";
 		var i = 0;
 		for (i = 0; i <= 59; i++) {
 			if (i < 10) {
 				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i + "</value>";
 			} else {
 				list_cbo_59 = list_cbo_59 + "<option value='" + i + "'>" + i + "</value>";
 			}
 		}
 		$("#cbo_menit4").html(list_cbo_59);
 		$("#cbo_detik4").html(list_cbo_59);

 		$("#cbo_menit4").trigger("chosen:updated");
 		$("#cbo_menit4").trigger("liszt:updated");

 		$("#cbo_detik4").trigger("chosen:updated");
 		$("#cbo_detik4").trigger("liszt:updated");
 	}

 	$(function() {
 		//window.prettyPrint && prettyPrint();
 		$('#tanggal').datepicker({
 			format: 'yyyy-mm-dd'
 		});

 		$('#tanggal1').datepicker({
 			format: 'yyyy-mm-dd'
 		});

 		$('#tanggal2').datepicker({
 			format: 'yyyy-mm-dd'
 		});

 		$('#tanggal3').datepicker({
 			format: 'yyyy-mm-dd'
 		});

 		$('#tanggal4').datepicker({
 			format: 'yyyy-mm-dd'
 		});

 		$('#time').datepicker({
 			format: 'hh::mm:ss'
 		});

 		//$("#segment").change(function(){
 		// var nilai = this.value;
 		// //alert(nilai);		
 		// $("#nama_co").val(null);  
 		// $("#nama_co").val(nilai);
 		// $("#nama_co").trigger('chosen:updated');

 		// $("#csdm_co").val(null);  
 		// $("#csdm_co").val(nilai);
 		// $("#csdm_co").trigger('chosen:updated');

 		//window.alert(nilai);

 		// });

 		/* $("#csdm_co").change(function(){
			var nilai = this.value;
			//alert(nilai);
			// $("#segment").val(nilai);
			// $("#segment").trigger('chosen:updated');			
			$("#nama_co").val(null);  
			$("#nama_co").val(nilai);		
			$("#nama_co").trigger('chosen:updated');
			baca_mlogin();

			 				
		});

		
		$("#nama_co").change(function(){
			var nilai = this.value;
			//alert(nilai);	
			// $("#segment").val(nilai);
			// $("#segment").trigger('chosen:updated');

			$("#csdm_co").val(null);  
			$("#csdm_co").val(nilai);
			$("#csdm_co").trigger('chosen:updated');
			baca_mlogin();



		});*/

 		$('.chosen-select').chosen();

 	});
 </script>
 <script type="text/javascript" src="../assets/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

 <script type="text/javascript" src="../assets/bootstrap-datetimepicker/bootstrap-datetimepicker.pt-BR.js"></script>
 <?php endif ?>
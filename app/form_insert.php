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
	include("koneksi.php");
	//require_once('koneksi.php');


	include('sidebar.php');
	//require_once('koneksi.php');
	date_default_timezone_set('Asia/Jakarta');
	$tgl = date('Y-m-d');
	$lup = date('Y-m-d h:i:s');
	$login = $_SESSION['username'];
	if ($_SESSION['jabatan'] == "Tabber TAM" || $_SESSION['jabatan'] == "Duktek" || $_SESSION['jabatan'] == "qa") :
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
 			margin-top: -;
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
 			<form id="form" name="demoform" method="post" action="form_insert.php">
 				<?php

					if (isset($_GET['status'])) {
						echo ("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-check'></span>  Data Sudah Disimpan Pada Database !!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			  //   <span aria-hidden='true'>&times;</span>
			  // </button></div>");
					}

					if (isset($_POST['Save'])) {

						if ($tgl_nilai_text == "") {
							if ($na11 == 0) {
								$na11 = 0;
							}
							if ($na12 == 0) {
								$na12 = 0;
							}
							if ($na21 == 0) {
								$na21 = 0;
							}
							if ($na22 == 0) {
								$na22 = 0;
							}
							if ($na31 == 0) {
								$na31 = 0;
							}
							if ($na32 == 0) {
								$na32 = 0;
							}
							if ($na33 == 0) {
								$na33 = 0;
							}
							if ($na34 == 0) {
								$na34 = 0;
							}

							if ($na41 == 0) {
								$na41 = 0;
							}
							if ($na42 == 0) {
								$na42 = 0;
							}
							if ($na43 == 0) {
								$na43 = 0;
							}
							if ($na44 == 0) {
								$na44 = 0;
							}
							if ($na45 == 0) {
								$na45 = 0;
							}
							if ($na51 == 0) {
								$na51 = 0;
							}
							if ($na52 == 0) {
								$na52 = 0;
							}
							if ($na53 == 0) {
								$na53 = 0;
							}
							if ($na61 == 0) {
								$na61 = 0;
							}
							if ($na71 == 0) {
								$na71 = 0;
							}
							if ($na72 == 0) {
								$na72 = 0;
							}
							if ($na81 == 0) {
								$na81 = 0;
							}
							if ($na82 == 0) {
								$na82 = 0;
							}
							if ($na83 == 0) {
								$na83 = 0;
							}

							if ($na91 == 0) {
								$na91 = 0;
							}
							if ($na92 == 0) {
								$na92 = 0;
							}
							if ($na93 == 0) {
								$na93 = 0;
							}
							if ($na94 == 0) {
								$na94 = 0;
							}
							if ($na95 == 0) {
								$na95 = 0;
							}
							if ($na96 == 0) {
								$na96 = 0;
							}
							if ($na97 == 0) {
								$na97 = 0;
							}
							if ($na98 == 0) {
								$na98 = 0;
							}
							if ($na101 == 0) {
								$na101 = 0;
							}
							if ($na102 == 0) {
								$na102 = 0;
							}
							if ($na103 == 0) {
								$na103 = 0;
							}
							if ($na104 == 0) {
								$na104 = 0;
							}
							if ($na105 == 0) {
								$na105 = 0;
							}
							if ($na106 == 0) {
								$na106 = 0;
							}
							if ($na107 == 0) {
								$na107 = 0;
							}
							if ($na108 == 0) {
								$na108 = 0;
							}
							if ($na111 == 0) {
								$na111 = 0;
							}
							if ($na112 == 0) {
								$na112 = 0;
							}
							if ($na113 == 0) {
								$na113 = 0;
							}
							if ($na114 == 0) {
								$na114 = 0;
							}
							if ($na115 == 0) {
								$na115 = 0;
							}
							if ($na116 == 0) {
								$na116 = 0;
							}
					?>
 						<script type="text/javascript">
 							alert("Mohon periksa kembali! Data yg anda masukkan ada yg belum lengkap");
 							//history.back();
 						</script>
 				<?php
						} else {
							
							if ($na11 == 1 && $na12 == 1) {
								$na1 = 15;
							}
							else {
								$na1 = 0;
							}
							if ($na21 == 1 && $na22 == 1) {
								$na2 = 15;
							}
							else {
								$na2 = 0;
							}
							if ($na31 == 1 && $na32 == 1 && $na33 == 1 && $na34 == 1) {
								$na3 = 15;
							}
							else {
								$na3 = 0;
							}

							if ($na41 == 1 && $na42 == 1 && $na43 == 1 && $na44 == 1 && $na45 == 1) {
								$na4 = 5;
							}
							else {
								$na4 = 0;
							}
							if ($na51 == 1 && $na52 == 1 && $na53 == 1) {
								$na5 = 5;
							}
							else {
								$na5 = 0;
							}
							if ($na61 == 1) {
								$na6 = 5;
							}
							else {
								$na6 = 0;
							}
							if ($na71 == 1 && $na72 == 1) {
								$na7 = 5;
							}
							else {
								$na7 = 0;
							}
							if ($na81 == 1 && $na82 == 1 && $na83 == 1) {
								$na8 = 5;
							}
							else {
								$na8 = 0;
							}

							if ($na91 == 1 && $na92 == 1 && $na93 == 1 && $na94 == 1 && $na95 == 1 && $na96 == 1 && $na97 == 1 && $na98 == 1) {
								$na9 = 10;
							}
							else {
								$na9 = 0;
							}
							if ($na101 == 1 && $na102 == 1 && $na103 == 1 && $na104 == 1 && $na105 == 1 && $na106 == 1 && $na107 == 1 && $na108 == 1) {
								$na10 = 10;
							}
							else {
								$na10 = 0;
							}
							if ($na111 == 1 && $na112 == 1 && $na113 == 1 && $na114 == 1 && $na115 == 1 && $na116 == 1) {
								$na11 = 10;
							}
							else {
								$na11 = 0;
							}


			// 				$nilai = '-|' . $na11 . '|-' . '|' . $na21 . '|' . $na22 . '|' . $na23 . '|-' . '|' . $na31 . '|' . $na32 . '|-' . '|' . $na41 . '|' . $na42 . '|-' . '|' . $na51 . '|-' . '|' . $na61 . '|' . $na62 . '|' . $na63 . '|';
							$nilai = '-|' . $na1 .  '|' . $na2 . '|' . $na3 . '|-' . '|' . $na4 . '|' . $na5 . '|' . $na6 . '|' . $na7 . '|' . $na8 . '|-' . '|' . $na9 . '|' . $na10 . '|' . $na11 . '|';

			// 				//$nilai=$value;
			// 				// $item='1;-|1;1|2;-|2;1|2;2|2;3|3;-|3;1|3;2|4;-|4;1|4;2|5;-|5;1|6;-|6;1|7;-|7;1|7;2|7;3|';
							$item = $items;
							// print_r($nilai." ".$item);
							// die();

							$nilaisolusil = $na1 + $na2 + $na3;
							$nilaiprosesl = $na4 + $na5 + $na6 + $na7 + $na8;
							$nilaisikapl = $na9 + $na10 + $na11;

							$query_qco = mysqli_query($conn, "select b.nama_qco,a.user1 FROM cc147_main_users_extended AS a INNER JOIN cc147_main_users AS b ON a.user1=b.username WHERE username='$qco'");
							$data_qco = mysqli_fetch_row($query_qco);

							$qq = mysqli_query($conn, "select b.nama_tl,a.user1 FROM cc147_main_users_extended AS a INNER JOIN cc147_main_users AS b ON a.user1=b.username WHERE username='$pilih_cbo'");
							$qqq = mysqli_fetch_row($qq);
							$qqqq = $qqq[0];
							$qqqq2 = $qqq[1];
							$total_nilai = $nilaisolusil + $nilaiprosesl + $nilaisikapl;
							// $nd = $_POST['nd'];
							// print_r($total_nilai);

							if ($total_nilai != 100) {
								if (($tgl_nilai_text != "") and  ($qqqq2 != "") and ($nilai != "") and ($item != "") and ($tgl_ol_text != "") and ($rs_monitoring != "") and ($param_tapping_proses != "") and ($param_tapping_sikap != "") and ($param_tapping_solusi != "") and ($lup != "") and ($qco != "") and ($area_cbo != "") and ($periode != "") and ($qqqq != "") and ($fastel != "") and ($no_cp != "") and ($jenis_call != "") and ($kategori_call != "")) {


									$sql = "INSERT INTO `app_kinerja_nilai` (`tanggal`,`user_id`,`nilai`,`item`,`tglrecord`,`ani`,`reason_monitoring`,`param_tapping_proses`,`param_tapping_sikap`,`param_tapping_solusi`,`lup`,`status`,`lup_qa`,`area`,`proses_layanan`,`sikap_layanan`,`periode`,`lup_tl_name`,`solusi_layanan`,`no_cp`,`jenis_call`,`kategori_call`,`login_qco`,`nama_qco`) 
			VALUES ('$tgl_nilai_text','$qqqq2','$nilai','$item','$tgl_ol_text','$fastel','$rs_monitoring','$param_tapping_proses','$param_tapping_sikap','$param_tapping_solusi','$lup','1','$qco','$area_cbo','$nilaiprosesl','$nilaisikapl','$periode','$qqqq','$nilaisolusil','$no_cp','$jenis_call','$kategori_call','$data_qco[1]','$data_qco[0]')";
									// echo "$sql";
									//$query=mysqli_query($conn, $sql);
									//Refresh by HTTP META

									// if ($query=mysqli_query($conn, $sql)) {
									mysqli_query($conn, $sql);

									$sql1 = "INSERT INTO `app_kinerja_nilai_reject`(`tanggal`,`user_id`,`nilai`,`item`,`tglrecord`,`ani`,`reason_monitoring`,`param_tapping_proses`,`param_tapping_sikap`,`param_tapping_solusi`,`lup`,`status`,`lup_qa`,`area`,`proses_layanan`,`sikap_layanan`,`periode`,`lup_tl_name`,`solusi_layanan`,`no_cp`,`jenis_call`,`kategori_call`,`login_qco`,`nama_qco`) 
									VALUES ('$tgl_nilai_text','$qqqq2','$nilai','$item','$tgl_ol_text','$fastel','$rs_monitoring','$param_tapping_proses','$param_tapping_sikap','$param_tapping_solusi','$lup','1','$qco','$area_cbo','$nilaiprosesl','$nilaisikapl','$periode','$qqqq','$nilaisolusil','$no_cp','$jenis_call','$kategori_call','$data_qco[1]','$data_qco[0]')";
									mysqli_query($conn, $sql1);
									// var_dump($pilih_cbo);
									// echo "<script>window.location.href='bot_tele.php?user_id=$pilih_cbo&link=manual';</script>";
									// exit;

									// echo("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-warning-sign'></span>  Data  Bisa masuk !!</div>");
									echo ("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-check'></span>  Data Sudah Disimpan Pada Database !!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			  //   <span aria-hidden='true'>&times;</span>
			  // </button></div>");

									$area_cbo = "";
									$pilih_cbo = "";
								} else {

									echo ("<div id='' class='alert alert-danger alert-dismissible' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Data Tidak Bisa masuk Mohon periksa kembali !!! Data harus diisi semua!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button></div>");
								}
								// //die();


							} else {
								if (($tgl_nilai_text != "") and  ($qqqq2 != "") and ($nilai != "") and ($item != "") and ($tgl_ol_text != "") and ($rs_monitoring != "") and ($param_tapping_proses != "") and ($param_tapping_sikap != "") and ($param_tapping_solusi != "") and ($lup != "") and ($qco != "") and ($area_cbo != "") and ($periode != "") and ($qqqq != "") and ($fastel != "") and ($no_cp != "") and ($jenis_call != "") and ($kategori_call != "")) {


									$sql = "INSERT INTO `app_kinerja_nilai` (`tanggal`,`user_id`,`nilai`,`item`,`tglrecord`,`ani`,`reason_monitoring`,`param_tapping_proses`,`param_tapping_sikap`,`param_tapping_solusi`,`lup`,`status`,`lup_qa`,`area`,`proses_layanan`,`sikap_layanan`,`periode`,`lup_tl_name`,`solusi_layanan`,`no_cp`,`jenis_call`,`kategori_call`,`login_qco`,`nama_qco`) 
			VALUES ('$tgl_nilai_text','$qqqq2','$nilai','$item','$tgl_ol_text','$fastel','$rs_monitoring','$param_tapping_proses','$param_tapping_sikap','$param_tapping_solusi','$lup','3','$qco','$area_cbo','$nilaiprosesl','$nilaisikapl','$periode','$qqqq','$nilaisolusil','$no_cp','$jenis_call','$kategori_call','$data_qco[1]','$data_qco[0]')";
									//echo "$sql";
									//$query=mysqli_query($conn, $sql);
									//Refresh by HTTP META

									// if ($query=mysqli_query($conn, $sql)) {
									mysqli_query($conn, $sql);

									// echo("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-warning-sign'></span>  Data  Bisa masuk !!</div>");
									echo ("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-check'></span>  Data Sudah Disimpan Pada Database !!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button></div>");

									$area_cbo = "";
									$pilih_cbo = "";
								} else {

									echo ("<div id='' class='alert alert-danger alert-dismissible' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Data Tidak Bisa masuk Mohon periksa kembali !!! Data harus diisi semua!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>&times;</span>
					</button></div>");
								}
							}
						}
					}
					?>

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

 								<div class="adv-table">

 									<div class="col-lg-12">
 										<section class="panel">
 											<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">
 												<h3><i>Data Agent, QC dan Reason Monitoring</i></h3>
 											</div>

 											<div class="panel-body">

 												<p align="right">
 												</p>

 												<div class='col-md-6'>
 													<div class="form-horizontal tasi-form">
 														<div class="form-group">
 															<div class="col-md-12">

 																<div class="alert fade in">
 																	<div class="alert alert-danger fade in">
 																		<strong>Data Layanan dan Area : </strong>
 																	</div>
 																	<div class="alert alert-info fade in">
 																		<div class="form-group">
 																			<label class="col-lg-4 control-label "><strong>Layanan</strong></label>
 																			<div class="col-lg-8">
 																				<input type='text' class='form-control' name='layanan_cbo' id='layanan_cbo' value='Telkom TAM' readonly>
 																			</div>
 																		</div>

 																		<div class="form-group">
 																			<label class="col-lg-4 control-label"><strong>Area</strong></label>
 																			<div class="col-lg-8">


 																				<select class="chosen-select" id="area_cbo" name="area_cbo" class="form-control" onChange="">
 																					<option value=" ">-- Pilih Area --</option>
 																					<?php
																						$pkat = mysqli_query($conn, "SELECT kota FROM `app_kinerja_kota` ");

																						while ($ckat = mysqli_fetch_row($pkat)) {
																							//  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
																							if ($area_cbo == $ckat[0]) {
																								$sel = "selected";
																							} else {
																								$sel = "";
																							}
																							echo (" <option value=$ckat[0] $sel>$ckat[0]</option>");
																						}
																						?>
 																				</select>
 																			</div>
 																		</div>
 																	</div>
 																</div>

 																<div class="alert fade in" style="display:none;">
 																	<div class="alert alert-danger fade in">
 																		<strong>Data Penilai : </strong>
 																	</div>
 																	<div class="alert alert-info fade in">

 																		<div class="form-group">
 																			<label class="col-lg-4 control-label"><strong>Nama / Username</strong></label>
 																			<div class="col-lg-8">
 																				<select class="form-control" name="qco_cbo" id="qco_cbo" tabindex="2">
 																					<option value="">-- Nama / Username --</option>
 																				</select>
 																			</div>
 																		</div>
 																	</div>
 																</div>

 																<div class="alert fade in">
 																	<div class="alert alert-danger fade in">
 																		<strong>Pilih Agent Berdasarkan : </strong>
 																	</div>
 																	<div class="alert alert-info fade in">

 																		<div class="form-group">
 																			<label for="ticket_id" class="col-lg-4 control-label"><strong>Segment/Skill</strong></label>
 																			<div class="col-lg-8">

 																				<input type='text' class='form-control' name='segment_cbo' id='segment_cbo' value='Agent TAM' readonly>
 																			</div>
 																		</div>

 																		<div class="form-group">
 																			<label for="ticket_id" class="col-lg-4 control-label">
 																				<strong>Perner / Nama</strong>
 																			</label>
 																			<div class="col-lg-8" id="div_cbo">


 																				<select class="chosen-select" id="pilih_cbo" name="pilih_cbo" class="form-control" onChange="">
 																					<option value=" ">-- Pilih Agent --</option>
 																					<?php
																						$pkatt = mysqli_query($conn, "SELECT b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Agent TAM' and b.user7='$area_cbo' AND a.qco='$login'");
																						$k = 1;
																						while ($ckatt = mysqli_fetch_row($pkatt)) {
																							//  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
																							if ($pilih_cbo == $ckatt[0]) {
																								$sel = "selected";
																							} else {
																								$sel = "";
																							}
																							echo (" <option value=$ckatt[0] $sel>$ckatt[0] -- $ckatt[1]</option>");
																							$k++;
																						}
																						?>
 																				</select>

 																			</div>
 																		</div>
 																	</div>
 																</div>

 																<div class="alert fade in">
 																	<div class="alert alert-danger fade in">
 																		<div class="form-group">
 																			<label for="ticket_id" class="col-lg-8 control-label"><strong>Pilih Reason Monitoring : </strong></label>
 																			<div class="col-lg-4">
 																				<!--button type="button" class="btn btm-block btn-success" id="btn_tambah_reason_bersih">Tambah Data</button>-->
 																				<button type="button" class="btn btm-block btn-success" style="display:none;" data-toggle="modal" id="btn_tambah_reason" data-target="#modal_help">+</button>
 																			</div>
 																		</div>
 																	</div>
 																	<div class="alert alert-info fade in">
 																		<div class="form-group">


 																			<label for="ticket_id" class="col-lg-4 control-label"><strong>Reason Monitoring</strong></label>
 																			<div class="col-lg-8">

 																				<input type='text' class='form-control' name='rs_monitoring' id='rs_monitoring' value='Tapping Reguler' readonly>
 																			</div>
 																		</div>
 																	</div>
 																</div>

 															</div>
 														</div>
 													</div>
 												</div>



 												<div class='col-md-6'>
 													<div class="form-horizontal tasi-form">
 														<div class="form-group">
 															<div class="col-md-12">

 																<div class="alert fade in">
 																	<div class="alert alert-danger fade in">
 																		<strong>Data Penilai : </strong>
 																	</div>

 																	<div class="alert alert-warning fade in">
 																		<div class="form-group" style="display:none;">
 																			<label for="ticket_id" class="col-lg-3 control-label"><strong>Area</strong></label>
 																			<div class="col-lg-9">
 																				<input type="hidden" width="50px" class="form-control" name="area" value="MLG" placeholder="" readonly>
 																			</div>
 																		</div>

 																		<div class="form-group">

 																			<label for="ticket_id" class="col-lg-4 control-label"><strong>Username</strong></label>
 																			<div class="col-lg-8">
 																				<input type="text" width="50px" class="form-control" name="qco" id="qco" placeholder="" value="<?php echo $_SESSION["username"]; ?>" readonly="true">
 																			</div>
 																		</div>

 																		<div class="form-group">

 																			<label for="ticket_id" class="col-lg-4 control-label"><strong>Nama</strong></label>
 																			<div class="col-lg-8">
 																				<input type="text" width="50px" class="form-control" name="nama_qco" id="nama_qco" placeholder="" value="<?php echo $_SESSION["name"]; ?>"" readonly=" true">
 																			</div>
 																		</div>

 																		<div class="form-group">

 																			<label for="ticket_id" class="col-lg-4 control-label"><strong>Jabatan</strong></label>
 																			<div class="col-lg-8">
 																				<input type="text" width="50px" class="form-control" name="jabatan_qc" id="jabatan_qc" placeholder="" value="<?php echo $_SESSION["jabatan"]; ?>"" readonly=" true">
 																			</div>
 																		</div>

 																		<div class="form-group">

 																			<label for="ticket_id" class="col-lg-4 control-label"><strong>Area</strong></label>
 																			<div class="col-lg-8">
 																				<input type="text" width="50px" class="form-control" name="area_qc" id="area_qc" placeholder="" value="<?php echo $_SESSION["area"]; ?>" readonly="true">
 																			</div>
 																		</div>

 																	</div>
 																</div>

 																<div class="alert fade in">
 																	<div class="alert alert-danger fade in">
 																		<strong>Data Agent : </strong>
 																	</div>

 																	<div class="alert alert-success fade in">
 																		<div class="form-group">
 																			<label for="ticket_id" class="col-lg-3 control-label"><strong>UserID</strong></label>
 																			<div class="col-lg-9">
 																				<!--select class="chosen-select" name="csdm_co" id="csdm_co" tabindex="2">
																	<option value="">--Pilih CSDM agent --</option>
																	
																</select-->
 																				<input type="text" width="50px" class="form-control" name="csdm_co" id="csdm_co" placeholder="" readonly="true">
 																			</div>
 																		</div>

 																		<div class="form-group">

 																			<label for="ticket_id" class="col-lg-3 control-label"><strong>Nama Agent</strong></label>
 																			<div class="col-lg-9">
 																				<!--select class="chosen-select" name="nama" id="nama_co" tabindex="2">
																	<option value="">--Pilih nama agent --</option>
																	
																</select-->
 																				<input type="text" width="50px" class="form-control" name="nama" id="nama_co" placeholder="" readonly="true">
 																			</div>
 																		</div>


 																		<div class="form-group">
 																			<label for="ticket_id" class="col-lg-3 control-label"><strong>Segment/Skill</strong></label>
 																			<div class="col-lg-9">
 																				<input type="text" width="50px" class="form-control" name="segment" id="userlevel" placeholder="" value="" readonly>
 																			</div>
 																		</div>

 																		<div class="form-group" style="display:none;">
 																			<label class="col-lg-3 control-label"><strong>Layanan</strong></label>
 																			<div class="col-lg-9">
 																				<input type="text" width="50px" class="form-control" name="layanan" id="layanan" placeholder="" value="" readonly>
 																			</div>
 																		</div>

 																		<div class="form-group">
 																			<label class="col-lg-3 control-label"><strong>Area</strong></label>
 																			<div class="col-lg-9">
 																				<input type="text" width="50px" class="form-control" name="ket" id="ket" placeholder="" value="" readonly>
 																			</div>
 																		</div>




 																		<div class="form-group">
 																			<label for="ticket_id" class="col-lg-3 control-label"><strong>Jenis Kelamin</strong></label>
 																			<div class="col-lg-9">
 																				<input type="text" width="50px" class="form-control" name="gender" id="gender"  readonly>
 																			</div>
 																		</div>

 																		<div class="form-group">
 																			<label for="ticket_id" class="col-lg-3 control-label"><strong>TL</strong></label>
 																			<div class="col-lg-9">
 																				<input type="text" width="50px" class="form-control" name="tl" id="user_tl" value="" readonly>

 																			</div>
 																		</div>



 																		<div class="form-group">
 																			<label for="ticket_id" class="col-lg-3 control-label"><strong>Typing Bulan Ini</strong></label>
 																			<div class="col-lg-9">
 																				<input type="text" width="50px" class="form-control" id="los" name="los" placeholder="" readonly>
 																			</div>
 																		</div>


 																	</div>
 																</div>


 															</div>
 														</div>
 													</div>




 												</div>

 										</section>
 									</div>



 									<div class="col-lg-12">
 										<section class="panel">
 											<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">
 												<h3><i>Data Data Percakapan</i></h3>
 											</div>
 											<div class="panel-body">
 												<p align="right">
 												</p>

 												<div class='col-md-6'>
 													<div class="form-horizontal tasi-form">
 														<div class="form-group">
 															<div class="col-md-12">
 																<div class="alert alert-info fade in">
 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Tanggal Penilaian</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" name="tgl_nilai_text" value="<?php echo $tgl; ?>" readonly>

 																		</div>
 																		<div class="col-lg-9" style="display:none">
 																			<div class="input-group date form_datetime-adv">
 																				<input type="text" width="50px" class="form-control" name="tgl_nilai_text1" id="tgl_nilai_text" readonly="true" placeholder="">
 																				<span class="input-group-btn">
 																					<button type="button" class="btn btn-danger" id="tgl_nilai_text_reset"><i class="icon-remove"></i></button>
 																					<button type="button" class="btn btn-warning" id="tgl_nilai_text_set"><i class="icon-calendar"></i></button>
 																				</span>
 																			</div>
 																		</div>
 																	</div>

 																	<!-- <div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>MULTICONTACT</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" name="msisdn" placeholder="62xxxxxxxxxxx">
 																		</div>
 																	</div>

 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>NCLI</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" name="record_id" placeholder="">
 																		</div>
 																	</div>

 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>ND</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" name="nd" placeholder="">
 																		</div>
 																	</div> -->

																	 <div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>FASTEL</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" name="fastel" placeholder="">
 																		</div>
 																	</div>

 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>NO CP</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" name="no_cp" placeholder="">
 																		</div>
 																	</div>

																	 <div class="form-group">
																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Jenis Call</strong></label>
																		<div class="col-lg-9">
																			<select width="50px" class="form-control" id="jenis_call" name="jenis_call">
																				<option value="">-- Pilih Jenis Call --</option>
																				<?php
																					$query_jenis = mysqli_query($conn, "SELECT * FROM app_tam_jenis WHERE aktif='1'");
																					while ($hasil_jenis = mysqli_fetch_array($query_jenis)) {
																						echo "<option value=".$hasil_jenis['keterangan'].">".$hasil_jenis['keterangan']."</option>";
																					}
																				?>
																			</select>
																		</div>
																	</div>

																	<div class="form-group">
																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Kategori Call</strong></label>
																		<div class="col-lg-9">
																			<select width="50px" class="form-control" id="kategori_call" name="kategori_call">
																				<option value="">-- Pilih Kategori Call --</option>
																				<option value="AGREE">AGREE</option>
																				<option value="DECLINE">DECLINE</option>
																				<option value="FU">FU</option>
																			</select>
																		</div>
																	</div>

 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Tanggal Recording</strong></label>
 																		<div class="col-lg-9">
 																			<div id="tgl_ol_text" class="input-group date form_datetime-adv">
 																				<input type="text" width="50px" class="form-control" name="tgl_ol_text" id="tgl_ol_textx" readonly="true" data-format="dd/MM/yyyy" placeholder="">
 																				<span class="input-group-btn">
 																					<button type="button" class="btn btn-danger" id="tgl_ol_text_reset"><i class="icon-remove"></i></button>
 																					<button type="button" class="add-on btn btn-warning" id="tgl_ol_text_set"><i class="icon-calendar"></i></button>
 																				</span>
 																			</div>
 																		</div>
 																	</div>

 																	<!-- <div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Jam Recording</strong></label>
 																		<div class="col-lg-9">
 																			<span class="input-group-btn">
 																				<select id="cbo_jam" name="cbo_jam">
 																				</select> :
 																				<select id="cbo_menit" name="cbo_menit">
 																				</select> :
 																				<select id="cbo_detik" name="cbo_detik">
 																				</select>
 																			</span>
 																			<input type="hidden" width="50px" class="form-control" id="jam" name="jam" placeholder="" value="00:00:00"> -->

 																			<!--div class="input-group bootstrap-timepicker">
																  <input type="text" id="jam" name="jam" class="form-control timepicker-24" value="" readonly>
																  <span class="input-group-btn">
																		<button type="button" class="btn btn-danger" id="jam_reset"><i class="icon-remove"></i></button>
																		<button class="btn btn-warning" type="button" id="jam_set"><i class="icon-time"></i></button>
																  </span>
																</div-->
 																		<!-- </div>
 																	</div> -->

 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Periode Tabbing</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" id="periode" name="periode" readonly>
 																		</div>
 																	</div>
																	<!-- 
																	 <div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Gimmick</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" id="gimmick" name="gimmick" readonly>
 																		</div>
 																	</div>
																	 <div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>FCR</strong></label>
 																		<div class="col-lg-9">
 																			<input type="text" width="50px" class="form-control" id="fcr" name="fcr" readonly>
 																		</div>
 																	</div>
																	<div class="form-group">
																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Smile Voice</strong></label>
																		<div class="col-lg-9">
																			<select width="50px" class="form-control" id="smile_voice" name="smile_voice">
																				<option value="">-- Pilih Smile Voice --</option>
																				<option value="OK">OK</option>
																				<option value="NOK">NOK</option>
																			</select>
																		</div>
																	</div> -->
 																</div>


 															</div>
 														</div>
 													</div>
 												</div>




 										</section>
 									</div>




 									<div class="col-lg-12">
 										<section class="panel">
 											<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">
 												<h3><i>Parameter Penilaian</i></h3>
 											</div>
 											<div class="panel-body">
 												<p align="right">
 												</p>

 												<div class='col-xl-12'>

 													<table border="0" width="95%" cellpadding="2" cellspacing="1" style="border-collapse: collapse" class="forumline">
 														<?php
                                                            $angka=1;
                                                            
                                                            $id_kat = "";
															$sqlpoin = "select * from app_kinerja_poin where aktif ='1' ";
															//echo $sqlpoin;
															$qpoin = mysqli_query($conn, $sqlpoin);
															$no = 1;
															while ($rowpoin = mysqli_fetch_row($qpoin)) {
															?>

 															<tr>
 																<td colspan="4" bgcolor="#5e85d7" align="left">
 																	<font color="#FFFFFF" size="2"><b> <?php echo $rowpoin[1]; ?></b></font>
 																</td>

 															</tr>
 															<?php
                                                                $id_kat .= "-"."|";
																$sqlkat = "select * from app_kinerja_kategori where id_poin='$rowpoin[0]' and jabatan='Agent TAM' and status='1' order by id";
																//echo "$sqlkat<br>";
																$qkat = mysqli_query($conn, $sqlkat);
																while ($rowkat = mysqli_fetch_row($qkat)) {



																?>
 																<tr>
 																	<td width="2%" align="left" bgcolor="#dde6ff"> <?php echo "$no."; ?></td>
 																	<td width="80%" align="left" bgcolor="#dde6ff"> <?php echo "$rowkat[2] "; ?></td>
 																	<td width="10%" align="left" bgcolor="#dde6ff"><?php echo "$rowkat[3] "; ?></td>
 																	<td bgcolor="#dde6ff">
 																		<?php
																			//$a=$_POST["n$rowkat[0]"];

																			// if ($val_kat=="")
																			// { $val_kat="-";}
																			// $id_kat .= $rowkat[0] . ";" . "-|";
																			$val_itm .= "-'.'|";
                                                                            // $id_kat .= $rowkat[0] . "|";
                                                                            $id_kat .= $angka."|";
																			?>

 																	</td>
 																</tr>
 																<?php
																	$sqlitem = "select * from app_kinerja_item where id_kat='$rowkat[0]' and jabatan='Agent TAM' and status='1'";
																	//echo "$sqlkat<br>";
																	$qitem = mysqli_query($conn, $sqlitem);
																	$abjad = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
																	$list = 0;
																	while ($rowitem = mysqli_fetch_row($qitem)) {

																	?>
 																	<tr>
 																		<td bgcolor="#dde6ff" align="left"></td>
 																		<td bgcolor="#dde6ff" align="left">
 																			<?php echo "$abjad[$list]."; ?> &nbsp;
 																			<?php echo "$rowitem[2]"; ?>

 																		</td>
 																		<td bgcolor="#dde6ff" align="left"><?php echo "$rowitem[3]" ?></td>
 																		<td bgcolor="#dde6ff">
 																			<?php
																				$b = '';
																				$c = $rowitem[0] . $rowitem[1];

																				$val_itm .= "'.na$c.'" . '|';
																				//$b.="-$val_itm".'|';
																				

																				//$c="n".$rowitem[0].$rowitem[1];
																				//echo $b;
																				echo "<select name=\"na" . $c . "\">
																	<option value=\"1\" >1</option>
																	<option value=\"0\" >0</option>
																	</select>";
																				//echo "$b";

																				?>
 																		</td>
 																	</tr>
 														<?php
																		$list++;
																	}
                                                                    
                                                                    
																	$no++;
                                                                    
                                                                    $id_all = '';
                                                                    //----hasil nilai------------
                                                                    //echo $val_kat;
                                                                    //$value ="'$val_itm'";
                                                                    //$value='na11';
    
                                                                    // //----hasil item -------------
                                                                    $id_all .= "$id_kat";
                                                                    $angka++;
																}
															}
                                                            
															?>
 													</table>
 												</div>
 											</div>
 										</section>
 									</div>

 									<div class="col-lg-12">
 										<section class="panel">
 											<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">
 												<h3><i>
 														<font face="Arial">Summary NC & Rekomendasi</font>
 													</i></h3>
 											</div>
 											<div class="panel-body">

 												<p align="right">
 												</p>

 												<div class='col-md-12'>
 													<div class="form-horizontal tasi-form">
 														<div class="form-group">
 															<div class="col-md-12">


 																<H5 align="center"><strong>Parameter & Korektive</strong></H5>

 																<div class="alert alert-info fade in">
 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Parameter Tapping Solusi Layanan</strong></label>
 																		<div class="col-lg-9">
 																			<textarea name="param_tapping_solusi" class="form-control  t-text-area" rows="2" placeholder=""></textarea>
 																			<p></p>
 																		</div>
 																	</div>
																	 <div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Parameter Tapping Proses Layanan</strong></label>
 																		<div class="col-lg-9">
 																			<textarea name="param_tapping_proses" class="form-control  t-text-area" rows="2" placeholder=""></textarea>
 																			<p></p>
 																		</div>
 																	</div>
 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Parameter Tapping Sikap layanan</strong></label>
 																		<div class="col-lg-9">
 																			<textarea name="param_tapping_sikap" class="form-control  t-text-area" rows="2" placeholder=""></textarea>
 																			<p></p>
 																		</div>
 																	</div>
 																</div>


 															</div>
 														</div>
 													</div>
 												</div>

 												<!-- <div class='col-md-6'>
 													<div class="form-horizontal tasi-form">
 														<div class="form-group">
 															<div class="col-md-12">

 																<H5 align="center"><strong>Rekomendasi</H5>

 																<div class="alert alert-warning fade in">
 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Human</label>
 																		<div class="col-lg-9">
 																			<textarea name="human" class="form-control  t-text-area" rows="2" placeholder=""></textarea>
 																			<p></p>
 																		</div>
 																	</div>

 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Sistem/Prosedur</label>
 																		<div class="col-lg-9">
 																			<textarea name="system_prosedur" class="form-control  t-text-area" rows="2" placeholder=""></textarea>
 																			<p></p>
 																		</div>
 																	</div>

 																	<div class="form-group">
 																		<label for="ticket_id" class="col-lg-3 control-label"><strong>Tools</label>
 																		<div class="col-lg-9">
 																			<textarea name="tools" class="form-control  t-text-area" rows="2" placeholder=""></textarea>
 																			<p></p>
 																		</div>
 																	</div>
 																</div>



 															</div>
 														</div>
 													</div>
 												</div> -->
 											</div>
 										</section>
 									</div>

 									<!-- save -->
 									<div class="col-lg-12">
 										<section class="panel tab-bg-dark-navy-blue">
 											<div class="panel-body">
 												<p align="center">id_all
 													<!--  <a id="link_simpan" href="#myModal" data-toggle="modal" class="btn btn-primary" style="display:none;">btn Simpan</a> -->
 													<button width="100" type="submit" id="Save" name="Save" class="btn   btm-block btn-success">Save</button>
 													<button width="100" type="button" id="Close" name="Close" class="btn   btm-block btn-danger">Close</button>
 												</p>
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
 	<!-- <script src="../js/jquery.scrollTo.min.js"></script> -->
 	<!-- <script src="../js/jquery.nicescroll.js" type="text/javascript"></script> -->


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
 			var data = "area=" + area + "&login=<?=$login?>";
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
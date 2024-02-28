 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">

	  <!--sidebar start-->
<!-- <SCRIPT language=Javascript>
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))

return false;
return true;
}
</SCRIPT> -->

   <?php 

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
include("koneksi.php"); 
//require_once('koneksi.php');
     

   include('sidebar.php'); 
		 //require_once('koneksi.php');
		 date_default_timezone_set('Asia/Jakarta');
		 $tgl=date('Y-m-d');
		 $lup=date('Y-m-d h:i:s');

				 
				$qsks=mysqli_query($conn, "SELECT * FROM `maincc147`.`app_kinerja_nilai` WHERE `user_id` = '$id'");

		 $rsks=mysqli_fetch_row($qsks);

									 
   ?>
        <style type="text/css">
      	#tgl_ol_text_set{
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
			<form id="form" name="demoform" method="post" action="form_insert_edit_qco.php">
			
				<div class="row">			
		  			<section class="panel">

		  			 <div class="panel-body">

		  			  <div class="box">
						<div class="overlay" id="overlay">
						  <p align="center">
						  	<span style="font-size: 6em;">Mohon ditunggu </span><br/>
                          	<i class="fa fa-refresh fa-spin fa-40x"></i>
                     	  </p>
                        </div>

                        <div class="adv-table">

						<div class="col-lg-12">							
							<section class="panel">
								<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">									
									<h3><i>Data Agent, QC dan Reason Monitoring Edit For QCO</i></h3>
													
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
																	<label class="col-lg-4 control-label"><strong>Layanan</strong></label>
																	<div class="col-lg-8">
																		<input type='text' class='form-control' name='layanan_cbo' id='layanan_cbo' value='Telkom 147' readonly >
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-lg-4 control-label"><strong>Area</strong></label>
																	<div class="col-lg-8" >
																		<select class="chosen-select" name="area_cbo" id="area_cbo" tabindex="2" readonly>
																		<option value="<?php echo $rsks[22]; ?>"><?php echo $rsks[22]; ?>	</option>
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
																  <label  class="col-lg-4 control-label"><strong>Nama / Username</strong></label>
																  <div class="col-lg-8">
																	  <select class="form-control" name="qco_cbo" id="qco_cbo" tabindex="2">
																			<option value="" >-- Nama / Username --</option>																			
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
																		<!-- <select class="form-control" name="segment_cbo" id="segment_cbo" tabindex="2" value="Agent FBCC" readonly>
																			
																			
																		</select> -->
																		<input type='text' class='form-control' name='segment_cbo' id='segment_cbo' value='Agent FBCC' readonly >
																	</div>
																</div>
																
																<div class="form-group">
																	<label for="ticket_id" class="col-lg-4 control-label">
																		<strong>Perner / Nama</strong>
																	</label>
																	<div class="col-lg-8" id="div_cbo">
																		<select class="chosen-select" name="pilih_cbo" >
																		<option value="<?php echo $rsks[1]; ?>" ><?php
																		$qskss=mysqli_query($conn, "SELECT user2 FROM `maincc147`.`cc147_main_users_extended` WHERE `user1` = '$rsks[1]'");

																	 $rskss=mysqli_fetch_row($qskss);

																		 echo $rsks[1]; ?> -- <?php echo $rskss[0]; ?></option>
																		
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
																	  <select class="chosen-select" name="rs_monitoring" id="rs_monitoring">
																			<option value="<?php echo $rsks[17]; ?>"><?php echo $rsks[17]; ?></option>
																			

																	  </select>
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
																  <input type="hidden" width="50px" class="form-control"  name="area" value="MLG" placeholder="" readonly>																	  
															  </div>
														  </div>
														
														  <div class="form-group">
														
															<label for="ticket_id" class="col-lg-4 control-label"><strong>Username</strong></label>
															<div class="col-lg-8">																
																<input type="text" width="50px" class="form-control"  name="qco" id="qco" placeholder="" value="<?php echo $_SESSION["username"]; ?>" readonly="true" >	
															</div>
														  </div>
														  
														  <div class="form-group">
														
															<label for="ticket_id" class="col-lg-4 control-label"><strong>Nama</strong></label>
															<div class="col-lg-8">																
																<input type="text" width="50px" class="form-control"  name="nama_qco" id="nama_qco" placeholder="" value="<?php echo $_SESSION["name"]; ?>"" readonly="true" >	
															</div>
														  </div>

														  <div class="form-group">
														
															<label for="ticket_id" class="col-lg-4 control-label"><strong>Jabatan</strong></label>
															<div class="col-lg-8">																
																<input type="text" width="50px" class="form-control"  name="jabatan_qc" id="jabatan_qc" placeholder="" value="<?php echo $_SESSION["jabatan"]; ?>" readonly="true" >	
															</div>
														  </div>

														  <div class="form-group">
														
															<label for="ticket_id" class="col-lg-4 control-label"><strong>Area</strong></label>
															<div class="col-lg-8">																
																<input type="text" width="50px" class="form-control"  name="area_qc" id="area_qc" placeholder="" value="<?php echo $_SESSION["area"]; ?>" readonly="true" >	
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
														  		<input type="text" width="50px" class="form-control" name="tgl_nilai_text" value="<?php echo $rsks[0]; ?>" readonly>

														  </div>
														  <div class="col-lg-9" style="display:none">
															  <div class="input-group date form_datetime-adv">																
																<input type="text" width="50px" class="form-control"  name="tgl_nilai_text1" id="tgl_nilai_text" readonly="true" placeholder="" >
																<span class="input-group-btn">
																	<button type="button" class="btn btn-danger" id="tgl_nilai_text_reset"><i class="icon-remove"></i></button>
																	<button type="button" class="btn btn-warning" id="tgl_nilai_text_set"><i class="icon-calendar"></i></button>
																</span>														
															  </div>
														  </div>
													  </div>

													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>MSISDN</strong></label>
														  <div class="col-lg-9">
															  <input type="text" width="50px" class="form-control"  name="msisdn" placeholder="62xxxxxxxxxxx" value="<?php echo $rsks[13]; ?>">
														  </div>
													  </div>
								                      
								                       <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Record ID</strong></label>
														  <div class="col-lg-9">
															  <input type="text" width="50px" class="form-control"  name="record_id" placeholder="" value="<?php echo $rsks[5]; ?>">
														  </div>
													  </div>
								                      
													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Tanggal Online</strong></label>
														  <div class="col-lg-9">
															  <div id="tgl_ol_text" class="input-group date form_datetime-adv">																
																<input type="text" width="50px" class="form-control"  name="tgl_ol_text" id="tgl_ol_textx" readonly="true" data-format="dd/MM/yyyy hh:mm:ss" value="<?php echo $rsks[4]; ?>" >
																<span class="input-group-btn">
																	<button type="button" class="btn btn-danger" id="tgl_ol_text_reset"><i class="icon-remove"></i></button>
																	<button type="button" class="add-on btn btn-warning" id="tgl_ol_text_set"><i class="icon-calendar"></i></button>
																</span>														
															  </div>
														  </div>
													  </div>								                      
								                      

													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Jam</strong></label>
														  <div class="col-lg-9">
															  <span class="input-group-btn">
															  <input  width="50px" class="form-control" id="jam"  name="jam" placeholder="" value="<?php echo $rsks[6]; ?>">
															  
															  <!--div class="input-group bootstrap-timepicker">
																  <input type="text" id="jam" name="jam" class="form-control timepicker-24" value="" readonly>
																  <span class="input-group-btn">
																		<button type="button" class="btn btn-danger" id="jam_reset"><i class="icon-remove"></i></button>
																		<button class="btn btn-warning" type="button" id="jam_set"><i class="icon-time"></i></button>
																  </span>
															  </div-->
														  </div>
													  </div>
													  
													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Periode Tabbing</strong></label>
														  <div class="col-lg-9">
															  <input type="text" width="50px" class="form-control" id="periode"  name="periode" value="<?php echo $rsks[11]; ?>" readonly >
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
									<h3><i>Parameter Penilaian </i></h3>									
								</div>
								<div class="panel-body">
									<p align="right">										
									</p>								
									
									<div class='col-md-11'>
										<div class="form-horizontal tasi-form">
										  
											<div class="form-group">												
												<div class="col-md-12">


													<h5 class="alert alert-danger" align="center"><strong>PROSES LAYANAN</strong></h5>
													 <div class="alert alert-success" role="alert" style="margin-bottom: 0px;">

													   <div class="form-group" id="div_lc_cust">
														  <label class="control-label col-lg-9" for="detail2"><strong>1. Mengucapkan salam pembuka dengan baik</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst1" id="lc_cust" size="1">
																<?php
																$sn=explode('|',$rsks[2],-1);
																echo $sn ;
																if ($sn[1]==3) {
																	echo '<option value="3">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="3">1</option>';
																}

																 ?>
																										
																	
																	
															</select>										  

															</div>

								                      </div>
								                      </div>

								                       <div class="alert alert-info" role="alert" style="margin-bottom: 0px;">
								                       	<div class="form-group" id="div_lc_agnt">
														  <label class="control-label col-lg-9" for="detail2"><strong>2. Konfirmasi nama pelanggan dan menggunakannya selama pelayanan berlangsung</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst2" id="lc_cust" size="1">
																<?php
																
																if ($sn[3]==3) {
																	echo '<option value="3">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="3">1</option>';
																}

																 ?>
															  </select>										  

															</div>
								                      		</div>
														</div>
								                    <div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
								                       <div class="form-group" id="div_lc_syst">
														  <label class="control-label col-lg-9" for="detail2"><strong>3. Identifikasi/klarifikasi nomor msisdn</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst3" id="lc_syst" size="1">
																	
																<?php
																if ($sn[4]==6) {
																	echo '<option value="6">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="6">1</option>';
																}

																 ?>									
																									
															  </select>										  

															</div>
								                      </div>
								                      </div>
								                      <div class="alert alert-info" role="alert" style="margin-bottom: 0px;">
								                     <div class="form-group" id="div_lc_syst">
														  <label class="control-label col-lg-9" for="detail2"><strong>4. Informasi jumlah tagihan, moda pembayaran dan reminding terhadap jadwal pembayaran tagihan telkom (sesuai dengan List To Do yang sedang di call)</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst4" id="lc_syst" size="1">
																										
																<?php
																if ($sn[5]==15) {
																	echo '<option value="15">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">1</option><option value="15">0</option>';
																}

																 ?>							
															  </select>										  

															</div>
								                      </div>
								                     </div>
								                     <div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
								                       <div class="form-group" id="div_lc_syst">
														  <label class="control-label col-lg-9" for="detail2"><strong>5. Agent mampu meyakinkan pelanggan untuk bersedia melakukan pembayaran tagihan</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst5" id="lc_syst" size="1">
																								
																<?php
																if ($sn[7]==10) {
																	echo '<option value="10">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="10">1</option>';
																}

																 ?>								
															  </select>										  

															</div>
								                      </div>
								                      </div>
								                      <div class="alert alert-info" role="alert" style="margin-bottom: 0px;">
								                        <div class="form-group" id="div_lc_syst">
														  <label class="control-label col-lg-9" for="detail2"><strong>6. Agent melakukan konfirmasi janji bayar ke pelanggan</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst6" id="lc_syst" size="1">
																										
																<?php
																if ($sn[8]==10) {
																	echo '<option value="10">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="10">1</option>';
																}

																 ?>								
															  </select>										  

															</div>
								                      </div>
													</div>
													<div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
								                        <div class="form-group" id="div_lc_syst">
														  <label class="control-label col-lg-9" for="detail2"><strong>7. Mampu memberikan informasi dan penjelasan terkait tagihan ( ex : detail tagihan, klaim dll) saat pelanggan memerlukan</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst7" id="lc_syst" size="1">
																<?php
																if ($sn[10]==10) {
																	echo '<option value="10">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="10">1</option>';
																}

																 ?>							
															  </select>										  

															</div>
								                      </div>
								                      </div>
								                      <div class="alert alert-info" role="alert" style="margin-bottom: 0px;">
								                        <div class="form-group" id="div_lc_syst">
														  <label class="control-label col-lg-9" for="detail2"><strong>8. Melakukan pelaporan pembuatan tiket terhadap pelanggan yang mengalami gangguan fastel</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst8" id="lc_syst" size="1" >
																<?php
																if ($sn[11]==10) {
																	echo '<option value="10">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="10">1</option>';
																}

																 ?>									
															  </select>										  

															</div>
								                      </div>
								                       </div>
								                       <div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
								                        <div class="form-group" id="div_lc_syst">
														  <label class="control-label col-lg-9" for="detail2"><strong>9. Agent melakukan konfirmasi preference channel yang sesuai dengan kebutuhan Pelanggan</strong></label>
														  <div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst9" id="lc_syst" size="1">
																<?php
																if ($sn[13]==7) {
																	echo '<option value="7">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="7">1</option>';
																}

																 ?>								
															  </select>										  

															</div>
								                      </div>
								                      </div>
								                      <div class="alert alert-info" role="alert" >
								                        <div class="form-group" id="div_lc_syst">
														  <label class="control-label col-lg-9" for="detail2"><strong>10. Menyampaikan salam penutup (Closing Greeting) --> disertakan dengan campaign MyIH</strong></label>
														  	<div class="col-xs-2" style="left: 80px;">											
															<select class="chosen-select" name="lc_syst10" id="lc_syst" size="1">
																<?php
																if ($sn[15]==6) {
																	echo '<option value="6">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="6">1</option>';
																}

																 ?>									
															  </select>										  

															</div>
								                      		</div>   
                                                 
								                       </div> 

								                          <h5 class="alert alert-danger" align="center"><strong>SIKAP LAYANAN</strong></h5> 
								                            <div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
								                        		<div class="form-group" id="div_lc_syst">
														 		 <label class="control-label col-lg-9" for="detail2"><strong>11. Menggunakan bahasa yang baik, fleksibel, mudah dimengerti dan nyaman bagi pelanggan</strong></label>
														  			<div class="col-xs-2" style="left: 80px;">											
																	<select class="chosen-select" name="lc_syst11" id="lc_syst" size="1">
																<?php
																
																if ($sn[17]==5) {
																	echo '<option value="5">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="5">1</option>';
																}

																 ?>					
															  		</select>										  
															  		</div>
								                      			</div>   
                                                 
								                          	</div>

								                          	<div class="alert alert-info" role="alert" style="margin-bottom: 0px;">
								                        		<div class="form-group" id="div_lc_syst">
														 		 <label class="control-label col-lg-9" for="detail2"><strong>12. Memiliki Etika Komunikasi : Ramah, Sopan, bersikap empati, Tidak memancing/Tidak terpancing pelanggan yang emosi, Tidak memotong percakapan</strong></label>
														  			<div class="col-xs-2" style="left: 80px;">											
																	<select class="chosen-select" name="lc_syst12" id="lc_syst" size="1">
																									
																		<?php
																if ($sn[18]==10) {
																	echo '<option value="10">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="10">1</option>';
																}

																 ?>								
															  		</select>										  
															  		</div>
								                      			</div>   
                                                 
								                          	</div>

								                          	<div class="alert alert-success" role="alert" style="margin-bottom: 0px;">
								                        		<div class="form-group" id="div_lc_syst">
														 		 <label class="control-label col-lg-9" for="detail2"><strong>13. Intonasi, volume suara, kecepatan dan cara melayani pelanggan yang sopan dan ramah selama melayani</strong></label>
														  			<div class="col-xs-2" style="left: 80px;">											
																	<select class="chosen-select" name="lc_syst13" id="lc_syst" size="1">
																<?php
																if ($sn[19]==5) {
																	echo '<option value="5">1</option><option value="0">0</option>';
																}else{
																	echo '<option value="0">0</option><option value="5">1</option>';
																}

																 ?>	
																	 	
																	 </option>
																	
																							
															  		</select>										  
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
									<h3><i><font face="Arial">Summary NC & Rekomendasi</font></i></h3>									
								</div>
								<div class="panel-body">

									<p align="right">										
									</p>								
									
									<div class='col-md-6'>
										<div class="form-horizontal tasi-form">
											<div class="form-group">												
												<div class="col-md-12">


													<H5 align="center"><strong>Parameter & Korektive</strong></H5>

													<div class="alert alert-info fade in">
														 <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>Parameter Tapping Proses layanan</strong></label>
															  <div class="col-lg-9">
																  <textarea  name="param_tapping_proses"  class="form-control  t-text-area" rows="2" ><?php echo $rsks[7]; ?></textarea>
																	<p></p>
															  </div>
														  </div>
														  <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>Parameter Tapping Sikap layanan</strong></label>
															  <div class="col-lg-9">
																  <textarea  name="param_tapping_sikap"  class="form-control  t-text-area" rows="2" placeholder=""><?php echo $rsks[8]; ?></textarea>
																	<p></p>
															  </div>
														  </div>

														  <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>OFI (Opportunity to improve)</strong></label>
															  <div class="col-lg-9">
																  <textarea  name="ofi"  class="form-control  t-text-area" rows="2" placeholder=""><?php echo $rsks[9]; ?></textarea>
																	<p></p>
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
													
													<H5 align="center"><strong>Rekomendasi</H5>

                                                     <div class="alert alert-warning fade in">
													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Human</label>
														  <div class="col-lg-9">
															  <textarea  name="human"  class="form-control  t-text-area" rows="2" placeholder=""><?php echo $rsks[14]; ?></textarea>
																<p></p>
														  </div>
													  </div>

													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Sistem/Prosedur</label>
														  <div class="col-lg-9">
															  <textarea  name="system_prosedur"  class="form-control  t-text-area" rows="2" placeholder=""><?php echo $rsks[15]; ?></textarea>
																<p></p>
														  </div>
													  </div>

													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Tools</label>
														  <div class="col-lg-9">
															  <textarea  name="tools"  class="form-control  t-text-area" rows="2" placeholder=""><?php echo $rsks[16]; ?></textarea>
																<p></p>
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

						<!-- save -->				
						<div class="col-lg-12" >
						<section  class="panel tab-bg-dark-navy-blue">
						  <div class="panel-body">
						  <p align="center">
						 <!--  <a id="link_simpan" href="#myModal" data-toggle="modal" class="btn btn-primary" style="display:none;">btn Simpan</a> -->
							<button  width = "100" type="submit" id="Save" name="Save" class="btn   btm-block btn-success">Save</button>
							<button  width = "100" type="button" id="Close" name="Close" class="btn   btm-block btn-danger">Close</button>
						  </p>
						</div>	
						</section>
						</div>
						<!-- save end -->	

					   </div><!--<div class="adv-table"> -->
					  </div><!-- <div class="box"> -->

					 </div><!-- <div class="panel-body"> -->


					</section> <!-- <section class="panel"> -->			

				</div> <!-- <div class="row"> -->
			
				<input type="hidden" id="form_req" name="form_req" class="form-control" value="">				
				<input type="hidden" id="vactive_level" class="form-control" value="Supervisor">				
				<input type="hidden" id="sub_menu" name="sub_menu" class="form-control" size="20" value="">
				<input type="hidden" id="sts" name="sts" size="20" class="form-control" value="">
				<input type="hidden" id="from_dash" name="from_dash" class="form-control" size="20" value="">
				<input type="hidden"  name="upd" class="form-control"  value="MOCH FAJAR SAHURI">					

			</form>	
<?php



if (isset($_POST['Save']) ){

$nilai='-|'.$lc_syst1.'|-'.'|'.$lc_syst2.'|'.$lc_syst3.'|'.$lc_syst4.'|-'.'|'.$lc_syst5.'|'.$lc_syst6.'|-'.'|'.$lc_syst7.'|'.$lc_syst8.'|-'.'|'.$lc_syst9.'|-'.'|'.$lc_syst10.'|-'.'|'.$lc_syst11.'|'.$lc_syst12.'|'.$lc_syst13.'|';

//echo $nilai;

		// $sql="INSERT INTO `app_kinerja_nilai` (`tanggal`,`user_id`,`nilai`,`item`,`tglrecord`,`recordid`,`ani`,`reason_monitoring`,`durasi`,`param_tapping_proses`,`param_tapping_sikap`,`ofi`,`lup`,`status`,`human`,`system_prosedur`,`tools`,`lup_qa`,`area`) 
		// VALUES ('$tgl_nilai_text','$pilih_cbo','$nilai','$nilai2','$tgl_ol_text','$record_id','$msisdn','$rs_monitoring','$jam','$param_tapping_proses','$param_tapping_sikap','$ofi','$lup','0','$human','$system_prosedur','$tools','$qco','$area_cbo')";

		$sql="UPDATE `maincc147`.`app_kinerja_nilai` SET `tanggal` = '$tgl_nilai_text', `user_id` = '$pilih_cbo', `nilai` = '$nilai', `tglrecord` = '$tgl_ol_text', `recordid` = '$record_id', `ani` = '$msisdn', `reason_monitoring` = '$rs_monitoring', `durasi` = '$jam', `param_tapping_proses` = '$param_tapping_proses', `param_tapping_sikap` = '$param_tapping_sikap', `ofi` = '$ofi', `lup` = '$lup', `status` = -1, `human` = '$human', `system_prosedur` = '$system_prosedur', `tools` = '$tools', `lup_qa` = '$qco', `area` = '$area_cbo'  WHERE `tanggal` = '$tgl_nilai_text' AND `user_id` = '$pilih_cbo' ";
		echo "$sql";
		//$query=mysqli_query($conn, $sql);
	 //Refresh by HTTP META
		$query=mysqli_query($conn, $sql)
	
		?>

		<script type="text/javascript">
	    alert("data sudah masuk Terimakasih");
	   echo("<meta http-equiv='refresh' content='1'>");
	  
		</script>
	<?php
 echo "<script type='text/javascript'>window.top.location='app_bina_qco_rejected.php';</script>"; exit;
	}
	
?>
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
									<input type="text" width="50px" class="form-control"  name="nama_reason" id="nama_reason" maxlength="100" placeholder="" >
								</div>
							</div>
						  </div>
						  <div class="modal-footer">
								<button  width = "100" type="submit" id="btn_tambah_reason_save" name="Save" class="btn  btm-block btn-success">Save</button>
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
									
									<div class="col-lg-12" >
										<section  class="panel tab-bg-dark-navy-blue">
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
	
    <script src="../js/jquery.customSelect.min.js" ></script>
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
</html><script type="text/javascript">

	$(function(){
		set_combo_jam();
		set_combo_durasi();
		set_combo_aht();
		set_combo_durasi_wording();

		$("#overlay").hide();
		$(".adv-table").show();
	
$('#tgl_ol_text').datetimepicker({
		  format: 'yyyy-MM-dd hh:mm:ss',
		  language: 'pt-BR'
		}).on('changeDate', function(e){

			$("#tgl_ol_text").find("input").val();
			  var date = $("#tgl_ol_text").data("datetimepicker").getDate(),formatted = date.getDate() ;
			 $("#periode").val("");
			 if (formatted != "")
			 {
				$.ajax({  
					type: "POST",  
					url: 'json_baca_periode.php',  
					data: 'tanggal='+formatted,
					dataType: "json",  
					success: function(data){
						//alert(formatted);
						 if (data[0].status == '1')
						 {
						 	$("#periode").val(data[0].periode);
						 }
					}
				});
			}
		});
		
		$('#tgl_ol_text_reset').click(
			function(){					
				$('#tgl_ol_textx').val("");
				$("#periode").val("");
			}
		);
		
		$('#tgl_ol_text_set').click(
			function(){					
				//alert("test");
				$('#tgl_ol_text').focus();
			}
		);

		$('#tgl_ol_text').blur(function(event){
			event.preventDefault();
			$(this).datepicker('hide');
		});
		
		$('#tgl_nilai_text').datepicker({
		  format: 'yyyy-mm-dd'
		}).on('changeDate', function(e){
			$(this).datepicker('hide');
		});
		
		$('#tgl_nilai_text_reset').click(
			function(){					
				$('#tgl_nilai_text').val("");
			}
		);
		
		$('#tgl_nilai_text_set').click(
			function(){					
				//alert("test");
				$('#tgl_nilai_text').focus();
			}
		);
		
		$('#tgl_nilai_text').blur(function(event){
			event.preventDefault();
			$(this).datepicker('hide');
		});
		
		$('#jam').focusin(function (event){
			event.preventDefault();
			if ($("#jam").val() == "" )
			{
				//var currentdate = new Date();
				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
				//$('#jam').val(currenttime);
			}
		});
		$('#durasi').focusin(function (event){
			event.preventDefault();
			if ($("#durasi").val() == "" )
			{
				//var currentdate = new Date();
				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
				//$('#jam').val(currenttime);
			}
		});

		$('#aht').focusin(function (event){
			event.preventDefault();
			if ($("#aht").val() == "" )
			{
				//var currentdate = new Date();
				//var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
				//$('#jam').val(currenttime);
			}
		});
		
		$('#cbo_jam').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam').val();
			var m = $('#cbo_menit').val();
			var s = $('#cbo_detik').val();						
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#jam").val(j);
		});
		
		$('#cbo_menit').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam').val();
			var m = $('#cbo_menit').val();
			var s = $('#cbo_detik').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#jam").val(j);
		});
		
		$('#cbo_detik').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam').val();
			var m = $('#cbo_menit').val();
			var s = $('#cbo_detik').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#jam").val(j);
		});


		$('#cbo_jam2').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam2').val();
			var m = $('#cbo_menit2').val();
			var s = $('#cbo_detik2').val();						
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi").val(j);
		});
		$('#cbo_menit2').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam2').val();			
			var m = $('#cbo_menit2').val();
			var s = $('#cbo_detik2').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi").val(j);
		});
		
		$('#cbo_detik2').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam2').val();
			var m = $('#cbo_menit2').val();
			var s = $('#cbo_detik2').val();
			var j = "00:"+m+":"+s;
			//alert(j);
			$("#durasi").val(j);
		});

		$('#cbo_jam3').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam3').val();
			var m = $('#cbo_menit3').val();
			var s = $('#cbo_detik3').val();						
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#aht").val(j);
		});
		$('#cbo_menit3').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam3').val();			
			var m = $('#cbo_menit3').val();
			var s = $('#cbo_detik3').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#aht").val(j);
		});
		
		$('#cbo_detik3').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam3').val();
			var m = $('#cbo_menit3').val();
			var s = $('#cbo_detik3').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#aht").val(j);
		});

		$('#cbo_jam4').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam4').val();
			var m = $('#cbo_menit4').val();
			var s = $('#cbo_detik4').val();						
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi_wording_value_added_aht").val(j);
		});
		$('#cbo_menit4').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam4').val();			
			var m = $('#cbo_menit4').val();
			var s = $('#cbo_detik4').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi_wording_value_added_aht").val(j);
		});
		
		$('#cbo_detik4').change(function (event){
			event.preventDefault();
			var h = $('#cbo_jam4').val();
			var m = $('#cbo_menit4').val();
			var s = $('#cbo_detik4').val();
			var j = h+":"+m+":"+s;
			//alert(j);
			$("#durasi_wording_value_added_aht").val(j);
		});
		
	

		$('#modal_close_gagal').click(function(event){
			event.preventDefault();
			$("#overlay").hide();
			$(".adv-table").show();
			$("#close_modal").trigger("click");		
		});
		
		$('#modal_close_berhasil').click(function(event){
			event.preventDefault();
			window.location = "form_insert_laporan_tabbing.php?wapo_key=n2CesKkdK7ErtKvD%252FUWnBUGtIGpQaFO5stOQyyjY4Is%253D";
		});
				

		$("#").click(function(event){ 
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

				if (err > 0)
				{
					var obj = arr.kata_err;
					var len = obj.length;
					kata_err = kata_err + "<strong> Mohon dicek data anda yang anda input yaitu : </strong> <br/> "
					for (var i = 0; i < len; i++) 
					{
						var r = obj[i];
						kata_err = kata_err + r + " <br/>";
					}
					$("#modal_close_gagal").show();
					$("#modal_close_berhasil").hide();
					$('#mulai1').trigger("click");
				}
				else
				{
					kata_err = arr.kata_err;
					$("#modal_close_gagal").hide();
					$("#modal_close_berhasil").show();
				}
				$("#div_kata_err").html(kata_err);	
			});					
			$("#link_simpan").trigger("click");
			
		});
		
		$('#reset').click(function(event){
			event.preventDefault();
			document.location.href = 'form_insert_laporan_tabbing.php';
		
		});
		
		$("#btn_tambah_reason_bersih").click(function(event){
			event.preventDefault();
			
			$("#nama_reason").val("");
			$("#btn_tambah_reason").trigger( "click" );
		});
		
		$("#").click(function(event){
			event.preventDefault();
			
			var nama_reason = $('#nama_reason').val();
			var url = "json_simpan_reason.php";
			var data = "nama_reason="+nama_reason;				
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 					
					// $("#rs_monitoring").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
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
						var html = "<option value='"+value+"'>"+name+"</option>";
						// $('#rs_monitoring').append(html);
					}
										
					if (err == "0")
					{
						// $("#btn_tambah_reason_close").trigger("click");
					}
					alert(kata_err);	
				}
	 
				// $("#rs_monitoring").trigger("chosen:updated");				
			});	
		});
		
	});	
	
	function bersihkan_inputan_agent()
	{
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
	
	function bersihkan_inputan_qco()
	{
		$('#qco').val("");
		$('#nama_qco').val("");	
		$('#jabatan_qc').val("");
		$('#area_qc').val("");	
	}
	
	function set_combo_jam()
	{
		$('#cbo_jam').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_menit').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_detik').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		
		var list_cbo_jam = "";
		var i = 0;
		for(i = 0;i <= 23; i++)
		{	
			if (i < 10)
			{
				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_jam = list_cbo_jam + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_jam").html(list_cbo_jam);
		$("#cbo_jam").trigger("chosen:updated");
		$("#cbo_jam").trigger("liszt:updated");
		
		var list_cbo_59 = "";
		var i = 0;
		for(i = 0;i <= 59; i++)
		{	
			if (i < 10)
			{
				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_59 = list_cbo_59 + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_menit").html(list_cbo_59);
		$("#cbo_detik").html(list_cbo_59);
		
		$("#cbo_menit").trigger("chosen:updated");
		$("#cbo_menit").trigger("liszt:updated");
		
		$("#cbo_detik").trigger("chosen:updated");
		$("#cbo_detik").trigger("liszt:updated");
	}

	function set_combo_durasi()
	{
		$('#cbo_jam2').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_menit2').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_detik2').chosen({allow_single_deselect:true, width:"25%", search_contains: true});

		var list_cbo_jam = "";
		var i = 0;
		for(i = 0;i <= 23; i++)
		{	
			if (i < 10)
			{
				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_jam = list_cbo_jam + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_jam2").html(list_cbo_jam);
		$("#cbo_jam2").trigger("chosen:updated");
		$("#cbo_jam2").trigger("liszt:updated");
		
		
		
		var list_cbo_59 = "";
		var i = 0;
		for(i = 0;i <= 59; i++)
		{	
			if (i < 10)
			{
				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_59 = list_cbo_59 + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_menit2").html(list_cbo_59);
		$("#cbo_detik2").html(list_cbo_59);
		
		$("#cbo_menit2").trigger("chosen:updated");
		$("#cbo_menit2").trigger("liszt:updated");
		
		$("#cbo_detik2").trigger("chosen:updated");
		$("#cbo_detik2").trigger("liszt:updated");
	}


	function set_combo_aht()
	{
		$('#cbo_jam3').chosen({allow_single_deselect:true, width:"25%", search_contains: true});	
		$('#cbo_menit3').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_detik3').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		

		var list_cbo_jam = "";
		var i = 0;
		for(i = 0;i <= 23; i++)
		{	
			if (i < 10)
			{
				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_jam = list_cbo_jam + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_jam3").html(list_cbo_jam);
		$("#cbo_jam3").trigger("chosen:updated");
		$("#cbo_jam3").trigger("liszt:updated");
		
		
		var list_cbo_59 = "";
		var i = 0;
		for(i = 0;i <= 59; i++)
		{	
			if (i < 10)
			{
				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_59 = list_cbo_59 + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_menit3").html(list_cbo_59);
		$("#cbo_detik3").html(list_cbo_59);
		
		$("#cbo_menit3").trigger("chosen:updated");
		$("#cbo_menit3").trigger("liszt:updated");
		
		$("#cbo_detik3").trigger("chosen:updated");
		$("#cbo_detik3").trigger("liszt:updated");
	}

	function set_combo_durasi_wording()
	{
		$('#cbo_jam4').chosen({allow_single_deselect:true, width:"25%", search_contains: true});	
		$('#cbo_menit4').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		$('#cbo_detik4').chosen({allow_single_deselect:true, width:"25%", search_contains: true});
		

		var list_cbo_jam = "";
		var i = 0;
		for(i = 0;i <= 23; i++)
		{	
			if (i < 10)
			{
				list_cbo_jam = list_cbo_jam + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_jam = list_cbo_jam + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_jam4").html(list_cbo_jam);
		$("#cbo_jam4").trigger("chosen:updated");
		$("#cbo_jam4").trigger("liszt:updated");
		
		
		var list_cbo_59 = "";
		var i = 0;
		for(i = 0;i <= 59; i++)
		{	
			if (i < 10)
			{
				list_cbo_59 = list_cbo_59 + "<option value='0" + i + "'>0" + i +"</value>";
			}
			else
			{
				list_cbo_59 = list_cbo_59 + "<option value='" + i +"'>" + i + "</value>";
			}
		}
		$("#cbo_menit4").html(list_cbo_59);
		$("#cbo_detik4").html(list_cbo_59);
		
		$("#cbo_menit4").trigger("chosen:updated");
		$("#cbo_menit4").trigger("liszt:updated");
		
		$("#cbo_detik4").trigger("chosen:updated");
		$("#cbo_detik4").trigger("liszt:updated");
	}
	
	$(function(){
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
	
    // $("#user_tl").change(function(){
		// 	event.preventDefault();
		// 	//alert(nilai);	
		// 	// $("#segment").val(nilai);
		// 	// $("#segment").trigger('chosen:updated');
			
		// 	baca_mlogin();
    // });

// function baca_mlogin()
// {
	
// 	var csdm=$('#csdm_co');

// 	//alert(csdm.val());
// 	//$('#user_tl').empty();

// 	//alert(userlevel.val());
	
// 	$('#userlevel').val("");
// 	$('#user_tl').val("");
// 	$('#user_spv').val("");
// 	$('#user_manager').val("");
// 	$('#los').val("");
// 	$('#tenur').val("");
// 	$('#gender').val("");
// 	$('#nama_ol').val("");
	
// 	if (csdm.val() != "")
// 	{			
// 		$.ajax({  
// 			 type: "GET",  
// 			 url: 'json_baca_mlogin.php',  
// 			 data: 'id='+csdm.val(),
// 			 dataType: "json",  
// 			 success: function(data){

// 				//alert(data);
// 				// if (data[0].user_tl == "")
// 				// { 	
// 				// 	alert("user_tl kosong");						
// 				// }
// 				// else{
// 				// 	alert("user tl ada");
// 				// } 
// 				userlevel.value = data[0].userlevel;
// 				user_tl.value = data[0].user_tl;
// 				user_spv.value = data[0].user_spv;
// 				user_manager.value = data[0].user_manager;
// 				los.value = data[0].los;
// 				tenur.value= data[0].tenur;
// 				gender.value= data[0].gender;
// 				nama_online.value= data[0].nama_online;				
// 				//$('#user_tl').append(data[0].user_tl);
				
// 			}

// 		});	
// 	}	
		
// }	
	
</script>
<script type="text/javascript" src="../assets/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script> 

<script type="text/javascript" src="../assets/bootstrap-datetimepicker/bootstrap-datetimepicker.pt-BR.js"></script>
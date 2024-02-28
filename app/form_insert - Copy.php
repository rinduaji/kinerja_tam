 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">


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
    if ($_SESSION['jabatan']=="Tabber Fbcc" || $_SESSION['jabatan']=="Duktek"): 
   ?>  
   <SCRIPT language=Javascript>
      function isNumberKey(evt)
      {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
      return true;
      }
     
      </SCRIPT> 
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
			<form id="form" name="demoform" method="post" action="form_insert.php">
<?php



if (isset($_POST['Save']) ){





// die();


if ($tgl_nilai_text=="")
	{	
	?>
	<script type="text/javascript">
    alert("Mohon periksa kembali! Data yg anda masukkan ada yg belum lengkap");
    //history.back();
	</script>
	<?php
	}
else
	{


 $nilai='-|'.$na11.'|-'.'|'.$na21.'|'.$na22.'|'.$na23.'|-'.'|'.$na31.'|'.$na32.'|-'.'|'.$na41.'|'.$na42.'|-'.'|'.$na51.'|-'.'|'.$na61.'|-'.'|'.$na71.'|'.$na72.'|'.$na73.'|';

		//$nilai=$value;
$item='1;-|1;1|2;-|2;1|2;2|2;3|3;-|3;1|3;2|4;-|4;1|4;2|5;-|5;1|6;-|6;1|7;-|7;1|7;2|7;3|';
//echo $nilai;
$nilaipl=$na11+$na21+$na22+$na23+$na31+$na32+$na41+$na42+$na51+$na61;
$nilaisl=$na71+$na72+$na73;

$qq=mysqli_query($conn, " select nama_tl FROM cc147_main_users WHERE username='$pilih_cbo'");
$qqq=mysqli_fetch_row($qq);
$qqqq=$qqq[0];

		$sql="INSERT INTO `app_kinerja_nilai` (`tanggal`,`user_id`,`nilai`,`item`,`tglrecord`,`recordid`,`ani`,`reason_monitoring`,`durasi`,`param_tapping_proses`,`param_tapping_sikap`,`ofi`,`lup`,`status`,`human`,`system_prosedur`,`tools`,`lup_qa`,`area`,`proses_layanan`,`sikap_layanan`,`periode`,`lup_tl_name`) 
		VALUES ('$tgl_nilai_text','$pilih_cbo','$nilai','$item','$tgl_ol_text','$record_id','$msisdn','$rs_monitoring','$jam','$param_tapping_proses','$param_tapping_sikap','$ofi','$lup','1','$human','$system_prosedur','$tools','$qco','$area_cbo','$nilaipl','$nilaisl','$periode','$qqqq')";
		//echo "$sql";
		//$query=mysqli_query($conn, $sql);
	 //Refresh by HTTP META

	if ($query=mysqli_query($conn, $sql)) {
    	mysqli_query($conn, $sql);

		 // echo("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-warning-sign'></span>  Data  Bisa masuk !!</div>");
    	echo("<div id='' class='alert alert-success alert-dismissible' role='success'><span class='glyphicon glyphicon-check'></span>  Data Sudah Disimpan Pada Database !!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    <span aria-hidden='true'>&times;</span>
		  </button></div>");
		$area_cbo="";
		$pilih_cbo="";

			} else {
	   
		 echo("<div id='' class='alert alert-danger alert-dismissible' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Data Tidak Bisa masuk Mohon periksa kembali !!! User telah di input 1 kali pada hari ini!!<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		    <span aria-hidden='true'>&times;</span>
		  </button></div>");
		//die();
		

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
						  	<span style="font-size: 6em;">Mohon ditunggu </span><br/>
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
																		<input type='text' class='form-control' name='layanan_cbo' id='layanan_cbo' value='Telkom FBCC' readonly >
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-lg-4 control-label"><strong>Area</strong></label>
																	<div class="col-lg-8">
																		

																		<select  class="chosen-select" id="area_cbo" name="area_cbo" class="form-control" onChange="">
								                                        <option value=" ">-- Pilih Area --</option>
								                                               <?php
								                                        $pkat = mysqli_query($conn, "SELECT kota FROM `app_kinerja_kota` ");
								                                     
								                                        while ($ckat = mysqli_fetch_row($pkat)) {
								                                        //  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
								                                        if ($area_cbo==$ckat[0]){$sel="selected";} else {$sel="";}
								                                        echo(" <option value=$ckat[0] $sel>$ckat[0]</option>");
								                                       
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
																		
																		<input type='text' class='form-control' name='segment_cbo' id='segment_cbo' value='Agent FBCC' readonly >
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
							                                        $pkatt = mysqli_query($conn, "SELECT b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Agent Fbcc' and b.user7='$area_cbo'");
							                                        $k=1;
							                                        while ($ckatt = mysqli_fetch_row($pkatt)) {
							                                        //  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
							                                        if ($pilih_cbo==$ckatt[0]){$sel="selected";} else {$sel="";}
							                                        echo(" <option value=$ckatt[0] $sel>$ckatt[0] -- $ckatt[1]</option>");
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
																<!--   <label for="ticket_id" class="col-lg-4 control-label"><strong>Reason Monitoring</strong></label>
																  <div class="col-lg-8">
																	  <select class="chosen-select" name="rs_monitoring" id="rs_monitoring">
																			<option value="">---Pilih Salah Satu---</option>
																			<option value="Tapping Reguler">Tapping Reguler</option>
																			

																	  </select>
																  </div> -->
																  
																  <label for="ticket_id" class="col-lg-4 control-label"><strong>Reason Monitoring</strong></label>
																	<div class="col-lg-8">
																		
																		<input type='text' class='form-control' name='rs_monitoring' id='rs_monitoring' value='Tapping Reguler' readonly >
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
																<input type="text" width="50px" class="form-control"  name="jabatan_qc" id="jabatan_qc" placeholder="" value="<?php echo $_SESSION["jabatan"]; ?>"" readonly="true" >	
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
																	<input type="text" width="50px" class="form-control"  name="csdm_co" id="csdm_co" placeholder="" readonly="true" >	
																</div>
															</div>

															<div class="form-group">
															
																<label for="ticket_id" class="col-lg-3 control-label"><strong>Nama Agent</strong></label>
																<div class="col-lg-9">
																<!--select class="chosen-select" name="nama" id="nama_co" tabindex="2">
																	<option value="">--Pilih nama agent --</option>
																	
																</select-->
																	<input type="text" width="50px" class="form-control"  name="nama" id="nama_co" placeholder="" readonly="true" >	
																</div>
															</div>
															
														
														  <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>Segment/Skill</strong></label>
															  <div class="col-lg-9">
																  <input type="text" width="50px" class="form-control"  name="segment" id="userlevel" placeholder="" value="" readonly>															
															  </div>
														  </div>
														  
														  <div class="form-group" style="display:none;">
															  <label class="col-lg-3 control-label"><strong>Layanan</strong></label>
															  <div class="col-lg-9">
																  <input type="text" width="50px" class="form-control"  name="layanan" id="layanan" placeholder="" value="" readonly>															
															  </div>
														  </div>
														  
														  <div class="form-group" >
															  <label class="col-lg-3 control-label"><strong>Area</strong></label>
															  <div class="col-lg-9">
																  <input type="text" width="50px" class="form-control"  name="ket" id="ket" placeholder="" value="" readonly>															
															  </div>
														  </div>

															 
															 
														  
														  <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>Jenis Kelamin</strong></label>
															  <div class="col-lg-9">
																  <input type="text" width="50px" class="form-control"  name="gender" id="gender" placeholder="" value="" readonly>															
															  </div>
														  </div>
														
														  <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>TL</strong></label>
															  <div class="col-lg-9">
																  <input type="text" width="50px" class="form-control"  name="tl" id="user_tl" value="" readonly>
																	
															  </div>
														  </div>

														  
														
														  <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>Typing Bulan InI</strong></label>
															  <div class="col-lg-9">
																  <input type="text" width="50px" class="form-control" id="los"  name="los" placeholder="" readonly>
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
															  <input type="text" width="50px" class="form-control"  name="msisdn" placeholder="62xxxxxxxxxxx" >
														  </div>
													  </div>
								                      
								                       <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Record ID</strong></label>
														  <div class="col-lg-9">
															  <input type="text" width="50px" class="form-control"  name="record_id" placeholder="" >
														  </div>
													  </div>
								                      
													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Tanggal Online</strong></label>
														  <div class="col-lg-9">
															  <div id="tgl_ol_text" class="input-group date form_datetime-adv">																
																<input type="text" width="50px" class="form-control"  name="tgl_ol_text" id="tgl_ol_textx" readonly="true" data-format="dd/MM/yyyy hh:mm:ss" placeholder="" >
																<span class="input-group-btn">
																	<button type="button" class="btn btn-danger" id="tgl_ol_text_reset"><i class="icon-remove"></i></button>
																	<button type="button" class="add-on btn btn-warning" id="tgl_ol_text_set"><i class="icon-calendar"></i></button>
																</span>														
															  </div>
														  </div>
													  </div>								                      

													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Durasi Jam</strong></label>
														  <div class="col-lg-9">
															  <span class="input-group-btn">
																	<select id="cbo_jam" name="cbo_jam">																		
																	</select> : 
																	<select id="cbo_menit" name="cbo_menit">																		
																	</select> :
																	<select id="cbo_detik" name="cbo_detik">																		
																	</select>
															  </span>
															  <input type="hidden" width="50px" class="form-control" id="jam"  name="jam" placeholder="" value="00:00:00">
															  
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
															  <input type="text" width="50px" class="form-control" id="periode"  name="periode" readonly >
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
									<h3><i>Parameter Penilaian</i></h3>									
								</div>
								<div class="panel-body">
									<p align="right">										
									</p>								
									
									<div class='col-xl-12'>
											
										<table border="0" width="95%"cellpadding="2" cellspacing="1" style="border-collapse: collapse" class="forumline">
										<?php
										$sqlpoin="select * from app_kinerja_poin where aktif ='1'order by poin asc
										";
										//echo $sqlpoin;
										$qpoin=mysqli_query($conn, $sqlpoin);
										$no=1;
										while ($rowpoin=mysqli_fetch_row($qpoin))
										{

										?>

										<tr>
										    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> <?php echo $rowpoin[1]; ?></b></font></td>
										  
										</tr>
										<?php
										$sqlkat="select * from app_kinerja_kategori where id_poin='$rowpoin[0]' and jabatan='Agent Fbcc' and status='1' order by id";
										//echo "$sqlkat<br>";
										$qkat=mysqli_query($conn,$sqlkat);
										while ($rowkat=mysqli_fetch_row($qkat))
										{



										?>
										<tr>
										    <td width="2%" align="left" bgcolor="#dde6ff"> <?php echo "$no."; ?></td>
										    <td width="80%" align="left" bgcolor="#dde6ff"> <?php echo "$rowkat[2] "; ?></td>
											<td width="10%" align="left" bgcolor="#dde6ff"><?php echo "$rowkat[3] ";?></td>
											<td bgcolor="#dde6ff">
											<?php 
											//$a=$_POST["n$rowkat[0]"];
											$b='';
											$id_all='';

											$b .='-|';
											//echo "$rowkat[3]";
											if (($rowkat[3])<>"") {	
											echo "<select name=\"n".$rowkat[0]."\">		
											<option value=\"1\" selected>1</option>
											<option value=\"0\" >0</option>
											</select>";			
											 }
											 //echo "$a";
											 
											 ?>
											 
											</td>
										</tr>
										<?php
											$sqlitem="select * from app_kinerja_item where id_kat='$rowkat[0]' and jabatan='Agent Fbcc' and status='1'";
											//echo "$sqlkat<br>";
											$qitem=mysqli_query($conn, $sqlitem);
											$abjad=array('A','B','C','D','E','F');
											$list=0;
											while ($rowitem=mysqli_fetch_row($qitem))
											{
											
												?>
													<tr>
														<td bgcolor="#dde6ff" align="left"></td>
														<td bgcolor="#dde6ff" align="left">
														<?php echo "$abjad[$list]."; ?> &nbsp;  
														<?php echo "$rowitem[2]"; ?>
															
														</td>
														<td bgcolor="#dde6ff" align="left"><?php echo "$rowitem[3]"?></td>
														<td bgcolor="#dde6ff">
														<?php 
														$c=$rowitem[0].$rowitem[1];
														$b .="na$c".'|';
														
														//$c="n".$rowitem[0].$rowitem[1];
														//echo $b;
														echo "<select name=\"na".$c."\">
														<option value=\"$rowitem[3]\" >1</option>
														<option value=\"0\" >0</option>
														</select>"; 				
														//echo "$b";				
														?>		
														</td>
													</tr>
												<?php	
											$list++;
											}


// 											//----hasil nilai------------	
											//$dd ="ss";
// 	$value .=$val_kat."|".$b;
// 	$b="";	
// //----hasil item -------------
 	$id_all.=$rowkat[0].";-|$id_kat";
// 	$id_kat="";

										$no++;
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
																  <textarea  name="param_tapping_proses"  class="form-control  t-text-area" rows="2" placeholder=""></textarea>
																	<p></p>
															  </div>
														  </div>
														  <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>Parameter Tapping Sikap layanan</strong></label>
															  <div class="col-lg-9">
																  <textarea  name="param_tapping_sikap"  class="form-control  t-text-area" rows="2" placeholder=""></textarea>
																	<p></p>
															  </div>
														  </div>

														  <div class="form-group">
															  <label for="ticket_id" class="col-lg-3 control-label"><strong>OFI (Opportunity to improve)</strong></label>
															  <div class="col-lg-9">
																  <textarea  name="ofi"  class="form-control  t-text-area" rows="2" placeholder=""></textarea>
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
															  <textarea  name="human"  class="form-control  t-text-area" rows="2" placeholder=""></textarea>
																<p></p>
														  </div>
													  </div>

													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Sistem/Prosedur</label>
														  <div class="col-lg-9">
															  <textarea  name="system_prosedur"  class="form-control  t-text-area" rows="2" placeholder=""></textarea>
																<p></p>
														  </div>
													  </div>

													  <div class="form-group">
														  <label for="ticket_id" class="col-lg-3 control-label"><strong>Tools</label>
														  <div class="col-lg-9">
															  <textarea  name="tools"  class="form-control  t-text-area" rows="2" placeholder=""></textarea>
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
</html>


<script type="text/javascript">

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
		
			
		
		
		


			$("#area_cbo").change(function(event){
			event.preventDefault();
			
			var area = $("#area_cbo").val();
			// var layanan = $("#layanan_cbo").val();
			// var segment = $("#segment_cbo").val();
			var url = "json_cari_user_cbo.php";
			var data = "area="+area;
			// bersihkan_inputan_agent();
			
			$.ajax({
				type: "POST",  
				url: url,
				data: data,				
				dataType: "json",
				beforeSend: function(){ 					
					$("#pilih_cbo").empty(); 
				}
			}).done(function( data ) {
				if (data != "")
				{
					var item = data;					
					var obj = item.rows;
					var len = obj.length;
					var html = "";
					//alert(area);
					for (var i = 0; i < len; i++) {
						var rows = obj[i];
						var value = rows.value;
						var name = rows.name;
						var html = "<option value='"+value+"'>"+value+" -- "+name+"</option>";
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

		



		$("#pilih_cbo").change(function(event){
			event.preventDefault();
			
			val = $("#pilih_cbo").val();
			
			bersihkan_inputan_agent();
			
			if (val !== "")
			{
				$.ajax({  
					type: "GET",  
					url: 'json_baca_mlogin.php',  
					data: 'id='+val,
					dataType: "json",  
					success: function(data){
						//alert(data);
						csdm_co.value = val;
						nama_co.value = data[0].username;
						userlevel.value = data[0].userlevel;
						layanan.value = data[0].layanan;
						ket.value = data[0].ket;
						user_tl.value = data[0].user_tl;
						
						los.value = data[0].los;
						
						gender.value= data[0].gender;
						
						
					}

				});
			}
		});	
		

		/*
		$('#jam').timepicker({
			autoclose: true,			
			minuteStep: 1,
			secondStep: 1,
			showSeconds: true,
			showMeridian: false
		})
		.on('show.timepicker', function(e) {
			//bla bla
		})
		.on('hide.timepicker', function(e) {
			//bla bla
		})
		.on('changeTime.timepicker', function(e) {
			//bla bla
		});
		
		$('#jam').focusin(function (event){
			event.preventDefault();
			//$('#jam').timepicker('showWidget');
			//$('#jam_div').focus();			
			$('#jam_set').click();
			//var time = $('#jam').timepicker('showWidget');
			//return time;
			//$(".bootstrap-timepicker dropdown-menu open").show();
			//$('.bootstrap-timepicker-widget.dropdown-menu').css("display", "inline-block");			
		});	
		
		$('#jam_set').click(function (event){
			event.preventDefault();
			if ($("#jam").val() == "" )
			{
				var currentdate = new Date();
				var currenttime = currentdate.getHours() + ":" + currentdate.getMinutes() + ":" + currentdate.getSeconds();
				$('#jam').val(currenttime);
			}
		});
		
		$('#jam_reset').click(function (event){
			event.preventDefault();
			$('#jam').val("");
		});
		*/
		
		/*
		$("#tanggal3").blur(function(event){
			event.preventDefault();
			$("#periode").val("");
			if ($("#tanggal3").val() != "")
			{
				$.ajax({  
					type: "POST",  
					url: 'json_baca_periode.php',  
					data: 'tanggal='+$("#tanggal3").val(),
					dataType: "json",  
					success: function(data){
						//alert(data);
						if (data[0].status == '1')
						{
							$("#periode").val(data[0].periode);
						}
					}
				});
			}
		});
		*/
		// $('#qco_cbo').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		// $('#segment_cbo').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// // $('#pilih_cbo').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		// $('#jenis1').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// $('#case1').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// $('#detail1').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		// $('#jenis2').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// $('#case2').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// $('#detail2').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		// $('#jenis3').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// $('#case3').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// $('#detail3').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		
		// $('#jenis4').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// $('#case4').chosen({allow_single_deselect:true, width:"100%", search_contains: true});
		// $('#detail4').chosen({allow_single_deselect:true, width:"100%", search_contains: true});			
		
		// $("#layanan_cbo").change(function(event){
		// 	event.preventDefault();
			
		// 	var layanan = $("#layanan_cbo").val();			
			
		// 	$("#area_cbo").val(""); 
		// 	$("#area_cbo").trigger("chosen:updated");
		// 	$("#area_cbo").change();
		// 	//bersihkan_inputan_agent();
		// });
		
		// $("#area_cbo").change(function(event){
		// 	event.preventDefault();
			
		// 	var area = $("#area_cbo").val();
		// 	var layanan = $("#layanan_cbo").val();
		// 	var url = "json_cari_segment_cbo.php";
		// 	var data = "area="+area+"&layanan="+layanan;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 
		// 			$("#segment_cbo").empty(); 
		// 			$("#pilih_cbo").empty(); 
		// 			bersihkan_inputan_agent();
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#segment_cbo').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#segment_cbo").trigger("chosen:updated");
		// 		$("#segment_cbo").trigger("liszt:updated");
				
		// 		var html = "<option value=''>-- CSDM / Nama Agent --</option>";
		// 		$('#pilih_cbo').append(html);
				
		// 		$("#pilih_cbo").trigger("chosen:updated");
		// 		$("#pilih_cbo").trigger("liszt:updated");
	 
	 
		// 	});	
			
		// 	var url = "json_cari_qco.php";
		// 	var data = "area="+area+"&layanan="+layanan;

		// 	$.ajax({  
		// 		type: "POST",  
		// 		url: url,  
		// 		data: data,
		// 		dataType: "json",
		// 		beforeSend: function(){ 
		// 			$("#qco_cbo").empty(); 
		// 			//bersihkan_inputan_qco();
		// 		}

		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#qco_cbo').append(html);
		// 			}										
		// 		}
				
		// 		$("#qco_cbo").trigger("chosen:updated");
		// 		$("#qco_cbo").trigger("liszt:updated");
	 
	 
		// 	});
		// });

		
		// $("#segment_cbo").change(function(event){
		// 	event.preventDefault();
			
		// 	var area = $("#area_cbo").val();
		// 	var layanan = $("#layanan_cbo").val();
		// 	var segment = $("#segment_cbo").val();
		// 	var url = "json_cari_user_cbo.php";
		// 	var data = "area="+area+"&segment="+segment+"&layanan="+layanan;
		// 	bersihkan_inputan_agent();
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 					
		// 			$("#pilih_cbo").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#pilih_cbo').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#pilih_cbo").trigger("chosen:updated");
		// 		$("#pilih_cbo").trigger("liszt:updated");
	 
		// 	});			
		// });
		
		// $("#pilih_cbo").change(function(event){
		// 	event.preventDefault();
			
		// 	val = $("#pilih_cbo").val();
			
		// 	bersihkan_inputan_agent();
			
		// 	if (val !== "")
		// 	{
		// 		$.ajax({  
		// 			type: "GET",  
		// 			url: 'json_baca_mlogin.php',  
		// 			data: 'id='+val,
		// 			dataType: "json",  
		// 			success: function(data){
						
		// 				csdm_co.value = val;
		// 				nama_co.value = data[0].username;
		// 				userlevel.value = data[0].userlevel;
		// 				layanan.value = data[0].layanan;
		// 				ket.value = data[0].ket;
		// 				user_tl.value = data[0].user_tl;
		// 				user_spv.value = data[0].user_spv;
		// 				user_manager.value = data[0].user_manager;
		// 				los.value = data[0].los;
		// 				tenur.value= data[0].tenur;
		// 				gender.value= data[0].gender;
		// 				nama_ol.value= data[0].nama_online;	
						
		// 			}

		// 		});
		// 	}
		// });	
		
		// $("#qco_cbo").change(function(event){
		// 	event.preventDefault();
			
		// 	val = $("#qco_cbo").val();
			
		// 	bersihkan_inputan_qco();
			
		// 	if (val !== "")
		// 	{
		// 		$.ajax({  
		// 			type: "GET",  
		// 			url: 'json_baca_mlogin.php',  
		// 			data: 'id='+val,
		// 			dataType: "json",  
		// 			success: function(data){
						
		// 				qco.value = data[0].userid;
		// 				nama_qco.value = data[0].username;
		// 				jabatan_qc.value=data[0].userlevel;
		// 				area_qc.value=data[0].ket;
		// 			}
		// 		});
		// 	}
		// });

		// $("#jenis1").change(function(event){
		// 	event.preventDefault();
			
		// 	var val = $("#jenis1").val();
		// 	var url = "json_cari_case.php";
		// 	var data = "jenis_masalah="+val;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 
		// 			$("#case1").empty(); 
		// 			$("#detail1").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#case1').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#case1").trigger("chosen:updated");
		// 		$("#case1").trigger("liszt:updated");
				
		// 		var html = "<option value=''>-- Pilih Salah Satu --</option>";
		// 		$('#detail1').append(html);
				
		// 		$("#detail1").trigger("chosen:updated");
		// 		$("#detail1").trigger("liszt:updated");
	 
	 
		// 	});			
		// });
		
		// $("#case1").change(function(event){
		// 	event.preventDefault();
			
		// 	var jenis = $("#jenis1").val();
		// 	var casee = $("#case1").val();
		// 	var url = "json_cari_detail.php";
		// 	var data = "jenis_masalah="+jenis+"&case_masalah="+casee;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 					
		// 			$("#detail1").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#detail1').append(html);
		// 			}					
					
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
					
		// 		}
	 
		// 		$("#detail1").trigger("chosen:updated");
		// 		$("#detail1").trigger("liszt:updated");	
		// 	});			
		// });
		
		// $("#jenis2").change(function(event){
		// 	event.preventDefault();
			
		// 	var val = $("#jenis2").val();
		// 	var url = "json_cari_case.php";
		// 	var data = "jenis_masalah="+val;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 
		// 			$("#case2").empty(); 
		// 			$("#detail2").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#case2').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#case2").trigger("chosen:updated");
		// 		$("#case2").trigger("liszt:updated");
				
		// 		var html = "<option value=''>-- Pilih Salah Satu --</option>";
		// 		$('#detail2').append(html);
				
		// 		$("#detail2").trigger("chosen:updated");
		// 		$("#detail2").trigger("liszt:updated");
	 
	 
		// 	});			
		// });
		
		// $("#case2").change(function(event){
		// 	event.preventDefault();
			
		// 	var jenis = $("#jenis2").val();
		// 	var casee = $("#case2").val();
		// 	var url = "json_cari_detail.php";
		// 	var data = "jenis_masalah="+jenis+"&case_masalah="+casee;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 					
		// 			$("#detail2").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#detail2').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#detail2").trigger("chosen:updated");
		// 		$("#detail2").trigger("liszt:updated");	
		// 	});			
		// });
		
		// $("#jenis3").change(function(event){
		// 	event.preventDefault();
			
		// 	var val = $("#jenis3").val();
		// 	var url = "json_cari_case.php";
		// 	var data = "jenis_masalah="+val;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 
		// 			$("#case3").empty(); 
		// 			$("#detail3").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#case3').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#case3").trigger("chosen:updated");
		// 		$("#case3").trigger("liszt:updated");
				
		// 		var html = "<option value=''>-- Pilih Salah Satu --</option>";
		// 		$('#detail3').append(html);
				
		// 		$("#detail3").trigger("chosen:updated");
		// 		$("#detail3").trigger("liszt:updated");
	 
	 
		// 	});			
		// });
		
		// $("#case3").change(function(event){
		// 	event.preventDefault();
			
		// 	var jenis = $("#jenis3").val();
		// 	var casee = $("#case3").val();
		// 	var url = "json_cari_detail.php";
		// 	var data = "jenis_masalah="+jenis+"&case_masalah="+casee;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 					
		// 			$("#detail3").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#detail3').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#detail3").trigger("chosen:updated");
		// 		$("#detail3").trigger("liszt:updated");	
		// 	});			
		// });
		
		// $("#jenis4").change(function(event){
		// 	event.preventDefault();
			
		// 	var val = $("#jenis4").val();
		// 	var url = "json_cari_case.php";
		// 	var data = "jenis_masalah="+val;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 
		// 			$("#case4").empty(); 
		// 			$("#detail4").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#case4').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#case4").trigger("chosen:updated");
		// 		$("#case4").trigger("liszt:updated");
				
		// 		var html = "<option value=''>-- Pilih Salah Satu --</option>";
		// 		$('#detail4').append(html);
				
		// 		$("#detail4").trigger("chosen:updated");
		// 		$("#detail4").trigger("liszt:updated");
	 
	 
		// 	});			
		// });
		
		// $("#case4").change(function(event){
		// 	event.preventDefault();
			
		// 	var jenis = $("#jenis4").val();
		// 	var casee = $("#case4").val();
		// 	var url = "json_cari_detail.php";
		// 	var data = "jenis_masalah="+jenis+"&case_masalah="+casee;
			
		// 	$.ajax({
		// 		type: "POST",  
		// 		url: url,
		// 		data: data,				
		// 		dataType: "json",
		// 		beforeSend: function(){ 					
		// 			$("#detail4").empty(); 
		// 		}
		// 	}).done(function( data ) {
		// 		if (data != "")
		// 		{
		// 			var item = data;					
		// 			var obj = item.rows;
		// 			var len = obj.length;
		// 			var html = "";
		// 			//alert(len);
		// 			for (var i = 0; i < len; i++) {
		// 				var rows = obj[i];
		// 				var value = rows.value;
		// 				var name = rows.name;
		// 				var html = "<option value='"+value+"'>"+name+"</option>";
		// 				$('#detail4').append(html);
		// 			}					
		// 			/*
		// 			response( $.map( data, function( item ) {
		// 				//$('#segment_cbo').append('<option value="'+item.id+'">' + item.name + '</option>');
		// 			}));
		// 			*/
		// 		}
	 
		// 		$("#detail4").trigger("chosen:updated");
		// 		$("#detail4").trigger("liszt:updated");	
		// 	});			
		// });

		// $("#lc_cust").change(function(event){
		// 	var isi = $("#lc_cust").val();
			

		// 	if (isi != "") {
		// 		$("#div_lc_agnt").hide();
		// 		$("#div_lc_syst").hide();
		// 	}
		// 	else{
		// 		$("#div_lc_agnt").show();
		// 		$("#div_lc_syst").show();
		// 	}

		// });

		// $("#lc_agnt").change(function(event){
		// 	var isi = $("#lc_agnt").val();
			

		// 	if (isi != "") {
		// 		$("#div_lc_cust").hide();
		// 		$("#div_lc_syst").hide();
		// 	}
		// 	else{
		// 		$("#div_lc_cust").show();
		// 		$("#div_lc_syst").show();
		// 	}

		// });

		// $("#lc_syst").change(function(event){
		// 	var isi = $("#lc_syst").val();
			

		// 	if (isi != "") {
		// 		$("#div_lc_agnt").hide();
		// 		$("#div_lc_cust").hide();
		// 	}
		// 	else{
		// 		$("#div_lc_agnt").show();
		// 		$("#div_lc_cust").show();
		// 	}

		// });

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
 <?php endif ?> 
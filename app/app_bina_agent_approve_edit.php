
 <!DOCTYPE html>
<html lang="en">
	<?php 

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
include("koneksi.php"); 
//require_once('koneksi.php');
     //session_start();

   require_once('sidebar.php'); 
		 //require_once('koneksi.php');
		 date_default_timezone_set('Asia/Jakarta');
		 $tgl=date('Y-m-d');
		 $lup=date('Y-m-d h:i:s');
		 $id=$_GET['id'];
		 $ani=$_GET['ani'];
		 $nd1=$_GET['nd'];
		
 						$ids=$id;
			var_dump($nd1);

   ?> 
		
		<!--main content start-->
		<section id="main-content" >
			<section class="wrapper" id="section_utama" >
				
				<!--form name="form1" method="post" action="bina_tl_approve_edit.php" -->
				<form id="form" name="demoform" method="post" action="app_bina_agent_approve_edit.php">
					
					
					<!--input type="hidden" id="sub_menu" name="sub_menu" size="20" value="active_63"-->
					<input type="hidden" name="id_bina" id="id_bina" value="<?php echo $id ?>">
					<input type="hidden" name="tanggal" id="tanggal" value="<?php echo $tanggal ?>">
					<input type="hidden" name="ani" id="ani" value="<?php echo $ani ?>">
					<input type="hidden" name="area" id="area" value="Malang">
					<input type="hidden" name="jabatan" id="jabatan" value="Team Leader">
					<input type="hidden" name="Search" id="Search" value="1">
					<input type="hidden" name="jenis_simpan" id="jenis_simpan1" value="edit">
				
					<div class="row">
					
						<div class="col-lg-12" >
							<section class="panel">
								<div class="revenue-head ">
									<span>
										<i class="icon-ticket"></i>
									</span>
									<h3>Approve data dari Tabber (Team Leader)</h3>									
								</div>
							</section>							
						</div>															
						
						<div class="col-lg-12">							
							<section class="panel">
								<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">		
								<?php		
															$qsk=mysqli_query($conn, "SELECT a.reason_monitoring,a.tanggal,a.tglrecord,a.user_id,b.name,b.nama_tl,a.lup_qa,a.status,a.ani,a.param_tapping_proses,a.param_tapping_sikap,a.param_tapping_solusi,a.rekomendasi_tl,a.komitmen_agent FROM app_kinerja_nilai AS a INNER JOIN cc147_main_users AS b ON a.user_id = b.username WHERE a.user_id = '$ids' AND a.ani = '$ani'");
															//echo "$qsk";
															$k=1;
															$rsk=mysqli_fetch_row($qsk);
															//echo $rsk[0];
															
												?>

									<h3>Login Agent : <?php echo $ids;?> -- <?php echo $rsk[4];?></h3>									
									<span style="float: right;display: inline; padding: 0 10px; font-size: 16px;background: #695a70;">
										<a href="app_bina_agent_approve.php" class="btn btn-warning">Kembali List Approval </a> 
									</span>
								</div>
								<div class="panel-body">									
									<div class='col-md-4'>
										<div role="form">											
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;color:red'>
												<strong>Layanan :</strong> Telkom TAM
											</p>
											<label class="control-label col-md-12" style="color:blue;"><strong>DETAIL APROVAL AGENT :</strong></label>
											<p style="border-bottom: 1px solid transparent; border-color : #eff2f7"></p>
											<div class="col-md-12">
												<div class="form-group">
													<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														<strong>Tanggal Typing dan Kejadian </strong> : 
													</p>
													<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														>>  <span style="color:green">Tanggal Typing</span> : <span style="color:red"><?php echo $rsk[1];?></span> <br/> 
														>>  <span name="tgl_k" style="color:green">Tanggal Kejadian</span>  : <span style="color:red"><?php echo $rsk[2];?></span> <br/> 
													</p>
													<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														<strong>Data Agent </strong> : 
													</p>
													<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														>>  <span style="color:green">User Agent</span> : <span style="color:red"><?php echo $rsk[3];?></span> <br/> 
														>>  <span style="color:green">Nama Agent</span> : <span style="color:red"><?php echo $rsk[4];?></span> <br/> 
														
													</p>
													<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														<strong>Data Team Leader</strong> : 
													</p>
													<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														  
														 >> <span style="color:green">Nama TL</span> : <span style="color:red"><?php echo $rsk[5];?></span> <br/> 
														  
													</p>
													<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														<strong>Data Penilai</strong> : 
													</p>
													<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														>>  <span style="color:green">Nama Penilai</span> : <span style="color:red"><?php echo $rsk[6];?></span> <br/> 
														>>  <span style="color:green">Jabatan Penilai</span>   : Tabber TAM<span style="color:red"></span>
													</p>													
													<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														<strong>Detail Summary NC & Rekomendasi </strong> :
													</p>
													<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														>>  <span style="color:green">Parameter Tapping Proses layanan</span> : <span style="color:red"><?php echo $rsk[9];?></span> <br/> 
														>>  <span style="color:green">Parameter Tapping Sikap layanan</span>   : <span style="color:red"><?php echo $rsk[10];?></span><br/>
														>>  <span style="color:green">Parameter Tapping Solusi layanan</span>   : <span style="color:red"><?php echo $rsk[11];?></span><br/>
													</p>
													
													
													<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														<strong>Status Aproval</strong> :
													</p>
													<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;'>
														>>  <span style="color:red">Need approve TL</span>
													</p>													
												</div>
											</div>
										</div>										
									</div>									
									
									<div class='col-md-4'>
										<div role="form">
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;color:red'>
												<strong>Area :</strong> <?php echo $_SESSION["area"]; ?>
											</p>
											<p>-</p>
											<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												<strong>Kategori Sanksi</strong> :
											</p>
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												>>  <span style="color:red">-</span>
											</p>
											<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												<strong>Status Aproval</strong> :
											</p>
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												>>  <span style="color:red">Data dari QC yang belum diapprove TL</span>
											</p>
											<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												<strong>Rootcause</strong> :
											</p>
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												>>  <span style="color:red"></span>
											</p>
											<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												<strong>Rekomendasi TL</strong> :
											</p>
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												>>  <span style="color:red"></span>
											</p>
											<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												<strong>Komitmen Agent</strong> : 
											</p>
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												>> <span style="color:red"></span>
											</p>
											<p class="alert alert-warning fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												<strong>Lainnya </strong> : 
											</p>
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;display:none;'>
												>> <span style="color:green">Tanggal Isi Komitment</span> : <span style="color:red">2018-11-06 15:56:06</span> <br/>
												>> <span style="color:green">Tanggal Approve TL</span> : <span style="color:red"></span> <br/>
												>> <span style="color:green">Tanggal Approve Tabber</span> : <span style="color:red"></span> <br/>
												>> <span style="color:green">Tanggal Reject TL</span> : <span style="color:red"></span> <br/>
												>> <span style="color:green">Tanggal Reject Tabber</span> : <span style="color:red"></span>
											</p>
										</div>
									</div>
								<div class="col-md-4">
										<div role="form">
											<p class="alert alert-info fade in" style='margin-bottom:15px;position: relative;min-height: 1px;padding-right: 15px;padding-left: 15px;color:purple;color:red'>
												<strong>Segment :</strong> <?php echo $_SESSION["jabatan"]; ?>
											</p>
											<label class="control-label col-md-12" style="color:blue"><strong>FORM APROVAL :</strong></label>
											<p style="border-bottom: 1px solid transparent; border-color : #eff2f7"></p>
											<div class="col-md-12">												
												
												
											<div class="form-group">													
													
												<div class="col-md-12">														
													<div class="alert alert-danger fade in" style="margin-top:10px;">
														<strong>Catatan : </strong> <br/>
														>> Pastikan Pengisian Komitmen Anda sudah benar <br/>
														>> (data yang terisi tidak bisa diedit!)					
													</div>
												</div>
				  
											</div>	
												
										
											<div class="form-group">
												<label class="control-label col-md-12"><strong>Komitmen TL</strong></label>
												<div class="col-md-12">
													<textarea class="form-control" name="x_rek_tl" style="resize:none;height:70px;" required></textarea>
												</div>
											</div>
					
		
												
												<div class="form-group">												
													<div class="col-md-12">														
														<span style="float: right;display: inline; padding: 0 10px; font-size: 16px;">															
															<button type="submit" id="Save" name="Save" class="btn btn-success">Approve Data</button>
														</span>
													</div>
												</div>
											</div>		
										</div>
									</div>
								 
								</div>																
							</section>
						</div>
						
					</div>										
				
				</form>
<?php



if (isset($_POST['Save']) ){


//echo $nilai;
	
		$x_rek_tl = $_POST['x_rek_tl'];
		$ani = $_POST['ani'];
		$nd1 = $_POST['nd1'];
		$sql="UPDATE `app_kinerja_nilai` SET `komitmen_agent`='$x_rek_tl',`status`=3,`lup_agent`='$lup' WHERE (`tanggal`='$tanggal') AND (`user_id`='$id_bina') AND (`ani` = '$ani')";
		echo "$sql";
	
	   	mysqli_query($conn, $sql);
	   	$sql1="UPDATE `app_kinerja_nilai_reject` SET `komitmen_agent`='$x_rek_tl',`status`=3,`lup_agent`='$lup' WHERE (`tanggal`='$tanggal') AND (`user_id`='$id_bina') AND (`ani` = '$ani')";
		echo "$sql1";
	
	   	mysqli_query($conn, $sql1);
    	header("Location:app_bina_tl_approve.php");
    	echo "<script type='text/javascript'>window.top.location='app_bina_agent_approve.php';</script>"; exit;
	
	
}
?>
			
			</section>
			<section class="wrapper" id="section_simpan" style='display:none;' >								  									
									 
				<div class="row">
					
					<div class="col-lg-12" >
						<section class="panel">
							<div class="revenue-head ">
								<span>
									<i class="icon-ticket"></i>
								</span>
								<h3>Approve data dari Tabber (Team Leader)</h3>									
							</div>
						</section>							
					</div>
					
					<div class="col-lg-12">							
						<section class="panel">
							<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">	
								<h3> </h3>									
								<span style="float: right;display: inline; padding: 0 10px; font-size: 16px;background: #695a70;">
									
								</span>
							</div>
							
							<div class="panel-body">
								<div class='col-md-12'>
									<div role="form">
										
										<div class="form-group">											
											<div class="col-lg-12">											
												
											</div>
										</div>
										
									</div>
								</div>
							</div>
							
						</section>
					</div>
					
				</div>
					
			</section>
		</section>
		<!--main content end-->
		
		<!--footer start-->
		<footer class="site-footer">
			<div class="text-center">
				2018 &copy; Infomedia Nusantara - Contact Center Telkomsel.
				<a href="#" class="go-top">
				<i class="icon-angle-up"></i>
				</a>
			</div>
		</footer>
		<!--footer end-->
		
	</section>
	<!--container end-->
	
	<!-- js placed at the end of the document so the pages load faster -->
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
	
	<script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript" src="../assets/bootstrap-autocomplete/chosen.jquery.js"></script>

    <!--common script for all pages-->
    <script src="../js/common-scripts.js"></script>	<script type="text/javascript">

		$(function(){			
			
			$('#x_tgl_bina').datepicker({
			  format: 'yyyy-mm-dd'
			});
			
			$('#tgl_bina_reset').click(
				function(){					
					$('#x_tgl_bina').val("");
				}
			);
			
			$('#tgl_bina_set').click(
				function(){					
					//alert("test");
					$('#x_tgl_bina').focus();
				}
			);						
			
			$('#x_tgl_jadi').datepicker({
			  format: 'yyyy-mm-dd'
			});
			
			$('#tgl_jadi_reset').click(
				function(){					
					$('#x_tgl_jadi').val("");
				}
			);
			
			$('#tgl_jadi_set').click(
				function(){					
					//alert("test");
					$('#x_tgl_jadi').focus();
				}
			);						

			$("#x_user_agent").change(function(){
				var nilai = this.value;
				//alert(nilai);		
				$("#x_nama_agent").val(null);  
				$("#x_nama_agent").val(nilai);
				$("#x_nama_agent").trigger('chosen:updated');
				
			});
			
			$("#x_nama_agent").change(function(){
				var nilai = this.value;
				//alert(nilai);		
				$("#x_user_agent").val(null);  
				$("#x_user_agent").val(nilai);
				$("#x_user_agent").trigger('chosen:updated');
			});
			
			$("#x_reason_hapus").change(function(){
				var nilai = this.value;
				if (nilai == "Karena Request By By SPV")
				{
					$("#div_modal_spv").show();
				}
				else
				{
					$("#div_modal_spv").hide();
				}
				
			});
			
			$("#cmd_batal").click(function(event){
				event.preventDefault();
				window.location = "bina_tl_approve_edit.php?wapo_key=tX%252FZ1zQiNVQat38WhPt0z4rmL3sPhgMw5gw2DbUGr9noFt4in5jZHhAv7N%252FapZTHDp%252BqJ3Elz7tmJ41MsSn5cz0NqkZZryU%252BVnZ%252BXp0xVntrlgP5EAGpXbe3CKH97cvdgJKXsAPaPQPZUkqSjPBvigf2xULI6T4aTVgLZmt%252FIFg%253D";
			});
			
			$("#cmd_batal1").click(function(event){
				event.preventDefault();
				window.location = "bina_tl_approve_edit.php?wapo_key=tX%252FZ1zQiNVQat38WhPt0z4rmL3sPhgMw5gw2DbUGr9noFt4in5jZHhAv7N%252FapZTHDp%252BqJ3Elz7tmJ41MsSn5cz0NqkZZryU%252BVnZ%252BXp0xVntrlgP5EAGpXbe3CKH97cvdgJKXsAPaPQPZUkqSjPBvigf2xULI6T4aTVgLZmt%252FIFg%253D";
			});
			
			// $("#cmd_update1").click(function(event){
			// 	event.preventDefault();
			// 	$("#cmd_update").click();
			// });
			
			$("#cmd_hapus").click(function(event){
				event.preventDefault();
				$("#x_reason_hapus").val("Karena inisiatif oleh Admin sendiri");
				$("#div_modal_spv").hide();
				$("#x_request_spv").val("");
				$("#x_note_hapus").val("")
				$( "#link_hapus" ).trigger( "click" );
			});
			
			$("#cmd_hapus1").click(function(event){
				event.preventDefault();
				$("#cmd_hapus").click();
			});
			
			$("#modal_batal").click(function(event){
				event.preventDefault();
				$( "#close_modal" ).trigger( "click" );
			});
			
			$("#modal_hapus").click(function(event){
				event.preventDefault();
				$("#z_reason_hapus").val($("#x_reason_hapus").val());
				$("#z_request_spv").val($("#x_request_spv").val());
				$("#z_note_hapus").val($("#x_note_hapus").val());
				$("#btn_hapus").click();
			});
			
			$('.chosen-select').chosen();
			//$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
		});		
	</script>
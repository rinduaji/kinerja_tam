
<!DOCTYPE html>
<html lang="en">
<?php 

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
include("koneksi.php"); 
//require_once('koneksi.php');
     //session_start();

require_once('sidebar.php'); 
require_once('koneksi.php');
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
$login = $_SESSION['username'];
$lup=date('Y-m-d h:i:s');

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
<!--sidebar end-->	

<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<!--form name="form1" method="post" action="bina_tl_approve.php" -->
		<form name="form1" method="post" action="export_csv.php">
			<!--input type="hidden" id="sub_menu" name="sub_menu" size="20" value="active_63"-->

			<div class="row">

				<div class="col-lg-12" >
					<section class="panel">
						<div class="revenue-head ">
							<span>
								<i class="icon-ticket"></i>
							</span>
							<h3>Data - Report Bulanan </h3>									
						</div>
					</section>							
				</div>

						<!--div class="col-lg-3">							
							<section class="panel">
								<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">									
									<h3>Menu</h3>									
								</div>
								<div class="panel-body">
								
									<ul class="nav prod-cat">
										<li><a href="#"><i class=" icon-angle-right"></i> Export Excel</a></li>
										<li><a href="#"><i class=" icon-angle-right"></i> Pencarian Canggih</a></li>
										<li><a href="#"><i class=" icon-angle-right"></i> Kembali ke Pilih Jabatan</a></li>
										<li><a href="#"><i class=" icon-angle-right"></i> Ketidaksesuaian CHO - (Malang)</a></li>
									</ul>
								 
								</div>
							</section>
						</div-->						
						
						<div class="col-lg-12">							
							<section class="panel">
								<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">									
									<h3>Filter Pencarian</h3>
									<!-- <span style="float: right;display: inline; padding: 0 10px; font-size: 16px;background: #695a70;">
										<a href="index.php?wapo_key=y9Wd2DQefemDd2yC%252FidJkkbo8HwQRbnrSK9lnhrPY4k%253D'" class="btn btn-xs btn-danger">Kembali Dashboard</a>
									</span>	-->								
								</div>
								<div class="panel-body">												
									
									<div class='col-md-12'>
										<div class="form-horizontal tasi-form">
											<div class="form-group">
												<label class="control-label col-md-12"><strong>Masukkan Tanggal Awal Pencarian</strong></label>
												<div class="col-md-4">
													
													<div class="input-group date form_datetime-adv">
														
														<input class="form-control" size="16" type="date" name="tgl_awal" id="tgl_awal"/>
														
													</div>
												</div>																								
											</div>																																									
										</div>
									</div>
									<br>																		
									<div class='col-md-12'>
										<div class="form-horizontal tasi-form">
											<div class="form-group">
												<label class="control-label col-md-12"><strong>Masukkan Tanggal Akhir Pencarian</strong></label>
												<div class="col-md-4">
													
													<div class="input-group date form_datetime-adv">
														
														<input class="form-control" size="16" type="date" name="tgl_akhir" id="tgl_akhir"/>
														
													</div>
												</div>																								
											</div>																																									
										</div>
									</div>
                                    <br>
									

									
									
									<div class='col-md-4'>
										<div role="form">	

											<!--div class="form-group">
												<br/>
											</div-->
											<div class="form-group">
												<input type="text" class="form-control" name="u_segment" value="Segment : <?php echo $_SESSION["jabatan"];?> " readonly="true">
											</div>
											
											<!-- <div class="form-group">
												<select  class="chosen-select" name="area_cbo" class="form-control">
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
											</div> -->
											<div class="form-group">
												<select class="chosen-select" name="pilih_cbo" class="form-control" onChange="">
													<option value=" ">-- Pilih QCO --</option>
													<?php
													$pkatt = mysqli_query($conn, "SELECT b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Tabber TAM' order by b.user7, b.user2");
													$k=1;
													while ($ckatt = mysqli_fetch_row($pkatt)) {
							                                        //  if(($kategori=="") && ($k==1)){$kategori=$ckat[0];}
														if ($pilih_cbo==$ckatt[0]){$sel="selected";} else {$sel="";}
														echo(" <option value=$ckatt[0] $sel>$ckatt[0] -- $ckatt[1] -- $ckatt[3]</option>");
														$k++;
													}
													?>
												</select>
											</div>
											<div class="form-group">
													<select  class="chosen-select" name="kategori_call" class="form-control" onChange="">
														<option value="">-- Pilih Kategori Call --</option>
														<option value="">ALL</option>
														<option value="AGREE">AGREE</option>
														<option value="DECLINE">DECLINE</option>
														<option value="FU">FU</option>
													</select>
											</div>
											<div class="form-group">
												<p align="right">
													<button type="submit" id="submit_cari" name="submit_cari" class="btn btn-success">Cari</button>
													<a href="form_export_qa.php" class="btn btn-primary">Reset Cari</a>
													<!--button type="reset" id="reset_cari" class="btn btn-success">Reset Cari</button-->
													<!---->
													<!--a href="bina_admin.php?wapo_key=y9Wd2DQefemDd2yC%2FidJkkbo8HwQRbnrSK9lnhrPY4k%3D" class="btn btn-success">Reset Cari</a-->
													<!--button type="submit" id="reset_cari" class="btn btn-success">Reset Cari</button-->
												</p>
											</div>
										</div>
									</div>
									
								</div>
							</section>
						</div>												
						

						
</div>




</div>


<!--main content end-->

<!--footer start-->

<!--footer end-->

</section>
<!--container end-->

<!-- js placed at the end of the document so the pages load faster -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- <script src="../js/jquery.dcjqaccordion.2.7.js" class="include" type="text/javascript"></script> -->
<!--     <script src="../js/jquery.scrollTo.min.js"></script>
	<script src="../js/jquery.nicescroll.js" type="text/javascript"></script> -->
   <!--  <script src="../js/respond.min.js" ></script>
   -->
   <script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>	
   <!-- <script type="text/javascript" src="../assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script> -->
   <script type="text/javascript" src="../assets/bootstrap-autocomplete/chosen.jquery.js"></script>

   <!--common script for all pages-->
   <script src="../js/common-scripts.js"></script>	<script type="text/javascript">

   	$(function(){			

   		$('#x_tgl_bina').datepicker({
   			format: 'yyyy-mm',
   			viewMode: 'months',
   			minViewMode: 'months'

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

   		$('#x_tgl_bina1').datepicker({
   			format: 'yyyy-mm-dd'
   		});

   		$('#tgl_bina1_reset').click(
   			function(){					
   				$('#x_tgl_bina1').val("");
   			}
   			);

   		$('#tgl_bina1_set').click(
   			function(){					
					//alert("test");
					$('#x_tgl_bina1').focus();
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

   		$('#x_tgl_jadi1').datepicker({
   			format: 'yyyy-mm-dd'
   		});

   		$('#tgl_jadi1_reset').click(
   			function(){					
   				$('#x_tgl_jadi1').val("");
   			}
   			);

   		$('#tgl_jadi1_set').click(
   			function(){					
					//alert("test");
					$('#x_tgl_jadi1').focus();
				}
				);

			/*$("#x_user_agent").change(function(){
				var nilai = this.value;
				//alert(nilai);		
				$("#x_nama_agent").val(null);  
				$("#x_nama_agent").val(nilai);
				$("#x_nama_agent").trigger('chosen:updated');
				
			});*/
			
			/*($("#x_nama_agent").change(function(){
				var nilai = this.value;
				//alert(nilai);		
				$("#x_user_agent").val(null);  
				$("#x_user_agent").val(nilai);
				$("#x_user_agent").trigger('chosen:updated');
			});*/

			$('.chosen-select').chosen();
			//$('.chosen-select-deselect').chosen({ allow_single_deselect: true });
		});		
	</script>

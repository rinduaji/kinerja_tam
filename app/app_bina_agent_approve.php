
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
$lup=date('Y-m-d h:i:s');

?>         

<!--sidebar end-->	

<!--main content start-->
<section id="main-content">
	<section class="wrapper">

		<!--form name="form1" method="post" action="bina_tl_approve.php" -->
		<form name="form1" method="post" action="app_bina_tl_approve.php?id=<?php echo $rsk[2];?>">
			<!--input type="hidden" id="sub_menu" name="sub_menu" size="20" value="active_63"-->

			<div class="row">

				<div class="col-lg-12" >
					<section class="panel">
						<div class="revenue-head ">
							<span>
								<i class="icon-ticket"></i>
							</span>
							<h3>Data Approve - TL</h3>									
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
						

						
						<div class="col-md-12" >
							<section class="panel">
								<div class="revenue-head " style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">									
									<h3>Data Ketidaksesuaian</h3>									
								</div>																

								<div class="panel-body" style="overflow-y: scroll; overflow-x: scroll">
									<!--table border="0" width="100%">
										<tr>
											<td width="80%">
											<input type="text" class="form-control"  id="keyword" name="keyword" placeholder="Type keyword here.." value="" size="1">
											</td>
											
											<td>
												
											<!--
											<button type="button" class="btn btn-warning" onClick="caridata();">
											<font color="#000000">Search</font></button>
										-->
											<!--button type="submit" id="Search" name="Search" value="1" class="btn btn-success">Search</button>
											<button type="button" id="reset" name="reset"  class="btn btn-danger">Reset</button>
											
											</td>
										</tr>
									</table-->
									
									<div class="table-responsive">
										<!--<table class="table table-bordered">-->
											<!--table class="table table-bordered table-advance table-hover"-->
											<table class="table table-striped table-bordered table-hover header-fixed">
												<!--div><br></div-->											
												<thead>
													<tr>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Custom <br/> Data
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Jenis <br/> Bina
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Tanggal <br/> Bina
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Tanggal <br/> Kejadian
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Agent <br/> (CO)
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Team <br/> Leader
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																QCO <br/> Penilai
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Status <br/> Bina
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																FASTEL
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Parameter <br/> Tapping Proses<br/>
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Parameter <br/> Tapping Sikap
															</font>
														</th>
														<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
															<font face="Verdana" style="font-size: 9pt">
																Parameter <br/> Tapping Solusi
															</font>
														</th>

													</tr>									
												</thead>
												<tbody>

													<?php	
													$ss=$_SESSION["username"];	
											//echo "$ss";

													$qsk=mysqli_query($conn, "SELECT a.reason_monitoring,a.tanggal,a.tglrecord,a.user_id,c.nama_tl,a.lup_qa,a.status,a.ani,a.param_tapping_proses,a.param_tapping_sikap,a.param_tapping_solusi,a.rekomendasi_tl,a.komitmen_agent,a.human,a.system_prosedur,a.tools FROM app_kinerja_nilai AS a INNER JOIN cc147_main_users_extended AS b ON a.user_id = b.user1 INNER JOIN cc147_main_users AS c ON b.user_id = c.user_id WHERE c.nama_tl = '$ss' and a.status=1");

													$k=1;

													$total = mysqli_num_rows($qsk);
													while ($rsk=mysqli_fetch_row($qsk)){

														?>

													
														<tr class="odd gradeX">												
															<td style="padding-top: 2px; padding-bottom: 2px" align="center">
																<div align="center">

																	<font face="Verdana" style="font-size: 9pt">

																<!--a href="bina_admin_edit.php?userid=102582">
																<div data-placement="top" data-toggle="tooltip" class="label tooltips" data-original-title="Edit Users">
																	<span class='label label-sm label-warning'> Edit&nbsp;</span>
																</div>
															</a-->

																<!--a href="../app/bina_admin_delete.php?userid=102582" onclick="javascript: return(delete_data(1))" title="Delete Record">
																<div data-placement="top" data-toggle="tooltip" class="label tooltips" data-original-title="Delete Users">
																	<span class='label label-sm label-danger'>Delete</span>
																</div-->
																
																<a href="app_bina_agent_approve_edit.php?id=<?php echo $rsk[3];?>&tanggal=<?php echo $rsk[1];?>&ani=<?php echo $rsk[7];?>" title="Approve Data"> <div data-placement="top" data-toggle="tooltip" class="label tooltips" data-original-title="Approve Data"> <span class="btn btn-primary btn-xs"> View Approve Data&nbsp;</span> </div> </a>
																
																<!---->
																
															</a>
															
														</font>
													</div>
												</td>
												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[0]; ?></font>
												</td>

												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[1];?></font>
												</td>
												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[2];?></font>
												</td>
												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[3];?></font>
												</td>
												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[4];?></font>
												</td>													
												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[5];?></font>
												</td>													
												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt">Need Approve TL</font>
												</td>
												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[7];  ?>
												</font>
											</td>
											<td style="padding-top: 2px; padding-bottom: 2px">
												<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[8];?></font>
											</td>
											<td style="padding-top: 2px; padding-bottom: 2px">
												<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[9];?></font>
											</td>
											<td style="padding-top: 2px; padding-bottom: 2px">
												<font face="Tahoma" style="font-size: 9pt"><?php echo $rsk[10];?></font>
											</td>


										</tr>

										<?php
									}


									?>												








								</tbody>									
							</table>

							<table>
								<TR>
									<TD style="padding-top: 0px; padding-bottom: 0px">
										<p align="center">
											<font color="#000042" face="Verdana" style="font-size: 8pt">
												<b>&nbsp;</b></font>
												<b><font face="Verdana" style="font-size: 8pt" color="#000066">&nbsp;Total : <?php echo $total;?> record</b></font></TD>

											</TR>

										</table>
									</div>
								</div>
							</section>
						</div>
						
					</div>
					
					<input type="hidden" name="flag_temp" value=""> 
					<input type="hidden" name="page" value="1">
					<input type="hidden" name="num_page" value="">
					<input type="hidden" name="total_data" value="">

				</form>

			</section>
		</section>
		<!--main content end-->
		
		<!--footer start-->
		<footer class="site-footer">
			<div class="text-center">
				2018 &copy; Infomedia Nusantara - Contact Center TAM.
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
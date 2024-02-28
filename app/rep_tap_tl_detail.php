<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- BEGIN HEAD -->
<?php 

include 'koneksi.php';
if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}

//require_once('koneksi.php');
     //session_start();

require_once('sidebar.php'); 
require_once('koneksi.php');
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
$lup=date('Y-m-d h:i:s');

$arr_status = array("Need Aprrove QOC","Need Aprrove Agent","Need Aprrove TL","Closed"); 


?>         
<SCRIPT language=Javascript>
	function isNumberKey(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}

	if(isset($_POST['keyword'])){
		$user = $_POST['keyword'];
	}

</SCRIPT>  
<!--sidebar end-->	
<!--main content start-->
<section id="main-content">

	<!-- wrapper start -->
	<section class="wrapper">
		<?php
		if(isset($_POST)){
			$status = $_POST['status'];
			$tanggal_status = $_POST['tanggal'];
			$ani_status = $_POST['ani'];
			if(!is_null($komitmen)){
				$komitmen = $_GET['komitmen'];
			}
			else {
				$komitmen = $_POST['komitmen'];
			}
			$rekomendasi = $_POST['rekomendasi'];
			$get_login_tl = $_GET['login_tl'];
		}

			// var_dump($status);
			// var_dump($komitmen);
		$sql_cek = "Select * from app_kinerja_nilai WHERE lup_tl_name='$get_login_tl' AND ani='$ani_status' AND tanggal='$tanggal_status'";
		if($_SESSION['jabatan'] == "Duktek") {
			$sql_status = "UPDATE app_kinerja_nilai SET status='$status', komitmen_agent ='$komitmen', rekomendasi_tl='$rekomendasi' WHERE lup_tl_name='$get_login_tl' AND ani='$ani_status' AND tanggal='$tanggal_status' ";
		}
		$result_status=mysqli_query($conn,$sql_cek);
		if(mysqli_num_rows($result_status) > 0) {

			mysqli_query($conn,$sql_status);
			echo "<div id='sas' class='alert alert-success' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>  Status telah diubah!!</div>";
		}

		?>

		
			<div class="row">

				<div class="col-lg-12">

					<section class="panel">

						<div class="revenue-head ">
							<span>
								<i class="icon-ticket"></i>
							</span>
							<h3>Export Pembinaan</h3>
							<div class="btn-group" style="float:right; margin-top:8px; margin-right:10px;">
								<!-- <a class="btn btn-success" href="rep_area.php">Per Area</a>
								<a class="btn btn-default" href="rep_tap_tl.php">Per TL</a>
								<a class="btn btn-warning" href="rep_tap_tabber.php">Per Tabber</a> -->

							</div>
								<!--  <span class="rev-combo pull-right">
									<a data-toggle="modal" href="#modal_help"> 
									 <i class="icon-question-sign"></i> 
									</a>	
								</span> -->
							</div>
							

							<div class="panel-body">

								<div class="tab-content tasi-tab">

									
										
											<div class="table-responsive">
												<table data-toggle="table" class="table table-striped table-bordered table-hover header-fixed" id="sample_xx">
													<div><br></div>
													<thead>
														<tr>
															<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																<font face="Verdana" style="font-size: 9pt">
																No</font></th>

																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	Tanggal </font>
																</th>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">Agent
																	</font>
																</th>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">ANI Number
																	</font>
																</th>


																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">Area
																	</font>
																</th>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">Team Leader
																	</font>
																</th>

																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">QA
																	</font>
																</th>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">Proses Layanan
																	</font>
																</th>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">Sikap Layanan
																	</font>
																</th>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">Status Bina
																	</font>
																</th>

																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">Komitmen TL
																	</font>
																</th>


															</tr>

														</thead>
														<tbody>
															<?php 
                      //echo date('m');
															
															
// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																$query="Select tanggal,ani,area,lup_tl_name,lup_qa,proses_layanan,sikap_layanan,status,rekomendasi_tl,komitmen_agent,user_id FROM app_kinerja_nilai  WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun' AND user_id='$login_agent' AND lup_tl_name='$login_tl' ORDER BY tanggal asc";
																$sql=mysqli_query($conn,$query);
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
//  print_r($query);
																$no=1;
																while($row=mysqli_fetch_row($sql)){
	# code...
																	?>

																	<tr class="odd gradeX">

																		<td style="padding-top: 2px; padding-bottom: 2px">
																			<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>					
																			<td style="padding-top: 2px; padding-bottom: 2px">
																				<font face="Tahoma" style="font-size: 9pt"><?php echo date("d F Y",strtotime($row[0])); ?>
																			</font>
																		</td>
																		<td style="padding-top: 2px; padding-bottom: 2px">
																			<font face="Tahoma" style="font-size: 9pt"><?php echo $row[10];  ?>
																		</font>
																	</td>
																	<td style="padding-top: 2px; padding-bottom: 2px">
																		<font face="Tahoma" style="font-size: 9pt"><?php echo $row[1];  ?>
																	</font>
																</td>

																<td style="padding-top: 2px; padding-bottom: 2px">
																	<font face="Tahoma" style="font-size: 9pt"><?php echo $row[2]; ?>
																</font>
															</td>

															<td style="padding-top: 2px; padding-bottom: 2px">
																<font face="Tahoma" style="font-size: 9pt"><?php echo $row[3]; ?>
															</font>
														</td>

														<td style="padding-top: 2px; padding-bottom: 2px">
															<font face="Tahoma" style="font-size: 9pt"><?php echo $row[4]; ?>
														</font>
													</td>

													<td style="padding-top: 2px; padding-bottom: 2px">
														<font face="Tahoma" style="font-size: 9pt"><?php echo $row[5]; ?>
													</font>
												</td>

												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $row[6]; ?>
												</font>
											</td>
											<td style="padding-top: 2px; padding-bottom: 2px">
												<font face="Tahoma" style="font-size: 9pt">
													<?php 
													switch($row[7]) {
														case 0:
														$status = "Need Aprrove QOC";
														break;
														case 1:
														$status = "Need Aprrove TL";
														break;
														case 2:
														$status = "Need Aprrove TL";
														break;
														case 3:
														$status = "Closed";
														break;
														default:
														$status = "Not Status";
														break;
													}

													echo $status;

													?>
												</font>
											</td>
											<td style="padding-top: 2px; padding-bottom: 2px">
												<font face="Tahoma" style="font-size: 9pt"><?php echo $row[9]; ?>
											</font>
										</td>

								</tr>

								<?php  

								$no++;

							}

						
		?>
					</tbody>
				</table>
			</div>

			<table>
				<TR>
					<TD style="padding-top: 0px; padding-bottom: 0px">
						<p align="center">
							<font color="#000042" face="Verdana" style="font-size: 8pt">
								<b>&nbsp;</b>
							</font>
							<!-- <b><font face="Verdana" style="font-size: 8pt" color="#000066">&nbsp;Total : &nbsp; record</b></font></TD> -->

						</TR>

					</table>
					<!--<p align="center">History Ticket</p>-->

					<!-- detil grid start-->
					<!--			  
					<div class="row">
					
					
							<header class="panel-heading label-default">
                              <p class="label"><i class="icon-comment-alt"></i> &nbsp;History Ticket</p>
                          </header>								  
							<div class="panel-body">
								<iframe width="100%" border="0" frameborder="0" scrolling="yes" name="frame_detail" src="ticket_log.php?select_id="></iframe>
							</div>			  
					</div>
				-->
				<!-- detil grid end-->
			</div>



		</div>	



		<!-- Modal -->
		<div class="modal fade" id="modal_help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Help</h4>
					</div>
					<div class="modal-body">
						<b>
							Ketik keyword yang anda cari dan tekan search<br>
						</b>

					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-success" type="button">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- modal -->				  

		






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
<script src="../js/gritter.js" type="text/javascript"></script>





<script>


	$(document).ready(function(){

		$('#reset').click(function(e){
			document.location.href = 'idx_office.php?sub_menu='+sub_menu.value+'&Search=1';

		});

	});

	function delete_data(no)
	{
		return confirm('Hapus data nomer '+no+' ?');
	}


	function gritter_show(vjudul, vpesan)
	{
		
		$.gritter.add({
			title: vjudul,
			image: '../img/company_logo.png',			
			text: vpesan,
			//sticky: true,
			time: '1000',			
		});

	} 	  


</script>

</body>
</html>


?> 
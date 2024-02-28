<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<?php 

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}

//require_once('koneksi.php');
     //session_start();
include 'koneksi.php';

require_once('sidebar.php'); 
require_once('koneksi.php');
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
$lup=date('Y-m-d h:i:s');
$ss=$_SESSION["username"];	
$jb = $_SESSION["jabatan"];
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

		<form name="form1" method="post" action="rep_tap_tabber_detail.php?login_agent=<?php echo $_GET['login_agent'];?>&area=<?php echo $_GET['area'];?>&bulan=<?php echo $_GET['bulan'];?>&tahun=<?php echo $_GET['tahun'];?>&agent=<?php echo $user;?>" >

			<input type="hidden" id="sub_menu" name="sub_menu" size="20" value="active_115">
			<input type="hidden" id="vactive_level" name="vactive_level"  value="Supervisor">
			<input type="hidden" id="agent_ticket" name="agent_ticket"  value="">
			<input type="hidden" id="agent_cwc" name="agent_cwc"  value="">

			<input type="hidden" id="sts" name="sts" size="20" value="">
			<input type="hidden" id="from_dash" name="from_dash" size="20" value="">


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
													<table data-toggle="table" class="table table-bordered header-fixed" id="sample_xx">
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
																		<font face="Verdana" style="font-size: 9pt">Total Nilai
																		</font>
																	</th>



																</tr>

															</thead>
															<tbody>
																<?php 
                      //echo date('m');
																$area_id = $_GET['area'];
																$qq=date('m');
																$q=date('Y');
																$month = $_GET['bulan'];
																$year = $_GET['tahun'];

																$no=1;




// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																
																$query = "Select kn.tanggal,kn.ani,u.user7,kn.lup_tl_name,kn.lup_qa,kn.proses_layanan,kn.sikap_layanan,kn.user_id FROM app_kinerja_nilai  as kn INNER JOIN cc147_main_users_extended as u ON kn.lup_qa=u.user1  WHERE MONTH(kn.tanggal) = '$qq' AND YEAR(kn.tanggal) = '$q' AND u.user7='$area_id' AND kn.user_id='$login_agent' AND kn.lup_qa='$login_tabber'";
																		$sql=mysqli_query($conn,$query);
																		// print_r($query);
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																		while($row=mysqli_fetch_row($sql)){
																			$month = date("F",strtotime($row[0]));
																			$total_nilai = $row[5] + $row[6];		
																			?>

																			<tr class="odd gradeX" style="<?php if($total_nilai < 100) { echo 'background-color: #ff6c60;color:white;';}?>">

																				<td style="padding-top: 2px; padding-bottom: 2px">
																					<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>					
																					<td style="padding-top: 2px; padding-bottom: 2px">
																						<font face="Tahoma" style="font-size: 9pt"><?php echo date("d F Y",strtotime($row[0])); ?>
																					</font>
																				</td>
																				<td style="padding-top: 2px; padding-bottom: 2px">
																					<font face="Tahoma" style="font-size: 9pt"><?php echo $row[7];  ?>
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
														<font face="Tahoma" style="font-size: 9pt"><?php echo $total_nilai; ?>
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

		




		<input type="hidden" name="flag_temp" value=""> 
		<input type="hidden" name="page" value="1">
		<input type="hidden" name="num_page" value="">
		<input type="hidden" name="total_data" value="">

	</form>	


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
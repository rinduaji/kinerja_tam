<?php 
include 'koneksi.php';
$sql1="SELECT tanggal,layanan,record_id,tgl_record,jam,durasi,customer_needs,service_technique,QM,rekomendasi FROM `app_kinerja_tab` where user_id='$agent_id' and `tanggal` LIKE '%$bulan%' ORDER BY tanggal asc";
//echo "$sql1";
$sqlc="SELECT masalah,tglrecord FROM app_kinerja_nilai where `tanggal` LIKE '%$bulan%' ORDER BY tanggal asc";
//echo "$sqlc";

// $sql3="SELECT app_kinerja_tab.tanggal,app_kinerja_tab.record_id,app_kinerja_tab.tgl_record,app_kinerja_nilai.tglrecord,app_kinerja_tab.durasi,app_kinerja_tab.customer_needs,app_kinerja_tab.service_technique,app_kinerja_tab.QM,app_kinerja_tab.rekomendasi FROM app_kinerja_tab Inner Join app_kinerja_nilai on app_kinerja_nilai.user_id = app_kinerja_tab.user_id and app_kinerja_nilai.tanggal = app_kinerja_tab.tanggal where app_kinerja_tab.app_kinerja_nilai.tanggal LIKE '%$bulan%' ORDER BY tanggal asc";
$sql3="SELECT tanggal,ani,tglrecord,durasi,proses_layanan,sikap_layanan,human FROM app_kinerja_nilai WHERE tanggal LIKE  '%$bulan%' ORDER BY tanggal asc";
//echo "$sql3";
//die();
$query=mysqli_query($conn,$sql3);
// $queryc=mysql_query($sqlc);
// $rowc=mysql_fetch_row($queryc);
// $tt=substr($rowc[1], 10,18);

$tbl="<table border=0 width=95% height=80 style='border: 1px solid white;'>";
$tbl.="<tr><td width=80 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Tanggal </td>
<td width=50 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Sample </td>

<td width=80 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Ani Number </td>
<td width=80 align=center $bgcolor  style='border: 1px solid white;'><font color='#FFFFFF' > Tgl Record </td>


<td width=120 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Durasi </td>

<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Customer Needs </td>
<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Service Technique </td>
<td width=40 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > QM </td>
<td width=150 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Rekomendasi </td></tr>"; 
$i=1;
$total_data=0;
$n=0;

while($row=mysqli_fetch_row($query))
{
	$n++;

	$total_data++;

//echo "147";
	$tt=$row[4]+$row[5];
	$tbl.="<tr><td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[0]</td>
	<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >#$i</td>
	<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[1]</td>
	<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[2]</td>
	<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[3]</td>
	<td align=center $bgcolor3 style='border: 1px solid white;'><font color='#000000' >$row[4]</td>

	<td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$row[5]</td>
	<td align=center $bgcolor5 style='border: 1px solid white;'><font color='#000000' >$tt</td>
	<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[6]</td>


	</tr>";	
	$sta= $tt;
		// $asts=$sta/24;
	$asts=$sta/10;
	$sts = number_format($asts,2,",",".");

	$i++;


}
if($sts>=9){$aqms="EXCELENT";}
else if($sts>=8){$aqms="NEED IMPROVEMENT";}
else if($sts<8){$aqms="COACHING ALERT";}

$tbl.="<tr><td width=80 align=center $bgcolor > </td>
<td width=50 align=center $bgcolor>  </td>
<td width=50 align=center $bgcolor></td>
<td width=80 align=center $bgcolor> </td>
<td width=120 align=center $bgcolor></td>


<td align=center $bgcolor> </td>
<td align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Total Qm </td>
<td align=center bgcolor=#000000 style='border: 1px solid white;'><font color=\"#FFFFFF\" size=\"2\">  $sts</font> </td>
<td width=150 align=center $bgcolor><font color='#FFFFFF' > $aqms </td></tr>"; 	

//echo "$sta";
$tbl.="</table>"; ?>
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

require_once('sidebar.php'); 
require_once('koneksi.php');
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
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

	if(isset($_POST['keyword'])){
		$user = $_POST['keyword'];
	}

</SCRIPT>  
<!--sidebar end-->	
<!--main content start-->
<section id="main-content">

	<!-- wrapper start -->
	<section class="wrapper">

		<form name="form1" method="post" action="rep_area_detail.php?area=<?php echo $_GET['area'];?>&bulan=<?php echo $_GET['bulan'];?>&tahun=<?php echo $_GET['tahun'];?>" >

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
								<a class="btn btn-success" href="rep_area.php">Per Area</a>
								<a class="btn btn-default" href="rep_tap_tl.php">Per TL</a>
								<a class="btn btn-warning" href="rep_tap_tabber.php">Per Tabber</a>

							</div>
								<!--  <span class="rev-combo pull-right">
									<a data-toggle="modal" href="#modal_help"> 
									 <i class="icon-question-sign"></i> 
									</a>	
								</span> -->
							</div>
							

							<div class="panel-body">

								<div class="tab-content tasi-tab">

									<table border="0" width="100%">
										<tr>
											<td>
												<label for="start">Cari Nama Agent :</label>
											</td>
											<td width="74%">
												<input type="text" class="form-control" name="keyword" size="1" placeholder="Ketikkan Nama Agent">
											</td>

											<td>

																	<!--
																<button type="button" class="btn btn-warning" onClick="caridata();">
																<font color="#000000">Search</font></button>
															-->       
															<button type="submit" id="Search" name="Search" value="1" class="btn btn-success">Search</button>
															<button type="button" id="reset" name="reset"  class="btn btn-danger">Reset</button>

														</td>
													</tr>
												</table>


												<div class="table-responsive">
													<table data-toggle="table" class="table table-bordered  " >
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
																		<font face="Verdana" style="font-size: 9pt">ND
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
																$user = $_POST['keyword'];
																$no=1;
																if($user == "" OR $user == null){
																	while ( $qq <= date('m')) {


// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																		$sql=mysqli_query($conn,"Select tanggal,ani,area,lup_tl_name,lup_qa,proses_layanan,sikap_layanan,user_id,nd FROM app_kinerja_nilai  WHERE MONTH(tanggal) = '$month' AND YEAR(tanggal) = '$year' AND area='$area_id'");
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																		while($row=mysqli_fetch_row($sql)){
																			$month = date("F Y",strtotime($row[0]));
																			$total_nilai = $row[5] + $row[6];
																			?>

																			<tr class="odd gradeX" style="<?php if($total_nilai < 100) { echo 'color:white;background-color:#ff6c60;';}?>">

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
																					<font face="Tahoma" style="font-size: 9pt"><?php echo $row[8];  ?>
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





											$qq++;
											$q--;
										}
									}
									else {
// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
										$sql=mysqli_query($conn,"Select tanggal,ani,area,lup_tl_name,lup_qa,proses_layanan,sikap_layanan,user_id FROM app_kinerja_nilai  WHERE MONTH(tanggal) = '$month' AND YEAR(tanggal) = '$year' AND user_id = '$user' GROUP BY area");
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
										while($row=mysqli_fetch_row($sql)){
											$total_nilai = $row[5] + $row[6];
											?>

											<tr class="odd gradeX" style="<?php if($total_nilai < 100) { echo 'background-color: #ff6c60;color:white;';}?>">

												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>					
													<td style="padding-top: 2px; padding-bottom: 2px">
														<font face="Tahoma" style="font-size: 9pt"><?php echo date("F Y",strtotime($row[0])); ?>
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
			$q--;
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
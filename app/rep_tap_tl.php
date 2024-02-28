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

 </SCRIPT>  
 <!--sidebar end-->	
 <!--main content start-->
 <section id="main-content">

 	<!-- wrapper start -->
 	<section class="wrapper">

 		<form name="form1" method="post" action="rep_tap_tl.php" >

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
 							<h3>Report Approval Pembinaan</h3>
 							<div class="btn-group" style="float:right; margin-top:8px; margin-right:10px;">
 								<!-- <a class="btn btn-success" href="rep_area.php">Per Area</a> -->
 								<!-- <a class="btn btn-default" href="rep_tap_tl.php">Per TL</a> -->
 								<!-- <a class="btn btn-warning" href="rep_tap_tabber.php">Per Tabber</a> -->
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
												<label for="start">Cari Bulan dan Tahun :</label>
											</td>
											<td width="74%">
												<input type="month" class="form-control" name="keyword" size="1" value="<?php echo date("F Y");?>">
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
													<table data-toggle="table" class="table table-striped table-bordered table-hover header-fixed" id="sample_xx">
														<div><br></div>
														<thead>
															<tr>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	No</font></th>

												<!-- <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
													 <font face="Verdana" style="font-size: 9pt">
														Area </font>
													</th> -->
													<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
														<font face="Verdana" style="font-size: 9pt">Login TL
														</font>
													</th>
													<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
														<font face="Verdana" style="font-size: 9pt">Login Agent
														</font>
													</th>

													<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
														<font face="Verdana" style="font-size: 9pt">Bulan
														</font>
													</th>

													<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
														<font face="Verdana" style="font-size: 9pt">Tahun
														</font>
													</th>

													<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
														<font face="Verdana" style="font-size: 9pt">Total
														</font>
													</th>



													<!-- <th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
														<font face="Verdana" style="font-size: 9pt">Export
														</font>
													</th> -->

													<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
														<font face="Verdana" style="font-size: 9pt">Action
														</font>
													</th>

												<!--th  style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
												     <div align="center">
													 <font face="Verdana" style="font-size: 9pt">
														</font>
														<a href="form_reason.php?form_req=New">
														<div data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Tambah Reason">
														<span class='label label-sm label-success icon-plus-sign'> Add&nbsp;</span>
														</div>
														</a>
													</div>	
												</th>	-->											
												
											</tr>
											
										</thead>
										<tbody>
											<?php 
                      //echo date('m');

											
											$qq=date('m');
											$q=date('Y');
											$month = $qq;
											$year = date("Y",strtotime($q));
											$no=1;
											if($_POST['keyword'] == "" OR $_POST['keyword'] == null){
												if(!isset($_POST['search'])){
													while ( $qq <= date('m')) {


// $sql=mysqli_query($conn,"select  b.nama_tl as 'nama tl',a.tanggal, COUNT(*) FROM app_kinerja_nilai as a, cc147_main_users as b  WHERE a.user_id=b.username AND a.tanggal LIKE '%$qq%' GROUP BY a.tanggal");
   // echo "select  a.area,b.nama_tl as 'nama tl',a.tanggal, COUNT(*) FROM app_kinerja_nilai as a, cc147_main_users as b  WHERE a.user_id=b.username AND a.tanggal LIKE '%$qq%' GROUP BY b.nama_tl";
														if($jb == "TL TAM DCS"){
															$sql=mysqli_query($conn,"Select user_id,tanggal, COUNT(*),lup_tl_name FROM app_kinerja_nilai  WHERE MONTH(tanggal) = '$qq' AND YEAR(tanggal) = '$q' AND lup_tl_name = '$ss' GROUP BY user_id ORDER BY user_id ASC;");
														}
														else {
															$sql=mysqli_query($conn,"Select user_id,tanggal, COUNT(*),lup_tl_name FROM app_kinerja_nilai  WHERE MONTH(tanggal) = '$qq' AND YEAR(tanggal) = '$q' GROUP BY user_id ORDER BY user_id ASC;");
														}
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
														while($row=mysqli_fetch_row($sql)){
															$month = date(m,strtotime($row[1]));
															if ($qq==$month) {
																?>



																<tr class="odd gradeX">

																	<td style="padding-top: 2px; padding-bottom: 2px">
																		<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>  
																		<td style="padding-top: 2px; padding-bottom: 2px">
																			<font face="Tahoma" style="font-size: 9pt"><?php echo $row[3]; ?>
																		</font>
																	</td>       
																		<td style="padding-top: 2px; padding-bottom: 2px">
																			<font face="Tahoma" style="font-size: 9pt"><?php echo $row[0]; ?>
																		</font>
																	</td>
																	<td style="padding-top: 2px; padding-bottom: 2px">
																		<font face="Tahoma" style="font-size: 9pt"><?php echo date(F,strtotime($row[1]));  ?>
																	</font>
																</td>

																<td style="padding-top: 2px; padding-bottom: 2px">
																	<font face="Tahoma" style="font-size: 9pt"><?php echo date(Y,strtotime($row[1]));  ?>
																</font>
															</td>


															<td style="padding-top: 2px; padding-bottom: 2px">
																<font face="Tahoma" style="font-size: 9pt"><?php echo $row[2]; ?>
															</font>
														</td>
														<!--  -->
														<!-- <td style="padding-top: 2px; padding-bottom: 2px">
															<font face="Tahoma" style="font-size: 9pt">
																<a href="laporan_tl.php?area=<?php echo $row[0]; ?>&bulan=<?php echo $month;?>&tahun=<?php echo $year;?>">
																	<img title="Report to Excel" src="../img/excel.gif"></a></font>
																</td> -->

																<td style="padding-top: 2px; padding-bottom: 2px">
																	<a href="rep_tap_tl_detail.php?login_agent=<?php echo $row[0];?>&login_tl=<?php echo $row[3];?>&bulan=<?php echo $month;?>&tahun=<?php echo $year;?>" class="btn btn-primary btn-sm">Detail</a>
																</td>


															</tr>

															<?php  

															$no++;
														}
													}





													$qq++;
													$q--;
												}
												}
											}
											else {
												$month = date(m,strtotime($_POST['keyword']));
												$year = date(Y,strtotime($_POST['keyword']));
// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
												$sql=mysqli_query($conn,"Select lup_tl_name,tanggal, COUNT(*) FROM app_kinerja_nilai WHERE MONTH(tanggal) = '$month' AND YEAR(tanggal) = '$year' GROUP BY lup_tl_name");
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
												while($row=mysqli_fetch_row($sql)){


	# code...
													?>

													<tr class="odd gradeX">

														<td style="padding-top: 2px; padding-bottom: 2px">
															<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>  
															<td style="padding-top: 2px; padding-bottom: 2px">
																			<font face="Tahoma" style="font-size: 9pt"><?php echo $row[3]; ?>
																		</font>
																	</td>         
															<td style="padding-top: 2px; padding-bottom: 2px">
																<font face="Tahoma" style="font-size: 9pt"><?php echo $row[0]; ?>
															</font>
														</td>
														
														<td style="padding-top: 2px; padding-bottom: 2px">
															<font face="Tahoma" style="font-size: 9pt"><?php echo date(F,strtotime($row[1]));  ?>
														</font>
													</td>

													<td style="padding-top: 2px; padding-bottom: 2px">
														<font face="Tahoma" style="font-size: 9pt"><?php echo date(Y,strtotime($row[1]));  ?>
													</font>
												</td>


												<td style="padding-top: 2px; padding-bottom: 2px">
													<font face="Tahoma" style="font-size: 9pt"><?php echo $row[2]; ?>
												</font>
											</td>
											<!--  -->
											<!-- <td style="padding-top: 2px; padding-bottom: 2px">
												<font face="Tahoma" style="font-size: 9pt">
													<a href="laporan_tl.php?area=<?php echo $row[0]; ?>&bulan=<?php echo $month;?>&tahun=<?php echo $year;?>">
														<img title="Report to Excel" src="../img/excel.gif"></a></font>
													</td> -->

													<td style="padding-top: 2px; padding-bottom: 2px">
																	<a href="rep_tap_tl_detail.php?login_agent=<?php echo $row[0];?>&login_tl=<?php echo $row[3];?>&bulan=<?php echo $month;?>&tahun=<?php echo $year;?>" class="btn btn-primary btn-sm">Detail</a>
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

										<!-- 	<table>
											  <TR>
												<TD style="padding-top: 0px; padding-bottom: 0px">
												<p align="center">
														<font color="#000042" face="Verdana" style="font-size: 8pt">
														<b><font face='Verdana' style='font-size: 8pt'>Page 1 of 6 &nbsp;<input class="btn btn-success" type="submit" name="next" value=" > ">&nbsp;<input class="btn btn-success" type="submit" name="last" value=" >> "></font>&nbsp;</b></font>
														<b><font face="Verdana" style="font-size: 8pt" color="#000066">&nbsp;Total : 90&nbsp; record</b></font></TD>
														
											  </TR>
											  
											</table> -->
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
		<input type="hidden" name="num_page" value="6">
		<input type="hidden" name="total_data" value="90">

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


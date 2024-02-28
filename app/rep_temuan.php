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

 </SCRIPT>  
 <!--sidebar end-->	
 <!--main content start-->
 <section id="main-content">

 	<!-- wrapper start -->
 	<section class="wrapper">

 		<form name="form1" method="post" action="rep_temuan.php" >

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

<?php

if($_POST['keyword']=='2020-07'){
?>
	<div class="table-responsive">
													<table data-toggle="table" class="table table-striped table-bordered table-hover header-fixed" id="sample_xx">
														<div><br></div>
														<thead>
															<tr>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important"rowspan="3">
																	<font face="Verdana" style="font-size: 9pt">
																	No</font></th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">
																		Bulan dan Tahun </font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">
																		Nama Agent </font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">Site
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">Jumlah Tapping VR
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" colspan="13">
																		<font face="Verdana" style="font-size: 9pt">Jumlah Temuan di Tiap parameter
																		</font>
																	</th>


																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">Rata Rata Temuan Parameter
																		</font>
																	</th>
																</tr>
																<tr>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	P1</font></th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">
																		P2</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P3
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P4
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P5
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">P6
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	P7</font></th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">
																		P8</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P9
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P10
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P11
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">P12
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">P13
																		</font>
																	</th>
																</tr>
																<tr>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	3</font></th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">
																		3</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">6
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">15
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">10
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">10
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	10</font></th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">
																		10</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">7
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">6
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">5
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">10
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">5
																		</font>
																	</th>
																</tr>
															</thead>
															<tbody>
																<?php 
                      //echo date('m');
																$t = date("Y-m-d");
																$qq=date('m');
																$q=date('Y');
																$month = $qq;
																$year = date("Y",strtotime($q));

																$no=1;
																if($_POST['keyword'] == "" OR $_POST['keyword'] == null){
																	if(!isset($_POST['search'])){
																		while ( $qq <= date('m')) {


// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																			$sql=mysqli_query($conn,"SELECT u.user2, u.user1, u.user7, 
COUNT(*) AS jml_tap, 
IF(((SUM(SUBSTR(k.nilai,3,1)) / COUNT(*)) / 3) = 1, 0, IF((SUM(SUBSTR(k.nilai,3,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,3,1)))/3)) AS parameter1, 
IF(((SUM(SUBSTR(k.nilai,7,1))/ COUNT(*)) / 3)  = 1, 0, IF((SUM(SUBSTR(k.nilai,7,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,7,1)))/3)) AS parameter2, 
IF(((SUM(SUBSTR(k.nilai,9,1)) / COUNT(*)) / 6) = 1, 0, IF((SUM(SUBSTR(k.nilai,9,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,9,1)))/6)) AS parameter3,
IF(((SUM(SUBSTR(k.nilai,11,2)) / COUNT(*)) / 15) = 1, 0, IF((SUM(SUBSTR(k.nilai,11,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,11,2)))/15)) AS parameter4,
IF(((SUM(SUBSTR(k.nilai,16,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,16,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,16,2)))/10)) AS parameter5,
IF(((SUM(SUBSTR(k.nilai,19,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,19,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,19,2)))/10)) AS parameter6, 
IF(((SUM(SUBSTR(k.nilai,24,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,24,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,24,2)))/10)) AS parameter7,
IF(((SUM(SUBSTR(k.nilai,27,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,27,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,27,2)))/10)) AS parameter8,
IF(((SUM(SUBSTR(k.nilai,32,1)) / COUNT(*)) / 7) = 1, 0, IF((SUM(SUBSTR(k.nilai,32,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,32,1)))/7)) AS parameter9,
IF(((SUM(SUBSTR(k.nilai,36,1)) / COUNT(*)) / 6) = 1, 0, IF((SUM(SUBSTR(k.nilai,36,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,36,1)))/6)) AS parameter10, 
IF(((SUM(SUBSTR(k.nilai,40,1)) / COUNT(*)) / 5) = 1, 0, IF((SUM(SUBSTR(k.nilai,40,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,40,1)))/5)) AS parameter11,
IF(((SUM(SUBSTR(k.nilai,42,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,42,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,42,2)))/10)) AS parameter12,
IF(((SUM(SUBSTR(k.nilai,45,1)) / COUNT(*)) / 5) = 1, 0, IF((SUM(SUBSTR(k.nilai,45,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,45,1)))/5)) AS parameter13, k.tanggal
FROM cc147_main_users_extended AS u INNER JOIN app_kinerja_nilai AS k 
ON u.user1 = k.user_id WHERE MONTH(tanggal) = '07' AND YEAR(tanggal) = '2020' AND tanggal BETWEEN '2020-07-01' AND '2020-07-29'
GROUP BY u.user2 
ORDER BY u.user2, u.user1 ASC");
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																			while($row=mysqli_fetch_row($sql)){
	// 																			$month = date(m,strtotime($row[1]));
	// 																			if ($qq==$month) {
	// # code...																
	$score = (($row[3] * 100)-(($row[4]*3) + ($row[5]*3)+ ($row[6]*6) + ($row[7]*15) + ($row[8]*10) + ($row[9]*10) + ($row[10]*10) + ($row[11]*10) + ($row[12]*7) + ($row[13]*6) + ($row[14]*5) + ($row[15]*10) + ($row[16]*5))) / $row[3];
																					?>

																					<tr class="odd gradeX">

																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>
																							<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo date("F Y",strtotime($row[17])) ?>
																						</font>
																					</td>			
																							<td style="padding-top: 2px; padding-bottom: 2px">
																								<font face="Tahoma" style="font-size: 9pt"><?php echo $row[0].' / '.$row[1]; ?>
																							</font>
																						</td>
																						
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[2]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[3]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[4]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[5]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[6]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[7]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[8]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[9]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[10]  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[11]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[12]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[13]  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[14]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[15]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[16]  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo number_format($score,2);  ?>
																						</font>
																					</td>
																				</tr>

																				<?php  

																				$no++;
																			// }

																		}





																		$qq++;
																		$q--;
																	}
																}

															}
															else {
																$month = date(m,strtotime($_POST['keyword']));
																$month_string = date(F, strtotime($_POST['keyword']));
																$year = date(Y,strtotime($_POST['keyword']));
// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																$sql=mysqli_query($conn,"SELECT u.user2, u.user1, u.user7, 
COUNT(*) AS jml_tap, 
IF(((SUM(SUBSTR(k.nilai,3,1)) / COUNT(*)) / 3) = 1, 0, IF((SUM(SUBSTR(k.nilai,3,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,3,1)))/3)) AS parameter1, 
IF(((SUM(SUBSTR(k.nilai,7,1))/ COUNT(*)) / 3)  = 1, 0, IF((SUM(SUBSTR(k.nilai,7,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,7,1)))/3)) AS parameter2, 
IF(((SUM(SUBSTR(k.nilai,9,1)) / COUNT(*)) / 6) = 1, 0, IF((SUM(SUBSTR(k.nilai,9,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,9,1)))/6)) AS parameter3,
IF(((SUM(SUBSTR(k.nilai,11,2)) / COUNT(*)) / 15) = 1, 0, IF((SUM(SUBSTR(k.nilai,11,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,11,2)))/15)) AS parameter4,
IF(((SUM(SUBSTR(k.nilai,16,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,16,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,16,2)))/10)) AS parameter5,
IF(((SUM(SUBSTR(k.nilai,19,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,19,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,19,2)))/10)) AS parameter6, 
IF(((SUM(SUBSTR(k.nilai,24,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,24,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,24,2)))/10)) AS parameter7,
IF(((SUM(SUBSTR(k.nilai,27,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,27,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,27,2)))/10)) AS parameter8,
IF(((SUM(SUBSTR(k.nilai,32,1)) / COUNT(*)) / 7) = 1, 0, IF((SUM(SUBSTR(k.nilai,32,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,32,1)))/7)) AS parameter9,
IF(((SUM(SUBSTR(k.nilai,36,1)) / COUNT(*)) / 6) = 1, 0, IF((SUM(SUBSTR(k.nilai,36,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,36,1)))/6)) AS parameter10, 
IF(((SUM(SUBSTR(k.nilai,40,1)) / COUNT(*)) / 5) = 1, 0, IF((SUM(SUBSTR(k.nilai,40,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,40,1)))/5)) AS parameter11,
IF(((SUM(SUBSTR(k.nilai,42,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,42,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,42,2)))/10)) AS parameter12,
IF(((SUM(SUBSTR(k.nilai,45,1)) / COUNT(*)) / 5) = 1, 0, IF((SUM(SUBSTR(k.nilai,45,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,45,1)))/5)) AS parameter13, k.tanggal
FROM cc147_main_users_extended AS u INNER JOIN app_kinerja_nilai AS k 
ON u.user1 = k.user_id WHERE MONTH(tanggal) = '07' AND YEAR(tanggal) = '2020' AND tanggal BETWEEN '2020-07-01' AND '2020-07-29'
GROUP BY u.user2 
ORDER BY u.user2, u.user1 ASC");
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																while($row=mysqli_fetch_row($sql)){
																	
																	
	$score = (($row[3] * 100)-(($row[4]*3) + ($row[5]*3)+ ($row[6]*6) + ($row[7]*15) + ($row[8]*10) + ($row[9]*10) + ($row[10]*10) + ($row[11]*10) + ($row[12]*7) + ($row[13]*6) + ($row[14]*5) + ($row[15]*10) + ($row[16]*5))) / $row[3];
																					?>

																					<tr class="odd gradeX">

																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>
																								<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $month_string.' '.$year; ?>
																						</font>
																					</td>			
																							<td style="padding-top: 2px; padding-bottom: 2px">
																								<font face="Tahoma" style="font-size: 9pt"><?php echo $row[0].' / '.$row[1]; ?>
																							</font>
																						</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[2]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[3]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[4]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[5]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[6]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[7]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[8]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[9]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[10]  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[11]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[12]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[13]  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[14]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[15]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[16]  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo number_format($score,2);  ?>
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

											<p><strong>Keterangan Parameter :</strong>
												<ul>
													<li>P1   : Mengucapkan salam pembuka dengan baik</li>
													<li>P2   : Konfirmasi nama pelanggan dan menggunakannya selama pelayanan berlangsung</li>
													<li>P3   : Identifikasi / klarifikasi nomor msisdn</li>
													<li>P4   : Informasi jumlah tagihan, moda pembayaran dan reminding terhadap jadwal pembayaran tagihan telkom (sesuai dengan List To Do yang sedang di call)</li>
													<li>P5   : Agent mampu meyakinkan pelanggan untuk bersedia melakukan pembayaran tagihan</li>
													<li>P6   : Agent melakukan konfirmasi janji bayar ke pelanggan</li>
													<li>P7   : Mampu memberikan informasi dan penjelasan terkait tagihan ( e= : detail tagihan, klaim dll) saat pelanggan memerlukan</li>
													<li>P8   : Melakukan pelaporan pembuatan tiket terhadap pelanggan yang mengalami gangguan fastel</li>
													<li>P9   : Agent melakukan konfirmasi preference channel yang sesuai dengan kebutuhan pelanggan</li>
													<li>P10 : Menyampaikan salam penutup (Closing Greeting) --> disertakan dengan campaign MyIH</li>
													<li>P11 : Menggunakan bahasa yang baik, fleksibel, mudah dimengerti dan nyaman bagi pelanggan</li>
													<li>P12 : Memiliki Etika Komunikasi : Ramah, Sopan, bersikap empati, Tidak memancing/Tidak terpancing pelanggan yang emosi, Tidak memotong percakapan</li>
													<li>P13 : Intonasi, volume suara, kecepatan dan cara melayani pelanggan yang sopan dan ramah selama melayani</li>
												</ul>
											</p>
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
		<?php
}
else{
?>

												<div class="table-responsive">
													<table data-toggle="table" class="table table-striped table-bordered table-hover header-fixed" id="sample_xx">
														<div><br></div>
														<thead>
															<tr>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important"rowspan="3">
																	<font face="Verdana" style="font-size: 9pt">
																	No</font></th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">
																		Bulan dan Tahun </font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">
																		Nama Agent </font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">Site
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">Jumlah Tapping VR
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" colspan="12">
																		<font face="Verdana" style="font-size: 9pt">Jumlah Temuan di Tiap parameter
																		</font>
																	</th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" rowspan="3">
																		<font face="Verdana" style="font-size: 9pt">Rata Rata Temuan Parameter
																		</font>
																	</th>
																</tr>
																<tr>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	P1</font></th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">
																		P2</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P3
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P4
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P5
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">P6
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	P7</font></th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">
																		P8</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P9
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P10
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">P11
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">P12
																		</font>
																	</th>
																	
																</tr>
																<tr>
																<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	3</font></th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">
																		3</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">7
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">15
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">10
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">10
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																	<font face="Verdana" style="font-size: 9pt">
																	12</font></th>

																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">
																		12</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">6
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">5
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important" >
																		<font face="Verdana" style="font-size: 9pt">10
																		</font>
																	</th>
																	<th style="padding-top: 3px; padding-bottom: 3px; background-color: #EAEAEA !important">
																		<font face="Verdana" style="font-size: 9pt">7
																		</font>
																	</th>
																</tr>
															</thead>
															<tbody>
																<?php 
                      //echo date('m');
																$t = date("Y-m-d");
																$qq=date('m');
																$q=date('Y');
																$month = $qq;
																$year = date("Y",strtotime($q));

																$no=1;
																if($_POST['keyword'] == "" OR $_POST['keyword'] == null){
																	if(!isset($_POST['search'])){
																		while ( $qq <= date('m')) {


// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																			$sql=mysqli_query($conn,"SELECT u.user2, u.user1, u.user7, 
COUNT(*) AS jml_tap,
IF(((SUM(SUBSTR(k.nilai,3,1)) / COUNT(*)) / 3) = 1, 0, IF((SUM(SUBSTR(k.nilai,3,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,3,1)))/3)) AS parameter1, 
IF(((SUM(SUBSTR(k.nilai,7,1))/ COUNT(*)) / 3)  = 1, 0, IF((SUM(SUBSTR(k.nilai,7,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,7,1)))/3)) AS parameter2, 
IF(((SUM(SUBSTR(k.nilai,9,1)) / COUNT(*)) / 7) = 1, 0, IF((SUM(SUBSTR(k.nilai,9,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,9,1)))/7)) AS parameter3,
IF(((SUM(SUBSTR(k.nilai,11,2)) / COUNT(*)) / 15) = 1, 0, IF((SUM(SUBSTR(k.nilai,11,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,11,2)))/15)) AS parameter4,
IF(((SUM(SUBSTR(k.nilai,16,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,16,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,16,2)))/10)) AS parameter5,
IF(((SUM(SUBSTR(k.nilai,19,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,19,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,19,2)))/10)) AS parameter6, 
IF(((SUM(SUBSTR(k.nilai,24,2)) / COUNT(*)) / 12) = 1, 0, IF((SUM(SUBSTR(k.nilai,24,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,24,2)))/12)) AS parameter7,
IF(((SUM(SUBSTR(k.nilai,27,2)) / COUNT(*)) / 12) = 1, 0, IF((SUM(SUBSTR(k.nilai,27,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,27,2)))/12)) AS parameter8,
IF(((SUM(SUBSTR(k.nilai,32,1)) / COUNT(*)) / 6) = 1, 0, IF((SUM(SUBSTR(k.nilai,32,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,32,1)))/6)) AS parameter9,
IF(((SUM(SUBSTR(k.nilai,36,1)) / COUNT(*)) / 5) = 1, 0, IF((SUM(SUBSTR(k.nilai,36,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,36,1)))/5)) AS parameter10, 
IF(((SUM(SUBSTR(k.nilai,38,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,38,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,38,2)))/10)) AS parameter11,
IF(((SUM(SUBSTR(k.nilai,41,1)) / COUNT(*)) / 7) = 1, 0, IF((SUM(SUBSTR(k.nilai,41,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,41,1)))/7)) AS parameter12, k.tanggal
FROM cc147_main_users_extended AS u INNER JOIN app_kinerja_nilai AS k 
ON u.user1 = k.user_id WHERE MONTH(tanggal) = '$qq' AND YEAR(tanggal) = '$q'
GROUP BY u.user2 
ORDER BY u.user2, u.user1 ASC");
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																			while($row=mysqli_fetch_row($sql)){
	// 																			$month = date(m,strtotime($row[1]));
	// 																			if ($qq==$month) {
	// # code...																
	$score = (($row[3] * 100)-(($row[4]*3) + ($row[5]*3)+ ($row[6]*7) + ($row[7]*15) + ($row[8]*10) + ($row[9]*10) + ($row[10]*12) + ($row[11]*12) + ($row[12]*6) + ($row[13]*5) + ($row[14]*10) + ($row[15]*7))) / $row[3];
																					?>

																					<tr class="odd gradeX">

																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>
																							<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo date("F Y",strtotime($row[16])) ?>
																						</font>
																					</td>			
																							<td style="padding-top: 2px; padding-bottom: 2px">
																								<font face="Tahoma" style="font-size: 9pt"><?php echo $row[0].' / '.$row[1]; ?>
																							</font>
																						</td>
																						
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[2]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[3]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[4];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[5];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[6];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[7];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[8];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[9];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[10];  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[11];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[12];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[13];  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[14];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[15];  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo number_format($score,2);  ?>
																						</font>
																					</td>
																				</tr>

																				<?php  

																				$no++;
																			// }

																		}





																		$qq++;
																		$q--;
																	}
																}

															}
															else {
																$month = date(m,strtotime($_POST['keyword']));
																$month_string = date(F, strtotime($_POST['keyword']));
																$year = date(Y,strtotime($_POST['keyword']));
// $sql=mysqli_query($conn,"Select area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area");
																$sql=mysqli_query($conn,"SELECT u.user2, u.user1, u.user7, 
COUNT(*) AS jml_tap,
IF(((SUM(SUBSTR(k.nilai,3,1)) / COUNT(*)) / 3) = 1, 0, IF((SUM(SUBSTR(k.nilai,3,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,3,1)))/3)) AS parameter1, 
IF(((SUM(SUBSTR(k.nilai,7,1))/ COUNT(*)) / 3)  = 1, 0, IF((SUM(SUBSTR(k.nilai,7,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,7,1)))/3)) AS parameter2, 
IF(((SUM(SUBSTR(k.nilai,9,1)) / COUNT(*)) / 7) = 1, 0, IF((SUM(SUBSTR(k.nilai,9,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,9,1)))/7)) AS parameter3,
IF(((SUM(SUBSTR(k.nilai,11,2)) / COUNT(*)) / 15) = 1, 0, IF((SUM(SUBSTR(k.nilai,11,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,11,2)))/15)) AS parameter4,
IF(((SUM(SUBSTR(k.nilai,16,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,16,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,16,2)))/10)) AS parameter5,
IF(((SUM(SUBSTR(k.nilai,19,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,19,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,19,2)))/10)) AS parameter6, 
IF(((SUM(SUBSTR(k.nilai,24,2)) / COUNT(*)) / 12) = 1, 0, IF((SUM(SUBSTR(k.nilai,24,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,24,2)))/12)) AS parameter7,
IF(((SUM(SUBSTR(k.nilai,27,2)) / COUNT(*)) / 12) = 1, 0, IF((SUM(SUBSTR(k.nilai,27,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,27,2)))/12)) AS parameter8,
IF(((SUM(SUBSTR(k.nilai,32,1)) / COUNT(*)) / 6) = 1, 0, IF((SUM(SUBSTR(k.nilai,32,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,32,1)))/6)) AS parameter9,
IF(((SUM(SUBSTR(k.nilai,36,1)) / COUNT(*)) / 5) = 1, 0, IF((SUM(SUBSTR(k.nilai,36,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,36,1)))/5)) AS parameter10, 
IF(((SUM(SUBSTR(k.nilai,38,2)) / COUNT(*)) / 10) = 1, 0, IF((SUM(SUBSTR(k.nilai,38,2))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,38,2)))/10)) AS parameter11,
IF(((SUM(SUBSTR(k.nilai,41,1)) / COUNT(*)) / 7) = 1, 0, IF((SUM(SUBSTR(k.nilai,41,1))) = 0, COUNT(*),COUNT(*) - (SUM(SUBSTR(k.nilai,41,1)))/7)) AS parameter12, k.tanggal
FROM cc147_main_users_extended AS u INNER JOIN app_kinerja_nilai AS k 
ON u.user1 = k.user_id WHERE MONTH(tanggal) = '$month' AND YEAR(tanggal) = '$year'
GROUP BY u.user2 
ORDER BY u.user2, u.user1 ASC");
 //echo "Select  area,tanggal, COUNT(*) FROM app_kinerja_nilai  WHERE tanggal LIKE '%$qq%' GROUP BY area";
																while($row=mysqli_fetch_row($sql)){
																	
																	
	$score = (($row[3] * 100)-(($row[4]*3) + ($row[5]*3)+ ($row[6]*7) + ($row[7]*15) + ($row[8]*10) + ($row[9]*10) + ($row[10]*12) + ($row[11]*12) + ($row[12]*6) + ($row[13]*5) + ($row[14]*10) + ($row[15]*7))) / $row[3];
																					?>

																					<tr class="odd gradeX">

																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $no; ?></font></td>
																							<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo date("F Y",strtotime($row[16])) ?>
																						</font>
																					</td>			
																							<td style="padding-top: 2px; padding-bottom: 2px">
																								<font face="Tahoma" style="font-size: 9pt"><?php echo $row[0].' / '.$row[1]; ?>
																							</font>
																						</td>
																						
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[2]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[3]  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[4];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[5];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[6];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[7];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[8];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[9];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[10];  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[11];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[12];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[13];  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[14];  ?>
																						</font>
																					</td>
																						<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo $row[15];  ?>
																						</font>
																					</td>
																					<td style="padding-top: 2px; padding-bottom: 2px">
																							<font face="Tahoma" style="font-size: 9pt"><?php echo number_format($score,2);  ?>
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

											<p><strong>Keterangan Parameter :</strong>
												<ul>
													<li>P1   : Mengucapkan salam pembuka dengan baik</li>
													<li>P2   : Konfirmasi nama pelanggan dan menggunakannya selama pelayanan berlangsung</li>
													<li>P3   : Identifikasi / klarifikasi nomor msisdn</li>
													<li>P4   : Informasi jumlah tagihan, moda pembayaran dan reminding terhadap jadwal pembayaran tagihan telkom (sesuai dengan List To Do yang sedang di call)</li>
													<li>P5   : Agent mampu meyakinkan pelanggan untuk bersedia melakukan pembayaran tagihan</li>
													<li>P6   : Agent melakukan konfirmasi janji bayar ke pelanggan</li>
													<li>P7   : Mampu memberikan informasi dan penjelasan terkait tagihan ( e= : detail tagihan, klaim dll) saat pelanggan memerlukan</li>
													<li>P8   : Melakukan pelaporan pembuatan tiket terhadap pelanggan yang mengalami gangguan fastel</li>
													<li>P9   : Agent melakukan konfirmasi preference channel yang sesuai dengan kebutuhan pelanggan</li>
													<li>P10 : Menyampaikan salam penutup (Closing Greeting) --> disertakan dengan campaign MyIH</li>
													<li>P11 : Menggunakan bahasa yang baik, fleksibel, mudah dimengerti dan nyaman bagi pelanggan</li>
													<li>P12 : Memiliki Etika Komunikasi : Ramah, Sopan, bersikap empati, Tidak memancing/Tidak terpancing pelanggan yang emosi, Tidak memotong percakapan</li>
													<li>P13 : Intonasi, volume suara, kecepatan dan cara melayani pelanggan yang sopan dan ramah selama melayani</li>
												</ul>
											</p>
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
		<?php
		}
		?>

		

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
							cari bulan yang anda cari dan tekan search<br>
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


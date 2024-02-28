
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
		<form name="form1" method="post" action="report_spv_qa.php">
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
												<label class="control-label col-md-12"><strong>Masukkan Bulan dan Tahun Pencarian</strong></label>
												<div class="col-md-4">
													
													<div class="input-group date form_datetime-adv">
														
														<input class="form-control" size="16" type="text" value="<?php echo $x_tgl_bina; ?>" name="x_tgl_bina" id="x_tgl_bina" readonly="true"/>
														<span class="input-group-btn">
															<button type="button" class="btn btn-danger" id="tgl_bina_reset"><i class="icon-remove"></i></button>
															<button type="button" class="btn btn-warning" id="tgl_bina_set"><i class="icon-calendar"></i></button>
														</span>
													</div>
												</div>																								
											</div>																																									
										</div>
									</div>
									<br>				
									<div class='col-md-4'>
										<div role="form">
											<div class="form-group">
												<p align="right">
													<button type="submit" id="submit_cari" name="submit_cari" class="btn btn-success">Cari</button>
													<a href="report_spv_qa.php" class="btn btn-primary">Reset Cari</a>
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
						

						<?php 
						
						if (isset($_POST['submit_cari']) ){

							if ($x_tgl_bina=="" ) {
								?>

								<script type="text/javascript">
									alert("Mohon periksa kembali! Data yg anda masukkan ada yg belum lengkap ihh");
    //history.back();
</script>
<?php

} 
else{
	?>					
	<div class="col-md-12" >
		<section class="panel">
			
								<?php	
// if (isset ($enter))		// ================================== enter ==========================================
// {

    //$sheet='spv';
								$bulan=$x_tgl_bina;

								$bgcolor = "bgcolor=#808080";
								$bgcolor2 = "bgcolor=#f3f3f3";
								$bgcolor3="bgcolor=#ed1c1c";
								$bgcolor4 = "bgcolor=#aaa5a5";
								$bgcolor5 = "bgcolor=#666161";


								$tbl="<table border=0 width=95% height=80 style='border: 1px solid white;'>";
								$tbl.="<tr><td width=80 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > NO </td>
								<td width=50 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Login Agent </td>
								<td width=80 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Nama Agent </td>
								
								<td width=80 align=center $bgcolor  style='border: 1px solid white;'><font color='#FFFFFF' > Jabatan </td>
								<td width=80 align=center $bgcolor  style='border: 1px solid white;'><font color='#FFFFFF' > Site </td>


								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Nama TL </td>
								<td width=120 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Nama QCO </td>

								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Total QM </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Status QM </td>
								</tr>"; 

								$no = 1;
								$sql2="SELECT a.user_id, a.user1, a.user2, a.user3, a.user7, b.nama_tl, b.qco FROM cc147_main_users_extended as a 
										INNER JOIN cc147_main_users as b ON a.user1 =  b.username where a.user3 = 'Agent TAM' ORDER BY a.user7, a.user2 ASC";
								$query2=mysqli_query($conn,$sql2);
								while($row2=mysqli_fetch_row($query2))
								{
									
									$i=1;
									$total_data=0;
									$n=0;
									$tt=0;
									$sta=0;
									$asts = 0;
									$sts = 0;
									$aqms = "";
									if($row2[1] != ""){
										$sql3="SELECT tanggal,ani,tglrecord,durasi,proses_layanan,sikap_layanan,solusi_layanan,no_cp,jenis_call,kategori_call,param_tapping_proses,param_tapping_sikap,param_tapping_solusi FROM app_kinerja_nilai WHERE user_id='".$row2[1]."' AND tanggal LIKE  '%".$bulan."%' ORDER BY tanggal, user_id asc";
										// print_r($sql3);
										$query=mysqli_query($conn,$sql3);
										while($row=mysqli_fetch_row($query))
										{
											$n++;
											$total_data++;
											$tt=$row[4]+$row[5]+$row[6];
											// $tbl.="<tr><td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$i</td>
											// <td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[1]</td>
											// <td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[2]</td>
											// <td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[3]</td>

											// <td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[7]</td>
											// <td align=center $bgcolor3 style='border: 1px solid white;'><font color='#000000' >$row[8]</td>
											// <td align=center $bgcolor3 style='border: 1px solid white;'><font color='#000000' >$row[9]</td>
											// <td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$row[4]</td>

											// <td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$tt</td>


											// </tr>";	
											$sta += $tt;
											$asts=(($sta/10)/$n)*10;
											$sts = number_format($asts,2,",",".");

											$i++;

										}
										if($sts>=90){$aqms="EXCELENT";}
										else if($sts>=80){$aqms="NEED IMPROVEMENT";}
										else if($sts<80){$aqms="COACHING ALERT";}

										$tbl.="<tr><td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000'>".$no++."</td>
											<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row2[1]</td>
											<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row2[2]</td>
											<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row2[3]</td>
											<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row2[4]</td>

											<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row2[5]</td>
											<td align=center $bgcolor3 style='border: 1px solid white;'><font color='#FFFFFF' >$row2[6]</td>

											<td align=center bgcolor=#000000 style='border: 1px solid white;'><font color=\"#FFFFFF\" size=\"2\">  $sts</font> </td>
											<td width=150 align=center $bgcolor ><font color='#FFFFFF' > $aqms </td></tr>"; 
									}	
								}
								$tbl.="</table>";
							?>
								<table width="100%" border="0" class="bodyline" style="border: 1px solid white;">
									<tr>
										<td bordercolor="#60729B" align="" style="">
											<div ><?php echo $tbl; ?></div>
										</td>
									</tr>
								</table>
		</section>
	</div>
<?php
}
}

?>
</div>
</form>



</section>


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

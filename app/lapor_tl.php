
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
		<form name="form1" method="post" action="lapor_tl.php">
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

											<!--div class="form-group">
												<br/>
											</div-->
											<div class="form-group">
												<input type="text" class="form-control" name="u_segment" value="Segment : <?php echo $_SESSION["jabatan"];?> " readonly="true">
											</div>
											
											<div class="form-group">
												<select  class="chosen-select" name="area_cbo" class="form-control" onChange="document.form1.submit()">
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
											<div class="form-group">
												<select class="chosen-select" name="pilih_cbo" class="form-control" onChange="">
													<option value=" ">-- Pilih Agent --</option>
													<?php
													$pkatt = mysqli_query($conn, "SELECT b.user1,b.user2,b.user3,b.user7,a.nama_tl FROM cc147_main_users as a, cc147_main_users_extended as b WHERE a.username=b.user1 and b.user3='Agent TAM' and b.user7='$area_cbo'  and qco = '$login'");
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
													<a href="lapor_tl.php" class="btn btn-primary">Reset Cari</a>
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

} else if($x_tgl_bina == "2020-07"){
	?>					
	<div class="col-md-12" >
		<section class="panel">
			<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">									
				<h3>FORM PENGUJIAN CALL (TAPPING) AGENT</h3>
									<!-- <span style="float: right;display: inline; padding: 0 10px; font-size: 16px;background: #695a70;">
										<a href="index.php?wapo_key=y9Wd2DQefemDd2yC%252FidJkkbo8HwQRbnrSK9lnhrPY4k%253D'" class="btn btn-xs btn-danger">Kembali Dashboard</a>
									</span>	-->								
								</div>
								<?php	
// if (isset ($enter))		// ================================== enter ==========================================
// {

								$agent_id=$pilih_cbo;
    //$sheet='spv';
								$bulan=$x_tgl_bina;
//if ($mons<=9){ $mon="0$mons"; } else { $mon="$mons"; }
//$bulan="$years-$mon";

								$cek ="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id' ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." order by tanggal asc";
								$qcek=mysqli_query($conn, $cek);
								$r_cek=mysqli_num_rows($qcek);
//echo "$cek";
								if ($r_cek<=0)
									{	echo  "Data tanggal Tidak Ada"; } 
								?>
								<table width="100%" border="0" cellpadding="4" cellspacing="3" class="bodyline">	
									<tr>
										<?php
										$sqle= "SELECT
										cc147_main_users_extended.user_id,
										cc147_main_users_extended.user1,
										cc147_main_users_extended.user2,
										cc147_main_users_extended.user3,
										cc147_main_users_extended.user7
										FROM
										cc147_main_users_extended where user1='$agent_id'";
										$qq=mysqli_query($conn,$sqle);
										$rr=mysqli_fetch_row($qq);
//echo "$rr[1]"; 

										$blnskrng=date("M");
//$muni=mun($mons);
										?>

										<td bordercolor="#60729B" style=""><font style="font-size:15px" face="Verdana" color="#000000">



											<br>Nama Agent / LOGIN&nbsp;: <b><?php echo $rr[2] ?> / <?php echo $rr[1] ?></b>
											<br>Lokasi Layanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $rr[4] ?></b>
											<br>Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $bulan ?></b>
											<br>Layanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $rr[3] ?></b>
											<br>LAYANAN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>CC TELKOM TAM</b>	

										</font></td>

									</tr>	
								</table>
								<?php

								$bgcolor = "bgcolor=#808080";
								$bgcolor2 = "bgcolor=#f3f3f3";
								$bgcolor3="bgcolor=#ed1c1c";
								$bgcolor4 = "bgcolor=#aaa5a5";
								$bgcolor5 = "bgcolor=#666161";

								$sql="SELECT
								app_kinerja_nilai.tanggal,
								app_kinerja_nilai.user_id,
								app_kinerja_nilai.kategori,
								app_kinerja_nilai.recordid,
								app_kinerja_nilai.tglrecord,
								app_kinerja_nilai.durasi,
								app_kinerja_nilai.upd,
								app_kinerja_rekp_nilai.proses,
								app_kinerja_rekp_nilai.sikap,
								app_kinerja_rekp_nilai.solusi,
								app_kinerja_rekp_nilai.total,
								app_kinerja_nilai.rekomendasi,
								app_kinerja_nilai.sheet,
								app_kinerja_rekp_nilai.jabatan
								FROM
								app_kinerja_nilai
								Inner Join app_kinerja_rekp_nilai ON app_kinerja_nilai.tanggal = app_kinerja_rekp_nilai.tanggal AND app_kinerja_nilai.user_id = app_kinerja_rekp_nilai.user_id AND app_kinerja_nilai.sheet = app_kinerja_rekp_nilai.dinilai
								WHERE
								substring(app_kinerja_nilai.tanggal,1,7) =  '$bulan' AND
								app_kinerja_nilai.user_id =  '$agent_id' AND tanggal between '2020-07-01' AND '2020-07-29'
								ORDER BY
								app_kinerja_nilai.tanggal ASC
								";
//echo "$sql";
								$sql1="SELECT tanggal,layanan,record_id,tgl_record,jam,durasi,customer_needs,service_technique,QM,rekomendasi FROM `app_kinerja_tab` where user_id='$agent_id' and `tanggal` LIKE '%$bulan%'  AND tanggal between '2020-07-01' AND '2020-07-29' ORDER BY tanggal asc";
//echo "$sql1";
								$sqlc="SELECT masalah,tglrecord FROM app_kinerja_nilai where user_id='$agent_id' and `tanggal` LIKE '%$bulan%'  AND tanggal between '2020-07-01' AND '2020-07-29' ORDER BY tanggal asc";
//echo "$sqlc";

// $sql3="SELECT app_kinerja_tab.tanggal,app_kinerja_tab.record_id,app_kinerja_tab.tgl_record,app_kinerja_nilai.tglrecord,app_kinerja_tab.durasi,app_kinerja_tab.customer_needs,app_kinerja_tab.service_technique,app_kinerja_tab.QM,app_kinerja_tab.rekomendasi FROM app_kinerja_tab Inner Join app_kinerja_nilai on app_kinerja_nilai.user_id = app_kinerja_tab.user_id and app_kinerja_nilai.tanggal = app_kinerja_tab.tanggal where app_kinerja_tab.user_id='$agent_id' and app_kinerja_nilai.tanggal LIKE '%$bulan%' ORDER BY tanggal asc";
								$sql3="SELECT tanggal,ani,tglrecord,durasi,proses_layanan,sikap_layanan,solusi_layanan,no_cp,jenis_call,kategori_call,param_tapping_proses,param_tapping_sikap,param_tapping_solusi FROM app_kinerja_nilai WHERE user_id='$agent_id' AND tanggal LIKE  '%$bulan%' AND tanggal between '2020-07-01' AND '2020-07-29' ORDER BY tanggal asc";
//echo "$sql3";
//die();
								$query=mysqli_query($conn,$sql3);
// $queryc=mysql_query($sqlc);
// $rowc=mysql_fetch_row($queryc);
// $tt=substr($rowc[1], 10,18);

								$tbl="<table border=0 width=95% height=80 style='border: 1px solid white;'>";
								$tbl.="<tr><td width=80 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Tanggal </td>
								<td width=50 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Sample </td>

								<td width=80 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > fastel </td>
								<td width=80 align=center $bgcolor  style='border: 1px solid white;'><font color='#FFFFFF' > Tgl Record </td>


								<td width=120 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Durasi </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > NO CP </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Jenis Call </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Kategori Call </td>

								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Proses Layanan </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Sikap Layanan </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Solusi Layanan </td>
								<td width=40 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > QM </td>
								<td width=150 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Paramater Proses layanan </td>
								<td width=150 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Paramater Sikap layanan </td>
								<td width=150 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Paramater Solusi layanan </td>
								</tr>"; 
								$i=1;
								$total_data=0;
								$n=0;
								while($row=mysqli_fetch_row($query))
								{
									$n++;
									$total_data++;
//echo "147";
									$tt=$row[4]+$row[5]+$row[6];
									$tbl.="<tr><td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[0]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >#$i</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[1]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[2]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[3]</td>

									<td align=center $bgcolor5 style='border: 1px solid white;'><font color='#000000' >$row[7]</td>
									<td align=center $bgcolor3 style='border: 1px solid white;'><font color='#000000' >$row[8]</td>
									<td align=center $bgcolor3 style='border: 1px solid white;'><font color='#000000' >$row[9]</td>

									<td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$row[4]</td>
									<td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$row[5]</td>
									<td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$row[6]</td>
									<td align=center $bgcolor5 style='border: 1px solid white;'><font color='#000000' >$tt</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[10]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[11]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[12]</td>


									</tr>";	
									$sta += $tt;
		// $asts=$sta/24;			
									$asts=(($sta/10)/$n)*10;
									$sts = number_format($asts,2,",",".");

									$i++;
// var_dump($tt);

								}
								if($sts>=90){$aqms="EXCELENT";}
								else if($sts>=80){$aqms="NEED IMPROVEMENT";}
								else if($sts<80){$aqms="COACHING ALERT";}

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
								$tbl.="</table>";

								?>
								<?php 
    // $agent_id=72202;
    // //$sheet='spv';
    // $bulan='2018-11';	
								$sql ="SELECT
								cc147_main_users.user_id,
								cc147_main_users.name,
								cc147_main_users.username,
								cc147_main_users_extended.user3
								FROM
								cc147_main_users_extended
								Inner Join cc147_main_users ON cc147_main_users_extended.user_id = cc147_main_users.user_id 
								where cc147_main_users.user_id=$agent_id and cc147_main_users.qco = $login"; 
								$query=mysqli_query($conn, $sql);
								$rowagent=mysqli_fetch_row($query); 
								$j_agent=$rowagent[3];


								?>
								<table width="100%" border="0" class="bodyline" style="border: 1px solid white;">
									<tr>
										<td bordercolor="#60729B" align="" style="">
											<div ><?php echo $tbl; ?></div>
											<table  width="100%"  style="border-collapse: collapse;box-sizing: border-box; border: 1px solid white;" class="bodyline">

												<?php
												$sqlcount="select tanggal from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id'  ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")."";
												$qcount=mysqli_query($conn,$sqlcount);
												$n=0;
												$total_data=0;
												$jml=0;
												while ($rcount=mysqli_fetch_row($qcount)){
													$n++;
													if ($j_agent=='Agent TAM'){
														if (($n % 2 == 1) || ($n <=3) ) {
															$total_data++;
															if ($total_data<= 10) {
																$jml++;

															}
														}
													}else{
														$jml++;
													}
												}
//count tanggal dalam 1 bulan
//$sqlcount="select count(*) as jml from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id' and sheet='$sheet'";
//$count=mysql_fetch_assoc(mysql_query($sqlcount));
//$jml=$count[jml];
//$jml=1;
												?>
												<br><br>
												<tr>
													<td rowspan="2" width="2%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> No </font> </b></td>
													<td rowspan="2" width="40%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> Parameter </b></font>
														<td rowspan="2" width="5%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> Bobot </b></font>
															<td colspan="<?php echo $jml?>" width="10%" align="center" bgcolor="#808080"style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b>  Nilai </b></font>
																<td rowspan="2" width="5%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> Rata rata </b></font>
																	<td rowspan="2" width="5%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> Keterangan </b></font>
																	</tr>
																	<tr>
																		<?php

//echo "$jml";
																		$i=1;
while($i<=$jml) //=========judul nilai per hari dalam sebulan ===================/
{
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#808080\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\" > $i </font></td>";
	$i++;
}
echo  "</tr>";


//========== query point kategori =========//
$sqlpoin="select * from app_kinerja_poin where aktif ='1'";
//echo $sqlpoin;
$qpoin=mysqli_query($conn, $sqlpoin);
$nom=1;
$p=1;
while ($rowpoin=mysqli_fetch_row($qpoin))
{
	
	$clspan=4+$jml+1;
	echo "<tr>
	<td colspan=\"$clspan\" bgcolor=\"#FFFFFF\" align=\"left\"><font color=\"#000000\" size=\"2\" style=\"border: 1px solid white;\"><b>$rowpoin[1] </b></font></td>
	</tr>";
	$jmlbot=0;

	//========= query  kategori ====================//
	$sqlkat="select * from app_kinerja_kategori where id_poin='$rowpoin[0]' and jabatan='Agent TAM' and status='1'";
	//echo "$sqlkat<br>";
	$qkat=mysqli_query($conn,$sqlkat);
	while ($rowkat=mysqli_fetch_row($qkat))
	{
		if($nom==5){
			?>
			<tr>

				<td align="left" bgcolor="#dde6ff" style="border: 1px solid white;"> <?php echo "$nom."; ?></td>
				<td align="left" bgcolor="#dde6ff" style="border: 1px solid white;"> <?php echo "KONFIRMASI PREFERENCE CHANNEL"; ?></td>
				<td align="center" bgcolor="#dde6ff" style="border: 1px solid white;"><?php echo "$rowkat[3] ";?></td>

				<?php 

				$val_kat="$rowkat[0]";
				$botkat="$rowkat[3]";

		//============= query 'NILAI' per kategori dalam sebulan=================//
				$npk="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id' ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." order by tanggal asc";
		//echo "$npk";
				$q_npk=mysqli_query($conn,$npk);
				$tot="0";
				$i=1;
				$total_data=0;
				$n=0;
				while($row_npk=mysqli_fetch_row($q_npk))
				{
					$n++;
					if ($j_agent=='Agent TAM'){
						if (($n % 2 == 1) || ($n <=3) ) {
							$total_data++;
							if ($total_data<= 10) {
								$arr_kat = explode("|",$row_npk[3]);
								$arr_valkat = explode("|",$row_npk[2]);


								$for="";
								$no=0;
								foreach($arr_kat as $for)
								{		
				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
									if ($for==$val_kat)
									{  
					//echo "<td align=\"center\" bgcolor=\"#dde6ff\">$val_kat( $for)=$arr_value[$no]</td>";  }
										if ($arr_valkat[$no]=="-") { $arr_valkat[$no]="";}

										echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valkat[$no]</td>";  

										if ($arr_valkat[$no]<>"-")
										{
											$tot=$tot+$arr_valkat[$no]; $nilai=$arr_valkat[$no]; 

										}
										$nilkat[$i][$no]=$arr_valkat[$no]*$botkat;	
					$n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$no]; // ==========jml  nilai poin kategori per tanggal ========/
					
				}
				$no++;
			}

			$i++;	
			
		}
	}
}else{
	$arr_kat = explode("|",$row_npk[3]);
	$arr_valkat = explode("|",$row_npk[2]);
	$for="";$no=0;
	
	foreach($arr_kat as $for)
	{		
				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
		if ($for=="$val_kat")
		{  
					//echo "<td align=\"center\" bgcolor=\"#dde6ff\">$val_kat( $for)=$arr_value[$no]</td>";  }
			if ($arr_valkat[$no]=="-") { $arr_valkat[$no]="";}
			echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valkat[$no]</td>";  
			if ($arr_valkat[$no]<>"-")
			{
						//$tot=$tot+$arr_valkat[$no]; 
						//$nilai=$arr_valkat[$no]; 

			}
					// $nilkat[$i][$no]=$arr_valkat[$no]*$botkat;	
					// $n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$no]; // ==========jml  nilai poin kategori per tanggal ========/


		}
		$no++;
	}

	$i++;	
}



}
		//========== nilai rata2 kategori ============//
		// $rata2kat=((($botkat/100)*$tot)/$jml)*100;
		// $rata2=round($rata2kat,2);
		// $ratkat=round($rata2kat,2);
		// $rata2kat=0;
		// //$sumrata2kat=$sumrata2kat+$ratkat; //======sum rata2 kategori ===========//
		// $sumrata2kat=$tot/16;
		// if ($rata2==0) {$rata2="";}
		//$rata2=1;
echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  
echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  

?>

</tr>
<?php
}
else{
	?>
	<tr>

		<td align="left" bgcolor="#dde6ff" style="border: 1px solid white;"> <?php echo "$nom."; ?></td>
		<td align="left" bgcolor="#dde6ff" style="border: 1px solid white;"> <?php echo "$rowkat[2] "; ?></td>
		<td align="center" bgcolor="#dde6ff" style="border: 1px solid white;"><?php echo "$rowkat[3] ";?></td>

		<?php 

		$val_kat="$rowkat[0];-";
		$botkat="$rowkat[3]";

		//============= query 'NILAI' per kategori dalam sebulan=================//
		$npk="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id' AND tanggal between '2020-07-01' AND '2020-07-29' order by tanggal asc";
		//echo "$npk";
		$q_npk=mysqli_query($conn,$npk);
		$tot="0";
		$i=1;
		$total_data=0;
		$n=0;
		while($row_npk=mysqli_fetch_row($q_npk))
		{
			$n++;
			if ($j_agent=='Agent TAM'){
				if (($n % 2 == 1) || ($n <=3) ) {
					$total_data++;
					if ($total_data<= 10) {
						$arr_kat = explode("|",$row_npk[3]);
						$arr_valkat = explode("|",$row_npk[2]);


						$for="";
						$no=0;
						foreach($arr_kat as $for)
						{		
				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
							if ($for==$val_kat)
							{  
					//echo "<td align=\"center\" bgcolor=\"#dde6ff\">$val_kat( $for)=$arr_value[$no]</td>";  }
								if ($arr_valkat[$no]=="-") { $arr_valkat[$no]="";}

								echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valkat[$no]</td>";  

								if ($arr_valkat[$no]<>"-")
								{
									$tot=$tot+$arr_valkat[$no]; $nilai=$arr_valkat[$no]; 

								}
								$nilkat[$i][$no]=$arr_valkat[$no]*$botkat;	
					$n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$no]; // ==========jml  nilai poin kategori per tanggal ========/
					
				}
				$no++;
			}

			$i++;	
			
		}
	}
}else{
	$arr_kat = explode("|",$row_npk[3]);
	$arr_valkat = explode("|",$row_npk[2]);
	$for="";$no=0;

	foreach($arr_kat as $for)
	{		

				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
		if ($for=="$val_kat")
		{  			//echo "<td align=\"center\" bgcolor=\"#dde6ff\">$val_kat( $for)=$arr_value[$no]</td>";  }
	if ($arr_valkat[$no]=="-") { $arr_valkat[$no]="";}
	// print_r($arr_valkat[$no]);
	echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valkat[$no]</td>";  
	if ($arr_valkat[$no]<>"-")
	{
						//$tot=$tot+$arr_valkat[$no]; 
						//$nilai=$arr_valkat[$no]; 

	}
					// $nilkat[$i][$no]=$arr_valkat[$no]*$botkat;	
					// $n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$no]; // ==========jml  nilai poin kategori per tanggal ========/


}
$no++;
}

$i++;	
}



}
		//========== nilai rata2 kategori ============//
		// $rata2kat=((($botkat/100)*$tot)/$jml)*100;
		// $rata2=round($rata2kat,2);
		// $ratkat=round($rata2kat,2);
		// $rata2kat=0;
		// //$sumrata2kat=$sumrata2kat+$ratkat; //======sum rata2 kategori ===========//
		// $sumrata2kat=$tot/16;
		// if ($rata2==0) {$rata2="";}
		//$rata2=1;
echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  
echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  

?>

</tr>
<?php
}

if($nom==5) {

	$nom++;
		//=========== query Item =================//
	$sqlitem="select * from app_kinerja_item where id_kat='$rowkat[0]' and jabatan='Agent TAM' and status='1'";
	//echo "$sqlkat<br>";
	$qitem=mysqli_query($conn, $sqlitem);
	$abjad=array('A','B','C','D','E','F');
	$list=0;

	while ($rowitem=mysqli_fetch_row($qitem))
	{
		$botitem=7;
		if ($rowitem[3]<>"")
		{
			?>
			<tr>
				<td bgcolor="#dde6ff" align="left"></td>
				<td bgcolor="#dde6ff" align="left" style="border: 1px solid white;"><?php echo "A."; ?> &nbsp;  <?php echo "Agent melakukan konfirmasi preference channel yang sesuai dengan kebutuhan pelanggan"; ?></td>
				<td bgcolor="#dde6ff" align="center" style="border: 1px solid white;"><?php echo "7";?></td>
				<?php 
	// ============= query "NILAI" per item dalam Sebulan ==================//
				$id_kat=$rowkat[0].";".$rowitem[1];						
				$npi="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id' AND tanggal between '2020-07-01' AND '2020-07-29' order by tanggal asc";
		//echo "$npi";
				$q_npi=mysqli_query($conn, $npi);
				$tot=0;$i=1;
				$total_data=0;
				$n=0;
				while($row_npi=mysqli_fetch_row($q_npi))
				{
					$n++;
					if ($j_agent=='Agent TAM'){
						if (($n % 2 == 1) || ($n <=3) ) {
							$total_data++;
							if ($total_data<= 10) {
								$arr_item = explode("|",$row_npi[3]);
								$arr_valitem = explode("|",$row_npi[2]);
								$for="";$no=0;
								foreach($arr_kat as $for)
								{	
				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
									if ($for=="$id_kat")
									{  
				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">( $for)=$arr_value[$no]</td>";  }
										echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valitem[$no]</td>";  
				$tot=$tot+"$arr_valitem[$no]";  //
				
				$nilitem[$i][$no]=$arr_valitem[$no]*$botitem;
				$n_tmbitem[$i]=$n_tmbitem[$i]+$nilitem[$i][$no]; // ==========jml nilai poin item per tanggal ========/
			}
			$no++;
		}

		
		$i++;
	}
}
}else{
	$arr_item = explode("|",$row_npi[3]);
	$arr_valitem = explode("|",$row_npi[2]);
	$for="";$no=0;
	foreach($arr_kat as $for)
	{	
				// echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
		if ($for=="$id_kat")
		{  
				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">( $for)=$arr_value[$no]</td>";  }
			echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valitem[$no]</td>";  
				$tot=$tot+"$arr_valitem[$no]";  //
				$nilitem[$i][$no]=$arr_valitem[$no];
				$n_tmbitem[$i]=$n_tmbitem[$i]+$nilitem[$i][$no]; // ==========jml nilai poin item per tanggal ========/
			}
			$no++;
		}


		
		$i++;
	} 



}
		//=========== nilai rata2 item ===========
$rata2item=((($botitem/100)*$tot)/$jml)*100;
$rata2=round($rata2item,2);
$ratitem=round($rata2item,2);
$rata2item=0;
		$sumrata2item=$sumrata2item+$ratitem; //====== sum rata2 item===========//
		$sumrata2kat=$tot/10;
		if ($rata2==0){$rata2="";}
		//$rata2=30;
		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  
		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>"; 
		
		?>		
	</tr>
	<?php
}	
$list++;
$tmbitem=$tmbitem+$botitem;


}

?>
<tr>

	<td align="left" bgcolor="#dde6ff" style="border: 1px solid white;"> <?php echo "$nom."; ?></td>
	<td align="left" bgcolor="#dde6ff" style="border: 1px solid white;"> <?php echo "$rowkat[2] "; ?></td>
	<td align="center" bgcolor="#dde6ff" style="border: 1px solid white;"><?php echo "$rowkat[3] ";?></td>

	<?php 

	$val_kat="$rowkat[0];-";
	$botkat="$rowkat[3]";
		//============= query 'NILAI' per kategori dalam sebulan=================//
	$npk="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id'  ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." order by tanggal asc";
		//echo "$npk";
	$q_npk=mysqli_query($conn,$npk);
	$tot="0";
	$i=1;
	$total_data=0;
	$n=0;
	while($row_npk=mysqli_fetch_row($q_npk))
	{
		$n++;
		if ($j_agent=='Agent TAM'){
			if (($n % 2 == 1) || ($n <=3) ) {
				$total_data++;
				if ($total_data<= 10) {
					$arr_kat = explode("|",$row_npk[3]);
					$arr_valkat = explode("|",$row_npk[2]);


					$for="";
					$no=0;
					foreach($arr_kat as $for)
					{		
				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
						if ($for==$val_kat)
						{  
					//echo "<td align=\"center\" bgcolor=\"#dde6ff\">$val_kat( $for)=$arr_value[$no]</td>";  }
							if ($arr_valkat[$no]=="-") { $arr_valkat[$no]="";}

							echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valkat[$no]</td>";  

							if ($arr_valkat[$no]<>"-")
							{
								$tot=$tot+$arr_valkat[$no]; $nilai=$arr_valkat[$no]; 

							}
							$nilkat[$i][$no]=$arr_valkat[$no]*$botkat;	
					$n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$no]; // ==========jml  nilai poin kategori per tanggal ========/
					
				}
				$no++;
			}

			$i++;	
			
		}
	}
}else{
	$arr_kat = explode("|",$row_npk[3]);
	$arr_valkat = explode("|",$row_npk[2]);
	$for="";$no=0;

	// print_r($row_npk[3]);
	foreach($arr_kat as $for)
	{		
		//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
		if ($for=="$val_kat")
		{  
			// print_r($arr_valkat[$no]);
					//echo "<td align=\"center\" bgcolor=\"#dde6ff\">$val_kat( $for)=$arr_value[$no]</td>";  }
			if ($arr_valkat[$no]=="-") { $arr_valkat[$no]="";}
			echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valkat[$no]</td>";  
			if ($arr_valkat[$no]<>"-")
			{
						//$tot=$tot+$arr_valkat[$no]; 
						//$nilai=$arr_valkat[$no]; 

			}
					// $nilkat[$i][$no]=$arr_valkat[$no]*$botkat;	
					// $n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$no]; // ==========jml  nilai poin kategori per tanggal ========/


		}
		$no++;
	}

	$i++;	
}



}
		//========== nilai rata2 kategori ============//
		// $rata2kat=((($botkat/100)*$tot)/$jml)*100;
		// $rata2=round($rata2kat,2);
		// $ratkat=round($rata2kat,2);
		// $rata2kat=0;
		// //$sumrata2kat=$sumrata2kat+$ratkat; //======sum rata2 kategori ===========//
		// $sumrata2kat=$tot/16;
		// if ($rata2==0) {$rata2="";}
		//$rata2=1;
echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  
echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  

?>

</tr>
<?php
		//=========== query Item =================//
$sqlitem="select * from app_kinerja_item where id_kat='$rowkat[0]' and jabatan='Agent TAM' and status='1'";
	//echo "$sqlkat<br>";
$qitem=mysqli_query($conn, $sqlitem);
$abjad=array('A','B','C','D','E','F');
$list=0;

while ($rowitem=mysqli_fetch_row($qitem))
{	
	$botitem=$rowitem[3];
	if ($rowitem[3]<>"")
	{
		?>
		<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td bgcolor="#dde6ff" align="left" style="border: 1px solid white;"><?php echo "$abjad[$list]."; ?> &nbsp;  <?php echo "$rowitem[2]"; ?></td>
			<td bgcolor="#dde6ff" align="center" style="border: 1px solid white;"><?php echo "$rowitem[3]";?></td>
			<?php 
	// ============= query "NILAI" per item dalam Sebulan ==================//
			$id_kat='6;1';				
			$npi="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id' AND tanggal between '2020-07-01' AND '2020-07-29' order by tanggal asc";
		//echo "$npi";
			$q_npi=mysqli_query($conn, $npi);
			$tot=0;$i=1;
			$total_data=0;
			$n=0;
			while($row_npi=mysqli_fetch_row($q_npi))
			{
				$n++;
				if ($j_agent=='Agent TAM'){
					if (($n % 2 == 1) || ($n <=3) ) {
						$total_data++;
						if ($total_data<= 10) {
							$arr_item = explode("|",$row_npi[3]);
							$arr_valitem = explode("|",$row_npi[2]);
							$for="";$no=0;
							foreach($arr_kat as $for)
							{	
				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
								if ($for=="$id_kat")
								{  
				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">( $for)=$arr_value[$no]</td>";  }
									echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valitem[$no]</td>";  
				$tot=$tot+"$arr_valitem[$no]";  //
				
				$nilitem[$i][$no]=$arr_valitem[$no]*$botitem;
				$n_tmbitem[$i]=$n_tmbitem[$i]+$nilitem[$i][$no]; // ==========jml nilai poin item per tanggal ========/
			}
			$no++;
		}

		
		$i++;
	}
}
}else{
	$arr_item = explode("|",$row_npi[3]);
	$arr_valitem = explode("|",$row_npi[2]);

	$for="";$no=0;
	foreach($arr_kat as $for)
	{	
				// echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
		if ($for=="$id_kat")
		{  
				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">( $for)=$arr_value[$no]</td>";  }
			echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valitem[$no]</td>";  
				$tot=$tot+"$arr_valitem[$no]";  //
				$nilitem[$i][$no]=$arr_valitem[$no];
				$n_tmbitem[$i]=$n_tmbitem[$i]+$nilitem[$i][$no]; // ==========jml nilai poin item per tanggal ========/
			}
			$no++;
		}


		
		$i++;
	} 



}
		//=========== nilai rata2 item ===========
$rata2item=((($botitem/100)*$tot)/$jml)*100;
$rata2=round($rata2item,2);
$ratitem=round($rata2item,2);
$rata2item=0;
		$sumrata2item=$sumrata2item+$ratitem; //====== sum rata2 item===========//
		$sumrata2kat=$tot/10;
		if ($rata2==0){$rata2="";}
		//$rata2=30;
		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  
		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>"; 
		
		?>		
	</tr>
	<?php
}	
$list++;
$tmbitem=$tmbitem+$botitem;


}




}
else {

//=========== query Item =================//
	$sqlitem="select * from app_kinerja_item where id_kat='$rowkat[0]' and jabatan='Agent TAM' and status='1'";
	//echo "$sqlkat<br>";
	$qitem=mysqli_query($conn, $sqlitem);
	$abjad=array('A','B','C','D','E','F');
	$list=0;
	$no_bobot=0;
	while ($rowitem=mysqli_fetch_row($qitem))
	{
		if($rowitem[3]==7 AND $no_bobot==1){
			$rowitem[3]=6;
		}
		else if($rowitem[3]==7 AND $no_bobot==2){
			$rowitem[3]=5;
		}
		else if($rowitem[3]==12){
			$rowitem[3]=10;
		}
		$botitem=$rowitem[3];
		if ($rowitem[3]<>"")
		{
			?>
			<tr>
				<td bgcolor="#dde6ff" align="left"></td>
				<td bgcolor="#dde6ff" align="left" style="border: 1px solid white;"><?php echo "$abjad[$list]."; ?> &nbsp;  <?php echo "$rowitem[2]"; ?></td>
				<td bgcolor="#dde6ff" align="center" style="border: 1px solid white;"><?php echo "$rowitem[3]";?></td>
				<?php 
	// ============= query "NILAI" per item dalam Sebulan ==================//

				if($rowkat[0]==6){

					$rowkat[0]=7;
				}else{
					$id_kat=$rowkat[0].";".$rowitem[1];	

				}	
				if($id_kat == '6;1'){
					$id_kat='7;1';	
				}	


				$npi="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id' AND tanggal between '2020-07-01' AND '2020-07-29' order by tanggal asc";
		//echo "$npi";
				$q_npi=mysqli_query($conn, $npi);
				$tot=0;$i=1;
				$total_data=0;
				$n=0;

				while($row_npi=mysqli_fetch_row($q_npi))
				{
					$n++;
					if ($j_agent=='Agent TAM'){
						if (($n % 2 == 1) || ($n <=3) ) {
							$total_data++;
							if ($total_data<= 10) {
								$arr_item = explode("|",$row_npi[3]);
								$arr_valitem = explode("|",$row_npi[2]);
								$for="";$no=0;
								foreach($arr_kat as $for)
								{	


				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
									if ($for=="$id_kat")
									{  
				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">( $for)=$arr_value[$no]</td>";  }
										echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valitem[$no]</td>";  
				$tot=$tot+"$arr_valitem[$no]";  //
				
				$nilitem[$i][$no]=$arr_valitem[$no]*$botitem;
				$n_tmbitem[$i]=$n_tmbitem[$i]+$nilitem[$i][$no]; // ==========jml nilai poin item per tanggal ========/
			}
			$no++;
		}

		
		$i++;
	}
}
}else{
	$arr_item = explode("|",$row_npi[3]);
	$arr_valitem = explode("|",$row_npi[2]);

	$for="";$no=0;
	foreach($arr_kat as $for)
	{	
				// echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
		if ($for=="$id_kat")
		{  
				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">( $for)=$arr_value[$no]</td>";  }
			echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valitem[$no]</td>";  
				$tot=$tot+"$arr_valitem[$no]";  //
				$nilitem[$i][$no]=$arr_valitem[$no];
				$n_tmbitem[$i]=$n_tmbitem[$i]+$nilitem[$i][$no]; // ==========jml nilai poin item per tanggal ========/
			}
			$no++;
		}


		
		$i++;
	} 



}
		//=========== nilai rata2 item ===========
$rata2item=((($botitem/100)*$tot)/$jml)*100;
$rata2=round($rata2item,2);
$ratitem=round($rata2item,2);
$rata2item=0;
		$sumrata2item=$sumrata2item+$ratitem; //====== sum rata2 item===========//
		$sumrata2kat=$tot/10;
		if ($rata2==0){$rata2="";}
		//$rata2=30;
		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  
		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>"; 
		
		?>		
	</tr>
	<?php
}	
$list++;
$tmbitem=$tmbitem+$botitem;
$no_bobot++;
}

}
$tmbkat=$tmbkat+$botkat;	
$nom++;

	}  //==================== kategori ===================//
	
	$jmlbot=$tmbitem+$tmbkat; //========= juml bobot ===========//
	//echo '$tmbkat';

	
	$tmbitem=0;
	$tmbkat=0;
	//$jmlbot=0;
	//================ total per poin ====================//
	
	echo "<tr>
	<td colspan=\"2\" bgcolor=\"#FF1000\" align=\"center\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"><b>TOTAL $rowpoin[1] </b></font></td>
	<td bgcolor=\"#FF1000\" align=\"center\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\" ><b>$jmlbot</b></font></td>";


	
	$i=1;

	while($i<=$jml) //=========Total nilai POIN per tanggal dalam sebulan ===================/
	{
		$n_tot[$p][$i]=$n_tmbkat[$i]+$n_tmbitem[$i]; // total nilai per poin
		$echo= $n_tot[$p][$i];
		$tt =$echo;
		//$tt +=$echo;

		echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#FF1000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $echo</font></td>";
		$totnilai[$i]=$totnilai[$i]+$n_tot[$p][$i];
		$n_tmbkat[$i]=0;
		$jmlrata += $echo;
		$jmlrata2 += $n_tot[2][$i];
		$n_tmbitem[$i]=0;
		$i++;		
	}

	$pjmlrata=number_format(round(($jmlrata)/$jml,2),2,",",".");
	$pjmlrata2=number_format(round(($jmlrata2)/$jml,2),2,",",".");

	//echo "$tt";
	 // echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#FF1000\"><font color=\"#FFFFFF\" size=\"2\"> $jmlrata2</font></td>";
	if($jmlbot == 80){
		echo "<td  width=\"2%\" align=\"center\" bgcolor=\"##FF1000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $pjmlrata</font></td>";
	}
	else{
		echo "<td  width=\"2%\" align=\"center\" bgcolor=\"##FF1000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $pjmlrata2</font></td>";
	}
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#FF1000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"></font></td>";
	echo  "</tr>";	
	$sumrata2item=0;$sumrata2kat=0;$tt=0;
//==================== total NILAI ======================================//

	
	$qms=$qms+$jmlrata2; 
	$totbot=$totbot+$jmlbot;	
	//echo "$qms";
	$p++;
	}  //========== Tutup point kategori ===============//
	
	
//=============================== QM Score ===========================================//
	echo "<td  colspan=\"2\" width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"><b> QUALITY MONITORING SCORE </b></font></td>";
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $totbot </font></td>";
	
	$i=1;	
	while($i<=$jml) //
	{
		
		echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $totnilai[$i] </font></td>";
		$tq +="$totnilai[$i]";
		$i++;		
	}
	// $abqms=($tq)/24;
	$abqms=(($tq/10)/$jml)*10;
	$bqms = number_format($abqms,2,",",".");

//echo "$tq";
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $bqms </font></td>";
	if($bqms>=90){$tqms="EXCELENT";}
	else if($bqms>=80){$tqms="NEED IMPROVEMENT";}
	else if($bqms<80){$tqms="COACHING ALERT";}
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> <b>$tqms</b> </font></td>";
	

	?>
</tr>
<?php

}
else{
	?>					
	<div class="col-md-12" >
		<section class="panel">
			<div class="revenue-head" style="background: #695a70;-webkit-border-radius: 4px 4px 0px 0px;border-radius: 4px 4px 0px 0px;  color: #fff;line-height: 50px;">									
				<h3>FORM PENGUJIAN CALL (TAPPING) AGENT</h3>
									<!-- <span style="float: right;display: inline; padding: 0 10px; font-size: 16px;background: #695a70;">
										<a href="index.php?wapo_key=y9Wd2DQefemDd2yC%252FidJkkbo8HwQRbnrSK9lnhrPY4k%253D'" class="btn btn-xs btn-danger">Kembali Dashboard</a>
									</span>	-->								
								</div>
								<?php	
// if (isset ($enter))		// ================================== enter ==========================================
// {

								$agent_id=$pilih_cbo;
    //$sheet='spv';
								$bulan=$x_tgl_bina;
//if ($mons<=9){ $mon="0$mons"; } else { $mon="$mons"; }
//$bulan="$years-$mon";

								$cek ="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id'  ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." order by tanggal asc";
								$qcek=mysqli_query($conn, $cek);
								$r_cek=mysqli_num_rows($qcek);
//echo "$cek";
								if ($r_cek<=0)
									{	echo  "Data tanggal Tidak Ada"; } 
								?>
								<table width="100%" border="0" cellpadding="4" cellspacing="3" class="bodyline">	
									<tr>
										<?php
										$sqle= "SELECT
										cc147_main_users_extended.user_id,
										cc147_main_users_extended.user1,
										cc147_main_users_extended.user2,
										cc147_main_users_extended.user3,
										cc147_main_users_extended.user7
										FROM
										cc147_main_users_extended where user1='$agent_id'";
										$qq=mysqli_query($conn,$sqle);
										$rr=mysqli_fetch_row($qq);
//echo "$rr[1]"; 

										$blnskrng=date("M");
//$muni=mun($mons);
										?>

										<td bordercolor="#60729B" style=""><font style="font-size:15px" face="Verdana" color="#000000">



											<br>Nama Agent / LOGIN&nbsp;: <b><?php echo $rr[2] ?> / <?php echo $rr[1] ?></b>
											<br>Lokasi Layanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $rr[4] ?></b>
											<br>Bulan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $bulan ?></b>
											<br>Layanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b><?php echo $rr[3] ?></b>
											<br>LAYANAN  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>CC TELKOM TAM</b>	

										</font></td>

									</tr>	
								</table>
								<?php

								$bgcolor = "bgcolor=#808080";
								$bgcolor2 = "bgcolor=#f3f3f3";
								$bgcolor3="bgcolor=#ed1c1c";
								$bgcolor4 = "bgcolor=#aaa5a5";
								$bgcolor5 = "bgcolor=#666161";

								$sql="SELECT
								app_kinerja_nilai.tanggal,
								app_kinerja_nilai.user_id,
								app_kinerja_nilai.kategori,
								app_kinerja_nilai.recordid,
								app_kinerja_nilai.tglrecord,
								app_kinerja_nilai.durasi,
								app_kinerja_nilai.upd,
								app_kinerja_rekp_nilai.proses,
								app_kinerja_rekp_nilai.sikap,
								app_kinerja_rekp_nilai.solusi,
								app_kinerja_rekp_nilai.total,
								app_kinerja_nilai.rekomendasi,
								app_kinerja_nilai.sheet,
								app_kinerja_rekp_nilai.jabatan
								FROM
								app_kinerja_nilai
								Inner Join app_kinerja_rekp_nilai ON app_kinerja_nilai.tanggal = app_kinerja_rekp_nilai.tanggal AND app_kinerja_nilai.user_id = app_kinerja_rekp_nilai.user_id AND app_kinerja_nilai.sheet = app_kinerja_rekp_nilai.dinilai
								WHERE
								substring(app_kinerja_nilai.tanggal,1,7) =  '$bulan' AND
								app_kinerja_nilai.user_id =  '$agent_id'
								ORDER BY
								app_kinerja_nilai.tanggal ASC
								";
//echo "$sql";
								$sql1="SELECT tanggal,layanan,record_id,tgl_record,jam,durasi,customer_needs,service_technique,QM,rekomendasi FROM `app_kinerja_tab` where user_id='$agent_id' and `tanggal` LIKE '%$bulan%' ORDER BY tanggal asc";
//echo "$sql1";
								$sqlc="SELECT masalah,tglrecord FROM app_kinerja_nilai where user_id='$agent_id'  ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." and `tanggal` LIKE '%$bulan%' ORDER BY tanggal asc";
//echo "$sqlc";

// $sql3="SELECT app_kinerja_tab.tanggal,app_kinerja_tab.record_id,app_kinerja_tab.tgl_record,app_kinerja_nilai.tglrecord,app_kinerja_tab.durasi,app_kinerja_tab.customer_needs,app_kinerja_tab.service_technique,app_kinerja_tab.QM,app_kinerja_tab.rekomendasi FROM app_kinerja_tab Inner Join app_kinerja_nilai on app_kinerja_nilai.user_id = app_kinerja_tab.user_id and app_kinerja_nilai.tanggal = app_kinerja_tab.tanggal where app_kinerja_tab.user_id='$agent_id' and app_kinerja_nilai.tanggal LIKE '%$bulan%' ORDER BY tanggal asc";
								$sql3="SELECT tanggal,ani,tglrecord,durasi,proses_layanan,sikap_layanan,solusi_layanan,no_cp,jenis_call,kategori_call,param_tapping_proses,param_tapping_sikap,param_tapping_solusi FROM app_kinerja_nilai WHERE user_id='$agent_id' AND tanggal LIKE  '%$bulan%'  ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." ORDER BY tanggal asc";
//echo "$sql3";
//die();
								$query=mysqli_query($conn,$sql3);
// $queryc=mysql_query($sqlc);
// $rowc=mysql_fetch_row($queryc);
// $tt=substr($rowc[1], 10,18);

								$tbl="<table border=0 width=95% height=80 style='border: 1px solid white;'>";
								$tbl.="<tr><td width=80 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Tanggal </td>
								<td width=50 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Sample </td>
								<td width=80 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > fastel </td>
								<td width=80 align=center $bgcolor  style='border: 1px solid white;'><font color='#FFFFFF' > Tgl Record </td>


								<td width=120 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Durasi </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > NO CP </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Jenis Call </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Kategori Call </td>

								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Proses Layanan </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Sikap Layanan </td>
								<td width=30 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Solusi Layanan </td>
								<td width=40 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > QM </td>
								<td width=150 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Paramater Proses layanan </td>
								<td width=150 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Paramater Sikap layanan </td>
								<td width=150 align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Paramater Solusi layanan </td>
								</tr>"; 
								$i=1;
								$total_data=0;
								$n=0;
								while($row=mysqli_fetch_row($query))
								{
									$n++;
									$total_data++;
									//echo "147";
									$tt=$row[4]+$row[5]+$row[6];
									$tbl.="<tr><td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[0]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >#$i</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[1]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[2]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[3]</td>

									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[7]</td>
									<td align=center $bgcolor3 style='border: 1px solid white;'><font color='#000000' >$row[8]</td>
									<td align=center $bgcolor3 style='border: 1px solid white;'><font color='#000000' >$row[9]</td>

									<td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$row[4]</td>
									<td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$row[5]</td>
									<td align=center $bgcolor4 style='border: 1px solid white;'><font color='#000000' >$row[6]</td>
									<td align=center $bgcolor5 style='border: 1px solid white;'><font color='#000000' >$tt</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[10]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[11]</td>
									<td align=center $bgcolor2 style='border: 1px solid white;'><font color='#000000' >$row[12]</td>


									</tr>";	
									$sta += $tt;
		// $asts=$sta/24;			
									$asts=(($sta/10)/$n)*10;
									$sts = number_format($asts,2,",",".");

									$i++;
// var_dump($tt);

								}
								if($sts>=90){$aqms="EXCELENT";}
								else if($sts>=80){$aqms="NEED IMPROVEMENT";}
								else if($sts<80){$aqms="COACHING ALERT";}

								$tbl.="<tr><td width=80 align=center $bgcolor > </td>
								<td width=50 align=center $bgcolor>  </td>
								<td width=50 align=center $bgcolor></td>
								<td width=80 align=center $bgcolor> </td>
								<td width=120 align=center $bgcolor></td>
								<td width=50 align=center $bgcolor>  </td>


								<td align=center $bgcolor> </td>
								<td align=center $bgcolor> </td>
								<td align=center $bgcolor> </td>
								<td align=center $bgcolor style='border: 1px solid white;'><font color='#FFFFFF' > Total Qm </td>
								<td align=center bgcolor=#000000 style='border: 1px solid white;'><font color=\"#FFFFFF\" size=\"2\">  $sts</font> </td>
								<td width=150 align=center $bgcolor><font color='#FFFFFF' > $aqms </td></tr>"; 	

//echo "$sta";
								$tbl.="</table>";

								?>
								<?php 
    // $agent_id=72202;
    // //$sheet='spv';
    // $bulan='2018-11';	
								$sql ="SELECT
								cc147_main_users.user_id,
								cc147_main_users.name,
								cc147_main_users.username,
								cc147_main_users_extended.user3
								FROM
								cc147_main_users_extended
								Inner Join cc147_main_users ON cc147_main_users_extended.user_id = cc147_main_users.user_id 
								where cc147_main_users.user_id=$agent_id and cc147_main_users.qco = $login"; 
								$query=mysqli_query($conn, $sql);
								$rowagent=mysqli_fetch_row($query); 
								$j_agent=$rowagent[3];


								?>
								<table width="100%" border="0" class="bodyline" style="border: 1px solid white;">
									<tr>
										<td bordercolor="#60729B" align="" style="">
											<div ><?php echo $tbl; ?></div>
											<table  width="100%"  style="border-collapse: collapse;box-sizing: border-box; border: 1px solid white;" class="bodyline">

												<?php
												$sqlcount="select tanggal from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id'  ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." ";
												$qcount=mysqli_query($conn,$sqlcount);
												$n=0;
												$total_data=0;
												$jml=0;
												while ($rcount=mysqli_fetch_row($qcount)){
													$n++;
													if ($j_agent=='Agent TAM'){
														if (($n % 2 == 1) || ($n <=3) ) {
															$total_data++;
															if ($total_data<= 10) {
																$jml++;

															}
														}
													}else{
														$jml++;
													}
												}
//count tanggal dalam 1 bulan
//$sqlcount="select count(*) as jml from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id' and sheet='$sheet'";
//$count=mysql_fetch_assoc(mysql_query($sqlcount));
//$jml=$count[jml];
//$jml=1;
												?>
												<br><br>
												<tr>
													<td rowspan="2" width="2%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> No </font> </b></td>
													<td rowspan="2" width="40%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> Parameter </b></font>
														<td rowspan="2" width="5%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> Bobot </b></font>
															<td colspan="<?php echo $jml?>" width="10%" align="center" bgcolor="#808080"style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b>  Nilai </b></font>
																<td rowspan="2" width="5%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> Rata rata </b></font>
																	<td rowspan="2" width="5%" align="center" bgcolor="#808080" style="border: 1px solid white;"><font color="#FFFFFF" size="2"><b> Keterangan </b></font>
																	</tr>
																	<tr>
																		<?php

//echo "$jml";
																		$i=1;
while($i<=$jml) //=========judul nilai per hari dalam sebulan ===================/
{
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#808080\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\" > $i </font></td>";
	$i++;
}
echo  "</tr>";


//========== query point kategori =========//
$sqlpoin="select * from app_kinerja_poin where aktif ='1'";
//echo $sqlpoin;
$qpoin=mysqli_query($conn, $sqlpoin);
$nom=1;
$p=1;
while ($rowpoin=mysqli_fetch_row($qpoin))
{
	
	$clspan=4+$jml+1;
	echo "<tr>
	<td colspan=\"$clspan\" bgcolor=\"#FFFFFF\" align=\"left\"><font color=\"#000000\" size=\"2\" style=\"border: 1px solid white;\"><b>$rowpoin[1] </b></font></td>
	</tr>";
	$jmlbot=0;

	//========= query  kategori ====================//
	$sqlkat="select * from app_kinerja_kategori where id_poin='$rowpoin[0]' and jabatan='Agent TAM' and status='1'";
	//echo "$sqlkat<br>";
	$qkat=mysqli_query($conn,$sqlkat);
	while ($rowkat=mysqli_fetch_row($qkat))
	{

		?>
		<tr>
			<td align="left" bgcolor="#dde6ff" style="border: 1px solid white;"> <?php echo "$nom."; ?></td>
			<td align="left" bgcolor="#dde6ff" style="border: 1px solid white;"> <?php echo "$rowkat[2] "; ?></td>
			<td align="center" bgcolor="#dde6ff" style="border: 1px solid white;"><?php echo "$rowkat[3] ";?></td>

			<?php 

			$val_kat="$rowkat[0]";
			$botkat="$rowkat[3]";

		//============= query 'NILAI' per kategori dalam sebulan=================//
			$npk="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id'  ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." order by tanggal asc";
		//echo "$npk";
			$q_npk=mysqli_query($conn,$npk);
			$tot="0";
			$i=1;
			$total_data=0;
			$n=0;
			while($row_npk=mysqli_fetch_row($q_npk))
			{
				$n++;
				if ($j_agent=='Agent TAM'){
					if (($n % 2 == 1) || ($n <=3) ) {
						$total_data++;
						if ($total_data<= 10) {
							$arr_kat = explode("|",$row_npk[3]);
							$arr_valkat = explode("|",$row_npk[2]);


							$for="";
							$no=0;
							foreach($arr_kat as $for)
							{		
				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
								if ($for==$val_kat)
								{  
					//echo "<td align=\"center\" bgcolor=\"#dde6ff\">$val_kat( $for)=$arr_value[$no]</td>";  }
									if ($arr_valkat[$no]=="-") { $arr_valkat[$no]="";}

									echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valkat[$no]</td>";  

									if ($arr_valkat[$no]<>"-")
									{
										$tot=$tot+$arr_valkat[$no]; $nilai=$arr_valkat[$no]; 

									}
									$nilkat[$i][$no]=$arr_valkat[$no]*$botkat;	
					$n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$no]; // ==========jml  nilai poin kategori per tanggal ========/
					
				}
				$no++;
			}

			$i++;	
			
		}
	}
}else{

	$arr_kat = explode("|",$row_npk[3]);
	$arr_valkat = explode("|",$row_npk[2]);
	$for="";$no=0;
	// print_r($val_kat);
	for($a= 0; $a < count($arr_kat); $a++) {
		if($arr_kat[$a] == $val_kat) {
			echo "<td align=\"center\" bgcolor=\"#dde6ff\">$arr_valkat[$a]</td>";
			if ($arr_valkat[$a]=="-") { $arr_valkat[$a]="";} 
			if ($arr_valkat[$a]<>"-")
			{

						$tot=$tot+$arr_valkat[$a]; 
						$nilai=$arr_valkat[$a]; 
			}
			$nilkat[$i][$a]=$arr_valkat[$a];	
			$n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$a]; // ==========jml  nilai poin kategori per tanggal ========/

		}
	}
	// foreach($arr_kat as $for)
	// {		
	// 	//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
	// 	// print_r($val_kat);
	// 	if ($for=="$val_kat")
	// 	{  
	// 				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">$val_kat( $for)=$arr_value[$no]</td>";  }
			

	// 	}
	// 	$no++;
	// }
	// --- rata rata --
	// for($no = 0; $no < count($arr_kat); $no++) {
	// 	if($arr_kat[$a] == $val_kat) {
	// 	if ($arr_valkat[$no]=="-") { $arr_valkat[$no]="";}
	// // 		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valkat[$no]</td>";  
	// 		if ($arr_valkat[$no]<>"-")
	// 		{
	// 			// $tot +=$arr_valkat[$no];
	// 					$tot=$tot+$arr_valkat[$no]; 
	// 					$nilai=$arr_valkat[$no]; 
	// 					print($tot);
	// 		}
	// 		// $nilkat[$i][$no]=$arr_valkat[$no]*$botkat;	
	// 		// $n_tmbkat[$i]=$n_tmbkat[$i]+$nilkat[$i][$no]; // ==========jml  nilai poin kategori per tanggal ========/
	// 	}
	// }

	$i++;	
}



}
// print_r($nilkat);
		//========== nilai rata2 kategori ============//
		// $rata2kat=((($botkat/100)*$tot)/$jml)*100;
		// $rata2=round($rata2kat,2);
		// $ratkat=round($rata2kat,2);
		// $rata2kat=0;
		// //$sumrata2kat=$sumrata2kat+$ratkat; //======sum rata2 kategori ===========//
		// $sumrata2kat=$tot/16;
		// if ($rata2==0) {$rata2="";}
		//$rata2=1;
echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  
echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  

?>

</tr>
<?php
//=========== query Item =================//
$sqlitem="select * from app_kinerja_item where id_kat='$rowkat[0]' and jabatan='Agent TAM' and status='1'";
	//echo "$sqlkat<br>";
$qitem=mysqli_query($conn, $sqlitem);
$abjad=array('A','B','C','D','E','F');
$list=0;

while ($rowitem=mysqli_fetch_row($qitem))
{
	$botitem=$rowitem[3];
	if ($rowitem[3]<>"")
	{
		?>
		<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td bgcolor="#dde6ff" align="left" style="border: 1px solid white;"><?php echo "$abjad[$list]."; ?> &nbsp;  <?php echo "$rowitem[2]"; ?></td>
			<td bgcolor="#dde6ff" align="center" style="border: 1px solid white;"><?php echo "$rowitem[3]";?></td>
			<?php 
	// ============= query "NILAI" per item dalam Sebulan ==================//
			$id_kat=$rowkat[0].";".$rowitem[1];				
			$npi="select * from app_kinerja_nilai where substring(tanggal,1,7)='$bulan'  and user_id='$agent_id'  ".(($kategori_call != "") ? "and kategori_call = '$kategori_call'" : "")." order by tanggal asc";
		//echo "$npi";
			$q_npi=mysqli_query($conn, $npi);
			$tot=0;$i=1;
			$total_data=0;
			$n=0;
			while($row_npi=mysqli_fetch_row($q_npi))
			{
				$n++;
				if ($j_agent=='Agent TAM'){
					if (($n % 2 == 1) || ($n <=3) ) {
						$total_data++;
						if ($total_data<= 10) {
							$arr_item = explode("|",$row_npi[3]);
							$arr_valitem = explode("|",$row_npi[2]);
							$for="";$no=0;
							foreach($arr_kat as $for)
							{	
				//echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
								if ($for=="$id_kat")
								{  
				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">( $for)=$arr_value[$no]</td>";  }
									echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valitem[$no]</td>";  
				$tot=$tot+"$arr_valitem[$no]";  //
				
				$nilitem[$i][$no]=$arr_valitem[$no]*$botitem;
				$n_tmbitem[$i]=$n_tmbitem[$i]+$nilitem[$i][$no]; // ==========jml nilai poin item per tanggal ========/
			}
			$no++;
		}

		
		$i++;
	}
}
}else{
	$arr_item = explode("|",$row_npi[3]);
	$arr_valitem = explode("|",$row_npi[2]);
	$for="";$no=0;
	foreach($arr_kat as $for)
	{	
				// echo "<p>$no ( $for)$arr_item[0],$arr_item[1]===$arr_value[$no]";// echo $arr_value2[0];	
		if ($for=="$id_kat")
		{  
				//echo "<td align=\"center\" bgcolor=\"#dde6ff\">( $for)=$arr_value[$no]</td>";  }
			echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\">$arr_valitem[$no]</td>";  
				$tot=$tot+"$arr_valitem[$no]";  //
				$nilitem[$i][$no]=$arr_valitem[$no];
				$n_tmbitem[$i]=$n_tmbitem[$i]+$nilitem[$i][$no]; // ==========jml nilai poin item per tanggal ========/
			}
			$no++;
		}


		
		$i++;
	} 



}
		//=========== nilai rata2 item ===========
$rata2item=((($botitem/100)*$tot)/$jml)*100;
$rata2=round($rata2item,2);
$ratitem=round($rata2item,2);
$rata2item=0;
		$sumrata2item=$sumrata2item+$ratitem; //====== sum rata2 item===========//
		$sumrata2kat=$tot/10;
		if ($rata2==0){$rata2="";}
		//$rata2=30;
		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>";  
		echo "<td align=\"center\" bgcolor=\"#dde6ff\" style=\"border: 1px solid white;\"></td>"; 
		
		?>		
	</tr>
	<?php
}	
$list++;
$tmbitem=$tmbitem+$botitem;


}
$tmbkat=$tmbkat+$botkat;	
$nom++;

	}  //==================== kategori ===================//
	
	$jmlbot=$tmbkat; //========= juml bobot ===========//
	//echo '$tmbkat';

	
	$tmbitem=0;
	$tmbkat=0;
	//$jmlbot=0;
	//================ total per poin ====================//
	
	echo "<tr>
	<td colspan=\"2\" bgcolor=\"#FF1000\" align=\"center\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"><b>TOTAL $rowpoin[1] </b></font></td>
	<td bgcolor=\"#FF1000\" align=\"center\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\" ><b>$jmlbot</b></font></td>";


	
	$i=1;
	$total_data = 0;
	$total_rata2 = 0;
	while($i<=$jml) //=========Total nilai POIN per tanggal dalam sebulan ===================/
	{
		$n_tot[$p][$i]=$n_tmbkat[$i]; // total nilai per poin
		// print_r($jml);
		$echo= $n_tot[$p][$i];
		$tt =$echo;
		// $tt +=$echo;
		$total_rata += $echo; 
		$total_rata2 += $n_tot[$p][$i]; 

		echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#FF1000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $echo</font></td>";
		$totnilai[$i]=$totnilai[$i]+$n_tot[$p][$i];
		$n_tmbkat[$i]=0;
		$jmlrata += $echo;
		$jmlrata2 += $n_tot[$p][$i];
		$n_tmbitem[$i]=0;
		$i++;		
	}
	// $kjmlrata=number_format(round((($total_rata)/$jml,2),2,",",".");
	// $kjmlrata2=number_format(round(($total_rata2)/$jml,2),2,",",".");
	$kjmlrata=number_format(round(($total_rata)/$jml,2),2,",",".");
	$kjmlrata2=number_format(round(($total_rata2)/$jml,2),2,",",".");
	$pjmlrata=number_format(round(($jmlrata)/$jml,2),2,",",".");
	$pjmlrata2=number_format(round(($jmlrata2)/$jml,2),2,",",".");

	//echo "$tt";
	 // echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#FF1000\"><font color=\"#FFFFFF\" size=\"2\"> $jmlrata2</font></td>";
	if($jmlbot == 78){
		echo "<td  width=\"2%\" align=\"center\" bgcolor=\"##FF1000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $kjmlrata</font></td>";
	}
	else{
		echo "<td  width=\"2%\" align=\"center\" bgcolor=\"##FF1000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $kjmlrata2</font></td>";
	}
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#FF1000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"></font></td>";
	echo  "</tr>";	
	$sumrata2item=0;$sumrata2kat=0;$tt=0;
//==================== total NILAI ======================================//

	
	$qms=$qms+$jmlrata2; 
	$totbot=$totbot+$jmlbot;	
	//echo "$qms";
	$p++;
	}  //========== Tutup point kategori ===============//
	
	
//=============================== QM Score ===========================================//
	echo "<td  colspan=\"2\" width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"><b> QUALITY MONITORING SCORE </b></font></td>";
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $totbot </font></td>";
	
	$i=1;	
	while($i<=$jml) //
	{
		
		echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $totnilai[$i] </font></td>";
		$tq +="$totnilai[$i]";
		$i++;		
	}
	// $abqms=($tq)/24;
	$abqms=(($tq/10)/$jml)*10;
	$bqms = number_format($abqms,2,",",".");

//echo "$tq";
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> $bqms </font></td>";
	if($bqms>=90){$tqms="EXCELENT";}
	else if($bqms>=80){$tqms="NEED IMPROVEMENT";}
	else if($bqms<80){$tqms="COACHING ALERT";}
	echo "<td  width=\"2%\" align=\"center\" bgcolor=\"#000000\" style=\"border: 1px solid white;\"><font color=\"#FFFFFF\" size=\"2\"> <b>$tqms</b> </font></td>";
	

	?>
</tr>
<?php



}
}

?>
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

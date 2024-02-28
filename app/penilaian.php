 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TASYA TELKOM Ver 1.0">
    <meta name="author" content="wapo">
    <meta name="keyword" content="TASYA TELKOM Ver 1.0">
    <link rel="shortcut icon" href="../img/company_logo.png">

	
    <title> TELKOM Ver 1.0</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="../assets/gritter/css/jquery.gritter.css" />


	<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="../assets/gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap-autocomplete/bootstrap-chosen.css" />
	<!--
    <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">-->


	
    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/style-responsive.css" rel="stylesheet" />

	<!--
    <link href="../assets/morris.js-0.4.3/morris.css" rel="stylesheet" />
	-->

		

	<link rel="stylesheet" href="../css/smoothness/jquery-ui-1.8.2.custom.css" /> 

	<!-- <link href="../assets/css/boxku.css" rel="stylesheet"> -->
    
    <link href="../assets/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />

	
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>


  <body style="background: #f1f2f7 none repeat scroll 0 0;">
  
  <!--container start-->
  <section id="container" class="">
      <!--header start-->
		
		<header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips">

				</div>
            </div>
            <!--logo start-->
					<!--<a href="index.php" class="logo">Flat<span>lab</span></a>-->
				<a href="index.php"  class="logo hidden-xs"><img src="../img/tasya.jpg" height="40px" width="auto"><font color="#CC0000" size="2">Malang</font></a>
            <!--logo end-->
			
            <div class="top-nav ">
                <!--search & user info start-->
				
                <ul class="nav pull-right top-menu">
                    <li>
						<!--<img src="../img/logo_topx.jpg" height="45px" width="auto">-->
                        <!--<input type="text" class="form-control search" placeholder="Search">-->
                    </li>
                    <!-- user login dropdown start-->
					
					
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
						
							
						
						
                            <img alt="" src="../img/company_logo.png" width="30px" height="30px">
							

							
                            <span class="username">MOCH FAJAR SAHURI [ Supervisor ]</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="form_profile.php" onclick=""><i class=" icon-suitcase"></i>Profile</a></li>
                            <li><a href="idx_login_log.php?Search=1" onclick=""><i class="icon-cog"></i> Log</a></li>
                            <li><a href="form_password.php#" onclick=""><i class="icon-key"></i> Password</a></li>
                            <li><a href="login.php"><i class="icon-signout"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
	
      <!--header end-->
	  <!--sidebar start-->

   <?php require_once('sidebar.php'); 
		 require_once('koneksi.php');
		 date_default_timezone_set('Asia/Jakarta');
		 $tgl=date('d-m-Y');

		 $conn = @mysqli_connect("localhost", "root", "infonusa", "maincc147");

   ?>         
	
	  <!--sidebar end-->	
<?php

//$conn = new mysqli($servername, $username, $password, $database);
if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
$conn = @mysqli_connect("localhost", "root", "infonusa", "maincc147");
$loginid="46868";
$nama="hoiriya";
$jabatan="Agent fbcc";
//
	
$sql ="SELECT
cc147_main_users.user_id,
cc147_main_users.name,
cc147_main_users.username,
cc147_main_users_extended.user3,
cc147_main_users.nama_udara
FROM
cc147_main_users_extended
Inner Join cc147_main_users ON cc147_main_users_extended.user_id = cc147_main_users.user_id where cc147_main_users.user_id='$loginid'"; 
$query=mysqli_query($conn, $sql);
$row=mysqli_fetch_row($query);

date_default_timezone_set('Asia/Jakarta');
		 $tanggal=date('Y-m-d');


if(isset($save))
{  echo "<p>SAVE $tanggal<p>$n4";}


?>
<div align="center">

<form method="POST" action="simpan.php" name="demoform">
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="bodyline">
	
	<tr>
		<td bordercolor="#60729B" align="center"><font style="font-size:15px" face="Verdana" color="#d8033c"><b>Entri Performansi <? echo  $j_agent ?></b></font></td>
	</tr>	
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="bodyline">
	<tr>
		<td bordercolor="#60729B" style="padding-top: 50px; padding-left: 200px;">
<table width="95%" border="0" >
  <tr>
    <td width="15%" align ="left">Nama Agent&nbsp;</td>
    <td width="50%" align ="left" >:&nbsp; <b><?php echo "$row[1] / $row[4]";  ?></b></td>                        
    <td width="10%" align ="left" >tanggal</td>
    <td align ="left" >:&nbsp; <b><?php echo $tanggal; ?></td>
</tr>
  <tr>
    <td align ="left">Login</td>
    <td align ="left">:&nbsp; <b><?php echo $row[2];  ?></td>
    <td align ="left">Updater :</td>
    <td align ="left"><b><?php echo "jaka" ?></b></td>
</tr>
</table>
</td></tr></table>


<table width="100%" border="0" cellpadding="3" cellspacing="0" class="forumline">
	<tr>
		<td bordercolor="#60729B" align="center" style="
    padding-left: 180px;
">
<table border="0" width="95%"cellpadding="2" cellspacing="1" style="border-collapse: collapse" class="forumline">
<?php
$sqlpoin="select * from app_kinerja_poin where aktif ='1' order by poin asc";
//echo $sqlpoin;
$qpoin=mysqli_query($conn,$sqlpoin);
 
$no=1;
while ($rowpoin=mysqli_fetch_row($qpoin))
{

?>

<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> <?php echo $rowpoin[1]; ?></b></font></td>
  
</tr>
<?php
$sqlkate="select * from app_kinerja_kategori where id_poin='$rowpoin[0]' and jabatan='Agent fbcc' and status='1' order by id";
//echo $sqlkate;
$qkate=mysqli_query($conn,$sqlkate);
while ($rowkat=mysqli_fetch_row($qkate))
{



?>
<tr>
    <td width="2%" align="left" bgcolor="#dde6ff"> <?php echo "$no."; ?></td>
    <td width="80%" align="left" bgcolor="#dde6ff"> <?php echo "$rowkat[2] "; ?></td>
	<td width="10%" align="left" bgcolor="#dde6ff"><?php echo "$rowkat[3] ";?></td>
	<td bgcolor="#dde6ff">
	<?php 
	$a=$rowkat[0];
	 
	//echo "$rowkat[3]";
	if (($rowkat[3])<>"") {	
	echo "<select name=\"n".$rowkat[0]."\">		
	<option value=\"1\" selected>1</option>
	<option value=\"0\" >0</option>
	</select>";			
	 }
	 //echo "$a";
	 
	 ?>
	 
	</td>
</tr>
<?php
	$sqlitem="select * from app_kinerja_item where id_kat='$rowkat[0]' and jabatan='Agent fbcc' and status='1'";
	//echo "$sqlkat<br>";
	$qitem=mysqli_query($conn,$sqlitem);
	$abjad=array('A','B','C','D','E','F');
	$list=0;
	while ($rowitem=mysqli_fetch_row($qitem))
	{
	
		?>
			<tr>
				<td bgcolor="#dde6ff" align="left"></td>
				<td bgcolor="#dde6ff" align="left"><?php echo "$abjad[$list]."; ?> &nbsp;  <?php echo "$rowitem[2]"; ?></td>
				<td bgcolor="#dde6ff" align="left"><?php echo "$rowitem[3]"?></td>
				<td bgcolor="#dde6ff">
				<?php 
				$c=$rowitem[0].$rowitem[1];
				//$b=$_POST["na$c"];
				
				//$c="n".$rowitem[0].$rowitem[1];
				echo "<select name=\"na".$c."\">
				<option value=\"1\" >1</option>
				<option value=\"0\" >0</option>
				</select>"; 				
				//echo "$b";				
				?>		
				</td>
			</tr>
		<?php	
	$list++;
	}
$no++;
}
}


?>

<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Tanggal dan waktu Record Id</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<b>Tanggal</b>
		<input class="plain" name="tglrecord" value="" size="22" ><a return false;" ><img name="popcal" align="absmiddle" src="images/calbtn.gif" width="34" height="22" border="0" alt=""></a>
			 
	 
			</td>  
		</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Record Id dan Durasi</b></font></td>  
</tr>

<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<b>Ani number </b> <input type="text" name="ani" /> 
			<b>/Durasi </b> <input class="plain" name="durasi" value="" size="19"><a href="javascript:void(0)" onclick="if(self.gfPop1)gfPop1.fPopCalendar(document.demoform.durasi);return false;" ><img name="popcal1" align="absmiddle" src="images/calbtn.gif" width="34" height="22" border="0" alt=""></a>

	 
			</td>  
		</tr>

<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> CASE</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<b>CASE  </b> <input type="text" name="case" /> 
			<b>Masalah  </b> <input type="text" name="masalah" /> 		
			</td>  
</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> BATCH</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<b>BATCH  </b> <input type="text" name="batch" /> 
					
			</td>  
</tr>

<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Keterangan</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<textarea name="keterangan" cols="90" rows="5" value="<?php echo $keterangan; ?>"></textarea>
	 
			</td>  
		</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Rekomendasi</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<textarea name="rekomendasi" cols="90" rows="5" value="<?php $rekomendasi=$_POST[rekomendasi]; echo $rekomendasi; ?>"></textarea>
	 
			</td>  
		</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Kategori</b></font></td>  
</tr>

		<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			    <input type="radio" name="katnilai" value="Informasi"> 1. INFORMASI
				<input type="radio" name="katnilai" value="Komplain"> 2. KOMPLAIN
				<input type="radio" name="katnilai" value="Registrasi"> 3. REGISTRASI				
			</td>  
		</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Sample</b></font></td>  
</tr>

		<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			    <input type="radio" name="katsample" value="JM"> 1. JM
				<input type="radio" name="katsample" value="JT"> 2. JT
				<input type="radio" name="katsample" value="JT"> 3. JP				
			</td>  
		</tr>

	<script type="text/javascript" src="includes/javascript/jquery.js"></script>
	<script type="text/javascript" src="includes/javascript/jquery.ui.js"></script>
	<script type="text/javascript" src="includes/javascript/jquery.asmselect.js"></script>

	<script type="text/javascript">

		$(document).ready(function() {
			$("select[multiple]").asmSelect({
				addItemTarget: 'bottom',
				animate: true,
				highlight: true,
				sortable: true
			});
			
		}); 

	</script>

	<link rel="stylesheet" type="text/css" href="includes/css/jquery.asmselect.css" />
	
	
<!-- <tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Data Umpan Balik</b></font></td>  
</tr>

		<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left"> 
			   <?
// echo "<select name=\"katub[]\" multiple=\"multiple\" > ";
		
// $query1="select layanan from app_keluhan_main where layanan='$j_agent' group by layanan";

// $query=mysql_query($query1);
// $list_menu="";
// while($res=mysql_fetch_assoc($query))
// {
// 	extract($res,EXTR_OVERWRITE);
// 	//$list_menu.="<option disabled='disabled'><b>Layanan $layanan</b></option>";
// 	echo "<option value='' disabled='disabled'><b>Layanan $layanan</b></option>";
// 	$query2="select id,nama as nama_kat from app_keluhan_main where layanan='$layanan' ";
// 	$query2=mysql_query($query2);
// 	while($res2=mysql_fetch_assoc($query2))
// 	{
// 		extract($res2,EXTR_OVERWRITE);
// 		$list_menu.="<option value='' disabled='disabled' style='color:red'><b>--[KATEGORI] $nama_kat</b></option>";
// 		echo "<option  value='' disabled='disabled' style='color:red'><font color=red ><b>[KATEGORI] $nama_kat</b></font></option>";
// 		$query3="select id as id_sub,id_km,nama as nama_kat from app_keluhan_sub1 where id_km='$id' ";
// 		$query3=mysql_query($query3);
// 		while($res3=mysql_fetch_assoc($query3))
// 		{
// 			extract($res3,EXTR_OVERWRITE);
// 			$sub_nama=$nama_kat;
// 			echo "<option value='' disabled='disabled' style='color:blue' ><b>[SUB KATEGORI] $nama_kat</b></option>";
// 			$query4="select id_sub1,id,nama as nama_kat from app_keluhan_sub2 where id_sub1='$id_sub' ";
// 			$query4=mysql_query($query4);
// 			while($res4=mysql_fetch_assoc($query4))
// 			{
// 				extract($res4,EXTR_OVERWRITE);
// 				if($nama_kat!='None')
// 				echo "<option value='$id'  >*------$nama_kat </option>";
// 				else
// 				echo "<option value='$id'  >*------$sub_nama</option>";
				
				
// 			};
// 		};
		
// 	};
	
// };
	
// 	echo "	</select>"; 		   			   
			  //echo "$query1<br>";
			   ?> *note: hanya kategori dengan tanda (*) yang dapat dipilih
			</td>  
		</tr>
		<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<textarea name="ketub" cols="90" rows="5" value=""></textarea>
			
			</td>  
		</tr> -->
</table></td></tr></table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="bodyline">
	
	<tr>
		<td bordercolor="#60729B" align="right">
		
		<input type="submit" name="save" value=" Save "></td>
		<td bordercolor="#60729B" align="left"><input type="submit" name="cancel" value="Cancel" ></td>
		
		
		
	</tr>	
</table>
</form>

</div>
<iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_datetime.js" id="gToday:datetime:agenda.js:gfPop:plugins_datetime.js" src="includes/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>

<iframe width=188 height=10 name="gToday:datetime:agenda.js:gfPop1:plugins_timeSec.js" id="'00:00:00':datetime:agenda.js:gfPop1:plugins_timeSec.js" src="includes/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
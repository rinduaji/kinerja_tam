<?php

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
$upd="44747";
$loginid="75049";
$nama="hoiriya";
$jabatan="Agent fbcc";
$conn = @mysqli_connect("10.194.41.7", "root", "infonusa", "maincc147");

/*
if ($j =="Supervisor 108" || $j =="Koordinator 108"){ $jbt_agent="Agent 108"; $sheet="spv";} 
else if ($j =="Tabber 108" || $j =="QA 108") { $jbt_agent="Agent 108"; $sheet="tabber"; } 

else if ($j =="Supervisor Flexi" || $j =="Koordinator Flexi") { $jbt_agent="Agent flexi"; $sheet="spv";}
else if ($j =="Supervisor POTS" || $j =="Koordinator POTS") { $jbt_agent="Agent POTS"; $sheet="spv";}
else if ($j =="Supervisor Speedy" || $j =="Koordinator Speedy") { $jbt_agent="Agent Speedy"; $sheet="spv";}
else if ($j =="Tabber 147" || $j =="QA 147") { $jbt_agent="$agent"; $sheet="tabber";}

else if ($j=="Duktek" || $j=="SPV Duktek") { $jbt_agent="$agent"; $sheet="$group"; } 
*/ 
?>


<?php
$sql ="SELECT
cc147_main_users.user_id,
cc147_main_users.name,
cc147_main_users.username,
cc147_main_users_extended.user3
FROM
cc147_main_users_extended
Inner Join cc147_main_users ON cc147_main_users_extended.user_id = cc147_main_users.user_id 
where cc147_main_users.user_id='44747'"; 
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_row($query);

$j_agent=$row[3];


//echo $sql;
date_default_timezone_set('Asia/Jakarta');
$tanggal=date('Y-m-d');

?>
<div align="center">
<form method="POST" action="simpan.php" name="demoform">
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="bodyline">	
	<tr>
		<td bordercolor="#60729B"><font style="font-size:15px" face="Verdana" color="#d8033c"><b>Entri Performansi Agent <?php  ?></b></font></td>
	</tr>	
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="bodyline">
	<tr>
		<td bordercolor="#60729B">
<table width="95%" border="0" >
  <tr>
    <td width="15%" align ="left">Nama Agent&nbsp;</td>
    <td width="50%" align ="left" >:&nbsp; <b><?php echo $row[1]; ?></b></td>                        
    <td width="10%" align ="left" >tanggal</td>
    <td align ="left" >:&nbsp; <b><?php echo $tanggal; ?></td>
</tr>
  <tr>
    <td align ="left">Login</td>
    <td align ="left">:&nbsp; <b><?php echo $row[2];  ?></td>
    <td align ="left">Updater :</td>
    <td align ="left"><b><?php echo $nama ?></b></td>
</tr>
</table>
</td></tr></table>


<table width="100%" border="0" cellpadding="3" cellspacing="0" class="bodyline">
	<tr>
		<td bordercolor="#60729B">
<table border="0" width="95%"cellpadding="2" cellspacing="1" style="border-collapse: collapse" >
<?php

$sqlpoin="select * from app_kinerja_poin where aktif ='1' order by poin asc";
//echo $sqlpoin;

$qpoin=mysqli_query($conn, $sqlpoin);
$no=1;
$add=1;
while ($rowpoin=mysqli_fetch_row($qpoin))
{

?>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> <?php echo $rowpoin[1] ?></b></font></td>
</tr>
<?php
$sqlkat="select * from app_kinerja_kategori where id_poin='$rowpoin[0]' and jabatan='Agent fbcc' and status='1' order by id";
 //echo "$sqlkat<br>";

$qkat=mysqli_query($conn, $sqlkat);
while ($rowkat=mysqli_fetch_row($qkat))
{
?>
<tr>
    <td width="2%" align="left" bgcolor="#dde6ff"> <?php echo "$no.|$add"; ?></td>
    <td width="80%" align="left" bgcolor="#dde6ff"> <?php echo "$rowkat[2] "; ?></td>
	<td width="10%" align="left" bgcolor="#dde6ff"><?php echo "$rowkat[3] ";?></td>
	<td bgcolor="#dde6ff">
	<?php 
	$val_kat=$_POST["n$rowkat[0]"];
	if ($val_kat=="")
	{ $val_kat="-";}	
	if ($rowkat[3]<>"")
	{	
		echo "<select name=\"n".$rowkat[0]."\">		
		<option value=\"1\" selected>1</option>
		<option value=\"0\" >0</option>
		</select>";			
	 
	 // ============ mencari ketidaksesuaian ====================
		if ($val_kat=='0')
		{
			echo "$val_kat # $rowkat[0];- ($no)";
			$katnol="$rowkat[0];-,";
			$num_kat="$no,";
		}
	//==========================================================
	
	 }	 
	 ?>	 
	</td>
</tr>
<?php
	$sqlitem="select * from app_kinerja_item where id_kat='$rowkat[0]' and jabatan='Agent fbcc' and status='1'";
	//echo "$sqlkat<br>";
	$qitem=mysqli_query($conn, $sqlitem);
	$abjad=array('A','B','C','D','E','F');
	$list=0;
	$add++;
	while ($rowitem=mysqli_fetch_row($qitem))
	{	
		?>
			<tr>
				<td bgcolor="#dde6ff" align="left"></td>
				<td bgcolor="#dde6ff" align="left"><?php echo "$abjad[$list].|$add"; ?> &nbsp;  <?php echo "$rowitem[2]"; ?></td>
				<td bgcolor="#dde6ff" align="left"><?php echo "$rowitem[3]"?></td>
				<td bgcolor="#dde6ff">
				<?php 
				$c=$rowitem[0].$rowitem[1];
				$val_itm=$_POST["na$c"];
				$b.="$val_itm|";
				//$c="n".$rowitem[0].$rowitem[1];				
				echo "<select name=\"na".$c."\">
				<option value=\"1\" >1</option>
				<option value=\"0\" >0</option>
				</select>"; 
				//$id_item.=$rowitem[1].";";
				$id_kat.=$rowkat[0].";".$rowitem[1]."|";
				//====================== mencari ketidak sesuaian ======================
				
				

				if ($rowitem[3]<>""){
				
				if ($val_itm==1 && $rowkat[1]==2){
					$toto+=$rowitem[3];
				}
				if ($val_itm==1 && $rowkat[1]==1)
				{
					echo "$val_itm # $rowkat[0];$rowitem[1]; $no$abjad[$list];";
					
					$tot+=$rowitem[3];
					//echo "$tot";
					// $itemnol="$rowkat[0];$rowitem[1],";
					// $num_itm="$no$abjad[$list],";
				}
				}
				
				//======================================================================	
				
				?>		
				</td>
			</tr>
		<?php	
	$list++;
	$add++;
	}
//----hasil nilai------------	
	$value.=$val_kat."|".$b;
	$b="";	
//----hasil item -------------
	$id_all.=$rowkat[0].";-|$id_kat";
	$id_kat="";
//---- hasil ketidaksesuaian --------	
	//$id_nol.="$katnol$itemnol";		
	//$itemnol="";
	// $katnol="";
	// $num_nol.="$num_kat$num_itm";
	// $num_itm="";
	// $num_kat="";
	//$toti.=$tot."|".$b;
	;
$no++;
}
}
//echo "<p>value =$toti";
//echo "<p>id kat=$id_kat";
//echo "<p>id all=$id_all";
//echo "<p>id nol=$id_nol";
echo "<p>numnol=$tot";
echo "<p>numnopl=$toto";

// $cs=substr($value, 0,3);
//$cs1=$cs*70;
//echo $c;
// $cs2=substr($value, 2);
// $cs3=$cs2*30;
// echo "<p>$cs2";
// echo "<p>$cs3";
// $tcs=$cs1+$cs3;
?>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Tanggal dan waktu Record Id</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<b>Tanggal</b>
		<input class="plain" name="tglrecord" value="<?php echo $tglrecord ?>" size="19"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.tanggal);return false;" ><img name="popcal" align="absmiddle" src="images/calbtn.gif" width="34" height="22" border="0" alt=""></a>	 
			</td>  
		</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Record Id dan Durasi</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<b>Ani Number </b> <input type="text" name="ani" value="<?php echo $ani; ?>" /> 
			<b>/Durasi </b> <input class="plain" name="durasi" value="<?php echo $durasi; ?>" size="19"><a href="javascript:void(0)" onclick="if(self.gfPop1)gfPop1.fPopCalendar(document.demoform.durasi);return false;" ><img name="popcal1" align="absmiddle" src="images/calbtn.gif" width="34" height="22" border="0" alt=""></a>	 
			</td>  
		</tr>
<tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> CASE</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<b>CASE  </b> <input type="text" name="case" value="<?php echo $case; ?>" />  
			<b>Masalah  </b> <input type="text" name="masalah" value="<?php echo $masalah; ?>" />  		
			</td>  
</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> BATCH</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<b>BATCH  </b> <input type="text" name="batch" value="<?php echo $batch; ?>" />
					
			</td>  
</tr>

<tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Keterangan</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<textarea name="keterangan" cols="90" rows="5" value="<? echo $keterangan; ?>"></textarea>
			<?php echo $keterangan; ?>	 
			</td>  
		</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Rekomendasi</b></font></td>  
</tr>
<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			<textarea name="rekomendasi" cols="90" rows="5" value="<?  echo $rekomendasi; ?>"></textarea>
			<?php echo $rekomendasi; ?></td>  
		</tr>
<tr>
    <td colspan="4" bgcolor="#5e85d7" align="left"><font color="#FFFFFF" size="2"><b> Kategori</b></font></td>  
</tr>
		<tr>
			<td bgcolor="#dde6ff" align="left"></td>
			<td colspan="3" bgcolor="#dde6ff" align="left">
			    <input type="radio" name="katnilai" value="Informasi"> 1. INFORMASI
				<input type="radio" name="katnilai" value="Komplain"> 2. KOMPLAIN
				<input type="radio" name="katnilai" value="Registrasi"> 3. REGISTRASI	<?  echo $katnilai; ?>			
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
				<input type="radio" name="katsample" value="JP"> 3. JP	<?  echo $katsample; ?>				
			</td>  
		</tr>
</table></td></tr></table>
<table width="70%" border="0" cellpadding="3" cellspacing="1" class="bodyline">	
	<tr>
		<td bordercolor="#60729B" align="right"><input type="submit" name="save" value=" Save " /></td>
		<td bordercolor="#60729B" align="left"><input type="submit" name="cancel" value="Cancel" /></td>	
	</tr>	
</table>
</form>
</div>
<iframe width=188 height=166 name="gToday:datetime:agenda.js:gfPop:plugins_time.js" id="gToday:datetime:agenda.js:gfPop:plugins_time.js" src="includes/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
<iframe width=188 height=10 name="gToday:datetime:agenda.js:gfPop1:plugins_timeSec.js" id="'00:00:00':datetime:agenda.js:gfPop1:plugins_timeSec.js" src="includes/DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>


<?php

if ($input==3 || $input==2){

//$sqlsf="SELECT pola FROM `app_roosterfix` WHERE `TglMasuk` = '$tanggal 00:00:00' AND `Karyawan` = '$id'";
	$sqlsf="SELECT pola FROM `app_roosterfix` WHERE `TglMasuk` = '$tanggal 00:00:00' AND `Karyawan` = '46837'";
echo "$sqlsf<br>";
$rwsf=mysqli_query($conn, $sqlsf);
$shift=mysqli_fetch_row($rwsf);

echo"$shift[0]<br>";

	$arr_kat = explode("|",$id_all);
	$arr_value = explode("|",$value);
	$for="";$abjad=array('','a','b','c','d','e','f');
	$no=0;
	foreach($arr_kat as $for)
	{
		//echo "$no.$for ---- $arr_value[$no]<br>";
		
		if ($arr_value[$no]=="0"){
		$kat.="$for,";
		$arr_item = explode(";",$for);
		$n=$arr_item[1];
		$set="select id_poin from app_kinerja_kategori where id='$arr_item[0]' and jabatan='Agent fbcc'";
		echo "$set<br>";
		$qs=mysqli_query($conn, $set);
		$rw=mysqli_fetch_row($qs);
		if( $rw[0]==1 ) { $sm="PL"; }
		if( $rw[0]==2 ) { $sm="SKL";}
		if( $rw[0]==3 ) { $sm="SLL";}
		$param.="$sm $arr_item[0]$abjad[$n],";
		}
		$no++;
	}
	echo"kat=$kat<br>";
	echo"param=$param<br>";
}


//echo"$input<br>";


$keterangan=str_replace("'","\'",$keterangan);
$rekomendasi=str_replace("'","\'",$rekomendasi);
$lup=date('Y-m-d h:i:s');
$tglpen=date('Y-m-d');
$jamrecord=substr("$tglrecord",11);
echo "jam= $jamrecord<br>";


//die();
// $sql="INSERT INTO `app_kinerja_nilai` (`tanggal`,`user_id`,`nilai`,`item`,`tglrecord`,`ani`,`durasi`,`keterangan`,`rekomendasi`,`upd`,`lup`,`sheet`,`kategori`,`status`,`case`,`masalah`,`ketjab`,`vam`,`channel`) 
// VALUES ('$tanggal','$id','$value','$id_all','$tglrecord','$recordid','$durasi','$keterangan','$rekomendasi','$loginid','$lup','$sheet','$katnilai','0','$ani','$case','$agent','$vam','$channel')";
// echo "$sql<p>";
//$id="75049";
//$agent="75049";
$sql="INSERT INTO `app_kinerja_nilai` (`tanggal`,`user_id`,`nilai`,`item`,`tglrecord`,`ani`,`durasi`,`keterangan`,`rekomendasi`,`upd`,`lup`,`status`,`case`,`masalah`,`ketjab`,`batch`) 
VALUES ('$tanggal','$id','$value','$id_all','$tglrecord','$ani','$durasi','$keterangan','$rekomendasi','$loginid','$lup','0','$case','$masalah','$agent','$batch')";
echo "$sql<p>";



// if ($numnol="1") {
// 	$value1="0";
// 	$value2="30";
// 	$value3="70";
// }elseif ($numnol="2") {
// 	$value1="70";
// 	$value2="0";
// 	$value3="100";
// }elseif ($numnol="1,2,") {
// 	$value1="70";
// 	$value2="30";
// 	$value3="100";
// }else{
// 	$value1="70";
// 	$value2="30";
// 	$value3="100";
// }


$sqltab="INSERT INTO `maincc147`.`app_kinerja_tab` (`tanggal`, `user_id`, `layanan`, `record_id`, `tgl_record`, `jam`, `durasi`, `customer_needs`, `service_technique`, `QM`, `rekomendasi`,`upd`,`lup`,`sheet`)
VALUES ('$tanggal','$id','$case','$ani','$tglrecord','$jamrecord','$durasi','$tot','$toto','$tot','$rekomendasi','$loginid','$lup','$sheet')";
echo "$sqltab<p>";

 //die();
if(isset($cancel))
{  	
	header ("location:$mpath&file=list_penilaian&agent=$j_agent&group=$sheet"); echo "<p>cancel<p>";
} else 
{
	if ($input==2)
 	{	mysqli_query($conn, $sqlreal);	} 
	else  
	{
	
	
	if ($input==3)
	{	mysqli_query($conn, $sql);	} 

	$query_result= mysqli_query($conn, $sql);
	clearstatcache();
	header ("location:penilaian.php");
	if ($query_result) {
    	mysqli_query($conn, $sql);

	} else {
	    ?>
		<script type="text/javascript">
	    alert("Mohon periksa kembali! User <?php echo $row[1] ?> telah input 1 kali pada hari ini");
	    history.back();
	    
		</script>
		<?php

		//echo "$row[1]";
		die();
	}
	
	echo"$input<br>";
	if ($katub<>''){ 

		foreach($_POST['katub'] as $kat_ub) {
		if($kat_ub<>'') {
		$in="INSERT INTO `app_keluhan_data` (`id`,`tgl`,`user_id`,`sheet`,`ksub2_id`,`keterangan`,`rec_id`,`ani`,`layanan`) VALUES (NULL,'$tanggal','$id','$sheet','$kat_ub','$ketub','$recordid','$ani','$j_agent')";
		echo "$in<p>";
		mysqli_query($conn, $in);	
		}			
		}
	}
	}
	
 

}
header ("Location:penilaian.php");
?>
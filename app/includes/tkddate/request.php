<?
if (!defined('CPG_NUKE')) { exit; }
require_once('header.php');
$pagetitle .= "Tukar Dinas Online";
$mpath = getlink('Wfm');
if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
if ($tanggal==''){$tanggal="2010-02-18";}
$uname = $userinfo['username'];
$iduser = $userinfo['user_id'];
$jabatan = $userinfo['user_ext3'];
$kelamin = $userinfo['user_ext4'];
?>
<script type="text/javascript" src="includes/javascript/apymenu.js"></script>
<script type="text/javascript" src="includes/javascript/mn_wfmagent.js"></script>
<script language="JavaScript">
function request(d){
	document.form.user_iduser_target.value=d;
	//alert(document.form.user_iduser_target.value);
	document.form.submit();
}

function calcJulian(isDate){

gregDate = new Date(isDate);
year = gregDate.getFullYear();
month = gregDate.getMonth()+1;
day = gregDate.getDate();
A = Math.floor((7*(year+Math.floor((month+9)/12)))/4);
B = day+Math.floor((275*month)/9)
isJulian = (367*year)-A+B+1721014;
return isJulian;
}

function validate(date1,date2){
tmpd = date2.split("-")
date2=tmpd[2]+"/"+tmpd[1]+"/"+tmpd[0];

tmp = date1.split("/")
xDate = tmp[1]+"/"+tmp[0]+"/"+tmp[2];
refDate = calcJulian(xDate);
tmp = date2.split("/")
xDate = tmp[1]+"/"+tmp[0]+"/"+tmp[2];

fwdDate = calcJulian(xDate);

if (fwdDate-refDate > 30 || fwdDate <= refDate)
{
alert('Tanggal TKD minimal H+1');
document.form.tanggal.value = "";
document.form.tanggal.focus();
}else{
	document.form.submit();
}
}

</script>
</head>
<body>
<form name="form" action="" method="post">
<?

//chek yang bersangkutan sudah booking TKD aau belum
$query="select * from app_listtkd where karyawan1='$iduser' and status='0'";
$result=mysql_query($query);
if(mysql_num_rows($result)=='0'){
//jika belum inilah hasilnya
 foreach ($userinfo as $key => $value) {
      echo $key." - ".$value."<br>";
      }
?>
	<table width="300" border="0" cellpadding="5" cellspacing="1" class="bodylinein" align="center">
		<tr>
			<td width="25%" align="center" bgcolor="#60809F"><b>Tanggal</b></td>
			<td width="75%" bgcolor="#A5C2D1"><span class="gensmall">
			<input type="hidden" name="tanggalnow" value="<?=date('d/m/Y')?>">	
			<input class="plain" name="tanggal" value="<?echo $tanggal;?>" size="12" onfocus="this.blur()" onChange="document.form.submit();" readonly><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.form.tanggal2,document.form.tanggal);return false;" HIDEFOCUS><img class="PopcalTrigger" align="absmiddle" src="images/calbtn.gif" width="34" height="22" border="0" alt=""></a>
			
			<input type="hidden" name="tanggal2" value="2010-02-18">	
			</span>
		</tr>
		<?
			if($tanggal<>''){
				$sql="select pola from app_roosterfix where tglmasuk='$tanggal 00:00:00' and karyawan='$iduser' and jabatan='$jabatan' and keterangan=''";
				echo $sql;
				$res=mysql_query($sql);
				$row=mysql_fetch_array($res);
				$polaasli=$row['pola'];
			}
		?>
		<tr>
			<td width="25%" align="center" bgcolor="#60809F"><b>Pola Anda</b></td>
			<td width="75%" bgcolor="#A5C2D1"><span class="gensmall"><?=$polaasli?></span></td>
		</tr>
			<?
				
				if($tanggal<>''){	
					$sql="select keterangan from app_roosterfix where tglmasuk='$tanggal 00:00:00' and karyawan='$iduser' and jabatan='$jabatan'";
					$res=mysql_query($sql);
					$row=mysql_fetch_array($res);
					$ket=$row['keterangan'];
					if($ket<>''){
			?>	
						<script language="javascript">
							alert("Pada tanggal <?=$tanggal?> anda tidak telah melakukan tukar dinas");
							location.href="request.php";
						</script>
			<?
					}

				}
			?>
		<tr>
			<td width="25%" align="center" bgcolor="#60809F"><b>Pola Tukar</b></td>
			<td width="75%" bgcolor="#A5C2D1"><span class="gensmall">
				<?
					$sql="select distinct(Pola) from app_roosterfix where jabatan='$jabatan' and kelamin='$kelamin' and tglmasuk='$tanggal 00:00:00' and pola<>'$polaasli' and pola not in ('CT','X','TR') and keterangan = ''";
					//echo $sql;
					$res=mysql_query($sql);
				?>
				<select name="pola" onChange="document.form.submit()">
				<option value="" selected>--- Pilih ---</option>
				<?
					while($row=mysql_fetch_assoc($res)){
						//extract($row,EXTRACT_OVERWRITE);
				?>
						<option value="<?=$row['Pola']?>" <? if($pola==$row['Pola']) echo "selected"; ?>><?=$row['Pola']?></option>
				<?		
					}
				?>
				</select>
			  </span></td>		
		</tr>
	</table>

	<?
	if($tanggal<>'' && $pola<>''){
	?>
	<table width="700" border="0" cellpadding="5" cellspacing="1" align="center">
	<tr>
		<td><font color=blue>List Caroline Officer</font></td>
	</tr>
	</table>
	<table width="700" border="0" cellpadding="5" cellspacing="1" class="bodylinein" align="center">
		<tr>
			<td width="20%" align="center" bgcolor="#60809F"><b>Login</b></td>
			<td width="60%" align="center" bgcolor="#60809F"><b>Nama</b></td>
			<td width="20%" align="center" bgcolor="#60809F"><b>Keterangan</b></td>
		</tr>
		<?
			$sql="select a.user_id as id, a.username as username, a.name as name from app_roosterfix b, cc147_main_users a where a.user_id=b.karyawan and jabatan='$jabatan' and kelamin='$kelamin' and pola='$pola' and keterangan='' and tglmasuk='$tanggal 00:00:00' order by a.username";
			//echo $sql;
			$res=mysql_query($sql);
			while($row=mysql_fetch_assoc($res)){
		?>
		<tr>
			<td width="20%" bgcolor="#A5C2D1" align="center"><?=$row['username']?></td>
			<td width="60%" bgcolor="#A5C2D1"><?=$row['name']?></td>
			<td width="20%" bgcolor="#A5C2D1" align="center"><a href="#" onClick="request(<?=$row['id']?>)">Request TKD</a></td>
		</tr>
		<?	
			}
		?>	
		<tr>
			<td colspan="3">
				<font color="#000000">* Jika Pola anda adalah X maka TKD otomatis dilakukan 2 kali.<br>* Jika anda TKD dengan pola X maka otomatis dilakukan 2 kali.</font><br>
			</td>
		</tr>
	</table>

<?
	}
}else{
//jika sudah inilah hasilnya

?>
	<table width="700" border="0" cellpadding="5" cellspacing="1" class="bodylinein" align="center">
		<tr>
			<td width="20%" align="center" bgcolor="#60809F"><b>Tanggal TKD</b></td>
			<td width="20%" align="center" bgcolor="#60809F"><b>Pemohon</b></td>
			<td width="10%" align="center" bgcolor="#60809F"><b>Pola Pemohon</b></td>
			<td width="20%" align="center" bgcolor="#60809F"><b>Termohon</b></td>
			<td width="10%" align="center" bgcolor="#60809F"><b>Pola Termohon</b></td>
			<td width="20%" align="center" bgcolor="#60809F"><b>Status</b></td>
		</tr>
		<?
			//$sql1="select count(*) as jml from app_listtkd";
			//$res1=mysql_query($sql1);
			//$row1=mysql_fetch_array($res1);
			//$rowspan=$row1['jml'];
			$sql="select a.karyawan1,a.polaasli, a.polatukar, a.tglmasuk as tglmasuk,a.status as status ,b.name as pemohon,c.name as termohon from app_listtkd a,cc147_main_users b,cc147_main_users c where a.karyawan1=b.user_id and a.karyawan2=c.user_id and a.karyawan1=$iduser and status=0 order by tglmasuk asc";			
			//echo $sql;
			$res=mysql_query($sql);
			$loop=1;
			while($row=mysql_fetch_array($res)){
			//if($loop==1){
			//	$statusnya=$row['status'];
			//}else{
			//	$statusnya='';
			//}
			if($karyawan1<>$row['karyawan1'] || $karyawan1==''){
				$statusnya=$row['status'];
				$karyawan1=$row['karyawan1'];
				$rowspan=2;
				$tampil=1;
			}else{
				$statusnya='';
				$tampil=0;
			}
		?>
		<tr>
			<td width="20%" bgcolor="#A5C2D1" align="center"><?=$row['tglmasuk']?></td>
			<td width="20%" bgcolor="#A5C2D1"><?=$row['pemohon']?></td>
			<td width="10%" bgcolor="#A5C2D1" align="center"><?=$row['polaasli']?></td>
			<td width="20%" bgcolor="#A5C2D1"><?=$row['termohon']?></td>
			<td width="10%" bgcolor="#A5C2D1" align="center"><?=$row['polatukar']?></td>
			
			<? if($tampil=='1'){ ?>	
			<td width="20%" bgcolor="#A5C2D1" align="center" rowspan="<?=$rowspan?>" valign="middle">
			<?  if($statusnya=='0') echo "Pending"; else if($statusnya=='1') echo "Approve"; else if($statusnya=='2') echo "Reject";?><br>
			</td>
			<? }?>	
		</tr>
		<?			
			}
		
		?>	
	</table>	


<?
}

?>
<input type="hidden" name="iduser_target" value="<?=$iduser_target?>">
</form>	
</body>
</html>
<?
//perintah sqlnya
if($iduser_target<>''){


if(trim($polaasli)=='X'){
//asline libur malih masuk
// jika polaasli x, libur e arek e tak pek
	
	//$sqlcek="select a.pola as pola1, b.pola as pola2, a.tglmasuk as tgl from app_roosterfix a,app_roosterfix b where b.pola='X' and a.tglmasuk=b.tglmasuk and a.tglmasuk > '$tanggal 00:00:00' and a.karyawan='$iduser' and b.karyawan='$iduser_target' and b.keterangan = '' limit 1";
	//echo $sqlcek;
	
	
	//ambil rooster libur pengganti sing ditukar i
	$sqlcek="select tglmasuk as tgl, pola from app_roosterfix  where pola='X' and tglmasuk > '$tanggal 00:00:00' and karyawan='$iduser_target' and keterangan = '' limit 1";
	$rescek=mysql_query($sqlcek);
	if(mysql_num_rows($rescek)>0){
		$rowcek=mysql_fetch_array($rescek);
		
		//ambil rooster libur pengganti sing ngejak tukar
		$sqlasli="select pola from app_roosterfix where tglmasuk='".$rowcek['tgl']."' and karyawan='$iduser' and keterangan = ''";
		$resasli=mysql_query($sqlasli);
		if(mysql_num_rows($resasli)>0){
				$rowasli=mysql_fetch_array($resasli);
				$flag=$iduser."-".$iduser_target;
				//tukar sebenarnya
				$sql="insert into app_listtkd(tglmasuk,jabatan,kelamin,karyawan1,polaasli,karyawan2,polatukar,status,flag)";
				$sql.=" values('$tanggal','$jabatan','$kelamin','$iduser','$polaasli','$iduser_target','$pola',0,'$flag')";
				//echo $sql;
				mysql_query($sql);
				
				//tukar libur pengganti
				$sql="insert into app_listtkd(tglmasuk,jabatan,kelamin,karyawan1,polaasli,karyawan2,polatukar,status,flag)";
				$sql.=" values('".$rowcek['tgl']."','$jabatan','$kelamin','$iduser','".$rowasli['pola']."','$iduser_target','".$rowcek['pola']."',0,'$flag')";
				//echo $sql;
				mysql_query($sql);
										
							$tgl=date('Y-m-d');
							$jam=date('h:i:s');
				
							//$kepada = $rec["idn"];
						
							$subject="request tukar dinas dari ".$active_user_id;
							$message="Saudara ".$active_user_id." telah melakukan request TKD pada tanggal ".$tanggal." dan tanggal ".$rowcek['tgl'];
				
							$sql_in = "INSERT INTO cc147_main_primezilla_inbox (userid, userid_from, username_from, msg_date, msg_time, subject, message)";
							$sql_in .= " VALUES ('$iduser_target', '$iduser', '$active_user_id', '$tgl', '$jam', '$subject', '$message')";
							$masuk=mysql_query($sql_in);
		}else{
				?>
		<script language="JavaScript">
			alert('Rooster belum dibuat, anda tidak bisa tukar dinas');
			location.href='request.php';
		</script>
	<?	
		}
	?>
		<script language="JavaScript">
			location.href='request.php';
		</script>
	<?
	}else{
	?>
		<script language="JavaScript">
			alert('Rooster belum dibuat, anda tidak bisa tukar dinas');
			location.href='request.php';
		</script>
	<?
	}
}else if(trim($pola)=='X'){
//asline masuk malih libur
// jika tukar e libut maka, aq kudu ngijoli libur
	//$sqlcek="select a.pola as pola1, b.pola as pola2,a.tglmasuk as tgl from app_roosterfix a,app_roosterfix b where a.pola='X' and a.tglmasuk=b.tglmasuk and a.tglmasuk > '$tanggal 00:00:00' and a.karyawan='$iduser' and b.karyawan='$iduser_target' and b.keterangan = '' limit 1";
	//echo $sqlcek;
	
	//cek pola libur pengganti sing jaluk tukar
	$sqlcek="select tglmasuk as tgl,pola from app_roosterfix  where pola='X' and tglmasuk > '$tanggal 00:00:00' and karyawan='$iduser' and keterangan = '' limit 1";
	//echo $sqlcek;
	$rescek=mysql_query($sqlcek);
	if(mysql_num_rows($rescek)>0){
		$rowcek=mysql_fetch_array($rescek);
		
		//sing jaluk tukar libur e ketemu, gantian pasangane polanya apa
		$sqlasli="select pola from app_roosterfix where tglmasuk='".$rowcek['tgl']."' and karyawan='$iduser_target' and keterangan = ''";
		//echo $sqlasli;
		$resasli=mysql_query($sqlasli);
		if(mysql_num_rows($resasli)>0){
				$rowasli=mysql_fetch_array($resasli);
				$flag=$iduser."-".$iduser_target;
				//tukar sebenarnya
				$sql="insert into app_listtkd(tglmasuk,jabatan,kelamin,karyawan1,polaasli,karyawan2,polatukar,status,flag)";
				$sql.=" values('$tanggal','$jabatan','$kelamin','$iduser','$polaasli','$iduser_target','$pola',0,'$flag')";
				//echo $sql;
				mysql_query($sql);
				
				//tukar pengganti
				$sql="insert into app_listtkd(tglmasuk,jabatan,kelamin,karyawan1,polaasli,karyawan2,polatukar,status,flag)";
				$sql.=" values('".$rowcek['tgl']."','$jabatan','$kelamin','$iduser','".$rowcek['pola']."','$iduser_target','".$rowasli['pola']."',0,'$flag')";
				//echo $sql;
				mysql_query($sql);
							$tgl=date('Y-m-d');
							$jam=date('h:i:s');
				
							//$kepada = $rec["idn"];
						
							$subject="request tukar dinas dari ".$active_user_id;
							$message="Saudara ".$active_user_id." telah melakukan request TKD pada tanggal ".$tanggal." dan tanggal ".$rowcek['tgl'];
				
							$sql_in = "INSERT INTO cc147_main_primezilla_inbox (userid, userid_from, username_from, msg_date, msg_time, subject, message)";
							$sql_in .= " VALUES ('$iduser_target', '$iduser', '$active_user_id', '$tgl', '$jam', '$subject', '$message')";
							$masuk=mysql_query($sql_in);
		}else{
			?>
		<script language="JavaScript">
			alert('Rooster belum dibuat, anda tidak bisa tukar dinas');
			location.href='request.php';
		</script>
	<?		
		}
	?>
		<script language="JavaScript">
			location.href='request.php';
		</script>
	<?	
	}else{
	?>
		<script language="JavaScript">
			alert('Rooster belum dibuat, anda tidak bisa tukar dinas');
			location.href='request.php';
		</script>
	<?	
	}
}else{
//jika pola standart ini query nya
	$sql="insert into app_listtkd(tglmasuk,jabatan,kelamin,karyawan1,polaasli,karyawan2,polatukar,status)";
	$sql.=" values('$tanggal','$jabatan','$kelamin','$iduser','$polaasli','$iduser_target','$pola',0)";
	//echo $sql;
	mysql_query($sql);
					$tgl=date('Y-m-d');
	       			$jam=date('h:i:s');
		
					//$kepada = $rec["idn"];
				
					$subject="request tukar dinas dari ".$active_user_id;
					$message="Saudara ".$active_user_id." telah melakukan request TKD pada tanggal ".$tanggal;
		
					$sql_in = "INSERT INTO cc147_main_primezilla_inbox (userid, userid_from, username_from, msg_date, msg_time, subject, message)";
					$sql_in .= " VALUES ('$iduser_target', '$iduser', '$active_user_id', '$tgl', '$jam', '$subject', '$message')";
					$masuk=mysql_query($sql_in);

	?>
		<script language="JavaScript">
			location.href='request.php';
		</script>
	<?	
}	
}
?>
<iframe width=132 height=142 name="gToday:datetime:agenda.js" id="gToday:datetime:agenda.js" src="includes/tkddate/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
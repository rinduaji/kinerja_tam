<?php 

header('content-type=application/vhd.ms-exel');
header('content-Disposition:attachment;filename=laporan.xls');
?>
<body>
	<center><h1>Reporting Taping Area</h1></center>
	<table  data-toggle="table"  id="sample_xx" style="border: 1px solid #ddd; border-collapse: collapse; font-size:10; " border="1">
		<thead>
			<tr>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color:#f40000 ; color: white;">Tanggal</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white; #ffffff;">User Agent</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white; #ffffff;">Ani Number</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Tgl Record</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Record ID</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Durasi</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Parameter Taping Proses</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Parameter Taping Sikap</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">OFI</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Periode</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Human</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">System Prosedure</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Tools</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Reason Monitoring</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Tabber Penilai</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Area</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Rekomendasi TL</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Komitmen Agent</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Nilai Proses layanan</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Nilai Sikap layanan</th>
				<th style="padding-top: 3px; padding-bottom: 3px; background-color: #f40000 ; color: white;">Total QM</th>



			</tr>
		</thead>
		<tbody>
			<?php 
			if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
 require_once('koneksi.php');

$sql=mysqli_query($conn,"SELECT * FROM `app_kinerja_nilai` WHERE `lup_tl_name` = '$area' AND `tanggal` LIKE '%$bln%' ORDER BY `tanggal` DESC");
// echo "SELECT * FROM `app_kinerja_nilai` WHERE `area` = '$area' AND `tanggal` LIKE '%$bln%' ORDER BY `tanggal` DESC";
while($row=mysqli_fetch_row($sql)){


			 ?>

			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[13]; ?></td>
				<td><?php echo $row[4]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[6]; ?></td>
				<td><?php echo $row[7]; ?></td>
				<td><?php echo $row[8]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<td><?php echo $row[11]; ?></td>
				
				<td><?php echo $row[14]; ?></td>
				<td><?php echo $row[15]; ?></td>
				<td><?php echo $row[16]; ?></td>
				<td><?php echo $row[17]; ?></td>
				<td><?php echo $row[18]; ?></td>
				<td><?php echo $row[22]; ?></td>
				<td><?php echo $row[23]; ?></td>
				<td><?php echo $row[25]; ?></td>
				<td><?php echo $row[26]; ?></td>
				<td><?php echo $row[27]; ?></td>
				<td><?php $ss=$row[26]+$row[27];echo $ss; ?></td>

			</tr>

			<?php 
		}

			 ?>
		
		</tbody>
	</table>
</body>


 
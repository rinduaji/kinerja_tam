<?php

if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}
include("koneksi.php"); 

$bulan = date("m", strtotime($x_tgl_bina));
                            $tahun = date("Y", strtotime($x_tgl_bina));
                            
                            if($kategori_call != "") {
                                $whr = "AND kategori_call='$kategori_call'";
                            }
                            else {
                                $whr = '';
                            }

$query="SELECT a.user_id as login_agent,b.user2 as nama_agent,a.lup_qa as login_qco,a.nama_qco,a.tanggal as tanggal_tapping,a.tglrecord, a.jenis_call, a.kategori_call, a.ani as fastel, a.no_cp, 
a.proses_layanan, a.sikap_layanan, a.solusi_layanan, a.param_tapping_proses, a.param_tapping_sikap, a.param_tapping_solusi 
FROM app_kinerja_nilai as a 
INNER JOIN cc147_main_users_extended as b ON a.user_id=b.user1 
WHERE 
(a.tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir')  $whr ";
// echo $query;

$csv_export = '';
// query to get data from database
$data_query = mysqli_query($conn, $query);
$field = mysqli_field_count($conn);

// create line with field names
for($i = 0; $i < $field; $i++) {
    $csv_export.= mysqli_fetch_field_direct($data_query, $i)->name.';';
}

// newline (seems to work both on Linux & Windows servers)
$csv_export.= '
';

// loop through database query and fill export variable
while($row = mysqli_fetch_array($data_query)) {
    // create line with field values
    for($i = 0; $i < $field; $i++) {
        $csv_export.= ''.$row[mysqli_fetch_field_direct($data_query, $i)->name].';';
    }
    $csv_export.= '
    ';
}
// filename for export
$csv_filename = 'Data TAPPING QCO TAM ('.$tgl_awal.' sampai '.$tgl_akhir.').csv';
// Export the data and prompt a csv file for download
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=".$csv_filename."");
echo($csv_export);
<?php
session_start();
include("../app/koneksi.php");

if ($_POST['Save'] != "") {
    require('../assets/PHPOffice/Classes/PHPExcel.php');
    require('../assets/PHPOffice/Classes/PHPExcel/IOFactory.php');

    //upload data excel kedalam folder uploads
    $target_dir1 = "../upload/" . basename($_FILES['excel1']['name']);

    // var_dump($target_dir1);
    // header("Location: ../../uploads/".basename($_FILES['excel1']['name']));
    move_uploaded_file($_FILES['excel1']['tmp_name'], $target_dir1);
    $load = PHPExcel_IOFactory::load($target_dir1);
    $sheets = $load->getActiveSheet()->toArray(null, true, true, true);
    $total_data = count($sheets) - 1;

    $sql = "INSERT INTO app_kinerja_cuti (username, nama, tanggal, keterangan) VALUES";
    for ($i = 2; $i <= count($sheets); $i++) {
        $username = $sheets[$i]['A'];
        $nama = $sheets[$i]['B'];
        $tanggal = date("Y-m-d", strtotime($sheets[$i]['C']));
        $keterangan = $sheets[$i]['D'];

        if ($username != "" and $tanggal != "") {
            $sql .= " ('$username', '$nama', '$tanggal', '$keterangan'),";
        }
    }

    $sql = substr($sql, 0, -1);

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    unlink($target_dir1);

    header("Location: form_import_cuti.php?status=succes");
} else {
    header("Location: form_import_cuti.php?status=gagal");
}

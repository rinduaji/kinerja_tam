<?php
include("koneksi.php"); 
$id = $_GET['id'];
$sql3="DELETE FROM app_kinerja_cuti where id = $id";

   //echo "$sql3";

mysqli_query($conn,$sql3);
header("Location: http://10.194.41.7/moniqa/app/list_cuti.php?status=sukses delete");exit();
?>
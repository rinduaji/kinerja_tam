<?php
include("koneksi.php"); 
$id = $_GET['id'];
$sql3="DELETE FROM news where id = $id";

   //echo "$sql3";

mysqli_query($conn,$sql3);
header("Location: http://10.194.41.7/moniqa/app/news.php?status=sukses delete");exit();
?>
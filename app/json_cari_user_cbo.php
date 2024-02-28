
<?php 
if ($_GET) {extract($_GET,EXTR_OVERWRITE);}
if ($_POST){extract($_POST,EXTR_OVERWRITE);}

include 'koneksi.php';
 


$query = "SELECT user1,user2 FROM `cc147_main_users_extended` as a INNER JOIN cc147_main_users as b ON a.user1=b.username WHERE a.user3='Agent TAM' AND a.user7='$area' AND b.qco = '$login'";
$hasil  =mysqli_query($conn, $query);
 
 
if(mysqli_num_rows($hasil) > 0 ){
  $response = array();
  $response["rows"] = array();
  
    $h['value'] = "";
    $h['name'] = "Login \/ User --";
array_push($response["rows"], $h);
  while($x = mysqli_fetch_array($hasil)){
  	
  	

    $h['value'] = $x["user1"];
    $h['name'] = $x["user2"];
   
    array_push($response["rows"], $h);
  }
  echo json_encode($response);
}else {
  $response["message"]="tidak ada data";
  echo json_encode($response);

}


?>


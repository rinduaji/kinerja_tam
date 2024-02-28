<?php
if ($_GET['jbtn']) {$jbtn=$_GET['jbtn'];}
if ($_POST['msg_to2']){$_POST['msg_to']=$_POST['msg_to2'];}
if ( strlen ($_POST['msg_to']) > 1) {

    $host = "172.5.5.70";
    $database = "maincc147";
    $database_prefix = "cc147_main";
    $user = "root";
    $password = "adminccsby";
	
    mysql_connect( $host, $user, $password);
    mysql_select_db( $database);
	if(is_numeric($_POST['msg_to'])){$cari="a.username LIKE '" . $_POST['msg_to'] . "%'";}else{$cari="a.name LIKE '%" . $_POST['msg_to'] . "%'";}
	if ($jbtn){if ($jbtn=='Agent 108'){$wjbtn="AND b.user3 in ('Agent 108')";}
	elseif ($jbtn=='Agent Citilink'){$wjbtn="AND b.user3 in ('Agent Citilink','Agent Citilink Out')";}else{$wjbtn="AND b.user3 like '$jbtn'";}}else{$wjbtn="";}
    $sql = "SELECT a.username, a.name FROM ".$database_prefix."_users a, ".$database_prefix."_users_extended b WHERE $cari AND a.user_level>0 AND a.username != 'admin' AND b.user13='AKTIF' $wjbtn AND a.user_id=b.user_id";
    $rs  = mysql_query( $sql);
?>


    <ul>

    <?php
    while( $data = mysql_fetch_assoc( $rs)) {
    ?>
        <li><b><?php echo stripslashes( $data['username']);?></b><span class="informal"> (<?php echo stripslashes( $data['name']);?>)</span></li>
    <?php
    }
    ?>

    </ul>

<?php
}
else {
    echo "Direct Access to this location is not allowed.";
}
?>
<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}
?>
<?php
include "../../connection.php";
?>
<?php
if ( isset($_POST['button1']))
{
	$msduan=$_POST['msduan'];
	$sdt=$_POST['sdt'];
	$order=$_POST['order'];

	// query mskh
	$sql= "SELECT * FROM khachhang where sdt='$sdt'";
	$query= mysql_query($sql);
	$mskh=mysql_fetch_array($query);
	$mskh=$mskh['mskh'];

	$mstutemp=$msduan.$mskh.$order;
	echo $mstutemp;
}
?>
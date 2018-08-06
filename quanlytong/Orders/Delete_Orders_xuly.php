<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}

include "../../connection.php";

?>
<?php
$msduan=$_POST['msduan'];
  $sdt=$_POST['sdt'];
  $order=$_POST['order'];
  $mskh=$_POST['mskh'];
  $mstutemp=$msduan.$mskh.$order;
// echo "$msduan $sdt $or?der $mskh $mstutemp";
  mysql_query("DELETE FROM tu where mstu like '%$mstutemp%'");
  mysql_query("DELETE FROM donhang where sdt='$sdt' and msduan='$msduan' and landat='$order' ");

?>
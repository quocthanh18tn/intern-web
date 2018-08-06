<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}

include "../../connection.php";

?>
<?php
$mstu=$_POST['mstu'];
// echo "$msduan $sdt $or?der $mskh $mstutemp";
        mysql_query("DELETE FROM tu where mstu='$mstu'");

?>
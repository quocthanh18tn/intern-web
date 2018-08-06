<?php
include "../connection.php";
?>


<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <title>MMS-HAI NAM AUTOMATION</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<?php


// username và password được gửi từ form đăng nhập
$ID=$_POST['ID'];
$password=$_POST['password'];

// Xử lý để tránh MySQL injection
$ID = stripslashes($ID);
$password = stripslashes($password);
$ID = mysql_real_escape_string($ID);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM quanly WHERE msquanly='$ID' and password='$password' and msloai='1'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
if($count==1){

// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công
session_start();
$_SESSION['id_tong'] = "$ID";

?>
 <script type="text/javascript">
    $(document).ready(function(){
   swal({
  title: "Welcome !",
  text: "You enter successfully!",
  icon: "success",
})
   .then((willDelete) => {
   window.location='home.php';
});
});
</script>
<?php
}
else {
	?>

	<script type="text/javascript">
    $(document).ready(function(){
   swal({
  title: "Sorry!",
  text: "Wrong Username or Password",
  icon: "error",
  dangerMode: true,
})
   .then((willDelete) => {
   window.location='main_login_tong.php';
})
});
</script>
<?php


}
?>
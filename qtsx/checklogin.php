<?php
include "../connection.php";
?>

<?php

 
// username và password được gửi từ form đăng nhập
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
 
// Xử lý để tránh MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
 
$sql="SELECT * FROM quanly WHERE msquanly='$myusername' and password='$mypassword' and (msloai = '21' or msloai = '22' or msloai = '23' or msloai = '24' or msloai = '25' or msloai = '26' or msloai = '27' or msloai ='2')";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
if($count==1){
 
// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công
session_start();
$_SESSION['myusername'] = "$myusername";
header("location:qtsx.php");
}
else {
echo "<script type='text/javascript'>alert('Wrong ID or password');
window.location='main_login.php';
</script>";
}
?>
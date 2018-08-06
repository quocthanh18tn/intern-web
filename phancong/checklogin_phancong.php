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

$sql="SELECT * FROM quanly WHERE msquanly='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
if($count==1)
{
	$msloai = mysql_fetch_array($result)['msloai'];
	session_start();
	switch ($msloai) {
		case 2:
		case 21:
		case 22:
		case 23:
		case 24:
		case 25:
		case 26:
		case 27:
			$_SESSION['quanly']=$msloai;
			header("location:phancongcongviec.php");
			break;
		default:
			echo "Sai tên đăng nhập hoặc mật khẩu";
			break;
	}
}
else {
echo "<script type='text/javascript'>alert('Wrong ID or password');
window.location='main_login_phancong.php';
</script>";
}
?>
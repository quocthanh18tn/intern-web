<?php
include "../connection.php";
?>
<?php
$mskhungtu=$_POST['mskhungtu'];
$msgd=$_POST['msgd'];
function xacnhanketthuc($mskhungtu,$msgd)
{
	$sql = mysql_query("SELECT * FROM qtsx WHERE  mskhungtu='$mskhungtu' AND msgd ='$msgd' AND xacnhan_ql IS NOT NULL AND xacnhan_qc IS NOT NULL ");
	if(mysql_num_rows($sql)==1)
	{	
		$date_finish_tam = mysql_fetch_array($sql)['date_finish_tam'];
		$sql = mysql_query("UPDATE qtsx SET date_finish = '$date_finish_tam' WHERE mskhungtu='$mskhungtu' AND msgd ='$msgd'");
		$sql = mysql_query("SELECT * FROM qtsx WHERE  mskhungtu='$mskhungtu' AND msgd ='$msgd' AND date_finish IS NOT NULL ");
		if(mysql_num_rows($sql)==1) echo '<script>alert("THÀNH CÔNG,ĐÃ XÁC NHẬN HOÀN THÀNH CÔNG VIỆC");window.location="qtsx.php";</script>';
		else '<script>alert("VUI LÒNG THỬ LẠI");location.reload();</script>';
	}
	else echo '<script>alert("THÀNH CÔNG");location.reload();</script>';
}
?>
<?php
if(isset($_POST['idql']))
{
	$id =$_POST['idql'];
	$pass=$_POST['pass'];
	$sql = mysql_query("SELECT * FROM quanly WHERE msquanly ='$id' and password = '$pass'");
	if(mysql_num_rows($sql)==1)
	{
		$msloai = mysql_fetch_array($sql)['msloai'];
		if ($msloai == 2||$msloai == 21||$msloai == 22||$msloai == 23||$msloai == 24||$msloai == 25||$msloai == 26||$msloai == 27)
		{
			$sql=mysql_query("UPDATE qtsx SET xacnhan_ql='$id' WHERE mskhungtu='$mskhungtu' AND msgd ='$msgd'");
			$sql=mysql_query("SELECT * FROM qtsx WHERE xacnhan_ql='$id' and mskhungtu='$mskhungtu' AND msgd ='$msgd'");
			$num = mysql_num_rows($sql);
			if ($num ==1) xacnhanketthuc($mskhungtu,$msgd);
			else echo '<script>alert("VUI LÒNG THỬ LẠI")</script>';
		}
		else echo '<script>alert("BẠN KHÔNG ĐƯỢC CẤP QUYỀN NÀY")</script>';
	}
	else echo '<script>alert("SAI ID HOẶC MẬT KHẨU")</script>';
}
if(isset($_POST['idqc']))
{
	$id =$_POST['idqc'];
	$pass=$_POST['pass'];
	$sql = mysql_query("SELECT * FROM quanly WHERE msquanly ='$id' and password = '$pass'");
	if(mysql_num_rows($sql)==1)
	{
		$msloai = mysql_fetch_array($sql)['msloai'];
		if ($msloai == 3)
		{
			$sql=mysql_query("UPDATE qtsx SET xacnhan_qc='$id' WHERE mskhungtu='$mskhungtu' AND msgd ='$msgd'");
			$sql=mysql_query("SELECT * FROM qtsx WHERE xacnhan_qc='$id' and mskhungtu='$mskhungtu' AND msgd ='$msgd'");
			$num = mysql_num_rows($sql);
			if ($num ==1) xacnhanketthuc($mskhungtu,$msgd);
			else echo '<script>alert("VUI LÒNG THỬ LẠI")</script>';
		}
		else echo '<script>alert("BẠN KHÔNG ĐƯỢC CẤP QUYỀN NÀY")</script>';
	}
	else echo '<script>alert("SAI ID HOẶC MẬT KHẨU")</script>';
}
if(isset($_POST['id_delete']))
{
	$id =$_POST['id_delete'];
	$pass=$_POST['pass'];
	$sql = mysql_query("SELECT * FROM quanly WHERE msquanly ='$id' and password = '$pass'");
	if(mysql_num_rows($sql)==1)
	{
		$msloai = mysql_fetch_array($sql)['msloai'];
		if ($msloai == 2||$msloai == 21||$msloai == 22||$msloai == 23||$msloai == 24||$msloai == 25||$msloai == 26||$msloai == 27||$msloai == 3)
		{
			$sql=mysql_query("UPDATE qtsx SET date_finish_tam = NULL,xacnhan_ql = NULL,xacnhan_qc = NULL WHERE mskhungtu='$mskhungtu' AND msgd ='$msgd'");
			$sql=mysql_query("SELECT * FROM qtsx WHERE mskhungtu='$mskhungtu' AND msgd ='$msgd' AND date_finish_tam IS NULL");
			$num = mysql_num_rows($sql);
			if ($num ==1) echo '<script>alert("UNFINISH THÀNH CÔNG");window.location="qtsx.php";</script>';
			else echo '<script>alert("VUI LÒNG THỬ LẠI");location.reload();</script>';
		}
		else echo '<script>alert("BẠN KHÔNG ĐƯỢC CẤP QUYỀN NÀY")</script>';
	}
	else echo '<script>alert("SAI ID HOẶC MẬT KHẨU")</script>';
}
?>
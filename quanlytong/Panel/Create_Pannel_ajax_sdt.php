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

	$msduan = $_POST['msduan'];
	if (strlen($msduan)==6)
	{
	if (mysql_num_rows(mysql_query("SELECT * FROM duan where msduan='$msduan'"))!=0)
	{
	$sql = "SELECT  DISTINCT khachhang.sdt,khachhang.tenkh FROM donhang inner join khachhang where donhang.sdt = khachhang.sdt and msduan='$msduan'";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);

	if($num > 0){
?>
  	<option value ="">Select ...</option>
<?php
		while($row = mysql_fetch_array($query)){


?>

		<option value="<?php echo $row['sdt']?>"> <?php echo "$row[tenkh]: $row[sdt]  " ?></option>

<?php
		}
	}
}
	else
        echo '<script>alert("Project ID is not existed")</script>';
}
?>

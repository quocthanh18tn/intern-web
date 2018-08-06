<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:main_login_tong.php");
}

?>
<?php
include "../connection.php";
?>

<?php
	$msduan = $_POST['msduan'];
	$sdt = $_POST['sdt'];
	$sql = "SELECT * FROM donhang where sdt='$sdt' and msduan='$msduan'";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);

	if($num > 0){
?>	 
	<option value ="">Select ...</option>
<?php
		while($row = mysql_fetch_array($query)){


?>

	<option value="<?php echo $row['landat']?>"> <?php echo $row['landat'] ?></option>

<?php
		}
	}
?>

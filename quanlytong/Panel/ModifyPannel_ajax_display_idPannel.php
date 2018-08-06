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
	$order = $_POST['order'];
	$sql= "SELECT * from donhang where landat='$order'";
	$query=mysql_query($sql);
	$query=mysql_fetch_array($query);
	$sdt=$query['sdt'];
	// query mskh
	$sql = "SELECT * from khachhang where sdt='$sdt'";
	$query=mysql_query($sql);
	$query=mysql_fetch_array($query);
	$mskh=$query['mskh'];
	$mstutemp=$msduan.$mskh.$order;

	if (strlen($msduan)==6)
	{
	$sql = "SELECT * FROM tu  where  mstu like '%$mstutemp%'";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);

	if($num > 0){
?>
  	<option value ="">Select ...</option>
<?php
		while($row = mysql_fetch_array($query)){


?>

	<option value="<?php echo $row['mstu']?>"> <?php echo "$row[mstu]: $row[tentu]  " ?></option>

<?php
		}
	}

}
?>

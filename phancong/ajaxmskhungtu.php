 <!-- code xu ly display khung tu -->
<?php
include "../connection.php";
?>

<?php
	$mstu = $_POST['id'];
	$sql = "select * from khungtu where mstu = '$mstu'";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	if($num > 0){
?>
	<option value ="">Select ...</option>
<?php
		while($row = mysql_fetch_array($query)){


?>

	<option value="<?php echo $row['mskhungtu']?>"><?php echo $row['mskhungtu']?></option>

<?php
		}
	}
?>
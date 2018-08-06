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

		$sdt=$_POST['sdt'];
		$sql="SELECT * FROM khachhang where sdt='$sdt'";
		$query=mysql_query($sql);
		$tenkh=mysql_fetch_array($query);
		$num=mysql_num_rows($query);
		if ( $num==0 && $sdt!="")
		{
			?>
			<span style="color: green; text-align: center;"> Valid</span>
			<?php
		}


		elseif ($num==1)

		{
			?>
			<span style="color: red; text-align: center;margin-left: 120px;"> Invalid.This is <?php echo $tenkh['tenkh']?> 's Phone</span>
			<?php

}
		?>


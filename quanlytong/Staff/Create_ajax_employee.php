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

		$id=$_POST['id'];
		$sql="SELECT * FROM nhanvien where msnv='$id'";
		$query=mysql_query($sql);
		$num=mysql_num_rows($query);
		if ( $num==0 && $id!="")
		{
			?>
			<span style="color: green; text-align: center;margin-left: 120px;"> Valid</span>
			<br>

			<?php
		}


		elseif ($num==1)

		{
			?>
			<span style="color: red; text-align: center;margin-left: 120px;"> Invalid. ID is existed</span>
			<br>
			<?php

}
		?>


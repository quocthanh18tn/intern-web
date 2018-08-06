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

		$msduan=$_POST['msduan'];
		$sql="SELECT * FROM duan where msduan='$msduan'";
		$query=mysql_query($sql);
		$num=mysql_num_rows($query);
		if ( $num==0 && $msduan!="" && strlen($msduan)==6)
		{
			?>
			<span style="color: green; text-align: center;margin-left: 120px;"> Valid</span>
			<?php
		}


		elseif ($num==1  )

		{
			?>
			<span style="color: red; text-align: center;margin-left: 120px;"> Invalid. ID is existed</span>
			<?php

}
		
		elseif (strlen($msduan)!=6 && $msduan!="" )

		{
			?>
			<span style="color: red; text-align: center;margin-left: 120px;"> Invalid</span>
			<?php

}
		?>


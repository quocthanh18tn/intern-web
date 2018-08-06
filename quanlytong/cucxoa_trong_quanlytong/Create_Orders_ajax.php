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
		$num=mysql_num_rows($query);
		if ( $num==0 && $sdt!="")
		{
			?>
			<span style="color: red; text-align: center;margin-left: 20px;">  Phone is not existed</span>
			<?php
		}


		elseif ($num==1)
		{
                      $tb=mysql_query("SELECT * FROM khachhang where sdt='$sdt'  ");


			 if ($tb!="")
      {
      	?>
      	    <table class="table " style="border: solid 2px;width: 90%;margin-left: 50px;">

  <tr style="border: solid 2px;">
    <th style="border: solid 2px;">Customer Code</th>
    <th style="border: solid 2px;">Name</th>
    <th style="border: solid 2px;">Company</th>
    <th style="border: solid 2px;">Phone</th>
  </tr>
  <?php
    while ( $temp=mysql_fetch_array($tb) )
    {

    ?>

    <tr >
    <td style="border: solid 2px;"><?php echo $temp[0];?></td>
    <td style="border: solid 2px;"><?php echo $temp[1];?></td>
    <td style="border: solid 2px;"><?php echo $temp[2];?></td>
    <td style="border: solid 2px;"><?php echo $temp[4];?></td>
    </tr>
			<?php

}
}}
		?>
		</table>


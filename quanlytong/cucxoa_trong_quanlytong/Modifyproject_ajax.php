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
		$name="";
		$msduan=$_POST['msduan'];
		$project_sql="SELECT * FROM duan where msduan='$msduan'";
		$project_query=mysql_query($project_sql);
		$project_num=mysql_num_rows($project_query);

		$panel_sql="SELECT * FROM tu where msduan='$msduan'";
		$panel_query=mysql_query($panel_sql);
		$panel_num=mysql_num_rows($panel_query);

		$order_sql="SELECT * FROM donhang where msduan='$msduan'";
		$order_query=mysql_query($order_sql);

 			while ($order_num=mysql_fetch_array($order_query)) {
					$order_sdt=$order_num['sdt'];
					$orders_order=$order_num['landat'];
					$customer_sql="SELECT * FROM khachhang where sdt='$order_sdt'";
					$customer_query=mysql_query($customer_sql);
					$customer_num=mysql_fetch_array($customer_query);
					$customer_name=$customer_num['tenkh'];
					$temp="order $orders_order : $customer_name <br>";
					$name="$name $temp";

 			}






		if ( $project_num==0 && $msduan!="")
		{
			?>
			<span style="color: red; text-align: center;margin-left: 250px;font-size: 18px;"> InValid. ID is not existed</span>
			<?php
		}
		elseif ($project_num==1)
		{
                      $tb=mysql_query("SELECT * FROM duan where msduan='$msduan'  ");


			 if ($tb!="")
      {
      	?>
      	    <table class="table " >

  <tr style="border: solid 2px;">
    <th style="border: solid 2px;">Project ID</th>
    <th style="border: solid 2px;">Name</th>
    <th style="border: solid 2px;">Number of Panel</th>
    <th style="border: solid 2px;">Customer</th>
  </tr>
  <?php
    while ( $temp=mysql_fetch_array($tb) )
    {

    ?>

    <tr >
    <td style="border: solid 2px;"><?php echo $temp[0];?></td>
    <td style="border: solid 2px;"><?php echo $temp[1];?></td>
    <td style="border: solid 2px;"><?php echo $panel_num;?></td>
    <td style="border: solid 2px;"><?php echo $name;?></td>
    </tr>
			<?php

}
}}
		?>
		</table>

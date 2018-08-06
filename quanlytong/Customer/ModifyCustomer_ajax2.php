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
		$sdt=$_POST['sdt'];
		// $sql="SELECT * FROM khachhang where sdt='$sdt'";
		// $query=mysql_query($sql);
		// $num=mysql_num_rows($query);

                      $tb=mysql_query("SELECT * FROM khachhang where sdt='$sdt' ");

?>
   <table class="table " style="border: solid 1px;">
<?php
      if ($tb!="")
      {
    while ( $temp=mysql_fetch_array($tb) )
    {

    ?>
    <tr>
    <th style="border: solid 1px;">Name</th>
    <th style="border: solid 1px;">Phone</th>
    <th style="border: solid 1px;">Company</th>
    <th style="border: solid 1px;">Address</th>
  </tr>
    <tr>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temp[1];?></td>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temp[4];?></td>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temp[2];?></td>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temp[3];?></td>
    </tr>
    <?php
  }
}
?>
</table>




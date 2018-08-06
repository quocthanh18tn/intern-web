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
		// $sql="SELECT * FROM khachhang where sdt='$sdt'";
		// $query=mysql_query($sql);
		// $num=mysql_num_rows($query);

                      $tb=mysql_query("SELECT * FROM khachhang where sdt='$sdt' ");

?>
   <table class="table " style="border: solid 2px;">
<?php
      if ($tb!="")
      {
    while ( $temp=mysql_fetch_array($tb) )
    {

    ?>
    <tr>
    <th style="border: solid 2px;">Name</th>
    <td style="border: solid 2px;"><?php echo $temp[1];?></td>
  </tr>
    <tr>
    <th style="border: solid 2px;">Phone</th>
    <td style="border: solid 2px;"><?php echo $temp[4];?></td>
    </tr>
    <tr>
    <th style="border: solid 2px;">Company</th>
    <td style="border: solid 2px;"><?php echo $temp[2];?></td>
    </tr>
    <tr>
    <th style="border: solid 2px;">Address</th>
    <td style="border: solid 2px;"><?php echo $temp[3];?></td>
    </tr>
    <?php
  }
}
?>
</table>




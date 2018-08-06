<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}
?>

<?php
include "../../connection.php";
                      $msduan=$_POST['msduan'];
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
                      if ( mysql_num_rows(mysql_query("SELECT * FROM tu where msduan='$msduan'"))!=0)
                    {
?>


<p style="clear: left;font-size: 20px;">Panel Information</p>
            <table class="table " style="border: solid 2px;">

  <tr>
    <th style="border: solid 2px;" >ID Pannel</th>
    <th style="border: solid 2px;" >Name</th>
    <th style="border: solid 2px;" >Number of Column</th>
    <th style="border: solid 2px;">FAT</th>
    <th style="border: solid 2px;">Delivery</th>
    <th style="border: solid 2px;">Adjust_FAT</th>
    <th style="border: solid 2px;">Adjust_Delivery</th>
    <th style="border: solid 2px;">Actual_Delivery</th>
  </tr>
                    <?php
                      $tb=mysql_query("SELECT * FROM tu where mstu like '%$mstutemp%'");
    while ( $temp=mysql_fetch_array($tb))
    {
            $sql="SELECT * FROM khungtu where mstu ='$temp[0]'";
            $numcolumn=mysql_num_rows(mysql_query($sql));
    ?>
    <tr>
    <td style="border: solid 2px;"><?php echo $temp[0];?></td>
    <td style="border: solid 2px;"><?php echo $temp[2];?></td>
    <td style="border: solid 2px;"><?php echo $numcolumn;?></td>
    <td style="border: solid 2px;"><?php echo $temp[3];?></td>
    <td style="border: solid 2px;"><?php echo $temp[4];?></td>
    <td style="border: solid 2px;"><?php echo $temp[5];?></td>
    <td style="border: solid 2px;"><?php echo $temp[6];?></td>
    <td style="border: solid 2px;"><?php echo $temp[7];?></td>
    </tr>
    <?php
  }
}
}
?>
<?php


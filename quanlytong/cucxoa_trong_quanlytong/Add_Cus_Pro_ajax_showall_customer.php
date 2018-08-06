<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:main_login_tong.php");
}

?>

<?php
include "../connection.php";
?>


            <table class="table ">

  <tr>
    <th >Customer Code</th>
    <th >Name</th>
    <th >Company</th>
    <th >Phone</th>
  </tr>
                    <?php
                      $customer=$_POST['customer'];
                      if ($customer=='showall')
                    {
                      $tb=mysql_query("SELECT * FROM khachhang  ");
                    }
                    elseif ($customer!="" && $customer!="showall")
                    {
                      $tb=mysql_query("SELECT * FROM khachhang where  tenkh like'%$customer%' or mskh like '%$customer%' or sdt like '%$customer%' or tencongty like '%$customer%' ");
                    }
                    else $tb="";

                    ?>
  <?php
      if ($tb!="")
      {
    while ( $temp=mysql_fetch_array($tb) )
    {

    ?>
    <tr>
    <td><?php echo $temp[0];?></td>
    <td><?php echo $temp[1];?></td>
    <td><?php echo $temp[2];?></td>
    <td><?php echo $temp[4];?></td>
    </tr>
    <?php
  }
}
?>


</table>
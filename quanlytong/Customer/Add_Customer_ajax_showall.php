<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}

?>

<?php
include "../../connection.php";
?>


            <table class="table ">

  <tr>
    <th class="word1">Customer Code</th>
    <th class="word1">Name</th>
    <th class="word1">Company</th>
    <th class="word1">Phone</th>
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
    <td class="word1"><?php echo $temp[0];?></td>
    <td class="word1"><?php echo $temp[1];?></td>
    <td class="word1"><?php echo $temp[2];?></td>
    <td class="word1"><?php echo $temp[4];?></td>
    </tr>
    <?php
  }
}
?>


</table>
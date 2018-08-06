     <?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}
?>
<?php
include "../../connection.php";
?>
            <table class="table " style="border: solid 1px;">

  <tr>
    <th style="border: solid 1px;" >Name</th>
    <th style="border: solid 1px;">Number of Column</th>
    <th style="border: solid 1px;">FAT Date</th>
    <th style="border: solid 1px;">Delivery Date</th>
    <th style="border: solid 1px;">Adjust FAT Date</th>
    <th style="border: solid 1px;">Adjust Delivery Date</th>
  </tr>
                    <?php
                    $mstu=$_POST['id'];

                      $tbpanel=mysql_query("SELECT * FROM tu where mstu='$mstu'");
                  $tbcolumn=mysql_query("SELECT * FROM khungtu where mstu='$mstu'");
     $temppanel=mysql_fetch_array($tbpanel);
         $tempcolumn=mysql_num_rows($tbcolumn);
    ?>
    <tr>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temppanel[2];?></td>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $tempcolumn;?></td>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temppanel[3];?></td>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temppanel[4];?></td>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temppanel[5];?></td>
    <td style="border: solid 1px;font-weight: normal;"><?php echo $temppanel[6];?></td>
    </tr>
    <?php

?>

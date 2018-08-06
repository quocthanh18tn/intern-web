     <?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:main_login_tong.php");
}
?>
<?php
include "../connection.php";
?>
            <table class="table " style="border: solid 2px;">

  <tr>
    <th style="border: solid 2px;" >Name</th>
    <th style="border: solid 2px;">Number of Panel</th>
    <th style="border: solid 2px;">Fat</th>
    <th style="border: solid 2px;">Delivery</th>
    <th style="border: solid 2px;">Adjust Fat</th>
    <th style="border: solid 2px;">Adjust Delivery</th>
  </tr>
                    <?php
                    $mstu=$_POST['id'];

                      $tbpanel=mysql_query("SELECT * FROM tu where mstu='$mstu'");
                  $tbcolumn=mysql_query("SELECT * FROM khungtu where mstu='$mstu'");
     $temppanel=mysql_fetch_array($tbpanel);
         $tempcolumn=mysql_num_rows($tbcolumn);
    ?>
    <tr>
    <td style="border: solid 2px;"><?php echo $temppanel[2];?></td>
    <td style="border: solid 2px;"><?php echo $tempcolumn;?></td>
    <td style="border: solid 2px;"><?php echo $temppanel[3];?></td>
    <td style="border: solid 2px;"><?php echo $temppanel[4];?></td>
    <td style="border: solid 2px;"><?php echo $temppanel[5];?></td>
    <td style="border: solid 2px;"><?php echo $temppanel[6];?></td>
    </tr>
    <?php

?>

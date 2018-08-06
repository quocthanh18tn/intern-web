<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}

?>

<?php
include "../../connection.php";
?>


            <table class="table " style="border: solid 1px;width: 90%;margin-left: 4%;">

  <tr>
    <th class="word1" style="border: solid 1px;">Project ID</th>
    <th class="word1" style="border: solid 1px;">Name</th>
  </tr>
                    <?php
                      $value=$_POST['value'];
                      if ($value=='showall')
                    {
                      $tb=mysql_query("SELECT * FROM duan  ");
                    }
                    elseif ($value!="" && $value!="showall")
                    {
                      $tb=mysql_query("SELECT * FROM duan where  tenduan like'%$value%' or msduan like '%$value%' ");
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
    <td class="word1" style="border: solid 1px;"><?php echo $temp[0];?></td>
    <td class="word1" style="border: solid 1px;"><?php echo $temp[1];?></td>
    </tr>
    <?php
  }
}
?>


</table>
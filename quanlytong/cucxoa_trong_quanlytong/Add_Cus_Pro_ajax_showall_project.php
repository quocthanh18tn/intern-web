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
    <th >Project ID</th>
    <th >Name</th>
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
    <td><?php echo $temp[0];?></td>
    <td><?php echo $temp[1];?></td>
    </tr>
    <?php
  }
}
?>


</table>
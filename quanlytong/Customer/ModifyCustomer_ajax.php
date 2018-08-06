<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}

?>

<?php
include "../../connection.php";
?>

<!DOCTYPE html>
<html>
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <script  type="text/javascript">

        $(document).ready(function(){

 // $("#text1").keyup(function(){

 //    var sdt = $("#text1").val();
 //    $.post("ModifyCustomer_ajax2.php", {sdt: sdt}, function(data){$("#display_check_phoneCus").html(data);})
 //  })

   $("#display_check_phoneCus").change(function(){
    var sdt	 = $("#display_check_phoneCus").val();
    $.post("ModifyCustomer_ajax2.php", {sdt: sdt}, function(data){$("#showall_details_customer").html(data);})
  })


   })

</script>

</head>
<?php

		$mskh=$_POST['mskh'];
		$sql="SELECT * FROM khachhang where mskh='$mskh'";
		$query=mysql_query($sql);
		$num=mysql_num_rows($query);
		if ( $num==0&& $mskh !='')
		{
			?>
			<span style="color: red; text-align: center;margin-left: 1%;"> Code is not existed</span>
			<?php
		}


		elseif ($num==1)

		{
			?>
      <br>
      <br>
			<lable for = "text1"  class="d-none">Customer Phone: </lable>
                      <input type ="text" name="text1" id="text1"  class="d-none"  > </input>
   <table class="table " style="border: solid 1px;">

                    <?php
                      $tb=mysql_query("SELECT * FROM khachhang where mskh='$mskh' ");

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

			<?php
}

		elseif ($num >=2)
{
			?>
			<span style="color: red; text-align: center;margin-left: 2%;">Have many code, please choose phone </span>
      <br>
			<br>
			<lable for = "text1" class="word" >Current Name: </label>
                      <select id="display_check_phoneCus" name="text1" class="text1">
                      <option value=""> SELECT ....</option>
             <?php
					while($row=mysql_fetch_array($query))
					{
						?>
						<option value="<?php echo $row['sdt'] ?>"> <?php echo $row['tenkh']?></option>
						<?php
					}
             ?>

                      </select>
                      <br>
                      <br>
                      <div id="showall_details_customer"></div>

			<?php
}
		?>


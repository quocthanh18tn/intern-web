<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
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
if(isset($_POST['button1']))
  {
      $text1=$_POST['text1'];     #no pannel
      $sql="SELECT * FROM khungtu where mstu='$text1'";
      $query=mysql_query($sql);
      $row=mysql_num_rows($query);
      $text2=$_POST['text2'];     #no frame
      if ( mysql_num_rows (mysql_query("SELECT * FROM tu where mstu='$text1'") )!=0)
        {
          if ($text2!="" && $text2<100)
          {
              for ($i=1;$i<=$text2;$i++)
              {
                if ( $i <10)
                {
                  $mskhungtu=$text1.'0'.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))==0)
                  mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$text1')");
                }
                else
                {
                  $mskhungtu=$text1.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))==0)
                  mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$text1')");
                }
              }
              for ( $i= $text2+1;$i<100;$i++)
              {
                if ($i<10)
                {
                  $mskhungtu=$text1.'0'.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("DELETE FROM  khungtu  where mskhungtu='$mskhungtu'");
                }
                else
                {
                  $mskhungtu=$text1.$i;
                if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("DELETE FROM  khungtu  where mskhungtu='$mskhungtu'");
                }
              }
          echo '<script>alert("Update number of column success")</script>';

          }

        }
        else
          echo '<script>alert("pannel khong ton tai Fail")</script>';

          #xu ly ngay
        $FAT=$_POST['Fat'];
        $Delivery=$_POST['Delivery'];
        $Adjust_FAT=$_POST['Adj_Fat'];
        $Adjust_Delivery=$_POST['Adj_Delivery'];
        $Actual_Delivery=$_POST['Actual_Delivery'];
        if ($FAT !="")
          {
            mysql_query("UPDATE tu SET fatdukien='$FAT'where mstu = '$text1' ");
            echo '<script>alert("update fat success")</script>';
          }
        if ($Delivery !="")
          {
            mysql_query("UPDATE tu SET giaohangthucte='$Delivery'where mstu = '$text1' ");
            echo '<script>alert("update Delivery success")</script>';
          }
        if ($Adjust_FAT !="")
          {
          mysql_query("UPDATE tu SET fathieuchinh='$Adjust_FAT' where mstu = '$text1' ");
          echo '<script>alert("update Adjust_FAT success")</script>';
          }
        if ($Adjust_Delivery !="")
          {
            mysql_query("UPDATE tu SET giaohanghieuchinh='$Adjust_Delivery' where mstu = '$text1' ");
            echo '<script>alert("update Adj_Delivery success")</script>';
          }
        if ($Actual_Delivery !="")
          {
            mysql_query("UPDATE tu SET giaohangthucte='$Actual_Delivery' where mstu = '$text1' ");
            echo '<script>alert("update Actual_Delivery success")</script>';
          }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>Intern in Hai Nam Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script  type="text/javascript">

        $(document).ready(function(){

    $("#textmot").keyup(function(){
    var msduan = $("#textmot").val();
    $.post("Modifyproject_ajax.php", {msduan: msduan}, function(data){$("#display_check_project").html(data);})
  })

        $("#Import").click(function(){

    var msduan = $("#textmot").val();
    $.post("ModifyPannel_ajax_display_idPannel.php", {msduan: msduan}, function(data){$("#displayPanelID").html(data);})
  })
          $("#displayPanelID").change(function(){
    var mstu = $("#displayPanelID").val();
     $.post("ModifyPannel_ajax_display_details.php", {id: mstu}, function(data){$("#show_details_panel").html(data);})
  })

   })

</script>
    <style>
        .fakeimg1 {
            height: 115px;
            background: lightblue;
            color:black;
            padding: 15px;
                  }
        .carousel-inner img
          {
            width: 100%;
            height: 100%;
          }
          body{
            background-image: url(background.jpg);
              }
            .textmot {
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 98px;
        }    .text1 {
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 114px;
        }
            .text2 {
            height: 50px;
            width: 300px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 32px;
        }
            .text3 {
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 151px;
        }
            .text4 {
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size:  18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 100px;
        }
            .text5 {
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 76px;
        }
           .text6 {
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 20px;
        }
            .text7 {
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 22px;
        }
        .fieldset1 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 800px;
            height: 700px;
            margin-left: 400px;
          }

        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
        p{
            font-size: 30px;
            font-weight: bold;
            margin: 20px;
            text-align: center;
          }
          .p1{
            font-weight: bold;
            text-align: center;
          }
                 #lib-thanh{
   text-decoration: none;font-size: 15px;padding: 14px;
  }
#lib-thanh-logout{
   text-decoration: none;font-size: 15px;padding: 14px;float: right;
  }
#lib-thanh-active{
   text-decoration: none;font-size: 15px;padding: 14px;background-color: #ccc;color: #000;
  }
#lib-thanh-size-small{padding: 14px;width: 100px;}
#col-25 {
    float: left;
    width: 45%;
    margin-top: 6px;
}

#col-75 {
    float: left;
    width: 55%;
    margin-top: 6px;
}
  </style>
</head>
      <body>
          <div class="fakeimg1 text-center" style="margin-bottom:0">
            <h1>HAI NAM AUTOMATION</h1>
            <div class="p1">WELCOM TO OURS COMPANY!</div>
          </div>
         <div class="w3-bar w3-black" style="" >
    <a href="../index.php"      class="w3-bar-item w3-button" id="lib-thanh">Home</a>
    <a href="Add_Cus_Pro.php"   class="w3-bar-item w3-button" id="lib-thanh" >Add Customer and Project</a>
    <a href="Create_Orders.php" class="w3-bar-item w3-button" id="lib-thanh" ">Create Orders  </a>
    <a href="ngayle.php"        class="w3-bar-item w3-button" id="lib-thanh" ">Create Holiday  </a>

     <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-size-small">Panel       </button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh"   href="Create_Pannel.php">Create</a>
      <a class="w3-bar-item w3-button" id="lib-thanh"  href="listpannel.php">List</a>
      <a class="w3-bar-item w3-button" id="lib-thanh"  href="exporttest.php">Export</a>
    </div>
  </div>


    <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-active">Modify Information</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="ModifyCustomer.php">Modify Customer Information</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="ModifyPannel.php">Modify Panel Information</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Modifyproject.php">Modify Project Information</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="ModifyStaff.php">Modify Staff Information</a>
    </div>
  </div>

   <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;"> Staff Member</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Staff/Create.php">Create </a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Staff/Delete.php">Delete</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Staff/List.php">List</a>
    </div>
  </div>
    <a class="w3-bar-item w3-button"  href="logout.php" id="lib-thanh-logout">Logout</a>
</div>



          <form method="post" action="" autocomplete="off">
              <!-- <fieldset class="fieldset1"> -->
                <p>Pannel Information</p>
                <lable for = "textmot" class="word"> Project ID: </label>
            <input type ="text" name="textmot" class="textmot" id="textmot" required=""  > </input>
                 <input value="Import" type="button" id="Import" class="btn btn-lg btn-primary" style="margin-left: 60px;position: absolute;" > </input>
            <br>
            <br>
                 <span id="display_check_project"></span>
                 <br>
                 <br>
                     <div>
                <lable class="word" > Panel ID: </label>
                 <SELECT id ="displayPanelID" class="text1" name="text1" >
                 </SELECT>
                 </div>
                 <br>
                 <div id="show_details_panel"></div>
               <!--  <lable for = "text1" class="word"> Pannel ID: </label>
                <input type = "text" name="text1" class="text1" required="">   </input>
                -->
                <lable for = "text2" class="word"> Number Column: </label>
                <input type = "text" name="text2" class="text2" >   </input>
                <br>
                <label for = "Fat" class="word">FAT:</label>
                <input type="date"  name="Fat" class="text3" >
                <br>
                <label for = "Delivery" class="word">Delivery:</label>
                <input type="date"  name="Delivery" class="text4" >
                <br>
                <label for = "Adj_Fat" class="word">Adjust FAT</label>
                <input type="date"  name="Adj_Fat" class="text5"  >
                <br>
                <label for = "Adj_Delivery" class="word">Adjust Delivery:</label>
                <input type="date" name="Adj_Delivery" class="text6" >
                <br>
                <label for = "Actual_Delivery" class="word">Actual Delivery:</label>
                <input type="date"  name="Actual_Delivery" class="text7" >
                <br>
                <input type = "submit" name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 250px;margin-bottom: 50px;margin-top: 10px;">
              <!-- </fieldset> -->
            </form>

          </body>
          </html>

<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}
?>
<?php
include "../../connection.php";
?>
<?php
if(isset($_POST['button1']))
  {
      $text1=$_POST['text1'];     #manager id old
      $text2=$_POST['text2'];     #manager id new
      $text3=$_POST['text3'];     #manager pass
      $text4=$_POST['text4'];     #manager type id
      $text5=$_POST['text5'];     #manager type name
      $text11=$_POST['text11'];     #manager  name
      $text12=$_POST['text12'];     #manager PHONE

      if ( mysql_num_rows (mysql_query("SELECT * FROM quanly where msquanly='$text1'") )!=0 )
        {
          if ($text3!="")
            mysql_query("UPDATE quanly SET password='$text3' where msquanly='$text1' ");
          if ($text4!="")
            mysql_query("UPDATE quanly SET msloai='$text4' where msquanly='$text1' ");
          if ($text5!="")
            mysql_query("UPDATE quanly SET loai='$text5' where msquanly='$text1' ");
          if ($text11!="")
            mysql_query("UPDATE quanly SET ten='$text11' where msquanly='$text1' ");
          if ($text12!="")
            mysql_query("UPDATE quanly SET sdt='$text2' where msquanly='$text1' ");
          if ($text2!="")
            mysql_query("UPDATE quanly SET msquanly='$text2' where msquanly = '$text1' ");
          echo '<script>alert("Update Manager Success")</script>';
        }
      else
        echo '<script>alert("ID Manager is not existed")</script>';
  }
  ?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>Intern in Hai Nam Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
      <script  type="text/javascript">

        $(document).ready(function(){

    $("#text1").keyup(function(){

    var id = $("#text1").val();
    $.post("ModifyStaff_ajax_manager.php", {id: id}, function(data){$("#display_check_id_manager").html(data);})
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
            background-image: url(../background.jpg);
              }
        .text1 {
            width: 230px;
            height: 42px;
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
            margin-left: 10%;
        }        .textmot {
            width: 230px;
            height: 42px;
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
            margin-left: 10.3%;
        }
        .text2 {
            width: 230px;
            height: 42px;
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
            margin-left: 4.2%;
        }
            .text3 {
            width: 230px;
            height: 42px;
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
            margin-left: 5.5%;
        }
            .text4 {
            width: 230px;
            height: 42px;
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
            margin-left: 2.8%;
        }
            .text11 {
            width: 230px;
            height: 42px;
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
            margin-left: 7.3%;
        }
          .text12 {
            width: 230px;
            height: 42px;
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
            margin-left: 6.8%;
        }
        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
        p{
            font-size: 25px;
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
    <a href="../../index.php"      class="w3-bar-item w3-button" id="lib-thanh">Home</a>

      <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh">Project</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Project/Add_Project.php">Add Project Information</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Project/Modifyproject.php">Modify Project Information</a>
      </div>
    </div>


   <div class="w3-dropdown-hover">
        <button class="w3-button" id="lib-thanh">Customer</button>
        <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Customer/Add_Customer.php">Add Customer Information</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Customer/ModifyCustomer.php">Modify Customer Information</a>
        </div>
      </div>


       <div class="w3-dropdown-hover">
        <button class="w3-button" style="padding: 14px;">Orders</button>
        <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Orders/Create_Orders.php">Add Orders</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Orders/Delete_Orders.php">Delete Orders</a>
        </div>
      </div>
    <!-- <a href="../Orders/Create_Orders.php" class="w3-bar-item w3-button" id="lib-thanh" ">Create Orders  </a> -->

     <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-size-small">Panel</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Panel/Create_Pannel.php">Create Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Panel/listpannel.php">List Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Panel/exporttest.php">Export Column ID</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Panel/ModifyPannel.php">Modify Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Panel/Delete_Panel.php">Delete Panel</a>
      </div>
    </div>

   <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-active"> Staff Menmer</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Create.php">Create Staff </a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Delete.php">Delete Staff</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="List.php">List Manager</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="List_employee.php">List Employee</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="ModifyStaff_Manager.php">Modify Manager</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="ModifyStaff_Employee.php">Modify Employee</a>
      </div>
    </div>

    <a href="../Holiday/ngayle.php"        class="w3-bar-item w3-button" id="lib-thanh" ">Setting Holiday  </a>

    <a class="w3-bar-item w3-button"  href="../logout.php" id="lib-thanh-logout">Logout</a>
</div>



               <form method="post" action="" >
                      <p> Manager Information</p>
                         <lable for = "text1" class="word">Current ID: </label>
                         <input type ="text" name="text1" class="text1" required="" id="text1" > </input>
                      <span id="display_check_id_manager"></span>
                          <div  style="margin-top: 10px">
                      </div>
                      <br>
                         <lable for = "text2" class="word">Update ID: </label>
                         <input type ="text" name="text2" class="textmot"  > </input>
                      <br>
                      <br>
                          <lable for = "text3" class="word">Update Password: </label>
                          <input type ="text" name="text3" class="text2"  > </input>
                      <br>
                      <br>
                           <lable for = "text4" class="word">Update Type ID: </label>
                           <input type = "text" name="text4" class="text3" >   </input>
                      <br>
                      <br>
                          <lable for = "text5" class="word">Update Type Name: </label>
                          <input type = "text" name="text5" class="text4" >   </input>
                      <br>
                      <br>
                          <lable for = "text11" class="word">Update Name: </label>
                          <input type = "text" name="text11" class="text11" >   </input>
                      <br>
                      <br>
                          <lable for = "text12" class="word">Update Phone: </label>
                          <input type = "text" name="text12" class="text12" >   </input>
                      <br>
                      <br>
                          <input type = "submit"  onclick="document.body.style.cursor='progress'" name="button1" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 10%;margin-top: 2%;">
               </form>
              </div>

      </body>
</html>





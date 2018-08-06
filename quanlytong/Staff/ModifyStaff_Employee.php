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
if(isset($_POST['button2']))
  {
    $text6=$_POST['text6'];     #Employee ID old
    $text7=$_POST['text7'];     #Employee ID new
    $text8=$_POST['text8'];     #Employee  name
    $text9=$_POST['text9'];     #Employee   dep
    $text10=$_POST['text10'];     #Employee subdep
    if ( mysql_num_rows (mysql_query("SELECT * FROM nhanvien where msnv='$text6'") )!=0 )
    {
          if ($text8!="")
            mysql_query("UPDATE nhanvien SET hoten='$text8' where msnv='$text6' ");
          if ($text9!="")
            mysql_query("UPDATE nhanvien SET dep='$text9' where msnv='$text6' ");
          if ($text10!="")
            mysql_query("UPDATE nhanvien SET subdep='$text10' where msnv='$text6' ");
          if ($text7!="")
            mysql_query("UPDATE nhanvien SET msnv='$text7' where msnv = '$text6' ");
          echo '<script>alert("Update Employee Success")</script>';
    }
    else
    echo '<script>alert("ID Employee is not existed ")</script>';
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


$("#text6").keyup(function(){

    var id = $("#text6").val();
    $.post("ModifyStaff_ajax_employee.php", {id: id}, function(data){$("#display_check_id_employee").html(data);})
  })
            $("#dep").change(function(){

            var dep = $("#dep").val();
            $.post("ModifyStaff_ajax_employee_subdep.php", {dep: dep}, function(data){$("#displaysubdep").html(data);})

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
            .text5 {
            width: 300px;
            height: 52px;
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
        }
        .textnam {
            width: 300px;
            height: 52px;
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
            margin-left: 10.2%;
        }
            .text6 {
            width: 300px;
            height: 52px;
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
            margin-left: 7.4%;
        }
            .text7 {
            width: 300px;
            height: 52px;
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
            margin-left: 9%;
        }
            .text8 {
            width: 300px;
            height: 52px;
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
            margin-left: 6.3%;
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
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Panel/Delete.php">Delete Panel</a>
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



      <form method="post" action=""  autocomplete="off">
                      <p> Employee Information</p>
                         <lable for = "text6" class="word">Current ID: </label>
                         <input type ="text" name="text6" class="text5" id="text6" required="" > </input>
                      <span id="display_check_id_employee"></span>
                      <div  style="margin-top: 3%">
                      </div>

                         <lable for = "text7" class="word">Update ID: </label>
                         <input type ="text" name="text7" class="textnam" required="" > </input>
                      <br>
                      <br>
                          <lable for = "text8" class="word"> Update Name: </label>
                          <input type ="text" name="text8" class="text6"  required=""> </input>
                      <br>
                      <br>
                       <lable for = "text9" class="word">Update Dep: </label>
                         <select class="text7" id="dep" name="text9">
                           <option value="" >SELECT ...</option>
                           <option value="PRODUCTION" >PRODUCTION</option>
                           <option value="QC">QC</option>
                           <option value="SERVICE">SERVICE</option>
                         </select>
                      <br>
                      <br>
                      <div id="displaysubdep"></div>
                      <br>
                          <input type = "submit"  onclick="document.body.style.cursor='progress'" name="button2" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 5%;margin-top: 2%;">
                          <br>
                          <br>

               </form>
              </div>

      </body>
</html>





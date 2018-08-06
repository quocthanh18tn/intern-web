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
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>Intern in Hai Nam Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
if(isset($_POST['button1']))
  {
      $text1=$_POST['text1'];     #name project
      $text3=$_POST['text3'];     #noproject
      if ( mysql_num_rows (mysql_query("SELECT * FROM duan where msduan='$text3'") )==0 && strlen($text3)==6)
        {
        mysql_query("INSERT INTO duan (msduan,tenduan) values ('$text3','$text1')");
                  ?>
           <script type="text/javascript">
              $(document).ready(function(){
             swal({
            title: "Success !",
            text: "You have created project successfull!",
            icon: "success",
          })
          });
          </script>
          <?php

        // echo '<script>alert("Data Success")</script>';
        }
      else
      {
                ?>
          <script type="text/javascript">
            $(document).ready(function(){
           swal({
          title: "Sorry!",
          text: "Create project fail",
          icon: "error",
          dangerMode: true,
        })
        });
        </script>
        <?php


                // echo '<script>alert("Data Fail")</script>';
      }
  }

?>


      <script  type="text/javascript">

        $(document).ready(function(){

    $("#text3").keyup(function(){

    var msduan = $("#text3").val();
    $.post("Add_Project_ajax_check.php", {msduan: msduan}, function(data){$("#display_check_project").html(data);})
  })
    // find
 $("#button1").click(function(){

    var value = $("#search_project").val();
    $.post("Add_Project_ajax_showall.php", {value: value}, function(data){$("#display_showall_project").html(data);})
  })
 $("#button2").click(function(){

    var value ='showall';


    $.post("Add_Project_ajax_showall.php", {value: value}, function(data){$("#display_showall_project").html(data);})
  })
 $("#button3").click(function(){

    document.getElementById("display_showall_project").innerHTML="";
  })
// find

$("#show").click(function(){

   var x = document.getElementById("displaymm");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else

     {
        x.style.display = "none";
    }



  })


   })
</script>
    <style>
    .swal-overlay {
  background-color: rgba(43, 165, 137, 0.45);
}
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
            margin-left:28px;
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
            margin-left: 85px;
        }
        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
        .word1{
            font-size: 20px;
            /*font-weight: bold;*/
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
          .topmenu {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.topmenu li {
    float: left;
}
.topmenu li div {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 16px;
    text-decoration: none;
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
      <button class="w3-button" id="lib-thanh-active">Project</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Add_Project.php">Add Project Information</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Modifyproject.php">Modify Project Information</a>
      </div>
    </div>


   <div class="w3-dropdown-hover">
        <button class="w3-button" style="padding: 14px;">Customer</button>
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
      <button class="w3-button" style="padding: 14px;"> Staff Menmer</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/Create.php">Create Staff </a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/Delete.php">Delete Staff</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/List.php">List Manager</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/List_employee.php">List Employee</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/ModifyStaff_Manager.php">Modify Manager</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/ModifyStaff_Employee.php">Modify Employee</a>
      </div>
    </div>

    <a href="../Holiday/ngayle.php"        class="w3-bar-item w3-button" id="lib-thanh" ">Setting Holiday  </a>

    <a class="w3-bar-item w3-button"  href="../logout.php" id="lib-thanh-logout">Logout</a>
</div>



            <input type = "submit" id="show" value= "Information " class="btn btn-lg btn-primary" >
                    <div  id="displaymm" style="display: none;">

            <ul class="topmenu">
                <li>
                    <lable for = "text1" class="word" > Search Project: </label>
                    <input type ="text"  class="text1" placeholder="ID, Name" id="search_project" style="margin-top: 16px;margin-left: 60px;" > </input>
                </li>
                <li>
                  <div>
                    <input type = "submit" id="button1" value= "Find" class="btn btn-lg btn-primary" >
                  </div>
                </li>
                <li>
                  <div>
                    <input type = "submit" id="button2" value= "Show all" class="btn btn-lg btn-primary" >
                  </div>
               </li>
               <li>
                  <div>
                      <input type = "submit"  value= "Hide" class="btn btn-lg btn-primary" id="button3">
                  </div>
               </li>
           </ul>
            <div id="display_showall_project"></div>
           </div>
            <div style="clear: left">
                <form method ="POST" action="" >
                      <p>  Create Project  </p>
                      <label for="text1"  class="word">Project Name:</label>
                      <input type="text" class="text1" name="text1" >
                      <br>
                      <br>
                      <lable for = "text3" class="word"> Project ID: </label>
                      <input type ="text" class="text3" name="text3" id="text3" required="" placeholder="xxxxxx"  > </input>
                      <span id="display_check_project"></span>
                      <div  style="margin-top: 10px">
                      </div>
                      <br>
                      <input type = "submit"  name="button1"  onclick="document.body.style.cursor='progress'" value= "Create" class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 1px;">
                </form>
             </div>
      </body>
</html>







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
  <!-- code xu ly php -->

  <?php
  if(isset($_POST['button2']))
    {
      $text4=$_POST['text4'];     #name
      $text5=$_POST['text5'];     #phone
      $text7=$_POST['text7'];     #company name
      $text8=$_POST['text8'];     #code
      $text9=$_POST['text9'];     #address
      if ( mysql_num_rows (mysql_query("SELECT * FROM khachhang where sdt='$text5'") )==0 && strlen($text8)==3)
      {
         mysql_query("INSERT INTO khachhang (mskh,tenkh,tencongty,diachi,sdt) values ('$text8','$text4','$text7','$text9','$text5')");
         ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Congratulation !",
              text: "You create new customer successful!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='Add_Customer.php';
            });
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
            text: "Invalid customer's code or phone!! \n \n Please try carefully !!",
            icon: "error",
            dangerMode: true,
          })
             .then((willDelete) => {
             window.location='Add_Customer.php';
          })
          });
          </script>
          <?php
      }
      // echo '<script>alert("Data Fail")</script>';
    }


  ?>


  <!-- code xu ly php -->


      <script  type="text/javascript">

        $(document).ready(function(){

    $("#text5").keyup(function(){

    var sdt = $("#text5").val();
    $.post("Add_Customer_ajax_check.php", {sdt: sdt}, function(data){$("#display_check_phone").html(data);})
  })
    // find
// find
 $("#button4").click(function(){

    var customer = $("#seacrh_customer").val();
    $.post("Add_Customer_ajax_showall.php", {customer: customer}, function(data){$("#display_showall_customer").html(data);})
  })
 $("#button5").click(function(){

    var customer ='showall';


    $.post("Add_Customer_ajax_showall.php", {customer: customer}, function(data){$("#display_showall_customer").html(data);})
  })
 $("#button6").click(function(){

    document.getElementById("display_showall_customer").innerHTML="";
  })
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
            .text4 {
            height: 42px;
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
            margin-left: 40px;
        }
            .text5 {
            height: 42px;
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
            margin-left: 35px;
        }
             .text6 {
            height: 42px;
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
            margin-left: 44px;
        }   .text7 {
            height: 42px;
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
            margin-left: 49px;
        }   .text8 {
            height: 42px;
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
            margin-left: 15px;
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
      <button class="w3-button" id="lib-thanh">Project</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Project/Add_Project.php">Add Project Information</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Project/Modifyproject.php">Modify Project Information</a>
      </div>
    </div>


   <div class="w3-dropdown-hover">
        <button class="w3-button" id="lib-thanh-active">Customer</button>
        <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="Add_Customer.php">Add Customer Information</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="ModifyCustomer.php">Modify Customer Information</a>
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

           <ul class="topmenu" style="clear: left;">
               <li>
                 <lable for = "text1" class="word" > Search Customer: </label>
                 <input type ="text" id="seacrh_customer" class="text6" placeholder="ID, Name"  style="margin-top: 16px;" > </input>
              </li>
              <li>
                  <div>
                    <input type = "submit" value= "Find" class="btn btn-lg btn-primary" id="button4">
                  </div>
              </li>
               <li>
                   <div>
                      <input type = "submit"  value= "Show all" class="btn btn-lg btn-primary" id="button5">
                    </div>
               </li>
               <li>
                  <div>
                    <input type = "submit"  value= "Hide" class="btn btn-lg btn-primary" id="button6">
                  </div>
               </li>
               </ul>
            <div id="display_showall_customer"></div>
            </div>

            <div style="clear: left">
               <form method="post" action="" >
                      <p> Create Customer </p>
                         <lable for = "text4" class="word"> Customer Name: </label>
                         <input type ="text" name="text4" class="text4" required="" > </input>
                      <br>
                      <br>
                          <lable for = "text5" class="word"> Customer Phone: </label>
                          <input type ="text" name="text5" class="text5" id="text5" required=""> </input>
                      <span id="display_check_phone"></span>

                      <br>
                      <br>
                           <lable for = "text7" class="word">Company Name: </label>
                           <input type = "text" name="text7" class="text6" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text8" class="word">Customer Code: </label>
                          <input type = "text" name="text8" class="text7" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text9" class="word">Customer Address: </label>
                          <input type = "text" name="text9" class="text8" required="">   </input>
                       <br>
                       <br>
                          <input type = "submit" name="button2"  onclick="document.body.style.cursor='progress'" value= "Create"  class="btn btn-lg btn-primary" style="margin-left: 10%;margin-top: 2%;">
               </form>
          </div>
      </body>
</html>







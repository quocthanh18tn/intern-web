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

    $("#text1").keyup(function(){

    var id = $("#text1").val();
    $.post("ModifyStaff_ajax_manager.php", {id: id}, function(data){$("#display_check_id_manager").html(data);})
  })
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
            background-image: url(background.jpg);
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
            margin-left: 112px;
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
            margin-left: 30px;
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
            margin-left: 50px;
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
            margin-left: 12px;
        }
            .text5 {
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
            margin-left: 98px;
        }
            .text6 {
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
            margin-left: 64px;
        }
            .text7 {
            width: 230px;
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
            margin-left: 82px;
        }
            .text8 {
            width: 230px;
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
            margin-left: 49px;
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
            margin-left: 72px;
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
            margin-left: 66px;
        }

        .fieldset1 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: 200px;
        }
        .fieldset2 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: 200px;
        }
         .fieldset3 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: 600px;
        }
           .fieldset4 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: 450px;
        }
        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
        p{
            font-size: 20px;
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

              <div id="col-25">
               <form method="post" action="" class="container">
                  <fieldset class="fieldset2">
                      <p> Present Manager </p>
                         <lable for = "text1" class="word"> ID: </label>
                         <input type ="text" name="text1" class="text1" required="" id="text1" > </input>
                          <div  style="margin-top: 10px">
                      </div>
                      <span id="display_check_id_manager"></span>
                  </fieldset>
                   <fieldset class="fieldset3">
                      <p> Updated Manager  </p>
                         <lable for = "text2" class="word"> ID: </label>
                         <input type ="text" name="text2" class="text1"  > </input>
                      <br>
                      <br>
                          <lable for = "text3" class="word"> Password: </label>
                          <input type ="text" name="text3" class="text2"  > </input>
                      <br>
                      <br>
                           <lable for = "text4" class="word">Type ID: </label>
                           <input type = "text" name="text4" class="text3" >   </input>
                      <br>
                      <br>
                          <lable for = "text5" class="word">Type Name: </label>
                          <input type = "text" name="text5" class="text4" >   </input>
                      <br>
                      <br>
                          <lable for = "text11" class="word">Name: </label>
                          <input type = "text" name="text11" class="text11" >   </input>
                      <br>
                      <br>
                          <lable for = "text12" class="word">Phone: </label>
                          <input type = "text" name="text12" class="text12" >   </input>
                      <br>
                      <br>
                          <input type = "submit" name="button1" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 20px;">
                  </fieldset>
               </form>
              </div>

              <div id = "col-75">
               <form method="post" action="" class="container" autocomplete="off">
                  <fieldset class="fieldset2">
                      <p>Present Employee </p>
                         <lable for = "text6" class="word">  ID: </label>
                         <input type ="text" name="text6" class="text5" id="text6" required="" > </input>
                      <div  style="margin-top: 10px">
                      </div>
                      <span id="display_check_id_employee"></span>

                  </fieldset>
                         <fieldset class="fieldset4">
                      <p> Updated Employee </p>
                         <lable for = "text7" class="word">  ID: </label>
                         <input type ="text" name="text7" class="text5" required="" > </input>
                      <br>
                      <br>
                          <lable for = "text8" class="word">  Name: </label>
                          <input type ="text" name="text8" class="text6"  required=""> </input>
                      <br>
                      <br>
                       <lable for = "text9" class="word"> Dep: </label>
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
                          <input type = "submit" name="button2" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 20px;">
                          <br>
                          <br>
                  </fieldset>

               </form>
              </div>

      </body>
</html>





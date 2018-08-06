<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
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

include '../Classes/PHPExcel.php';

?>
<?php
if(isset($_POST['button1']))
  {
      $text1=$_POST['text1'];     #manager id
      $text2=$_POST['text2'];     #manager name
      $text3=$_POST['text3'];     #type id
      $text4=$_POST['text4'];     #type name
      $text9=$_POST['text9'];     #type name
      $text10=$_POST['text10'];     #type name
      if ( mysql_num_rows (mysql_query("SELECT * FROM quanly where msquanly='$text1'") )==0 )
        {
        mysql_query("INSERT INTO quanly (msquanly,password,msloai,loai,ten, sdt) values ('$text1','$text2','$text3','$text4','$text9','$text10')");
        echo '<script>alert("Create Manager Success")</script>';
        }
      else
        echo '<script>alert("ID Manager is existed")</script>';
  }
if(isset($_POST['button2']))
  {

    $text5=$_POST['text5'];     #Employee ID
    $text6=$_POST['text6'];     #Employee name
    $text7=$_POST['text7'];     #Employee dep
    $text8=$_POST['text8'];     #Employee subdep
    if ( mysql_num_rows (mysql_query("SELECT * FROM nhanvien where msnv='$text5'") )==0 )
    {
      if ($text7!='' and $text8!='')
      {
       mysql_query("INSERT INTO nhanvien (msnv,hoten,dep,subdep) values ('$text5','$text6','$text7','$text8')");
    echo '<script>alert("Create Employee Success")</script>';
      }
      else
    echo '<script>alert("Choose dep and subdep carefully")</script>';

    }
    else
    echo '<script>alert("ID Employee is existed ")</script>';
  }

if(isset($_POST['button3']))
  {
      if ($_FILES['file']['size']!='')
           {          #code import excel
             $file=$_FILES['file']['tmp_name'];
             $objReader = PHPExcel_IOFactory::createReaderForFile($file);
             $objReader -> setLoadSheetsOnly('Sheet1');
             $objExcel = $objReader -> load($file);
             $sheetData = $objExcel -> getActiveSheet() -> toArray('null',true,true,true);
             $highestRow = $objExcel -> setActiveSheetIndex() -> getHighestRow();
              for ($row =2 ;$row <= $highestRow;$row++)
                {
                $msnv = $sheetData[$row]['A'];
                $hoten = $sheetData[$row]['B'];
                $dep = $sheetData[$row]['D'];
                $subdep = $sheetData[$row]['E'];
                if (mysql_num_rows(mysql_query("SELECT * FROM nhanvien where msnv='$msnv'"))==0)
                mysql_query("INSERT INTO nhanvien (msnv,hoten,dep,subdep) values ('$msnv','$hoten','$dep','$subdep')");
                }
            echo '<script>alert("SUCCESS")</script>';
}
else
            echo '<script>alert("Import carefully")</script>';

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
            $("#dep").change(function(){

            var dep = $("#dep").val();
            $.post("Create_ajax.php", {dep: dep}, function(data){$("#displaysubdep").html(data);})

  })

              $("#text1").keyup(function(){

    var id = $("#text1").val();
    $.post("Create_ajax_manager.php", {id: id}, function(data){$("#display_check_id_manager").html(data);})
  })

              $("#text5").keyup(function(){

    var id = $("#text5").val();
    $.post("Create_ajax_employee.php", {id: id}, function(data){$("#display_check_id_employee").html(data);})
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
            margin-left: 112px;
        }
        .text2 {
            width: 230px;
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
            margin-left: 29px;
        }
            .text3 {
            width: 230px;
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
            margin-left: 48px;
        }
            .text4 {
            width: 230px;
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
            margin-left: 12px;
        }
            .text5 {
            width: 320px;
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
            margin-left: 64px;
        }
            .text6 {
            width: 320px;
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
            margin-left: 34px;
        }
            .text7 {
            width: 320px;
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
            margin-left: 52px;
        }
            .text8 {
            width: 320px;
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
            margin-left: 18px;
        }
           .text10 {
            width: 230px;
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
            margin-left: 68px;
        }
          .text9 {
            width: 230px;
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
            margin-left: 72px;
        }

        .fieldset1 {
            margin-top: 44px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: 700px;
        }
        .fieldset2 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: 500px;
        }
        .fieldset3 {
            margin-top: 10px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: 200px;
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
   text-decoration: none;font-size: 15px;padding: 14px;background-color: #ccc;color:#000;
  }
#lib-thanh-size-small{padding: 14px;width: 100px;}


#col-25 {
    float: left;
    width: 50%;
    margin-top: 6px;
}

#col-75 {
    float: left;
    width: 50%;
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



              <div id="col-25">
               <form method="post" action="" class="container">
                  <fieldset class="fieldset1">
                      <p> Manager Information </p>
                         <lable for = "text1" class="word"> ID: </label>
                         <input type ="text" name="text1" class="text1" id="text1" required="" > </input>
                           <div  style="margin-top: 10px">
                      </div>
                      <span id="display_check_id_manager"></span>
                      <div style="display: none">
                          <lable for = "text2" > Password: </label>
                          <input type ="text" name="text2" > </input>
                      </div>
                      <br>
                           <lable for = "text3" class="word">Type ID: </label>
                           <input type = "text" name="text3" class="text3" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text4" class="word">Type Name: </label>
                          <input type = "text" name="text4" class="text4" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text9" class="word"> Name: </label>
                          <input type = "text" name="text9" class="text9" required="">   </input>
                      <br>
                      <br>
                          <lable for = "text10" class="word">Phone: </label>
                          <input type = "text" name="text10" class="text10" required="">   </input>
                      <br>
                      <br>
                          <input type = "submit" name="button1" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 20px;">
                  </fieldset>
               </form>
              </div>
              <div class = "col-75">
               <form method="post" action="" class="container">
                  <fieldset class="fieldset2">
                      <p> Employee </p>
                         <lable for = "text5" class="word">  ID: </label>
                         <input type ="text" name="text5" class="text5" id="text5" required="" > </input>
                          <div  style="margin-top: 10px">
                      </div>
                      <span id="display_check_id_employee"></span>
                        <br>
                          <lable for = "text6" class="word">  Name: </label>
                          <input type ="text" name="text6" class="text6"  required=""> </input>
                      <br>
                      <br>
                      <lable for = "text7" class="word"> Dep: </label>
                         <select class="text7" id="dep" name="text7">
                           <option value="" >SELECT ...</option>
                           <option value="PRODUCTION" >PRODUCTION</option>
                           <option value="QC">QC</option>
                           <option value="SERVICE">SERVICE</option>
                         </select>
                      <br>
                      <br>
                      <div id="displaysubdep"></div>
                     <br>
                          <input type = "submit" name="button2" value= "Submit"  class="btn btn-lg btn-primary" style="margin-left: 200px;margin-top: 0px;">
                  </fieldset>
               </form>
               <form method="post" action="" class="container" enctype="multipart/form-data">
                  <fieldset class="fieldset3">
                    <p> Import </p>
                     <input type="file" name = "file" id = "submit" style="margin-left: 20px">
                      <br>
                    <button name="button3"  onclick="document.body.style.cursor='progress'" type="submit" class="btn btn-lg btn-primary" style="margin-left: 200px;margin-bottom: 50px;margin-top: 10px;"> Import</button>
              </fieldset>
            </form>


              </div>
      </body>
</html>





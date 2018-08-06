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
include 'Classes/PHPExcel.php';

?>
<?php

if(isset($_POST['button1']))
  {
    #code xu ly thong tin php
    $text2=$_POST['text2'];     #phone kh
    $text4=$_POST['text4'];     #no.project
    #code insert table donhang
    #neu msduan is exist printf fails else insert vao
    if ( mysql_num_rows (mysql_query("SELECT * FROM khachhang where sdt = '$text2' ") )!=0)
    {
    if ( mysql_num_rows (mysql_query("SELECT * FROM duan where msduan='$text4'") )!=0)
      {
        $order="SELECT * FROM donhang where  msduan='$text4' ";
        $query= mysql_query($order);
        if ( mysql_num_rows($query) ==0)
          $id_order_autoincreament=1;
        else
        {
        while ($row_order=mysql_fetch_array($query))
          $id_order_autoincreament=$row_order['landat'];
          $id_order_autoincreament+=1;
        }
        if ($id_order_autoincreament <10)
          $id_order_autoincreament="0".$id_order_autoincreament;
                 # insert thong tin don hang
            $sql= mysql_query("SELECT mskh FROM khachhang where  sdt = '$text2' ");
            $dulieu_kh=mysql_fetch_array($sql);
            $code= $dulieu_kh['mskh'];
            mysql_query("INSERT INTO donhang (sdt,msduan,landat) values ('$text2','$text4','$id_order_autoincreament')");
                     #code import excel
             $file=$_FILES['file']['tmp_name'];
             $objReader = PHPExcel_IOFactory::createReaderForFile($file);
             $objReader -> setLoadSheetsOnly('Sheet1');
             $objExcel = $objReader -> load($file);
             $sheetData = $objExcel -> getActiveSheet() -> toArray('null',true,true,true);
             $highestRow = $objExcel -> setActiveSheetIndex() -> getHighestRow();
              for ($row =2 ;$row <= $highestRow;$row++)
                {
                $NoPantemp = $sheetData[$row]['C'];
                $NamePan = $sheetData[$row]['D'];
                $NoPan=$text4.$code.$id_order_autoincreament.$NoPantemp;
                if ( $NoPantemp=='null')
                 break;
                mysql_query("INSERT INTO tu (msduan,mstu,tentu) values ('$text4','$NoPan','$NamePan')");
                }
            echo '<script>alert("SUCCESS")</script>';

        }
    else
            echo '<script>alert("Noproject Fail")</script>';
  }
        else
            echo '<script>alert("Customer Fail")</script>';
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
    $("#text4").keyup(function(){
    var msduan = $("#text4").val();
    $.post("Modifyproject_ajax.php", {msduan: msduan}, function(data){$("#display_check_project").html(data);})
  })
    $("#text2").keyup(function(){

    var sdt = $("#text2").val();
    $.post("Create_Orders_ajax.php", {sdt: sdt}, function(data){$("#display_check_phoneCus").html(data);})
  })

    $("#button1").click(function(){

    var value = $("#search_project").val();
    $.post("Add_Cus_Pro_ajax_showall_project.php", {value: value}, function(data){$("#display_showall_project").html(data);})
  })
 $("#button2").click(function(){

    var value ='showall';


    $.post("Add_Cus_Pro_ajax_showall_project.php", {value: value}, function(data){$("#display_showall_project").html(data);})
  })
 $("#button3").click(function(){

    document.getElementById("display_showall_project").innerHTML="";
  })
// find
 $("#button4").click(function(){

    var customer = $("#seacrh_customer").val();
    $.post("Add_Cus_Pro_ajax_showall_customer.php", {customer: customer}, function(data){$("#display_showall_customer").html(data);})
  })
 $("#button5").click(function(){

    var customer ='showall';


    $.post("Add_Cus_Pro_ajax_showall_customer.php", {customer: customer}, function(data){$("#display_showall_customer").html(data);})
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
            margin-left: 35px;
        }
        .text2 {
            height: 42px;
            width: 230px;
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
            margin-left: 24px;
        }
        .text3 {
            height: 42px;
            width: 230px;
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
            margin-left: 97px;
        }
            .text4 {
            height: 42px;
            width: 230px;
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
            margin-left: 94px;
        }
        .fieldset1 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 1000px;
            height: auto;
            margin-left: 200px;

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
    <a href="Create_Orders.php" class="w3-bar-item w3-button" id="lib-thanh-active" ">Create Orders  </a>
    <a href="ngayle.php"        class="w3-bar-item w3-button" id="lib-thanh" ">Create Holiday  </a>

     <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-size-small" ">Panel</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Create_Pannel.php">Create</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="listpannel.php">List</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="exporttest.php">Export</a>
    </div>
  </div>


    <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;">Modify Information</button>
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




                    <input type = "submit" id="show" value= "Click Here" class="btn btn-lg btn-primary" >
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
                      <input type = "submit"  value= "Clear" class="btn btn-lg btn-primary" id="button3">
                  </div>
               </li>
          </ul>
            <div id="display_showall_project"></div>
          <ul class="topmenu" style="clear: left;">
               <li>
                 <lable for = "text1" class="word" > Search Customer: </label>
                 <input type ="text" id="seacrh_customer" class="text1" placeholder="ID, Name"  style="margin-top: 16px;" > </input>
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
                    <input type = "submit"  value= "Clear" class="btn btn-lg btn-primary" id="button6">
                  </div>
               </li>
               </ul>
            <div id="display_showall_customer"></div>
            </div>

            <div style="clear: left">
          <form method ="POST" action="" enctype="multipart/form-data">
                    <fieldset class="fieldset1" >
                <p>Orders Information</p>
                <lable for = "text2" class="word">Customer Phone: </label>
                <input type ="text" name="text2" class="text2" id="text2"  required=""> </input>
                <br>
                <br>

                      <span id="display_check_phoneCus"></span>
                <br>

                <lable for = "text4" class="word">Project ID: </label>
                <input type ="text" name="text4" class="text4" id="text4" required=""  > </input>

                <br>
                <br>
                      <span id="display_check_project"></span>
                      <br>
                <input type="file" name = "file" id = "submit" style="margin-left: 20px">
                <br>
                <button name="button1" type="submit" class="btn btn-lg btn-primary" style="margin-left: 200px;margin-bottom: 50px;margin-top: 10px;"> Import</button>
              </fieldset>
          </form>
          </div>
    </body>
  </html>

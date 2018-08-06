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





<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>Intern in Hai Nam Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<!--  -->
<?php
if(isset($_POST['button1']))
{

   $text1 = $_POST['text1'];  // sdt input
   $texthai = $_POST['texthai'];  //code customer
   $text2 = $_POST['text2'];  #name
   $text3 = $_POST['text3'];  #sdt update
   $text5 = $_POST['text5'];  #ten cty
   $text6 = $_POST['text6'];  #makh
   $text7 = $_POST['text7'];  #dia chi

    if (  mysql_num_rows(mysql_query("SELECT * from khachhang where mskh='$texthai'")) ==1)
       {
           if ($text6=='')
              $flag_check=1;
            if ($text6 !='' and strlen($text6)==3)
              $flag_check=1;
        #text nao rong thi khong update
            if ($flag_check)
            {


          if ($text2!="")
            mysql_query("UPDATE khachhang SET tenkh='$text2' where mskh = '$texthai' ");
          if ($text5!="")
            mysql_query("UPDATE khachhang SET tencongty='$text5' where mskh = '$texthai' ");
          if ($text7!="")
            mysql_query("UPDATE khachhang SET diachi='$text7' where mskh = '$texthai' ");
          if ($text3!="")
            mysql_query("UPDATE khachhang SET sdt='$text3' where mskh = '$texthai' ");
          if ($text6!="" and strlen($text6)==3)
          {
            $sql=mysql_query("SELECT * From khachhang where mskh = '$texthai'");
            $sql=mysql_fetch_array($sql);
            $sql=$sql['sdt'];
            $sql=mysql_query("SELECT * From donhang where sdt = '$sql'");
            $sql=mysql_fetch_array($sql);
            $sql=$sql['msduan'];
            $tu=mysql_query("SELECT * FROM tu where msduan ='$sql'");
            while ( $turow=mysql_fetch_array($tu))
            {
              $mstu=$turow[0];
              $khungtu=mysql_query("SELECT * FROM khungtu where mstu = '$mstu'");
              while ($khungturow = mysql_fetch_array($khungtu))
              {
                  $mskhungtu=$khungturow[0];

                  $lenght=strlen($mskhungtu);
                  $msduan=substr($mskhungtu, 0,6);
                  $temp=substr($mskhungtu,9,$lenght-9);
                  $mskhungtu1=$msduan.$text6.$temp;
                  mysql_query("UPDATE khungtu SET mskhungtu='$mskhungtu1' where mskhungtu = '$mskhungtu' ");
              }
              $lenght=strlen($mstu);
              $msduan=substr($mstu,0,6);
              $temp = substr($mstu,9,$lenght-9);
              $mstu1=$msduan.$text6.$temp;
              mysql_query("UPDATE tu SET mstu='$mstu1' where mstu = '$mstu' ");

            }
            mysql_query("UPDATE khachhang SET mskh='$text6' where mskh = '$texthai' ");
          }
          ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Congratulation !",
              text: "Update successful! \n\n Please click button Information check again!!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='ModifyCustomer.php';
            });
            });
            </script>
            <?php
          // echo '<script>alert("Updata Success ")</script>';
       }
       else
       {
        ?>
                <script type="text/javascript">
                  $(document).ready(function(){
                 swal({
                title: "Sorry!",
                text: "Customer's code wrong!! \n\n Information will not update!!!",
                icon: "error",
              })
                 .then((willDelete) => {
                 window.location='ModifyCustomer.php';
              })
              });
              </script>
              <?php
       }
       // else echo '<script>alert("mskh sai, khong cap nhat gi het")</script>';
     }
    elseif (  mysql_num_rows(mysql_query("SELECT * from khachhang where mskh='$texthai'")) ==0)
       {
        ?>
                <script type="text/javascript">
                  $(document).ready(function(){
                 swal({
                title: "Sorry!",
                text: "Customer's code is not exist!!",
                icon: "error",
              })
                 .then((willDelete) => {
                 window.location='ModifyCustomer.php';
              })
              });
              </script>
              <?php
        // echo '<script>alert("mskh khong ton tai")</script>';
       }
    else
      {
        if ($text1 != "")  #if k nhap sdt bao fail
        {
          # sdt k ton tai bao fail
         if (  mysql_num_rows(mysql_query("SELECT * from khachhang where sdt = '$text1' and mskh='$texthai'")) !=0)
          {
            if ($text6=='')
              $flag_check=1;
            if ($text6 !='' and strlen($text6)==3)
              $flag_check=1;
        #text nao rong thi khong update
            if ($flag_check)
            {
                     if ($text2!="")
                       mysql_query("UPDATE khachhang SET tenkh='$text2' where sdt = '$text1' ");
                     if ($text5!="")
                       mysql_query("UPDATE khachhang SET tencongty='$text5' where sdt = '$text1' ");
                     if ($text7!="")
                       mysql_query("UPDATE khachhang SET diachi='$text7' where sdt = '$text1' ");
                     if ($text6!="" and strlen($text6)==3)
                     {
                           $sql=mysql_query("SELECT * From donhang where sdt = '$text1'");
                           $sql=mysql_fetch_array($sql);
                           $sql=$sql['msduan'];
                           $tu=mysql_query("SELECT * FROM tu where msduan ='$sql'");
                           while ( $turow=mysql_fetch_array($tu))
                           {
                             $mstu=$turow[0];
                             $khungtu=mysql_query("SELECT * FROM khungtu where mstu = '$mstu'");
                             while ($khungturow = mysql_fetch_array($khungtu))
                             {
                                 $mskhungtu=$khungturow[0];
                                 $lenght=strlen($mskhungtu);
                                 $msduan=substr($mskhungtu, 0,6);
                                 $temp=substr($mskhungtu,9,$lenght-9);
                                 $mskhungtu1=$msduan.$text6.$temp;
                  mysql_query("UPDATE khungtu SET mskhungtu='$mskhungtu1' where mskhungtu =   '$mskhungtu' ");
                             }
                             $lenght=strlen($mstu);
                             $msduan=substr($mstu,0,6);
                             $temp = substr($mstu,9,$lenght-9);
                             $mstu1=$msduan.$text6.$temp;
                             mysql_query("UPDATE tu SET mstu='$mstu1' where mstu = '$mstu' ");
                           }
                       mysql_query("UPDATE khachhang SET mskh='$text6' where sdt = '$text1' ");
                     }
                     if ($text3!="")
                      mysql_query("UPDATE khachhang SET sdt='$text3' where sdt = '$text1' ");
                     ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Congratulation !",
              text: "Update successful! \n\n Please click button Information check again!!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='ModifyCustomer.php';
            });
            });
            </script>
            <?php

                      // echo '<script>alert("Success Updata")</script>';
            }
            else
            {
               ?>
                <script type="text/javascript">
                  $(document).ready(function(){
                 swal({
                title: "Sorry!",
                text: "Customer's code wrong!! \n\n Information will not update!!!",
                icon: "error",
              })
                 .then((willDelete) => {
                 window.location='ModifyCustomer.php';
              })
              });
              </script>
              <?php
            }
            // else
              // echo '<script>alert("mskh sai, khong cap nhat gi het")</script>';
           }
           else
            echo '<script>alert("du lieu nhap khong dung")</script>';
       }
        else
        {
           ?>
                <script type="text/javascript">
                  $(document).ready(function(){
                 swal({
                title: "Sorry!",
                text: "Please choose phone carefully!! ",
                icon: "error",
              })
                 .then((willDelete) => {
                 window.location='ModifyCustomer.php';
              })
              });
              </script>
              <?php
        }
        // else
         // echo '<script>alert("mskh qua nhieu xin moi nhap sdt")</script>';
      }
}
 ?>

<!--  -->

      <script  type="text/javascript">

        $(document).ready(function(){

    $("#texthai").keyup(function(){

    var mskh = $("#texthai").val();
    $.post("ModifyCustomer_ajax.php", {mskh: mskh}, function(data){$("#display_check_codeCus").html(data);})
  })
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
            .text1{
            height: 50px;
            width: 250px;
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
            margin-left: 14%;
        }
            .text2 {
            height: 50px;
            width: 250px;
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
            margin-left: 14.7%;
        }
            .text3 {
            height: 50px;
            width: 250px;
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
            margin-left: 14.3%;
        }
            .text5 {
            height: 50px;
            width: 250px;
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
            margin-left: 6.5%;
        }
        .textsau {
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
            margin-left: 44px;
          }
           .text6 {
            height: 50px;
            width: 250px;
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
            margin-left: 15.4%;
        }
            .text7 {
            height: 50px;
            width: 250px;
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
            margin-left: 12.8%;
        }   .texthai {
            height: 50px;
            width: 250px;
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
            margin-left: 15%;
        }


        .fieldset1 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: auto;
          }
        .fieldset2 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            height: auto;
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
          .display{
            text-align:center;
            font-family:;
            font-style: italic;
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
                 <input type ="text" id="seacrh_customer" class="textsau" placeholder="ID, Name"  style="margin-top: 16px;" > </input>
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



      <form method="post" action="" autocomplete="off">
                    <p>Customer Information</p>
                      <lable for = "texthai" class="word">Current Code: </label>
                      <input type ="text" name="texthai" class="texthai" id="texthai" placeholder="xxx" required=""  > </input>
                      <span id="display_check_codeCus"></span>
                      <div  style="margin-top: 1%;">
                      </div>
                     <lable for = "text2" class="word">Update Name: </label>
                     <input type ="text" name="text2" class="text2"  > </input>
                     <br>
                     <br>
                     <lable for = "text3" class="word">Update Phone: </label>
                     <input type ="text" name="text3" class="text3"  > </input>
                     <br>
                     <br>
                     <lable for = "text5" class="word">Update Company Name: </label>
                     <input type = "text" name="text5" class="text5" >   </input>
                     <br>
                     <br>
                     <lable for = "text6" class="word">Update Code: </label>
                     <input type = "text" name="text6" class="text6" >   </input>
                     <br>
                     <br>
                     <lable for = "text7" class="word">Update Address: </label>
                     <input type = "text" name="text7" class="text7" >   </input>
                     <br>
                     <input type = "submit" onclick="document.body.style.cursor='progress'" name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 20%;margin-top: 1%;">
            </form>
  </body>
</html>
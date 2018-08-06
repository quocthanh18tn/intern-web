<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}

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

<?php
if ( isset($_POST['button1']))
{
  $msduan=$_POST['msduan'];
  $sdt=$_POST['sdt'];
  $order=$_POST['order'];
  // query mskh
  if ($msduan and $sdt and $order)
  {
  $sql= "SELECT * FROM khachhang where sdt='$sdt'";
  $query= mysql_query($sql);
  $mskh=mysql_fetch_array($query);
  $mskh=$mskh['mskh'];
  $mstutemp=$msduan.$mskh.$order;
  // delete mstu
  // echo '<script>alert("Delete success")</script>';
  ?>
     <script type="text/javascript">
    $(document).ready(function(){
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this file!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete)
  {
    var mskh  ="<?php echo $mskh ?>";
    var msduan="<?php echo $msduan ?>";
    var sdt   ="<?php echo $sdt ?>";
    var order="<?php echo $order ?>";
     $.post("Delete_Orders_xuly.php", {msduan: msduan,sdt: sdt,order: order,mskh: mskh}, function(data){$("#a").html(data);});
      // $.post("Delete_Orders_ajax_order.php", {sdt: sdt,msduan: msduan}, function(data){$("#order").html(data);})
  // mysql_query("DELETE FROM tu where mstu like '%$mstutemp%'");
  // mysql_query("DELETE FROM donhang where sdt='$sdt' and msduan='$msduan' and landat='$order' ");
     //
    swal("Poof! Your file has been deleted!", {
      icon: "success",
    });


  }
   else
    {
    swal("Your imaginary file is safe!");
  }
});
});
</script>
<?php

  }

  else
  {
    ?>
  <script type="text/javascript">
    $(document).ready(function(){
   swal({
  title: "Sorry!",
  text: "Please choose phone number and order carefully",
  icon: "error",
  // dangerMode: true,
})
   .then((willDelete) => {
   window.location='Delete_Orders.php';
})
});
</script>
<?php
    // echo '<script>alert("sao m ngu v")</script>';
  }
}
?>

      <script  type="text/javascript">

        $(document).ready(function(){

  //   $("#Import").click(function(){

  //   var msduan = $("#text1").val();
  //   $.post("Create_Pannel_ajax_sdt.php", {msduan: msduan}, function(data){$("#sdt").html(data);})
  // })

    $("#sdt").change(function(){
    var sdt = $("#sdt").val();
    var msduan = $("#text1").val();
    $.post("Delete_Orders_ajax_order.php", {sdt: sdt,msduan: msduan}, function(data){$("#order").html(data);})
  })

 $("#text1").keyup(function(){

    var msduan = $("#text1").val();
      document.getElementById('order').innerHTML='';
    $.post("Create_Orders_ajax_checkIDproject.php", {msduan: msduan}, function(data){$("#display_check_project").html(data);});
    $.post("Delete_Orders_ajax_sdt.php", {msduan: msduan}, function(data){$("#sdt").html(data);})
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
            height: 60px;
            width: 420px;
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
            .text2 {
            height: 60px;
            width: 420px;
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
            margin-top: 20px;
            margin-left: 14px;
        }
            .text3 {
            height: 60px;
            width: 420px;
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
            margin-left: 17px;
            margin-top: 20px;
        }

        .fieldset1 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 1000px;
            height: auto;
            margin-left: 200px;
          }
        .fieldset2 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 1200px;
            height: 700px;
            margin-left: 80px;

          }
        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
            .word1{
            font-size: 20px;
            /*font-weight: bold;*/
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
        <button class="w3-button" id="lib-thanh-active">Orders</button>
        <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="Create_Orders.php">Add Orders</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="Delete_Orders.php">Delete Orders</a>
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


<form action="" method="POST">
              <fieldset class="fieldset1">
                <p>Project Information</p>
                <div>
                <lable  class="word"> Project ID: </label>
                <input type ="text" name="msduan"  class="text1" id="text1" required="" > </input>
                <!-- <input value="Import" type="button" id="Import" class="btn btn-lg btn-primary" style="margin-left: 20px;" > </input> -->
                      <span id="display_check_project" ></span>
                    </div>
                    <div>
                  <lable class="word" > Customer Phone: </label>
                <SELECT id ="sdt" class="text2" name="sdt">
                </SELECT>
                </div>
                <div>
                  <lable class="word"> Customer Order: </label>
                  <SELECT id ="order" class="text3" name="order">
                  </SELECT>
                  </div>
                  <br>
                  <br>
                <button name="button1"  onclick="document.body.style.cursor='progress'" type="submit" class="btn btn-lg btn-primary" style="margin-left: 5%;margin-bottom: 50px;margin-top: 10px;width: 150px;height: 50px;"> Delete</button>
              </fieldset>

              </form>
<div id="a"></div>
          </body>
          </html>

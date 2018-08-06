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

    $("#Import").click(function(){

    var msduan = $("#text1").val();
    $.post("Create_Pannel_ajax_sdt.php", {msduan: msduan}, function(data){$("#sdt").html(data);})
  })

    $("#sdt").change(function(){
    var sdt = $("#sdt").val();
    var msduan = $("#text1").val();
    document.getElementById('display_column').innerHTML='';
    $.post("Create_Pannel_ajax_order.php", {sdt: sdt,msduan: msduan}, function(data){$("#order").html(data);})
  })
 $("#order").change(function(){
    var order = $("#order").val();
    var sdt = $("#sdt").val();
    var msduan = $("#text1").val();
    $.post("Create_Pannel_ajax_column.php", {order: order,msduan: msduan,sdt:sdt}, function(data){$("#display_column").html(data);})
  })
 $("#text1").keyup(function(){

    var msduan = $("#text1").val();
    $.post("Modifyproject_ajax.php", {msduan: msduan}, function(data){$("#display_check_project").html(data);})
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
#lib-thanh-size-small{padding: 14px;width: 100px;background-color: #ccc;color: #000;}
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
              <form action="Create_Pannel_xulydulieu.php" method="POST">
              <fieldset class="fieldset1">
                <p>Import Project</p>
                <div>
                <lable  class="word"> Project ID: </label>
                <input type ="text" name="msduan" id="text1" class="text1" id="text1" required="" > </input>
                <input value="Import" type="button" id="Import" class="btn btn-lg btn-primary" style="margin-left: 20px;" > </input>
                <br>
                <br>
                      <span id="display_check_project"></span>
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
              </fieldset>
              <div id="display_column" ></div>

</form>
          </body>
          </html>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<?php
if(isset($_POST['button1']))
  {
      $msduan=$_POST['textmot'];
      $order=$_POST['order'];
      $text1=$_POST['text1'];     #no pannel
      // echo $text1;
      if ($msduan!='' and $order!='' and $text1!='')
      {
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
    var mstu  ="<?php echo $text1 ?>";
    // alert()
     $.post("Delete_Panel_xuly.php", {mstu: mstu}, function(data){$("#a").html(data);});
    swal("Poof! Your file has been deleted!", {
      icon: "success",
    });
  }
   else
    {
    swal("Your imaginary file is safe!");
  }
});
   // window.location='Delete_Panel.php';
});
</script>
<?php
        // echo '<script>alert("Delete Panel Success")</script>';
      }
      else
      {
        ?>

  <script type="text/javascript">
    $(document).ready(function(){
   swal({
  title: "Sorry!",
  text: "Please make sure your date correct!! \n\n Please try again carefully!!",
  icon: "error",
  // dangerMode: true,
})
   .then((willDelete) => {
   window.location='Delete_Panel.php';
})
});
</script>
<?php
        // echo '<script>alert("eee")</script>';
      }
  }
?>




    <script  type="text/javascript">

        $(document).ready(function(){

    $("#textmot").keyup(function(){
    var msduan = $("#textmot").val();
    document.getElementById('show_details_panel').innerHTML='';
    document.getElementById('displayPanelID').innerHTML='';
     document.getElementById('orderdis').style.display='block';
    $.post("ModifyPannel_ajax_project.php", {msduan: msduan}, function(data){$("#display_check_project").html(data);});
    // $.post("ModifyPannel_ajax_display_idPannel.php", {msduan: msduan}, function(data){$("#displayPanelID").html(data);});
    $.post("listpannel_ajax_order.php", {msduan: msduan}, function(data){$("#order").html(data);});
  })

   $("#order").change(function(){

    var msduan = $("#textmot").val();
    var order = $("#order").val();
    document.getElementById('show_details_panel').innerHTML='';

     $.post("ModifyPannel_ajax_display_idPannel.php", {msduan: msduan,order: order}, function(data){$("#displayPanelID").html(data);});
    // $.post("listpannel_ajax.php", {msduan: msduan,order: order}, function(data){$("#listpannel_ajax").html(data);})
  })

          $("#displayPanelID").change(function(){
    var mstu = $("#displayPanelID").val();
    document.getElementById('show_details_panel').innerHTML='';

     $.post("ModifyPannel_ajax_display_details.php", {id: mstu}, function(data){$("#show_details_panel").html(data);})
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
            .textmot {
            width: 400px;
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
            margin-left: 15.1%;
        }    .text1 {
            width: 400px;
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
            margin-left: 15.9%;
        }

                .order {
            height: 50px;
            width: 400px;
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
            margin-left: 10.4%;
            margin-top: 1.2%;

        }
        .fieldset1 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 800px;
            height: 700px;
            margin-left: 400px;
          }

        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
            .word1{
            font-size: 20px;
            font-weight: bold;
            /*margin-left: 20px;*/
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
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Create_Pannel.php">Create Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="listpannel.php">List Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="exporttest.php">Export Column ID</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="ModifyPannel.php">Modify Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Delete_Panel.php">Delete Panel</a>
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



          <form method="post" action="" autocomplete="off">
              <!-- <fieldset class="fieldset1"> -->
                <p>Panel Information</p>
                <br>
                <lable for = "textmot" class="word" > Project ID: </label>
            <input type ="text" name="textmot" class="textmot" placeholder="xxxxxx" id="textmot" required=""  > </input>
                 <span id="display_check_project"></span>

                 <div id="orderdis" style="display: block;">
                    <lable class="word"> Customer Order: </label>
                  <SELECT id ="order" class="order" name="order">
                  </SELECT>
                </div>

                <div style="margin-top: 2%;">
                <lable class="word"  > Panel ID : </label>
                 <SELECT id ="displayPanelID" class="text1" name="text1" >
                 </SELECT>
                 </div>
                 <br>
                 <br>
                 <div id="show_details_panel"></div>
                <div style="margin-top: 1%;">
                </div>
               <!--  <lable for = "text1" class="word"> Pannel ID: </label>
                <input type = "text" name="text1" class="text1" required="">   </input>
                -->
                <input type = "submit" name="button1" value= "Delete" class="btn btn-lg btn-primary" style="margin-left: 250px;margin-bottom: 50px;margin-top: 10px;">
              <!-- </fieldset> -->
            </form>
            <div id="a"></div>
          </body>
          </html>

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
<!--  -->
<?php
if(isset($_POST['button1']))
  {
      $text1=$_POST['text1'];     #no pannel
      $sql="SELECT * FROM khungtu where mstu='$text1'";
      $query=mysql_query($sql);
      $row=mysql_num_rows($query);
      $text2=$_POST['text2'];     #no frame
      $name=$_POST['namepanel'];
      $order=$_POST['order'];
      $msduan=$_POST['textmot'];
      if (mysql_num_rows (mysql_query("SELECT * FROM duan where msduan='$msduan'") )!=0)
      {
      if ($order!=0)
      {
      if ( mysql_num_rows (mysql_query("SELECT * FROM tu where mstu='$text1'") )!=0)
        {
          if ($text2!="" && $text2<1000)
          {
              for ($i=1;$i<=$text2;$i++)
              {
                if ( $i <10)
                {
                  $mskhungtu=$text1.'00'.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))==0)
                  mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$text1')");
                }
                else if ( $i <100)
                {
                  $mskhungtu=$text1.'0'.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))==0)
                  mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$text1')");

                }
                else
                {
                  $mskhungtu=$text1.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))==0)
                  mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$text1')");
                }
              }
              for ( $i= $text2+1;$i<1000;$i++)
              {
                if ($i<10)
                {
                  $mskhungtu=$text1.'00'.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("DELETE FROM  khungtu  where mskhungtu='$mskhungtu'");
                }
                else if ($i<100) {
                   $mskhungtu=$text1.'0'.$i;
                  if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("DELETE FROM  khungtu  where mskhungtu='$mskhungtu'");

                }
                else
                {
                  $mskhungtu=$text1.$i;
                if ( mysql_num_rows(mysql_query("SELECT * from khungtu where mskhungtu='$mskhungtu'"))!=0)
                  mysql_query("DELETE FROM  khungtu  where mskhungtu='$mskhungtu'");
                }
              }
              $flag_number=1;
          // echo '<script>alert("Update number of column success")</script>';

          }


          #xu ly ngay
        $FAT=$_POST['Fat'];
        $Delivery=$_POST['Delivery'];
        $Adjust_FAT=$_POST['Adj_Fat'];
        $Adjust_Delivery=$_POST['Adj_Delivery'];
        $Actual_Delivery=$_POST['Actual_Delivery'];
         if ($name !="")
          {
            mysql_query("UPDATE tu SET tentu='$name'where mstu = '$text1' ");
            $flag_name=1;
            // echo '<script>alert("update name success")</script>';
          }

        if ($FAT !="")
          {
            $flag_fat=1;
            mysql_query("UPDATE tu SET fatdukien='$FAT'where mstu = '$text1' ");
            // echo '<script>alert("update fat success")</script>';
          }
        if ($Delivery !="")
          {
            $flag_delivery=1;
            mysql_query("UPDATE tu SET giaohangthucte='$Delivery'where mstu = '$text1' ");
            // echo '<script>alert("update Delivery success")</script>';
          }
        if ($Adjust_FAT !="")
          {
            $flag_adjustfat=1;
          mysql_query("UPDATE tu SET fathieuchinh='$Adjust_FAT' where mstu = '$text1' ");
          // echo '<script>alert(/"update Adjust_FAT success")</script>';
          }
        if ($Adjust_Delivery !="")
          {
            $flag_adjustdelivery=1;
            mysql_query("UPDATE tu SET giaohanghieuchinh='$Adjust_Delivery' where mstu = '$text1' ");
            // echo '<script>alert("update Adj_Delivery success")</script>';
          }
        if ($Actual_Delivery !="")
          {
            $flag_actualdelivery=1;
            mysql_query("UPDATE tu SET giaohangthucte='$Actual_Delivery' where mstu = '$text1' ");
            // echo '<script>alert("update Actual_Delivery success")</script>';
          }

          if ($flag_actualdelivery or $flag_adjustdelivery or $flag_adjustfat or $flag_delivery or $flag_fat or $flag_name or $flag_number )
          {
            ?>
                 <script type="text/javascript">
                    $(document).ready(function(){
                   swal({
                  title: "Congratulation !",
                  text: "You just update successfully! \n\n Please check Information again make sure your data is correct!!!",
                  icon: "success",
                })
                   .then((willDelete) => {
                   window.location='ModifyPannel.php';
                });
                });
                </script>
                <?php
          }
        }
        else
        {
                        ?>
              <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Sorry!",
              text: "Panel ID is not exist!!!",
              icon: "error",
              // dangerMode: true,
            })
               .then((willDelete) => {
               window.location='ModifyPannel.php';
            })
            });
            </script>
            <?php
          // echo '<script>alert("panel ID khong ton tai Fail")</script>';
        }

      }
        else
        {
                        ?>
              <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Sorry!",
              text: "Please choose order carefully!!!",
              icon: "error",
              // dangerMode: true,
            })
               .then((willDelete) => {
               window.location='ModifyPannel.php';
            })
            });
            </script>
            <?php
          // echo '<script>alert("Please choose order")</script>';
        }

    }
    else
    {
                    ?>
              <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Sorry!",
              text: "Project ID is not exist!!!",
              icon: "error",
              // dangerMode: true,
            })
               .then((willDelete) => {
               window.location='ModifyPannel.php';
            })
            });
            </script>
            <?php
    }
          // echo '<script>alert("Project ID khong ton tai Fail")</script>';

  }
?>

<!--  -->

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
            .text2 {
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
            margin-left: 8%;
        }
            .text3 {
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
            margin-left: 14%;
        }
            .text4 {
            width: 400px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size:  18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 10.8%;
        }
            .text5 {
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
            margin-left: 8.6%;
        }
           .text6 {
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
            margin-left: 4.9%;
        }
            .text7 {
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
            margin-left: 9.5%;
        }
        .namepanel {
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
            margin-left: 18.8%;
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
            margin-left: 10.2%;
            margin-top: 1%;

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

                <div style="margin-top: 1%;">
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
                 <div id="show_details_panel"></div>
                <div style="margin-top: 1%;">
                </div>
               <!--  <lable for = "text1" class="word"> Pannel ID: </label>
                <input type = "text" name="text1" class="text1" required="">   </input>
                -->
                <div style="margin-top: 1%;">
                <lable for = "namepanel" class="word"> Name: </label>
                <input type = "text" name="namepanel" class="namepanel" >   </input>
                <br>
                <br>

                <lable for = "text2" class="word"> Number of Column: </label>
                <input type = "text" name="text2" class="text2" >   </input>
                <br>
                <label for = "Fat" class="word">FAT Date :</label>
                <input type="date"  name="Fat" class="text3" >
                <br>
                <label for = "Delivery" class="word">Delivery Date:</label>
                <input type="date"  name="Delivery" class="text4" >
                <br>
                <label for = "Adj_Fat" class="word">Adjust FAT Date:</label>
                <input type="date"  name="Adj_Fat" class="text5"  >
                <br>
                <label for = "Adj_Delivery" class="word">Adjust Delivery Date:</label>
                <input type="date" name="Adj_Delivery" class="text6" >
                <br>
                <label for = "Actual_Delivery" class="word">Actual Delivery:</label>
                <input type="date"  name="Actual_Delivery" class="text7" >
                <br>
                <input type = "submit" name="button1"  onclick="document.body.style.cursor='progress'" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 250px;margin-bottom: 50px;margin-top: 10px;">
              <!-- </fieldset> -->
            </form>

          </body>
          </html>

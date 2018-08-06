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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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
            margin-left: 72px;
            margin-top: 50px;

        }
p{
            font-size: 25px;
            font-weight: bold;
            text-align: center;
          }

        .word{
            font-size: 20px;
            font-weight: bold;
            margin: 50px;
          }

          table, th, td {
    border: 2px solid white;
}
.table{
margin-left: 80px;
width: 1200px;
}
th, td {
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


          <form method ="POST" action="" >
                        <lable for = "text1" class="word" > Info Manager: </label>
                        <input type ="text" name="text1" class="text1" placeholder="ID, Name, Type ID"  style="width: 300px;" > </input>
                         <input type = "submit" name="button1" value= "Search" class="btn btn-lg btn-primary" style="margin-left: 5%;width:120px;margin-top: 2px;">
                         <br>
                <input type = "submit" name="button2" value= "Show all" class="btn btn-lg btn-primary" style="margin-left: 49%;margin-bottom: 50px;margin-top: 20px;">
                    <p>Manager Information</p>
                    <br>
            <table class="table ">

  <tr>
    <th >ID</th>
    <th >Name</th>
    <th>Password</th>
    <th>Type Name</th>
    <th>Type ID</th>
    <th>Phone</th>
  </tr>
                    <?php
                    if(isset($_POST['button2']))
                    {
                      $tb=mysql_query("SELECT * FROM quanly");
                    ?>
  <?php
    while ( $temp=mysql_fetch_array($tb))
    {

    ?>
    <tr>
    <td><?php echo $temp[0];?></td>
    <td><?php echo $temp[4];?></td>
    <td><?php echo $temp[1];?></td>
    <td><?php echo $temp[3];?></td>
    <td><?php echo $temp[2];?></td>
    <td><?php echo $temp[5];?></td>
    </tr>
    <?php
  }
?>
<?php
  }
?>
          <?php
                    if(isset($_POST['button1']))
                {
                    $temp1=$_POST['text1'];
                    $tb=mysql_query("SELECT * From quanly where msquanly like '%$temp1%' or msloai like '%$temp1%' or loai like '%$temp1%' or ten like '%$temp1%'");
          ?>
 <?php
    while ( $temp=mysql_fetch_array($tb))
    {

    ?>
    <tr>
    <td><?php echo $temp[0];?></td>
    <td><?php echo $temp[4];?></td>
    <td><?php echo $temp[1];?></td>
    <td><?php echo $temp[3];?></td>
    <td><?php echo $temp[2];?></td>
    <td><?php echo $temp[5];?></td>
    </tr>
    <?php
  }
?>
<?php
  }
?>

</table>
                <br>

          </form>
  </body>
</html>
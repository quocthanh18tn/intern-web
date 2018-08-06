<?php
include "../../connection.php";
?>
<?php
if (isset($_POST['them']))
{
  $sql =mysql_query("SELECT * FROM holiday WHERE holiday_date='$_POST[date_them]'");
  if(mysql_num_rows($sql)==0)
  {
    mysql_query("INSERT INTO holiday (ten,holiday_date) VALUES ('$_POST[name_date_them]','$_POST[date_them]')");
    $sql =mysql_query("SELECT * FROM holiday WHERE holiday_date='$_POST[date_them]'");
    if (mysql_num_rows($sql)==0) echo '<script>alert("ERROR: PLEASE TRY AGAIN!")</script>';
    else echo '<script>alert("SUCCESS!")</script>';

  }
  else echo '<script>alert("ERROR: HOLIDAY IS EXISTED!")</script>';

}
if (isset($_POST['xoa']))
{
  $sql =mysql_query("SELECT * FROM holiday WHERE holiday_date='$_POST[date_xoa]'");
  if(mysql_num_rows($sql)>0)
  {
    mysql_query("DELETE FROM holiday WHERE holiday_date='$_POST[date_xoa]'");
    $sql =mysql_query("SELECT * FROM holiday WHERE holiday_date='$_POST[date_xoa]'");
    if (mysql_num_rows($sql)==0) echo '<script>alert("SUCCESS!")</script>';
    else echo '<script>alert("ERROR: PLEASE TRY AGAIN!")</script>';

  }
  else echo '<script>alert("ERROR: HOLIDAY IS NOT EXISTED, CAN NOT DELETE!")</script>';

}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<title>EMPLOYEE'S TASK HISTORY</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style type="text/css">
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
        }.text3 {
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
form div{
   margin-bottom: 25px ;
}
label {
    font-weight: bold;
    line-height: 23px;
    float: left;
    font-size: 20px;
}
fieldset {
    border:  1px solid #999;
    border-radius: 8px;
    box-shadow: 0 0 10px #999;
}

h2{
  text-align: left;
  font-weight: bold;
  font-size: 30px;
  height: 30px;
  padding: 10px;
}

form table{font-weight:bold;font-size: 17px}
form input#start{
    font-size:30px;
    font-weight: bold;
    float:left;

}

form input#finish{
    font-size:30px;
    font-weight: bold;
    float: right;

}
legend {
    font-size: 22px;
    font-weight: bold;
}
          .p1{
            font-weight: bold;
            text-align: center;
          }
#nv{
    font-size: 17px;
    font-weight: bold;
}
  .fakeimg1 {
            height: 115px;
            background: lightblue;
            color:black;
            padding: 15px;
                  }
body{
            background-image: url(../background.jpg);
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

    </style>
	<script type="text/javascript">
	</script>
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

    <a href="ngayle.php"        class="w3-bar-item w3-button" id="lib-thanh-active" >Setting Holiday  </a>

    <a class="w3-bar-item w3-button"  href="../logout.php" id="lib-thanh-logout">Logout</a>
</div>


        <br>
        <br>
            <form action="" method="POST">
              <div>
                <input type="date" name ="date_them"   class="text1" id="date_them" ></input>
                <input type="text"  name ="name_date_them" class="text2" placeholder="Name Holiday..." id="name_date_them" required="" >
                <input type="submit" name ="them"  onclick="document.body.style.cursor='progress'" id="them" style="border-radius: 18px;width: 146px;margin-left: 10px;" class="btn btn-primary" value="ADD HOLIDAY"></input>
            </form>
            <br>
            <br>
            <form action="" method="POST">
              <div>
                  <input type="date" name ="date_xoa" class="text3" id="date_xoa" ></input>
                  <input type="submit" name ="xoa"  onclick="document.body.style.cursor='progress'" id="xoa" class="btn btn-primary" style="border-radius: 18px;margin-left: 278px;" value="DELETE HOLIDAY" ></input>
              </div>
            </form>
    <table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th width="" bgcolor="#999999"><strong>HOLIDAY</strong></th>
                                <th width="" bgcolor="#999999"><strong>NAME OF HOLIDAY</strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $tb = mysql_query("SELECT holiday_date,ten FROM holiday ORDER BY holiday_date DESC");
                                 while ($row = mysql_fetch_array($tb))
                                 {
                            ?>
                                <tr>
                                <td>&nbsp;<?php echo $row[0];?></td>
                                <td>&nbsp;<?php echo $row[1];?></td>
                                </tr>

                            <?php
                                 }
                            ?>
                            </tbody>
  </table>
</body>
</html>


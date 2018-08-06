<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['quanly']))){
header("location:main_login_phancong.php");
}
?>

<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>EMPLOYEE LIST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style>
        .fakeimg1 {
            height: 85px;
      background: lightblue;
      color:black;
      padding: 10px;
      font-weight: bold;
      margin-top: 1px;
        }
        .carousel-inner img
          {
            width: 100%;
            height: 100%;
          }
          body{
            background-image: url(../quanlytong/background.jpg);
              }
            .text1 {
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
            height: 42px;

        }
p{
            font-size: 30px;
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
  </style>
</head>
      <body>
          <div class="fakeimg1 text-center" >
            <h1><strong>HAI NAM AUTOMATION</strong></h1>
            </div>
            <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php">Home</a>
                    <ul class="nav navbar-nav">
                      <li ><a href="theodoiduan.php" >Monitor Project</a></li>
                      <li ><a href="phancongcongviec.php">Assigment Page</a></li>
                      <li class="active"><a href="danhsachnhanvien.php">Employee List</a></li>
                      <li><a href="logout_phancong.php">Log out</a></li>
                    </ul>
                  </div>
            </nav>
          <form method ="POST" action="" >
                        <lable for = "text1" class="word" > Key word: </label>
                        <input type ="text" name="text1" class="text1" placeholder="ID, Name, Dep, Sub_dep"   > </input>
                         <input type = "submit" name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 60px;width:100px;margin-top: 10px;">
                         <br>
                <input type = "submit" name="button2" value= "Show all" class="btn btn-lg btn-primary" style="margin-left: 520px;margin-bottom: 50px;margin-top: 20px;">
                    <p>Employee Information</p>
                    <br>
            <table class="table ">

  <tr>
    <th >ID</th>
    <th >Name</th>
    <th>Dep</th>
    <th>Sub dep</th>
  </tr>
                    <?php
                    if(isset($_POST['button2']))
                    {
                      $tb=mysql_query("SELECT * FROM nhanvien");
                    ?>
  <?php
    while ( $temp=mysql_fetch_array($tb))
    {

    ?>
    <tr>
    <td><?php echo $temp[0];?></td>
    <td><?php echo $temp[1];?></td>
    <td><?php echo $temp[3];?></td>
    <td><?php echo $temp[4];?></td>
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
                    $tb=mysql_query("SELECT * From nhanvien where msnv like '%$temp1%' or hoten like '%$temp1%' or dep like '%$temp1%' or subdep like '%$temp1%'");
          ?>
 <?php
    while ( $temp=mysql_fetch_array($tb))
    {

    ?>
    <tr>
    <td><?php echo $temp[0];?></td>
    <td><?php echo $temp[1];?></td>
    <td><?php echo $temp[3];?></td>
    <td><?php echo $temp[4];?></td>
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
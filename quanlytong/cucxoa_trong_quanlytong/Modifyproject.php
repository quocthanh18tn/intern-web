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
if(isset($_POST['button1']))
  {
      $text1=$_POST['text1'];     #old no project
      $text2=$_POST['text2'];     #new no project
      $text3=$_POST['text3'];     #name project
      if ( mysql_num_rows (mysql_query("SELECT * FROM duan where msduan='$text1'") )!=0)
        {
          $sql="SELECT * FROM duan where msduan='$text2'";
          $query=mysql_query($sql);
          $num=mysql_num_rows($query);
          if ($num ==0)
          {
          if ($text3!="")
            mysql_query("UPDATE duan SET tenduan='$text3' where msduan = '$text1' ");
          if ($text2!="" && strlen($text2)==6)
          {
            $sql=mysql_query("SELECT * From duan where msduan = '$text1'");
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
                  $temp=substr($mskhungtu,6,$lenght-6);
                  $mskhungtu1=$text2.$temp;
                  mysql_query("UPDATE khungtu SET mskhungtu='$mskhungtu1' where mskhungtu = '$mskhungtu' ");
              }
              $lenght=strlen($mstu);
              $temp = substr($mstu,6,$lenght-6);
              $mstu1=$text2.$temp;
              mysql_query("UPDATE tu SET mstu='$mstu1' where mstu = '$mstu' ");
            }
            mysql_query("UPDATE duan SET msduan='$text2' where msduan = '$text1' ");
            echo '<script>alert("Success")</script>';

          }
          else
            echo '<script>alert("format  Fail")</script>';
        }
        else
            echo '<script>alert("project ID is existed  ")</script>';

        }
      else
        echo '<script>alert("Project Fail")</script>';
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

    $("#text1").keyup(function(){

    var msduan = $("#text1").val();
    $.post("Modifyproject_ajax1.php", {msduan: msduan}, function(data){$("#display_check_project").html(data);})
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
            margin-left: 98px;
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
            margin-left: 65px;
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
      <button class="w3-button" id="lib-thanh-active">Modify Information</button>
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

          <form method ="POST" action="" autocomplete="off">
                <div id = "col-25">
                  <fieldset class="fieldset1">
                     <p>Present Information</p>
                        <lable for = "text1" class="word"> Project ID: </label>
                        <input type ="text" name="text1" class="text1" id="text1" required=""  > </input>
                        <br>
                      <span id="display_check_project"></span>
                      <br>
                  </fieldset>
                </div>
                <div id = "col-75">
                  <fieldset class="fieldset2">
                    <p>Update Information</p>
                        <lable for = "text2" class="word"> Project ID: </label>
                        <input type ="text" name="text2" class="text2"  > </input>
                        <br>
                        <br>
                        <lable for = "text3" class="word">Project Name: </label>
                        <input type ="text" name="text3" class="text3" > </input>
                        <br>
                        <br>
                  </fieldset>
                </div>
                <input type = "submit" name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 600px;margin-bottom: 50px;margin-top: 40px;">
          </form>
  </body>
</html>
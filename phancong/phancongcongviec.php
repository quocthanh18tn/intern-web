<?php
session_start();
if(!(isset($_SESSION['quanly'])))
{
header("location:main_login_phancong.php");
}
?>
<?php
include "../connection.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
  <script  type="text/javascript">

$(document).ready(function(){
  $("#project").change(function(){
    var project = $("#project").val();
    var dongy=1;
    $.post("ajaxmstu.php", {project: project,dongy:dongy}, function(data){$("#displaytu").html(data);})
  })




})




  </script>
    <style type="text/css">
form {
    font-family: helvetica;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px
}
.hienthi
{
  font-size: 10px;
}
.text1 {
            height: 48px;
            width: 100%;
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
            margin-left: 12px;
            margin-top: 5px;

        }

.text2 {
            height: 48px;
            width: 100%;
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
            margin-left: 18px;
            margin-top:5px;

        }
        .text3 {
            height: 48px;
            width: 100%;
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
            margin-left: 28px;
            margin-top:5px;

        }
                .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }

.fakeimg1 {
            height: 115px;
            background: lightblue;
            color:black;
            padding: 15px;
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
    background-color: white;
    opacity: 0.8;
}
h1#ten{
  text-align: center;
  font-weight: bold;
}
h2{
  text-align: left;
  font-weight: bold;
  font-size: 30px;
  height: 30px;
  padding: 10px;
}

form table{font-weight:bold;font-size: 17px}
legend {
    font-size: 22px;
    font-weight: bold;
}
form input{
font-weight: bold;
}
body{
            background-image: url(../quanlytong/background.jpg);
              }

    </style>
</head>
<body>

<div class="fakeimg1 text-center" >
    <h1><strong>HAI NAM AUTOMATION</strong></h1>
          <div class="p1">WELCOM TO OURS COMPANY!</div>
          </div>
                             <div class="w3-bar w3-black" style="" >
    <a href="../index.php"      class="w3-bar-item w3-button" id="lib-thanh">Home</a>
    <!-- <a href="theodoiduan.php"   class="w3-bar-item w3-button" id="lib-thanh" >Monitor Project</a> -->
    <a href="phancongcongviec.php" class="w3-bar-item w3-button" id="lib-thanh-active" >Assignment Page</a>
    <a href="danhsachnhanvien.php"   class="w3-bar-item w3-button" id="lib-thanh" >Employee List</a>
    <a class="w3-bar-item w3-button"  href="logout_phancong.php" id="lib-thanh-logout">Logout</a>
</div>

 <br>
 <h1 id="ten"> TASK ASSIGMENT</h1>
 <form action="" method="POST">
                <div style="float: left;">
                      <lable for = "text1" class="word"> Project ID: </label>
                      <br>
                      <select id="project" class="text1">
                        <option value="" >Select ...</option>
                          <?php
                          $sql= "select * from duan ";
                          $query = mysql_query($sql);
                          $num = mysql_num_rows($query);
                          if ($num>0)
                            {
                              while($project = mysql_fetch_array($query))
                              {
                                 ?>
                                <option value="<?php echo $project['msduan']?>"><?php echo "$project[msduan]: $project[tenduan]"?></option>
                                <?php
                              }
                            }
                                ?>
                      </select>
                  </div>
                      <div id="displaytu"></div>

</form>
</body>
</html>
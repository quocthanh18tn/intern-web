<?php
session_start();
if(!(isset($_SESSION['quanly_gdtong'])))
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
.text1 {
            height: 48px;
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
            margin-left: 72px;

        }

.text2 {
            height: 48px;
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
            margin-left: 88px;
            margin-top:30px;

        }
        .text3 {
            height: 48px;
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
            margin-left: 68px;
            margin-top:10px;

        }
                .word{
            font-size: 20px;
            font-weight: bold;
            margin: 20px;
            }
.fakeimg1 {
      height: 85px;
      background: lightblue;
      color:black;
      padding: 10px;
      font-weight: bold;
      margin-top: 1px;
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
    background-color: white;
    opacity: 0.8;
}
h1#ten{
  text-align: left;
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
    </div>
    <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="../index.php">Home</a>
            </div>
            <ul class="nav navbar-nav">
              <li><a href="theodoiduan.php" >Monitor Project</a></li>
              <li class="active"><a href="phancongcongviec.php">Assigment Page</a></li>
              <li ><a href="danhsachnhanvien.php"  >Employee List</a></li>
              <li><a href="logout_phancong.php">Log out</a></li>
            </ul>
          </div>
    </nav>
 <br>
 <form action="" method="POST">
                      <lable for = "text1" class="word"> Project ID: </label>
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
                      <div id="displaytu"></div>

</form>
</body>
</html>
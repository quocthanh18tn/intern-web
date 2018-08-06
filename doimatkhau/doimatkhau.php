<?php
include "../connection.php";
?>
<?php
  if (isset($_POST['Submit']))
  { 
    $dk = mysql_query("SELECT * FROM quanly WHERE msquanly='$_POST[myusername]' AND password = '$_POST[oldpassword]'");
    if (mysql_num_rows($dk)==1)
    {
      if ($_POST['newpassword1']==$_POST['newpassword2'])
      {
        mysql_query("UPDATE quanly SET password = '$_POST[newpassword2]' WHERE msquanly='$_POST[myusername]'");
        if (mysql_num_rows(mysql_query("SELECT * FROM quanly WHERE msquanly='$_POST[myusername]' AND password = '$_POST[newpassword1]'"))==1)
          echo "<script type='text/javascript'>alert('SUCCESS!');window.location='../index.php';</script>";
        else echo "<script type='text/javascript'>alert('ERROR:please try again later!');window.location='../index.php';</script>";
      }
      else echo "<script type='text/javascript'>alert('ERROR: Re-enter new password!');window.location='doimatkhau.php';</script>"; 
    }
    else echo "<script type='text/javascript'>alert('ERROR: your id or password is incorrect!');window.location='../index.php';</script>";
  }
?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <title>CHANGE PASSWORD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}
</script>  

<style type="text/css">
  body{background: #eee url(http://subtlepatterns.com/patterns/sativa.png);}
html,body{
    position: relative;
    height: 100%;
}

.login-container{
    position: relative;
    width: 300px;
    margin: 80px auto;
    padding: 20px 40px 40px;
    text-align: center;
    background: #fff;
    border: 1px solid #ccc;
}

#output{
    position: absolute;
    width: 300px;
    top: -75px;
    left: 0;
    color: #fff;
}

#output.alert-success{
    background: rgb(25, 204, 25);
}

#output.alert-danger{
    background: rgb(228, 105, 105);
}


.login-container::before,.login-container::after{
    content: "";
    position: absolute;
    width: 100%;height: 100%;
    top: 3.5px;left: 0;
    background: #fff;
    z-index: -1;
    -webkit-transform: rotateZ(4deg);
    -moz-transform: rotateZ(4deg);
    -ms-transform: rotateZ(4deg);
    border: 1px solid #ccc;

}

.login-container::after{
    top: 5px;
    z-index: -2;
    -webkit-transform: rotateZ(-2deg);
     -moz-transform: rotateZ(-2deg);
      -ms-transform: rotateZ(-2deg);

}

.avatar{
    width: 100px;height: 100px;
    margin: 10px auto 30px;
    border-radius: 100%;
    border: 2px solid #aaa;
    background-size: cover;
}

.form-box input{
    width: 100%;
    padding: 10px;
    text-align: center;
    height:40px;
    border: 1px solid #ccc;;
    background: #fafafa;
    transition:0.2s ease-in-out;

}

.form-box input:focus{
    outline: 0;
    background: #eee;
}

.form-box input[type="text"]{
    border-radius: 5px 5px 0 0;
    text-transform: lowercase;
}

.form-box input[type="password"]{
    border-radius: 0 0 5px 5px;
    border-top: 0;
}

.form-box button.login{
    margin-top:15px;
    padding: 10px 20px;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20px);
    -ms-transform: translateY(20px);
    transform: translateY(20px);
  }

  100% {
    opacity: 1;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
  }
}

.fadeInUp {
  -webkit-animation-name: fadeInUp;
  animation-name: fadeInUp;
}
 .fakeimg1 {
      height: 85px;
      background: lightblue;
      color:black;
      padding: 30px;
      font-weight: bold;
      margin-top:1px;
 }


</style>
</head>
<body>
<div style="background-color: lightblue;">
    <h1 class="fakeimg1 text-center" >HAI NAM AUTOMATION</h1>
    <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div >
              <a class="navbar-brand " href="../index.php" >HOME</a>
            </div>
              </div>
    </nav>
    </div>
    <form name="form1" method="post" action="">
<div class="container">
  <div class="login-container">
            <div id="output"></div>
            <div class="avatar"></div>
            <div class="form-box">
                    <input name="myusername" type="text" placeholder="id" required="" autocomplete="off">
                    <input type="password" name="oldpassword" placeholder="old password" required="">
                    <input type="password" name="newpassword1" id="pass1" placeholder="new password" required="">
                    <input type="password" name="newpassword2" id="pass2" placeholder="new password" required="" onkeyup="checkPass(); return false;">
                    <span id="confirmMessage" class="confirmMessage"></span>
                    <button class="btn btn-info btn-block login" name="Submit" type="submit">SUBMIT</button>
            </div>
        </div>

                </form>
</div>
</body>
</html>
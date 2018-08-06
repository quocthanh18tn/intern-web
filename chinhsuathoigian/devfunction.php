<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->


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

    $("#button1").click(function(){
    var mskhungtu = $("#mskhungtu").val();
    var msnv = $("#msnv").val();
    var msgd = $("#msgd").val();
    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})

  })
  //   $("#showmain").click(function(){

  //  var x = document.getElementById("displaymm");
  //   if (x.style.display === "none") {
  //       x.style.display = "block";
  //   } else
  //    {
  //       x.style.display = "none";
  //   }
  // })



})
  </script>
    <style>
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


        body{
            background-image: url(../quanlytong/background.jpg);
            box-sizing: border-box;
            }
        .topmenu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: black;
                }
        .topmenu li {
            float: left;
                    }
        .topmenu li a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 16px;
            text-decoration: none;
          }
          .topmenu li a:hover {
              background-color: #222;
          }
          .topmenu li a.active {
              color: white;
              background-color: #4CAF50;
          }
          .column
          {
              float: left;
              width: 20%;
              padding: 15px;
              margin: 0px;

          }
        .fieldset1 {
            margin-top: 20px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: auto;
            height: auto;
          }
          .word{
            font-size: 20px;
            font-weight: bold;
            }
            #button1
            {
            background-color: #4CAF50;
            border-radius: 10px;
            margin-top: 6px;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            cursor: pointer;
            }
            #button2, #show_main
            {
            background-color: #4CAF50;
            border-radius: 10px;
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            cursor: pointer;
            }
            #mskhungtu, #msnv , #msgd
            {
             width: 100%;
             padding: 12px 20px;
             box-sizing: border-box;
             border: 2px solid green;
             border-radius: 8px;
            }
            #khungtext
            {
              width: 50%;
             padding: 12px 12px;
             box-sizing: border-box;
             border: 1px solid red;
             border-radius: 8px;
            }
            .sticky
            {
              position: -webkit-sticky;
              position: sticky;
              top: 0px;

            }

                  </style>
</head>
    <body>
        <div class="sticky">

            <div class="fakeimg1 text-center" style="margin-bottom:0">
            <h1>HAI NAM AUTOMATION</h1>
            <div class="p1">WELCOM TO OURS COMPANY!</div>
            </div>


            <div class="w3-bar w3-black" style="" >
            <a href="../index.php"      class="w3-bar-item w3-button" id="lib-thanh">Home</a>
           <a href="devfunction.php"      class="w3-bar-item w3-button" id="lib-thanh-active">Modify Time</a>
              <a class="w3-bar-item w3-button"  href="#" id="lib-thanh-logout">Logout</a>
            </div>
               


            <div class="column" style="background: lightblue">
      	        <label for = "mskhungtu" class="word"  > Column ID: </label>
                <input type ="text"  class="mskhungtu" placeholder="Column id" id="mskhungtu" name="mskhungtu"  > </input>
            </div>
            <div class="column" style="background: lightblue" >
                <label for = "msnv" class="word"   > Employee ID: </label>
                <input type ="text"  class="msnv" placeholder="Employee id" id="msnv" name="msnv"   > </input>
            </div>
            <div class="column" style="background: lightblue" >
                <label for = "msgd" class="word"  > Task Column ID: </label>
                <input type ="text"  class="msgd" placeholder="Task id" id="msgd" name="msgd"  > </input>
            </div>
            <div class="column" style="background: lightblue" >
            <br>
               <input type = "button"   id="button1" value= "Submit"  >
            </div>
            <div class="column" style="background: lightblue;padding: 48px 32px;" >
                <br>
            </div>
        </div>
        <div style="clear: left;" id="display">
        </div>
    </body>
</html>

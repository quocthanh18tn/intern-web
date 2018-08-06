<?php
include "../connection.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<title>EMPLOYEE'S TASK HISTORY</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
    <style type="text/css">
/*body {
    font-family: helvetica;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px
}*/
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
            background-size: auto;
              }
    </style>
	<script type="text/javascript">
        function In_Content(strid)
        {
            var prtContent = document.getElementById(strid);
            var WinPrint = window.open('','','resizable=1,letf=0,top=0,width=1000,height=1000');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
        }
        function trochuot()
        {
            document.getElementById("manv_nhap").focus();
        }

         $(document).ready(function()
         {
        $("#show").click(function(){
        var start = $("#start").val();
       var end = $("#end").val();
       var employee = $("#employee").val();
       var dongy=1;
            $.post("ajaxtheodoicongviec.php", {start: start,end:end, employee:employee,dongy:dongy}, function(data){$("#display").html(data);})

        })
        })

	</script>
</head>
<body>

<div class="fakeimg1 text-center" >
    <h1><strong>HAI NAM AUTOMATION</strong></h1>
          <div class="p1">WELCOM TO OURS COMPANY!</div>
          </div>
                             <div class="w3-bar w3-black" style="" >
    <a href="../index.php"      class="w3-bar-item w3-button" id="lib-thanh">Home</a>
    <a href="theodoicongviec.php"    class="w3-bar-item w3-button" id="lib-thanh-active" >Employee Tasks</a>
</div>

<br>

    <table>
        <head>
        <tr>
            <th>
            <div>
                <div><label for="start">START DAY</label></div>
                <div><input type="date" id="start" class="form-control"></input></div>
            </div>
            </th>
            <th>
            <div>
                <div><label for="end">END DAY</label></div>
                <div><input type="date" id="end" onmouseup="trochuot()" class="form-control"></input></div>
            </div>
            </th>
            <th>
            <div>
                <div><label for = "manv_nhap">EMPLOYEE ID</label></div>
                <div><input type="text"  id="employee" id="manv_nhap" size="10" required class="form-control"></div>
            </div>
            </th>
        </tr>
        </head>
    </table>
        <div><input type="button" id="show"   value="SUBMIT" class="btn btn-primary"></div>
        <br>
        <br>
        <div id="display"></div>
</body>
</html>


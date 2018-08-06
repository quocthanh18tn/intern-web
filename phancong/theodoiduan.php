
<?php
include "../connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script  type="text/javascript">

        $(document).ready(function(){

    $("#select").change(function(){
    var value = $("#select").val();
		if (value=='project')
		{
			document.getElementById('dis_project').style.display='block';
			document.getElementById('dis_customer').style.display='none';
			document.getElementById('dis_date').style.display='none';
			document.getElementById('display').style.display='none';

		}
		else if (value=='customer') {
			document.getElementById('dis_project').style.display='none';
			document.getElementById('dis_date').style.display='none';
			document.getElementById('dis_customer').style.display='block';
			document.getElementById('display').style.display='none';
		}
		else if (value=='date'){
			document.getElementById('dis_project').style.display='none';
			document.getElementById('dis_customer').style.display='none';
			document.getElementById('dis_date').style.display='block';
			document.getElementById('display').style.display='none';

		}
		else
		{
			document.getElementById('dis_project').style.display='none';
			document.getElementById('dis_customer').style.display='none';
			document.getElementById('dis_date').style.display='none';
			document.getElementById('display').style.display='none';
		}
  })
    $("#button").click(function(){
    var value = $("#select").val();
    if (value=='project')
		{
			var duan=$("#value_project").val();
			var tenkh='';
			var start='';
			var finish='';
		}
		else if (value=='customer') {

			var duan='';
			var tenkh=$("#value_customer").val();
			var start='';
			var finish='';
		}
		else if (value=='date'){

			var duan='';
			var tenkh='';
			var start=$("#value_date_start").val();
			var finish=$("#value_date_finish").val();

		}
		else
		{
			var duan='';
			var tenkh='';
			var start='';
			var finish='';
		}
            $.post("theodoi0_ajax.php", {duan: duan,tenkh: tenkh,start: start,finish: finish}, function(data){$('#display').html(data);});
			document.getElementById('display').style.display='block';

  })

  })
  </script>
<style>
	h1#ten{
  text-align: center;
  font-weight: bold;
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
                  #select {
            height: 50px;
            width: 250px;
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
        }
           #value_project {
            height: 50px;
            width: 250px;
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
        }
          #value_customer {
            height: 50px;
            width: 250px;
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
        }
			#value_date_start,#value_date_finish {
            height: 50px;
            width: 250px;
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
        }
            #hieuung {
    -webkit-animation: animatezoom 1s;
    animation: animatezoom 1s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

</style>
</head>
<body>
		<div id="dynamic_column"></div>

 <div class="fakeimg1 text-center" >
    <h1><strong>HAI NAM AUTOMATION</strong></h1>
          <div class="p1">WELCOM TO OURS COMPANY!</div>
          </div>
                             <div class="w3-bar w3-black" style="" >
    <a href="../index.php"      class="w3-bar-item w3-button" id="lib-thanh">Home</a>
    <a href="theodoiduan.php"   class="w3-bar-item w3-button" id="lib-thanh-active" >Monitor Project</a>
    <!-- <a href="phancongcongviec.php" class="w3-bar-item w3-button" id="lib-thanh" >Assignment Page</a> -->
    <a class="w3-bar-item w3-button"  href="logout_phancong.php" id="lib-thanh-logout">Logout</a>
</div>

<!--
	***********************
	***********************
	THEO DÕI DỰ ÁN
	***********************
	***********************
-->
    	<div>
            <h1 id="ten">MONITOR PROJECT</h1>
        </div>

		<SELECT id="select" style="float: left;">
			<option value="0">SELECT ...</option>
			<option value="project">Project: ID / Name</option>
			<option value="customer">Customer</option>
			<option value="date">Date</option>
		</SELECT>
		<div style="float: left;margin-left: 1%;">
			<div id="dis_project" style="display: none;">
			<input type="text" id="value_project" placeholder="ID, Name..">
			</div>
			<div id="dis_customer" style="display: none;">
			<input type="text" id="value_customer" placeholder="Id, Phone, Code..">
			</div>
			<div id="dis_date" style="display: none;">
			<input type="date" id="value_date_start" >
			<input type="date" id="value_date_finish" >
			</div>
		</div>
			<button type="button" class="w3-button w3-black w3-round-xlarge" style="font-size: 22px;margin-left: 1%;" id="button">Search</button>
			<br>
			<br>
			<div id="display" style="display: none;clear: left;"></div>
</body>
</html>

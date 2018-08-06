<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->

<?php
include "../connection.php";
?>
<!-- xử lý dữ liệu từ qtsx.php gửi đến -->
<?php
if(isset($_GET['ttnv'])&&isset($_GET['ttkhungtu']))
{
	$xuly =1;
	$ttnv = $_GET['ttnv'];
	$ttkhungtu = $_GET['ttkhungtu'];

}
else $xuly =0;
?>

<?php
function start_chuyenviec($mskhungtu,$msnv,$msgd)
{
	$date_time_current=date('Y-m-d H:i:s');
	$date_time_8h = date('Y-m-d 08:00:00');
	$date_time_previous= strtotime(date('Y-m-d 08:00:00'))-86400;
	$date_time_previous=date('Y-m-d H:i:s',$date_time_previous);
	$hour = date('H');
	$dk_qtsx = mysql_query("SELECT * FROM qtsx WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd'");
	$dk_qtsx_row = mysql_fetch_array($dk_qtsx);
	if ($hour>=0 && $hour <8)
	{
		$dk_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND msnv ='$msnv' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
    elseif ($hour>=8 && $hour <=23)
    {
    	$dk_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND msnv ='$msnv' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
	$dk_chuyenviec_row=mysql_num_rows($dk_chuyenviec);
	if ($dk_qtsx_row['date_start']!="")
	{
		if($dk_chuyenviec_row==0)
		{
			$dt = date('Y-m-d H:i:s');
			$sql=mysql_query("INSERT INTO chuyenviec (mskhungtu,msgd,msnv,date_start) VALUES ('$mskhungtu','$msgd','$msnv','$dt')");
			if($sql!=0) echo '<script>alert("BẮT ĐẦU THÀNH CÔNG")</script>';
			else echo '<script>alert("THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
		}
		else echo '<script>alert("ĐÃ BẮT ĐẦU, KHÔNG THỂ BẮT ĐẦU LẠI")</script>';
	}
	else echo '<script>alert("CÔNG VIỆC NÀY CHƯA BẮT ĐẦU, KHÔNG THỂ XÁC NHẬN PHỤ VIỆC")</script>';
	echo '<script>window.location="chuyenviec.php";</script>';
}
function finish_chuyenviec($mskhungtu,$msnv,$msgd)
{
	$date_time_current=date('Y-m-d H:i:s');
	$date_time_8h = date('Y-m-d 08:00:00');
	$date_time_previous= strtotime(date('Y-m-d 08:00:00'))-86400;
	$date_time_previous=date('Y-m-d H:i:s',$date_time_previous);
	$hour = date('H');
	if ($hour>=0 && $hour <8)
	{
		$dk_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND msnv ='$msnv' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
    elseif ($hour>=8 && $hour <=23)
    {
    	$dk_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND msnv ='$msnv' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
		if(mysql_num_rows($dk_chuyenviec)==1)
		{
		$dk_row=mysql_fetch_array($dk_chuyenviec);
		$date_start=$dk_row['date_start'];
		$dt = date('Y-m-d H:i:s');
		$sql = mysql_query("UPDATE chuyenviec SET date_finish ='$dt' WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND msnv ='$msnv' AND date_start ='$date_start'");
		if($sql!=0) echo '<script>alert("KẾT THÚC THÀNH CÔNG")</script>';
		else echo '<script>alert("THẤT BẠI VUI LÒNG THỬ LẠI")</script>'; 
		}
		else echo '<script>alert("CHƯA BẮT ĐẦU, KHÔNG THỂ KẾT THÚC")</script>';
		echo '<script>window.location="chuyenviec.php";</script>'; 

}

if (isset($_POST['xacnhan']))
	{
		$nv =  mysql_query("SELECT * FROM nhanvien WHERE msnv = '$_POST[nhap_barcode]'");
		if (mysql_num_rows($nv)>0) 
			{
				$ttnv = mysql_fetch_array($nv)['msnv'];
				$ten = mysql_fetch_array(mysql_query("SELECT * FROM nhanvien WHERE msnv = '$_POST[nhap_barcode]'"))['hoten'];
			}
		else {$ttnv = "";$ten="";}
		$khungtu =  mysql_query("SELECT * FROM khungtu WHERE mskhungtu = '$_POST[nhap_barcode]'");
		if (mysql_num_rows($khungtu)>0)
		 $ttkhungtu = mysql_fetch_array($khungtu)['mskhungtu'];
		else $ttkhungtu = "";
	}
if (isset($_POST['start'])) 
	{ 
		$mskhungtu=$_POST['mskhungtu2'];
		$msnv=$_POST['msnv2'];
		$msgd=$_POST['giaidoan'];
		start_chuyenviec($mskhungtu,$msnv,$msgd);			
	}
if (isset($_POST['finish'])) 
	{ 
		$mskhungtu=$_POST['mskhungtu2'];
		$msnv=$_POST['msnv2'];
		$msgd=$_POST['giaidoan'];
		finish_chuyenviec($mskhungtu,$msnv,$msgd);
	}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Irregular Task</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		    $("#giaidoan").change(function(){
		    	var mskhungtu=$("#mskhungtu").val();
		    	var msnv=$("#msnv").val();
		    	var msgd =$("#giaidoan").val();
		       	$.post("chuyenviec_ajax.php", {mskhungtu: mskhungtu,msnv:msnv,msgd:msgd}, function(data){$("#submit").html(data);})
		    });
		    $("#scan").click(function(){
		       	$.post("scanwithcam.html", {}, function(data){$("#scandata").html(data);})
		    });
		});
</script>
	<style type="text/css">
body {
    font-family: helvetica;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px
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
h1{
  text-align: center;
  font-weight: bold;
  font-size: 40px;
  background: lightblue;
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
form input#msnv{
	font-weight: bold;
	font-size:20px ;
}
form input#msnvlabel{
	font-weight: bold;
	font-size:20px ;
}


form input#mskhungtu{
	font-weight: bold;
	font-size:20px ;
}
form input#mskhungtulabel{
	font-weight: bold;
	font-size:20px ;
}
form input#hoten{
	font-weight: bold;
	font-size:20px ;
}
#giaidoan{

            width: 230px;
            height: 50px;
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
	</style>

</head>
<body>
	<div id="scandata"></div>    
    <form method="post" action="" id="qtsx" autocomplete="off">
    	<div>
    		<h1 id="ten">IRREGULAR TASK</h1>
    	</div>
    	<div>
			<div style="width: 20%; float:left;"><input type="text" class="form-control" name="nhap_barcode" id="nhap_barcode" autofocus placeholder="BARCODE" required></div>
			<input type="submit" name="xacnhan" id="xacnhan" value="SUBMIT" class="btn btn-primary">
    	<input type="button"  id="scan" value="Scan With Camera" class="btn btn-primary"  >
    	</div>
    	<div>
    	<fieldset>
	    	<h2>INFORMATION</h2>
	    	<br>
	    		<div>
	    			<div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" id="msnvlabel" readonly></input></div>
					<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="msnv" id="msnv" readonly value="<?php if(isset($_POST['xacnhan'])||$xuly==1)
					 {
					 	if ($ttnv!="") echo $ttnv;
					 	else {echo $_POST['msnv'];$ttnv = $_POST['msnv'];}
					 } ?>"></input></div>
				</div>
				<div>
		            <div style="width: 20%; float:left;"><input type="text" class="form-control" value="NAME:" readonly id="hoten"></input></div>
		          	<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="hoten" id="hoten" readonly value="<?php if(isset($_POST['xacnhan'])) 
		          {
		            if ($ten!="") echo $ten;
		            else {echo $_POST['hoten'];$ten= $_POST['hoten'];} 
		          }?>"></input></div>
		        </div>
				<div>
	    			<div style="width: 20%; float:left;"><input type="text" class="form-control" value="COLUMN ID:" id="mskhungtulabel" readonly></input></div>
					<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="mskhungtu" id="mskhungtu" readonly value="<?php if(isset($_POST['xacnhan'])||$xuly==1) 
					{
						if ($ttkhungtu!="") echo $ttkhungtu;
						else {echo $_POST['mskhungtu'];$ttkhungtu= $_POST['mskhungtu'];} 
					}?>"></input></div>
				</div>
				<br>
    	</fieldset>

    	</div>
    </form>
<form method="post" action="" id="qtsx" autocomplete="off">
    <select name= "giaidoan" id= "giaidoan">
							<option>Select task...</option>
							<option value="1">1:EA</option>
							<option value="2">2:MC</option>
							<option value="3">3:BUSBAR</option>
							<option value="4">4:PC</option>
							<option value="5">5:CW</option>
							<option value="6">6:TW</option>
							<option value="7">7:QC</option>
	</select>
	<div style="display: none;">
		<input type="text" name="mskhungtu2" value="<?php if(isset($_POST['xacnhan'])||$xuly==1) 
					{
						if ($ttkhungtu!="") echo $ttkhungtu;
						else {echo $_POST['mskhungtu'];$ttkhungtu= $_POST['mskhungtu'];} 
					}?>">
		<input type="text" name="msnv2" value="<?php if(isset($_POST['xacnhan'])||$xuly==1)
					 {
					 	if ($ttnv!="") echo $ttnv;
					 	else {echo $_POST['msnv'];$ttnv = $_POST['msnv'];}
					 } ?>">
	</div>	
	<div id="submit"></div>
</form>
</body>
</html>
<?php 
//code chuyen trang qtsx.php(neu tim thay cong viec trong bang qtsx)
					if (($ttnv!="")&&($ttkhungtu!=""))
					{
						$tb =mysql_query("SELECT qtsx.msgd,giaidoan.tengd,mskhungtu,date_start,date_finish FROM qtsx INNER JOIN giaidoan WHERE qtsx.msgd=giaidoan.msgd AND msnv = '$ttnv' AND mskhungtu='$ttkhungtu' AND date_finish IS NULL");
						if (mysql_num_rows($tb)>0) echo "<script type='text/javascript'>
															 window.location='qtsx.php?ttnv=$ttnv&ttkhungtu=$ttkhungtu';
														  </script>";

					}
?>


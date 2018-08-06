<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->

<?php
include "../connection.php";
?>
<!-- xử lý dữ liệu từ chuyenviec.php gửi đến -->
<?php
if(isset($_GET['ttnv'])&&isset($_GET['ttkhungtu']))
{
	$xuly =1;
	$ttnv = $_GET['ttnv'];
	$ttkhungtu = $_GET['ttkhungtu'];

}
else $xuly =0;
?>
<!-- KIỂM TRA GIỜ TĂNG CA -->
<?php
	$day=date('Y-m-d');
	$date_time_current=date('Y-m-d H:i:s');
	$date_time_8h = date('Y-m-d 08:00:00');
	$date_time_previous= strtotime(date('Y-m-d 08:00:00'))-86400;
	$date_time_previous=date('Y-m-d H:i:s',$date_time_previous);
	$hour = date('H');
	$num_holiday =mysql_num_rows(mysql_query("SELECT * FROM holiday WHERE holiday_date = '$day'"));
	$sunday = strtotime($day);
	$sunday = getdate($sunday)['weekday'];
	if ($sunday=='Sunday' or $num_holiday >0 or $hour<8 or $hour >=17  ) $tangca =1;
	else $tangca = 0;

?>
<?php
function start($mstu,$msgd)
{
	$dk=mysql_fetch_array(mysql_query("SELECT * FROM qtsx WHERE mskhungtu ='$mstu' AND msgd ='$msgd'"));
	if ($dk['date_start'] =="")
		{
			$dt = date('Y-m-d H:i:s');
			mysql_query("UPDATE qtsx SET date_start = '$dt' WHERE mskhungtu = '$mstu' AND msgd = '$msgd'");
			echo '<script>alert("XÁC NHẬN BẮT ĐẦU THÀNH CÔNG")</script>';
		}
	else
		{
			echo '<script>alert("LỖI:CÔNG VIỆC ĐÃ BẮT ĐẦU, HÃY KIỂM TRA  VÀ THỰC HIỆN LẠI THAO TÁC")</script>';
		}

}
function finish($mstu,$msgd)
{
	$dk=mysql_fetch_array(mysql_query("SELECT * FROM qtsx WHERE mskhungtu ='$mstu' AND msgd ='$msgd'"));
	if ($dk['date_start'] !="")
		{
			$dt = date('Y-m-d H:i:s');
			mysql_query("UPDATE qtsx SET date_finish_tam = '$dt' WHERE mskhungtu = '$mstu' AND msgd = '$msgd'");
			echo '<script>alert("XÁC NHẬN KẾT THÚC THÀNH CÔNG")</script>';
		}
	else
		{
			echo '<script>alert("LỖI: CÔNG VIỆC CHƯA BẮT ĐẦU NÊN KHÔNG THỂ KẾT THÚC, HÃY THỬ LẠI")</script>';
		}

}
function start_overtime($mskhungtu,$msgd)
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
		$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
    elseif ($hour>=8 && $hour <=23)
    {
    	$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
	$dk_tangca_row=mysql_num_rows($dk_tangca);
	if ($dk_qtsx_row['date_start']!="")
	{
		if($dk_tangca_row==0)
		{
			$dt = date('Y-m-d H:i:s');
			$sql=mysql_query("INSERT INTO tangca (mskhungtu,msgd,msnv,date_start) VALUES ('$mskhungtu','$msgd','$dk_qtsx_row[msnv]','$dt')");
			if($sql!=0) echo '<script>alert("BẮT ĐẦU TĂNG CA THÀNH CÔNG")</script>';
			else echo '<script>alert("THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
		}
		else echo '<script>alert("ĐÃ BẮT ĐẦU TĂNG CA, KHÔNG THỂ BẮT ĐẦU LẠI")</script>';
	}
	else echo '<script>alert("VUI LÒNG BẮT ĐẦU TRƯỚC KHI XÁC NHẬN TĂNG CA")</script>';

}
function finish_overtime($mskhungtu,$msgd)
{
	$date_time_current=date('Y-m-d H:i:s');
	$date_time_8h = date('Y-m-d 08:00:00');
	$date_time_previous= strtotime(date('Y-m-d 08:00:00'))-86400;
	$date_time_previous=date('Y-m-d H:i:s',$date_time_previous);
	$hour = date('H');
	if ($hour>=0 && $hour <8)
	{
		$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
    elseif ($hour>=8 && $hour <=23)
    {
    	$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
		if(mysql_num_rows($dk_tangca)==1)
		{
		$dk_row=mysql_fetch_array($dk_tangca);
		$date_start=$dk_row['date_start'];
		$dt = date('Y-m-d H:i:s');
		$sql = mysql_query("UPDATE tangca SET date_finish ='$dt' WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start ='$date_start'");
		if($sql!=0) echo '<script>alert("KẾT THÚC TĂNG CA THÀNH CÔNG")</script>';
		else echo '<script>alert("THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
		}
		else echo '<script>alert("CHƯA TĂNG CA, KHÔNG THỂ KẾT THÚC")</script>';


}
function pause($mskhungtu,$msgd,$lydo)
{
			$dk_qtsx = mysql_query("SELECT * FROM qtsx WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd'");
			$dk_tamdung =mysql_num_rows(mysql_query("SELECT * FROM tamdung WHERE mskhungtu ='$mskhungtu' AND msgd ='$msgd' AND tieptuc IS null"));
			if (mysql_num_rows($dk_qtsx)>0 && $dk_tamdung==0)
			{
				$dk_qtsx_row = mysql_fetch_array($dk_qtsx);
				$dt = date('Y-m-d H:i:s');
				$sql=mysql_query("INSERT INTO tamdung (mskhungtu,msgd,msnv,tamdung,lydo) VALUES ('$mskhungtu','$msgd','$dk_qtsx_row[msnv]','$dt','$lydo')");
				echo '<script>alert("XÁC NHẬN TẠM DỪNG THÀNH CÔNG")</script>';
			}

}
function resume($mskhungtu,$msgd)
{
	$dk_tamdung =mysql_num_rows(mysql_query("SELECT * FROM tamdung WHERE mskhungtu ='$mskhungtu' AND msgd ='$msgd' AND tieptuc IS null"));
	if ($dk_tamdung==1)
		{
			$dt = date('Y-m-d H:i:s');
			$tamdung_current = mysql_fetch_array(mysql_query("SELECT * FROM tamdung WHERE mskhungtu ='$mskhungtu' AND msgd ='$msgd' AND tieptuc IS null"))['tamdung'];
			mysql_query("UPDATE tamdung SET tieptuc = '$dt' WHERE mskhungtu = '$mskhungtu' AND msgd = '$msgd' AND tamdung = '$tamdung_current'");
			echo '<script>alert("XÁC NHẬN TIẾP TỤC THÀNH CÔNG")</script>';
		}

}
function error_pause(){echo '<script>alert("VUI LÒNG NHẬP MÃ VÀ CHỌN CÔNG VIỆC")</script>';}
function error_resume() {echo '<script>alert("VUI LÒNG NHẬP MÃ VÀ CHỌN CÔNG VIỆC")</script>';}
function error_start(){echo '<script>alert("VUI LÒNG NHẬP MÃ VÀ CHỌN CÔNG VIỆC")</script>';}
function un_start() {}
function error_finish() {echo '<script>alert("VUI LÒNG NHẬP MÃ VÀ CHỌN CÔNG VIỆC")</script>';}

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
			$i = 1;
			while (1)
			{
				$istring = (string)$i;
				$mstu = "mstu$istring";
				$msgd = "msgd$istring";
				$chon = "chon$istring";
				if (isset($_POST['chon']))
				{
						if ($_POST['chon']=="$chon")
							{
								start($_POST["$mstu"],$_POST["$msgd"]);
								break;
							}
						else $i+=1;
				}
				else {error_start();break;}
			}
			//kiểm tra nếu đang giờ tăng ca thì bắt đầu tăng ca luôn
			if ($tangca == 1)
			{
				$mskhungtu = $_POST["$mstu"];
				$msgd = $_POST["$msgd"];
				$dk_qtsx = mysql_query("SELECT * FROM qtsx WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd'");
				$dk_qtsx_row = mysql_fetch_array($dk_qtsx);
				if ($hour>=0 && $hour <8)
				{
					$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
			    }
			    elseif ($hour>=8 && $hour <=23)
			    {
			    	$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
			    }
				$dk_tangca_row=mysql_num_rows($dk_tangca);
				if ($dk_qtsx_row['date_start']!="")
				{
					if($dk_tangca_row==0)
					{
						$dt = date('Y-m-d H:i:s');
						$sql=mysql_query("INSERT INTO tangca (mskhungtu,msgd,msnv,date_start) VALUES ('$mskhungtu','$msgd','$dk_qtsx_row[msnv]','$dt')");
						if($sql!=0) echo '<script>alert("BẮT ĐẦU TĂNG CA THÀNH CÔNG")</script>';
						else echo '<script>alert("THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
					}
				}

			}
			echo '<script>window.location="qtsx.php";</script>';


	}
if (isset($_POST['finish']))
	{
			$i = 1;
			while (1)
				{
					$istring = (string)$i;
					$mstu = "mstu$istring";
					$msgd = "msgd$istring";
					$chon = "chon$istring";
					if (isset($_POST['chon']))
					{
						if ($_POST['chon']=="$chon")
							{
								finish($_POST["$mstu"],$_POST["$msgd"]);
								break;
							}
						else $i+=1;
					}
					else {error_finish();break;}
				}
			//kiểm tra nếu đang giờ tăng ca thì kết thúc tăng ca luôn
			$mskhungtu = $_POST["$mstu"];
			$msgd = $_POST["$msgd"];
			if ($tangca == 1)
			{

			    if ($hour>=0 && $hour <8)
				{
					$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
			    }
			    elseif ($hour>=8 && $hour <=23)
			    {

			    	$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
			    }
				if(mysql_num_rows($dk_tangca)==1)
				{

					$dk_row=mysql_fetch_array($dk_tangca);
					$date_start=$dk_row['date_start'];
					$dt = date('Y-m-d H:i:s');
					$sql = mysql_query("UPDATE tangca SET date_finish ='$dt' WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start ='$date_start'");
					if($sql!=0) echo '<script>alert("KẾT THÚC TĂNG CA THÀNH CÔNG")</script>';
					else echo '<script>alert("THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
				}
			}
			//kiểm tra nếu có người phụ thì dừng phụ luôn
			if ($hour>=0 && $hour <8)
			{
				$dk_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
		    }
		    elseif ($hour>=8 && $hour <=23)
		    {
		    	$dk_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
		    }
		    if(mysql_num_rows($dk_chuyenviec)>0)
			{

				while($dk_row=mysql_fetch_array($dk_chuyenviec))
				{
					$msnv = $dk_row['msnv'];
					$date_start=$dk_row['date_start'];
					$dt = date('Y-m-d H:i:s');
					$sql = mysql_query("UPDATE chuyenviec SET date_finish ='$dt' WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND msnv ='$msnv' AND date_start ='$date_start'");
					if($sql!=0) echo '<script>alert("KẾT THÚC CHUYỂN VIỆC THÀNH CÔNG")</script>';
					else echo '<script>alert(" KẾT THÚC CHUYỂN VIỆC THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
				}
			}
			echo '<script>window.location="qtsx.php";</script>';



	}
if (isset($_POST['start_overtime']))
	{
			$i = 1;
			while (1)
			{
				$istring = (string)$i;
				$mstu = "mstu$istring";
				$msgd = "msgd$istring";
				$chon = "chon$istring";
				if (isset($_POST['chon']))
				{
						if ($_POST['chon']=="$chon")
							{
								start_overtime($_POST["$mstu"],$_POST["$msgd"]);
								break;
							}
						else $i+=1;
				}
				else {error_start();break;}
			}
			echo '<script>window.location="qtsx.php";</script>';


	}
if (isset($_POST['finish_overtime']))
	{
			$i = 1;
			while (1)
			{
				$istring = (string)$i;
				$mstu = "mstu$istring";
				$msgd = "msgd$istring";
				$chon = "chon$istring";
				if (isset($_POST['chon']))
				{
					if ($_POST['chon']=="$chon")
						{
							finish_overtime($_POST["$mstu"],$_POST["$msgd"]);
							break;
						}
						else $i+=1;
				}
				else {error_finish();break;}
			}
			echo '<script>window.location="qtsx.php";</script>';


	}
if (isset($_POST['pause']))
	{
			$i = 1;
			while (1)
			{
				$istring = (string)$i;
				$mstu = "mstu$istring";
				$msgd = "msgd$istring";
				$chon = "chon$istring";
				if (isset($_POST['chon']))
				{
					if ($_POST['chon']=="$chon")
						{
							pause($_POST["$mstu"],$_POST["$msgd"],$_POST['lydo']);
							break;
						}
					else $i+=1;
				}
				else {error_pause();break;}
			}
			//kiểm tra nếu đang giờ tăng ca thì kết thúc tăng ca luôn
			$mskhungtu = $_POST["$mstu"];
			$msgd = $_POST["$msgd"];
			if ($tangca == 1)
			{

			    if ($hour>=0 && $hour <8)
				{
					$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
			    }
			    elseif ($hour>=8 && $hour <=23)
			    {

			    	$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
			    }
				if(mysql_num_rows($dk_tangca)==1)
				{

					$dk_row=mysql_fetch_array($dk_tangca);
					$date_start=$dk_row['date_start'];
					$dt = date('Y-m-d H:i:s');
					$sql = mysql_query("UPDATE tangca SET date_finish ='$dt' WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start ='$date_start'");
					if($sql!=0) echo '<script>alert("KẾT THÚC TĂNG CA THÀNH CÔNG")</script>';
					else echo '<script>alert("THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
				}
			}
			//kiểm tra nếu có người phụ thì dừng phụ luôn
			if ($hour>=0 && $hour <8)
			{
				$dk_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
		    }
		    elseif ($hour>=8 && $hour <=23)
		    {
		    	$dk_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
		    }
		    if(mysql_num_rows($dk_chuyenviec)>0)
			{

				while($dk_row=mysql_fetch_array($dk_chuyenviec))
				{
					$msnv = $dk_row['msnv'];
					$date_start=$dk_row['date_start'];
					$dt = date('Y-m-d H:i:s');
					$sql = mysql_query("UPDATE chuyenviec SET date_finish ='$dt' WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND msnv ='$msnv' AND date_start ='$date_start'");
					if($sql!=0) echo '<script>alert("KẾT THÚC CHUYỂN VIỆC THÀNH CÔNG")</script>';
					else echo '<script>alert(" KẾT THÚC CHUYỂN VIỆC THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
				}
			}
			echo '<script>window.location="qtsx.php";</script>';


	}
if (isset($_POST['resume']))
	{
			$i = 1;
			while (1)
				{
					$istring = (string)$i;
					$mstu = "mstu$istring";
					$msgd = "msgd$istring";
					$chon = "chon$istring";
					if (isset($_POST['chon']))
					{
						if ($_POST['chon']=="$chon")
							{
								resume($_POST["$mstu"],$_POST["$msgd"]);
								break;
							}
						else $i+=1;
					}
					else {error_resume();break;}
				}
			//kiểm tra nếu đang giờ tăng ca thì bắt đầu tăng ca luôn
			if ($tangca == 1)
			{
				$mskhungtu = $_POST["$mstu"];
				$msgd = $_POST["$msgd"];
				$dk_qtsx = mysql_query("SELECT * FROM qtsx WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd'");
				$dk_qtsx_row = mysql_fetch_array($dk_qtsx);
				if ($hour>=0 && $hour <8)
				{
					$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
			    }
			    elseif ($hour>=8 && $hour <=23)
			    {
			    	$dk_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$mskhungtu' AND msgd = '$msgd' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
			    }
				$dk_tangca_row=mysql_num_rows($dk_tangca);
				if ($dk_qtsx_row['date_start']!="")
				{
					if($dk_tangca_row==0)
					{
						$dt = date('Y-m-d H:i:s');
						$sql=mysql_query("INSERT INTO tangca (mskhungtu,msgd,msnv,date_start) VALUES ('$mskhungtu','$msgd','$dk_qtsx_row[msnv]','$dt')");
						if($sql!=0) echo '<script>alert("BẮT ĐẦU TĂNG CA THÀNH CÔNG")</script>';
						else echo '<script>alert("THẤT BẠI VUI LÒNG THỬ LẠI")</script>';
					}
				}

			}
			echo '<script>window.location="qtsx.php";</script>';



	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Regular Task</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		    $("input[name='chon']").click(function(){
		        var value_chon =$(this).val();
		       	thutu= value_chon.slice(4);
		       	$("#chon_temp").val(thutu);
		       	var mskhungtu = "mstu";
		       	mskhungtu = "#"+mskhungtu+thutu;
		       	mskhungtu =$(mskhungtu).val();
		       	var msgd = "msgd";
		       	msgd = "#"+msgd+thutu;
		       	msgd =$(msgd).val();
		       	//alert(msgd);
		       	//alert(mskhungtu);
		       	$.post("qtsx_ajax.php", {mskhungtu: mskhungtu,msgd:msgd}, function(data){$("#submit").html(data);})
		    });
		    $("#findmycolumn").click(function(){
		     window.location='findmycolumn.php';
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

form input#mskhungtu{
	font-weight: bold;
	font-size:20px ;
}
form input#hoten{
	font-weight: bold;
	font-size:20px ;
}
#findmycolumn
{
	font-size: 20px;
	background-color: red;
	margin-bottom: 10px;
}
	</style>
</head>
<body>
	<div id="scandata"></div>
	<div id="showtrangxacnhan"></div>
	<div id="xulytrangxacnhan"></div>
    <form method="post" action="" id="qtsx" autocomplete="off">
    	<div>
    		<h1 id="ten">REGULAR TASK</h1>
    	</div>
    	<div>
			<div style="width: 20%; float:left;"><input type="text" class="form-control" name="nhap_barcode" id="nhap_barcode" autofocus placeholder="BARCODE" required></div>
			<input type="submit" name="xacnhan" style="float: left;" id="xacnhan" value="SUBMIT" class="btn btn-primary">
    	</div>
    	<div style="float: right;"><input type="button"  id="findmycolumn" value="Find Your Column" class="btn btn-primary"  ></div>
    	<div ><input type="button"  id="scan" value="Scan With Camera" class="btn btn-primary"  ></div>
    		<br>
    	<div>
    	<fieldset style="clear: left;">
	    	<h2>INFORMATION</h2>
	    	<br>
	    		<div>
	    			<div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" id="msnv" readonly></input></div>
					<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="msnv" id="msnv" readonly value="<?php if(isset($_POST['xacnhan'])||$xuly==1)
					 {
					 	if ($ttnv!="") echo $ttnv;
					 	else {echo $_POST['msnv'];$ttnv = $_POST['msnv'];}
					 } ?>"></input></div>
				</div>
				<div>
		            <div style="width: 20%; float:left;"><input type="text" class="form-control" value="NAME:" readonly id="hoten"></input></div>
		          	<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="hoten" id="hoten" readonly value="<?php if(isset($_POST['xacnhan'])||isset($_GET['ten']))
		          {
		          	if (isset($_GET['ten'])) $ten=$_GET['ten'];
		            if ($ten!="") echo $ten;
		            else {echo $_POST['hoten'];$ten= $_POST['hoten'];}
		          }?>"></input></div>
		        </div>
				<div>
	    			<div style="width: 20%; float:left;"><input type="text" class="form-control" value="COLUMN ID:" id="mskhungtu" readonly></input></div>
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
    	<div>
	    	<fieldset>
	    		<h2>ASSIGNED TASK</h2>
	    		<br>
				<?php
				if ((isset($_POST['xacnhan']))&& ($ttnv!="")&&($ttkhungtu!="")||$xuly==1)
					{
						$tb =mysql_query("SELECT qtsx.msgd,giaidoan.tengd,mskhungtu,date_start,date_finish,date_finish_tam FROM qtsx INNER JOIN giaidoan WHERE qtsx.msgd=giaidoan.msgd AND msnv = '$ttnv' AND mskhungtu='$ttkhungtu'");

				?>
						<table class="table table-stripedauto">
							<thead>
							<tr>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="TASK ID" readonly size ="5"></input></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="TASK NAME" readonly size ="auto"></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="COLUMN ID" readonly size ="auto"></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="START TIME" readonly size ="auto"></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="FINISH TIME" readonly size ="auto"></th>
				                <th width="auto"><input style="font-weight: bold;font-size: 17px;background-color: #00FFFF;" type="text" class="form-control" name="" value="SELECT" readonly size ="5"></th>
			              	</tr>
			              	</thead>
			              	<tbody>
			              	<?php
			              	if ($tb!=0)
               				 {
               				 	$i=1;
                   				 while ($row = mysql_fetch_array($tb))
                   				 {
                   				 	if ($row[4]=="")
                   				 	{
                   				 		$istring = (string)$i;
                   				 		$mstu ="mstu$istring";$msgd="msgd$istring";$chon="chon$istring";

			              	?>
				              	<tr>

		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="<?php echo ($msgd);?>" id="<?php echo ($msgd);?>" value="<?php echo $row[0];?>" readonly size ="5"></input></td>
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="" value="<?php echo $row[1];?>" readonly size ="auto"></input></td>
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="<?php echo ($mstu);?>" id="<?php echo ($mstu);?>" value="<?php echo $row[2];?>" readonly size ="auto"></input></td>
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="" value="<?php echo $row[3];?>" readonly size ="auto"></input></td>
		                        <td><input style="font-weight: bold;font-size: 17px" type="text" class="form-control" name="" value="<?php echo $row[5];?>" readonly size ="auto"></input></td>
		                        <td><input style="margin-left: 50%" type="radio" size ="auto" name="chon" value = "<?php echo($chon); ?>"></input></td>
		                      	</tr>
				            <?php
				                	$i=$i+1;
				                	}
				                 }
				            ?>
				            </tbody>
				            <?php
				             }
				            ?>
			            </table>
			            <input type="text" id="chon_temp" style="display: none;">
				<?php
					}
					//code chuyen trang chuyenviec.php(neu khong tim thay cong viec trong bang qtsx)
					if (($ttnv!="")&&($ttkhungtu!=""))
					{
						$tb =mysql_query("SELECT qtsx.msgd,giaidoan.tengd,mskhungtu,date_start,date_finish FROM qtsx INNER JOIN giaidoan WHERE qtsx.msgd=giaidoan.msgd AND msnv = '$ttnv' AND mskhungtu='$ttkhungtu' AND date_finish IS NULL");
						if (mysql_num_rows($tb)==0) echo "<script type='text/javascript'>
 															var x= confirm('Không tìm thấy công việc được phân công, xác nhận chuyển sang trang làm thêm?');
															if (x==1) window.location='chuyenviec.php?ttnv=$ttnv&ttkhungtu=$ttkhungtu';
															else window.location='qtsx.php';
														  </script>";

					}
				?>
				<br>
			</fieldset>
			<br>
			<div>
			<div id="submit"></div>
			</div>
	</form>
</body>
</html>


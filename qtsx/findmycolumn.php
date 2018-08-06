
<?php
include "../connection.php";
?>
<?php
if (isset($_POST['xacnhan']))
  {
    $nv =  mysql_query("SELECT * FROM nhanvien WHERE msnv = '$_POST[nhap_barcode]'");
    if (mysql_num_rows($nv)>0)
      {
        $ttnv = mysql_fetch_array($nv)['msnv'];
        $ten = mysql_fetch_array(mysql_query("SELECT * FROM nhanvien WHERE msnv = '$_POST[nhap_barcode]'"))['hoten'];
      }
    else
      {
        $ttnv = "";
        $ten ="";
      }
  }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#scan").click(function(){
            $.post("scanwithcam.html", {}, function(data){$("#scandata").html(data);})
        });
    });
</script>

<style>
@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

    .sticky
            {
              position: -webkit-sticky;
              position: sticky;
              top: 0px;

            }
.close1 {
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
    float: right;
    margin-right: 10px;
}

.close1:hover,
.close1:focus {
    color: red;
    cursor: pointer;
}
input#msnv{
  font-weight: bold;
  font-size:20px ;
}

input#mskhungtu{
  font-weight: bold;
  font-size:20px ;
}
input#hoten{
  font-weight: bold;
  font-size:20px ;
}
#ten{
  font-weight: bold;
  font-size: 40px;
  text-align: center;
  color: black;
}
#h2{
  font-weight: bold;
  font-size: 30px;
  text-align: center;
  color: black;
}
body{
  /*background-color: lightgrey;*/
}
#xacnhan
{
  margin-left: 1%;
 /* border-radius: 10px;
  width: 50px;
*/}
#scan{
  margin-left: 1%;
}
</style>
</head>
<body>

<div class="modal1 animate" id="id01">
<div id="scandata"></div>
<div class="sticky">
 <span onclick="window.location='qtsx.php';" class="close1" title="Close Modal">&times;</span>
</div>
								<!--  code show ra --> <br>
								<!--  code show ra --> <br>
<form method="post" action="" id="qtsx" autocomplete="off">
      <div>
        <h1 id="ten">FIND COLUMN</h1>
      </div>
      <br>
      <div>
      <div style="width: 20%; float:left;"><input type="text" class="form-control" name="nhap_barcode" id="nhap_barcode" autofocus placeholder="Employee ID..." required></div>
      <input type="submit" name="xacnhan" id="xacnhan" value="SUBMIT" class="btn btn-primary">
      <input type="button"  id="scan" value="Scan With Camera" class="btn btn-primary"  >
    </div>
</form>
    <br>
    <br>
<fieldset>
        <br>
          <div>
            <div style="width: 20%; float:left;"><input type="text" class="form-control" value="EMPLOYEE ID:" id="msnv" readonly></input></div>
          <div style="width: 80%; float:left;"><input type="text" class="form-control"  name="msnv" id="msnv" readonly value="<?php if(isset($_POST['xacnhan']))
           {
            if ($ttnv!="") echo $ttnv;
            else {echo $_POST['msnv'];$ttnv = $_POST['msnv'];}
           } ?>"></input></div>
        </div>
        <div style="clear: left;">
            <div style="width: 20%; float:left;"><input id="hoten" type="text" class="form-control" value="NAME:" readonly></input></div>
          <div style="width: 80%; float:left;"><input type="text" class="form-control"  name="hoten" id="hoten" readonly value="<?php if(isset($_POST['xacnhan']))
          {
            if ($ten!="") echo $ten;
            else {echo $_POST['hoten'];$ten= $_POST['hoten'];}
          }?>"></input></div>
        </div>
        <br>
</fieldset>
<br>
<br>
<table class="table">
  <tr>
    <th style="font-size: 30px;">Column ID</th>
    <!-- <th>Go</th> -->
  </tr>
  <?php
  if (isset($_POST['xacnhan']) && $ttnv!="")
  {
    $sql = mysql_query("SELECT DISTINCT mskhungtu FROM qtsx WHERE msnv = '$ttnv' AND date_finish IS NULL");
    while ($row=mysql_fetch_array($sql))
    {
  ?>
  <tr>
    <th><a href="qtsx.php?ttnv=<?php echo $ttnv ?>&ttkhungtu=<?php echo $row['mskhungtu']?>&ten=<?php echo $ten ?>" style="font-size: 30px;" ><?php echo $row['mskhungtu']; ?></a></th>
  </tr>
  <?php
    }
  }
  ?>

</table>
</div>
</body>
</html>
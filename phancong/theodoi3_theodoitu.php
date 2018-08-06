<?php
	$mskhungtu=$_POST['mskhungtu'];

// echo $mskhungtu;
?>

<?php
include "../connection.php";
?>


<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  function hide()
  {
    if(document.getElementById('REGULAR_show').style.display=='block')
      document.getElementById('REGULAR_show').style.display='none';
    else
      document.getElementById('REGULAR_show').style.display='block';

  }
  function hide1()
  {
    if(document.getElementById('IRREGULAR_show').style.display=='block')
      document.getElementById('IRREGULAR_show').style.display='none';
    else
      document.getElementById('IRREGULAR_show').style.display='block';

  }function hide2()
  {
    if(document.getElementById('OVERTIME_show').style.display=='block')
      document.getElementById('OVERTIME_show').style.display='none';
    else
      document.getElementById('OVERTIME_show').style.display='block';

  }function hide3()
  {
    if(document.getElementById('PAUSE_show').style.display=='block')
      document.getElementById('PAUSE_show').style.display='none';
    else
      document.getElementById('PAUSE_show').style.display='block';

  }
</script>
<style>
.modal1 {
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: black; /* Fallback color */
    background-color: white; /* Black w/ opacity */
    /*padding-top: 60px;*/

}
.animate {
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
.hover:hover {
    color: red;
    cursor: pointer;
}
.hover
{
  font-weight: bold;
  font-size: 20px;
  color: green;
  clear: right;
}


</style>
</head>
<body>
<div class="modal1 animate" id="id01">
    <div class="sticky">
      <span onclick="document.getElementById('id01').style.display='none'" class="close1" title="Close Modal">&times;</span>
    </div>
								<!--  code show ra --> <br>
								<!--  code show ra --> <br>
<div  class="hover" onclick="hide()" title="Click to hide or show" > REGULAR TASK </div>
  <div id="REGULAR_show" style="display: block;">
    <table class="w3-table-all">
      <tr>
        <th>Column ID</th>
        <th>Tasks</th>
        <th>Employee</th>
        <th>Start</th>
        <th>Finish</th>
        <th>Expected Time</th>
      </tr>

     <?php
  	   	$sql="SELECT mskhungtu,giaidoan.tengd,giaidoan.msgd,date_start,date_finish,nhanvien.hoten,nhanvien.msnv,minutes_dukien FROM qtsx INNER JOIN giaidoan ON giaidoan.msgd=qtsx.msgd
      		INNER JOIN nhanvien ON qtsx.msnv=nhanvien.msnv
  	     	where mskhungtu='$mskhungtu' ORDER BY giaidoan.msgd ";
  		    $query=mysql_query($sql);
  		  while($array=mysql_fetch_array($query))
  		  {

      ?>
      <tr>
        <td><?php echo $mskhungtu ?></td>
        <td><?php echo "$array[2]:$array[1] "?></td>
        <td><?php echo "$array[6]: $array[5]" ?></td>
        <td><?php echo $array[3] ?></td>
        <td><?php echo $array[4] ?></td>
        <td><?php echo $array[7] ?></td>
      </tr>
      <?php } ?>
  </table>
</div>

<div class="hover" onclick="hide1()" title="Click to hide or show"> IRREGULAR TASK </div>
<div id="IRREGULAR_show" style="display: block;">
<table class="w3-table-all">
  <tr>
    <th>Column ID</th>
    <th>Tasks</th>
    <th>Employee</th>
    <th>Start</th>
    <th>Finish</th>
  </tr>

  <?php
  		$sql="SELECT mskhungtu,giaidoan.tengd,giaidoan.msgd,date_start,date_finish,nhanvien.hoten,nhanvien.msnv FROM chuyenviec INNER JOIN giaidoan ON chuyenviec.msgd=giaidoan.msgd
  		INNER JOIN nhanvien ON chuyenviec.msnv=nhanvien.msnv
  		where mskhungtu='$mskhungtu' ORDER BY giaidoan.msgd";
  		$query=mysql_query($sql);
  		while($array=mysql_fetch_array($query))
  		{

  ?>
  <tr>
    <td><?php echo $mskhungtu ?></td>
    <td><?php echo "$array[2]:$array[1] "?></td>
    <td><?php echo "$array[6]: $array[5]" ?></td>
    <td><?php echo $array[3] ?></td>
    <td><?php echo $array[4] ?></td>
  </tr>
  <?php } ?>
</table>
</div>

<div class="hover" onclick="hide2()" title="Click to hide or show" > OVERTIME TASK </div>
<div id="OVERTIME_show" style="display: block;">
<table class="w3-table-all">
  <tr>
    <th>Column ID</th>
    <th>Tasks</th>
    <th>Employee</th>
    <th>Start</th>
    <th>Finish</th>
  </tr>

  <?php
  		$sql="SELECT mskhungtu,giaidoan.tengd,giaidoan.msgd,date_start,date_finish,nhanvien.hoten,nhanvien.msnv FROM tangca INNER JOIN giaidoan ON tangca.msgd=giaidoan.msgd
  		INNER JOIN nhanvien ON tangca.msnv=nhanvien.msnv
  		where mskhungtu='$mskhungtu' ORDER BY giaidoan.msgd ";
  		$query=mysql_query($sql);
  		while($array=mysql_fetch_array($query)){

  ?>
  <tr>
    <td><?php echo $mskhungtu ?></td>
    <td><?php echo "$array[2]:$array[1] "?></td>
    <td><?php echo "$array[6]: $array[5]" ?></td>
    <td><?php echo $array[3] ?></td>
    <td><?php echo $array[4] ?></td>
  </tr>
  <?php } ?>
</table>
</div>


<div class="hover" onclick="hide3()" title="Click to hide or show"> PAUSE TASK </div>
<div id = "PAUSE_show" style="display: block;">
<table class="w3-table-all">
  <tr>
    <th>Column ID</th>
    <th>Tasks</th>
    <th>Employee</th>
    <th>Start</th>
    <th>Finish</th>
  </tr>

  <?php
  		$sql="SELECT mskhungtu,giaidoan.tengd,giaidoan.msgd,tamdung,tieptuc,nhanvien.hoten,nhanvien.msnv FROM tamdung INNER JOIN giaidoan ON tamdung.msgd=giaidoan.msgd
  		INNER JOIN nhanvien ON tamdung.msnv=nhanvien.msnv
  		where mskhungtu='$mskhungtu' ORDER BY giaidoan.msgd ";
  		$query=mysql_query($sql);
  		while($array=mysql_fetch_array($query))
  		{

  ?>
  <tr>
    <td><?php echo $mskhungtu ?></td>
    <td><?php echo "$array[2]:$array[1] "?></td>
    <td><?php echo "$array[6]: $array[5]" ?></td>
    <td><?php echo $array[3] ?></td>
    <td><?php echo $array[4] ?></td>
  </tr>
  <?php } ?>
</table>

</div>

</div>
</body>
</html>
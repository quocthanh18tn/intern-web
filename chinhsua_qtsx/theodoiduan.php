<?php
include "../connection.php";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
    <style type="text/css">
form {
    font-family: helvetica;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px
}
form div{
   margin-bottom: 25px ;
}
h1#ten{
  text-align: center;
  font-weight: bold;
}
        .text1 {
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
        }          .text3 {
            height: 42px;
            width: 500px;
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
        }        .text2 {
            height: 42px;
            width: 500px;
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
form table{font-weight:bold;font-size: 17px}
form input#dongy{
    font-weight: bold;

}
.fakeimg1 {
      height: 85px;
      background: lightblue;
      color:black;
      padding: 10px;
      font-weight: bold;
      margin-top: 1px;
 }
body{
            background-image: url(../quanlytong/background.jpg);
            background-size: auto;
              }
    </style>
  <script  type="text/javascript">

$(document).ready(function(){
  $("#monitor").change(function(){
    var monitor = $("#monitor").val();
    var dongy=1;
    $.post("theodoi1_ajaxtheodoiduan.php", {monitor: monitor,dongy:dongy}, function(data){$("#displaymonitor").html(data);})
  })

})




  </script>
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
              <li class="active"><a href="theodoiduan.php">Monitor Project</a></li>
              <li><a href="phancongcongviec.php" >Assignment Page</a></li>
                      <li><a href="logout_phancong.php">Log out</a></li>
            </ul>
          </div>
    </nav>
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
        <div style="width: 100%; float:left;">
            <div style="width: 20%; float:left;float:left;font-weight: bold;font-size: 20px;"><input type="text" class="text1" value="PROJECT ID:" readonly ></input></div>
            <select id="monitor" class="text1">
                  <option value="" >Select ...</option>
                <?php
                          $sql= "select * from duan ";
                          $query = mysql_query($sql);
                          $num = mysql_num_rows($query);
                          if ($num>0)
                            {
                              while($monitor = mysql_fetch_array($query))
                              {
                                 ?>
                                <option value="<?php echo $monitor['msduan']?>"><?php echo "$monitor[msduan]: $monitor[tenduan]"?></option>
                                <?php
                              }
                            }
                                ?>
                      </select>
                      <div id="displaymonitor"></div>

</body>
</html>
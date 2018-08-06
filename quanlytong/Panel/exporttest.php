<!--KIỂM TRA ĐĂNG NHẬP TỪ QUẢN LÝ-->
<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}
?>

<?php
include "../../connection.php";
?>
<?php
include '../Classes/PHPExcel.php';

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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php
if(isset($_POST['button1']))
{
  $text1=$_POST['text1']; //msdu
  $order=$_POST['order'];
  if (mysql_num_rows(mysql_query("SELECT * FROM duan where msduan='$text1'"))!=0)
  {
    if ($order !='0')
    {
  $sql= "SELECT * from donhang where landat='$order'";
  $query=mysql_query($sql);
  $query=mysql_fetch_array($query);
  $sdt=$query['sdt'];
  // query mskh
  $sql = "SELECT * from khachhang where sdt='$sdt'";
  $query=mysql_query($sql);
  $query=mysql_fetch_array($query);
  $mskh=$query['mskh'];
  $mstutemp=$msduan.$mskh.$order;
  // $tb=mysql_query();
  $sql="SELECT * FROM tu where mstu like '%$mstutemp%'";
  $query=mysql_query($sql);
  $num=mysql_num_rows($query);
  if ( $num!='')
  {
  $objExcel = new PHPExcel;
  $objExcel->setActiveSheetindex(0);
  $sheet = $objExcel -> getActiveSheet() ->setTitle('sheet1');

  $rowCount =1;
  $sheet ->setCellValue('A'.$rowCount,'mstu');
  $sheet ->setCellValue('B'.$rowCount,'mskhungtu');
  $sql=mysql_query("SELECT * from tu where mstu like '%$mstutemp%'");
  while($tu=mysql_fetch_array($sql))
  {
    $mstu=$tu[0];
    $result = mysql_query("SELECT mstu,mskhungtu FROM khungtu where mstu='$mstu'");

    while($row = mysql_fetch_array($result))
      {
        $rowCount++;
        $sheet ->setCellValue('A'.$rowCount,$row['mstu']);
        $sheet ->setCellValue('B'.$rowCount,$row['mskhungtu']);
    }
  }
  $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
  $filename = "export.xlsx";
  $objWriter -> save($filename);
ob_end_clean();
  header('Content-Disposition: attachment; filename="' . $filename . '"');
  header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
  header('Content-Length: ' . filesize($filename));
  header('Content-Transfer-Encoding: binary');
  header('Cache-Control: must-revalidate');
  header('Pragma: no-cache');
  readfile($filename);
  ob_end_clean();
  echo "<script type='text/javascript'>alert('Export Success');
window.location='home.php';
</script>";
}
  else
  {
        ?>
      <script type="text/javascript">
        $(document).ready(function(){
       swal({
      title: "Sorry!",
      text: "Column ID is not exist!!!",
      icon: "error",
      // dangerMode: true,
    })
       .then((willDelete) => {
       window.location='exporttest.php';
    })
    });
    </script>
    <?php
  }
            // ec/ho '<script>alert("Column ID is not existed")</script>';
}
 else
      {
           ?>
      <script type="text/javascript">
        $(document).ready(function(){
       swal({
      title: "Sorry!",
      text: "Please choose order carefully!!!",
      icon: "error",
      // dangerMode: true,
    })
       .then((willDelete) => {
       window.location='exporttest.php';
    })
    });
    </script>
    <?php
      }
            // echo '<script>alert("please chon order")</script>';
}
else
{
            ?>
      <script type="text/javascript">
        $(document).ready(function(){
       swal({
      title: "Sorry!",
      text: "Project ID is not exist!!! \n\n Please try again !!",
      icon: "error",
      // dangerMode: true,
    })
       .then((willDelete) => {
       window.location='exporttest.php';
    })
    });
    </script>
    <?php
}
            // echo '<script>alert("project ID is not existed")</script>';

}
?>




      <script  type="text/javascript">

        $(document).ready(function(){

    $("#text1").keyup(function(){
      document.getElementById('display_check_project').innerHTML='';
      document.getElementById('listpannel_ajax').innerHTML='';
    document.getElementById('orderdis').style.display='none';

    var msduan = $("#text1").val();
    $.post("exporttest_ajax.php", {msduan: msduan}, function(data){$("#display_check_project").html(data);});
    $.post("listpannel_ajax_order.php", {msduan: msduan}, function(data){$("#order").html(data);})

  })
$("#order").change(function(){

    var msduan = $("#text1").val();
    var order = $("#order").val();
      document.getElementById('display_check_project').innerHTML='';
    document.getElementById('listpannel_ajax').innerHTML='';
    $.post("listpannel_ajax.php", {msduan: msduan,order: order}, function(data){$("#listpannel_ajax").html(data);})
  })


   })

</script>
  <style>
  .fakeimg1 {
      height: 115px;
      background: lightblue;
      color:black;
      padding: 15px;
  }
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
         body{
            background-image: url(../background.jpg);
              }
                      .text1 {
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
            margin-left: 22px;
        }
                .order {
            height: 50px;
            width: 230px;
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
            margin-left: 20px;
            margin-top: 1px;

        }
                .fieldset1 {
            margin-top: 50px;
            border: 1px solid #999;
            border-radius: 20px;
            box-shadow: 0 0 10px #999;
            width: 100%;
            height: auto;
        }
                p{
            font-size: 25px;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
          }
                  .word{
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
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
#lib-thanh-size-small{padding: 14px;width: 100px;background-color: #ccc;color: #000;}

.topmenu {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.topmenu li {
    float: left;
}
.topmenu li div {
    display: inline-block;
    text-align: center;
    padding: 16px;
    text-decoration: none;
}

  </style>
</head>
<body>
<div class="fakeimg1 text-center" style="margin-bottom:0">
  <h1>HAI NAM AUTOMATION</h1>
  <p1 class="p1">WELCOM TO OURS COMPANY!</p1>
</div>


                   <div class="w3-bar w3-black" style="" >
    <a href="../../index.php"      class="w3-bar-item w3-button" id="lib-thanh">Home</a>

      <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh">Project</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Project/Add_Project.php">Add Project Information</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Project/Modifyproject.php">Modify Project Information</a>
      </div>
    </div>


   <div class="w3-dropdown-hover">
        <button class="w3-button" id="lib-thanh">Customer</button>
        <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Customer/Add_Customer.php">Add Customer Information</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Customer/ModifyCustomer.php">Modify Customer Information</a>
        </div>
      </div>


       <div class="w3-dropdown-hover">
        <button class="w3-button" style="padding: 14px;">Orders</button>
        <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Orders/Create_Orders.php">Add Orders</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Orders/Delete_Orders.php">Delete Orders</a>
        </div>
      </div>
    <!-- <a href="../Orders/Create_Orders.php" class="w3-bar-item w3-button" id="lib-thanh" ">Create Orders  </a> -->

     <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-size-small">Panel</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Create_Pannel.php">Create Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="listpannel.php">List Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="exporttest.php">Export Column ID</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="ModifyPannel.php">Modify Panel</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="Delete_Panel.php">Delete Panel</a>
      </div>
    </div>

   <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;"> Staff Menmer</button>
      <div class="w3-dropdown-content w3-bar-block">
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/Create.php">Create Staff </a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/Delete.php">Delete Staff</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/List.php">List Manager</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/List_employee.php">List Employee</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/ModifyStaff_Manager.php">Modify Manager</a>
      <a class="w3-bar-item w3-button" id="lib-thanh" " href="../Staff/ModifyStaff_Employee.php">Modify Employee</a>
      </div>
    </div>

    <a href="../Holiday/ngayle.php"        class="w3-bar-item w3-button" id="lib-thanh" ">Setting Holiday  </a>

    <a class="w3-bar-item w3-button"  href="../logout.php" id="lib-thanh-logout">Logout</a>
</div>



 <form method="post" action="">
                <p>Export Column ID</p>

              <ul class="topmenu">
                <li>
                <div>
                <lable for = "text1" class="word"> Project ID: </label>
                <input type = "text" name="text1" class="text1" id="text1" placeholder="xxxxxx" required="">
                </div>
                </li>
                <li>
                <div id="orderdis" style="display: none;">
                    <lable class="word"> Customer Order: </label>
                  <SELECT id ="order" class="order" name="order">
                  </SELECT>
                   </div>
                   </li>
                   </ul>
                   <br>
                      <span id="display_check_project"></span>
              <br style="clear: left;">
                      <div style="clear: left;" id="listpannel_ajax"></div>

                <input type = "submit" name="button1" value= "Submit" class="btn btn-lg btn-primary" style="margin-left: 5%;">
            </form>


  </body>
</html>

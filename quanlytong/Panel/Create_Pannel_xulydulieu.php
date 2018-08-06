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
if ( isset($_POST['button1']))
{
    for ($i=1;$i <= $_POST['numrow_tu'];$i++)
    {

        $indexstring=(string)$i;
        $mstustring="mstu$indexstring";
        $numbercolumnstring="numbercolumn$indexstring";
        $fatstring="fat$indexstring";
        $deliverystring="delivery$indexstring";

        $mstu=$_POST["$mstustring"];
        $numbercolumn=$_POST["$numbercolumnstring"];
        $fat=$_POST["$fatstring"];
        $delivery=$_POST["$deliverystring"];
         if ( ($numbercolumn!="")&&  ($fat!="") && ($delivery!=""))
         {
            mysql_query("UPDATE tu SET fatdukien='$fat' ,giaohangdukien='$delivery' WHERE mstu=$mstu");
            for ( $indextemp=1;$indextemp<= $numbercolumn;$indextemp++)
             {
                if ($indextemp <10)
                {
                    $mskhungtu=$mstu.'00'.$indextemp;
                    mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$mstu')");
                }
                else if ($indextemp <100)
                {
                    $mskhungtu=$mstu.'0'.$indextemp;
                    mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$mstu')");
                }
                else
                {
                      $mskhungtu=$mstu.$indextemp;
                    mysql_query("INSERT INTO khungtu (mskhungtu,mstu) values ('$mskhungtu','$mstu')");

                }
            }
               if ( mysql_num_rows(mysql_query("SELECT * FROM khungtu where mstu = '$mstu'")) == $numbercolumn)
                echo "<br> Create number of Panel $mstu success!!! <br>";
               else echo "Try again"; //never use

         }

        }

}




?>



<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>Intern in Hai Nam Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
     <style>
        .fakeimg1 {
            height: 115px;
            background: lightblue;
            color:black;
            padding: 15px;
                  }
        .carousel-inner img
          {
            width: 100%;
            height: 100%;
          }
          body{
            background-image: url(background.jpg);
              }
                .column1{
        font-weight: bold;
        font-size: 17px;
        border: solid 1px ;
        padding: 20px;
        background-color: #A0A0A0;
        border-radius: 10px;
        text-align: center;
    }
   </style>
    </head>
<body>
<table class="table table-bordered ">
                            <thead>
                            <tr>
                                <th width="auto">
                                <input type="text"  class="  form-control" value="Pannel ID" readonly  style="font-weight: bold;
                                                font-size: 17px;
                                                background-color: #A0A0A0;
                                                border-radius: 12px;
                                                height: 50px;
                                                width: 180px;
                                                text-align: center;">
                                </input></th>
                                <th width="auto">
                                <input type="text"  class=" form-control" value=" Name" readonly size ="auto" style="font-weight: bold;
                                                            font-size: 17px;
                                                            background-color: #A0A0A0;
                                                            border-radius: 12px;
                                                            height: 50px;
                                                            width: 400px;
                                                            text-align: center;">
                                </th>
                                <th width="auto">
                                <input type="text"  class=" form-control" value="Number of Column " readonly size ="auto" style="font-weight: bold;
                                                font-size: 17px;
                                                background-color: #A0A0A0;
                                                border-radius: 12px;
                                                height: 50px;
                                                width: 180px;
                                                text-align: center;"></th>
                                <th width="auto"><input  type="text"  class=" form-control" value="Fat" readonly size ="auto" style="font-weight: bold;
                                                font-size: 17px;
                                                background-color: #A0A0A0;
                                                border-radius: 12px;
                                                width: 180px;
                                                height: 50px;
                                                text-align: center;"></th>
                                <th width="auto"><input  type="text" class=" form-control" value="Delivery" readonly size ="auto" style="font-weight: bold;
                                                font-size: 17px;
                                                width: 180px;

                                                background-color :#A0A0A0;
                                                border-radius: 12px;
                                                height: 50px;
                                                text-align: center;"></th>
                            </tr>
                            </thead>

                                             <tbody>

                            <?php
                                $msduan=$_POST['msduan'];
                                    $sdt=$_POST['sdt'];
                                    $order=$_POST['order'];
                                    $sqlkh="SELECT * FROM khachhang where sdt = '$sdt'";
                                    $querykh=mysql_query($sqlkh);
                                    $rowkh=mysql_fetch_array($querykh);
                                    $mskh=$rowkh['mskh'];

                                    $prefixmstu=$msduan.$mskh.$order;
                                    $sqltu="SELECT * FROM tu where mstu like '$prefixmstu%'";
                                    $querytu=mysql_query($sqltu);

                                    while ($rowtu=mysql_fetch_array($querytu))
                                     {
                                            $numrow=mysql_num_rows(mysql_query("SELECT * from khungtu where mstu='$rowtu[mstu]'"));
                                        ?>
                                        <tr>
                                        <td>
                                            <input type="text"  readonly value="<?php echo $rowtu['mstu'];?>" style="font-weight: bold;
                                                font-size: 15px;
                                                background-color: white;
                                                border-radius: 12px;
                                                height: 50px;
                                                width: 180px;
                                                color: black;
                                                text-align: center;">
                                            </input>
                                        </td>
                                        <td>
                                            <input type="text" readonly value="<?php echo $rowtu['tentu'];?>"
                                             style="font-weight: bold;
                                                font-size: 15px;
                                                background-color: white;
                                                border-radius: 12px;
                                                height: 50px;
                                                width: 400px;
                                                text-align: center;">
                                            </input>
                                        </td>
                                        <td>
                                            <input type="text" readonly value="<?php echo $numrow;?>"
                                            style="
                                                font-size: 15px;
                                                border-radius: 12px;
                                                height: 50px;
                                                text-align: center;">
                                            </input>
                                        </td>
                                        <td>
                                            <input type="text" readonly value="<?php echo $rowtu['fatdukien'];?>"
                                            style="
                                                font-size: 15px;
                                                width: 180px;

                                                background-color: white;
                                                border-radius: 12px;
                                                height: 50px;
                                                text-align: center;">
                                            </input>
                                        </td>
                                        <td>
                                        <input type="text" readonly value="<?php echo $rowtu['giaohangdukien'];?>"
                                        style="
                                                font-size: 15px;
                                                width: 180px;

                                                background-color: white;
                                                border-radius: 12px;
                                                height: 50px;
                                                text-align: center;">
                                        </td>
                                        <tr>
                                        <?php
                                    }

                                    //echo $prefixmstu;

                                ?>


                            </tbody>

                          </table>

                            </tbody>
                            </table>
                            <br>
                            <a href="Create_Pannel.php" class="column1"> BACK </a>
                            </body>
                            </html>
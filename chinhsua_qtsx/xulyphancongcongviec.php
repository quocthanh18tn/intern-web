<?php
session_start();
if(!(isset($_SESSION['quanly_gdtong'])))
{
header("location:main_login_phancong.php");
}
?>
<?php
include "../connection.php";
?>
<?php
if ($_POST['capnhat']==1)
    {
        if ($_SESSION['quanly_gdtong']!=2)
        {
                $mskhungtu = $_POST["mskhungtu"];
                $msnv = $_POST["msnv"];
                $msgd = $_POST["msgd"];

                if ($msnv!="")
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'"));
                        if($flag==1)
                            {
                                mysql_query("UPDATE qtsx SET msnv = '$msnv' WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>0) echo '<script>alert("Cập nhật: THÀNH CÔNG ")</script>';
                                else echo '<script>alert("Cập nhật: THẤT BẠI, VUI LÒNG THỬ LẠI")</script>';
                            }
                        else echo '<script>alert("Cập nhật: THẤT BẠI, GIAI ĐOẠN CHƯA ĐƯỢC PHÂN CÔNG,KHÔNG THỂ CẬP NHẬT")</script>';
                    }

        }
        else
        {
            for($i=1;$i<=7;$i++)
            {
                $mskhungtu = $_POST["mskhungtu"];
                $msnv = $_POST["msnv$i"];
                $msgd = $_POST["msgd$i"];
                $start= $_POST["start$i"];
                $end= $_POST["end$i"];
                $expect=$_POST["expect$i"];
                if ($msnv!=""||$start!=""||$end!=""||$expect!="")
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'"));

                        if($flag==1)
                            {
                                $array=mysql_fetch_array(mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'"));
                                if ($mskhungtu =="")
                                    $mskhungtu=$array['mskhungtu'];
                                if($msnv=="")
                                    $msnv=$array['msnv'];
                                if($msgd=="")
                                    $msgd=$array['msgd'];
                                if($start=="")
                                    $start=$array['date_start'];
                                if($end=="")
                                    $end=$array['date_finish'];
                                if($expect=="")
                                    $expect=$array['minutes_dukien'];
                                mysql_query("UPDATE qtsx SET msnv = '$msnv', date_start='$start' , date_finish='$end',minutes_dukien=$expect WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>0) echo "<br>Cập nhật giai đoạn $msgd: THÀNH CÔNG ";
                                else echo "<br>Cập nhật giai đoạn $msgd: THẤT BẠI, VUI LÒNG THỬ LẠI";
                            }
                        else
                        {
                            mysql_query("INSERT INTO qtsx (mskhungtu,msnv,msgd,date_start,date_finish,minutes_dukien) VALUES('$mskhungtu','$msnv','$msgd','$start','$end',$expect) ");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>0) echo "<br>Cập nhật giai đoạn $msgd: THÀNH CÔNG ";
                                else echo "<br>Cập nhật giai đoạn $msgd: THẤT BẠI, VUI LÒNG THỬ LẠI";
                        }
                    }
            }
        }
    }
?>


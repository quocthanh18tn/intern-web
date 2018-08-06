<?php
session_start();
if(!(isset($_SESSION['quanly'])))
{
header("location:main_login_phancong.php");
}
?>
<?php
include "../connection.php";
?>
<?php
if ($_POST['dongy']==1)
    {
        if ($_SESSION['quanly']!=2)
        {
                $mskhungtu = $_POST["mskhungtu"];
                $msnv = $_POST["msnv"];
                $msgd = $_POST["msgd"];
                $dk=$_POST["dk"];
                if ($msnv!=""||$dk!="")
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'"));
                        if($flag<=0)
                            {
                                mysql_query("INSERT INTO qtsx (mskhungtu,msnv,msgd,minutes_dukien) VALUES ('$mskhungtu','$msnv','$msgd',$dk)");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>0) echo '<script>alert("Phân công: THÀNH CÔNG ")</script>';
                                else echo '<script>alert("Phân công: THẤT BẠI, VUI LÒNG THỬ LẠI")</script>' ;

                            }
                        else
                            echo '<script>alert("Phân công: THẤT BẠI, GIAI ĐOẠN ĐÃ ĐƯỢC PHÂN CÔNG TRƯỚC ĐÓ ")</script>';
                    }

        }
        else
        {
            for($i=1;$i<=7;$i++)
            {
                $mskhungtu = $_POST["mskhungtu"];
                $msnv = $_POST["msnv$i"];
                $msgd = $_POST["msgd$i"];
                $dk=$_POST["dk$i"];
                if ($msnv!=""||$dk!="")
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'"));
                        if($flag<=0)
                            {
                                mysql_query("INSERT INTO qtsx (mskhungtu,msnv,msgd,minutes_dukien) VALUES ('$mskhungtu','$msnv','$msgd',$dk)");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>0) echo "<br><strong>Phân công giai đoạn $msgd: THÀNH CÔNG </strong> ";
                                else echo "<br><strong>Phân công giai đoạn $msgd: THẤT BẠI, VUI LÒNG THỬ LẠI </strong>" ;

                            }
                        else
                            echo "<br><strong>Phân công giai đoạn $msgd: THẤT BẠI, GIAI ĐOẠN ĐÃ ĐƯỢC PHÂN CÔNG TRƯỚC ĐÓ </strong>";
                    }

            }
        }
    }
if ($_POST['capnhat']==1)
    {
        if ($_SESSION['quanly']!=2)
        {
                $mskhungtu = $_POST["mskhungtu"];
                $msnv = $_POST["msnv"];
                $msgd = $_POST["msgd"];
                $dk=$_POST["dk"];
                if (($msnv!="")||($dk!=""))
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'"));
                        if($flag==1)
                            {
                                if($msnv!="")
                                {
                                mysql_query("UPDATE qtsx SET msnv = '$msnv' WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>0) echo '<script>alert("Cập nhật: THÀNH CÔNG ")</script>';
                                else echo '<script>alert("Cập nhật: THẤT BẠI, VUI LÒNG THỬ LẠI")</script>';
                                }
                                if($dk!="")
                                {
                                mysql_query("UPDATE qtsx SET minutes_dukien = $dk WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND minutes_dukien=$dk AND msgd ='$msgd'"));
                                if($flag>0) echo '<script>alert("Cập nhật: THÀNH CÔNG ")</script>';
                                else echo '<script>alert("Cập nhật: THẤT BẠI, VUI LÒNG THỬ LẠI")</script>';
                                }
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
                $dk=$_POST["dk$i"];
                if (($msnv!="")||($dk!=""))
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'"));
                        if($flag==1)
                            {
                                if($msnv!="")
                                {
                                mysql_query("UPDATE qtsx SET msnv = '$msnv' WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd'"));
                                if($flag>0) echo "<br>Cập nhật giai đoạn $msgd: THÀNH CÔNG ";
                                else echo "<br>Cập nhật giai đoạn $msgd: THẤT BẠI, VUI LÒNG THỬ LẠI";
                                }
                                if($dk!="")
                                {
                                mysql_query("UPDATE qtsx SET minutes_dukien = $dk WHERE mskhungtu = '$mskhungtu' AND msgd ='$msgd'");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$mskhungtu' AND minutes_dukien=$dk AND msgd ='$msgd'"));
                                if($flag>0) echo "<br><strong>Cập nhật giai đoạn $msgd: THÀNH CÔNG</strong> ";
                                else echo "<br><strong>Cập nhật giai đoạn $msgd: THẤT BẠI, VUI LÒNG THỬ LẠI</strong>";
                                }
                            }
                        else echo "<br><strong>Cập nhật giai đoạn $msgd: THẤT BẠI, GIAI ĐOẠN CHƯA ĐƯỢC PHÂN CÔNG,KHÔNG THỂ CẬP NHẬT</strong>";
                    }
            }
        }
    }
?>
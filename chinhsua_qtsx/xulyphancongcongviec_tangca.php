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
          ;
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
                if ($msnv!=""&&($start!=""||$end!=""))
                    {
                        $flag = mysql_num_rows( mysql_query("SELECT * FROM tangca WHERE mskhungtu = '$mskhungtu' AND msnv = '$msnv' AND  msgd ='$msgd' AND (date_start='$start' OR date_finish ='$end')"));

                        if($flag>0)
                            {
                                mysql_query( "DELETE FROM tangca WHERE mskhungtu = '$mskhungtu' AND msnv = '$msnv' AND msgd ='$msgd' AND (date_start='$start' OR date_finish ='$end')");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM tangca WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd' AND (date_start='$start' OR date_finish ='$end')"));
                                if($flag==0) echo "<br>XÓA THÀNH CÔNG ";
                                else echo "<br>XÓA THẤT BẠI, VUI LÒNG THỬ LẠI";
                            }
                        else
                        {
                            mysql_query("INSERT INTO tangca (mskhungtu,msnv,msgd,date_start,date_finish) VALUES('$mskhungtu','$msnv','$msgd','$start','$end') ");
                                $flag = mysql_num_rows( mysql_query("SELECT * FROM tangca WHERE mskhungtu = '$mskhungtu' AND msnv ='$msnv' AND msgd ='$msgd' AND date_start='$start' AND date_finish ='$end'"));
                                if($flag>0) echo "<br>THÊM THÀNH CÔNG ";
                                else echo "<br>THÊM THẤT BẠI, VUI LÒNG THỬ LẠI";
                        }
                    }
            }
        }
    }
?>


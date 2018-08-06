<?php
include "../connection.php";
include "calculation_time.php";

?>
<?php
if ($_POST['dongy']==1)
    {
      $tb='';
      $employee=$_POST['employee'];
      $start = $_POST['start'];
      $end = $_POST['end'];
    $nv_query = mysql_query("SELECT * FROM nhanvien WHERE msnv = '$employee' ");
    if (mysql_num_rows($nv_query)>0)
        {
            $ttnv = mysql_fetch_array($nv_query);
            $tennv = $ttnv['hoten'];
            $manv = $ttnv['msnv'];
            $tb =mysql_query("SELECT mskhungtu,giaidoan.tengd,date_start,date_finish,qtsx.msgd,msnv,minutes_dukien FROM qtsx INNER JOIN giaidoan ON qtsx.msgd = giaidoan.msgd WHERE msnv = '$manv' and (date_finish between '$start' and '$end') ");
        }
    else
        {
            $tennv = "";
            $manv = "";
            echo '<script>alert("KHÔNG TÌM THẤY NHÂN VIÊN")</script>';
        }

    }
else
    {
        $tennv = "";
        $manv = "";
        $tb = 0;
    }
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <title>EMPLOYEE'S TASK HISTORY</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
</head>
<body>
        <fieldset>
        <article class="content" id="print">
        <h2 id="ten_bang" style="text-align: center;">TASK HISTORY TABLE</h2>
      <div>
        <p id="nv">NAME: <?php echo $tennv; ?></p>
          </div>
              <p></p>
          <div>
              <p id="nv">EMPLOYEE ID: <?php echo $manv; ?></p>
      </div>
              <p></p>
          <div>
              <p id="nv">START DAY: <?php echo $start; ?></p>
          </div>
              <p></p>
          <div>
              <p id="nv">END DAY: <?php echo $end; ?></p>
          </div>
              <p></p>
      <div>
            <p id="nv" style="text-align: center; font-weight: bold;font-size: 20px;"> REGULAR TASKS </p>
            <table class="table table-stripedauto" border="1">
            <thead>
              <tr>
                <td width="200" bgcolor="#999999"><strong>COLUMN ID</strong></td>
                <td width="200" bgcolor="#999999"><strong>TASK NAME</strong></td>
                <td width="200" bgcolor="#999999"><strong>TOTAL TIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>OVERTIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>EXPECTED TIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>EFFECT</strong></td>
              </tr>
            </thead>
            <tbody>
              <?php
                if ($tb!=0)
                {
                  $so_luong_khung = mysql_num_rows($tb);
                  $total_workingtime =0;
                  $timetangca=0;
                  $timetamdung=0;
                  $timechuyenviec=0;
                  $temptotal=0;
                  $tempexpect=0;
                    while ($row = mysql_fetch_array($tb))
                      { 
                      	$start  =  checkholiday($row[2]);
                        $finish =  checkholiday($row[3]);

                        $sql="SELECT * FROM tamdung where mskhungtu='$row[0]' and msgd='$row[4]' and msnv = '$row[5]' and tieptuc is not null" ;
                        $query=mysql_query($sql);
                        $num=mysql_num_rows($query);
                        if ( $num !=0)
                        {
                        while ($rowtamdung=mysql_fetch_array($query))
                          {
                            $pause  =  checkholiday($rowtamdung['tamdung']);
                            $resume =  checkholiday($rowtamdung['tieptuc']);

                            $timetamdung+=hanhchinh($pause,$resume);
                          }
                        }
                        else $timetamdung=0;

                         // $officetime =hanhchinh($start,$finish) - hanhchinh($pause,$resume);
                        // echo $officetime;
                        $sql="SELECT * FROM tangca where mskhungtu='$row[0]' and msgd='$row[4]' and msnv = '$row[5]' and date_finish is not null" ;
                        $query=mysql_query($sql);
                        $num=mysql_num_rows($query);
                        if ( $num !=0)
                        {

                        while ($rowtangca=mysql_fetch_array($query))
                          {
                            $timetangca+=chuyenviec($rowtangca['date_start'],$rowtangca['date_finish']);
                          }
                        }
                        else $timetangca=0;
                        $sql="SELECT * FROM chuyenviec where mskhungtu='$row[0]' and msgd='$row[4]' and date_finish is not null" ;

                        $query=mysql_query($sql);
                        $num=mysql_num_rows($query);
                        if ( $num !=0)
                        {

                        while ($rowchuyenviec=mysql_fetch_array($query))
                          {
                            $timechuyenviec+=chuyenviec($rowchuyenviec['date_start'],$rowchuyenviec['date_finish']);
                          }
                        }
                        else $timechuyenviec=0;
                        $total_workingtime= hanhchinh($start,$finish)+$timetangca-$timetamdung+$timechuyenviec;
                        $effect= $total_workingtime - $row[6];
                        if ($effect >0)
                        {
                          $stringeffect= "slow $effect min";
                        }
                        else
                        {
                          $effect=-$effect;
                         $stringeffect =" fast $effect min";
                        }
                        // $total_workingtime+=$workingtime;
                    ?>
                      <tr>
                        <td>&nbsp;<?php echo $row[0];?></td>   <!-- khung tu-->
                        <td>&nbsp;<?php echo $row[1];?></td>    <!-- tengd-->
                        <td>&nbsp;<?php echo $total_workingtime;?></td>  <!-- khung tu-->
                        <td>&nbsp;<?php echo $timetangca;?></td>  <!-- khung tu-->
                        <td>&nbsp;<?php echo $row[6];?></td>
                        <td>&nbsp;<?php echo $stringeffect;?></td>  <!-- finish-->
                      </tr>
              <?php
                    $temptotal+=$total_workingtime;
                    $tempexpect+=$row[6];
                    $total_workingtime=0;
                    $timetangca=0;
                    $timechuyenviec=0;
                    $timetamdung=0;
                  }

                }
              ?>
              </tbody>
            </table>
            <?php if ($tb!=0)
             { ?>
                 <h4>Total Number Of Column: <?php echo $so_luong_khung; ?></h4>
                 <h4>Total Working Time : <?php echo $temptotal; ?></h4>
                 <h4>Total Free time: <?php echo $tempexpect-$temptotal; ?></h4>
               <?php

             }

                   ?>
        </div>

          <?php
            $tb1 =mysql_query("SELECT mskhungtu,giaidoan.tengd,date_start,date_finish,chuyenviec.msgd,msnv FROM chuyenviec INNER JOIN giaidoan ON chuyenviec.msgd = giaidoan.msgd WHERE msnv = '$manv' and (date_finish between '$start' and '$end') ");

          ?>
      <div>
            <p id="nv" style="text-align: center; font-weight: bold;font-size: 20px;"> IRREGULAR TASKS </p>
            <table class="table table-stripedauto" border="1">
            <thead>
              <tr>
                <td width="200" bgcolor="#999999"><strong>COLUMN ID</strong></td>
                <td width="200" bgcolor="#999999"><strong>TASK NAME</strong></td>
                <td width="200" bgcolor="#999999"><strong>OFFICE TIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>OVERTIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>START TIME</strong></td>
                <td width="200" bgcolor="#999999"><strong>FINISH TIME</strong></td>
              </tr>
            </thead>
            <tbody>
              <?php
                if ($tb1!=0)
                {
                  $so_luong_khung = mysql_num_rows($tb1);
                  $timeoffice=0;
                  $timetangca=0;
                  $temptotal=0;
                  $tempexpect=0;
                    while ($row = mysql_fetch_array($tb1))
                    {
                        $start  =  $row[2];
                        $finish =  $row[3];

                        $timetangca=subtime($start,$finish);
                        $timeoffice=chuyenviec($start,$finish)-$timetangca;

                        // $total_workingtime+=$workingtime;
                    ?>
                      <tr>
                        <td>&nbsp;<?php echo $row[0];?></td>   <!-- khung tu-->
                        <td>&nbsp;<?php echo $row[1];?></td>    <!-- tengd-->
                        <td>&nbsp;<?php echo $timeoffice;?></td>  <!-- khung tu-->
                        <td>&nbsp;<?php echo $timetangca;?></td>  <!-- khung tu-->
                        <td>&nbsp;<?php echo $row[2];?></td>
                        <td>&nbsp;<?php echo $row[3];?></td>  <!-- finish-->
                      </tr>
              <?php
                    $temptotal+=$timeoffice+$timetangca;
                    $timeoffice=0;
                    $timetangca=0;
                  }

                }
              ?>
              </tbody>
            </table>
            <?php if ($tb!=0)
             { ?>
                 <h4>Total Number Of Column: <?php echo $so_luong_khung; ?></h4>
                 <h4>Total Working Time : <?php echo $temptotal; ?></h4>
               <?php

             }
                   ?>
        </div>
        </article>
        </fieldset>
        <div>
            <input type="button" name="in" onclick="In_Content('print')" value="PRINT" style="margin-top: 30px" class="btn btn-primary">
        </div>
  </form>
</body>
</html>
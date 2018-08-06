<?php
include "../connection.php";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
h1#ten{
  text-align: left;
  font-weight: bold;
}

form table{font-weight:bold;font-size: 17px}
form input#dongy{
    font-weight: bold;

}
body{
            background-image: url(../quanlytong/background.jpg);
              }
    </style>
</head>
<body>
	<!--
	***********************
	***********************
	THEO DÕI TỦ
	***********************
	***********************
-->
    <form method="post" action="" id="quanlyduan.css" autocomplete="off">

                <?php
                if ($_POST['dongy']==1)
                    {
                        $tb = mysql_query("SELECT mskhungtu,msnv,giaidoan.tengd,date_start,date_finish FROM tangca INNER JOIN giaidoan WHERE tangca.msgd=giaidoan.msgd AND mskhungtu = '$_POST[mskhungtu]' ORDER BY tangca.msgd");

                ?>
                        <h3 style="color: green">Overtime Table</h3>
                        <table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th width="200" bgcolor="#999999"><strong>COLUMN ID </strong></th>
                                <th width="200" bgcolor="#999999"><strong>EMPLOYEE ID </strong></th>
                                <th width="200" bgcolor="#999999"><strong>TASK</strong></th>
                                <th width="200" bgcolor="#999999"><strong>START TIME </strong></th>
                                <th width="200" bgcolor="#999999"><strong>FINISH TIME </strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($tb!=0)
                             {
                                 while ($row = mysql_fetch_array($tb))
                                 { echo $row[7];
                            ?>
                                <tr>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[0];?></td>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[1];?></td>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[2];?></td>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[3];?></td>
                                <td bgcolor="<?php if (($row[4]!="")and ($row[3]!="")) echo "#99CCCC";elseif (($row[4]=="")and ($row[3]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[4];?></td>
                                </tr>

                            <?php
                                 }
                            ?>
                            </tbody>
                            <?php
                             }
                            ?>
                        </table>
                <?php
                    }
                ?>
    </form>
</body>
</html>
<?php
include "../connection.php";
?>
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
                        $tb = mysql_query("SELECT mskhungtu,msnv,giaidoan.tengd,minutes_dukien,date_start,date_finish FROM qtsx INNER JOIN giaidoan WHERE qtsx.msgd=giaidoan.msgd AND mskhungtu = '$_POST[mskhungtu]'");

                ?>
                        <table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th width="200" bgcolor="#999999"><strong>COLUMN ID </strong></th>
                                <th width="200" bgcolor="#999999"><strong>EMPLOYEE ID </strong></th>
                                <th width="200" bgcolor="#999999"><strong>TASK</strong></th>
                                <th width="200" bgcolor="#999999"><strong>EXPECTED TIME </strong></th>
                                <th width="200" bgcolor="#999999"><strong>START TIME </strong></th>
                                <th width="200" bgcolor="#999999"><strong>FINISH TIME </strong></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($tb!=0)
                             {
                                 while ($row = mysql_fetch_array($tb))
                                 {
                            ?>
                                <tr>
                                <td bgcolor="<?php if (($row[5]!="")and ($row[4]!="")) echo "#99CCCC";elseif (($row[5]=="")and ($row[4]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[0];?></td>
                                <td bgcolor="<?php if (($row[5]!="")and ($row[4]!="")) echo "#99CCCC";elseif (($row[5]=="")and ($row[4]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[1];?></td>
                                <td bgcolor="<?php if (($row[5]!="")and ($row[4]!="")) echo "#99CCCC";elseif (($row[5]=="")and ($row[4]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[2];?></td>
                                <td bgcolor="<?php if (($row[5]!="")and ($row[4]!="")) echo "#99CCCC";elseif (($row[5]=="")and ($row[4]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[3];?></td>
                                <td bgcolor="<?php if (($row[5]!="")and ($row[4]!="")) echo "#99CCCC";elseif (($row[5]=="")and ($row[4]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[4];?></td>
                                <td bgcolor="<?php if (($row[5]!="")and ($row[4]!="")) echo "#99CCCC";elseif (($row[5]=="")and ($row[4]!="")) echo "#FFFF99"; else echo "white" ?>">&nbsp;<?php echo $row[5];?></td>
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
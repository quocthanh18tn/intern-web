<?php
include "../connection.php";
?>

<?php 
		$mskhungtu=$_POST['mskhungtu'];
		$msnv=$_POST['msnv'];
		$msgd=$_POST['msgd'];



?>
<?php
$sql_qtsx = mysql_query("SELECT * FROM qtsx WHERE mskhungtu='$_POST[mskhungtu]' AND msgd = '$_POST[msgd]'");
$qtsx = mysql_fetch_array($sql_qtsx);

$date_time_current=date('Y-m-d H:i:s');
if ($qtsx['date_finish']!="")
{
    $date_finish_main=strtotime($qtsx['date_finish']);
    $date_finish_bonus_15=$date_finish_main +15*60;
    if ((strtotime($date_time_current)-$date_finish_bonus_15)>0) $khoa=1;
    
}
else $khoa =0;
$date_time_8h = date('Y-m-d 08:00:00');
$date_time_previous= strtotime(date('Y-m-d 08:00:00'))-86400;
$date_time_previous=date('Y-m-d H:i:s',$date_time_previous);
$hour = date('H');
if ($hour>=0 && $hour <8)
    {
        $sql_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$_POST[mskhungtu]' AND msgd = '$_POST[msgd]' AND msnv ='$msnv' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
    elseif ($hour>=8 && $hour <=23)
    {
        $sql_chuyenviec = mysql_query("SELECT * FROM chuyenviec WHERE mskhungtu='$_POST[mskhungtu]' AND msgd = '$_POST[msgd]' AND msnv ='$msnv' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
$num_chuyenviec=mysql_num_rows($sql_chuyenviec);
$dk_tamdung =mysql_num_rows(mysql_query("SELECT * FROM tamdung WHERE mskhungtu='$_POST[mskhungtu]' AND msgd = '$_POST[msgd]' AND tieptuc IS null"));
?>


<style type="text/css">
	.column {
    float: left;
    width: 33.33%;
    padding: 15px;
    margin: 0px;

}
.bottom
{    background-color: none;
    border-radius:10px ;
    color: white;
    padding: 16px 32px;
    /*text-decoration: none;*/
    margin: 4px 2px;
    cursor: pointer;

}
.text{
	 width: auto;
    padding: 6px 10px;
    box-sizing: border-box;
    border-radius: 10px;
    background-color: blue;
    color: white;

}
</style>
	<div class="column">
					<input type="submit" name="start" id= "start" value="START" class="btn btn-primary" style="width: 100px;font-size:15px;
					font-weight: bold;" <?php if (($qtsx['date_start']=='')||($num_chuyenviec>0)||($dk_tamdung>0)||($qtsx['date_finish_tam']!="")) echo 'disabled';?> >
					<input type="submit" name="finish" id="finish" value="FINISH" class="btn btn-primary" style="width: 100px;font-size:15px;
					font-weight: bold;" <?php if ($num_chuyenviec==0||$khoa ==1) echo 'disabled';?>>
	</div>
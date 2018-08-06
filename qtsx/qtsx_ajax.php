<?php
include "../connection.php";
?>
<?php
$sql_qtsx = mysql_query("SELECT * FROM qtsx WHERE mskhungtu='$_POST[mskhungtu]' AND msgd = '$_POST[msgd]'");
$qtsx = mysql_fetch_array($sql_qtsx);
$day=date('Y-m-d');
$date_time_current=date('Y-m-d H:i:s');
$date_time_8h = date('Y-m-d 08:00:00');
$date_time_previous= strtotime(date('Y-m-d 08:00:00'))-86400;
$date_time_previous=date('Y-m-d H:i:s',$date_time_previous);
$hour = date('H');
$num_holiday =mysql_num_rows(mysql_query("SELECT * FROM holiday WHERE holiday_date = '$day'"));
$sunday = strtotime($day);
$sunday = getdate($sunday)['weekday'];
$dk_tamdung =mysql_num_rows(mysql_query("SELECT * FROM tamdung WHERE mskhungtu='$_POST[mskhungtu]' AND msgd = '$_POST[msgd]' AND tieptuc IS null"));
if ($hour>=0 && $hour <8)
	{
		$sql_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$_POST[mskhungtu]' AND msgd = '$_POST[msgd]' AND date_start >= '$date_time_previous' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
    elseif ($hour>=8 && $hour <=23)
    {
    	$sql_tangca = mysql_query("SELECT * FROM tangca WHERE mskhungtu='$_POST[mskhungtu]' AND msgd = '$_POST[msgd]' AND date_start >= '$date_time_8h' AND date_start <= '$date_time_current' AND date_finish IS null");
    }
$num_tangca=mysql_num_rows($sql_tangca);
?>


<style type="text/css">
	.column {
    float: left;
    width: 33.33%;
    padding: 15px;
    margin: 0px;
    text-align: center;

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
#confirm_ql{
	width: 80%;
	font-size: 20px;
	/*width: 100px;*/
	/*float: left;*/
}
#confirm_qc
{
	width: 80%;
	font-size: 20px;
	/*float: center;*/
}
#delete_finish
{
	font-size: 20px;
	width: 80%;
	/*float: right;*/
}
</style>
<?php if($qtsx['date_finish_tam']=="")
{
?>
	<div class="column">
					<input type="submit" name="start" id= "start" value="START" class="btn btn-primary" style="width: 100px;font-size:15px;
					font-weight: bold;" <?php if ($qtsx['date_start']!='') echo 'disabled';?> >
					<input type="submit" name="finish" id="finish" value="FINISH" class="btn btn-primary" style="width: 100px;font-size:15px;
					font-weight: bold;" <?php if (($qtsx['date_start']=='')||($dk_tamdung>0)) echo 'disabled';?>>
		</div>
	<div class="column">
					<input type="submit" name="start_overtime" id= "start_overtime" value="START-OVERTIME" class="btn btn-success" style="width: 170px;font-size:15px;
					font-weight: bold;" <?php
					if (($qtsx['date_start']=='')||($num_tangca>0) || (!($sunday=='Sunday' or $num_holiday >0 or ($hour<8 or $hour >=17 ) ) )||($dk_tamdung>0))  echo 'disabled';


					?>>
					<input type="submit" name="finish_overtime" id="finish_overtime" value="FINISH-OVERTIME" class="btn btn-success" style="width: 170px;font-size:15px;
					font-weight: bold;" <?php if (($num_tangca==0)|| (!($sunday=='Sunday' or $num_holiday >0 or ($hour<8 or $hour >=17 ) ) )||($dk_tamdung>0)) echo 'disabled';?>>
		</div>
	<div class="column">
		<select class="text" name= "lydo" <?php if ($dk_tamdung>0) echo 'disabled';?>>
							<option>Select reason ...</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="ly do khac">Other reason</option>
						</select>
					<input type="submit" name="pause" id= "pause" value="PAUSE" class="btn btn-primary"  <?php if (($qtsx['date_start']=='')||($dk_tamdung>0)) echo 'disabled';?> >
					<input type="submit" name="resume" id="resume" value="RESUME" class="btn btn-primary"  <?php if ($dk_tamdung==0) echo 'disabled';?>>


		</div>
<?php
}
else
{
?>
<div class="column">
<input type="button" name="confirm_ql" id= "confirm_ql" value="CONFIRM FROM MANAGER" class="btn btn-primary "  <?php if ($qtsx['xacnhan_ql']!="") echo 'disabled'; ?>>
</div>
<div class="column">
<input type="button" name="confirm_qc" id= "confirm_qc" value="CONFIRM FROM QC" class="btn btn-primary "  <?php if ($qtsx['xacnhan_qc']!="") echo 'disabled'; ?>>
</div>
<div class="column">
<input type="button" name="delete_finish" id= "delete_finish" value="UNFINISH" class="btn btn-primary " >
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#confirm_ql").click(function(){
				       	$.post("xacnhanhoanthanh_ql.php", {}, function(data){$("#showtrangxacnhan").html(data);})
				    });
		$("#confirm_qc").click(function(){
				       	$.post("xacnhanhoanthanh_qc.php", {}, function(data){$("#showtrangxacnhan").html(data);})
				    });
		$("#delete_finish").click(function(){
				       	$.post("xacnhanhoanthanh_delete.php", {}, function(data){$("#showtrangxacnhan").html(data);})
				    });

	});
</script>
<?php
}
?>
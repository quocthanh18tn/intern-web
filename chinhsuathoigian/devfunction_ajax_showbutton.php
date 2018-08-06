<?php
include "../connection.php";
?>


<?php
		$mskhungtu=$_POST['mskhungtu'];
		$msnv=$_POST['msnv'];
		$msgd=$_POST['msgd'];


?>


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
       <script  type="text/javascript">

function Delete(start,finish,stt)
        	{
        $(document).ready(function(){
               var mskhungtu = $("#mskhungtu").val();
 			   var msnv = $("#msnv").val();
 			   var msgd = $("#msgd").val();
        		var x= confirm("Delete it? Are you sure?");
        		if (x==1)
        		{
 					$.post("devfunction_ajax_delete.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd,start: start,finish: finish, stt: stt}, function(data){});
 					 setTimeout(function(){
    				$.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})
				      },500);
  				}
			  else
  				{
  					$.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})
  				}

        							})
    		}
    $(document).ready(function(){
   			 $("#show_main").click(function(){
   			var x = document.getElementById("maintime");
   			 if (x.style.display === "none") {
   			     x.style.display = "block";
   			     document.getElementById('show_main').value="Hidden main";
   			 } else
   			  {
   			     x.style.display = "none";
   			     document.getElementById('show_main').value="Show main";
   			 }
 						 					})
		    $("#show_overtime").click(function(){
			   var x = document.getElementById("overtime");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById('show_overtime').value="Hidden overtime";

    } else
     {
        x.style.display = "none";
        document.getElementById('show_overtime').value="Show overtime";

    }

  })
      $("#show_interrupt").click(function(){

   var x = document.getElementById("interrupt");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById('show_interrupt').value="Hidden Sub";

    } else
     {
        x.style.display = "none";
        document.getElementById('show_interrupt').value="Show Sub";

    }

  })
    $("#show_pause").click(function(){

   var x = document.getElementById("pause");
    if (x.style.display === "none") {
        x.style.display = "block";
        document.getElementById('show_pause').value="Hidden pauses";

    } else
     {
        x.style.display = "none";
        document.getElementById('show_pause').value="Show pauses";

    }

  })

     $("#main").click(function(){
            var mskhungtu = $("#mskhungtu").val();
		    var msnv = $("#msnv").val();
		    var msgd = $("#msgd").val();
     	var x=confirm("Are you sure?????");
     	if (x==1)
     	{
        var data = $('form#form_main').serialize();
        $.ajax({
        type : 'POST', //kiểu post
        url  : 'devfunction_ajax_showmain.php', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {
               		 // $("#display").html(data);

               }
        });
setTimeout(function(){
    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})
      },500);
 }
 else {
 	    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);});
 }
    });

 $("#over").click(function(){
            var mskhungtu = $("#mskhungtu").val();
    var msnv = $("#msnv").val();
    var msgd = $("#msgd").val();
     	var x=confirm("Are you sure?????");
     	if (x==1)
     	{
        var data = $('form#form_over').serialize();
        $.ajax({
        type : 'POST', //kiểu post
        url  : 'devfunction_ajax_showover.php', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {
               		// $("#display").html(data);
               }
        });
setTimeout(function(){
    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})
      },1000);
  }
 else {
 	    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);});
 }
    });


 $("#interrupt_").click(function(){
            var mskhungtu = $("#mskhungtu").val();
    var msnv = $("#msnv").val();
    var msgd = $("#msgd").val();
     	var x=confirm("Are you sure?????");
     	if (x==1)
     	{
        var data = $('form#form_interrupt').serialize();
        $.ajax({
        type : 'POST', //kiểu post
        url  : 'devfunction_ajax_showinterrupt.php', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {
               		 // $("#display").html(data);
               }
        });
setTimeout(function(){
    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})
      },1000);
  }
 else {
 	    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);});
 }
    });


 $("#pause_").click(function(){
            var mskhungtu = $("#mskhungtu").val();
    var msnv = $("#msnv").val();
    var msgd = $("#msgd").val();
     	var x=confirm("Are you sure?????");
     	if (x==1)
     	{
        var data = $('form#form_pause').serialize();
        $.ajax({
        type : 'POST', //kiểu post
        url  : 'devfunction_ajax_showpause.php', //gửi dữ liệu sang trang submit.php
        data : data,
        success :  function(data)
               {
               		 // $("#display").html(data);
               }
        });

setTimeout(function(){
    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})
      },1000);
 }
 else
 {
 	$.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})

 }
    });

$("#button2").click(function(){
    var mskhungtu = $("#mskhungtu").val();
    var msnv = $("#msnv").val();
    var msgd = $("#msgd").val();
    $.post("devfunction_ajax_showbutton.php", {mskhungtu: mskhungtu,msnv: msnv,msgd: msgd}, function(data){$("#display").html(data);})

  })



})

</script>
<style type="text/css">

	#khungtext
            {
              width: 50%;
             padding: 12px 12px;
             box-sizing: border-box;
             border: 1px solid green;
             border-radius: 8px;
            }
     #delete_main, #main,#show_overtime, #delete_over ,#over, #interrupt_,#show_interrupt, #delete_interrupt,#pause_, #delete_pause, #show_pause{
     	/*background-color: #4CAF50;*/
     	background-color: #4CAF50;
            border-radius: 10px;
            color: white;
            padding: 8px 20px;
            text-decoration: none;
            cursor: pointer;
     }
</style>
<fieldset style="clear: left;"   class="fieldset1">
	<div style="float: right;">
 		<input type="button" name="button2" id="button2" value="Default"></td>
 		<div style="display: none;">
			<input type="text" name="mskhungtu" id="mskhungtu" value="<?php echo $mskhungtu;?>">
			<input type="text" name="msnv" id="msnv" value="<?php echo $msnv;?>">
			<input type="text" name="msgd" id="msgd" value="<?php echo $msgd;?>">
 		</div>
 	</div>
	<br>
	<input type="button" name="show_main" id="show_main" value="Hidden main"></input>
	<div id="maintime" style="display: block;">
		<form method="POST" id="form_main">
		<div style="display: none;">
			<input type="text" name="mskhungtu" id="mskhungtu" value="<?php echo $mskhungtu;?>">
			<input type="text" name="msnv" id="msnv" value="<?php echo $msnv;?>">
			<input type="text" name="msgd" id="msgd" value="<?php echo $msgd;?>">
 		</div>
 		<br>
 		<table class="table " >
 			<tr>
 				<th style="border: solid 1px;" >Start</th>
 				<th style="border: solid 1px;" >Finish</th>
 				<th style="border: solid 1px;display: none;">Start_Hidden</th>
 				<th style="border: solid 1px;display: none;">Delivery</th>
 				<th style="border: solid 1px;">Mode Delete</th>
 			</tr>
		<?php
			$sql="SELECT * FROM qtsx where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd'";
			$query=mysql_query($sql);
			$num=mysql_num_rows($query);

			if ($num !=0)
			{
					$index=1;
				while ($numrow=mysql_fetch_array($query))
				{
					$stringindex=(string)$index;
					$str_start_main="start_main$stringindex";
					$str_start_main_hidden="start_main_hidden$stringindex";

					$start=strtotime($numrow[3]);
					$date_start=date('Y-m-d',$start);
					$hours_start=date('H:i',$start);
					$str_start=$date_start.'T'.$hours_start;
					$str_finish_main="finish_main$stringindex";
					$str_finish_main_hidden="finish_main_hidden$stringindex";
					if ($numrow[4] !='')
					{
						$finish=strtotime($numrow[4]);
						$date_finish=date('Y-m-d',$finish);
						$hours_finish=date('H:i',$finish);
						$str_finish=$date_finish.'T'.$hours_finish;
					}
					else $str_finish="";
					?>
			<tr>
				<td  style="border: solid 1px;">
					<input type="datetime-local"  id="khungtext" name="<?php echo $str_start_main;?>" class="date" value="<?php echo $str_start;?>"  ></input>
				</td>
				<td style="border: solid 1px;">
					<input type="datetime-local" id="khungtext" name="<?php echo $str_finish_main;?>" class="date" value="<?php echo $str_finish;?>" ></input>
				</td>
				<td  style="border: solid 1px;display: none;">
					<input type="datetime-local" id="khungtext" name="<?php echo $str_start_main_hidden;?>" class="date" value="<?php echo $str_start;?>" ></input>
				</td>
				<td style="border: solid 1px;display: none;">
					<input type="datetime-local" id="khungtext" name="<?php echo $str_finish_main_hidden;?>"  class="date" value="<?php echo $str_finish;?>" ></input>
				</td>
				<td style="border: solid 1px;">
					<input type="button" onclick='Delete("<?php echo $numrow[3]; ?>","<?php echo $numrow[4]; ?>",1)' name="delete_main" id="delete_main" value="Delete">
				</td>
				<?php
				$index+=1;
			}
			}
	?>
			</tr>
				<td><input type="button" name="main" id="main" value="Verify Main"></td>
				<td></td>
				<td></td>
	</table>
	</form>
	</div>


</div>
<br>
<br>
<br>
<br>
<input type="button" name="show_overtime" id="show_overtime" value="Hidden overtime"></input>
<br>
<br>
<div id="overtime" style="display: block;">
<form method="POST" id="form_over">
<div style="display: none;">
		<input type="text" name="mskhungtu" id="mskhungtu" value="<?php echo $mskhungtu;?>">
		<input type="text" name="msnv" id="msnv" value="<?php echo $msnv;?>">
		<input type="text" name="msgd" id="msgd" value="<?php echo $msgd;?>">
 	</div>
		<table class="table " >
		  <tr>
		    <th style="border: solid 1px;" >Start</th>
		    <th style="border: solid 1px;" >Finish</th>
		    <th style="border: solid 1px;display: none;">Start_Hidden</th>
		    <th style="border: solid 1px;display: none;">Delivery</th>
		    <th style="border: solid 1px;">Mode Delete</th>
		  </tr>

		<?php
		$sql="SELECT * FROM tangca where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd'";
		$query=mysql_query($sql);
		$num=mysql_num_rows($query);
		if ($num !=0)
		{
				$index=1;
			while ($numrow=mysql_fetch_array($query))
			{
				$stringindex=(string)$index;
				$str_start_overtime="start_overtime$stringindex";
				$str_start_overtime_hidden="start_overtime_hidden$stringindex";

				$start=strtotime($numrow[3]);
				$date_start=date('Y-m-d',$start);
				$hours_start=date('H:i',$start);
				$str_start=$date_start.'T'.$hours_start;

				$str_finish_overtime="finish_overtime$stringindex";
				$str_finish_overtime_hidden="finish_overtime_hidden$stringindex";

				if ($numrow[4]!="")
				{
					$finish=strtotime($numrow[4]);
					$date_finish=date('Y-m-d',$finish);
					$hours_finish=date('H:i',$finish);
					$str_finish=$date_finish.'T'.$hours_finish;
				}
				else $str_finish="";
				?>
				<tr>
					 <td  style="border: solid 1px;">
					 	<input type="datetime-local" id="khungtext" name="<?php echo $str_start_overtime;?>" class="date" value="<?php echo $str_start;?>"  ></input>
					 </td>
					 <td style="border: solid 1px;">
					 	<input type="datetime-local" id="khungtext" name="<?php echo $str_finish_overtime;?>" class="date" value="<?php echo $str_finish;?>" ></input>
					 </td>
					 <td  style="border: solid 1px;display: none;">
					 	<input type="datetime-local" id="khungtext" name="<?php echo $str_start_overtime_hidden;?>" class="date" value="<?php echo $str_start;?>" ></input>
					 </td>
					 <td style="border: solid 1px;display: none;">
					 	<input type="datetime-local" id="khungtext" name="<?php echo $str_finish_overtime_hidden;?>"  class="date" value="<?php echo $str_finish;?>" ></input>
					 </td>
					 <td style="border: solid 1px;">
					 	<input type="button" onclick='Delete("<?php echo $numrow[3]; ?>","<?php echo $numrow[4]; ?>",2)' name="delete_over" id="delete_over" value="Delete"></td>


				<?php
				$index+=1;
			}
			?>

				<?php
			}

	?>

				</tr>
					 	<td><input type="button" name="over" id="over" value="Verify Overtime"></td>
					 	<td></td>
					 	<td></td>


		</table>
		</form>
	</div>
</div>
<br>
<br>


<input type="button" name="show_interrupt" id="show_interrupt" value="Hidden Sub"></input>
<br>
<br>
<div id="interrupt" style="display: block;">
<form method="POST" id="form_interrupt">
<div style="display: none;">
		<input type="text" name="mskhungtu" id="mskhungtu" value="<?php echo $mskhungtu;?>">
		<input type="text" name="msnv" id="msnv" value="<?php echo $msnv;?>">
		<input type="text" name="msgd" id="msgd" value="<?php echo $msgd;?>">
 	</div>


		     <table class="table " >
		  <tr>
		    <th style="border: solid 1px;" >Start</th>
		    <th style="border: solid 1px;" >Finish</th>
		    <th style="border: solid 1px;display: none;">Start_Hidden</th>
		    <th style="border: solid 1px;display: none;">Delivery</th>
		    <th style="border: solid 1px;">Mode Delete</th>
		  </tr>



<?php
	$sql="SELECT * FROM chuyenviec where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
		if ($num !=0)
		{
				$index=1;
			while ($numrow=mysql_fetch_array($query))
			{
				$stringindex=(string)$index;
				$str_start_interrupt="start_interrupt$stringindex";
				$str_start_interrupt_hidden="start_interrupt_hidden$stringindex";

				$start=strtotime($numrow[3]);
				$date_start=date('Y-m-d',$start);
				$hours_start=date('H:i',$start);
				$str_start=$date_start.'T'.$hours_start;

				$str_finish_interrupt="finish_interrupt$stringindex";
				$str_finish_interrupt_hidden="finish_interrupt_hidden$stringindex";
				if ($numrow[4]!="")
				{
					$finish=strtotime($numrow[4]);
					$date_finish=date('Y-m-d',$finish);
					$hours_finish=date('H:i',$finish);
					$str_finish=$date_finish.'T'.$hours_finish;
				}
				else
					$str_finish="";
				?>
				<tr>
					 <td  style="border: solid 1px;">
					 	<input type="datetime-local" id="khungtext" name="<?php echo $str_start_interrupt;?>" class="date" value="<?php echo $str_start;?>"  ></input>
					 </td>
					 <td style="border: solid 1px;">
					 	<input type="datetime-local" id="khungtext" name="<?php echo $str_finish_interrupt;?>" class="date" value="<?php echo $str_finish;?>" ></input>
					 </td>
					 <td  style="border: solid 1px;display: none;">
					 	<input type="datetime-local"  name="<?php echo $str_start_interrupt_hidden;?>" class="date" value="<?php echo $str_start;?>" ></input>
					 </td>
					 <td style="border: solid 1px;display: none;">
					 	<input type="datetime-local" name="<?php echo $str_finish_interrupt_hidden;?>"  class="date" value="<?php echo $str_finish;?>" ></input>
					 </td>
			<td style="border: solid 1px;">
					 	<input type="button" onclick='Delete("<?php echo $numrow[3]; ?>","<?php echo $numrow[4]; ?>",3)' name="delete_interrupt" id="delete_interrupt" value="Delete"></td>

				</tr>
				<?php
				$index+=1;
			}
			?>
				<?php
			}

?>


					 	<td><input type="button" name="interrupt_" id="interrupt_" value="Verify Sub"></td>
					 	<td></td>
					 	<td></td>

		</table>
		</form>
	</div>

</div>
<br>
<br>
<input type="button" name="show_pause" id="show_pause" value="Hidden pause"></input>
<br>
<br>
<div id="pause" style="display: block;">
<form method="POST" id="form_pause">
<div style="display: none;">
		<input type="text" name="mskhungtu" id="mskhungtu" value="<?php echo $mskhungtu;?>">
		<input type="text" name="msnv" id="msnv" value="<?php echo $msnv;?>">
		<input type="text" name="msgd" id="msgd" value="<?php echo $msgd;?>">
 	</div>

		<table class="table " >
		  <tr>
		    <th style="border: solid 1px;" >Start</th>
		    <th style="border: solid 1px;" >Finish</th>
		    <th style="border: solid 1px;display: none;">Start_Hidden</th>
		    <th style="border: solid 1px;display: none;">Delivery</th>
		    <th style="border: solid 1px;">Mode Delete</th>
		  </tr>


<?php
	$sql="SELECT * FROM tamdung where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
		if ($num !=0)
		{
				$index=1;
			while ($numrow=mysql_fetch_array($query))
			{
				$stringindex=(string)$index;
				$str_start_pausetime="start_pausetime$stringindex";
				$str_start_pausetime_hidden="start_pausetime_hidden$stringindex";

				$start=strtotime($numrow[3]);
				$date_start=date('Y-m-d',$start);
				$hours_start=date('H:i',$start);
				$str_start=$date_start.'T'.$hours_start;

				$str_finish_pausetime="finish_pause$stringindex";
				$str_finish_pausetime_hidden="finish_pause_hidden$stringindex";
				if ($numrow[4]!="")
				{
				$finish=strtotime($numrow[4]);
				$date_finish=date('Y-m-d',$finish);
				$hours_finish=date('H:i',$finish);
				$str_finish=$date_finish.'T'.$hours_finish;
				}
				else
				$str_finish="";
									?>
				<tr>
					 <td  style="border: solid 1px;">
					 	<input type="datetime-local" id="khungtext" name="<?php echo $str_start_pausetime;?>" class="date" value="<?php echo $str_start;?>"  ></input>
					 </td>
					 <td style="border: solid 1px;">
					 	<input type="datetime-local" id="khungtext" name="<?php echo $str_finish_pausetime;?>" class="date" value="<?php echo $str_finish;?>" ></input>
					 </td>
					 <td  style="border: solid 1px;display: none;">
					 	<input type="datetime-local" name="<?php echo $str_start_pausetime_hidden;?>" class="date" value="<?php echo $str_start;?>" ></input>
					 </td>
					 <td style="border: solid 1px;display: none;">
					 	<input type="datetime-local" name="<?php echo $str_finish_pausetime_hidden;?>"  class="date" value="<?php echo $str_finish;?>" ></input>
					 </td>
			<td style="border: solid 1px;">
					 	<input type="button" onclick='Delete("<?php echo $numrow[3]; ?>","<?php echo $numrow[4]; ?>",4)' name="delete_pause" id="delete_pause" value="Delete"></td>
				</tr>

				<?php
				$index+=1;
			}
			?>
				<?php
			}

?>



			<td><input type="button" name="pause_" id="pause_" value="Verify Pause"></td>
			<td></td>
			<td></td>
		</table>
	</div>



</div>
<br>
<br>
</fieldset>

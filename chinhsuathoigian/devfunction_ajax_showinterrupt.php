<?php
include "../connection.php";
?>


<?php
		$mskhungtu=$_POST['mskhungtu'];
		$msnv=$_POST['msnv'];
		$msgd=$_POST['msgd'];
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

					$str_finish_interrupt="finish_interrupt$stringindex";
					$str_finish_interrupt_hidden="finish_interrupt_hidden$stringindex";

					$temp_start_interrupt=$_POST["$str_start_interrupt"];
					$temp_start_interrupt_hidden=$_POST["$str_start_interrupt_hidden"];

					$temp_finish_interrupt=$_POST["$str_finish_interrupt"];
					$temp_finish_interrupt_hidden=$_POST["$str_finish_interrupt_hidden"];

					if ($temp_finish_interrupt != $temp_finish_interrupt_hidden)
         			   mysql_query("UPDATE chuyenviec SET date_finish='$temp_finish_interrupt' where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and date_start='$temp_start_interrupt_hidden' ");
					if ($temp_start_interrupt != $temp_start_interrupt_hidden)
         			   mysql_query("UPDATE chuyenviec SET date_start='$temp_start_interrupt' where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and date_start='$temp_start_interrupt_hidden' ");
         			$index+=1;
         				}
         		}

?>


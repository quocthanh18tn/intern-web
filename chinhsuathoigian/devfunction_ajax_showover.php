<?php
include "../connection.php";
?>


<?php
		$mskhungtu=$_POST['mskhungtu'];
		$msnv=$_POST['msnv'];
		$msgd=$_POST['msgd'];
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

					$str_finish_overtime="finish_overtime$stringindex";
					$str_finish_overtime_hidden="finish_overtime_hidden$stringindex";

					$temp_start_overtime=$_POST["$str_start_overtime"];
					$temp_start_overtime_hidden=$_POST["$str_start_overtime_hidden"];

					$temp_finish_overtime=$_POST["$str_finish_overtime"];
					$temp_finish_overtime_hidden=$_POST["$str_finish_overtime_hidden"];

					if ($temp_finish_overtime != $temp_finish_overtime_hidden)
         			   mysql_query("UPDATE tangca SET date_finish='$temp_finish_overtime' where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and date_start='$temp_start_overtime_hidden' ");
					if ($temp_start_overtime != $temp_start_overtime_hidden)
         			   mysql_query("UPDATE tangca SET date_start='$temp_start_overtime' where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and date_start='$temp_start_overtime_hidden' ");
         			$index+=1;

         				}
         		}

?>


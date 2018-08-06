<?php
include "../connection.php";
?>


<?php
		$mskhungtu=$_POST['mskhungtu'];
		$msnv=$_POST['msnv'];
		$msgd=$_POST['msgd'];
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

					$str_finish_main="finish_main$stringindex";
					$str_finish_main_hidden="finish_main_hidden$stringindex";

					$temp_start_main=$_POST["$str_start_main"];
					$temp_start_main_hidden=$_POST["$str_start_main_hidden"];

					$temp_finish_main=$_POST["$str_finish_main"];
					$temp_finish_main_hidden=$_POST["$str_finish_main_hidden"];

					echo "$temp_finish_main_hidden va $temp_finish_main <br>";
					if ($temp_start_main != $temp_start_main_hidden)
         			   mysql_query("UPDATE qtsx SET date_start='$temp_start_main' where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' ");
					if ($temp_finish_main != $temp_finish_main_hidden)
         			   mysql_query("UPDATE qtsx SET date_finish='$temp_finish_main' where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' ");
         			$index+=1;
         				}
         		}

?>


<?php
include "../connection.php";
?>


<?php
		$mskhungtu=$_POST['mskhungtu'];
		$msnv=$_POST['msnv'];
		$msgd=$_POST['msgd'];
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

				$str_finish_pausetime="finish_pause$stringindex";
				$str_finish_pausetime_hidden="finish_pause_hidden$stringindex";

				$temp_start_pausetime=$_POST["$str_start_pausetime"];
				$temp_start_pausetime_hidden=$_POST["$str_start_pausetime_hidden"];

					$temp_finish_pausetime=$_POST["$str_finish_pausetime"];
					$temp_finish_pausetime_hidden=$_POST["$str_finish_pausetime_hidden"];

					if ($temp_finish_pausetime != $temp_finish_pausetime_hidden)
         			   mysql_query("UPDATE tamdung SET tieptuc='$temp_finish_pausetime' where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and tamdung='$temp_start_pausetime_hidden' ");
					if ($temp_start_pausetime != $temp_start_pausetime_hidden)
         			   mysql_query("UPDATE tamdung SET tamdung='$temp_start_pausetime' where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and tamdung='$temp_start_pausetime_hidden' ");
         			$index+=1;
         				}
         			}
         			?>
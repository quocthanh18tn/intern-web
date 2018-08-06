<?php
include "../connection.php";
?>

<?php
		$mskhungtu=$_POST['mskhungtu'];
		$msnv=$_POST['msnv'];
		$msgd=$_POST['msgd'];
		$start=$_POST['start'];
		$finish=$_POST['finish'];
		$stt=$_POST['stt'];
		switch ($stt) {
			case '4':
				mysql_query("DELETE from tamdung where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and tamdung='$start' ");
				break;
			case '3':
				mysql_query("DELETE from chuyenviec where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and date_start='$start'  ");
				break;
			case '2':
				mysql_query("DELETE from tangca where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and date_start='$start'  ");
				break;
			case '1':
				mysql_query("DELETE from qtsx where mskhungtu='$mskhungtu' and msnv='$msnv' and msgd='$msgd' and date_start='$start'  ");
				break;

			default:
				# code...
				break;
		}

?>
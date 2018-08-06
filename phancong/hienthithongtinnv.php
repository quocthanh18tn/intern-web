<?php
include "../connection.php";
?>
<?php
$msnv =$_POST['msnv'];
if ($msnv!="")
{
	$sql = mysql_query("SELECT * FROM nhanvien WHERE msnv = '$msnv'");
	$numrow = mysql_num_rows($sql);
	if ($numrow==1) 
		{
			$tt = mysql_fetch_array($sql);
			$msnv = $tt['msnv'];
			$ten = $tt['hoten'];
			$sub_dep = $tt['subdep'];
			echo "Id: $msnv, Name: $ten, SubDep: $sub_dep";
		}
}
?>
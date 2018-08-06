<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:main_login_tong.php");
}

?>

<?php
include "../connection.php";
?>

<style type="text/css">
	.column1{
		font-weight: bold;
		font-size: 17px;
		background-color: #A0A0A0;
		border-radius: 6px;
		width: 200px;
		height: 40px;
		text-align: center;
	}
</style>

					<table class="table table-bordered ">
							<thead>
							<tr>
				                <th width="auto">
				                <input type="text"  class="  form-control" value="Pannel ID" readonly  style="font-weight: bold;
												font-size: 17px;
												background-color: #A0A0A0;
												border-radius: 12px;
												height: 50px;
												width: 180px;
												text-align: center;">
				                </input></th>
				                <th width="auto">
				                <input type="text"  class=" form-control" value=" Name" readonly size ="auto" style="font-weight: bold;
															font-size: 17px;
															background-color: #A0A0A0;
															border-radius: 12px;
															height: 50px;
															width: 400px;
															text-align: center;">
				                </th>
				                <th width="auto">
				                <input type="text"  class=" form-control" value="Number of Column " readonly size ="auto" style="font-weight: bold;
												font-size: 17px;
												background-color: #A0A0A0;
												border-radius: 12px;
												height: 50px;
												width: 180px;
												text-align: center;"></th>
				                <th width="auto"><input  type="text"  class=" form-control" value="Fat" readonly size ="auto" style="font-weight: bold;
												font-size: 17px;
												background-color: #A0A0A0;
												border-radius: 12px;
												width: 180px;
												height: 50px;
												text-align: center;"></th>
				                <th width="auto"><input  type="text" class=" form-control" value="Delivery" readonly size ="auto" style="font-weight: bold;
												font-size: 17px;
												width: 180px;

												background-color :#A0A0A0;
												border-radius: 12px;
												height: 50px;
												text-align: center;"></th>
			              	</tr>
			              	</thead>

			              	<tbody>
			              		<?php
			              			$msduan=$_POST['msduan'];
			              			$sdt=$_POST['sdt'];
			              			$order=$_POST['order'];
			              			$sqlkh="SELECT * FROM khachhang where sdt = '$sdt'";
			              			$querykh=mysql_query($sqlkh);
			              			$rowkh=mysql_fetch_array($querykh);
			              			$mskh=$rowkh['mskh'];
			              			$prefixmstu=$msduan.$mskh.$order;
			              			$sqltu="SELECT * FROM tu where mstu like '$prefixmstu%' and fatdukien is null ";
			              			$querytu=mysql_query($sqltu);
			              			$numrow_tu=mysql_num_rows($querytu);
			              			$indexnumber=1;

			              			while ($rowtu=mysql_fetch_array($querytu))
			              			 {	$indexstring=(string)$indexnumber;
			              			 	$mstustring="mstu$indexstring";

			              			 	$numbercolumnstring="numbercolumn$indexstring";

			              			 	$fatstring="fat$indexstring";

			              			 	$deliverystring="delivery$indexstring";

			              				?>
			              				<tr>
			              				<td>
			              					<input type="text" name="<?php echo $mstustring; ?>" readonly value="<?php echo $rowtu['mstu'];?>" class=" form-control" value="Fat" readonly size ="auto" style="font-weight: bold;
												font-size: 15px;
												background-color: white;
												border-radius: 12px;
												height: 50px;
												width: 180px;
												color: black;
												text-align: center;">
			              					</input>
			              				</td>
			              				<td>
			              					<input type="text" name="<?php echo $rowtu['tentu']; ?>" readonly value="<?php echo $rowtu['tentu'];?>"
			              					style="font-weight: bold;
												font-size: 15px;
												background-color: white;
												border-radius: 12px;
												height: 50px;
												width: 400px;
												text-align: center;">
			              					</input>
			              				</td>
			              				<td>
			              					<input type="text"  name="<?php echo $numbercolumnstring;?>" placeholder="enter number" style="
												font-size: 15px;
												border-radius: 12px;
												height: 50px;
												text-align: center;">
			              					</input>
			              				</td>
			              				<td>
			              					<input type="date" name="<?php echo $fatstring;?>" style="
												font-size: 15px;
												width: 180px;

												background-color: white;
												border-radius: 12px;
												height: 50px;
												text-align: center;">
			              					</input>
			              				</td>
			              				<td>
			              				<input type="date" name= "<?php echo $deliverystring;?>" style="
												font-size: 15px;
												width: 180px;

												background-color: white;
												border-radius: 12px;
												height: 50px;
												text-align: center;">
			              				</td>
			              				<tr>
			              				<?php
			              			$indexnumber++;
			              			}

			              			//echo $prefixmstu;

			              		?>


			              	</tbody>

			              </table>
			              <input class="d-none" type="text" name='numrow_tu' value="<?php echo $numrow_tu ?>">
                <button name="button1" type="submit" class="btn btn-lg btn-primary" style="margin-left: 1150px;margin-bottom: 50px;margin-top: 10px;width: 150px;height: 50px;"> Create</button>

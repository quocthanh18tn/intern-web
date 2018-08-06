<?php
session_start();
if(!(isset($_SESSION['id_tong']))){
header("location:../main_login_tong.php");
}
?>
<?php
include "../../connection.php";
?>


 			<lable for = "text10" class="word">Update Subdep: </label>
                     <select class="text8" name="text10" >
                           <option value="" >SELECT ...</option>
                    <?php
                    		$dep=$_POST['dep'];
                    		$sql=mysql_query("SELECT DISTINCT subdep FROM nhanvien where dep='$dep'");
                    		while ($row_subdep=mysql_fetch_array($sql))
                    		{
                    			?>
                    		<option value="<?php echo $row_subdep['subdep'];?>"><?php echo $row_subdep['subdep'] ?></option>
                    		<?php
                    		}


                     ?>



                         </select>


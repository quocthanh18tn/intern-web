<?php
include "../connection.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <script type="text/javascript">
    function showcolumn(a)
    {
        var mskhungtu =a;
                $(document).ready(function(){
            $.post("theodoi3_theodoitu.php", {mskhungtu: mskhungtu}, function(data){$('#dynamic_column').html(data);})

        })
    }
    </script>

    <style type="text/css">
form {
    font-family: helvetica;
    margin-left: 20px;
    margin-right: 20px;
    margin-top: 20px
}
form div{
   margin-bottom: 25px ;
}


form table{font-weight:bold;font-size: 17px}
form input{
    font-weight: bold;

}

                      .text5 {
            height: 42px;
            width: 500px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }.text2 {
            height: 42px;
            width: 500px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

    </style>




<body>
    <div id="hieuung">
            <?php
            	if ($_POST['dongy']==1)
            	{
            ?>
                    <!-- lat sua  -->


                    <!-- lat sua  -->
            		<table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th  ><input type="text" class="text5" value="COLUMN ID"></input></th>
                                <th  ><input type="text" class="text2" value="STATUS"></input></th>


                            </tr>
                            </thead>
                            <tbody>
            <?php
            $mstu=$_POST['mstu'];
            		$khungtu = mysql_query("SELECT * FROM khungtu WHERE mstu = '$mstu'");
            		if ($khungtu!=0)
            			while ($row_khungtu = mysql_fetch_array($khungtu))
            			{
            				$qtsx=mysql_query("SELECT * FROM qtsx WHERE mskhungtu = '$row_khungtu[0]'");
                            // SE XOA
                            //
            				if(mysql_num_rows($qtsx)==7)
            					{
            						$dem =0;
            						while ($row_qtsx=mysql_fetch_array($qtsx))
            						{
            							if ($row_qtsx[4]!="") $dem+=1;
            						}
            						if ($dem == 7) {$trangthai="COMPLETE";$color ="#99CCCC";}//số giai đoạn bằng 7
            						else {$trangthai="NOT COMPLETE";$color ="#FFFF99";}
            					}
            				else
            				    {
            				  	    $flag = array(0,0,0,0,0,0,0,0);//$flag[i] là trạng thái được phân công hay chưa của giai đoạn i
            				  	    while ($row_qtsx=mysql_fetch_array($qtsx))
            				  	    {
            				  	    	for ($j=1; $j <8 ; $j++)
            				  	    	{
            				  	    		if ($row_qtsx[2]==$j) $flag[$j] = 1;
            				  	    	}
            				  	    }
            				  	    $trangthai = "NOT ASSIGN:";
            				  	    for ($j=1; $j <8 ; $j++)
            				  	    {
            				  	    	if ($flag[$j] == 0) $trangthai = "$trangthai $j,";
            				  	    }
            				  	    $color ="white";
            				    }
            ?>
            				<tr>
                            <td  >
                                <input type="text" class="text5" readonly="" id="click" value='<?php echo "$row_khungtu[0]";?>'  style="background-color: <?php echo $color ?>"  onclick="showcolumn('<?php echo $row_khungtu[0]; ?>')">

                            </td>
                            <td  >
                                <input type="text" class="text2" readonly="" value='<?php echo "$trangthai";?>' style="background-color: <?php echo $color ?>">

                            </td>
            				</tr>
            <?php
            			}

            	}
            ?>
            				</tbody>
            		</table>
        </div>

    </form>
    </body>
</body>

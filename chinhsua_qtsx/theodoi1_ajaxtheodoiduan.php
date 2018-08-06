<?php
include "../connection.php";
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
 <script type="text/javascript">
    function show(a,b,c)
    {   
    	var dongy=1;
        var b="#"+b;
        var xoa =c;
                $(document).ready(function(){
            if(xoa ==0)
            {
            $.post("theodoi2_theodoitu.php", {mstu: a,dongy:dongy}, function(data){$(b).html(data);})
            }
            else  $.post("theodoi2_theodoitu.php", {mstu: a,dongy:0}, function(data){$(b).html(data);})

        })
    }
    </script>
</head>
<body>





                <br>
            <?php
            	if ($_POST['dongy']==1)
            	{
                        $temp=$_POST['monitor'];
                        $sql="SELECT * from duan WHERE msduan='$temp'";
                        $query=mysql_query($sql);
                        $num=mysql_num_rows($query);
                        if ($num !=0)
                            {
            ?>
            		<table class="table table-stripedauto">
                            <thead>
                            <tr>
                                <th width="auto" ><input type="text" class="text2" value="PANEL ID" style="background-color: "></input></th>
                                <th width="auto"><input type="text" class="text2" value="STATUS"></input></th>
                                <th width="auto" ><strong></strong></th>

                            </tr>
                            </thead>
                            <tbody>
            <?php
                            $tu = mysql_query("SELECT * FROM tu WHERE msduan = '$temp'");
                            if($tu!=0)
                            {   $indextemp=1;
                                $tu_num_row = mysql_num_rows($tu);
                                $tu_num_row_complete = 0;
                                while ($tu_row = mysql_fetch_array($tu))
                                {
                                    $index=(string)$indextemp;
                                    $show="show$index";
                                    $mstu="mstu$index";
                                    $display="display$index";
                                    $khungtu = mysql_query("SELECT * FROM khungtu WHERE mstu = '$tu_row[0]'");
                                    $khungtu_num_row = mysql_num_rows($khungtu); // total column
                                    $dem_khungtu =0;
                                    while ($khungtu_row=mysql_fetch_array($khungtu))
                                        {
                                            $qtsx = mysql_query("SELECT * FROM qtsx WHERE mskhungtu = $khungtu_row[0]");
                                            $dem_qtsx =0;
                                            while ($qtsx_row = mysql_fetch_array($qtsx))
                                            {
                                                if ($qtsx_row[4]!="") $dem_qtsx+=1;
                                            }
                                            if ($dem_qtsx == 7) $dem_khungtu+=1;//số giai đoạn bằng 7
                                        }
                                        $indextemp+=1;
                                    if ($dem_khungtu == $khungtu_num_row) {$trangthai = "COMLETE";$color ="#99CCCC";$tu_num_row_complete+=1;}
                                    else {$trangthai = "IN PROGRESS";$color ="#FFFF99";};
            ?>

                                    <tr>
                                    <td ><input type="text" class="text3" value="<?php echo $tu_row[0];?>" id="<?php echo $mstu ?>" style="background-color:<?php echo $color ?>"></td>
                                    <td ><input type="text" class="text3" value="<?php echo $trangthai;?>" style="background-color:<?php echo $color ?>"></td>
                                    <td ><input type="button" class="btn btn-default" onclick="show('<?php echo $tu_row[0]?>','<?php echo $display?>',0)"  id= "<?php echo $show;  ?>" value="Show">
                                        <input type="button" class="btn btn-default" onclick="show('<?php echo $tu_row[0]?>','<?php echo $display?>',1)"   value="Clear">

                                    </td>
                                    </tr>
                                    <tr >
                                        <td colspan="2" id="<?php echo $display ?>"> </td>
                                    </tr>


            <?php
                                }


                            }
                            }
                            else
                                    echo '<script>alert("Project ID is not existed")</script>';

                        }

            ?>
                            </tbody>
                    </table>

                    <script type="text/javascript">var tu_num_row = <?php echo "$tu_num_row";?></script>
                    <?php if (isset($_POST['dongy']) && $num!=0) {
                        ?>
                        <h4><strong>TOTAL NUMBER OF PANEL: <?php echo $tu_num_row; ?></strong></h4>
                        <h4><strong>TOTAL NUMBER OF COMPLETE PANEL: <?php echo $tu_num_row_complete ?> </strong></h4>
                    <?php } ?>
        </div>
</body>
</html>

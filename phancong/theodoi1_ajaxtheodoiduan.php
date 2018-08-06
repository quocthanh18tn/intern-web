<?php
include "../connection.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
 <script type="text/javascript">
var xoa=1;
    function show(a,b)
    {
    	var dongy=1;
        var b="#"+b;
        // var xoa =c;
        if (xoa==0)
            xoa=1;
        else xoa=0;

                $(document).ready(function(){
            if(xoa ==0)
            {
            $.post("theodoi2_theodoitu.php", {mstu: a,dongy:dongy}, function(data){$(b).html(data);})
            }
            else  $.post("theodoi2_theodoitu.php", {mstu: a,dongy:0}, function(data){$(b).html(data);})



        })
    }
    </script>
    <style type="text/css">
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
    <div class="w3-animate-opacity">





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
                                <th width="auto" ><input type="text" class="text5" value="PANEL ID" ></input></th>
                                <th width="auto"><input type="text" class="text2" value="STATUS"></input></th>

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
                                    else {$trangthai = "NOT COMLETE";$color ="#FFFF99";};
            ?>

                                    <tr>
                                    <td ><input type="text" class="text5" value="<?php echo $tu_row[0];?>" id="click" readonly="" style="background-color:<?php echo $color ?>"  onclick="show('<?php echo $tu_row[0]?>','<?php echo $display?>')"></td>
                                    <td ><input type="text" class="text2" value="<?php echo $trangthai;?>" readonly="" style="background-color:<?php echo $color ?>"></td>

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
        </div>
</body>

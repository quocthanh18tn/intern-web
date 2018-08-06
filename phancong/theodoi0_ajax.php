
<?php
include "../connection.php";
?>
<style type="text/css">
    #click{
        color: red;
        text-decoration: underline;
        /*cursor: crosshair;*/
        cursor: pointer;
    }
    #click:hover{
        color: blue;
    }
</style>
     <script type="text/javascript">
    function showproject(a)
    {
        var monitor =a;
        var dongy=1;
                $(document).ready(function(){
            $.post("theodoi1_ajaxtheodoiduan.php", {monitor: monitor,dongy: dongy}, function(data){$('#dynamic_panel').html(data);})
        })
    }
    </script>
</head>
<body>
    <div class="w3-animate-top">

<?php
    $duan=$_POST['duan'];
    $tenkh=$_POST['tenkh'];
    $start=$_POST['start'];
    $finish=$_POST['finish'];
    if ($duan !='')
    {

        ?>

        <table class="w3-table-all">
            <tr>
                <th>Project ID</th>
                <th>Project Name</th>
                <th>Customer</th>
                <th>Code</th>
                <th>Address</th>
                <th>Phone</th>
            </tr>
        <?php
            $sql="SELECT * FROM duan where msduan like '%$duan%' OR tenduan like '%$duan%'";
            $query=mysql_query($sql);
            $rowduan=mysql_fetch_array($query);
            $msduan=$rowduan['msduan'];
            $tenduan=$rowduan['tenduan'];
            $sqlkh="SELECT * FROM donhang where msduan='$msduan'";
            $querykh=mysql_query($sqlkh);
               while( $rowkh=mysql_fetch_array($querykh))
               {
                    $sdt=$rowkh['sdt'];
                    $sqlkh="SELECT * FROM khachhang where sdt='$sdt'";
                    $querykh=mysql_query($sqlkh);
                       //tat ca thong tin ve kh
                    while ($rowkh=mysql_fetch_array($querykh))
                    {
                        ?>
                        <tr>
                            <td  id="click" onclick="showproject('<?php echo $msduan; ?>')"><?php echo $msduan ?></td>
                            <td><?php echo $tenduan ?></td>
                            <td><?php echo $rowkh['tenkh'] ?></td>
                            <td><?php echo $rowkh['mskh'] ?></td>
                            <td><?php echo $rowkh['diachi'] ?></td>
                            <td><?php echo $rowkh['sdt'] ?></td>
                        </tr>
                    <?php
               }
    }
    ?>
        </table>
        <?php
}
    else if ($tenkh !='')
    {
            ?>

        <table class="w3-table-all">
            <tr>
                <th>Customer</th>
                <th>Code</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Project ID</th>
                <th>Project Name</th>
            </tr>
        <?php
            $sql="SELECT * FROM khachhang where tenkh like '%$tenkh%' OR mskh like '%$tenkh%' OR sdt like '%$tenkh%'";
            $query=mysql_query($sql);
            $rowkh=mysql_fetch_array($query);
            $sdt=$rowkh['sdt'];
            $tenkh=$rowkh['tenkh'];
            $diachi=$rowkh['diachi'];
            $mskh=$rowkh['mskh'];
            $sqldonhang="SELECT * FROM donhang where sdt='$sdt'";
            $querydonhang=mysql_query($sqldonhang);
               while( $rowdonhang=mysql_fetch_array($querydonhang))
               {
                    $msduan=$rowdonhang['msduan'];
                    $sqlduan="SELECT * FROM duan where msduan='$msduan'";
                    $queryduan=mysql_query($sqlduan);
                       //tat ca thong tin ve kh
                    while ($rowduan=mysql_fetch_array($queryduan))
                    {

                        ?>
                        <tr>
                            <td><?php echo $tenkh ?></td>
                            <td><?php echo $mskh ?></td>
                            <td><?php echo $diachi ?></td>
                            <td><?php echo $sdt ?></td>
                            <td id="click" onclick="showproject('<?php echo $rowduan['msduan']; ?>')"><?php echo $rowduan['msduan'] ?></td>
                            <td><?php echo $rowduan['tenduan'] ?></td>
                        </tr>
                    <?php
               }
    }
    ?>
        </table>
        <?php
    }
     else if ($start !='' and $finish !='')
    {
        ?>

           <table class="w3-table-all">
            <tr>
                <th>Customer </th>
                <th>Code</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Project ID</th>
                <th>Project Name</th>
            </tr>
        <?php
            $sql="SELECT * FROM donhang where timedate between '$start' and '$finish'";
            $query=mysql_query($sql);
            while($row=mysql_fetch_array($query))
            {
                $msduan=$row['msduan'];
                $timedate=$row['timedate'];
                $sqlduan="SELECT * FROM duan where msduan='$msduan'";
                $queryduan=mysql_query($sqlduan);
               while( $rowduan=mysql_fetch_array($queryduan))
               {
                $tenduan=$rowduan['tenduan'];
                $msduan=$rowduan['msduan'];
                $sqldonhang="SELECT * FROM donhang where msduan='$msduan' and timedate='$timedate'";
                $querydonhang=mysql_query($sqldonhang);
                while( $rowdonhang=mysql_fetch_array($querydonhang))
                    {
                        $sdt=$rowdonhang['sdt'];
                        $sqlkh="SELECT * FROM khachhang where sdt='$sdt'";
                        $querykh=mysql_query($sqlkh);
                        while ( $rowkh=mysql_fetch_array($querykh))
                        {
                         ?>
                        <tr>
                            <td id="click" onclick="showproject('<?php echo $msduan; ?>')"><?php echo $msduan ?></td>
                            <td><?php echo $tenduan ?></td>
                            <td><?php echo $rowkh['tenkh'] ?></td>
                            <td><?php echo $rowkh['mskh'] ?></td>
                            <td><?php echo $rowkh['diachi'] ?></td>
                            <td><?php echo $rowkh['sdt'] ?></td>
                        </tr>
                    <?php
               }
    }
}
}
    ?>
        </table>
        <?php
    }
    else
        echo "xin moi nhap du lieu";
 ?>
 </div>
        <div id="dynamic_panel" ></div>

 </body>
 </html>
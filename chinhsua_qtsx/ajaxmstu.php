<?php
session_start();
if(!(isset($_SESSION['quanly_gdtong'])))
{
header("location:main_login_phancong.php");
}
?>
<?php
include "../connection.php";
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
      <script  type="text/javascript">

$(document).ready(function(){

    $("#mstu").change(function(){
    var mstu = $("#mstu").val();
    $.post("ajaxmskhungtu.php", {id: mstu}, function(data){$("#mskhungtu").html(data);})
  })
 $("#mskhungtu").change(function(){
    var mskhungtu = $("#mskhungtu").val();
    var dongy="1";
    $.post("theodoikhungtu.php", {mskhungtu: mskhungtu,dongy:dongy}, function(data){$("#display").html(data);})
    document.getElementById("phancong").innerHTML="";
  })

  $("#capnhat").click(function(){
      var msquanly =<?php echo $_SESSION['quanly_gdtong'] ?>;
      if (msquanly!=2)
      {
          switch(msquanly)
          {
            case 21:
              var i=1;
              break;
            case 22:
              var i=2;
              break;
            case 23:
              var i=3;
              break;
            case 24:
              var i=4;
              break;
            case 25:
              var i=5;
              break;
            case 26:
              var i=6;
              break;
            case 27:
              var i=7;
              break;
          }
          var mskhungtu = $('#mskhungtu').val();
          var idnv="#nv"+i;
          var msnv = $(idnv).val();
          var msgd =i;
          var dongy="0";
          var capnhat="1";
          if(msnv!="")
          {
            $.post("xulyphancongcongviec.php",{mskhungtu: mskhungtu, msnv:msnv,msgd:msgd,dongy:dongy, capnhat:capnhat},function(data){$("#phancong").html(data);})
          }
      }
      else
      {
       var mskhungtu = $('#mskhungtu').val();
       var dongy="0";
       var capnhat="1";
       var msgd =[];
       var msnv =[];
       var start=[];
       var end = [];
       var expect=[];
       for (var i =1;i<=7;i++)
        {
          var idnv="#nv"+i;
          msnv[i]=$(idnv).val();
          msgd[i]=i;
          var idstart="#start"+i;
          var idend="#end"+i;
          var idexpect="#expect"+i;
          start[i]=$(idstart).val();
          end[i]=$(idend).val();
          expect[i]=$(idexpect).val();

        }
      $.post("xulyphancongcongviec.php",{
        mskhungtu: mskhungtu, msnv1:msnv[1],msnv2:msnv[2],msnv3:msnv[3],msnv4:msnv[4],msnv5:msnv[5],msnv6:msnv[6],msnv7:msnv[7],msgd1:msgd[1],msgd2:msgd[2],msgd3:msgd[3],msgd4:msgd[4],msgd5:msgd[5],msgd6:msgd[6],msgd7:msgd[7],
        start1:start[1],start2:start[2],start3:start[3],start4:start[4],start5:start[5],start6:start[6],start7:start[7],
        end1:end[1],end2:end[2],end3:end[3],end4:end[4],end5:end[5],end6:end[6],end7:end[7],
        expect1:expect[1],expect2:expect[2],expect3:expect[3],expect4:expect[4],expect5:expect[5],expect6:expect[6],expect7:expect[7],
        dongy:dongy, capnhat:capnhat
      },function(data){$("#phancong").html(data);})
      document.getElementById("display").innerHTML="";
      setTimeout(function(){
       var dongy="1";
    $.post("theodoikhungtu.php", {mskhungtu: mskhungtu,dongy:dongy}, function(data){$("#display").html(data);})
      },500);



      }
      })
})
</script>


</head>
<body>
                      <?php
                        if ($_POST['dongy']==1)
                        {
                          $msduan=$_POST['project'];
                      ?>
                      <br>
                      <lable for = "text1" class="word"> Panel ID: </label>
						<select id ="mstu" class ="text2">
				            <option value="" >Select ...</option>

								<?php
								$sql= "select * from tu where msduan='$msduan'";
								$query = mysql_query($sql);
								$num = mysql_num_rows($query);
								if ($num>0)
								{
 					             while($row = mysql_fetch_array($query))
              						{
  								?>
            					<option value="<?php echo $row['mstu']?>"><?php echo "$row[mstu]: $row[tentu]"?></option>
           					 	<?php
}
}
}

            ?>
</select>
  <div>
  <br>
                      <lable for = "text1" class="word"> Column ID: </label>
    <select id="mskhungtu" class = "text3">
        <option value ="">Select...</option>
    </select>
  </div>

<div id="display"></div>

 <div id="phancong"></div>

 <fieldset>
            <div><h2>ASSIGN TASK</h2></div>
        <?php
                switch ($_SESSION['quanly_gdtong'])
                {
                  case 2:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 1:EA" readonly></input></div>

                <div style="width: 20%; float:left;"><input type = "text" name ="nv1" placeholder="ID Employee" id = "nv1" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="start1" id = "start1" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="end1" id = "end1" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "number" name ="expect1" id = "expect1" placeholder="expected minute" class="form-control"></input></div>

            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 2:MC" readonly></input></div>

                <div style="width: 20%; float:left;"><input type = "text" name ="nv2" placeholder="ID Employee" id = "nv2" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="start2" id = "start2" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="end2" id = "end2" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "number" name ="expect2" id = "expect2" placeholder="expected minute" class="form-control"></input></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 3:BUSBAR" readonly></input></div>

                <div style="width: 20%; float:left;"><input type = "text" name ="nv3" placeholder="ID Employee" id = "nv3" class="form-control"></input></div>
                 <div style="width: 20%; float:left;"><input type = "datetime-local" name ="start3" id = "start3" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="end3" id = "end3" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "number" name ="expect3" id = "expect3" placeholder="expected minute" class="form-control"></input></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 4:PC" readonly></input></div>

                <div style="width: 20%; float:left;"><input type = "text" name ="nv4" placeholder="ID Employee" id = "nv4" class="form-control"></input></div>
                 <div style="width: 20%; float:left;"><input type = "datetime-local" name ="start4" id = "start4" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="end4" id = "end4" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "number" name ="expect4" id = "expect4" placeholder="expected minute" class="form-control"></input></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 5:CW" readonly></input></div>

                <div style="width: 20%; float:left;"><input type = "text" name ="nv5" placeholder="ID Employee" id = "nv5" class="form-control"></input></div> <div style="width: 20%; float:left;"><input type = "datetime-local" name ="start5" id = "start5" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="end5" id = "end5" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "number" name ="expect5" id = "expect5" placeholder="expected minute" class="form-control"></input></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 6:TW" readonly></input></div>

                <div style="width: 20%; float:left;"><input type = "text" name ="nv6" placeholder="ID Employee" id = "nv6" class="form-control"></input></div> <div style="width: 20%; float:left;"><input type = "datetime-local" name ="start6" id = "start6" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="end6" id = "end6" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "number" name ="expect6" id = "expect6" placeholder="expected minute" class="form-control"></input></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 7:QC" readonly></input></div>

                <div style="width: 20%; float:left;"><input type = "text" name ="nv7" placeholder="ID Employee" id = "nv7" class="form-control"></input></div> <div style="width: 20%; float:left;"><input type = "datetime-local" name ="start7" id = "start7" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "datetime-local" name ="end7" id = "end7" class="form-control"></input></div>
                <div style="width: 20%; float:left;"><input type = "number" name ="expect7" id = "expect7" placeholder="expected minute" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 21:

        ?>
            <div>
                <div style="width: 40%; float:left;"><input type="text" class="form-control" value="TASK 1:EA" readonly></input></div>

                <div style="width: 60%; float:left;"><input type = "text" name ="nv1" placeholder="ID Employee" id = "nv1" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 22:
        ?>
            <div>
                <div style="width: 40%; float:left;"><input type="text" class="form-control" value="TASK 2:MC" readonly></input></div>

                <div style="width: 60%; float:left;"><input type = "text" name ="nv2" placeholder="ID Employee" id = "nv2" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 23:
        ?>
            <div>
                <div style="width: 40%; float:left;"><input type="text" class="form-control" value="TASK 3:BUSBAR" readonly></input></div>

                <div style="width: 60%; float:left;"><input type = "text" name ="nv3" placeholder="ID Employee" id = "nv3" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 24:
        ?>
            <div>
                <div style="width: 40%; float:left;"><input type="text" class="form-control" value="TASK 4:PC" readonly></input></div>

                <div style="width: 60%; float:left;"><input type = "text" name ="nv4" placeholder="ID Employee" id = "nv4" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 25:
        ?>
            <div>
                <div style="width: 40%; float:left;"><input type="text" class="form-control" value="TASK 5:CW" readonly></input></div>

                <div style="width: 60%; float:left;"><input type = "text" name ="nv5" placeholder="ID Employee" id = "nv5" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 26:
        ?>
            <div>
                <div style="width: 40%; float:left;"><input type="text" class="form-control" value="TASK 6:TW" readonly></input></div>

                <div style="width: 60%; float:left;"><input type = "text" name ="nv6" placeholder="ID Employee" id = "nv6" class="form-control"></input></div>
            </div>
        <?php
                    break;
                    case 27:
        ?>
            <div>
                <div style="width: 40%; float:left;"><input type="text" class="form-control" value="TASK 7:QC" readonly></input></div>

                <div style="width: 60%; float:left;"><input type = "text" name ="nv7" placeholder="ID Employee" id = "nv7" class="form-control"></input></div>
            </div>
        <?php
                    break;
                }
        ?>
        </fieldset>
        <br>
        <div>
                <div style="width: 7%; float:left;"><input type="button" onmousedown= name="capnhat" id="capnhat" value="UPDATE" class="btn btn-primary"></div>
        </div>
</body>
</html>
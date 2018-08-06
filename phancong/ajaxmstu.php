<?php
session_start();
if(!(isset($_SESSION['quanly'])))
{
header("location:main_login_phancong.php");
}
?>
<?php
include "../connection.php";
?>
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
 $("#nv1").keyup(function(){
    var msnv = $("#nv1").val();
    $.post("hienthithongtinnv.php", {msnv:msnv}, function(data){$("#hienthi1").html(data);})
 })
 $("#nv2").keyup(function(){
    var msnv = $("#nv2").val();
    $.post("hienthithongtinnv.php", {msnv:msnv}, function(data){$("#hienthi2").html(data);})
 })
 $("#nv3").keyup(function(){
    var msnv = $("#nv3").val();
    $.post("hienthithongtinnv.php", {msnv:msnv}, function(data){$("#hienthi3").html(data);})
 })
 $("#nv4").keyup(function(){
    var msnv = $("#nv4").val();
    $.post("hienthithongtinnv.php", {msnv:msnv}, function(data){$("#hienthi4").html(data);})
 })
 $("#nv5").keyup(function(){
    var msnv = $("#nv5").val();
    $.post("hienthithongtinnv.php", {msnv:msnv}, function(data){$("#hienthi5").html(data);})
 })
 $("#nv6").keyup(function(){
    var msnv = $("#nv6").val();
    $.post("hienthithongtinnv.php", {msnv:msnv}, function(data){$("#hienthi6").html(data);})
 })
 $("#nv7").keyup(function(){
    var msnv = $("#nv7").val();
    $.post("hienthithongtinnv.php", {msnv:msnv}, function(data){$("#hienthi7").html(data);})
 })
 $("#clear").click(function(){
    $("#nv1").val("");
    $("#nv2").val("");
    $("#nv3").val("");
    $("#nv4").val("");
    $("#nv5").val("");
    $("#nv6").val("");
    $("#nv7").val("");
    $("#dk1").val("");
    $("#dk2").val("");
    $("#dk3").val("");
    $("#dk4").val("");
    $("#dk5").val("");
    $("#dk6").val("");
    $("#dk7").val("");
    document.getElementById('hienthi1').innerHTML='';
    document.getElementById('hienthi2').innerHTML='';
    document.getElementById('hienthi3').innerHTML='';
    document.getElementById('hienthi4').innerHTML='';
    document.getElementById('hienthi5').innerHTML='';
    document.getElementById('hienthi6').innerHTML='';
    document.getElementById('hienthi7').innerHTML='';
 })


    $("#dongy").click(function(){
      var msquanly =<?php echo $_SESSION['quanly'] ?>;
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
          var iddk ="#dk"+i;
          var dk =$(iddk).val();
          var msgd =i;
          var dongy="1";
          var capnhat="0";
          if(msnv!=""||dk!="")
          {
            $.post("xulyphancongcongviec.php",{mskhungtu: mskhungtu, msnv:msnv,msgd:msgd,dongy:dongy, capnhat:capnhat,dk:dk},function(data){$("#phancong").html(data);})
          }
      }
      else
      {
       var mskhungtu = $('#mskhungtu').val();
       var dongy="1";
       var capnhat="0";
       var msgd =[];
       var msnv =[];
       var dk =[];
       for (var i =1;i<=7;i++){var idnv="#nv"+i;msnv[i]=$(idnv).val();var iddk="#dk"+i;dk[i]=$(iddk).val();msgd[i]=i;}
      $.post("xulyphancongcongviec.php",{mskhungtu: mskhungtu, msnv1:msnv[1],msnv2:msnv[2],msnv3:msnv[3],msnv4:msnv[4],msnv5:msnv[5],msnv6:msnv[6],msnv7:msnv[7],dk1:dk[1],dk2:dk[2],dk3:dk[3],dk4:dk[4],dk5:dk[5],dk6:dk[6],dk7:dk[7],msgd1:msgd[1],msgd2:msgd[2],msgd3:msgd[3],msgd4:msgd[4],msgd5:msgd[5],msgd6:msgd[6],msgd7:msgd[7],dongy:dongy, capnhat:capnhat},function(data){$("#phancong").html(data);})

      }
      document.getElementById("display").innerHTML="";
      setTimeout(function(){
       var dongy="1";
    $.post("theodoikhungtu.php", {mskhungtu: mskhungtu,dongy:dongy}, function(data){$("#display").html(data);})
      },1000);
      $('html,body').animate({
      scrollTop: 0
      }, 'fast');

    })

  $("#capnhat").click(function(){
      var msquanly =<?php echo $_SESSION['quanly'] ?>;
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
          var iddk ="#dk"+i;
          var dk =$(iddk).val();
          var msgd =i;
          var dongy="0";
          var capnhat="1";
          if(msnv!=""||dk!="")
          {
            $.post("xulyphancongcongviec.php",{mskhungtu: mskhungtu, msnv:msnv,msgd:msgd,dongy:dongy, capnhat:capnhat,dk:dk},function(data){$("#phancong").html(data);})
          }
      }
      else
      {
       var mskhungtu = $('#mskhungtu').val();
       var dongy="0";
       var capnhat="1";
       var msgd =[];
       var msnv =[];
       var dk =[];
       for (var i =1;i<=7;i++){var idnv="#nv"+i;msnv[i]=$(idnv).val();var iddk="#dk"+i;dk[i]=$(iddk).val();msgd[i]=i;}
      $.post("xulyphancongcongviec.php",{mskhungtu: mskhungtu, msnv1:msnv[1],msnv2:msnv[2],msnv3:msnv[3],msnv4:msnv[4],msnv5:msnv[5],msnv6:msnv[6],msnv7:msnv[7],dk1:dk[1],dk2:dk[2],dk3:dk[3],dk4:dk[4],dk5:dk[5],dk6:dk[6],dk7:dk[7],msgd1:msgd[1],msgd2:msgd[2],msgd3:msgd[3],msgd4:msgd[4],msgd5:msgd[5],msgd6:msgd[6],msgd7:msgd[7],dongy:dongy, capnhat:capnhat},function(data){$("#phancong").html(data);})

      }
      document.getElementById("display").innerHTML="";
      setTimeout(function(){
       var dongy="1";
    $.post("theodoikhungtu.php", {mskhungtu: mskhungtu,dongy:dongy}, function(data){$("#display").html(data);})
      },1000);
      $('html,body').animate({
      scrollTop: 0
      }, 'fast');

      })
})
</script>
<style type="text/css">
  .hienthi
{
  font-size: 20px;
  color: green;

}
</style>

</head>
<body>
                      <?php
                        if ($_POST['dongy']==1)
                        {
                          $msduan=$_POST['project'];
                      ?>
      <div style="float: left;">
                      <lable for = "text1" class="word"> Panel ID: </label>
                      <br>
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
</div>
  <div style="float: left;">
                      <lable for = "text1" class="word"> Column ID: </label>
                      <br>
    <select id="mskhungtu" class = "text3">
        <option value ="">Select...</option>
    </select>
  </div>

 <div id="display" style="clear:left;"></div>
 <div id="phancong" ></div>
 <br>
 <div style="clear:left;"><input type="button" id="clear" value="Clear" style="float: right;" class="btn btn-primary"></div>
 <br>
 <fieldset style="clear: left;">
            <div>
                <div style="width: 20%; float:left;background-color: grey;"><input type="text" class="form-control" value="TASK NAME" readonly></input></div>
                <div style="width: 40%; float:left;background-color: grey;"><input type = "text" class="form-control" value="EMPLOYEE ID" readonly=""></input></div>
                <div style="width: 40%; float:left;background-color: grey;"><input type = "text" class="form-control" value="EXPECTED TIME" readonly=""></input></div>
            </div>
        <?php
                switch ($_SESSION['quanly'])
                {
                  case 2:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 1:EA" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv1" id = "nv1" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk1" id = "dk1" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi1" class="hienthi"></p></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 2:MC" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv2" id = "nv2" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk2" id = "dk2" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi2" class="hienthi"></p></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 3:BUSBAR" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv3" id = "nv3" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk3" id = "dk3" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi3" class="hienthi"></p></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 4:PC" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv4" id = "nv4" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk4" id = "dk4" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi4" class="hienthi"></p></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 5:CW" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv5" id = "nv5" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk5" id = "dk5" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi5" class="hienthi"></p></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 6:TW" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv6" id = "nv6" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk6" id = "dk6" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi6" class="hienthi"></p></div>
            </div>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 7:QC" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv7" id = "nv7" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk7" id = "dk7" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi7" class="hienthi"></p></div>
            </div>
        <?php
                    break;
                    case 21:

        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 1:EA" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv1" id = "nv1" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk1" id = "dk1" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi1" class="hienthi"></p></div>
            </div>
        <?php
                    break;
                    case 22:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 2:MC" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv2" id = "nv2" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk2" id = "dk2" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi2" class="hienthi"></p></div>
            </div>
        <?php
                    break;
                    case 23:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 3:BUSBAR" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv3" id = "nv3" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk3" id = "dk3" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi3" class="hienthi"></p></div>
            </div>
        <?php
                    break;
                    case 24:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 4:PC" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv4" id = "nv4" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk4" id = "dk4" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi4" class="hienthi"></p></div>
            </div>
        <?php
                    break;
                    case 25:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 5:CW" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv5" id = "nv5" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk5" id = "dk5" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi5" class="hienthi"></p></div>
            </div>
        <?php
                    break;
                    case 26:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 6:TW" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv6" id = "nv6" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk6" id = "dk6" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi6" class="hienthi"></p></div>
            </div>
        <?php
                    break;
                    case 27:
        ?>
            <div>
                <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TASK 7:QC" readonly></input></div>
                <div style="width: 40%; float:left;"><input type = "text" name ="nv7" id = "nv7" class="form-control" placeholder="EMPLOYEE ID"></input></div>
                <div style="width: 40%; float:left;"><input type = "number" name ="dk7" id = "dk7" class="form-control" placeholder="EXPECTED TIME"></input></div>
            </div>
            <div>
              <div style="width: 20%; float:left;"></div>
              <div style="width: 80%; float:left;"><p id = "hienthi7" class="hienthi"></p></div>
            </div>
        <?php
                    break;
                }
        ?>
        </fieldset>
        <br>
        <div>
                <div style="width: 7%; float:left;"><input type="button" name="dongy" id= "dongy" value="SUBMIT" class="btn btn-primary"></div>
                <div style="width: 86%; float:left;"></div>
                <div style="width: 7%; float:left;"><input type="button" name="capnhat" id="capnhat" value="UPDATE" class="btn btn-primary"></div>
        </div>
</body>
</html>
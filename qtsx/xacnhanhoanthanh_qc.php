<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Full-width input fields */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
.word{
            font-size: 2px;
            font-weight: bold;
            } 
    #msql_msqc
    {
            height: 50px;
            width: 300px;
            box-sizing: border-box;
            border: 2px solid lightblue;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 10%;
    }
    #pass
    {
      height: 50px;
            width: 300px;
            box-sizing: border-box;
            border: 2px solid lightblue;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left: 1.9%;
    }
    #xacnhanketthuc
    {
      border-radius: 10px;
      border:3px solid lightblue;
        cursor: pointer;
        padding: 20px 20px;
        background-color: grey;
        color: black;
        font-weight: bold;
        margin-left: 15%;
    }
/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal10 {
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content10 {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>
<div id="id01" class="modal10">  
  <form class="modal-content10 animate" action="">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <div>
      <label for="uname" style="font-size: 25px;font-weight: bold;margin-top: 10px;"><b>ID</b></label>
      <input type="text" placeholder="Enter your ID" name="uname" id ="msql_msqc"required>
      <div>
        <br>
      <div>
      <label for="psw" style="font-size: 25px;font-weight: bold;margin-top: 10px;"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="pass" required>
      <div>        
        <br>
      <button type="button" name="xacnhanketthuc" id="xacnhanketthuc">CONFIRM</button>
    </div>
  </form>
</div>
</body>
<script type="text/javascript">
 $(document).ready(function(){
    $("#xacnhanketthuc").click(function(){
                var id = $("#msql_msqc").val();
                var pass = $("#pass").val();
                var chon = $("#chon_temp").val();
                var mskhungtu = "mstu";
                mskhungtu = "#"+mskhungtu+chon;
                mskhungtu =$(mskhungtu).val();
                var msgd = "msgd";
                msgd = "#"+msgd+chon;
                msgd =$(msgd).val();
                $.post("xuly_xacnhanhoanthanh.php", {idqc:id,pass:pass,mskhungtu:mskhungtu,msgd:msgd}, function(data){$("#xulytrangxacnhan").html(data);})
            });
    
  });
</script>
</html>

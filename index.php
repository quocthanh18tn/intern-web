<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <title>MMS-HAI NAM AUTOMATION</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <style>
  .fakeimg1 {
      height: 115px;
      background: lightblue;
      color:black;
      padding: 15px;
  }
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
           #lib-thanh{
   text-decoration: none;font-size: 15px;padding: 14px;
  }
#lib-thanh-logout{
   text-decoration: none;font-size: 15px;padding: 14px;float: right;
  }
#lib-thanh-active{
   text-decoration: none;font-size: 15px;padding: 14px;background-color: #ccc;color: #000;
  }
    p{
            font-weight: bold;
            text-align: center;
          }
  </style>
</head>
<body>
<div class="fakeimg1 text-center" style="margin-bottom:0">
  <h1>HAI NAM AUTOMATION</h1>
  <p>WELCOM TO OURS COMPANY!</p>
</div>


  <div class="w3-bar w3-black" style="" >
       <a href="quanlytong/home.php"      class="w3-bar-item w3-button" id="lib-thanh">Project Manager</a>

        <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;">Assigment</button>
      <div class="w3-dropdown-content w3-bar-block">
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="phancong/phancongcongviec.php">Assigment Page</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="phancong/danhsachnhanvien.php">Employee List</a>
      </div>
      </div>
       <a href="chinhsuathoigian/devfunction.php" class="w3-bar-item w3-button" id="lib-thanh">Modify Time Jobs</a>
       <a href="phancong/theodoiduan.php" class="w3-bar-item w3-button" id="lib-thanh">Monitor</a>
       <a href="qtsx/theodoicongviec.php" class="w3-bar-item w3-button" id="lib-thanh">Employee's Task History</a>
       <a href="qtsx/qtsx.php"            class="w3-bar-item w3-button" id="lib-thanh">Regular Task</a>
    <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;">Contact</button>
      <div class="w3-dropdown-content w3-bar-block">
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="card/MrHoang.php">Mr.Huynh Thai Hoang</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="#">Mr.Duc</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="#">Mr.Thanh: qthanh18tn@gmail.com</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="#">Mr.Bao: baoom159@gmail.com</a>
      </div>
    </div>
  </div>



<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Banner4.jpg" alt="Los Angeles" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Thanh</h3>
        <p>We had such a great time in HAI NAM!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Banner3.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Bao</h3>
        <p>Thank you!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="Banner5.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Bao Thanh</h3>
        <p>Modify later	!</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


  </body>
</html>

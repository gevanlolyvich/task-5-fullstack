<?php
session_start();
if(!isset($_SESSION['user'])){
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery-3.4.1.min.js"></script>
	<title></title>
</head>

<style>
 body{
          margin: 0;
        }
        .skew{
            height: 100%;
            width: 12%;
            position: relative;
            background: rgb(255,255,255);
        }
        .skew:after{
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            background: inherit;
            z-index: 2;
            bottom: -1;
            transform-origin: right bottom;
            transform: skewY(0deg);
        }
        .kata { text-align: center; color: #fff; font-weight: bolder }
 
</style>

<body style="margin-top : 40px; background-image : url(map.jpg); background-repeat: no-repeat; 
background-size: auto";>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="logo.png" alt="Girl in a jacket" style="width:50px;height:50px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=users">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=akses">Akses Masuk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?p=jumlah_akses">jumlah akses</a>
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Logout
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?p=logout"><img src="icons/Lock.svg"> Logout</a>
        </div>
      </li>
    </ul>
	
  </div>
</nav>

<div class="container" style="padding-top: 130px">
  <div class="row flex-xl-nowrap">
    <div class="skew">
      <h4 style="padding-left: 15px; padding-top: 10px;">Menu</h4>
      <ul style="list-style-type:none;padding-left: 10px;">
      	<li><a href="index.php"> <img src="icons/house.svg"> Home</a></li>
		<li><a href="index.php?p=users"> <img src="icons/cloud.svg"> Users</a></li>
      	<?php
		if($_SESSION['level']=='administrator'){
		}
		?>
		<li><a href="index.php?p=akses"> <img src="icons/cloud.svg"> Akses Masuk</a></li>
        <?php
		if($_SESSION['level']=='administrator'){
		}
		?>
    <li><a href="index.php?p=daftar_masuk"> <img src="icons/cloud.svg"> Daftar Masuk</a></li>
        <?php
    if($_SESSION['level']=='administrator'){
    }
    ?>
    <li><a href="index.php?p=jumlah_akses"> <img src="icons/cloud.svg"> Jumlah akses</a></li>
        <?php
    if($_SESSION['level']=='administrator'){
    }
    ?>
		<li><a href="logout.php"> <img src="icons/Lock.svg"> Logout</a></li>
			
      </ul>
      </nav>
    </div>
    <div class="col-sm" style="padding-left: 100px;">
     <?php
      $page=isset($_GET['p']) ? $_GET['p'] : '';
      if ($page=='') include 'home.php';	  
      if ($page=='users') include 'users.php';
	    if ($page=='akses') include 'akses.php';
      if ($page=='profil') include 'profil.php';
      if ($page=='logout') include 'logout.php';
      if ($page=='daftar_masuk') include 'daftar_masuk.php';
      if ($page=='jumlah_akses') include 'jumlah_akses.php';
     ?>
    </div>
  </div>
  <div class="row" style="padding-top: 50px">    
  <div class="navbar navbar-expand-lg  fixed-bottom col-sm navbar-dark bg-dark">
   <div class="text-white">Politeknik Negeri Padang</div>
  </div>
</div>
</div>

<script src="js/bootstrap.min.js"></script>
</body>
</html>
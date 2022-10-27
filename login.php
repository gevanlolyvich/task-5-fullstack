<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/signin.css">

<style>
 body{
          margin: 0;
        }
        .skew{
            height: 225px;
            width: 100%;
            position: relative;
            background: rgb(0,0,15);
            opacity: 0.6;
        }
        .skew:after{
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            background: inherit;
            z-index: -1;
            bottom: 0;
            transform-origin: right bottom;
            transform: skewY(-3deg);
        }
        .kata { text-align: center; color: #fff; font-weight: bolder }
 
</style>

</head>

<body style="margin-top : 40px; background-image : url(map.jpg); background-repeat: no-repeat; 
background-size: auto";>
<div class="skew">
    <div class="kata">
        <img src=mop.png alt="IOT" width="200" height="100">
        <h3>SMERU</h3>
        <h3>Sistem Manajemen Keamanan Ruangan</h3>
        <h3>dengan Fingerprint dan Sensor Suhu</h3>
    </div>
</div>
    <div class="container col-md-3">
    <div class="row">
    <div class="col-md">
        <form action="" method="post" role="form" class="form-signin">
        <h1 style="color: white;" class="h3 mb-3 font-weight-normal"></h1>
        <label style="color: white;" for="inputUser">username</label>
        <input type="text" name="username" id="inputUser" class="form-control" required autofocus>


        <label style="color: white;" for="inputPass">password</label>
        <input type="password" name="password" id="inputPass" class="form-control" required>



        <label for=""></label>
        <button type="submit" name="submit" class="btn btn-primary btn-sm btn-block">Sign In</button>
        </form>
        
    </div>
    </div>
    </div>
    
    <?php
        if (isset($_POST['submit'])) {
            include 'koneksi.php';
            $password = md5($_POST['password']);
            $query = "SELECT * FROM user WHERE username='$_POST[username]' AND password='$password'";
            $cek = mysqli_query($koneksi, $query);

            $data = mysqli_fetch_array($cek);
            $result = mysqli_num_rows($cek);

            if ($result == 1) {
                session_start();
                $_SESSION['user'] = $data['username'];
                $_SESSION['level'] = $data['level'];
                header('location:index.php');
            } else {
                echo "<script>alert('Username and Password Invalid')</script>";
            }
        }
    ?>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
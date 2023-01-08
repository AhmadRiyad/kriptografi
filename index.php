<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title> Algoritma AES-128 </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<div class="wrapper">
    <div class="logo">
        <img src="assets/gambar/LogoBNG.png" alt="">
    </div>
    <div class="text-center mt-4 name">

    </div>
    <form class="login-form" action="auth.php" method="post"><img src="" alt="" srcset="">

        <span id="reauth-email" class="reauth-email"></span>
        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required
            autofocus>
        <br>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <br>
        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">LOGIN </button>
    </form>
</div>

</html>
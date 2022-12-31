<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <title> Algoritma AES-128 </title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

</head>


<style type="text/css">
body,
html {
    height: 550px;
    background-repeat: no-repeat;
    background-image: linear-gradient(#2196F3, #E3F2FD);
}

.card-container.card {
    max-width: 350px;
    padding: 40px 40px;

}

.card {
    background-color: #F7F7F7;
    padding: 0px 50px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
}

.profile-img-card {
    width: 150px;
    height: 96px;
    margin: auto;
    display: block;
}

.btn.btn-signin {
    background-color: rgb(104, 145, 162);
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(#2196F3);
}
</style>

<body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="assets/gambar/BNG.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="login-form" action="auth.php" method="post"><img src="" alt="" srcset="">

                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Username" required
                    autofocus>
                <br>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password"
                    required>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login">LOGIN </button>
            </form>
        </div>
    </div>

</body>

</html>
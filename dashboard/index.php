<?php
session_start();
include('../config.php');
include('./template/header.php');
if (empty($_SESSION['username'])) {
    header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysqli_query($connect, $sqlupdate);
?>

<?php
$user = $_SESSION['username'];
$query = mysqli_query($connect, "SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");
$data = mysqli_fetch_array($query);
?>

<div class="card">
    <div class="container">

        <br><br><br>
        <h2 class="display-5">
            <BR>
            <center>
                Implementasi Algoritma AES (Advanced Encryption Standard)
            </center>
            </<h2>
            <br>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-lg-12 col-xl-4">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="list-group">
                            <center>
                                <img src="../assets/gambar/user.png" width="70px" height="70px">
                                <p><b> <?php echo $data['fullname']; ?> </b></p>
                                <p><b> <?php echo $data['job_title']; ?></b></p>
                                <p>Tanggal <?php echo $data['last_activity'] ?></p>
                            </center>
                        </div>
                </div>
            </div>
        </div>


        <?php
        $query = mysqli_query($connect, "SELECT count(*) totaluser FROM users");
        $datauser = mysqli_fetch_array($query);
        ?>

        <?php
        $query = mysqli_query($connect, "SELECT count(*) totalencrypt FROM file WHERE status='1'");
        $dataencrypt = mysqli_fetch_array($query);
        ?>

        <?php
        $query = mysqli_query($connect, "SELECT count(*) totaldecrypt FROM file WHERE status='2'");
        $datadecrypt = mysqli_fetch_array($query);
        ?>


        <div class="col-lg-12 col-xl-8">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <H5 class="card-title text-left">HASIL FILE ENKRIPSI & DESKRIPSI</H5>
                    <table class="table">
                        <thead>
                            <tr>
                                <td><strong> Enkripsi</strong></td>
                                <td>
                                    <p> <b><?php echo $dataencrypt['totalencrypt']; ?></b></p>
                                </td>
                                <td class="text-right"> <a href="decrypt.php" class="btn btn-success btn-sm"> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong> Deskripsi</strong></td>
                                <td>
                                    <p> <b><?php echo $datadecrypt['totaldecrypt']; ?></b></p>
                                </td>
                                <td class="text-right"> <a href="history.php" class="btn btn-success btn-sm"> Detail</a>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
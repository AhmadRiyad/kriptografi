<?php
include('../config.php');
include('./template/header.php');
if (empty($_SESSION['username'])) {
    header("location:../index.php");
}
$last = $_SESSION['username'];
$role = $_SESSION['role'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysqli_query($connect, $sqlupdate);

$user = $_SESSION['username'];
$query = mysqli_query($connect, "SELECT fullname,job_title,last_activity FROM users WHERE username='$user' LIMIT 1");
$data = mysqli_fetch_array($query);
?>

<div class="card mt-3">
    <div class="card-body">
        <h2 class="text-center">
        Implementasi Algoritma AES (Advanced Encryption Standard)
        </h2>
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
        
        if($role == 'admin'){
        $query = mysqli_query($connect, "SELECT count(*) totalencrypt FROM file WHERE status='1'");
        $dataencrypt = mysqli_fetch_array($query);
        
        $query = mysqli_query($connect, "SELECT count(*) totaldecrypt FROM file WHERE status='2'");
        $datadecrypt = mysqli_fetch_array($query);
        } else {
        $query = mysqli_query($connect, "SELECT count(*) totalencrypt FROM file WHERE status='1' AND username = '$last'");
        $dataencrypt = mysqli_fetch_array($query);
        
        $query = mysqli_query($connect, "SELECT count(*) totaldecrypt FROM file WHERE status='2' AND username = '$last'");
        $datadecrypt = mysqli_fetch_array($query);
        }
        ?>


        <div class="col-lg-12 col-xl-8">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <H5 class="card-title text-left">HASIL BERKAS ENKRIPSI & DESKRIPSI</H5>
                    <table class="table">
                        <thead>
                            <tr>
                                <td><i class="fa fa-lock"></i><strong> Enkripsi</strong></td>
                                <td>
                                    <p> <b><?php echo $dataencrypt['totalencrypt']; ?></b></p>
                                </td>
                                <td class="text-right"> <a href="decrypt.php" class="btn btn-success btn-sm"> Detail</a>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-unlock"><strong> Deskripsi</strong></td>
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

<?php
include 'template/footer.php';
?>
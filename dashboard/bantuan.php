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

<div class="card mt-3">
    <div class="card-body">
        <h2 class="text-center">
        Implementasi Algoritma AES (Advanced Encryption Standard)
        </h2>
    </div>
</div>

<?php
include 'template/footer.php';
?>
<?php
session_start();
include "../../config.php";

if (isset($_POST['tambah_user'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $md5pass = md5($password);

    $cekUser = $connect->query("SELECT username FROM users WHERE username = '$username'")->fetch_assoc();

    if(empty($cekUser)){
        $insert = $connect->query("INSERT INTO users(`username`,`password`,`fullname`,`job_title`,`role`,`join_date`) 
        VALUES ('$username', '$md5pass', '$nama_lengkap', '$pekerjaan', 'user', now())");
        
        if($insert){
            echo ("<script language='javascript'>
            window.location.href='../mst-users.php';
            window.alert('Berhasil menambah user');
            </script>");
            exit();
        } else {
            echo ("<script language='javascript'>
            window.location.href='../mst-users.php';
            window.alert('Gagal menambah user');
            </script>");
            exit();
        }
    } else {
        echo ("<script language='javascript'>
        window.location.href='../mst-users.php';
        window.alert('Username sudah digunakan');
        </script>");
        exit();
    }
}

?>
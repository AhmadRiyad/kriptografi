<?php
session_start();
include "../../config.php";

if (isset($_POST['ubah_user'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $pekerjaan = htmlspecialchars($_POST['pekerjaan']);
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    $md5pass = md5($password);

    $cekUser = $connect->query("SELECT username FROM users WHERE username = '$username'")->fetch_assoc();
    $updatePassword = "";
    
    if(!empty($cekUser)){
        if($password != ""){
            $updatePassword .= ", password = '" . $md5pass . "'";
        }
        $update = $connect->query("UPDATE users SET fullname = '$nama_lengkap', job_title = '$pekerjaan'$updatePassword 
        WHERE username = '$username'");
        
        if($update === true){
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
        window.alert('Username tidak ditemukan');
        </script>");
        exit();
    }
}

?>
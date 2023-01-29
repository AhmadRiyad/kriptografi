<?php
session_start();
include "../../config.php";

$username = $_GET['id'];
if(!isset($username)){
    echo 'error';
    exit;
} else {
    $delete = $connect->query("DELETE FROM users WHERE username = '$username'");
    
    if($delete){
        $connect->query("DELETE FROM file WHERE username = '$username'");
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
}
?>
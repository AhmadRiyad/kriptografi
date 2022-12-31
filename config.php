<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'algoritma_aes';
$connect = mysqli_connect($host, $user, $pass) or die(mysqli_error($connect));
$dbselect = mysqli_select_db($connect, $dbname);
<?php
	session_start();
	include "../config.php";
	$username = $_SESSION['username'];
	$cekUser = $connect->query("SELECT username FROM users WHERE username = '$username'")->fetch_assoc();
	$now = date('Y-m-d H:i:s');
	if(!empty($cekUser)){
		$update = $connect->query("UPDATE users SET last_activity = '$now' WHERE username = '$username'");		
	}	

	session_unset();
	session_destroy();
	header('location: ../index.php');
 ?>

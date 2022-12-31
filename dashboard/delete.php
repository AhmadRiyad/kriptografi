<?php
include "../config.php";
if (isset($_GET['id'])) {
	$delete = mysqli_query($connect, "delete from file where id_file ='" . $_GET["id"] . "'");
	if ($delete !== FALSE) {
		echo ("Berhasil");
	} else {
		echo ("Gagal");
	}
	header('location: history.php');
}
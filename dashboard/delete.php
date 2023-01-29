<?php
include "../config.php";
if (isset($_GET['id'])) {
	$getFile = mysqli_query($connect, "SELECT * FROM file WHERE id_file = '". $_GET['id'] . "'");
	$fetchFile = mysqli_fetch_array($getFile);
	unlink('file_decrypt/' . $fetchFile['file_name_source']);
	unlink('file_encrypt/' . $fetchFile['file_name_finish']);
	$delete = mysqli_query($connect, "delete from file where id_file ='" . $_GET["id"] . "'");
	if ($delete !== FALSE) {
		echo ("Berhasil");
	} else {
		echo ("Gagal");
	}
	header('location: history.php');
}
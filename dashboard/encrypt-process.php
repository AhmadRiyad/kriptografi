<?php
session_start();
include "../config.php";
include "AES.php";


if (isset($_POST['encrypt_now'])) {
  $user      = $_SESSION['username'];
  $key       = mysqli_escape_string($connect, substr(md5($_POST["pwdfile"]), 0, 16));
  $deskripsi = mysqli_escape_string($connect, $_POST['desc']);


  $file_tmpname   = $_FILES['file']['tmp_name'];
  //untuk nama file url
  $file           = rand(1000, 100000) . "-" . $_FILES['file']['name'];
  $new_file_name  = strtolower($file);
  $final_file     = str_replace(' ', '-', $new_file_name);
  //untuk nama file
  $filename       = rand(1000, 100000) . "-" . pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
  $new_filename  = strtolower($filename);
  $finalfile     = str_replace(' ', '-', $new_filename);
  $size           = filesize($file_tmpname);
  $size2          = (filesize($file_tmpname)) / 1024;
  $info           = pathinfo($final_file);
  $file_source    = fopen($file_tmpname, 'rb');
  $ext            = $info["extension"];

  if ($ext == "docx" || $ext == "doc" || $ext == "txt" || $ext == "pdf" || $ext == "xls" || $ext == "xlsx" || $ext == "ppt" || $ext == "pptx"|| $ext == "mdb") {
  } else {
    echo ("<script language='javascript'>
      window.location.href='encrypt.php';
      window.alert('Maaf, tipe file tidak bisa dienkripsi');
      </script>");
    exit();
  }

  if ($size2 > 25600) {
    echo ("<script language='javascript'>
      window.location.href='encrypt.php';
      window.alert('Maaf, file tidak bisa lebih besar dari 25 MB.');
      </script>");
    exit();
  }

  $sql1   = "INSERT INTO file VALUES ('', '$user', '$final_file', '$finalfile.rda', '', '$size2', '$key', now(), '1', '$deskripsi')";
  $query1  = mysqli_query($connect, $sql1) or die(mysqli_error($connect));

  $sql2   = "select * from file where file_url =''";
  $query2  = mysqli_query($connect, $sql2) or die(mysqli_error($connect));

  $url   = $finalfile . ".rda";
  $file_url = "file_encrypt/$url";

  $sql3   = "UPDATE file SET file_url ='$file_url' WHERE file_url=''";
  $query3  = mysqli_query($connect, $sql3) or die(mysqli_error($connect));
  
  // $sql4 = "UPDATE file SET wkt_upload ='$total_time_in_seconds' WHERE file_url='$file_url'";
  // $query4 = mysqli_query($connect, $sql4) or die(mysqli_error($connect));


  $file_output    = fopen($file_url, 'wb');

  $mod    = $size % 16;
  if ($mod == 0) {
    $banyak = $size / 16;
  } else {
    $banyak = ($size - $mod) / 16;
    $banyak = $banyak + 1;
  }

  if (is_uploaded_file($file_tmpname)) {
    ini_set('max_execution_time', -1);
    ini_set('memory_limit', -1);
    $aes = new AES($key);
    $start_time = microtime(true);
    for ($bawah = 0; $bawah < $banyak; $bawah++) {
      $data    = fread($file_source, 16);
      $cipher  = $aes->encrypt($data);
      fwrite($file_output, $cipher);
    }
    $end_time = microtime(true);
    $total_time = $end_time - $start_time;
    $total_time_in_seconds = round($total_time, 2);
    fclose($file_source);
    fclose($file_output);

    echo ("<script language='javascript'>
    window.location.href='encrypt.php';
    window.alert('File berhasil di enkripsi dan diupload, waktu upload: $total_time_in_seconds detik');
    </script>");
  } else {
    echo ("<script language='javascript'>
    window.location.href='encrypt.php';
    window.alert('Encrypt file mengalami masalah..');
    </script>");
  }
}
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Include the Bootstrap CSS file -->
    <link rel="stylesheet" href="../assets/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <h1><a href="index.php" class="logo">
                    <img src="../assets/gambar/LogoBNG.png" alt="" srcset="" width="50">
                </a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active"><a href="index.php"><span class="fa fa-home"></span>Dashboard</a></li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="fa fa-file"></span> File
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="encrypt.php">
                                Enkripsi
                            </a>
                        </li>
                        <li>
                            <a href="decrypt.php">Dekripsi</a>
                        </li>
                    </ul>
                </li>
                <li><a href="history.php"><span class="fa fa-history"></span>Daftar Hasil</a></li>
                <li><a href="bantuan.php"><span class="fa fa-book"></span>Bantuan</a></li>
            </ul>
        </nav>
        <div id="content" class="p-4 p-md-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-0">
                <div class="container-fluid"><button type="button" id="sidebarCollapse" class="btn btn-primary"><i
                            class="fa fa-bars"></i><span class="sr-only">Toggle Menu</span></button>
                    <a class="nav-link btn btn-danger" href="logout.php"
                        onclick="return confirm('Apakah anda yakin ingin keluar?')">
                        Logout <i class="fa fa-sign-out"></i>
                    </a>
                </div>
            </nav>
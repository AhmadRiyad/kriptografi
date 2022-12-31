<?php include 'template/header.php'; ?>

<body class="sidebar-mini fixed">
    <div class="content-wrapper">
        <div class="page-title">
            <div>
                <ul class="breadcrumb">
                    <h1><i class="fa fa-folder"></i> Daftar Berkas Enkripsi dan Dekripsi</h1>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="file" class="table striped">
                                <thead class="bg-primary">
                                    <tr>
                                        <td><strong>ID File</strong></td>
                                        <td><strong>Nama pengguna</strong></td>
                                        <td><strong>Nama Berkas</strong></td>
                                        <td><strong>Nama Berkas Enkripsi</strong></td>
                                        <td><strong>Ukuran Berkas</strong></td>
                                        <td><strong>Tanggal</strong></td>
                                        <td><strong>Status</strong></td>
                                    </tr>
                                </thead>
                                <tfoot class="bg-primary">
                                    <tr>
                                        <td><strong>ID Berkas</strong></td>
                                        <td><strong>Nama pengguna</strong></td>
                                        <td><strong>Nama Berkas Sumber</strong></td>
                                        <td><strong>Nama Berkas Enkripsi</strong></td>
                                        <td><strong>Ukuran Berkas</strong></td>
                                        <td><strong>Tanggal</strong></td>
                                        <td><strong>Status</strong></td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php

                                    $query = mysqli_query($connect, "SELECT * FROM file");
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $data['id_file']; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['file_name_source']; ?></td>
                                        <?php $namabrks = $data['file_name_source']; ?>
                                        <td><?php echo $data['file_name_finish']; ?></td>
                                        <td><?php echo $data['file_size']; ?> KB</td>
                                        <td><?php echo $data['tgl_upload']; ?></td>
                                        <td><?php if ($data['status'] == 1) {
                                                    echo "<a href='decrypt.php' class='btn btn-success'>Terenkripsi</a>";
                                                } elseif ($data['status'] == 2) {
                                                    echo "<a href='file_decrypt/$namabrks' class='btn btn-warning'>Terdekripsi</a>     
                              ";
                                                } else {
                                                    echo "<span class='btn btn-danger'>Status Tidak Diketahui</span>";
                                                }
                                                ?></td>
                                    </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#file').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true,
            "order": [0, "asc"]
        });
    });
    </script>
    <script src="../assets/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>

<?php include 'template/footer.php'; ?>
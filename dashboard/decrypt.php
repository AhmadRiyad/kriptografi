<? include "../config.php"; ?>
<?php include 'template/header.php'; ?>

<body class="sidebar-mini fixed">
    <div class="content-wrapper">
        <div class="page-title">
            <div>
                <ul class="breadcrumb">
                    <h1><i class="fa fa-unlock"></i> Deskripsi Berkas</h1>
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
                                        <td width="5%"><strong>No</strong></td>
                                        <td width="20%"><strong>Nama Sumber Berkas</strong></td>
                                        <td width="20%"><strong>Nama Berkas Enkripsi</strong></td>
                                        <td width="20%"><strong>Path Berkas</strong></td>
                                        <td width="15%"><strong>Status Berkas</strong></td>
                                        <td width="10%"><strong>Opsi</strong></td>
                                    </tr>
                                </thead>
                                <tfoot class="bg-primary">
                                    <tr>
                                        <td width="5%"><strong>No</strong></td>
                                        <td width="20%"><strong>Nama Berkas</strong></td>
                                        <td width="20%"><strong>Nama Berkas Enkripsi</strong></td>
                                        <td width="20%"><strong>Path Berkas</strong></td>
                                        <td width="15%"><strong>Status Berkas</strong></td>
                                        <td width="10%"><strong>Opsi</strong></td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query = mysqli_query($connect, "SELECT * FROM file");
                                    while ($data = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $data['file_name_source']; ?></td>
                                        <td><?php echo $data['file_name_finish']; ?></td>
                                        <td><?php echo $data['file_url']; ?></td>
                                        <td><?php if ($data['status'] == 1) {
                                                    echo "Enkripsi";
                                                } elseif ($data['status'] == 2) {
                                                    echo "Dekripsi";
                                                } else {
                                                    echo "Status Tidak Diketahui";
                                                }
                                                ?></td>
                                        <td>
                                            <?php
                                                $a = $data['id_file'];
                                                if ($data['status'] == 1) {
                                                    echo '<a href="decrypt-file.php?id_file=' . $a . '" class="btn btn-warning">Dekripsi Berkas</a>';
                                                } elseif ($data['status'] == 2) {
                                                    echo '<a href="encrypt.php" class="btn btn-success">Enkripsi Berkas</a>';
                                                } else {
                                                    echo '<a href="decrypt.php" class="btn btn-danger">Data Tidak Diketahui</a>';
                                                }
                                                ?>

                                        </td>
                                    </tr>
                                    <?php
                                        $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
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
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
<?php include 'template/footer.php'; ?>
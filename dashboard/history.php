<?php include('../config.php');?>
<?php include 'template/header.php'; ?>

<main role="main" class="container">
    <div class="col-md-12">
        <div class="card card-signin flex-row my-5">
            <div class="card-body">
                <ul class="breadcrumb">
                    <h1><i class="fa fa-folder"></i> Daftar Berkas Enkripsi dan Dekripsi</h1>
                </ul>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="bg-primary">
                    <tr>
                        <td><strong>Id File</strong></td>
                        <td><strong>User</strong></td>
                        <td><strong>Nama File Asli</strong></td>
                        <td><strong>File Enkripsi</strong></td>
                        <td><strong>Ukuran File</strong></td>
                        <td><strong>Keterangan</strong></td>
                        <td><strong>Status</strong></td>
                        <td><strong>Delete</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
              $no =1;
              $query = mysqli_query($connect,"SELECT * FROM file");
              while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['file_name_source']; ?></td>
                        <?php $namabrks = $data['file_name_source']; ?>
                        <td><?php echo $data['file_name_finish']; ?></td>
                        <td><?php echo $data['file_size']; ?> KB</td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td><?php if ($data['status'] == 1) {
                    echo "<a href='decrypt.php' class='btn btn-success'>Terenkripsi</a>";
                  }elseif ($data['status'] == 2) {
                    echo "<a href='file_decrypt/$namabrks' class='btn btn-warning'> Download</a>     
                    ";
                  }else {
                    echo "<span class='btn btn-danger'>Status Tidak Diketahui</span>";
                  }
                  ?></td>
                        <td>
                            <a onClick="return confirm('Data ini akan di hapus.?')"
                                href="delete.php.?id=<?php echo $data['id_file']; ?>" class="btn btn-danger ">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php
              } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</main>
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
            <table class="table table-bordered table-striped dataTable">
                <thead class="bg-primary">
                    <tr>
                        <th style="vertical-align:middle;" class="text-center">Id File</th>
                        <th style="vertical-align:middle;">User</th>
                        <th style="vertical-align:middle;">Nama File Asli</th>
                        <th style="vertical-align:middle;">File Enkripsi</th>
                        <th style="vertical-align:middle;">Ukuran File</th>
                        <th style="vertical-align:middle;">Keterangan</th>
                        <th style="vertical-align:middle;">Status</th>
                        <th style="vertical-align:middle;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
              $no =1;
              $query = mysqli_query($connect,"SELECT * FROM file");
              while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td class="text-center" style="vertical-align:middle;"><?php echo $no++; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['username']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_name_source']; ?></td>
                        <?php $namabrks = $data['file_name_source']; ?>
                        <td style="vertical-align:middle;"><?php echo $data['file_name_finish']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_size']; ?> KB</td>
                        <td style="vertical-align:middle;"><?php echo $data['keterangan']; ?></td>
                        <td style="vertical-align:middle;"><?php if ($data['status'] == 1) {
                    echo "<a href='javascript:void(0)' class='btn btn-success btn-sm'><i class='fa fa-check'></i> Terenkripsi</a>";
                  }elseif ($data['status'] == 2) {
                    echo "<a href='file_decrypt/$namabrks' class='btn btn-warning btn-sm' download><i class='fa fa-download'></i> Download</a>     
                    ";
                  }else {
                    echo "<span class='btn btn-danger'>Status Tidak Diketahui</span>";
                  }
                  ?></td>
                        <td>
                            <a onClick="return confirm('Data ini akan di hapus.?')"
                                href="delete.php.?id=<?php echo $data['id_file']; ?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Delete
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
<?php include 'template/footer.php'?>
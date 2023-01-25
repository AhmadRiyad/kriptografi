<?php include('../config.php'); ?>
<?php include 'template/header.php'; ?>

<div class="card mt-3">
    <div class="card-header">
        <h1><i class="fa fa-history"></i>Daftar Berkas Enkripsi dan Dekripsi</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped dataTable">
                <thead class="bg-primary">
                    <tr>
                        <th style="vertical-align:middle;" class="text-center">NO</th>
                        <th style="vertical-align:middle;">Username</th>
                        <th style="vertical-align:middle;">Nama Berkas</th>
                        <th style="vertical-align:middle;">Nama Berkas Enkripsi</th>
                        <th style="vertical-align:middle;">Ukuran Berkas</th>
                        <th style="vertical-align:middle;">Keterangan</th>
                        <th style="vertical-align:middle;">Waktu</th>                        
                        <th style="vertical-align:middle;">Status</th>
                        <th style="vertical-align:middle;">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = mysqli_query($connect, "SELECT * FROM file");
                    while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td class="text-center" style="vertical-align:middle;"><?php echo $no++; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['username']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_name_source']; ?></td>                        
                        <td style="vertical-align:middle;"><?php echo $data['file_name_finish']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_size']; ?> KB</td>
                        <td style="vertical-align:middle;"><?php echo $data['keterangan']; ?></td>
                        <td style="vertical-align:middle;">
                        Waktu enkripsi: <?php echo $data['durasi_proses_enkripsi'] == "" ? "-" : $data['durasi_proses_enkripsi'] . ' Detik'; ?><hr class="mb-1 mt-1">
                        Waktu dekripsi: <?php echo $data['durasi_proses_dekripsi'] == "" ? "-" : $data['durasi_proses_dekripsi'] . ' Detik'; ?>
                        </td>                        
                        <td style="vertical-align:middle;">
                        Enkripsi: <a href='file_encrypt/<?= $data['file_name_finish'] ?>' class='btn btn-warning btn-sm' download><i class='fa fa-download'></i> Download</a>
                        <hr class="mt-1 mb-1">
                        Dekripsi: 
                        <?php 
                        if($data['status'] != 2){
                            echo '-';
                        } else {
                            echo "<a href='file_decrypt/".$data['file_name_source']."' class='btn btn-primary btn-sm' download><i class='fa fa-download'></i> Download</a>";
                        }
                        ?>
                        </td>
                        <td style="vertical-align:middle;">
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
<?php include 'template/footer.php' ?>
<?php include('../config.php');?>
<?php include 'template/header.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <ul class="breadcrumb">
                        <h1><i class="fa fa-unlock"></i> Deskripsi Berkas</h1>
                    </ul>
                </div>
            </div>
            <table id="file" class="table striped">
                <thead class="bg-primary">
                    <tr>
                        <td width="5%"><strong>No</strong></td>
                        <td width="20%"><strong>Nama Hasil</strong></td>
                        <td width="20%"><strong>Enkripsi</strong></td>
                        <td width="20%"><strong>Lokasi Enkripsi</strong></td>
                        <td width="15%"><strong>Ukuran Hasil</strong></td>
                        <td width="10%"><strong>Deskripsi</strong></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
              $i = 1;
              $query = mysqli_query($connect,"SELECT * FROM file where status ='1' order by tgl_upload desc");
              while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['file_name_source']; ?></td>
                        <td><?php echo $data['file_name_finish']; ?></td>
                        <td><?php echo $data['file_url']; ?></td>
                        <td><?php echo $data['file_size']; ?> Kilobyte (KB)</td>

                        <td>
                            <?php
                    $a = $data['id_file'];
                    if ($data['status'] == 1) {
                      echo '<a href="decrypt-file.php?id_file='.$a.'" class="btn btn-warning">Dekripsi Hasil</a>';
                    }elseif ($data['status'] == 2) {
                      echo '<a href="encrypt.php" class="btn btn-success">Enkripsi Hasil</a>';
                    }else {
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
</main>
<?php include 'template/footer.php'; ?>
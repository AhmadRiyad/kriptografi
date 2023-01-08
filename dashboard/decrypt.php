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
            <div class="table-responsive">
            <table id="file" class="table striped dataTable">
                <thead class="bg-primary">
                    <tr>
                        <th style="vertical-align:middle;" width="5%" class="text-center">No</th>
                        <th style="vertical-align:middle;" width="20%">Nama Hasil</th>
                        <th style="vertical-align:middle;" width="20%">Enkripsi</th>
                        <th style="vertical-align:middle;" width="20%">Lokasi Enkripsi</th>
                        <th style="vertical-align:middle;" width="15%">Ukuran Hasil</th>
                        <th style="vertical-align:middle;" width="10%">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
              $i = 1;
              $query = mysqli_query($connect,"SELECT * FROM file where status ='1' order by tgl_upload desc");
              while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td style="vertical-align:middle;"><?php echo $i; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_name_source']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_name_finish']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_url']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_size']; ?> Kilobyte (KB)</td>
                        <td style="vertical-align:middle;">
                            <?php
                    $a = $data['id_file'];
                    if ($data['status'] == 1) {
                      echo '<a href="decrypt-file.php?id_file='.$a.'" class="btn btn-warning btn-sm">Dekripsi Hasil</a>';
                    }elseif ($data['status'] == 2) {
                      echo '<a href="encrypt.php" class="btn btn-success btn-sm">Enkripsi Hasil</a>';
                    }else {
                      echo '<a href="decrypt.php" class="btn btn-danger btn-sm">Data Tidak Diketahui</a>';
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
</main>
<?php include 'template/footer.php'; ?>
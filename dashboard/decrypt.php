<?php 
include('../config.php');
include 'template/header.php'; 
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<div class="card mt-3">
    <div class="card-header">
        <h1><i class="fa fa-unlock"></i> Deskripsi Berkas</h1>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="file" class="table striped dataTable">
                <thead class="bg-primary">
                    <tr>
                        <th style="vertical-align:middle;" width="5%" class="text-center">No</th>
                        <th style="vertical-align:middle;" width="20%">Nama Berkas</th>
                        <th style="vertical-align:middle;" width="20%">Nama Berkas Enkripsi</th>
                        <th style="vertical-align:middle;" width="15%">Ukuran Hasil</th>
                        <th style="vertical-align:middle;" width="5%">Status</th>
                        <th style="vertical-align:middle;" width="10%">Dekripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                $i = 1;
                                if($role == 'admin'){
                                    $query = mysqli_query($connect,"SELECT * FROM file where status ='1' order by tgl_upload desc");
                                } else {
                                    $query = mysqli_query($connect,"SELECT * FROM file where status ='1' AND username = '$username' order by tgl_upload desc");
                                }
                                while ($data = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td style="vertical-align:middle;"><?php echo $i; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_name_source']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_name_finish']; ?></td>
                        <td style="vertical-align:middle;"><?php echo $data['file_size']; ?> KB
                        <td style="vertical-align:middle;font-size:17px;">
                                <span class="badge bg-success">
                                    <i class="fa fa-check"></i> Terenkripsi
                                </span>
                        </td>
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
<?php include 'template/footer.php'; ?>
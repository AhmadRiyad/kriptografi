<?php include('../config.php');?>
<?php include 'template/header.php'; ?>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <H5 class="card-title text-left">FORM DEKRIPSI </H5>
                    <div>
                        <hr>
                    </div>
                    <?php
          $id_file = $_GET['id_file'];
          $query = mysqli_query($connect,"SELECT * FROM file WHERE id_file='$id_file'");
          $data2 = mysqli_fetch_array($query);
          ?>
                    <h3 align="center">Berkas Enkripsi <i style="color:blue"><?php echo $data2['file_name_finish'] ?></i>
                    </h3><br>
                    <form class="form-horizontal" method="post" action="functions/decrypt-process.php">
                        <div class="table-responsive">
                            <table class="table striped">
                                <tr>
                                    <td>Nama Berkas</td>
                                    <td>:</td>
                                    <td><?php echo $data2['file_name_source']; ?></td>
                                </tr>
                                <tr>
                                    <td>Ukuran Berkas</td>
                                    <td>:</td>
                                    <td><?php echo $data2['file_size']; ?> KB</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Enkripsi</td>
                                    <td>:</td>
                                    <td><?php echo $data2['tgl_upload']; ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><?php echo $data2['keterangan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Password / Kunci Enkripsi</td>
                                    <td></td>
                                    <td>
                                        <div class="col-md-6">
                                            <input type="hidden" name="fileid" value="<?php echo $data2['id_file'];?>">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password / Kunci Enkripsi" id="" minlength="1" maxlength="16" name="pwdfile" required><br>
                                            <input type="submit" name="decrypt_now" value="DESKRIPSI"
                                                class="form-control btn btn-primary">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'template/footer.php'; ?>
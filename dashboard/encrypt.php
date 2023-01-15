<?php 
include('../config.php');
include 'template/header.php'; 
?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card mt-3">
            <div class="card-header text-center">
                <h1><i class="fa fa-lock"></i> Enkripsi Berkas </h1>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post" action="encrypt-process.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label" for="inputPassword"> Tanggal</label>
                        <div class="">
                            <input class="form-control" id="inputTgl" type="text" placeholder="Tanggal" name="datenow"
                                value="<?php echo date("Y-m-d H:i:s"); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputFile">File Enkripsi </label>
                        <div class="">
                            <input class="form-control" id="inputFile" placeholder="Input File" type="file" name="file"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputPassword">Password</label>
                        <div class="">
                            <input class="form-control" id="inputPassword" type="password"
                                placeholder="Password / Kunci Enkripsi " minlength="16" maxlength="16" name="pwdfile"
                                required>
                            <span class="text-danger" style="font-size:13px;">Ketentuan: password minimal 16 karakter
                                atau
                                lebih.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="textArea">Keterangan</label>
                        <div class="">
                            <textarea class="form-control" id="textArea" rows="3" name="desc"
                                placeholder="Keterangan.."></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="encrypt_now"><i class="fa fa-lock"></i>
                        ENKRIPSI</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>
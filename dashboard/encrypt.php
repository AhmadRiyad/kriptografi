<?php include 'template/header.php'; ?>
<main role="main" class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <form class="form-horizontal" method="post" action="encrypt-process.php"
                        enctype="multipart/form-data">
                        <fieldset>
                            <div>
                                <ul class="breadcrumb">
                                    <h1><i class="fa fa-lock"></i> Enkripsi Berkas </h1>
                                </ul>
                            </div>
                            <div>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="inputPassword"> Tanggal</label>
                                <div class="col-lg-4">
                                    <input class="form-control" id="inputTgl" type="text" placeholder="Tanggal"
                                        name="datenow" value="<?php echo date("Y-m-d"); ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-12 control-label" for="inputFile">File Enkripsi Hasil Radiologi
                                    dengan format jpg / png</label>
                                <div class="col-lg-4">
                                    <input class="form-control" id="inputFile" placeholder="Input File" type="file"
                                        name="file" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="inputPassword">Password</label>
                                <div class="col-lg-4">
                                    <input class="form-control" id="inputPassword" type="password"
                                        placeholder="Password / Kunci Enkripsi " name="pwdfile" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="textArea">Keterangan</label>
                                <div class="col-lg-4">
                                    <textarea class="form-control" id="textArea" rows="3" name="desc"
                                        placeholder="Keterangan.."></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" for="textArea"></label>
                                <div class="col-lg-2">
                                    <input type="submit" name="encrypt_now" value="ENKRIPSI"
                                        class="form-control btn btn-primary">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'template/footer.php'; ?>
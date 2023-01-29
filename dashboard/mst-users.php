<?php
include('../config.php');
include('./template/header.php');

if($_SESSION['role'] != 'admin'){
    header("location: index.php");
}
?>
<br>
<a href="javascript:void(0)" data-toggle="modal" data-target="#modal-tambah-user" class="btn btn-success btn-sm">Tambah
    User</a>
<div class="card mt-3">
    <div class="card-header">
        <h5 class="card-title mb-0">
            <i class="fa fa-users"></i> Data Users
        </h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="file" class="table table-bordered striped dataTable">
                <thead class="bg-primary text-white">
                    <tr>
                        <th style="vertical-align:middle;" width="5%" class="text-center">No</th>
                        <th style="vertical-align:middle;" width="20%">Nama Pengguna</th>
                        <th style="vertical-align:middle;" width="20%">Nama Lengkap</th>
                        <th style="vertical-align:middle;" width="20%">Pekerjaan</th>
                        <th style="vertical-align:middle;" width="15%">Tanggal Bergabung</th>
                        <th style="vertical-align:middle;" width="10%">Terakhir Login</th>
                        <th style="vertical-align:middle;" class="text-center" width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $no = 1;
                $query = "SELECT * FROM users WHERE role = 'user'";
                $fetch = $connect->query($query)->fetch_all(MYSQLI_ASSOC);            
                foreach($fetch as $rows){
                ?>
                    <tr>
                        <th class="text-center"><?= $no++ ?></th>
                        <td><?= $rows['username'] ?></td>
                        <td><?= $rows['fullname'] ?></td>
                        <td><?= $rows['job_title'] ?></td>
                        <td><?= $rows['join_date'] ?></td>
                        <td><?= $rows['last_activity'] ?></td>
                        <td class="text-center">
                            <a href="functions/hapus-user.php?id=<?= $rows['username'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus <?= $rows['username'] ?>?')">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-edit" 
                            data-username="<?= $rows['username'] ?>" data-nama_lengkap="<?= $rows['fullname'] ?>" 
                            data-pekerjaan="<?= $rows['job_title'] ?>">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<form action="functions/ubah-user.php" id="form_save" method="post">
<div class="modal fade" id="modal-ubah-user" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" readonly required>
                </div>
                <div class="form-group">
                    <label for="">Password (Opsional)</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="ubah_user" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</form>

<form action="functions/tambah-user.php" method="post" id="form_save">
<div class="modal fade" id="modal-tambah-user" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="tambah_user" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</form>

<?php
include 'template/footer.php';
?>
<script>
    $(document).ready(function () {
        $('.btn-edit').click(function(){
            const data = {
                username: $(this).data('username'),
                nama_lengkap: $(this).data('nama_lengkap'),
                pekerjaan: $(this).data('pekerjaan'),
            }
            
            $('#modal-ubah-user input[name="username"]').val(data.username)
            $('#modal-ubah-user input[name="nama_lengkap"]').val(data.nama_lengkap)
            $('#modal-ubah-user input[name="pekerjaan"]').val(data.pekerjaan)
            $('#modal-ubah-user').modal('show')
        })
    });
</script>
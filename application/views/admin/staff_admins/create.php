<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Staff Admin Baru</h3>
            </div>
            <form role="form" action="<?php echo base_url('admin/adminstaffadmin/save'); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama">Nama Staff Admin</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Staff Admin" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Staff Admin" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Staff Admin" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="admin_konten">Admin Konten</option>
                            <option value="admin_dukun">Admin Dukun</option>
                            <option value="admin_keuangan">Admin Keuangan</option>
                            <option value="moderator_forum">Moderator Forum</option>
                            <!-- Tambahkan opsi role lainnya sesuai kebutuhan -->
                            <option value="admin">Admin Biasa</option> 
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo base_url('admin/adminstaffadmin'); ?>" class="btn btn-default">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
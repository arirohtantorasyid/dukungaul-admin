<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Dukun Baru</h3>
            </div>
            <form role="form" action="<?php echo base_url('admin/admindukun/save'); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_panggung">Nama Panggung</label>
                        <input type="text" class="form-control" id="nama_panggung" name="nama_panggung" placeholder="Masukkan Nama Panggung Dukun" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap Dukun" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Dukun" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Dukun" required>
                    </div>
                    <div class="form-group">
                        <label for="spesialisasi">Spesialisasi</label>
                        <textarea class="form-control" id="spesialisasi" name="spesialisasi" placeholder="Masukkan Spesialisasi Dukun"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Dukun"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tarif_per_jam">Tarif Per Jam</label>
                        <input type="number" class="form-control" id="tarif_per_jam" name="tarif_per_jam" placeholder="Masukkan Tarif Per Jam Dukun" value="0">
                    </div>
                    <!-- Tambahkan form field lainnya sesuai kebutuhan tabel dukuns -->
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
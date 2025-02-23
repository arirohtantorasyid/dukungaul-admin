<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Artikel Baru</h3>
            </div>
            <form role="form" action="<?php echo base_url('admin/adminarticle/save'); ?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Artikel" required>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten Artikel</label>
                        <textarea class="form-control" id="konten" name="konten" placeholder="Masukkan Konten Artikel" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Artikel (Opsional)">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_publikasi">Tanggal Publikasi</label>
                        <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <!-- FORM FIELD UPLOAD GAMBAR ARTIKEL (DITAMBAHKAN) -->
                    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <div class="form-group">
                        <label for="image">Gambar Artikel</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <?php if ($this->session->flashdata('error_upload_image')) : ?> <!-- GANTI session() menjadi $this->session -->
                            <div class="text-danger"><?= $this->session->flashdata('error_upload_image') ?></div> <!-- GANTI session() menjadi $this->session -->
                        <?php endif; ?>
                    </div>
                    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <!-- ++++++++++++++++++++++++++++++++++++++++++++++++ -->

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Artikel</h3>
            </div>
            <form role="form" action="<?php echo base_url('admin/adminarticle/update/'.$article->id); ?>" method="post">
                <div class="box-body">
                    <div class="form-group">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Artikel" value="<?php echo html_escape($article->judul); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten Artikel</label>
                        <textarea class="form-control" id="konten" name="konten" placeholder="Masukkan Konten Artikel" rows="10" required><?php echo html_escape($article->konten); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Artikel (Opsional)" value="<?php echo html_escape($article->kategori); ?>">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_publikasi">Tanggal Publikasi</label>
                        <input type="date" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="<?php echo html_escape($article->tanggal_publikasi); ?>">
                    </div>
                    <!-- TODO: Tambahkan Form Field Upload Gambar Artikel (Update) -->
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Artikel</button>
                    <a href="<?php echo base_url('admin/adminarticle'); ?>" class="btn btn-default">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
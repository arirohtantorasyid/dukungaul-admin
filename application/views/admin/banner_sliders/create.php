<!-- backend/application/views/admin/banner_sliders/create.php -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah Banner Slider Baru
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/banner_slider') ?>">Banner Sliders</a></li>
            <li class="active">Tambah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Tambah Banner Slider</h3>
                    </div>
                    
                    <!-- Tampilkan pesan sukses atau error -->
                    <?php if ($this->session->flashdata('success_message')) : ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('success_message'); ?></div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error_message')) : ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error_message'); ?></div>
                    <?php endif; ?>

                    <!-- Form start -->
                    <form role="form" action="<?= base_url('admin/banner_slider/save') ?>" method="post">
                        <div class="box-body">
                            <?php if (validation_errors()): ?>
                                <div class="alert alert-danger">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <label for="image_url">URL Gambar Banner</label>
                                <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Masukkan URL Gambar Banner" required>
                            </div>
                            
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_active" value="1" checked> Aktif
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Box footer -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            <a href="<?= base_url('admin/banner_slider') ?>" class="btn btn-default"><i class="fa fa-times"></i> Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

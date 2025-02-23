<?= $header_admin ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Banner Slider
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/banner_slider') ?>">Banner Sliders</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Banner Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?= base_url('admin/banner_slider/update/' . $banner_slider['id']) ?>" method="post">
                        <input type="hidden" name="id" value="<?= $banner_slider['id'] ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="image_url">URL Gambar Banner</label>
                                <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Masukkan URL Gambar Banner" value="<?= $banner_slider['image_url'] ?>" required>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_active" value="1" <?= $banner_slider['is_active'] ? 'checked' : '' ?>> Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/banner_slider') ?>" class="btn btn-default">Batal</a>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?= $footer_admin ?>
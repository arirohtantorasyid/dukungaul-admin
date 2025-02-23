<!-- backend/application/views/admin/feature_cards/edit.php -->
<?= $header_admin ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Fitur Card
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?= base_url('admin/feature_card') ?>">Fitur Cards</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form Edit Fitur Card</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" action="<?= base_url('admin/feature_card/edit/' . $feature_card->id) ?>" method="post">  <!-- URL EDIT HARUS MENGGUNAKAN ID -->
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title">Judul Fitur</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Fitur" value="<?= set_value('title', $feature_card->title) ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Fitur</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi Fitur"><?= set_value('description', $feature_card->description) ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="icon_url">URL Ikon</label>
                                <input type="text" class="form-control" id="icon_url" name="icon_url" placeholder="Masukkan URL Ikon" value="<?= set_value('icon_url', $feature_card->icon_url) ?>">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_active" value="1" <?php echo set_checkbox('is_active', '1', ($feature_card->is_active == 1)); ?>> Aktif
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('admin/feature_card') ?>" class="btn btn-default">Batal</a>
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
<!-- backend/application/views/admin/banner_sliders/index.php -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Manajemen Banner Sliders</h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Banner Sliders</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Banner Sliders</h3>
                        <div class="box-tools">
                            <a href="<?= base_url('admin/banner_slider/create') ?>" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Tambah Banner Slider
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if ($this->session->flashdata('success_message')) : ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                                <?= $this->session->flashdata('success_message') ?>
                            </div>
                        <?php endif; ?>

                        <?php if (empty($banner_sliders)) : ?>
                            <div class="alert alert-warning">Tidak ada data banner slider.</div>
                        <?php else : ?>
                            <table id="bannerSliderTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($banner_sliders as $banner) : ?>
                                        <tr>
                                            <td><?= $banner['id'] ?></td>
                                            <td><img src="<?= $banner['image_url'] ?>" alt="Banner" style="max-width: 100px; max-height: 50px;"></td>
                                            <td><?= $banner['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/banner_slider/edit/' . $banner['id']) ?>" class="btn btn-info btn-sm">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="<?= base_url('admin/banner_slider/delete/' . $banner['id']) ?>" class="btn btn-danger btn-sm" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus banner ini?')">
                                                    <i class="fa fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        <?php endif; ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
<script src="<?= base_url('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<script>
    $(function () {
        $('#bannerSliderTable').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
    });
</script>

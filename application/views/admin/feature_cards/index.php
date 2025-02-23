<!-- backend/application/views/admin/feature_cards/index.php -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manajemen Fitur Cards
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Fitur Cards</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('success_message')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success_message'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error_message')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error_message'); ?>
            </div>
        <?php endif; ?>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Daftar Fitur Cards Aktif</h3>
                <div class="box-tools pull-right">
                    <a href="<?= base_url('admin/feature_card/create') ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Tambah Fitur Card
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="featureCardTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Ikon</th>
                            <th>Status Aktif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($feature_cards as $card): ?>
                            <tr>
                                <td><?= $card->id ?></td>
                                <td><?= $card->title ?></td>
                                <td><?= $card->description ?></td>
                                <td><img src="<?= $card->icon_url ?>" alt="Icon" width="50"></td>
                                <td><?= $card->is_active ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td>
                                    <a href="<?= base_url('admin/feature_card/edit/' . $card->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= base_url('admin/feature_card/delete/' . $card->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus fitur card ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Ikon</th>
                            <th>Status Aktif</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(function () {
        $('#featureCardTable').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>
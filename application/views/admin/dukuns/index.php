// PASTE COMPLETE CODE FOR backend/application/views/admin/dukuns/index.php FROM PREVIOUS RESPONSES
// ... (Pastikan tidak ada bagian yang terpotong)
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Dukun</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo base_url('admin/admindukun/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Dukun</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama Panggung</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Spesialisasi</th>
                        <th>Tarif/Jam</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php if(isset($dukuns) && is_array($dukuns) && count($dukuns) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach($dukuns as $dukun): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo html_escape($dukun->nama_panggung); ?></td>
                                <td><?php echo html_escape($dukun->nama_lengkap); ?></td>
                                <td><?php echo html_escape($dukun->email); ?></td>
                                <td><?php echo html_escape($dukun->spesialisasi); ?></td>
                                <td><?php echo number_format($dukun->tarif_per_jam, 0, ',', '.'); ?></td>
                                <td><?php echo html_escape($dukun->status); ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/admindukun/edit/'.$dukun->id); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('admin/admindukun/delete/'.$dukun->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data dukun ini?')"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="8">Tidak ada data dukun.</td></tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
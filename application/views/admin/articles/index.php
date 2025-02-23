<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Artikel</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo base_url('admin/adminarticle/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Artikel</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal Publikasi</th>
                        <th>Aksi</th>
                    </tr>
                    <?php if(isset($articles) && is_array($articles) && count($articles) > 0): ?>
                        <?php $no = 1; ?>
                        <?php foreach($articles as $article): ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo html_escape($article->judul); ?></td>
                                <td><?php echo html_escape($article->kategori); ?></td>
                                <td><?php echo html_escape($article->tanggal_publikasi); ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/adminarticle/edit/'.$article->id); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('admin/adminarticle/delete/'.$article->id); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data artikel ini?')"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5">Tidak ada data artikel.</td></tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>
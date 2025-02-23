<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Manajemen Staff Admin</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo base_url('admin/adminstaffadmin/create'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Staff Admin</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Admin Contoh 1</td>
                        <td>admin1@example.com</td>
                        <td>Admin Konten</td>
                        <td>
                            <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Admin Contoh 2</td>
                        <td>admin2@example.com</td>
                        <td>Admin Dukun</td>
                        <td>
                            <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-center">Data staff admin akan ditampilkan di sini (Implementasi Data dari Database).</td>
                    </tr>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
        </div>
        <!-- /.box -->
    </div>
</div>
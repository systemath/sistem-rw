<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Data Warga</h3>
                <div class="card-tools">
                    <a href="<?= base_url('admin/warga/tambah'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Warga</a>
                    <a href="<?= base_url('admin/warga/cetak'); ?>" class="btn btn-info btn-sm" target="_blank"><i class="fas fa-print"></i> Cetak PDF</a>
                    <a href="<?= base_url('admin/warga/excel'); ?>" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export Excel</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>L/P</th>
                            <th>RT/RW</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($warga as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nik']; ?></td>
                            <td><?= $row['nama_lengkap']; ?></td>
                            <td><?= $row['jenis_kelamin']; ?></td>
                            <td><?= $row['rt']; ?>/<?= $row['rw']; ?></td>
                            <td><?= $row['no_hp']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/warga/edit/'.$row['id']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/warga/hapus/'.$row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

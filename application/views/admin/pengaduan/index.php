<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengaduan Warga</h3>
                <div class="card-tools">
                    <a href="<?= base_url('admin/pengaduan/cetak'); ?>" class="btn btn-info btn-sm" target="_blank"><i class="fas fa-print"></i> Cetak Laporan</a>
                </div>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Pelapor</th>
                            <th>Judul Pengaduan</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($pengaduan as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d/m/Y', strtotime($row['created_at'])); ?></td>
                            <td><?= $row['nama_pelapor']; ?></td>
                            <td><?= $row['judul_pengaduan']; ?></td>
                            <td><?= $row['kategori_pengaduan']; ?></td>
                            <td>
                                <?php
                                $badge = 'secondary';
                                if($row['status'] == 'pending') $badge = 'warning';
                                if($row['status'] == 'diproses') $badge = 'info';
                                if($row['status'] == 'selesai') $badge = 'success';
                                if($row['status'] == 'ditolak') $badge = 'danger';
                                ?>
                                <span class="badge badge-<?= $badge; ?>"><?= ucfirst($row['status']); ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/pengaduan/detail/'.$row['id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

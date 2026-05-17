<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Berita / Kegiatan</h3>
                <div class="card-tools">
                    <a href="<?= base_url('admin/berita/tambah'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Berita</a>
                </div>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Thumbnail</th>
                            <th>Judul Berita</th>
                            <th>Kategori</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($berita as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if($row['thumbnail']): ?>
                                    <img src="<?= base_url('uploads/berita/'.$row['thumbnail']); ?>" width="100">
                                <?php else: ?>
                                    <span class="badge badge-secondary">No Image</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $row['judul']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= date('d/m/Y', strtotime($row['tanggal_publish'])); ?></td>
                            <td>
                                <span class="badge badge-<?= ($row['status_publish'] == 'publish') ? 'success' : 'warning'; ?>">
                                    <?= ucfirst($row['status_publish']); ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/berita/edit/'.$row['id']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/berita/hapus/'.$row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

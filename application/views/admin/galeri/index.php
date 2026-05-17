<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Galeri Foto Kegiatan</h3>
                <div class="card-tools">
                    <a href="<?= base_url('admin/galeri/tambah'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Foto</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php foreach ($galeri as $row): ?>
                    <div class="col-sm-3 mb-4">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= base_url('uploads/galeri/'.$row['foto']); ?>" class="card-img-top" alt="<?= $row['judul']; ?>" style="height: 200px; object-fit: cover;">
                            <div class="card-body p-2">
                                <h6 class="card-title fw-bold small mb-1"><?= $row['judul']; ?></h6>
                                <p class="card-text text-muted x-small"><?= $row['nama_kategori']; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted"><?= date('d/m/Y', strtotime($row['tanggal_upload'])); ?></small>
                                    <div>
                                        <a href="<?= base_url('admin/galeri/edit/'.$row['id']); ?>" class="text-warning mr-2"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/galeri/hapus/'.$row['id']); ?>" class="text-danger" onclick="return confirm('Hapus foto ini?')"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php if(empty($galeri)): ?>
                    <p class="text-center py-5">Belum ada foto di galeri.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

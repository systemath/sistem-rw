<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Berita & Kegiatan RW</h1>
        <p class="lead">Informasi terbaru seputar kegiatan dan perkembangan di lingkungan RW</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <?php foreach($berita as $row): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <?php if($row['thumbnail']): ?>
                    <img src="<?= base_url('uploads/berita/'.$row['thumbnail']); ?>" class="card-img-top" alt="<?= $row['judul']; ?>" style="height: 200px; object-fit: cover;">
                <?php else: ?>
                    <div class="bg-light text-center py-5" style="height: 200px;">
                        <i class="fas fa-image fa-3x text-muted"></i>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <small class="text-primary fw-bold"><?= $row['nama_kategori']; ?></small>
                        <small class="text-muted"><?= date('d M Y', strtotime($row['tanggal_publish'])); ?></small>
                    </div>
                    <h5 class="card-title fw-bold"><?= $row['judul']; ?></h5>
                    <p class="card-text text-muted"><?= character_limiter(strip_tags($row['isi']), 100); ?></p>
                </div>
                <div class="card-footer bg-white border-0">
                    <a href="<?= base_url('berita/'.$row['slug']); ?>" class="btn btn-outline-primary w-100">Selengkapnya</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if(empty($berita)): ?>
            <div class="col-12 text-center py-5">
                <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
                <h4>Belum ada berita yang diterbitkan.</h4>
            </div>
        <?php endif; ?>
    </div>
</div>

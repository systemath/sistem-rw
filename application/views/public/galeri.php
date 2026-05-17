<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Galeri Kegiatan RW</h1>
        <p class="lead">Dokumentasi momen kebersamaan dan kegiatan di lingkungan kami.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <?php foreach($galeri as $row): ?>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <img src="<?= base_url('uploads/galeri/'.$row['foto']); ?>" class="card-img-top" alt="<?= $row['judul']; ?>" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <small class="text-primary fw-bold"><?= $row['nama_kategori']; ?></small>
                    <h5 class="fw-bold mt-1"><?= $row['judul']; ?></h5>
                    <p class="card-text text-muted small"><?= character_limiter($row['deskripsi'], 100); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if(empty($galeri)): ?>
            <div class="col-12 text-center py-5">
                <h4>Galeri foto belum tersedia.</h4>
            </div>
        <?php endif; ?>
    </div>
</div>

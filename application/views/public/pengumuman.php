<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Pengumuman Terbaru</h1>
        <p class="lead">Informasi penting untuk seluruh warga RW 011.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <?php foreach($pengumuman as $row): ?>
        <div class="col-md-6 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <?php if($row['gambar']): ?>
                    <img src="<?= base_url('uploads/pengumuman/'.$row['gambar']); ?>" class="card-img-top" alt="<?= $row['judul']; ?>">
                <?php endif; ?>
                <div class="card-body">
                    <div class="badge bg-danger mb-2">Penting</div>
                    <h4 class="fw-bold"><?= $row['judul']; ?></h4>
                    <p class="text-muted"><?= nl2br($row['isi']); ?></p>
                    <hr>
                    <small class="text-muted"><i class="fas fa-calendar-alt me-1"></i> Diterbitkan pada: <?= date('d M Y', strtotime($row['tanggal_publish'])); ?></small>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php if(empty($pengumuman)): ?>
            <div class="col-12 text-center py-5">
                <h4>Belum ada pengumuman aktif.</h4>
            </div>
        <?php endif; ?>
    </div>
</div>

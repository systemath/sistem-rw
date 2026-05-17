<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('berita'); ?>">Berita</a></li>
                <li class="breadcrumb-item active"><?= $b['judul']; ?></li>
              </ol>
            </nav>

            <h1 class="fw-bold mb-3"><?= $b['judul']; ?></h1>
            <div class="d-flex align-items-center mb-4 text-muted">
                <span class="me-3"><i class="fas fa-user me-1"></i> <?= $b['penulis']; ?></span>
                <span class="me-3"><i class="fas fa-calendar-alt me-1"></i> <?= date('d F Y', strtotime($b['tanggal_publish'])); ?></span>
                <span><i class="fas fa-tag me-1"></i> <?= $b['nama_kategori']; ?></span>
            </div>

            <?php if($b['thumbnail']): ?>
                <img src="<?= base_url('uploads/berita/'.$b['thumbnail']); ?>" class="img-fluid rounded shadow mb-4 w-100">
            <?php endif; ?>

            <div class="content fs-5" style="line-height: 1.8;">
                <?= $b['isi']; ?>
            </div>

            <hr class="my-5">
            <a href="<?= base_url('berita'); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i> Kembali ke Berita</a>
        </div>
    </div>
</div>

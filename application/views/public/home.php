<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5 text-center" style="background: linear-gradient(rgba(0,123,255,0.8), rgba(0,123,255,0.8)), url('<?= base_url('assets/img/hero-bg.jpg'); ?>'); background-size: cover; background-position: center;">
    <div class="container py-5">
        <?php if($this->session->userdata('logged_in') && $this->session->userdata('role') == 'warga'): ?>
            <h1 class="display-4 fw-bold">Selamat Datang, <?= $this->session->userdata('nama'); ?>!</h1>
            <p class="lead">Gunakan layanan mandiri warga untuk keperluan administrasi dan pelaporan.</p>
            <div class="mt-4">
                <a href="#dashboard-warga" class="btn btn-light btn-lg px-4 me-2">Layanan Warga</a>
                <a href="<?= base_url('pengajuan-surat'); ?>" class="btn btn-outline-light btn-lg px-4">Ajukan Surat</a>
            </div>
        <?php else: ?>
            <h1 class="display-4 fw-bold">Selamat Datang di Sistem Informasi RW</h1>
            <p class="lead">Melayani warga dengan transparansi, kecepatan, dan kenyamanan digital.</p>
            <div class="mt-4">
                <a href="<?= base_url('kontak'); ?>" class="btn btn-light btn-lg px-4 me-2">Hubungi Kami</a>
                <a href="<?= base_url('login'); ?>" class="btn btn-outline-light btn-lg px-4">Portal Warga</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if($this->session->userdata('logged_in') && $this->session->userdata('role') == 'warga' && isset($warga)): ?>
<!-- Warga Dashboard Section -->
<section id="dashboard-warga" class="py-5 bg-white">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold"><i class="fas fa-desktop text-primary me-2"></i> Dashboard Layanan Warga</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <?php if ($warga['foto']): ?>
                            <img src="<?= base_url('uploads/warga/' . $warga['foto']); ?>" class="rounded-circle mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #f8f9fa;">
                        <?php else: ?>
                            <i class="fas fa-user-circle fa-7x text-muted mb-3"></i>
                        <?php endif; ?>
                        <h4 class="fw-bold mb-1"><?= $warga['nama_lengkap']; ?></h4>
                        <p class="text-muted mb-3"><?= $warga['nik']; ?></p>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="bg-light p-2 rounded">
                                    <h5 class="fw-bold mb-0"><?= $total_surat; ?></h5>
                                    <small class="text-muted">Total Surat</small>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="bg-light p-2 rounded">
                                    <h5 class="fw-bold mb-0"><?= $total_pengaduan; ?></h5>
                                    <small class="text-muted">Pengaduan</small>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-grid gap-2">
                            <a href="<?= base_url('warga/profil'); ?>" class="btn btn-primary"><i class="fas fa-edit me-2"></i> Lengkapi Profil</a>
                            <a href="<?= base_url('logout'); ?>" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt me-2"></i> Keluar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Riwayat Pengajuan Surat Terbaru</h5>
                        <a href="<?= base_url('pengajuan-surat'); ?>" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-3">Tanggal</th>
                                        <th>Jenis Surat</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($recent_surat as $rs): ?>
                                    <tr>
                                        <td class="ps-3"><?= date('d/m/Y', strtotime($rs['created_at'])); ?></td>
                                        <td><span class="fw-medium"><?= $rs['jenis_surat']; ?></span></td>
                                        <td>
                                            <?php
                                            $badge = 'secondary';
                                            if($rs['status'] == 'menunggu') $badge = 'warning';
                                            if($rs['status'] == 'diproses') $badge = 'info';
                                            if($rs['status'] == 'selesai') $badge = 'success';
                                            if($rs['status'] == 'ditolak') $badge = 'danger';
                                            ?>
                                            <span class="badge bg-<?= $badge; ?>"><?= ucfirst($rs['status']); ?></span>
                                        </td>
                                        <td class="text-center">
                                            <?php if($rs['status'] == 'selesai'): ?>
                                                <a href="<?= base_url('uploads/surat/'.$rs['file_surat_jadi']); ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-download"></i></a>
                                            <?php else: ?>
                                                <span class="text-muted small">Menunggu</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php if(empty($recent_surat)): ?>
                                        <tr><td colspan="4" class="text-center py-4 text-muted italic">Belum ada riwayat pengajuan surat.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Stats Section -->
<section class="stats-section py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm h-100 py-3">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-primary mb-3"></i>
                        <h2 class="fw-bold"><?= number_format($total_warga); ?></h2>
                        <p class="text-muted mb-0">Total Warga</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card border-0 shadow-sm h-100 py-3">
                    <div class="card-body">
                        <i class="fas fa-bullhorn fa-3x text-success mb-3"></i>
                        <h2 class="fw-bold"><?= count($pengumuman); ?></h2>
                        <p class="text-muted mb-0">Pengumuman Aktif</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100 py-3">
                    <div class="card-body">
                        <i class="fas fa-newspaper fa-3x text-warning mb-3"></i>
                        <h2 class="fw-bold"><?= count($berita); ?></h2>
                        <p class="text-muted mb-0">Berita Terkini</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Section -->
<section class="berita-section py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Berita & Kegiatan Terbaru</h2>
            <a href="<?= base_url('berita'); ?>" class="btn btn-outline-primary">Lihat Semua</a>
        </div>
        <div class="row">
            <?php if(!empty($berita)): foreach($berita as $b): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="<?= $b['thumbnail'] ? base_url('uploads/berita/'.$b['thumbnail']) : base_url('assets/img/no-image.jpg'); ?>" class="card-img-top" alt="<?= $b['judul']; ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex mb-2">
                            <small class="text-primary fw-bold mr-3"><i class="fas fa-tag"></i> <?= $b['nama_kategori']; ?></small>
                            <small class="text-muted"><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($b['tanggal_publish'])); ?></small>
                        </div>
                        <h5 class="card-title fw-bold">
                            <a href="<?= base_url('berita/'.$b['slug']); ?>" class="text-dark text-decoration-none"><?= $b['judul']; ?></a>
                        </h5>
                        <p class="card-text text-muted">
                            <?= word_limiter(strip_tags($b['isi']), 15); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="col-12 text-center py-4">
                <p class="text-muted italic">Belum ada berita yang diterbitkan.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Pengumuman Section -->
<section class="pengumuman-section py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Pengumuman Penting</h2>
            <a href="<?= base_url('pengumuman'); ?>" class="btn btn-outline-success">Lihat Semua</a>
        </div>
        <div class="row">
            <?php if(!empty($pengumuman)): foreach($pengumuman as $p): ?>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm border-start border-success border-4 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title fw-bold mb-0"><?= $p['judul']; ?></h5>
                            <span class="badge bg-success"><?= date('d M Y', strtotime($p['tanggal_publish'])); ?></span>
                        </div>
                        <p class="card-text text-muted"><?= word_limiter(strip_tags($p['isi']), 25); ?></p>
                        <a href="<?= base_url('pengumuman'); ?>" class="btn btn-sm btn-link text-success p-0">Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; else: ?>
            <div class="col-12 text-center py-4">
                <p class="text-muted italic">Belum ada pengumuman terbaru.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if(!$this->session->userdata('logged_in')): ?>
<!-- Call to Action -->
<section class="cta-section py-5 bg-dark text-white text-center">
    <div class="container">
        <h2 class="fw-bold">Butuh Layanan Surat atau Ingin Melapor?</h2>
        <p class="lead mb-4">Silakan login ke Portal Warga untuk mengakses layanan administrasi RW secara mandiri.</p>
        <a href="<?= base_url('login'); ?>" class="btn btn-primary btn-lg px-5">Login Warga</a>
    </div>
</section>
<?php endif; ?>

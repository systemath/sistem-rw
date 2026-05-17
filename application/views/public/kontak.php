<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">Hubungi Kami</h1>
        <p class="lead">Silakan sampaikan pertanyaan atau masukan Anda melalui form di bawah ini.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6 mb-5">
            <h3 class="fw-bold mb-4">Informasi Kontak</h3>
            <div class="d-flex mb-4">
                <div class="flex-shrink-0">
                    <i class="fas fa-map-marker-alt fs-4 text-primary"></i>
                </div>
                <div class="ms-3">
                    <h5 class="fw-bold mb-1">Alamat Sekretariat</h5>
                    <p class="text-muted">Jl. Mawar No. 123, Kelurahan Mekar Sari, Kecamatan Indah Permai, Kota Digital.</p>
                </div>
            </div>
            <div class="d-flex mb-4">
                <div class="flex-shrink-0">
                    <i class="fas fa-phone fs-4 text-primary"></i>
                </div>
                <div class="ms-3">
                    <h5 class="fw-bold mb-1">Telepon / WhatsApp</h5>
                    <p class="text-muted">(021) 12345678 / 0812-3456-7890</p>
                </div>
            </div>
            <div class="d-flex mb-4">
                <div class="flex-shrink-0">
                    <i class="fas fa-envelope fs-4 text-primary"></i>
                </div>
                <div class="ms-3">
                    <h5 class="fw-bold mb-1">Email</h5>
                    <p class="text-muted">info@rwonline.id / sekretariat@rwonline.id</p>
                </div>
            </div>
            <div class="mt-4">
                <h5 class="fw-bold mb-3">Jam Operasional</h5>
                <p class="mb-1 text-muted">Senin - Jumat: 08.00 - 16.00 WIB</p>
                <p class="text-muted">Sabtu: 08.00 - 12.00 WIB</p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-4">
                <h3 class="fw-bold mb-4">Kirim Pesan</h3>
                <?php if($this->session->flashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('landing/kirim_pesan'); ?>" method="post">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <textarea name="pesan" class="form-control" rows="5" placeholder="Tuliskan pesan Anda di sini..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>

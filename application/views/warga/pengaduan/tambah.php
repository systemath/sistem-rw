<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Laporan Pengaduan Warga</h3>
            </div>
            <form action="<?= base_url('warga/pengaduan/tambah'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul Pengaduan <span class="text-danger">*</span></label>
                        <input type="text" name="judul_pengaduan" class="form-control" placeholder="Apa yang ingin diadukan?" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori Pengaduan</label>
                        <select name="kategori_pengaduan" class="form-control">
                            <option value="Kebersihan">Kebersihan</option>
                            <option value="Keamanan">Keamanan</option>
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Lingkungan">Lingkungan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Isi Pengaduan <span class="text-danger">*</span></label>
                        <textarea name="isi_pengaduan" class="form-control" rows="5" placeholder="Jelaskan detail pengaduan Anda..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Bukti (Opsional)</label>
                        <input type="file" name="foto_bukti" class="form-control-file">
                        <small class="text-muted">Format: jpg, jpeg, png. Max: 2MB</small>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url('pengaduan'); ?>" class="btn btn-default">Kembali</a>
                    <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                </div>
            </form>
        </div>
    </div>
</div>

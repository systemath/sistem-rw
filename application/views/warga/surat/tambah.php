<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Pengajuan Surat Pengantar</h3>
            </div>
            <form action="<?= base_url('warga/surat/tambah'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Jenis Surat <span class="text-danger">*</span></label>
                        <select name="jenis_surat" class="form-control" required>
                            <option value="">-- Pilih Jenis Surat --</option>
                            <option value="Surat Domisili">Surat Keterangan Domisili</option>
                            <option value="Surat Usaha">Surat Keterangan Usaha</option>
                            <option value="Surat Tidak Mampu">Surat Keterangan Tidak Mampu (SKTM)</option>
                            <option value="Surat Pengantar Umum">Surat Pengantar Umum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keperluan <span class="text-danger">*</span></label>
                        <textarea name="keperluan" class="form-control" rows="3" placeholder="Contoh: Mengurus KTP, Melamar Pekerjaan, dll" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Keterangan Tambahan (Opsional)</label>
                        <textarea name="keterangan" class="form-control" rows="2" placeholder="Informasi tambahan jika ada"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Upload File Persyaratan (KTP/KK) <span class="text-muted small">(Opsional, Format: PDF/JPG/PNG)</span></label>
                        <input type="file" name="file_persyaratan" class="form-control-file">
                    </div>
                    <div class="alert alert-info">
                        <h5><i class="icon fas fa-info"></i> Informasi</h5>
                        Pastikan data yang Anda masukkan sudah benar. Pengajuan akan diproses oleh Admin RW dalam 1-2 hari kerja.
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                    <a href="<?= base_url('pengajuan-surat'); ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Foto ke Galeri</h3>
            </div>
            <form action="<?= base_url('admin/galeri/tambah'); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul Foto</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul kegiatan" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori Galeri</label>
                        <select name="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach($kategori as $k): ?>
                                <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi (Opsional)</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Keterangan singkat"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pilih Foto</label>
                        <input type="file" name="foto" class="form-control-file" required>
                        <small class="text-muted">Format: jpg, jpeg, png. Max: 2MB</small>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url('admin/galeri'); ?>" class="btn btn-default">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan ke Galeri</button>
                </div>
            </form>
        </div>
    </div>
</div>

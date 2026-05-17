<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Foto Galeri: <?= $g['judul']; ?></h3>
            </div>
            <form action="<?= base_url('admin/galeri/edit/'.$g['id']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul Foto</label>
                        <input type="text" name="judul" class="form-control" value="<?= $g['judul']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori_id" class="form-control" required>
                            <?php foreach($kategori as $k): ?>
                                <option value="<?= $k['id']; ?>" <?= ($g['kategori_id'] == $k['id']) ? 'selected' : ''; ?>><?= $k['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"><?= $g['deskripsi']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Baru (Kosongkan jika tidak diubah)</label>
                        <input type="file" name="foto" class="form-control-file">
                        <?php if($g['foto']): ?>
                            <img src="<?= base_url('uploads/galeri/'.$g['foto']); ?>" width="200" class="mt-2 rounded shadow">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update Foto</button>
                    <a href="<?= base_url('admin/galeri'); ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
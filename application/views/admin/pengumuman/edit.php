<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Pengumuman: <?= $p['judul']; ?></h3>
            </div>
            <form action="<?= base_url('admin/pengumuman/edit/'.$p['id']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Judul Pengumuman</label>
                                <input type="text" name="judul" class="form-control" value="<?= $p['judul']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Pengumuman</label>
                                <textarea name="isi" class="form-control" rows="10" required><?= $p['isi']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Publish</label>
                                <input type="date" name="tanggal_publish" class="form-control" value="<?= $p['tanggal_publish']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_publish" class="form-control">
                                    <option value="publish" <?= ($p['status_publish'] == 'publish') ? 'selected' : ''; ?>>Publish</option>
                                    <option value="draft" <?= ($p['status_publish'] == 'draft') ? 'selected' : ''; ?>>Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gambar Baru (Kosongkan jika tidak diubah)</label>
                                <input type="file" name="gambar" class="form-control-file">
                                <?php if($p['gambar']): ?>
                                    <img src="<?= base_url('uploads/pengumuman/'.$p['gambar']); ?>" width="100%" class="mt-2 rounded shadow">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update Pengumuman</button>
                    <a href="<?= base_url('admin/pengumuman'); ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
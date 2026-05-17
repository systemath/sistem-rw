<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Berita: <?= $b['judul']; ?></h3>
            </div>
            <form action="<?= base_url('admin/berita/edit/'.$b['id']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Judul Berita</label>
                                <input type="text" name="judul" class="form-control" value="<?= $b['judul']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Berita</label>
                                <textarea name="isi" id="editor" class="form-control" rows="10"><?= $b['isi']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori_id" class="form-control" required>
                                    <?php foreach($kategori as $k): ?>
                                        <option value="<?= $k['id']; ?>" <?= ($b['kategori_id'] == $k['id']) ? 'selected' : ''; ?>><?= $k['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Publish</label>
                                <input type="date" name="tanggal_publish" class="form-control" value="<?= $b['tanggal_publish']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_publish" class="form-control">
                                    <option value="publish" <?= ($b['status_publish'] == 'publish') ? 'selected' : ''; ?>>Publish</option>
                                    <option value="draft" <?= ($b['status_publish'] == 'draft') ? 'selected' : ''; ?>>Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail Baru (Kosongkan jika tidak diubah)</label>
                                <input type="file" name="thumbnail" class="form-control-file">
                                <?php if($b['thumbnail']): ?>
                                    <img src="<?= base_url('uploads/berita/'.$b['thumbnail']); ?>" width="100%" class="mt-2 rounded shadow">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update Berita</button>
                    <a href="<?= base_url('admin/berita'); ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>

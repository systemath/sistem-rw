<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit FAQ</h3>
            </div>
            <form action="<?= base_url('admin/faq/edit/'.$f['id']); ?>" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input type="text" name="pertanyaan" class="form-control" value="<?= $f['pertanyaan']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jawaban</label>
                        <textarea name="jawaban" class="form-control" rows="5" required><?= $f['jawaban']; ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning">Update FAQ</button>
                    <a href="<?= base_url('admin/faq'); ?>" class="btn btn-default">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
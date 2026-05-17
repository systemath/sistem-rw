<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah FAQ Baru</h3>
            </div>
            <form action="<?= base_url('admin/faq/tambah'); ?>" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pertanyaan</label>
                        <input type="text" name="pertanyaan" class="form-control" placeholder="Apa pertanyaannya?" required>
                    </div>
                    <div class="form-group">
                        <label>Jawaban</label>
                        <textarea name="jawaban" class="form-control" rows="5" placeholder="Berikan jawabannya..." required></textarea>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= base_url('admin/faq'); ?>" class="btn btn-default">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan FAQ</button>
                </div>
            </form>
        </div>
    </div>
</div>

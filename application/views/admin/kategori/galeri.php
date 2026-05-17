<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Tambah Kategori</h3></div>
            <form action="<?= base_url('admin/kategori/galeri_tambah'); ?>" method="post">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control" required>
                    </div>
                </div>
                <div class="card-footer"><button type="submit" class="btn btn-primary btn-block">Simpan</button></div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Daftar Kategori Galeri</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead><tr><th>No</th><th>Nama Kategori</th><th>Aksi</th></tr></thead>
                    <tbody>
                        <?php $no=1; foreach($kategori as $k): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $k['nama_kategori']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/kategori/galeri_hapus/'.$k['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

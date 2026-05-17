<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Pengaduan</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="40%">Nama Pelapor</th>
                        <td>: <?= $p['nama_pelapor']; ?></td>
                    </tr>
                    <tr>
                        <th>Judul</th>
                        <td>: <?= $p['judul_pengaduan']; ?></td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: <?= $p['kategori_pengaduan']; ?></td>
                    </tr>
                    <tr>
                        <th>Isi Pengaduan</th>
                        <td>: <?= $p['isi_pengaduan']; ?></td>
                    </tr>
                    <tr>
                        <th>Foto Bukti</th>
                        <td>: 
                            <?php if($p['foto_bukti']): ?>
                                <br><img src="<?= base_url('uploads/pengaduan/'.$p['foto_bukti']); ?>" class="img-fluid rounded mt-2" style="max-height: 300px;">
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>: <span class="badge badge-info"><?= ucfirst($p['status']); ?></span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Berikan Tanggapan / Update Status</h3>
            </div>
            <form action="<?= base_url('admin/pengaduan/tanggapi/'.$p['id']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="pending" <?= ($p['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                            <option value="diproses" <?= ($p['status'] == 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                            <option value="selesai" <?= ($p['status'] == 'selesai') ? 'selected' : ''; ?>>Selesai</option>
                            <option value="ditolak" <?= ($p['status'] == 'ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggapan Admin</label>
                        <textarea name="tanggapan_admin" class="form-control" rows="5" placeholder="Masukkan tanggapan atau solusi..."><?= $p['tanggapan_admin']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Tindak Lanjut (Opsional)</label>
                        <input type="file" name="foto_tindak_lanjut" class="form-control-file">
                        <?php if($p['foto_tindak_lanjut']): ?>
                            <img src="<?= base_url('uploads/pengaduan/'.$p['foto_tindak_lanjut']); ?>" class="img-fluid rounded mt-2" style="max-height: 200px;">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-block">Simpan Tanggapan</button>
                    <a href="<?= base_url('admin/pengaduan'); ?>" class="btn btn-default btn-block">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

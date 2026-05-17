<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Pengajuan</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="30%">Nama Warga</th>
                        <td>: <?= $s['nama_lengkap']; ?></td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>: <?= $s['nik']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>: <?= $s['alamat']; ?> (RT <?= $s['rt']; ?> / RW <?= $s['rw']; ?>)</td>
                    </tr>
                    <tr>
                        <th>Jenis Surat</th>
                        <td>: <?= $s['jenis_surat']; ?></td>
                    </tr>
                    <tr>
                        <th>Keperluan</th>
                        <td>: <?= $s['keperluan']; ?></td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>: <?= $s['keterangan']; ?></td>
                    </tr>
                    <tr>
                        <th>File Persyaratan</th>
                        <td>: 
                            <?php if($s['file_persyaratan']): ?>
                                <a href="<?= base_url('uploads/surat/'.$s['file_persyaratan']); ?>" target="_blank" class="btn btn-xs btn-info"><i class="fas fa-download"></i> Lihat File</a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>: 
                            <span class="badge badge-info"><?= ucfirst($s['status']); ?></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Status Pengajuan</h3>
            </div>
            <form action="<?= base_url('admin/surat/update_status/'.$s['id']); ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="status_surat">
                            <option value="menunggu" <?= ($s['status'] == 'menunggu') ? 'selected' : ''; ?>>Menunggu</option>
                            <option value="diproses" <?= ($s['status'] == 'diproses') ? 'selected' : ''; ?>>Diproses</option>
                            <option value="ditolak" <?= ($s['status'] == 'ditolak') ? 'selected' : ''; ?>>Ditolak</option>
                            <option value="selesai" <?= ($s['status'] == 'selesai') ? 'selected' : ''; ?>>Selesai (Upload Surat)</option>
                        </select>
                    </div>
                    <div id="form_selesai" style="<?= ($s['status'] == 'selesai') ? '' : 'display:none;'; ?>">
                        <div class="form-group">
                            <label>Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="<?= $s['nomor_surat']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Upload File Surat Jadi (PDF)</label>
                            <input type="file" name="file_surat_jadi" class="form-control-file">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                    <a href="<?= base_url('admin/surat'); ?>" class="btn btn-default btn-block">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('status_surat').addEventListener('change', function() {
        if (this.value === 'selesai') {
            document.getElementById('form_selesai').style.display = 'block';
        } else {
            document.getElementById('form_selesai').style.display = 'none';
        }
    });
</script>

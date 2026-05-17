<div class="row">
    <div class="col-12">
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info-circle"></i> Informasi Pengambilan Surat</h5>
            Untuk dokumen fisik (cetak), silakan mengambilnya di <strong>Sekretariat RW</strong> pada jam operasional atau silakan menghubungi <strong>Pengurus RW (081234567891)</strong> terlebih dahulu untuk koordinasi pengambilan.
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Riwayat Pengajuan Surat Saya</h3>
                <div class="card-tools">
                    <a href="<?= base_url('warga/surat/tambah'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Buat Pengajuan Baru</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jenis Surat</th>
                            <th>Status</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($surat as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d/m/Y', strtotime($row['tanggal_pengajuan'])); ?></td>
                            <td><?= $row['jenis_surat']; ?></td>
                            <td>
                                <?php
                                $badge = 'secondary';
                                if($row['status'] == 'menunggu') $badge = 'warning';
                                if($row['status'] == 'diproses') $badge = 'info';
                                if($row['status'] == 'selesai') $badge = 'success';
                                if($row['status'] == 'ditolak') $badge = 'danger';
                                ?>
                                <span class="badge badge-<?= $badge; ?>"><?= ucfirst($row['status']); ?></span>
                            </td>
                            <td><?= ($row['tanggal_selesai']) ? date('d/m/Y', strtotime($row['tanggal_selesai'])) : '-'; ?></td>
                            <td>
                                <?php if($row['status'] == 'selesai'): ?>
                                    <a href="<?= base_url('uploads/surat/'.$row['file_surat_jadi']); ?>" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-download"></i> Download Surat</a>
                                <?php elseif($row['status'] == 'ditolak'): ?>
                                    <span class="text-danger small">Maaf, pengajuan Anda ditolak.</span>
                                <?php else: ?>
                                    <span class="text-muted small">Sedang dalam proses.</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if(empty($surat)): ?>
                            <tr><td colspan="6" class="text-center">Belum ada riwayat pengajuan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

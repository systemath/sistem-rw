<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengaduan Saya</h3>
                <div class="card-tools">
                    <a href="<?= base_url('warga/pengaduan/tambah'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Buat Pengaduan</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Tanggapan Admin</th>
                            <th>Bukti Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($pengaduan as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d/m/Y', strtotime($row['created_at'])); ?></td>
                            <td><?= $row['judul_pengaduan']; ?></td>
                            <td>
                                <?php
                                $badge = 'secondary';
                                if($row['status'] == 'pending') $badge = 'warning';
                                if($row['status'] == 'diproses') $badge = 'info';
                                if($row['status'] == 'selesai') $badge = 'success';
                                if($row['status'] == 'ditolak') $badge = 'danger';
                                ?>
                                <span class="badge badge-<?= $badge; ?>"><?= ucfirst($row['status']); ?></span>
                            </td>
                            <td><?= $row['tanggapan_admin'] ?? '-'; ?></td>
                            <td>
                                <?php if ($row['foto_tindak_lanjut']): ?>
                                    <a href="<?= base_url('uploads/pengaduan/' . $row['foto_tindak_lanjut']); ?>" target="_blank">
                                        <img src="<?= base_url('uploads/pengaduan/' . $row['foto_tindak_lanjut']); ?>" width="100" class="img-thumbnail">
                                    </a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDetail<?= $row['id']; ?>">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="modalDetail<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Pengaduan: <?= $row['judul_pengaduan']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6><strong>Laporan Warga:</strong></h6>
                                                <p><?= $row['isi_pengaduan']; ?></p>
                                                <?php if($row['foto_bukti']): ?>
                                                    <img src="<?= base_url('uploads/pengaduan/'.$row['foto_bukti']); ?>" class="img-fluid rounded mb-3" alt="Foto Bukti">
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-6 border-left">
                                                <h6><strong>Tanggapan Admin / Bukti Selesai:</strong></h6>
                                                <p><?= $row['tanggapan_admin'] ? $row['tanggapan_admin'] : 'Belum ada tanggapan.'; ?></p>
                                                <?php if($row['foto_tindak_lanjut']): ?>
                                                    <label>Foto Bukti Selesai:</label>
                                                    <img src="<?= base_url('uploads/pengaduan/'.$row['foto_tindak_lanjut']); ?>" class="img-fluid rounded" alt="Foto Tindak Lanjut">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php if(empty($pengaduan)): ?>
                            <tr><td colspan="7" class="text-center">Belum ada pengaduan.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

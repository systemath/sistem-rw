<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php if ($warga['foto']): ?>
                        <img class="profile-user-img img-fluid img-circle"
                             src="<?= base_url('uploads/warga/' . $warga['foto']); ?>"
                             alt="User profile picture"
                             style="width: 100px; height: 100px; object-fit: cover;">
                    <?php else: ?>
                        <i class="fas fa-user-circle fa-5x text-muted mb-3"></i>
                    <?php endif; ?>
                </div>
                <h3 class="profile-username text-center"><?= $warga['nama_lengkap']; ?></h3>
                <p class="text-muted text-center"><?= $warga['nik']; ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Total Surat</b> <a class="float-right"><?= $total_surat; ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>Total Pengaduan</b> <a class="float-right"><?= $total_pengaduan; ?></a>
                    </li>
                </ul>
                <a href="<?= base_url('warga/profil'); ?>" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Riwayat Pengajuan Surat Terbaru</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('pengajuan-surat'); ?>" class="btn btn-tool btn-sm">
                                <i class="fas fa-list"></i> Lihat Semua
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Jenis Surat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($recent_surat as $rs): ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($rs['created_at'])); ?></td>
                                    <td><?= $rs['jenis_surat']; ?></td>
                                    <td>
                                        <?php
                                        $badge = 'secondary';
                                        if($rs['status'] == 'menunggu') $badge = 'warning';
                                        if($rs['status'] == 'diproses') $badge = 'info';
                                        if($rs['status'] == 'selesai') $badge = 'success';
                                        if($rs['status'] == 'ditolak') $badge = 'danger';
                                        ?>
                                        <span class="badge badge-<?= $badge; ?>"><?= ucfirst($rs['status']); ?></span>
                                    </td>
                                    <td>
                                        <?php if($rs['status'] == 'selesai'): ?>
                                            <a href="<?= base_url('uploads/surat/'.$rs['file_surat_jadi']); ?>" class="text-success" target="_blank"><i class="fas fa-download"></i> Download</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php if(empty($recent_surat)): ?>
                                    <tr><td colspan="4" class="text-center">Belum ada riwayat pengajuan.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

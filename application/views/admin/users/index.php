<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pengguna Sistem</h3>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Last Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($users as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['username']; ?></td>
                            <td>
                                <span class="badge badge-<?= ($row['role'] == 'admin') ? 'danger' : 'info'; ?>">
                                    <?= ucfirst($row['role']); ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-<?= ($row['status_akun'] == 'aktif') ? 'success' : 'secondary'; ?>">
                                    <?= ucfirst($row['status_akun']); ?>
                                </span>
                            </td>
                            <td><?= ($row['last_login']) ? date('d/m/Y H:i', strtotime($row['last_login'])) : '-'; ?></td>
                            <td>
                                <?php if($row['status_akun'] == 'aktif'): ?>
                                    <a href="<?= base_url('admin/users/status/'.$row['id'].'/nonaktif'); ?>" class="btn btn-secondary btn-sm" onclick="return confirm('Nonaktifkan akun ini?')"><i class="fas fa-ban"></i></a>
                                <?php else: ?>
                                    <a href="<?= base_url('admin/users/status/'.$row['id'].'/aktif'); ?>" class="btn btn-success btn-sm" onclick="return confirm('Aktifkan akun ini?')"><i class="fas fa-check"></i></a>
                                <?php endif; ?>
                                <a href="<?= base_url('admin/users/reset_password/'.$row['id']); ?>" class="btn btn-warning btn-sm" onclick="return confirm('Reset password menjadi 123456?')"><i class="fas fa-key"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

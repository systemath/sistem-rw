<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Log Aktivitas Pengguna</h3>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Waktu</th>
                            <th>User</th>
                            <th>Aktivitas</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($logs as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d/m/Y H:i:s', strtotime($row['created_at'])); ?></td>
                            <td><?= $row['nama_user'] ?? 'Guest'; ?></td>
                            <td><?= $row['aktivitas']; ?></td>
                            <td><?= $row['ip_address']; ?></td>
                            <td><small><?= $row['user_agent']; ?></small></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

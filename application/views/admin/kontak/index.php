<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Pesan Masuk dari Website</h3>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($pesan as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['created_at'])); ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= nl2br($row['pesan']); ?></td>
                            <td>
                                <a href="<?= base_url('admin/kontak/hapus/'.$row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pesan ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if(empty($pesan)): ?>
                    <p class="text-center py-5">Belum ada pesan masuk.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

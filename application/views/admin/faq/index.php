<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar FAQ (Frequently Asked Questions)</h3>
                <div class="card-tools">
                    <a href="<?= base_url('admin/faq/tambah'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah FAQ</a>
                </div>
            </div>
            <div class="card-body">
                <div id="accordion">
                    <?php $no = 1; foreach ($faq as $row): ?>
                    <div class="card card-outline card-info mb-2">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapse<?= $row['id']; ?>">
                                    <?= $no++; ?>. <?= $row['pertanyaan']; ?>
                                </a>
                            </h4>
                            <div class="card-tools">
                                <a href="<?= base_url('admin/faq/edit/'.$row['id']); ?>" class="btn btn-tool text-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/faq/hapus/'.$row['id']); ?>" class="btn btn-tool text-danger" onclick="return confirm('Hapus FAQ ini?')"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                        <div id="collapse<?= $row['id']; ?>" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <?= $row['jawaban']; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php if(empty($faq)): ?>
                    <p class="text-center py-5">Belum ada FAQ.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

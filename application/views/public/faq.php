<div class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold">FAQ (Tanya Jawab)</h1>
        <p class="lead">Pertanyaan yang sering diajukan seputar layanan RW.</p>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="accordion" id="accordionFaq">
                <?php $i = 1; foreach($faq as $row): ?>
                <div class="accordion-item mb-3 border-0 shadow-sm">
                    <h2 class="accordion-header">
                        <button class="accordion-button <?= ($i > 1) ? 'collapsed' : ''; ?> fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $row['id']; ?>">
                            <?= $row['pertanyaan']; ?>
                        </button>
                    </h2>
                    <div id="faq<?= $row['id']; ?>" class="accordion-collapse collapse <?= ($i == 1) ? 'show' : ''; ?>" data-bs-parent="#accordionFaq">
                        <div class="accordion-body">
                            <?= nl2br($row['jawaban']); ?>
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach; ?>

                <?php if(empty($faq)): ?>
                    <div class="text-center">
                        <p class="text-muted">Belum ada data FAQ.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

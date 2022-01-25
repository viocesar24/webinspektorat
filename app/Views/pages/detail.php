<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">BERITA</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home/">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/berita/">Berita</a></li>
            </ol>
        </nav>
    </div>
</div>
<div class="bg-light bg-gradient p-5">
    <div class="card shadow">
        <div class="ratio ratio-21x9">
            <img src="<?= esc($beritaDetail['gambar']) ?>" class="img-fluid card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h2 class="text-center fw-bold"><?= esc($beritaDetail['judul']) ?></h2>
            <p class="fw-light"><i class="bi bi-clock"></i> <?= esc($beritaDetail['waktu']) ?></p>
            <p><?= esc($beritaDetail['badan']) ?></p>
        </div>
    </div>
</div>
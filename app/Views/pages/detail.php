<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">BERITA</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home/view/berita">Berita</a></li>
            </ol>
        </nav>
    </div>
</div>
<?php if (!empty($beritaDetail) && is_array($beritaDetail) && $slug) : ?>
    <div class="bg-light bg-gradient p-5">
        <div class="card shadow">
            <div id="<?= esc($beritaDetail['slug']) ?>" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner ratio ratio-16x9">
                    <div class="carousel-item active">
                        <img src="<?= esc($beritaDetail['gambar_1']) ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= esc($beritaDetail['gambar_2']) ?>" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <h2 class="text-center fw-bold"><?= esc($beritaDetail['judul']) ?></h2>
                <p class="fw-light"><i class="bi bi-clock"></i> <?= esc($beritaDetail['waktu']) ?></p>
                <p><?= esc($beritaDetail['badan']) ?></p>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="bg-light bg-gradient p-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="text-center fw-bold">BERITA TAK DITEMUKAN</h1>
            </div>
        </div>
    </div>
<?php endif ?>
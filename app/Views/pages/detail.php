<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">BERITA</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item">
                    <a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>">Beranda</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                <li class="breadcrumb-item">
                    <a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home/view/berita">Berita</a>
                </li>
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
                <?php if ($beritaDetail['gambar_3'] != '' || $beritaDetail['gambar_3'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_4'] != '' || $beritaDetail['gambar_4'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_5'] != '' || $beritaDetail['gambar_5'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="4" aria-label="Slide 5"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_6'] != '' || $beritaDetail['gambar_6'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="5" aria-label="Slide 6"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_7'] != '' || $beritaDetail['gambar_7'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="6" aria-label="Slide 7"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_8'] != '' || $beritaDetail['gambar_8'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="7" aria-label="Slide 8"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_9'] != '' || $beritaDetail['gambar_9'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="8" aria-label="Slide 9"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_10'] != '' || $beritaDetail['gambar_10'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="9" aria-label="Slide 10"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_11'] != '' || $beritaDetail['gambar_11'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="10" aria-label="Slide 11"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_12'] != '' || $beritaDetail['gambar_12'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="11" aria-label="Slide 12"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_13'] != '' || $beritaDetail['gambar_13'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="12" aria-label="Slide 13"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_14'] != '' || $beritaDetail['gambar_14'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="13" aria-label="Slide 14"></button>
                <?php } ?>
                <?php if ($beritaDetail['gambar_15'] != '' || $beritaDetail['gambar_15'] != null) { ?>
                <button type="button" data-bs-target="#<?= esc($beritaDetail['slug']) ?>" data-bs-slide-to="14" aria-label="Slide 15"></button>
                <?php } ?>
            </div>
            <div class="carousel-inner ratio ratio-21x9">
                <div class="carousel-item active">
                    <img src="<?= esc($beritaDetail['gambar_1']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_2']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php if ($beritaDetail['gambar_3'] != '' || $beritaDetail['gambar_3'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_3']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_4'] != '' || $beritaDetail['gambar_4'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_4']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_5'] != '' || $beritaDetail['gambar_5'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_5']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_6'] != '' || $beritaDetail['gambar_6'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_6']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_7'] != '' || $beritaDetail['gambar_7'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_7']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_8'] != '' || $beritaDetail['gambar_8'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_8']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_9'] != '' || $beritaDetail['gambar_9'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_9']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_10'] != '' || $beritaDetail['gambar_10'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_10']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_11'] != '' || $beritaDetail['gambar_11'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_11']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_12'] != '' || $beritaDetail['gambar_12'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_12']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_13'] != '' || $beritaDetail['gambar_13'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_13']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_14'] != '' || $beritaDetail['gambar_14'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_14']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
                <?php if ($beritaDetail['gambar_15'] != '' || $beritaDetail['gambar_15'] != null) { ?>
                <div class="carousel-item">
                    <img src="<?= esc($beritaDetail['gambar_15']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                </div>
                <?php } ?>
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
            <h2 class="text-center fw-bold">
                <?= esc($beritaDetail['judul']) ?>
            </h2>
            <p class="fw-light">
                <i class="bi bi-clock"></i><?= esc($beritaDetail['waktu']) ?>
            </p>
            <div contenteditable="false">
                <?= $beritaDetail['badan'] ?>
            </div>
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
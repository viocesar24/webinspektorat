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
                <li class="breadcrumb-item active" aria-current="page">Berita</li>
            </ol>
        </nav>
    </div>
</div>
<div class="bg-light bg-gradient p-5">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fw-bold p-0 m-0">KATEGORI</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="<?php echo base_url(); ?>/home/view/berita" class="list-group-item list-group-item-action active" aria-current="page">
                        Berita
                    </a>
                    <a href="<?php echo base_url(); ?>/home/view/berkas" class="list-group-item list-group-item-action">
                        Informasi Publik
                    </a>
                    <a href="<?php echo base_url(); ?>/home/view/kegiatan" class="list-group-item list-group-item-action">
                        Kegiatan
                    </a>
                </div>
            </div>
        </div>
        <!-- KODE DI BAWAH DIGUNAKAN UNTUK MENAMPILKAN DATA BERITA YANG TELAH DIAMBIL DARI DATABASE -->
        <!-- JIKA DATA BERITA KOSONG, ATAU DATA BUKAN ARRAY, MAKA PROSES DILANJUTKAN PADA BAGIAN else -->
        <?php if (!empty($cariBerita) && is_array($cariBerita) && $kunci) : ?>
        <div class="col-md-9">
            <div class="card bg-light bg-gradient shadow">
                <div class="card-header text-center">
                    <h5 class="fw-bold p-0 m-0">BERITA TERKINI</h5>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-1 g-3 p-3">
                        <!-- KODE DI BAWAH DIGUNAKAN UNTUK MENAMPILKAN ARRAY SETIAP DATA BERITA -->
                        <!-- UNTUK MEMANGGIL SETIAP BAGIAN DARI SETIAP DATA BERITA, DIGUNAKAN OBJEK $news_item['NAMA_KOLOM'] -->
                        <?php foreach ($cariBerita as $news_item) : ?>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <div id="<?= esc($news_item['slug']) ?>" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <?php if ($news_item['gambar_3'] != '' || $news_item['gambar_3'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_4'] != '' || $news_item['gambar_4'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_5'] != '' || $news_item['gambar_5'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_6'] != '' || $news_item['gambar_6'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="5" aria-label="Slide 6"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_7'] != '' || $news_item['gambar_7'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="6" aria-label="Slide 7"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_8'] != '' || $news_item['gambar_8'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="7" aria-label="Slide 8"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_9'] != '' || $news_item['gambar_9'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="8" aria-label="Slide 9"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_10'] != '' || $news_item['gambar_10'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="9" aria-label="Slide 10"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_11'] != '' || $news_item['gambar_11'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="10" aria-label="Slide 11"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_12'] != '' || $news_item['gambar_12'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="11" aria-label="Slide 12"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_13'] != '' || $news_item['gambar_13'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="12" aria-label="Slide 13"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_14'] != '' || $news_item['gambar_14'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="13" aria-label="Slide 14"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_15'] != '' || $news_item['gambar_15'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="14" aria-label="Slide 15"></button>
                                        <?php } ?>
                                    </div>
                                    <div class="carousel-inner ratio ratio-21x9">
                                        <div class="carousel-item active">
                                            <img src="<?= esc($news_item['gambar_1']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_2']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php if ($news_item['gambar_3'] != '' || $news_item['gambar_3'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_3']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_4'] != '' || $news_item['gambar_4'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_4']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_5'] != '' || $news_item['gambar_5'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_5']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_6'] != '' || $news_item['gambar_6'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_6']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_7'] != '' || $news_item['gambar_7'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_7']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_8'] != '' || $news_item['gambar_8'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_8']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_9'] != '' || $news_item['gambar_9'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_9']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_10'] != '' || $news_item['gambar_10'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_10']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_11'] != '' || $news_item['gambar_11'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_11']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_12'] != '' || $news_item['gambar_12'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_12']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_13'] != '' || $news_item['gambar_13'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_13']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_14'] != '' || $news_item['gambar_14'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_14']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_15'] != '' || $news_item['gambar_15'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_15']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= esc($news_item['judul']) ?>
                                    </h5>
                                    <p class="card-text text-truncate">
                                        <?= esc($news_item['badan']) ?>
                                    </p>
                                    <a href="/home/view/detail/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-dark">Selengkapnya...</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">
                                        <?= esc($news_item['waktu']) ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <?php elseif (!empty($beritaHalaman) && is_array($beritaHalaman)) : ?>
        <div class="col-md-9">
            <div class="card bg-light bg-gradient shadow">
                <div class="card-header text-center">
                    <h5 class="fw-bold p-0 m-0">BERITA TERKINI</h5>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-1 g-3 p-3">
                        <!-- KODE DI BAWAH DIGUNAKAN UNTUK MENAMPILKAN ARRAY SETIAP DATA BERITA -->
                        <!-- UNTUK MEMANGGIL SETIAP BAGIAN DARI SETIAP DATA BERITA, DIGUNAKAN OBJEK $news_item['NAMA_KOLOM'] -->
                        <?php foreach ($beritaHalaman as $news_item) : ?>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <div id="<?= esc($news_item['slug']) ?>" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <?php if ($news_item['gambar_3'] != '' || $news_item['gambar_3'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_4'] != '' || $news_item['gambar_4'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_5'] != '' || $news_item['gambar_5'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_6'] != '' || $news_item['gambar_6'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="5" aria-label="Slide 6"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_7'] != '' || $news_item['gambar_7'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="6" aria-label="Slide 7"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_8'] != '' || $news_item['gambar_8'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="7" aria-label="Slide 8"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_9'] != '' || $news_item['gambar_9'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="8" aria-label="Slide 9"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_10'] != '' || $news_item['gambar_10'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="9" aria-label="Slide 10"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_11'] != '' || $news_item['gambar_11'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="10" aria-label="Slide 11"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_12'] != '' || $news_item['gambar_12'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="11" aria-label="Slide 12"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_13'] != '' || $news_item['gambar_13'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="12" aria-label="Slide 13"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_14'] != '' || $news_item['gambar_14'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="13" aria-label="Slide 14"></button>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_15'] != '' || $news_item['gambar_15'] != null) { ?>
                                        <button type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide-to="14" aria-label="Slide 15"></button>
                                        <?php } ?>
                                    </div>
                                    <div class="carousel-inner ratio ratio-21x9">
                                        <div class="carousel-item active">
                                            <img src="<?= esc($news_item['gambar_1']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_2']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php if ($news_item['gambar_3'] != '' || $news_item['gambar_3'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_3']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_4'] != '' || $news_item['gambar_4'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_4']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_5'] != '' || $news_item['gambar_5'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_5']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_6'] != '' || $news_item['gambar_6'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_6']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_7'] != '' || $news_item['gambar_7'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_7']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_8'] != '' || $news_item['gambar_8'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_8']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_9'] != '' || $news_item['gambar_9'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_9']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_10'] != '' || $news_item['gambar_10'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_10']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_11'] != '' || $news_item['gambar_11'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_11']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_12'] != '' || $news_item['gambar_12'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_12']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_13'] != '' || $news_item['gambar_13'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_13']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_14'] != '' || $news_item['gambar_14'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_14']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                        <?php if ($news_item['gambar_15'] != '' || $news_item['gambar_15'] != null) { ?>
                                        <div class="carousel-item">
                                            <img src="<?= esc($news_item['gambar_15']) ?>" class="mx-auto d-block" style="height: 100%; width: 100%; object-fit: contain" alt="..." />
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#<?= esc($news_item['slug']) ?>" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= esc($news_item['judul']) ?>
                                    </h5>
                                    <p class="card-text text-truncate">
                                        <?= esc($news_item['badan']) ?>
                                    </p>
                                    <a href="/home/view/detail/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-dark">Selengkapnya...</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">
                                        <?= esc($news_item['waktu']) ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <?= $pager->links('group1', 'kustom_paginasi') ?>
                </div>
            </div>
        </div>
        <!-- APABILA DATA BERITA KOSONG, MAKA PADA HALAMAN, DITAMPILKAN CARD BERITA DEFAULT SEBANYAK 3 BUAH -->
        <?php else : ?>
        <div class="col-md-9">
            <div class="card bg-light bg-gradient shadow">
                <div class="card-header text-center">
                    <h5 class="fw-bold p-0 m-0">BERITA TERKINI</h5>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-1 g-3 p-3">
                        <div class="col">
                            <div class="card h-100 shadow">
                                <img src="<?php echo base_url(); ?>/img/pem1.jpeg" class="img-fluid card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title">Berita Pertama</h5>
                                    <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <a href="#" class="btn btn-dark">Selengkapnya...</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <img src="<?php echo base_url(); ?>/img/pem2.jpeg" class="img-fluid card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title">Berita Kedua</h5>
                                    <p class="card-text text-truncate">This card has supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-dark">Selengkapnya...</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <img src="<?php echo base_url(); ?>/img/pem3.jpeg" class="img-fluid card-img-top" alt="..." />
                                <div class="card-body">
                                    <h5 class="card-title">Berita Ketiga</h5>
                                    <p class="card-text text-truncate">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                                    <a href="#" class="btn btn-dark">Selengkapnya...</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Hasil Navigasi Halaman">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link link-dark">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link link-dark active" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link link-dark" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link link-dark" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link link-dark" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <?php endif ?>
    </div>
</div>
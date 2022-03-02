<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">BERITA</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home/">Beranda</a></li>
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
                    <a href="<?php echo base_url(); ?>/berita/" class="list-group-item list-group-item-action active" aria-current="page">
                        Berita
                    </a>
                    <a href="<?php echo base_url(); ?>/berkas/" class="list-group-item list-group-item-action">
                        Informasi Publik
                    </a>
                    <!-- <a href="<?php //echo base_url(); ?>/galeri/" class="list-group-item list-group-item-action">
                        Galeri
                    </a> -->
                    <a href="<?php echo base_url(); ?>/kegiatan/" class="list-group-item list-group-item-action">
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
                                            </div>
                                            <div class="carousel-inner ratio ratio-16x9">
                                                <div class="carousel-item active">
                                                    <img src="<?= esc($news_item['gambar_1']) ?>" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="<?= esc($news_item['gambar_2']) ?>" class="d-block w-100" alt="...">
                                                </div>
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
                                            <h5 class="card-title"><?= esc($news_item['judul']) ?></h5>
                                            <p class="card-text text-truncate"><?= esc($news_item['badan']) ?></p>
                                            <a href="/detail/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-dark">Selengkapnya...</a>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted"><?= esc($news_item['waktu']) ?></small>
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
                                            </div>
                                            <div class="carousel-inner ratio ratio-16x9">
                                                <div class="carousel-item active">
                                                    <img src="<?= esc($news_item['gambar_1']) ?>" class="d-block w-100" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="<?= esc($news_item['gambar_2']) ?>" class="d-block w-100" alt="...">
                                                </div>
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
                                            <h5 class="card-title"><?= esc($news_item['judul']) ?></h5>
                                            <p class="card-text text-truncate"><?= esc($news_item['badan']) ?></p>
                                            <a href="/detail/<?= esc($news_item['slug'], 'url') ?>" class="btn btn-dark">Selengkapnya...</a>
                                        </div>
                                        <div class="card-footer">
                                            <small class="text-muted"><?= esc($news_item['waktu']) ?></small>
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
                                    <img src="<?php echo base_url(); ?>/img/pem1.jpeg" class="img-fluid card-img-top" alt="...">
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
                                    <img src="<?php echo base_url(); ?>/img/pem2.jpeg" class="img-fluid card-img-top" alt="...">
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
                                    <img src="<?php echo base_url(); ?>/img/pem3.jpeg" class="img-fluid card-img-top" alt="...">
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
                                <li class="page-item"><a class="page-link link-dark active" href="#">1</a></li>
                                <li class="page-item"><a class="page-link link-dark" href="#">2</a></li>
                                <li class="page-item"><a class="page-link link-dark" href="#">3</a></li>
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
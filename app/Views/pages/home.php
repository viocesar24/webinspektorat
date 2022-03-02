<div id="carouselHomeAtas" class="carousel slide carousel-fade bg-secondary bg-gradient bg-opacity-10" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselHomeAtas" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselHomeAtas" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselHomeAtas" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner ratio ratio-16x9">
        <div class="carousel-item active">
            <img src="<?php echo base_url(); ?>/img/PETA.svg" class="img-fluid d-block w-100" alt="Highlight Pertama">
            <div class="carousel-caption d-none d-md-block">
                <div class="bg-white bg-opacity-50 text-wrap text-dark fw-bold">
                    <!-- <h4>PETA KABUPATEN KEDIRI</h4>
                    <p>Peta daerah dan perbatasan Kabupaten Kediri</p> -->
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://drive.google.com/uc?export=view&id=17Y4aZzPl18TMIuMBL1hdp8fXXD0AaOte" class="img-fluid d-block w-100" alt="BERITA 16 FEBRUARI 2022 JOGLO PEMERINTAHAN KABUPATEN KEDIRI">
            <div class="carousel-caption d-none d-md-block">
                <div class="bg-white bg-opacity-50 text-wrap text-dark fw-bold">
                    <h4>BERITA 16 FEBRUARI 2022 JOGLO PEMERINTAHAN KABUPATEN KEDIRI</h4>
                    <p>Tes Swab Antigen</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://drive.google.com/uc?export=view&id=1phTAwX-I6wEW0Po-471RhyraZ7jLAK6m" class="img-fluid d-block w-100" alt="APEL PAGI 31 JANUARI 2022">
            <div class="carousel-caption d-none d-md-block">
                <div class="bg-white bg-opacity-50 text-wrap text-dark fw-bold">
                    <h4>APEL PAGI HARI SELASA 01 MARET 2022</h4>
                    <!-- <p>Apel pagi hari Senin, diganti pada hari Selasa</p> -->
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomeAtas" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselHomeAtas" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Berikutnya</span>
    </button>
</div>
<?php if (!empty($berita) && is_array($berita)) : ?>
    <div class="container-fluid bg-light bg-gradient p-5">
        <div class="container-fluid text-center mb-5">
            <hr>
            <h1 class="text-dark">BERITA TERKINI</h1>
            <hr>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <!-- BAGIAN BERIKUT DIGUNAKAN UNTUK MENAMPILKAN DATA BERITA YANG DIBATASI HANYA 3 BERITA TERBARU -->
            <?php foreach (array_slice($berita, 0, 3) as $news_item) : ?>
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
<?php else : ?>
    <!-- APABILA BERITA GAGAL DIAMBIL OLEH MODEL, ATAU TIDAK ADA BERITA DI DALAM DATABASE, MAKA DITAMPILKAN CARD BERITA DEFAULT -->
    <div class="container-fluid bg-light bg-gradient p-5">
        <div class="container-fluid text-center mb-5">
            <hr>
            <h1 class="text-dark">BERITA TERKINI</h1>
            <hr>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-3">
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
    </div>
<?php endif ?>
<div class="container-fluid bg-secondary bg-gradient bg-opacity-10 p-5 text-center">
    <div class="container-fluid mb-5">
        <hr>
        <h1 class="text-dark">PARA PIMPINAN</h1>
        <hr>
    </div>
    <?php if (!empty($pejabat) && is_array($pejabat)) : ?>
        <div class="row row-cols-2 row-cols-md-4 g-3 justify-content-center">
            <?php foreach (array_slice($pejabat, 0, 1) as $pejabat_item) : ?>
                <div class="col">
                    <div class="card h-100 shadow">
                        <img src="<?php echo base_url(); ?>/img/person.svg" class="img-fluid card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title"><?= esc($pejabat_item['nama']) ?></p>
                            <h5 class="card-text"><?= esc($pejabat_item['jabatan']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="w-100 p-0 m-0"></div>
            <?php foreach (array_slice($pejabat, 1, 3) as $pejabat_item) : ?>
                <div class="col">
                    <div class="card h-100 shadow">
                        <img src="<?php echo base_url(); ?>/img/person.svg" class="img-fluid card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text"><?= esc($pejabat_item['nama']) ?></p>
                            <h5 class="card-title"><?= esc($pejabat_item['jabatan']) ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <div class="row row-cols-2 row-cols-md-4 g-3 justify-content-center">
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="<?php echo base_url(); ?>/img/person.svg" class="img-fluid card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">WIRAWAN, S.E., M.M., Ak.</h5>
                        <p class="card-text">Plt. INSPEKTUR</p>
                    </div>
                </div>
            </div>
            <div class="w-100 p-0 m-0"></div>
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="<?php echo base_url(); ?>/img/person.svg" class="img-fluid card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">SUGIYONO, S.Sos, M.M.</h5>
                        <p class="card-text">INSPEKTUR PEMBANTU II</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="<?php echo base_url(); ?>/img/person.svg" class="img-fluid card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">HERU SANTOSO, S.E., M.M.</h5>
                        <p class="card-text">INSPEKTUR PEMBANTU III</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="<?php echo base_url(); ?>/img/person.svg" class="img-fluid card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">NONO SOEKARDI, S.H., M.M.</h5>
                        <p class="card-text">INSPEKTUR PEMBANTU IV</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>
<div class="container-fluid bg-light bg-gradient p-5 text-dark">
    <div class="row g-3">
        <div class="col-md-4">
            <?php if (!empty($kegiatan) && is_array($kegiatan)) : ?>
                <div class="container-fluid">
                    <h1>AGENDA <strong>KEGIATAN</strong></h1>
                    <?php foreach (array_slice($kegiatan, 0, 5) as $kegiatan_item) : ?>
                        <div class="container-fluid p-0 mb-3">
                            <div class="row row-cols-1">
                                <div class="col fw-lighter">
                                    <i class="bi bi-calendar"></i>
                                    <?= esc($kegiatan_item['waktu']) ?>
                                </div>
                                <div class="col">
                                    <a href="<?php echo base_url(); ?>/kegiatan/" class="link-dark"><?= esc($kegiatan_item['judul']) ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php else : ?>
                <div class="container-fluid">
                    <h1>AGENDA <strong>KEGIATAN</strong></h1>
                    <div class="container-fluid p-0 mb-3">
                        <div class="row row-cols-1">
                            <div class="col fw-lighter">
                                <i class="bi bi-calendar"></i>
                                31 Desember 2021 09:00 WIB
                            </div>
                            <div class="col">
                                <a href="#" class="link-dark">Syukuran Tahun Baru</a>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid p-0 mb-3">
                        <div class="row row-cols-1">
                            <div class="col fw-light">
                                <i class="bi bi-calendar"></i>
                                03 Januari 2022 07:15 WIB
                            </div>
                            <div class="col">
                                <a href="#" class="link-dark">Apel Pagi Tahun Baru</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <hr>
        </div>
        <div class="col-md-1 text-center p-0 m-0 d-none d-md-block">
            <div class="vr" style="height: 500px;"></div>
        </div>
        <div class="col-md-7">
            <div class="container-fluid">
                <h1>PROGRAM</h1>
                <div id="carouselHomeBawah" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselHomeBawah" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselHomeBawah" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselHomeBawah" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner ratio ratio-16x9">
                        <div class="carousel-item active">
                            <img src="<?php echo base_url(); ?>/img/coming-soon.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo base_url(); ?>/img/coming-soon.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo base_url(); ?>/img/coming-soon.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHomeBawah" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselHomeBawah" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
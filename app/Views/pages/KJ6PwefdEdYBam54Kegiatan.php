<!-- BAGIAN BANNER HALAMAN -->
<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">ADMIN KEGIATAN</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home/view/admin">Admin</a></li>
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home/view/KJ6PwefdEdYBam54Berita">Admin Berita</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Kegiatan</li>
            </ol>
        </nav>
    </div>
</div>
<!-- BAGIAN TABEL ADMIN -->
<div class="bg-light bg-gradient p-5">
    <div class="card bg-light bg-gradient shadow">
        <div class="card-header text-center">
            <h5 class="fw-bold p-0 m-0">KEGIATAN</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="d-grid gap-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        TAMBAH
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <?= session()->getFlashdata('error') ?>
                                <?= service('validation')->listErrors() ?>
                                <form action="<?php echo base_url(); ?>/home/insertKegiatan" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">FORM TAMBAH KEGIATAN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?= csrf_field() ?>
                                        <input name="id_number" type="text" class="form-control my-1" placeholder="ID">
                                        <input name="judul_kegiatan" type="text" class="form-control my-1" placeholder="JUDUL">
                                        <input name="slug_kegiatan" type="text" class="form-control my-1" placeholder="SLUG">
                                        <textarea name="badan_kegiatan" class="form-control my-1" cols="10" rows="10" placeholder="BADAN"></textarea>
                                        <input name="waktu_kegiatan" type="datetime-local" class="form-control my-1" placeholder="WAKTU">
                                        <input name="gambar1_kegiatan" type="url" class="form-control my-1" placeholder="LINK GAMBAR 1">
                                        <input name="gambar2_kegiatan" type="url" class="form-control my-1" placeholder="LINK GAMBAR 2">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">TAMBAH</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach ($kegiatanHalamanAdmin as $news_item) : ?>
                    <div class="col-sm-6">
                        <div class="card bg-light bg-gradient shadow my-3">
                            <div class="card-header text-center">
                                <h5 class="fw-bold p-0 m-0">
                                    <input name="id_number" type="text" class="form-control" placeholder="ID" value="<?= esc($news_item['id']) ?>" disabled>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="input-group my-1">
                                    <span class="input-group-text">JUDUL KEGIATAN</span>
                                    <textarea name="judul_kegiatan" class="form-control" placeholder="JUDUL" cols="100" rows="2" aria-label="JUDUL KEGIATAN"><?= esc($news_item['judul']) ?></textarea>
                                </div>
                                <div class="input-group my-1">
                                    <span class="input-group-text">SLUG KEGIATAN</span>
                                    <textarea name="slug_kegiatan" class="form-control" placeholder="SLUG" cols="100" rows="2" aria-label="SLUG KEGIATAN"><?= esc($news_item['slug']) ?></textarea>
                                </div>
                                <div class="input-group my-1">
                                    <span class="input-group-text">BADAN KEGIATAN</span>
                                    <textarea name="badan_kegiatan" class="form-control" placeholder="BADAN" cols="1000" rows="5" aria-label="BADAN KEGIATAN"><?= esc($news_item['badan']) ?></textarea>
                                </div>
                                <div class="input-group my-1">
                                    <span class="input-group-text">WAKTU KEGIATAN</span>
                                    <textarea name="waktu_kegiatan" class="form-control" placeholder="WAKTU" cols="1" rows="1" aria-label="WAKTU KEGIATAN"><?= esc($news_item['waktu']) ?></textarea>
                                </div>
                                <div class="input-group my-1">
                                    <span class="input-group-text">GAMBAR 1 KEGIATAN</span>
                                    <textarea name="gambar1_kegiatan" class="form-control" placeholder="LINK GAMBAR 1" cols="100" rows="2" aria-label="GAMBAR 1 KEGIATAN"><?= esc($news_item['gambar_1']) ?></textarea>
                                </div>
                                <div class="input-group my-1">
                                    <span class="input-group-text">GAMBAR 2 KEGIATAN</span>
                                    <textarea name="gambar2_kegiatan" class="form-control" placeholder="LINK GAMBAR 2" cols="100" rows="2" aria-label="GAMBAR 2 KEGIATAN"><?= esc($news_item['gambar_2']) ?></textarea>
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-warning btn-sm my-1" data-bs-toggle="modal" data-bs-target="#ubahModal">
                                    UBAH
                                </button>
                                <button type="button" class="btn btn-danger btn-sm my-1" data-bs-toggle="modal" data-bs-target="#hapusModal">
                                    HAPUS
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="ubahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <?= $pager->links('group1', 'kustom_paginasi') ?>
        </div>
    </div>
</div>
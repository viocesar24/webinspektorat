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
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home/view/adminberita">Admin Berita</a></li>
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
                    <!-- Modal Tambah -->
                    <div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <?= session()->getFlashdata('error') ?>
                                <?= service('validation')->listErrors() ?>
                                <form action="<?php echo base_url(); ?>/home/tambahkegiatan" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">FORM TAMBAH KEGIATAN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?= csrf_field() ?>
                                        <input name="id_number" type="text" class="form-control my-1" placeholder="AUTO-INCREMENT ID" readonly>
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
                    <div>
                        <div class="card bg-light bg-gradient shadow my-3">
                            <div class="card-header text-center">
                                <h5 class="fw-bold p-0 m-0">
                                    <p>ID: <?= esc($news_item['id']) ?></p>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-xxl">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th scope="row">JUDUL</th>
                                                <td><?= esc($news_item['judul']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SLUG</th>
                                                <td><?= esc($news_item['slug']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">BADAN</th>
                                                <td><?= esc($news_item['badan']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">WAKTU</th>
                                                <td><?= esc($news_item['waktu']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">GAMBAR 1 & 2</th>
                                                <td>
                                                    <img src="<?= esc($news_item['gambar_1']) ?>" alt="GAMBAR 1" width="160" height="90">
                                                    <img src="<?= esc($news_item['gambar_2']) ?>" alt="GAMBAR 2" width="160" height="90">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning btn-sm my-1" data-bs-toggle="modal" data-bs-target="#ubahModal">
                                        UBAH
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm my-1" data-bs-toggle="modal" data-bs-target="#hapusModal">
                                        HAPUS
                                    </button>
                                </div>
                                <!-- Modal Ubah -->
                                <div class="modal fade" id="ubahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <?= session()->getFlashdata('error') ?>
                                            <?= service('validation')->listErrors() ?>
                                            <form action="<?php echo base_url(); ?>/home/pembaruankegiatan" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">FORM UBAH KEGIATAN</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?= csrf_field() ?>
                                                    <input name="id_number" type="text" class="form-control my-1" placeholder="ID" value="<?= esc($news_item['id']) ?>" readonly>
                                                    <input name="judul_kegiatan" type="text" class="form-control my-1" placeholder="JUDUL" value="<?= esc($news_item['judul']) ?>">
                                                    <input name="slug_kegiatan" type="text" class="form-control my-1" placeholder="SLUG" value="<?= esc($news_item['slug']) ?>">
                                                    <textarea name="badan_kegiatan" class="form-control my-1" cols="10" rows="10" placeholder="BADAN"><?= esc($news_item['badan']) ?></textarea>
                                                    <input name="waktu_kegiatan" type="datetime-local" class="form-control my-1" placeholder="WAKTU" value="<?= esc($news_item['waktu']) ?>">
                                                    <input name="gambar1_kegiatan" type="url" class="form-control my-1" placeholder="LINK GAMBAR 1" value="<?= esc($news_item['gambar_1']) ?>">
                                                    <input name="gambar2_kegiatan" type="url" class="form-control my-1" placeholder="LINK GAMBAR 2" value="<?= esc($news_item['gambar_2']) ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Hapus -->
                                <div class="modal fade" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <?= session()->getFlashdata('error') ?>
                                            <?= service('validation')->listErrors() ?>
                                            <form action="<?php echo base_url(); ?>/home/hapuskegiatan" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Peringatan!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin melakukan penghapusan?
                                                    <?= csrf_field() ?>
                                                    <p class="m-0 p-0">ID: </p>
                                                    <input name="id_number" type="text" class="form-control my-1" placeholder="ID" value="<?= esc($news_item['id']) ?>" readonly>
                                                    <p class="m-0 p-0">JUDUL: </p>
                                                    <input name="judul_kegiatan" type="text" class="form-control my-1" placeholder="JUDUL" value="<?= esc($news_item['judul']) ?>" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-primary">Iya</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <?= $pagerKegiatanAdmin->links('group1', 'kustom_paginasi') ?>
        </div>
    </div>
</div>
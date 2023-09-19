<!-- BAGIAN BANNER HALAMAN -->
<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">ADMIN KEGIATAN</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Kegiatan</li>
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home/view/adminberita">Admin Berita</a></li>
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
                    <div class="modal fade modal-xl" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <div class="form-floating">
                                            <input name="judul_kegiatan" type="text" class="form-control my-1" id="floatingJudulKegiatan" placeholder="JUDUL" required>
                                            <label for="floatingJudulKegiatan">JUDUL</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="slug_kegiatan" type="text" class="form-control my-1" id="floatingSlugKegiatan" placeholder="SLUG" required>
                                            <label for="floatingSlugKegiatan">SLUG</label>
                                        </div>
                                        <div class="form-floating">
                                            <textarea name="badan_kegiatan" class="form-control my-1" id="floatingBadanKegiatan" placeholder="BADAN BERITA" required></textarea>
                                            <label for="floatingBadanKegiatan">BADAN BERITA</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="waktu_kegiatan" type="datetime-local" class="form-control my-1" id="floatingWaktuKegiatan" placeholder="WAKTU" required>
                                            <label for="floatingWaktuKegiatan">WAKTU</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar1_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan1" placeholder="LINK FOTO 1" required>
                                            <label for="floatingGambarKegiatan1">LINK FOTO 1</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar2_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan2" placeholder="LINK FOTO 2" required>
                                            <label for="floatingGambarKegiatan2">LINK FOTO 2</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar3_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan3" placeholder="LINK FOTO 3">
                                            <label for="floatingGambarKegiatan3">LINK FOTO 3</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar4_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan4" placeholder="LINK FOTO 4">
                                            <label for="floatingGambarKegiatan4">LINK FOTO 4</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar5_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan5" placeholder="LINK FOTO 5">
                                            <label for="floatingGambarKegiatan5">LINK FOTO 5</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar6_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan6" placeholder="LINK FOTO 6">
                                            <label for="floatingGambarKegiatan6">LINK FOTO 6</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar7_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan7" placeholder="LINK FOTO 7">
                                            <label for="floatingGambarKegiatan7">LINK FOTO 7</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar8_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan8" placeholder="LINK FOTO 8">
                                            <label for="floatingGambarKegiatan8">LINK FOTO 8</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar9_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan9" placeholder="LINK FOTO 9">
                                            <label for="floatingGambarKegiatan9">LINK FOTO 9</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar10_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan10" placeholder="LINK FOTO 10">
                                            <label for="floatingGambarKegiatan10">LINK FOTO 10</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar11_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan11" placeholder="LINK FOTO 11">
                                            <label for="floatingGambarKegiatan11">LINK FOTO 11</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar12_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan12" placeholder="LINK FOTO 12">
                                            <label for="floatingGambarKegiatan12">LINK FOTO 12</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar13_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan13" placeholder="LINK FOTO 13">
                                            <label for="floatingGambarKegiatan13">LINK FOTO 13</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar14_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan14" placeholder="LINK FOTO 14">
                                            <label for="floatingGambarKegiatan14">LINK FOTO 14</label>
                                        </div>
                                        <div class="form-floating">
                                            <input name="gambar15_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan15" placeholder="LINK FOTO 15">
                                            <label for="floatingGambarKegiatan15">LINK FOTO 15</label>
                                        </div>
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
                <?php foreach ($kegiatanHalamanAdmin as $news_item): ?>
                    <div>
                        <div class="card bg-light bg-gradient shadow my-3">
                            <div class="card-header text-center">
                                <h5 class="fw-bold p-0 m-0">
                                    <p>ID:
                                        <?= esc($news_item['id']) ?>
                                    </p>
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-xxl">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <th scope="row">JUDUL</th>
                                                <td>
                                                    <?= esc($news_item['judul']) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">SLUG</th>
                                                <td>
                                                    <?= esc($news_item['slug']) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">BADAN</th>
                                                <td>
                                                    <?= esc($news_item['badan']) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">WAKTU</th>
                                                <td>
                                                    <?= esc($news_item['waktu']) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">GAMBAR</th>
                                                <td>
                                                    <img src="<?= esc($news_item['gambar_1']) ?>" alt="GAMBAR 1" width="160" height="90">
                                                    <img src="<?= esc($news_item['gambar_2']) ?>" alt="GAMBAR 2" width="160" height="90">
                                                    <?php if ($news_item['gambar_3'] != '' || $news_item['gambar_3'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_3']) ?>" alt="GAMBAR 3" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_4'] != '' || $news_item['gambar_4'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_4']) ?>" alt="GAMBAR 4" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_5'] != '' || $news_item['gambar_5'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_5']) ?>" alt="GAMBAR 5" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_6'] != '' || $news_item['gambar_6'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_6']) ?>" alt="GAMBAR 6" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_7'] != '' || $news_item['gambar_7'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_7']) ?>" alt="GAMBAR 7" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_8'] != '' || $news_item['gambar_8'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_8']) ?>" alt="GAMBAR 8" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_9'] != '' || $news_item['gambar_9'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_9']) ?>" alt="GAMBAR 9" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_10'] != '' || $news_item['gambar_10'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_10']) ?>" alt="GAMBAR 10" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_11'] != '' || $news_item['gambar_11'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_11']) ?>" alt="GAMBAR 11" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_12'] != '' || $news_item['gambar_12'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_12']) ?>" alt="GAMBAR 12" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_13'] != '' || $news_item['gambar_13'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_13']) ?>" alt="GAMBAR 13" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_14'] != '' || $news_item['gambar_14'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_14']) ?>" alt="GAMBAR 14" width="160" height="90">
                                                    <?php } ?>
                                                    <?php if ($news_item['gambar_15'] != '' || $news_item['gambar_15'] != null) { ?>
                                                        <img src="<?= esc($news_item['gambar_15']) ?>" alt="GAMBAR 15" width="160" height="90">
                                                    <?php } ?>
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
                                <div class="modal fade modal-xl" id="ubahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <div class="form-floating">
                                                        <input name="judul_kegiatan" type="text" class="form-control my-1" id="floatingJudulKegiatan" placeholder="JUDUL" value="<?= esc($news_item['judul']) ?>" required>
                                                        <label for="floatingJudulKegiatan">JUDUL</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="slug_kegiatan" type="text" class="form-control my-1" id="floatingSlugKegiatan" placeholder="SLUG" value="<?= esc($news_item['slug']) ?>" required>
                                                        <label for="floatingSlugKegiatan">SLUG</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea name="badan_kegiatan" class="form-control my-1" id="floatingBadanKegiatan" placeholder="BADAN BERITA" required><?= esc($news_item['badan']) ?></textarea>
                                                        <label for="floatingBadanKegiatan">BADAN BERITA</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="waktu_kegiatan" type="datetime-local" class="form-control my-1" id="floatingWaktuKegiatan" placeholder="WAKTU" value="<?= esc($news_item['waktu']) ?>" required>
                                                        <label for="floatingWaktuKegiatan">WAKTU</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar1_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan1" placeholder="LINK FOTO 1" value="<?= esc($news_item['gambar_1']) ?>" required>
                                                        <label for="floatingGambarKegiatan1">LINK FOTO 1</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar2_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan2" placeholder="LINK FOTO 2" value="<?= esc($news_item['gambar_2']) ?>" required>
                                                        <label for="floatingGambarKegiatan2">LINK FOTO 2</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar3_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan3" placeholder="LINK FOTO 3" value="<?= esc($news_item['gambar_3']) ?>">
                                                        <label for="floatingGambarKegiatan3">LINK FOTO 3</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar4_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan4" placeholder="LINK FOTO 4" value="<?= esc($news_item['gambar_4']) ?>">
                                                        <label for="floatingGambarKegiatan4">LINK FOTO 4</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar5_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan5" placeholder="LINK FOTO 5" value="<?= esc($news_item['gambar_5']) ?>">
                                                        <label for="floatingGambarKegiatan5">LINK FOTO 5</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar6_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan6" placeholder="LINK FOTO 6" value="<?= esc($news_item['gambar_6']) ?>">
                                                        <label for="floatingGambarKegiatan6">LINK FOTO 6</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar7_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan7" placeholder="LINK FOTO 7" value="<?= esc($news_item['gambar_7']) ?>">
                                                        <label for="floatingGambarKegiatan7">LINK FOTO 7</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar8_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan8" placeholder="LINK FOTO 8" value="<?= esc($news_item['gambar_8']) ?>">
                                                        <label for="floatingGambarKegiatan8">LINK FOTO 8</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar9_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan9" placeholder="LINK FOTO 9" value="<?= esc($news_item['gambar_9']) ?>">
                                                        <label for="floatingGambarKegiatan9">LINK FOTO 9</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar10_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan10" placeholder="LINK FOTO 10" value="<?= esc($news_item['gambar_10']) ?>">
                                                        <label for="floatingGambarKegiatan10">LINK FOTO 10</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar11_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan11" placeholder="LINK FOTO 11" value="<?= esc($news_item['gambar_11']) ?>">
                                                        <label for="floatingGambarKegiatan11">LINK FOTO 11</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar12_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan12" placeholder="LINK FOTO 12" value="<?= esc($news_item['gambar_12']) ?>">
                                                        <label for="floatingGambarKegiatan12">LINK FOTO 12</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar13_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan13" placeholder="LINK FOTO 13" value="<?= esc($news_item['gambar_13']) ?>">
                                                        <label for="floatingGambarKegiatan13">LINK FOTO 13</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar14_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan14" placeholder="LINK FOTO 14" value="<?= esc($news_item['gambar_14']) ?>">
                                                        <label for="floatingGambarKegiatan14">LINK FOTO 14</label>
                                                    </div>
                                                    <div class="form-floating">
                                                        <input name="gambar15_kegiatan" type="url" class="form-control my-1" id="floatingGambarKegiatan15" placeholder="LINK FOTO 15" value="<?= esc($news_item['gambar_15']) ?>">
                                                        <label for="floatingGambarKegiatan15">LINK FOTO 15</label>
                                                    </div>
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
                                <div class="modal fade modal-xl" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
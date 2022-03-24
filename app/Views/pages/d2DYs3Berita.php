<!-- BAGIAN BANNER HALAMAN -->
<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">ADMIN BERITA</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Berita</li>
            </ol>
        </nav>
    </div>
</div>
<?php if ($admin == false) { ?>
    <!-- BAGIAN LOGIN ADMIN -->
    <div class="bg-light bg-gradient p-1">
        <div class="d-flex justify-content-center text-center my-3">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fw-bold p-0 m-0">ADMIN</h5>
                </div>
                <div class="card-body">
                    <main class="form-signin">
                        <form method="GET" action="<?php echo base_url(); ?>/home/view/d2DYs3Berita">
                            <img class="mb-1" src="http://localhost:8080/img/logo_pemkab.svg" alt="" width="150" height="150">
                            <div class="form-floating my-3">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Kata Sandi">
                                <label for="floatingPassword">Kata Sandi</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <!-- BAGIAN TABEL ADMIN -->
    <div class="bg-light bg-gradient p-5">
        <div class="card bg-light bg-gradient shadow">
            <div class="card-header text-center">
                <h5 class="fw-bold p-0 m-0">BERITA</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-xxl table-light table-bordered border-dark table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">JUDUL</th>
                                <th scope="col">SLUG</th>
                                <th scope="col">BADAN</th>
                                <th scope="col">WAKTU</th>
                                <th scope="col">FOTO 1</th>
                                <th scope="col">FOTO 2</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($berita as $news_item) : ?>
                                <tr>
                                    <th scope="row"><?= esc($news_item['id']) ?></th>
                                    <td><?= esc($news_item['judul']) ?></td>
                                    <td><?= esc($news_item['slug']) ?></td>
                                    <td><?= esc($news_item['badan']) ?></td>
                                    <td><?= esc($news_item['waktu']) ?></td>
                                    <td><img src="<?= esc($news_item['gambar_1']) ?>" class="d-block w-100" alt="..."></td>
                                    <td><img src="<?= esc($news_item['gambar_2']) ?>" class="d-block w-100" alt="..."></td>
                                    <td class="text-center">
                                        <a class="btn btn-warning btn-sm my-1" href="#" target="_blank">UBAH</a>
                                        <a class="btn btn-danger btn-sm my-1" href="#" target="_blank">HAPUS</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <?= session()->getFlashdata('error') ?>
                                <?= service('validation')->listErrors() ?>
                                <form action="<?php echo base_url(); ?>/home/insertBerita" method="post">
                                    <?= csrf_field() ?>
                                    <th><input name="id_number" type="text" class="form-control" placeholder="ID" disabled></th>
                                    <td><input name="judul_berita" type="text" class="form-control" placeholder="JUDUL"></td>
                                    <td><input name="slug_berita" type="text" class="form-control" placeholder="SLUG"></td>
                                    <td><input name="badan_berita" type="text" class="form-control" placeholder="BADAN"></td>
                                    <td><input name="waktu_berita" type="datetime-local" class="form-control" placeholder="WAKTU"></td>
                                    <td><input name="gambar1_berita" type="url" class="form-control" placeholder="LINK GAMBAR 1"></td>
                                    <td><input name="gambar2_berita" type="url" class="form-control" placeholder="LINK GAMBAR 2"></td>
                                    <td class="text-center"><button type="submit" class="btn btn-primary btn-sm my-1">TAMBAH</button></td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
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
<!-- BAGIAN TABEL ADMIN -->
<div class="bg-light bg-gradient p-5">
    <div class="card bg-light bg-gradient shadow">
        <div class="card-header text-center">
            <h5 class="fw-bold p-0 m-0">BERITA</h5>
        </div>
        <div class="card-body">
            <?php foreach ($berita as $news_item) : ?>
                <div class="card-header text-center">
                    <h5 class="fw-bold p-0 m-0">
                        <input name="id_number" type="text" class="form-control" placeholder="ID" value="<?= esc($news_item['id']) ?>" disabled>
                    </h5>
                </div>
                <div class="card-body"></div>
            <?php endforeach ?>
            <div class="table-responsive-xxl">
                <table class="table table-xxl align-middle table-light table-bordered border-dark table-hover">
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
                                <?= session()->getFlashdata('error') ?>
                                <?= service('validation')->listErrors() ?>
                                <form action="<?php echo base_url(); ?>/home/insertBerita" method="post">
                                    <?= csrf_field() ?>
                                    <th scope="row">
                                        <input name="id_number" type="text" class="form-control" placeholder="ID" value="<?= esc($news_item['id']) ?>" disabled>
                                    </th>
                                    <td>
                                        <textarea name="judul_berita" class="form-control" placeholder="JUDUL" cols="100" rows="2"><?= esc($news_item['judul']) ?></textarea>
                                    </td>
                                    <td>
                                        <textarea name="slug_berita" class="form-control" placeholder="SLUG" cols="100" rows="2"><?= esc($news_item['slug']) ?></textarea>
                                    </td>
                                    <td>
                                        <textarea name="badan_berita" class="form-control" placeholder="BADAN" cols="1000" rows="5"><?= esc($news_item['badan']) ?></textarea>
                                    </td>
                                    <td>
                                        <textarea name="waktu_berita" class="form-control" placeholder="WAKTU" cols="1" rows="1"><?= esc($news_item['waktu']) ?></textarea>
                                    </td>
                                    <td>
                                        <textarea name="gambar1_berita" class="form-control" placeholder="LINK GAMBAR 1" cols="100" rows="2"><?= esc($news_item['gambar_1']) ?></textarea>
                                    </td>
                                    <td>
                                        <textarea name="gambar2_berita" class="form-control" placeholder="LINK GAMBAR 2" cols="100" rows="2"><?= esc($news_item['gambar_2']) ?></textarea>
                                    </td>
                                    <td class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning btn-sm my-1" data-bs-toggle="modal" data-bs-target="#ubahModal">
                                            UBAH
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm my-1" data-bs-toggle="modal" data-bs-target="#hapusModal">
                                            HAPUS
                                        </button>
                                    </td>
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
                                </form>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <?= session()->getFlashdata('error') ?>
                            <?= service('validation')->listErrors() ?>
                            <form action="<?php echo base_url(); ?>/home/insertBerita" method="post">
                                <?= csrf_field() ?>
                                <th><input name="id_number" type="text" class="form-control" placeholder="ID"></th>
                                <td><input name="judul_berita" type="text" class="form-control" placeholder="JUDUL"></td>
                                <td><input name="slug_berita" type="text" class="form-control" placeholder="SLUG"></td>
                                <td><input name="badan_berita" type="text" class="form-control" placeholder="BADAN"></td>
                                <td><input name="waktu_berita" type="datetime-local" class="form-control" placeholder="WAKTU"></td>
                                <td><input name="gambar1_berita" type="url" class="form-control" placeholder="LINK GAMBAR 1"></td>
                                <td><input name="gambar2_berita" type="url" class="form-control" placeholder="LINK GAMBAR 2"></td>
                                <td class="text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                        TAMBAH
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin untuk menambah berita tersebut?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                                    <button type="submit" class="btn btn-primary">Iya</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
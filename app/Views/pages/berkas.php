<div class="d-flex bd-highlight bg-dark bg-gradient px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-light p-0 m-0">INFORMASI PUBLIK</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-light text-decoration-none" href="<?php echo base_url(); ?>/home/">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Informasi</li>
                <li class="breadcrumb-item active" aria-current="page">Informasi Publik</li>
            </ol>
        </nav>
    </div>
</div>
<div class="bg-secondary bg-gradient p-5">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fw-bold p-0 m-0">KATEGORI</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="<?php echo base_url(); ?>/berita/" class="list-group-item list-group-item-action">
                        Berita
                    </a>
                    <a href="<?php echo base_url(); ?>/berkas/" class="list-group-item list-group-item-action active" aria-current="page">
                        Informasi Publik
                    </a>
                    <a href="<?php echo base_url(); ?>/galeri/" class="list-group-item list-group-item-action">
                        Galeri
                    </a>
                    <a href="<?php echo base_url(); ?>/kegiatan/" class="list-group-item list-group-item-action">
                        Kegiatan
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card bg-light bg-gradient shadow">
                <div class="card-header text-center">
                    <h5 class="fw-bold p-0 m-0">INFORMASI UNTUK PUBLIK</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-sm table-secondary table-bordered border-dark table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Dokumen</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Dokumen Pertama</td>
                                    <td>Kategori A</td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="#">Lihat</a>
                                        <a class="btn btn-secondary btn-sm" href="#">Unduh</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Dokumen Kedua</td>
                                    <td>Kategori A</td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="#">Lihat</a>
                                        <a class="btn btn-secondary btn-sm" href="#">Unduh</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Dokumen Pertama</td>
                                    <td>Kategori B</td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="#">Lihat</a>
                                        <a class="btn btn-secondary btn-sm" href="#">Unduh</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
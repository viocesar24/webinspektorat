<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>INSPEKTORAT KABUPATEN KEDIRI</title>
</head>

<body>
    <div class="container-fluid p-0 m-0 sticky-top">
        <nav class="navbar navbar-dark navbar-expand-xl bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url(); ?>/home/">
                    <img src="<?php echo base_url(); ?>/img/logo_pemkab.svg" height="50">
                </a>
                <a class="navbar-brand d-none d-sm-block" href="<?php echo base_url(); ?>/home/">
                    INSPEKTORAT KABUPATEN KEDIRI
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">INSPEKTORAT KABUPATEN KEDIRI</h5>
                        <button type="button" class="btn-close text-reset btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>/home/">BERANDA</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    PROFIL
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                    <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                                    <li><a class="dropdown-item" href="#">Tugas Pokok dan Fungsi</a></li>
                                    <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
                                    <li><a class="dropdown-item" href="#">Pedoman</a></li>
                                    <li><a class="dropdown-item" href="#">Aturan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Tambah halaman lain di sini</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    LAYANAN
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                    <li><a class="dropdown-item" href="#">LAYANAN</a></li>
                                    <li><a class="dropdown-item" href="#">PROGRAM</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    INFORMASI
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                    <li><a class="dropdown-item" href="#">BERITA</a></li>
                                    <li><a class="dropdown-item" href="#">BERKAS</a></li>
                                    <li><a class="dropdown-item" href="#">GALERI</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">KONTAK</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </div>
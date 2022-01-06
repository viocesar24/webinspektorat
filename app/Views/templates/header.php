<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>INSPEKTORAT KABUPATEN KEDIRI</title>
</head>

<body>
    <div id="navigasi" class="container-fluid p-0 m-0 sticky-top">
        <nav class="navbar navbar-dark navbar-expand-xl bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url(); ?>/home/">
                    <img src="<?php echo base_url(); ?>/img/logo_pemkab.svg" height="50">
                </a>
                <a class="navbar-brand" href="<?php echo base_url(); ?>/home/">
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
                                <a class="nav-link text-light" href="<?php echo base_url(); ?>/home/">BERANDA</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="offcanvasProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    PROFIL
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasProfil">
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/tentang/">Tentang</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/pejabat/">Pejabat Struktural</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/struktur/">Struktur Organisasi</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/kebijakan/">Kebijakan</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/penghargaan/">Penghargaan</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="offcanvasLayanan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    LAYANAN
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasLayanan">
                                    <li><a class="dropdown-item" href="#">LAYANAN</a></li>
                                    <li><a class="dropdown-item" href="#">PROGRAM</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown text-light">
                                <a class="nav-link dropdown-toggle text-light" href="#" id="offcanvasInformasi" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    INFORMASI
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasInformasi">
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/berita/">BERITA</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/berkas/">BERKAS</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/galeri/">GALERI</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/kegiatan/">KEGIATAN</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">KONTAK</a>
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
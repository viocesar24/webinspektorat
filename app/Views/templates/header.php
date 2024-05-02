<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/png" href="/favicon.png" />
    <title>INSPEKTORAT KABUPATEN KEDIRI</title>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NQDCQNG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="navigasi" class="container-fluid p-0 m-0 sticky-top">
        <div id='recaptcha' class="g-recaptcha" data-sitekey="6Lc5bngeAAAAAGD4F5YX42DXSB31qvDyfX4TcK1_" data-callback="onSubmit" data-size="invisible"></div>
        <nav id="field" class="navbar navbar-light navbar-expand-xl bg-light justify-content-center">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>/img/logo_pemkab.svg" height="50" alt="Logo Pemkab Kediri">
                </a>
                <a class="navbar-brand fw-bold" href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>/img/INSPEKTORAT.svg" height="50" alt="Inspektorat Kabupaten Kediri">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end bg-light" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <img src="<?php echo base_url(); ?>/img/INSPEKTORAT.svg" height="75" alt="Inspektorat Kabupaten Kediri">
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?php echo base_url(); ?>">BERANDA</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="offcanvasProfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    PROFIL
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasProfil">
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/tentang">TENTANG</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/struktur">STRUKTUR ORGANISASI</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/pejabat">PEJABAT STRUKTURAL</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/kebijakan">KEBIJAKAN</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/penghargaan">PENGHARGAAN</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?php echo base_url(); ?>/home/view/layanan">LAYANAN</a>
                            </li>
                            <li class="nav-item dropdown text-dark">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="offcanvasInformasi" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    INFORMASI
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasInformasi">
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/berita">BERITA</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/berkas">INFORMASI PUBLIK</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/kegiatan">KEGIATAN</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="<?php echo base_url(); ?>/home/view/kontak">KONTAK</a>
                            </li>
                        </ul>
                        <form method="GET" action="<?php echo base_url(); ?>/home/view/berita" class="d-flex">
                            <input name="cari" class="form-control me-2" type="search" placeholder="Cari Berita" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-secondary p-1"></div>
    </div>
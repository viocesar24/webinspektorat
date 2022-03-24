<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="/favicon.png" />
    <script>
        var onSubmit = function(token) {
            console.log('success!');
        };

        var onloadCallback = function() {
            grecaptcha.render('field', {
                'sitekey': '6Lc5bngeAAAAAGD4F5YX42DXSB31qvDyfX4TcK1_',
                'callback': onSubmit
            });
        };
    </script>
    <script>
        function validate(event) {
            event.preventDefault();
            grecaptcha.execute();
        }

        function onload() {
            var element = document.getElementById('field');
            element.onload = validate;
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>INSPEKTORAT KABUPATEN KEDIRI</title>
</head>

<body>
    <div id="navigasi" class="container-fluid p-0 m-0 sticky-top">
        <nav class="navbar navbar-light navbar-expand-xl bg-light">
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="offcanvasLayanan" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    LAYANAN
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasLayanan">
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/layanan">LAYANAN</a></li>
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>/home/view/program">PROGRAM</a></li>
                                </ul>
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
                            <input id="field" name="cari" class="form-control me-2" type="search" placeholder="Cari Berita" aria-label="Search">
                            <div id='recaptcha' class="g-recaptcha" data-sitekey="6Lc5bngeAAAAAGD4F5YX42DXSB31qvDyfX4TcK1_" data-callback="onSubmit" data-size="invisible"></div>
                            <button class="btn btn-outline-success" type="submit">Cari</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-secondary p-1"></div>
    </div>
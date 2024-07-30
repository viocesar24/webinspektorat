<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">KONTAK</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kontak</li>
            </ol>
        </nav>
    </div>
</div>
<div class="bg-light bg-gradient p-5">
    <div class="card bg-light bg-gradient shadow mx-auto" style="width: 75%;">
        <div class="card-header text-center">
            <h5 class="fw-bold p-0 m-0">KONTAK KAMI</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <?php if (!empty($kontak) && is_array($kontak)) { ?>
                    <div class="col-md-12 align-items-center">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?= $kontak['googlemaps'] ?>" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>
                            <i class="bi bi-pin-map-fill"></i>
                            ALAMAT
                            <i class="bi bi-pin-map-fill"></i>
                        </h5>
                        <p><?= $kontak['alamat'] ?></p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>
                            <i class="bi bi-telephone-fill"></i>
                            TELEPON
                            <i class="bi bi-telephone-fill"></i>
                        </h5>
                        <p><?= $kontak['telepon'] ?></p>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5>
                            <i class="bi bi-envelope-fill"></i>
                            EMAIL
                            <i class="bi bi-envelope-fill"></i>
                        </h5>
                        <p><?= $kontak['email'] ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
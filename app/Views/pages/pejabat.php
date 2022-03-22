<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">PEJABAT STRUKTURAL</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>/home">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                <li class="breadcrumb-item active" aria-current="page">Pejabat Struktural</li>
            </ol>
        </nav>
    </div>
</div>
<div class="bg-light bg-gradient p-5">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fw-bold p-0 m-0">KATEGORI</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="<?php echo base_url(); ?>/tentang" class="list-group-item list-group-item-action">
                        Tentang
                    </a>
                    <a href="<?php echo base_url(); ?>/struktur" class="list-group-item list-group-item-action">
                        Struktur Organisasi
                    </a>
                    <a href="<?php echo base_url(); ?>/pejabat" class="list-group-item list-group-item-action active" aria-current="page">
                        Pejabat Struktural
                    </a>
                    <a href="<?php echo base_url(); ?>/kebijakan" class="list-group-item list-group-item-action">
                        Kebijakan
                    </a>
                    <a href="<?php echo base_url(); ?>/penghargaan" class="list-group-item list-group-item-action">
                        Penghargaan
                    </a>
                </div>
            </div>
        </div>
        <?php if (!empty($pejabatHalaman) && is_array($pejabatHalaman)) : ?>
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row g-0">
                            <?php foreach ($pejabatHalaman as $pejabat_item) : ?>
                                <div class="col-md-5 card mb-3 mx-1">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="<?php echo base_url(); ?>/img/person.svg" class="img-fluid card-img-top" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title"><?= esc($pejabat_item['jabatan']) ?></h5>
                                                <p class="card-text"><?= esc($pejabat_item['nama']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <?= $pagerPejabat->links('group1', 'kustom_paginasi') ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="col-md-9">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="card mb-3" style="max-width: 50%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url(); ?>/img/person.svg" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Plt. INSPEKTUR</h5>
                                        <p class="card-text">WIRAWAN, S.E., M.M., Ak.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">LAYANAN</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Layanan</li>
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
                <div id="list-example" class="list-group list-group-flush">
                    <?php foreach ($layanan as $item) : ?>
                        <a class="list-group-item list-group-item-action" href="#list-item-<?= $item['id'] ?>"><?= $item['judul'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow" style="height: 500px;">
                <div class="card-header text-center">
                    <h5 class="fw-bold p-0 m-0">LAYANAN DAN PROGRAM INSPEKTORAT KABUPATEN KEDIRI</h5>
                </div>
                <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="card-body overflow-auto text-center" tabindex="0">
                    <?php foreach ($layanan as $item) : ?>
                        <div id="list-item-<?= $item['id'] ?>" class="m-3">
                            <h4><?= $item['judul'] ?></h4>
                            <div><?= $item['badan'] ?></div>
                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
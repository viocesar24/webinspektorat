<!-- BAGIAN BANNER HALAMAN -->
<div class="d-flex bd-highlight bg-secondary bg-gradient bg-opacity-10 px-3">
    <div class="p-2 bd-highlight">
        <h2 class="text-dark p-0 m-0">ADMIN</h2>
    </div>
    <div class="ms-auto p-2 bd-highlight align-self-center d-none d-md-block">
        <nav class="text-decoration-none pull" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb p-0 m-0">
                <li class="breadcrumb-item"><a class="text-dark text-decoration-none" href="<?php echo base_url(); ?>">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
            </ol>
        </nav>
    </div>
</div>
<?php helper("cookie");
if ($admin == false && get_cookie("username") == "admin") { ?>
    <div class="bg-light bg-gradient p-1">
        <div class="d-flex justify-content-center text-center my-3">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fw-bold p-0 m-0">PERUBAHAN ITEM SELESAI, SILAHKAN PILIH HALAMAN</h5>
                </div>
                <div class="card-body">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/home/view/sgBzTnjgeWNKb4ysCtea7J3u9SHBEgE3BmvwkVRJcU9zzqTsVXTPEk45qkxxG3aMBdTFVWCxRsDkSuA2u7J7T7EhZPBsGg8He4e8U6bx5cgkXhb5Zcj9eKQkgTPac3KQ" role="button">BERITA</a>
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>/home/view/XEmCfrN4ngBqAk2ZGRJ6qkJYF9en9hyea5y3hrnv8EmuUFgBxDSPk5Tu63a7wbcZqsWULbw3tgjfCmA4LLJVEe7sMKeDbcTGzXtTHLxwyB868BMcdfBTH8B48aqtBbP7" role="button">KEGIATAN</a>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <!-- BAGIAN LOGIN ADMIN -->
    <div class="bg-light bg-gradient p-1">
        <div class="d-flex justify-content-center text-center my-3">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="fw-bold p-0 m-0">ADMIN</h5>
                </div>
                <div class="card-body">
                    <main class="form-signin">
                        <?= session()->getFlashdata('error') ?>
                        <?= service('validation')->listErrors() ?>
                        <form method="POST" action="<?php echo base_url(); ?>/home/view/adminInspektorat">
                            <?= csrf_field() ?>
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
<?php } ?>
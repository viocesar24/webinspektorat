<div class="container-fluid bg-dark bg-gradient bg-opacity-25 p-5 text-dark">
    <div class="row">
        <div class="col-md-4 mb-3">
            <h6 class="fw-bold">LINK TERKAIT</h6>
            <div class="list-group list-group-flush text-dark">
                <a href="https://kedirikab.go.id/" class="list-group-item list-group-item-action bg-transparent text-dark">PEMERINTAHAN KABUPATEN KEDIRI</a>
                <a href="https://halomasbup.kedirikab.go.id/" class="list-group-item list-group-item-action bg-transparent text-dark">HALO MASBUP</a>
                <a href="https://e-survei.kedirikab.go.id/" class="list-group-item list-group-item-action bg-transparent text-dark">E-SURVEI KABUPATEN KEDIRI</a>
                <a href="https://wbs.kedirikab.go.id/" class="list-group-item list-group-item-action bg-transparent text-dark">WHISTLE BLOWING SYSTEM</a>
                <a href="https://dukcapil.kedirikab.go.id/" class="list-group-item list-group-item-action bg-transparent text-dark">DINAS KEPENDUDUKAN DAN CATATAN SIPIL</a>
                <a href="https://diskominfo.kedirikab.go.id/" class="list-group-item list-group-item-action bg-transparent text-dark">DINAS KOMUNIKASI DAN INFORMATIKA</a>
                <a href="https://disdik.kedirikab.go.id/" class="list-group-item list-group-item-action bg-transparent text-dark">DINAS PENDIDIKAN</a>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <h6 class="fw-bold">HUBUNGI KAMI</h6>
            <?php if (!empty($kontak) && is_array($kontak)) { ?>
                <ul class="list-unstyled">
                    <li>Alamat Kantor:</li>
                    <ul class="list-unstyled">
                        <li><?= $kontak['alamat'] ?></li>
                    </ul>
                    <hr>
                    <li>Telepon</li>
                    <ul class="list-unstyled">
                        <li><?= $kontak['telepon'] ?></li>
                    </ul>
                    <hr>
                    <li>Email</li>
                    <ul class="list-unstyled">
                        <li><?= $kontak['email'] ?></li>
                    </ul>
                    <hr>
                    <li>
                        <?php if (!empty($kontak['instagram'])) { ?>
                            <a href="<?= $kontak['instagram'] ?>" class="text-dark text-decoration-none me-1" target="_blank">
                                <i class="bi bi-instagram"></i>
                            </a>
                        <?php } ?>
                        <?php if (!empty($kontak['facebook'])) { ?>
                            <a href="<?= $kontak['facebook'] ?>" class="text-dark text-decoration-none me-1" target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                        <?php } ?>
                        <?php if (!empty($kontak['twitter'])) { ?>
                            <a href="<?= $kontak['twitter'] ?>" class="text-dark text-decoration-none me-1" target="_blank">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                        <?php } ?>
                        <?php if (!empty($kontak['tiktok'])) { ?>
                            <a href="<?= $kontak['tiktok'] ?>" class="text-dark text-decoration-none me-1" target="_blank">
                                <i class="bi bi-tiktok"></i>
                            </a>
                        <?php } ?>
                        <?php if (!empty($kontak['youtube'])) { ?>
                            <a href="<?= $kontak['youtube'] ?>" class="text-dark text-decoration-none" target="_blank">
                                <i class="bi bi-youtube"></i>
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>
<footer class="footer mt-auto">
    <div class="container-fluid text-center text-dark bg-secondary bg-gradient bg-opacity-25">
        <em>Made with Codeigniter 4 & Bootstrap v5.2.0 &copy; 2022 - <?php echo date('Y'); ?> by Inspektorat Kabupaten Kediri</em>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
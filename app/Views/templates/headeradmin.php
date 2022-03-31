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
    <div class="container-fluid p-0 m-0 sticky-top">
        <div id='recaptcha' class="g-recaptcha" data-sitekey="6Lc5bngeAAAAAGD4F5YX42DXSB31qvDyfX4TcK1_" data-callback="onSubmit" data-size="invisible"></div>
        <nav id="field" class="navbar navbar-light bg-light justify-content-center">
            <button class="btn btn-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">HALAMAN ADMIN</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="d-grid gap-2">
                        <a class="btn btn-outline-dark" href="<?php echo base_url(); ?>/home/view/adminberita" role="button">ADMIN BERITA</a>
                        <a class="btn btn-outline-dark" href="<?php echo base_url(); ?>/home/view/adminkegiatan" role="button">ADMIN KEGIATAN</a>
                        <a class="btn btn-outline-danger" href="<?php echo base_url(); ?>/home/view/admin" role="button">KELUAR</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid bg-secondary p-1"></div>
    </div>
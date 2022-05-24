<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
            <img src="<?php echo base_url(); ?>/img/INSPEKTORAT.svg" height="50" alt="Inspektorat Kabupaten Kediri">
        </nav>
        <div class="container-fluid bg-secondary p-1"></div>
    </div>
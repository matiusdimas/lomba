<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Lomba | Login</title>
    <style>
        body {
            background-image: url('<?= base_url("assets/images/bg-image.jpeg") ?>');
            height: 100vh;
        }
    </style>
</head>

<body>
    <main class="d-md-flex d-flex flex-column flex-md-row justify-content-center align-items-center gap-5 h-100">
        <div class="col-5">
            <h2 class="text-center"><strong>SELAMAT DATANG</strong></h2>
            <h2 class="text-center"><strong>DI PORTAL REGISTRASI</strong></h2>
            <h1 class="text-center fs-1"><strong>ISLA</strong></h1>
            <h2 class="text-center"><strong>INFORMASI SEPUTAR LOMBA AGUSTUSAN</strong></h2>
        </div>

        <?php if (validation_errors()) { ?>
            <div class='position-absolute'>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= validation_errors() ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php } ?>
        <div class="col-3">
            <?= $this->session->flashdata('pesan') ?>

            <form action="<?= base_url('login/register') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label"><strong>USERNAME</strong></label>
                    <input type="text" class="form-control" name="username" id="username"
                        value="<?= set_value('username') ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label"><strong>PASSWORD</strong></label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label"><strong>NAMA</strong></label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('username') ?>">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label"><strong>ALAMAT</strong></label>
                    <input type="alamat" class="form-control" name="alamat" id="alamat"
                        value="<?= set_value('alamat') ?>">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label"><strong>NO HP</strong></label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= set_value('no_hp') ?>">
                </div>
                <button type="submit" class="btn btn-success mx-auto">DAFTAR</button>
                <a href="<?= base_url('login') ?>" class="decoration-none">
                    Sudah Punya Akun?
                </a>
            </form>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>
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
            display: grid;
            place-content: center;
            background-color: lightgray;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin border rounded card px-5 py-5">
        <form action="<?= base_url('login') ?>" method="post">
            <h1 class="h3 mb-3 fw-normal">Please Login</h1>
            <?= $this->session->flashdata('pesan') ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Input Username" name="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating  mt-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Login</button>
        </form>
    </main>





</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</html>
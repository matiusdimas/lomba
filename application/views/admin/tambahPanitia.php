<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <button class="border border-dark btn btn-light" onclick="window.history.back()"><strong>KEMBALI</strong>
            </button>
        </div>

        <div class="p-2 text-center w-100">
            <h1>TAMBAH USER</h1>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center gap-5" style='height: 80vh;'>
        <?php if (validation_errors()) { ?>
            <div class='position-absolute'>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= validation_errors() ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php } ?>
        <?= $this->session->flashdata('pesan') ?>

        <form action="<?= base_url('panitia/tambah') ?>" method="post" class="row">
            <div class="col">
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
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="alamat" class="form-label"><strong>ALAMAT</strong></label>
                    <input type="alamat" class="form-control" name="alamat" id="alamat"
                        value="<?= set_value('alamat') ?>">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label"><strong>ROLE</strong></label>
                    <select name="role" id="role" class="form-select" aria-label="Default select example">
                        <option value="ADMIN">ADMIN</option>
                        <option value="USER">USER</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label"><strong>NO HP</strong></label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= set_value('no_hp') ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success mx-auto">ADD</button>

        </form>
    </div>
</div>
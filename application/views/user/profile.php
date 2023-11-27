<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <div class="d-flex gap-3 align-items-center">
                <a href="<?= base_url() ?>" class="border border-dark btn btn-light"><strong>KEMBALI</strong>
                </a>
            </div>
        </div>

        <div class="p-2 text-center w-100">
            <h1>HALAMAN PROFILE</h1>
        </div>
        <div class="me-4">
            <a href="<?= base_url('user/profile') ?>" class="border border-dark btn btn-light"><strong>PROFILE</strong>
            </a>
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
        <form action="<?= base_url('user/profile') ?>" method="post" class="d-flex gap-5">
            <div>
                <input type="text" class="form-control" value="<?= $user->password ?>" name="old_password" readonly
                    hidden>
                <div class="mb-3">
                    <label for="username" class="form-label">USERNAME</label>
                    <input type="text" class="form-control" value="<?= $user->username ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">NEW PASSWORD</label>
                    <input type="text" class="form-control" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">NAMA</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $user->nama ?>">
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">ALAMAT</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $user->alamat ?>">
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">NO HP</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $user->no_hp ?>">
                </div>
                <div class="mb-3 mt-5">
                    <button class="btn btn-primary" type="submit">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
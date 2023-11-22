<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <a href="<?= base_url('login/logout') ?>" class="border border-dark btn btn-light"><strong>LOGOUT</strong>
            </a>
        </div>

        <div class="p-2 text-center w-100">
            <h1>HALAMAN UTAMA</h1>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center gap-5" style='height: 80vh;'>
        <div>
            <div>
                <h1 class="text-center"><?= $this->session->userdata('username') ?></h1>
            </div>
            <div class="d-grid -4 gap-2">
                <a href="<?= base_url('peserta/datapeserta') ?>" class="border border-dark btn btn-light"><strong>DATA
                        PESERTA</strong></a>
                <a href="<?= base_url('kategori/datakategori') ?>"
                    class="border border-dark btn btn-light"><strong>KATEGORI
                        LOMBA</strong></a>
            </div>
        </div>
    </div>
</div>
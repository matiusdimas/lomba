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
                <a href="<?= base_url('admin/peserta') ?>" class="border border-dark btn btn-light"><strong>BUAT
                        FORMULIR BARU</strong></a>
                <a href="<?= base_url('admin/datapeserta') ?>" class="border border-dark btn btn-light"><strong>RIWAYAT
                        PENDAFTARAN</strong></a>
            </div>
        </div>
        <div class="d-flex flex-column gap-2 col-5">
            <div class="d-flex flex-wrap gap-4">
                <div class="card border-5 border-dark" style="">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title"><strong>LOMBA PUISI</strong></h5>
                        <p class="card-text text-center">10 / 15</p>
                        <a href="#" class="border border-dark btn btn-light"><strong>CEK</strong></a>
                    </div>
                </div>
                <div class="card border-5 border-dark" style="">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title"><strong>LOMBA PUISI</strong></h5>
                        <p class="card-text text-center">10 / 15</p>
                        <a href="#" class="border border-dark btn btn-light"><strong>CEK</strong></a>
                    </div>
                </div>
                <div class="card border-5 border-dark" style="">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title"><strong>LOMBA PUISI</strong></h5>
                        <p class="card-text text-center">10 / 15</p>
                        <a href="#" class="border border-dark btn btn-light"><strong>CEK</strong></a>
                    </div>
                </div>
                <div class="card border-5 border-dark" style="">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title"><strong>LOMBA PUISI</strong></h5>
                        <p class="card-text text-center">10 / 15</p>
                        <a href="#" class="border border-dark btn btn-light"><strong>CEK</strong></a>
                    </div>
                </div>
                <div class="card border-5 border-dark" style="">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title"><strong>LOMBA PUISI</strong></h5>
                        <p class="card-text text-center">10 / 15</p>
                        <a href="#" class="border border-dark btn btn-light"><strong>CEK</strong></a>
                    </div>
                </div>
                <div class="card border-5 border-dark" style="">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title"><strong>LOMBA PUISI</strong></h5>
                        <p class="card-text text-center">10 / 15</p>
                        <a href="#" class="border border-dark btn btn-light"><strong>CEK</strong></a>
                    </div>
                </div>
            </div>
            <div class="align-self-end">
                <a href="<?= base_url('admin/kategori') ?>" class="border border-dark btn btn-light">
                    <strong>
                        TAMBAH KATEGORI
                    </strong>
                </a>
                <a href="<?= base_url('admin/datakategori') ?>" class="border border-dark btn btn-light">
                    <strong>
                        LIHAT KATEGORI
                    </strong>
                </a>
            </div>
        </div>
    </div>
</div>
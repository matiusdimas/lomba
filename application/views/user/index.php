<?php
setlocale(LC_TIME, 'id_ID');
?>
<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <div class="d-flex gap-3 align-items-center">
                <a href="<?= base_url('login/logout') ?>"
                    class="border border-dark btn btn-light"><strong>LOGOUT</strong>
                </a>
                <?php if ($this->session->userdata('role') == 'ADMIN') { ?>
                    <a href="<?= base_url('admin') ?>" class="border border-dark btn btn-light"><strong>HALAMAN
                            ADMIN</strong>
                    </a>
                <?php } ?>
            </div>
        </div>

        <div class="p-2 text-center w-100">
            <h1>HALAMAN UTAMA</h1>
        </div>
        <div class="me-4">
            <a href="<?= base_url('user/profile') ?>" class="border border-dark btn btn-light"><strong>PROFILE</strong>
            </a>
        </div>
    </div>

    <div class="mt-2">
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <?php foreach ($lomba as $l) { ?>
                <div class="card col-3 bg-light border border-dark">
                    <img src="<?= base_url('assets/images/lomba/' . $l['gambar']) ?>" class="card-img-top" alt="gambar"
                        width="100%" height="200px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $l['kat_lb'] ?></h5>
                        <div class="card-text mb-1">
                            <div>Peserta = <?= $l['total_ps'] . '/' . $l['max_ps'] ?></div>
                            <div>Tempat = <?= $l['venue_lb'] ?></div>
                            <div>Penanggung Jawab = <?= $l['nama_pj'] ?></div>
                            <div>Usia = <?= $l['usia_min'] . " - " . $l['usia_max'] . ' Tahun' ?></div>
                            <div>
                                Waktu Mulai = <?= date("d F Y H:i:s", strtotime($l['waktu_lb'])) ?>
                            </div>
                            <div>
                                Waktu Akhir = <?= date("d F Y H:i:s", strtotime($l['waktu_selesai_lb'])) ?>
                            </div>
                        </div>
                        <a href="<?= base_url('user/detail/' . $l['id_lb']) ?>" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
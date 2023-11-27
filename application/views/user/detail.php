<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <a class="border border-dark btn btn-light" href="<?= base_url('/') ?>"><strong>KEMBALI</strong>
            </a>
        </div>

        <div class="p-2 text-center w-100">
            <h1>KATEGORI LOMBA</h1>
        </div>
    </div>

    <div class="px-5 mt-5">
        <?= $this->session->flashdata('pesan') ?>
        <div class="mb-3">
            <?php foreach ($lomba as $l) { ?>
                <div>
                    <h2 class="text-center mb-3"><strong><?= $l['kat_lb'] ?></strong></h2>
                    <p><strong>Jika Ada Yang Ingin ditanyakan Silahkan Hubungi : <?= $l['nama_pj'] ?></strong></p>
                    <p><strong>Silahkan Datang Ke Tempat Sekretariat Rt/Rw 001/010 Jika Ingin Mendaftar</strong></p>
                </div>
            <?php } ?>
        </div>
        <div class="table-responsive">
            <table class="table table-light rounded table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAMA PESERTA</th>
                        <th scope="col">JENIS KELAMIN</th>
                        <th scope="col">USIA</th>
                        <th scope="col">TANGGAL DAFTAR</th>
                        <th scope="col">JUARA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peserta as $i => $k) {
                        $birthDate = $k['tgl_lahir']; // Ganti dengan kolom tgl_lahir dari data peserta
                        $currentYear = date("Y"); // Tahun sekarang
                        $birthYear = date("Y", strtotime($birthDate));
                        $age = $currentYear - $birthYear;
                        $ageIn2023 = $age + (2023 - $currentYear); // Usia pada tahun 2023
                        ?>
                        <tr>
                            <th scope="row" class="align-middle"><?= $i + 1 ?></th>
                            <td class="align-middle"><?= $k['nama_ps'] ?></td>
                            <td class="align-middle"><?= $k['jk_ps'] ?></td>
                            <td class="align-middle"><?= $ageIn2023 ?></td>
                            <td class="align-middle"><?= $k['tgl_daftar'] ?></td>
                            <td class="align-middle"><?= $k['juara'] ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
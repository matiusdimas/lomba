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

    <div class="container mt-5">
        <?= $this->session->flashdata('pesan') ?>
        <div class="mb-3">
            <a href="<?= base_url('kategori') ?>" class="btn btn-success">ADD</a>
        </div>
        <div class="table-responsive">
            <table class="table table-light rounded table-bordered">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">KATEGORI LOMBA</th>
                        <th scope="col">NAMA PENANGGUNG JAWAB</th>
                        <th scope="col">MAX PESERTA</th>
                        <th scope="col">MAX VENUE</th>
                        <th scope="col">TANGGAL MULAI</th>
                        <th scope="col">TANGGAL SELESAI</th>
                        <th scope="col">BIAYA</th>
                        <th scope="col">JUARA 1</th>
                        <th scope="col">JUARA 2</th>
                        <th scope="col">JUARA 3</th>
                        <th scope="col">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kategori as $i => $k) { ?>
                        <tr>
                            <th scope="row" class="align-middle"><?= $i + 1 ?></th>
                            <td class="align-middle"><?= $k['kat_lb'] ?></td>
                            <td class="align-middle"><?= $k['nama_pj'] ?></td>
                            <td class="align-middle"><?= $k['max_ps'] ?></td>
                            <td class="align-middle"><?= $k['venue_lb'] ?></td>
                            <td class="align-middle"><?= $k['waktu_lb'] ?></td>
                            <td class="align-middle"><?= $k['waktu_selesai_lb'] ?></td>
                            <td class="align-middle"><?= $k['biaya_lb'] ?></td>
                            <td class="align-middle"><?= $k['juara1'] ?></td>
                            <td class="align-middle"><?= $k['juara2'] ?></td>
                            <td class="align-middle"><?= $k['juara3'] ?></td>
                            <td class="align-middle">
                                <div class="d-flex gap-3">
                                    <a href="<?= base_url('kategori/updatekategori/' . $k['id_lb']) ?>"
                                        class="border border-dark btn btn-light">UPDATE</a>
                                    <a href="<?= base_url('kategori/deletekategori/' . $k['id_lb']) ?>"
                                        class="border border-dark btn btn-light">HAPUS</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
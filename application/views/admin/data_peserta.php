<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <a class="border border-dark btn btn-light" href="<?= base_url('/') ?>"><strong>KEMBALI</strong>
            </a>
        </div>

        <div class="p-2 text-center w-100">
            <h1>DATA PESERTA</h1>
        </div>
    </div>

    <div class="container mt-5">
        <?= $this->session->flashdata('pesan') ?>
        <div class="mb-3">
            <a href="<?= base_url('peserta') ?>" class="btn btn-success">ADD</a>
        </div>
        <table class="table table-light rounded table-bordered">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">NAMA LENGKAP</th>
                    <th scope="col">KATEGORI LOMBA</th>
                    <th scope="col">JUARA</th>
                    <th scope="col">NO HP</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">TANGGAL LAHIR</th>
                    <th scope="col">TANGGAL DAFTAR</th>
                    <th scope="col">BIAYA</th>
                    <th scope="col">OPSI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peserta as $i => $p) { ?>
                    <tr>
                        <th scope="row" class="align-middle"><?= $i + 1 ?></th>
                        <td class="align-middle"><?= $p['nama_ps'] ?></td>
                        <td class="align-middle"><?= $p['id_lb'] ?></td>
                        <td class="align-middle"><?= $p['juara'] ?></td>
                        <td class="align-middle"><?= $p['hp_ps'] ?></td>
                        <td class="align-middle"><?= $p['alamat_ps'] ?></td>
                        <td class="align-middle"><?= $p['jk_ps'] ?></td>
                        <td class="align-middle"><?= $p['tgl_lahir'] ?></td>
                        <td class="align-middle"><?= $p['tgl_daftar'] ?></td>
                        <td class="align-middle"><?= $p['bayar'] ?></td>
                        <td class="align-middle">
                            <div class="d-flex gap-3">
                                <a href="<?= base_url('peserta/updatepeserta/' . $p['no_ps']) ?>"
                                    class="border border-dark btn btn-light">UPDATE</a>
                                <a href="<?= base_url('peserta/deletepeserta/' . $p['no_ps']) ?>"
                                    class="border border-dark btn btn-light">HAPUS</a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
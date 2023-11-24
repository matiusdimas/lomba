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
        <div class="mb-3 d-flex gap-2 align-items-center">
            <a href="<?= base_url('peserta') ?>" class="btn btn-success">ADD</a>
            <div>
                <select name="tahun" id="tahun" class="form-select" aria-label="Default select example"
                    onchange="navigate(this)">

                    <option value="0">Pilih Semua Tahun</option>
                    <?php foreach ($years as $y) { ?>
                        <?php if (isset($tahun_query) && $y == $tahun_query) { ?>
                            <option value="<?= $tahun_query ?>" selected><?= $tahun_query ?></option>
                        <?php } else { ?>
                            <option value="<?= $y ?>"><?= $y ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div>
                <select name="kategori" id="kategori" class="form-select" aria-label="Default select example"
                    onchange="navigate(this)">

                    <option value="0">Pilih Semua kategori</option>
                    <?php foreach ($kategori as $k) { ?>
                        <?php if (isset($kategori_query) && $k['id_lb'] == $kategori_query) { ?>
                            <option value="<?= $kategori_query ?>" selected><?= $k['id_lb'] . ' | ' . $k['kat_lb'] ?></option>
                        <?php } else { ?>
                            <option value="<?= $k['id_lb'] ?>"><?= $k['id_lb'] . ' | ' . $k['kat_lb'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <?php if (isset($tahun_query)) { ?>
                <a href="<?= base_url('peserta/print/' . $tahun_query) ?>" class="btn btn-primary">PRINT</a>
            <?php } ?>
        </div>
        <div class="table-responsive mb-2">

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
</div>
<script>
    $('#tahun, #kategori').on('change', function () {
        var selectedYear = $('#tahun').val();
        var selectedKategori = $('#kategori').val();

        var baseUrl = window.location.href.split('?')[0]; // Mengambil bagian sebelum tanda '?'
        var queryParams = {};

        if (selectedYear && selectedYear !== '0') {
            queryParams['tahun'] = selectedYear;
        }
        if (selectedKategori && selectedKategori !== '0') {
            queryParams['kategori'] = selectedKategori;
        }

        var queryString = $.param(queryParams); // Mengubah objek menjadi string query

        var finalUrl = baseUrl;
        if (queryString !== '') {
            finalUrl += '?' + queryString;
        }

        window.location.href = finalUrl;
    });

</script>
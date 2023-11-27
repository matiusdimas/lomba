<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <button class="border border-dark btn btn-light" onclick="window.history.back()"><strong>KEMBALI</strong>
            </button>
        </div>

        <div class="p-2 text-center w-100">
            <h1><?= $halaman ?></h1>
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
        <form action="<?= isset($id) ? base_url('peserta/updatepeserta/' . $id) : base_url('peserta') ?>" method="post">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label"><strong>NAMA LENGKAP</strong></label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                            value="<?= isset($id) ? $peserta->nama_ps : set_value('nama_lengkap') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label"><strong>ALAMAT</strong></label>
                        <input type="text" class="form-control" name="alamat" id="alamat"
                            value="<?= isset($id) ? $peserta->alamat_ps : set_value('alamat') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label"><strong>TANGGAL LAHIR</strong></label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                            value="<?= isset($id) ? date('Y-m-d', strtotime($peserta->tgl_lahir)) : set_value('tanggal_lahir') ?>">
                    </div>
                    <div>
                        <div>
                            <label for="inlineRadio1">JENIS KELAMIN</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1"
                                value="LAKI-LAKI" <?= isset($id) && $peserta->jk_ps === 'LAKI-LAKI' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio1">LAKI-LAKI</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2"
                                value="PEREMPUAN" <?= isset($id) && $peserta->jk_ps === 'PEREMPUAN' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="inlineRadio2">PEREMPUAN</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="no_hp" class="form-label"><strong>NO HP</strong></label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp"
                            value="<?= isset($id) ? $peserta->hp_ps : set_value('no_hp') ?>">
                    </div>
                    <?php if (!isset($id)) { ?>
                        <div class="mb-3">
                            <label for="kategori_lomba" class="form-label"><strong>KATEGORI LOMBA</strong></label>
                            <select name="kategori_lomba" id="kategori_lomba" class="form-select"
                                aria-label="Default select example">
                                <option value="kosong">Pilih Kategori</option>
                                <?php foreach ($kategori as $k) { ?>
                                    <option data-biaya="<?= $k['biaya_lb'] ?>" value="<?= $k['id_lb'] ?>">
                                        <?= $k['id_lb'] . ' | ' . $k['kat_lb'] ." | Usia ". $k['usia_min'] ."-" . $k['usia_max']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="biaya" class="form-label"><strong>BIAYA Rp</strong></label>
                            <input type="number" class="form-control" name="biaya" id="biaya" readonly>
                        </div>
                    <?php } else { ?>
                        <div class="mb-3">
                            <label for="juara" class="form-label"><strong>Juara</strong></label>
                            <input type="number" class="form-control" name="juara" id="juara"
                                value="<?= $peserta->juara ?>">
                        </div>
                    <?php } ?>
                    <div class="mt-5 ">
                        <button type="submit" class="mx-auto border border-dark btn btn-light">SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#kategori_lomba').change(function () {
            var selectedOption = $(this).find('option:selected');
            var biaya = selectedOption.data('biaya');
            $('#biaya').val(biaya);
        });
    });
</script>
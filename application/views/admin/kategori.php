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
        <form
            action="<?= $title != 'Lomba | UBAH KATEGORI' ? base_url('kategori') : base_url('kategori/updatekategori/' . $id) ?>"
            method="post">
            <?= $this->session->flashdata('pesan') ?>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label"><strong>NAMA KATEGORI</strong></label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                            value="<?= isset($id) ? $kategori->kat_lb : set_value('nama_kategori') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pj" class="form-label"><strong>NAMA PENANGGUNG JAWAB</strong></label>
                        <input type="text" class="form-control" name="nama_pj" id="nama_pj"
                            value="<?= isset($id) ? $kategori->nama_pj : set_value('nama_pj') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="venue" class="form-label"><strong>VENUE</strong></label>
                        <input type="text" class="form-control" name="venue" id="venue"
                            value="<?= isset($id) ? $kategori->venue_lb : set_value('venue') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_peserta" class="form-label"><strong>MAX PESERTA</strong></label>
                        <input type="number" class="form-control" name="total_peserta" id="total_peserta"
                            value="<?= isset($id) ? $kategori->max_ps : set_value('total_peserta') ?>" required>
                    </div>
                    <?php if (isset($id)) { ?>
                        <div class="mb-3">
                            <label for="jumlah_peserta" class="form-label"><strong>TOTAL PESERTA</strong></label>
                            <input type="number" class="form-control" name="jumlah_peserta" id="jumlah_peserta"
                                value="<?= isset($id) ? $kategori->total_ps : set_value('jumlah_peserta') ?>" required>
                        </div>
                    <?php } ?>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label"><strong>WAKTU MULAI</strong></label>
                        <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai"
                            value='<?= isset($id) ? date('Y-m-d', strtotime($kategori->waktu_lb)) : set_value('tanggal_mulai') ?>'>
                        <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai"
                            value='<?= isset($id) ? date('H:i', strtotime($kategori->waktu_lb)) : set_value('wakut_mulai') ?>'>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_akhir" class="form-label"><strong>WAKTU SELESAI</strong></label>
                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir"
                            value='<?= isset($id) ? date('Y-m-d', strtotime($kategori->waktu_selesai_lb)) : set_value('tanggal_akhir') ?>'>
                        <input type="time" class="form-control" name="waktu_akhir" id="waktu_akhir"
                            value='<?= isset($id) ? date('H:i', strtotime($kategori->waktu_selesai_lb)) : set_value('waktu_akhir') ?>'>
                    </div>

                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="biaya" class="form-label"><strong>BIAYA DAFTAR Rp</strong></label>
                        <input type="number" class="form-control" name="biaya" id="biaya"
                            value="<?= isset($id) ? $kategori->biaya_lb : set_value('biaya') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="juara1" class="form-label"><strong>JUARA 1</strong></label>
                        <input type="number" class="form-control" name="juara1" id="juara1"
                            value="<?= isset($id) ? $kategori->juara1 : set_value('juara1') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="juara2" class="form-label"><strong>JUARA 2</strong></label>
                        <input type="number" class="form-control" name="juara2" id="juara2"
                            value="<?= isset($id) ? $kategori->juara2 : set_value('juara2') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="juara3" class="form-label"><strong>JUARA 3</strong></label>
                        <input type="number" class="form-control" name="juara3" id="juara3"
                            value="<?= isset($id) ? $kategori->juara3 : set_value('juara3') ?>" required>
                    </div>
                    <div class="mt-5 ">
                        <button type="submit" class="mx-auto border border-dark btn btn-light">SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
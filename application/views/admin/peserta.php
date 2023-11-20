<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <button class="border border-dark btn btn-light" onclick="window.history.back()"><strong>KEMBALI</strong>
            </button>
        </div>

        <div class="p-2 text-center w-100">
            <h1>FORM PENDAFTARAN</h1>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center gap-5" style='height: 80vh;'>
        <form action="<?= base_url('admin/peserta') ?>" method="post">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label"><strong>NAMA LENGKAP</strong></label>
                        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label"><strong>ALAMAT</strong></label>
                        <input type="text" class="form-control" name="alamat" id="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_Lahir" class="form-label"><strong>TANGGAL LAHIR</strong></label>
                        <input type="date" class="form-control" name="tanggal_Lahir" id="tanggal_Lahir">
                    </div>
                    <div>
                        <div>
                            <label for="inlineRadio1">JENIS KELAMIN</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" checked>
                            <label class="form-check-label" for="inlineRadio1">LAKI-LAKI</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2">
                            <label class="form-check-label" for="inlineRadio2">PEREMPUAN</label>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="kategori_lomba" class="form-label"><strong>KATEGORI LOMBA</strong></label>
                        <input type="text" class="form-control" name="kategori_lomba" id="kategori_lomba">
                    </div>
                    <div class="mb-3">
                        <label for="biaya" class="form-label"><strong>BIAYA Rp</strong></label>
                        <input type="number" class="form-control" name="biaya" id="biaya">
                    </div>
                    <div class="mt-5 ">
                        <button type="submit" class="mx-auto border border-dark btn btn-light">SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
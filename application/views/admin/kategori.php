<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <button class="border border-dark btn btn-light" onclick="window.history.back()"><strong>KEMBALI</strong>
            </button>
        </div>

        <div class="p-2 text-center w-100">
            <h1>TAMBAH KATEGORI</h1>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center gap-5" style='height: 80vh;'>
        <form action="<?= base_url('admin/kategori') ?>" method="post">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label"><strong>NAMA KATEGORI</strong></label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori">
                    </div>
                    <div class="mb-3">
                        <label for="nama_pj" class="form-label"><strong>NAMA PENANGGUNG JAWAB</strong></label>
                        <input type="text" class="form-control" name="nama_pj" id="nama_pj">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label"><strong>NO HP</strong></label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp">
                    </div>
                    <div class="mb-3">
                        <label for="venue" class="form-label"><strong>VENUE</strong></label>
                        <input type="text" class="form-control" name="venue" id="venue">
                    </div>
                    <div class="mb-3">
                        <label for="total_peserta" class="form-label"><strong>TOTAL PESERTA</strong></label>
                        <input type="number" class="form-control" name="total_peserta" id="total_peserta">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label"><strong>WAKTU MULAI</strong></label>
                        <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                        <input type="time" class="form-control" name="waktu_mulai" id="waktu_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_akhir" class="form-label"><strong>WAKTU MULAI</strong></label>
                        <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                        <input type="time" class="form-control" name="waktu_akhir" id="waktu_akhir">
                    </div>

                </div>
                <div class="col">

                    <div class="mb-3">
                        <label for="biaya" class="form-label"><strong>BIAYA DAFTAR Rp</strong></label>
                        <input type="number" class="form-control" name="biaya" id="biaya">
                    </div>
                    <div class="mb-3">
                        <label for="juara1" class="form-label"><strong>JUARA 1</strong></label>
                        <input type="number" class="form-control" name="juara1" id="juara1">
                    </div>
                    <div class="mb-3">
                        <label for="juara2" class="form-label"><strong>JUARA 2</strong></label>
                        <input type="number" class="form-control" name="juara2" id="juara2">
                    </div>
                    <div class="mb-3">
                        <label for="juara3" class="form-label"><strong>JUARA 3</strong></label>
                        <input type="number" class="form-control" name="juara3" id="juara3">
                    </div>
                    <div class="mt-5 ">
                        <button type="submit" class="mx-auto border border-dark btn btn-light">SUBMIT</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
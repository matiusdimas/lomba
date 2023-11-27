<div>
    <div class="d-flex align-items-center" style="height: 6.5rem;">
        <div class="p-2 ps-4 flex-shrink-1 text-center">
            <a class="border border-dark btn btn-light" href="<?= base_url('/') ?>"><strong>KEMBALI</strong>
            </a>
        </div>

        <div class="p-2 text-center w-100">
            <h1>DATA USER</h1>
        </div>
    </div>

    <div class="container mt-5">
        <?= $this->session->flashdata('pesan') ?>
        <div class="mb-3 d-flex gap-2 align-items-center">
            <a href="<?= base_url('panitia/tambah') ?>" class="btn btn-success">ADD</a>
            <div>
                <select name="role" id="role" class="form-select" aria-label="Default select example"
                    onchange="navigate(this)">
                    <option value="0">Pilih Semua role</option>
                    <?php
                    $roles = $role;
                    $uniqueRoles = array(); // Array kosong untuk menyimpan nilai unik
                    foreach ($roles as $role) {
                        if (!in_array($role['role'], $uniqueRoles)) {
                            $uniqueRoles[] = $role['role'];
                        }
                    }
                    foreach ($uniqueRoles as $role) {
                        if ($role_query === $role) {
                            echo '<option selected value="' . $role . '">' . $role . '</option>';
                        } else {
                            echo '<option value="' . $role . '">' . $role . '</option>';
                        }
                    }
                    ?>
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
                        <th scope="col">USERNAME</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">ROLE</th>
                        <th scope="col">NO HP</th>
                        <th scope="col">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $i => $p) { ?>
                        <tr>
                            <th scope="row" class="align-middle"><?= $i + 1 ?></th>
                            <td class="align-middle"><?= $p['username'] ?></td>
                            <td class="align-middle"><?= $p['nama'] ?></td>
                            <td class="align-middle"><?= $p['alamat'] ?></td>
                            <td class="align-middle"><?= $p['role'] ?></td>
                            <td class="align-middle"><?= $p['no_hp'] ?></td>
                            <td class="align-middle">
                                <div class="d-flex gap-3">
                                    <?php if ($this->session->userdata('username') !== $p['username']) { ?>
                                        <a href="<?= base_url('panitia/delete/' . $p['id']) ?>"
                                            class="border border-dark btn btn-light">HAPUS</a>
                                    <?php } ?>
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
    $('#role').on('change', function () {
        var selectedrole = $('#role').val();

        var baseUrl = window.location.href.split('?')[0]; // Mengambil bagian sebelum tanda '?'
        var queryParams = {};

        if (selectedrole && selectedrole !== '0') {
            queryParams['role'] = selectedrole;
        }

        var queryString = $.param(queryParams); // Mengubah objek menjadi string query

        var finalUrl = baseUrl;
        if (queryString !== '') {
            finalUrl += '?' + queryString;
        }

        window.location.href = finalUrl;
    });

</script>
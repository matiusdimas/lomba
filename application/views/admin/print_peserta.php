<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Peserta Tahun <?= $tahun ?></title>
    <style>
        .text-center {
            text-align: center;
        }

        .center-table {
            display: grid;
            place-content: center;
        }


        table,
        th,
        td {
            border: 1px black;
            border-collapse: collapse;
            border-style: dotted;
        }

        tr th,
        tr td {
            padding: 2px 4px;
            /* Atur padding untuk elemen <th> dan <td> dalam <tr> */
        }
    </style>
</head>

<body>
    <main>
        <h3 class="text-center">Data Peserta Tahun <?= $tahun ?></h3>
        <h3 class="text-center">Total Peserta <?= count($peserta) ?></h3>
        <div class="center-table">
            <?php foreach ($kategori as $i => $k) { ?>
                <div>
                    <h3 class="text-center">Kategori : <?= $k['kat_lb'] ?></h3>
                    <h3 class="text-center">
                        Juara 1 : <?= $k['juara1'] ?>
                        Juara 2 : <?= $k['juara2'] ?>
                        Juara 3 : <?= $k['juara3'] ?>
                    </h3>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA LENGKAP</th>
                                <th scope="col">JUARA</th>
                                <th scope="col">NO HP</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">TANGGAL LAHIR</th>
                                <th scope="col">BIAYA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 1; // Variabel counter untuk nomor urut
                        
                            foreach ($peserta as $i => $p) {
                                if ($p['id_lb'] == $k['id_lb']) { ?>
                                    <tr>
                                        <th><?= $counter ?></th>
                                        <td><?= $p['nama_ps'] ?></td>
                                        <td><?= $p['juara'] ?></td>
                                        <td><?= $p['hp_ps'] ?></td>
                                        <td><?= $p['alamat_ps'] ?></td>
                                        <td><?= $p['jk_ps'] ?></td>
                                        <td><?= $p['tgl_lahir'] ?></td>
                                        <td><?= $p['bayar'] ?></td>
                                    </tr>
                                    <?php $counter++;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </main>
</body>
<script>
    window.print();
</script>

</html>
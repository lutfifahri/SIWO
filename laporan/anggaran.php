<?php include_once("../database/koneksi.php"); ?>
<?php include_once("../utils/tanggal.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include('kop.php'); ?>
    <hr>
    <?php

    ?>
    <section id="filter" class="my-4">
        <table>
            <tr>
                <td>Laporan</td>
                <td>: Data Anggaran</td>
            </tr>
            <?php if (isset($_GET['dari']) && isset($_GET['sampai'])) : ?>
                <?php if ($_GET['dari'] != "" && $_GET['sampai'] != "") : ?>
                    <tr>
                        <td>Dari</td>
                        <td>: <?= explode('-', $_GET['dari'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $_GET['dari'])[1] - 1] . " " . explode('-', $_GET['dari'])[0] ?></td>
                    </tr>
                    <tr>
                        <td>Sampai</td>
                        <td>: <?= explode('-', $_GET['sampai'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $_GET['sampai'])[1] - 1] . " " . explode('-', $_GET['sampai'])[0] ?></td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
        </table>
    </section>
    <section id="data">
        <table class="table table-bordered">
            <thead class="text-center">
                <th class="text-center">No</th>
                <th class="text-center small-td">Tanggal Pengajuan</th>
                <th class="text-center small-td">Nama Klien</th>
                <th class="text-center">Total Anggaran Vendor</th>
                <th class="text-center">Anggaran Tambahan</th>
                <th class="text-center">Total Anggaran</th>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['dari'])) {
                    $sampai = $_GET['sampai'];
                    $dari = $_GET['dari'];
                }
                $q = "
                SELECT 
                    DATE(tb_pengajuan.tanggal_pengajuan) AS tanggal_pengajuan,
                    tb_anggaran.*,
                    tb_klien.nama_lengkap,
                    ((SELECT harga FROM tb_produksi WHERE id=tb_pengajuan.dekorasi) + (SELECT harga FROM tb_produksi WHERE id=tb_pengajuan.dokumentasi) + (SELECT harga FROM tb_equipment WHERE id=tb_pengajuan.lighting) + (SELECT harga FROM tb_equipment WHERE id=tb_pengajuan.sound) + (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.band) + (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.mc) + (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.mua)) AS total_anggaran_vendor 
                FROM 
                    tb_anggaran 
                INNER JOIN 
                    tb_pengajuan 
                ON 
                    tb_pengajuan.id=tb_anggaran.id_pengajuan 
                INNER JOIN 
                    tb_klien 
                ON 
                    tb_pengajuan.id_klien=tb_klien.id";

                if (isset($_GET['dari']) && isset($_GET['sampai'])) {
                    if ($_GET['dari'] != "" && $_GET['sampai'] != "")
                        $q .= "  AND DATE(tb_pengajuan.tanggal_pengajuan) >= '" . $_GET['dari'] . "' AND DATE(tb_pengajuan.tanggal_pengajuan) <= '" . $_GET['sampai'] . "'";
                }

                if ($result = $conn->query($q)) {
                } else echo "Error: " . $q . "<br>" . $conn->error;
                $no = 1;
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= explode('-', $row['tanggal_pengajuan'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $row['tanggal_pengajuan'])[1] - 1] . " " . explode('-', $row['tanggal_pengajuan'])[0] ?></td>
                            <td class="text-center"><?= $row['nama_lengkap'] ?></td>
                            <td class="text-center">Rp. <?= number_format($row['total_anggaran_vendor'], 0, ",", "."); ?></td>
                            <td class="text-center">Rp. <?= number_format($row['anggaran_tambahan'], 0, ",", "."); ?></td>
                            <td class="text-center">Rp. <?= number_format($row['anggaran_tambahan'] + $row['total_anggaran_vendor'], 0, ",", "."); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak Ada Data</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
    <?php include_once("signature.php"); ?>


    <script>
        window.print();
    </script>
</body>

</html>
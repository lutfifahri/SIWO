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
                <td>: Data Pembayaran</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: <?= isset($_GET['status']) ? ($_GET['status'] == "" ? "Semua" : $_GET['status']) : "Semua" ?></td>
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
                <th class="text-center small-td">No</th>
                <th class="text-center small-td">Tanggal Pembayaran</th>
                <th class="text-center">Nama Klien</th>
                <th class="text-center">Bank</th>
                <th class="text-center">Atas Nama</th>
                <th class="text-center">Nomor Rekening</th>
                <th class="text-center">Total Pembayaran</th>
                <th class="text-center">Status</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center small-td">Tanggal Verifikasi</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = "
                                        SELECT 
                                        tb_pembayaran.keterangan AS keterangan_pembayaran,
                                        tb_pembayaran.status AS status_pembayaran,
                                        tb_pembayaran.id AS id_pembayaran,
                                        tb_pembayaran.file_bukti_pembayaran,
                                        tb_pembayaran.tanggal AS tanggal_pembayaran,
                                        tb_pembayaran.tanggal_verifikasi,
                                        tb_bank.nama AS nama_bank,
                                        tb_bank.atas_nama,
                                        tb_bank.no_rek,
                                        tb_pengajuan.*,
                                        tb_klien.nik,
                                        tb_klien.nama_lengkap,
                                        tb_klien.email,
                                        tb_anggaran.id AS id_anggaran,
                                        tb_anggaran.anggaran_tambahan,
                                        tb_anggaran.detail_anggaran,
                                        (SELECT nama FROM tb_konsep WHERE id=tb_pengajuan.konsep) AS konsep,
                                        (SELECT nama FROM tb_produksi WHERE id=tb_pengajuan.dekorasi) AS dekorasi,
                                        (SELECT harga FROM tb_produksi WHERE id=tb_pengajuan.dekorasi) AS harga_dekorasi,
                                        (SELECT nama FROM tb_produksi WHERE id=tb_pengajuan.dokumentasi) AS dokumentasi,
                                        (SELECT harga FROM tb_produksi WHERE id=tb_pengajuan.dokumentasi) AS harga_dokumentasi,
                                        (SELECT nama FROM tb_equipment WHERE id=tb_pengajuan.lighting) AS lighting,
                                        (SELECT harga FROM tb_equipment WHERE id=tb_pengajuan.lighting) AS harga_lighting,
                                        (SELECT nama FROM tb_equipment WHERE id=tb_pengajuan.sound) AS sound,
                                        (SELECT harga FROM tb_equipment WHERE id=tb_pengajuan.sound) AS harga_sound,
                                        (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.band) AS band,
                                        (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.band) AS harga_band,
                                        (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.mc) AS mc,
                                        (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.mc) AS harga_mc,
                                        (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.mua) AS mua, 
                                        (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.mua) AS harga_mua 
                                        FROM 
                                            tb_pengajuan 
                                        INNER JOIN 
                                            tb_klien 
                                        ON 
                                            tb_pengajuan.id_klien=tb_klien.id 
                                        INNER JOIN 
                                            tb_anggaran 
                                        ON 
                                            tb_pengajuan.id=tb_anggaran.id_pengajuan 
                                        LEFT JOIN 
                                            tb_pembayaran 
                                        ON 
                                            tb_anggaran.id=tb_pembayaran.id_anggaran 
                                        INNER JOIN 
                                            tb_bank 
                                        ON 
                                            tb_bank.id=tb_pembayaran.id_bank 
                                            WHERE tb_pembayaran.status LIKE '%" . ($_POST['status'] ?? '') . "%'";
                if (isset($_POST['dari']) && isset($_POST['sampai'])) {
                    if ($_POST['dari'] != "" && $_POST['sampai'] != "")
                        $query .= "  AND DATE(tb_pembayaran.tanggal) >= '" . $_POST['dari'] . "' AND DATE(tb_pembayaran.tanggal) <= '" . $_POST['sampai'] . "'";
                }
                $result = $conn->query($query);
                ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <?php
                        $eng_date = explode('-', explode(' ', $row['tanggal_pembayaran'])[0]);
                        $tanggal = $eng_date[2];
                        $bulan = $eng_date[1];
                        $tahun = $eng_date[0];
                        ?>
                        <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td>
                        <td class="text-center"><?= $row['nama_lengkap'] ?></td>
                        <td class="text-center"><?= $row['nama_bank'] ?></td>
                        <td class="text-center"><?= $row['atas_nama'] ?></td>
                        <td class="text-center"><?= $row['no_rek'] ?></td>
                        <td class="text-center">Rp. <?=
                                                    number_format(
                                                        $row['anggaran_tambahan'] + $row['harga_dekorasi'] + $row['harga_dokumentasi'] + $row['harga_lighting'] + $row['harga_sound'] + $row['harga_band'] + $row['harga_mc'] + $row['harga_mua'],
                                                        0,
                                                        ",",
                                                        "."
                                                    );
                                                    ?></td>
                        <td class="text-center"><?= $row['status_pembayaran'] ?></td>
                        <td class=""><?= $row['keterangan_pembayaran'] ?></td>

                        <?php
                        $eng_date = explode('-', explode(' ', $row['tanggal_verifikasi'])[0]);
                        $tanggal = $eng_date[2];
                        $bulan = $eng_date[1];
                        $tahun = $eng_date[0];
                        ?>

                        <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
    <?php include_once("signature.php"); ?>


    <script>
        window.print();
    </script>
</body>

</html>
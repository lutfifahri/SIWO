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
                <td>: Data Pengajuan</td>
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
                <th>No</th>
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Disetujui</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Status</th>
                <th>Keterangan</th>
                <!-- <th>Lama Pengajuan</th> -->
            </thead>
            <tbody>
                <?php
                $q = "
					SELECT 
                        DATEDIFF(DATE(tb_pengajuan.tanggal_disetujui),DATE(tb_pengajuan.tanggal_pengajuan)) AS lama_pengajuan,
						tb_klien.nik, 
						tb_klien.nama_lengkap, 
						tb_pengajuan.status, 
						tb_pengajuan.keterangan, 
						tb_klien.email, 
						DATE(tb_pengajuan.tanggal_pengajuan) AS tanggal_pengajuan, 
						DATE(tb_pengajuan.tanggal_disetujui) AS tanggal_disetujui, 
						tb_user.username  
					FROM 
						tb_pengajuan
					INNER JOIN 
                        tb_klien 
					ON 
                        tb_pengajuan.id_klien=tb_klien.id 
                    INNER JOIN 
                        tb_user 
					ON 
                        tb_user.id=tb_klien.id_user 
                    WHERE 
                        tb_pengajuan.status LIKE '%" . ($_GET['status'] ?? "")  . "%'";

                if (isset($_GET['dari']) && isset($_GET['sampai'])) {
                    if ($_GET['dari'] != "" && $_GET['sampai'] != "")
                        $q .= "  AND DATE(tb_pengajuan.tanggal_pengajuan) >= '" . $_GET['dari'] . "' AND DATE(tb_pengajuan.tanggal_pengajuan) <= '" . $_GET['sampai'] . "'";
                }

                $q .= " ORDER BY tb_pengajuan.id";

                if ($result = $conn->query($q)) {
                } else echo "Error: " . $q . "<br>" . $conn->error;
                $no = 1;
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= explode('-', $row['tanggal_pengajuan'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $row['tanggal_pengajuan'])[1] - 1] . " " . explode('-', $row['tanggal_pengajuan'])[0] ?></td>
                            <?php
                            if (!is_null($row['tanggal_disetujui'])) {
                                $eng_date = explode('-', explode(' ', $row['tanggal_disetujui'])[0]);
                                $tanggal = $eng_date[2];
                                $bulan = $eng_date[1];
                                $tahun = $eng_date[0];
                                $tanggal_disetujui = $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun;
                                $lama_pengajuan = $row['lama_pengajuan'] . " Hari";
                            } else {
                                $lama_pengajuan = "Menunggu Persetujuan";
                                $tanggal_disetujui = "Menunggu Persetujuan";
                            }

                            ?>
                            <td class="text-center"><?= $tanggal_disetujui ?></td>
                            <td class="text-center"><?= $row['nik']; ?></td>
                            <td><?= $row['nama_lengkap']; ?></td>
                            <td class="text-center"><?= $row['username']; ?></td>
                            <td class="text-center"><?= $row['status']; ?></td>
                            <td class=""><?= $row['keterangan']; ?></td>
                            <!-- <td class="text-center"><?= $lama_pengajuan ?></td> -->
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
<?php include_once("../database/koneksi.php"); ?>
<?php include_once("../utils/tanggal.php"); ?>
<?php date_default_timezone_set("Asia/Kuala_Lumpur"); ?>
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
                <td>: Data Karyawan</td>
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
                <th>Tanggal Terdaftar</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Jabatan</th>
                <th>Lama Terdaftar</th>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['dari'])) {
                    $sampai = $_GET['sampai'];
                    $dari = $_GET['dari'];
                }

                $q = "
					SELECT 
                        tb_karyawan.nik, 
						tb_karyawan.nama, 
						tb_karyawan.no_telp, 
						tb_jabatan.nama AS nama_jabatan, 
						DATE(tb_karyawan.tmt) AS tmt
					FROM 
						tb_karyawan 
                    LEFT JOIN 
                        tb_jabatan 
                    ON 
                        tb_jabatan.id=tb_karyawan.id_jabatan" .
                    (isset($_GET['dari']) ? " WHERE (DATE(tb_karyawan.tmt) >= '$dari' AND DATE(tb_karyawan.tmt) <= '$sampai') " : "")
                    . " 
					ORDER BY 
                        tb_karyawan.id";

                if ($result = $conn->query($q)) {
                } else echo "Error: " . $q . "<br>" . $conn->error;
                $no = 1;
                ?>
                <?php if ($result->num_rows) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= explode('-', $row['tmt'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $row['tmt'])[1] - 1] . " " . explode('-', $row['tmt'])[0] ?></td>
                            <td class="text-center"><?= $row['nik']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td class="text-center"><?= $row['no_telp']; ?></td>
                            <td class="text-center"><?= $row['nama_jabatan']; ?></td>
                            <?php

                            $date1 = new DateTime(explode(' ', $row['tmt'])[0]);
                            $date2 = new DateTime();
                            $interval = $date1->diff($date2);
                            ?>
                            <td class="text-center">
                                <?php
                                if ($interval->y) {
                                    echo $interval->y . " Tahun";
                                }
                                if ($interval->m) {
                                    echo " " . $interval->m . " Bulan";
                                }
                                if ($interval->d) {
                                    echo " " . $interval->d . " Hari ";
                                }

                                if (!($interval->d || $interval->m || $interval->y))
                                    echo "Hari ini";

                                ?></td>
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
<?php include_once("../database/koneksi.php"); ?>
<?php include_once("../utils/tanggal.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- ChartJS -->
    <script src="../assets/plugins/chart.js/Chart.min.js"></script>
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
                <td>: Grafik Equipment</td>
            </tr>
            <tr>
                <td>Jenis</td>
                <td>: <?= $_GET['jenis'] ?? "SOUND" ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>: <?= $_GET['tahun'] ?? Date("Y") ?></td>
            </tr>
        </table>
    </section>
    <section id="data" class="p-1">
        <div class="chart">
            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
    </section>
    <?php include_once("signature.php"); ?>

    <?php
    if (isset($_GET['tahun'])) {
        $tahun = $_GET['tahun'];
    } else {
        $tahun = Date("Y");
    }

    if (isset($_GET['jenis'])) {
        $jenis = $_GET['jenis'];
    } else {
        $jenis = "SOUND";
    }
    $query = "SELECT * FROM tb_equipment WHERE jenis LIKE '%$jenis%'";
    $result = $conn->query($query);
    $data_konsep = [];
    while ($row = $result->fetch_assoc()) {
        $query = "
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='1' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='2' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='3' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='4' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='5' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='6' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='7' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='8' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='9' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='10' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='11' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='12' AND YEAR(tanggal_pengajuan)='$tahun' AND " . strtolower($jenis) . "=" . $row['id'] . "
            ";
        $result1 = $conn->query($query);
        $data_sound[$row['nama']] = $result1->fetch_all(MYSQLI_ASSOC);
    }
    $data1 = [];
    foreach ($data_sound as $key => $sound) {
        foreach ($sound as $item) {
            $data1[$key][] = $item['jml'];
        }
    }


    ?>
    <script>
        $(function() {
            function random_rgba() {
                var o = Math.round,
                    r = Math.random,
                    s = 255;
                return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',1)';
            }
            let kkk = JSON.parse('<?= json_encode($data1) ?>');
            console.log(kkk)
            let ddddd = [];
            for (var key in kkk) {
                ddddd.push({
                    label: key,
                    backgroundColor: random_rgba(),
                    borderColor: random_rgba(),
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: random_rgba(),
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: random_rgba(),
                    data: kkk[key].map(function(x) {
                        return parseInt(x);
                    })
                });
            }

            let areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: ddddd,
            }

            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }
                    }]
                }
            }

            let kjh = new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

        });
    </script>
</body>

</html>
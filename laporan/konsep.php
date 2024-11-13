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
                <td>: Grafik Konsep/Tema</td>
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
    $tahun = $_GET['tahun'] ?? Date("Y");
    $query = "SELECT * FROM tb_konsep";
    $result = $conn->query($query);
    $data_konsep = [];
    while ($row = $result->fetch_assoc()) {
        $query = "
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='1' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='2' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='3' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='4' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='5' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='6' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='7' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='8' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='9' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='10' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='11' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            UNION ALL
            SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Disetujui' AND MONTH(tanggal_pengajuan)='12' AND YEAR(tanggal_pengajuan)='$tahun' AND konsep=" . $row['id'] . "
            ";
        $result1 = $conn->query($query);
        $data_konsep[$row['nama']] = $result1->fetch_all(MYSQLI_ASSOC);
    }
    $data1 = [];
    foreach ($data_konsep as $key => $konsep) {
        foreach ($konsep as $item) {
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

        let color1 = random_rgba();
        let color2 = random_rgba();

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                datasets: [{
                        label: 'Modern',
                        backgroundColor: color1,
                        borderColor: color1,
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: color1,
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: color1,
                        data: JSON.parse('<?= json_encode($data1['MODERN']) ?>')
                    },
                    {
                        label: 'Tradisional',
                        backgroundColor: color2,
                        borderColor: color2,
                        pointRadius: false,
                        pointColor: color2,
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: color2,
                        data: JSON.parse('<?= json_encode($data1['TRADISIONAL']) ?>')
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }


            //-------------
            //- BAR CHART -
            //-------------
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

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })
        });
    </script>
    <script>
        setTimeout(function() {
            window.print();
        }, 1000);
    </script>
</body>

</html>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <h4 class="font-weight-bold">Laporan Grafik Konsep</h4>
                                </div>
                                <div class="col-auto">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-auto d-flex align-items-center">
                                                Tahun:
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" name="tahun" value="<?= isset($_POST['filter']) ? $_POST['tahun'] : Date("Y") ?>">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" name="filter" class="btn btn-secondary">Filter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 250px; height: 550px; max-height: 550px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php if (isset($_POST['filter'])) : ?>
                                <a href="laporan/konsep.php?tahun=<?= $_POST['tahun'] ?>" class="btn btn-primary float-right" target="_blank">Cetak</a>
                            <?php else : ?>
                                <a href="laporan/konsep.php" class="btn btn-primary float-right" target="_blank">Cetak</a>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
if (isset($_POST['filter'])) {
    $tahun = $_POST['tahun'];
} else {
    $tahun = Date("Y");
}
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
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

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
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

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
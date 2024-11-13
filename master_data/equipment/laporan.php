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
                                    <h4 class="font-weight-bold">Laporan Grafik Equipment</h4>
                                </div>
                                <div class="col-auto">
                                    <form action="" method="POST">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="row">
                                                    <div class="col-12 py-2 mb-3">Jenis</div>
                                                    <div class="col-12 py-2">Tahun</div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <select name="jenis" id="jenis" class="form-control">
                                                            <option <?= isset($_POST['filter']) ? ($_POST['jenis'] == "SOUND" ? "selected" : "") : "" ?> value="SOUND">Sound</option>
                                                            <option <?= isset($_POST['filter']) ? ($_POST['jenis'] == "LIGHTING" ? "selected" : "") : "" ?> value="LIGHTING">Lighting</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="number" class="form-control" name="tahun" value="<?= isset($_POST['filter']) ? $_POST['tahun'] : Date("Y") ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto d-flex align-items-end py-1">
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
                                <a href="laporan/equipment.php?tahun=<?= $_POST['tahun'] ?>&jenis=<?= $_POST['jenis'] ?>" class="btn btn-primary float-right" target="_blank">Cetak</a>
                            <?php else : ?>
                                <a href="laporan/equipment.php" class="btn btn-primary float-right" target="_blank">Cetak</a>
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
    $jenis = $_POST['jenis'];
} else {
    $tahun = Date("Y");
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
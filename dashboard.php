<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0">Dashboard</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->


            <div class="row">
                <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                    <?php
                    $query = "SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Pending'";
                    $result = $conn->query($query);
                    $row = $result->fetch_assoc();
                    ?>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $row['jml']; ?></h3>

                                <p>Pengajuan Baru</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-paper-plane"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                <?php endif; ?>
                <!-- ./col -->
                <?php
                $query = "SELECT COUNT(*) AS jml FROM tb_klien";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= $row['jml']; ?></h3>

                            <p>Jumlah Klien</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <!-- ./col -->
                <?php
                $query = "SELECT COUNT(*) AS jml FROM tb_karyawan";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= $row['jml']; ?></h3>

                            <p>Jumlah Karyawan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <!-- ./col -->
                <?php
                $query = "
                SELECT (SELECT COUNT(*) FROM tb_produksi) + (SELECT COUNT(*) FROM tb_equipment) + (SELECT COUNT(*) FROM tb_talent) AS jml";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= $row['jml']; ?></h3>

                            <p>Vendor</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-battle-net"></i>
                        </div>
                        <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row px-2 py-3">
                <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                    <h1>Selamat Datang <?= $_SESSION['level'] ?></h1>
                <?php else : ?>
                    <h1>Selamat Datang <?= $_SESSION['nama'] ?></h1>
                <?php endif; ?>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php

if (isset($_GET['id'])) {
    $query = "
    SELECT 
    tb_pengajuan.*,
    tb_klien.nik,
    tb_klien.nama_lengkap,
    tb_klien.email,
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
    WHERE 
        tb_pengajuan.id=" . $_GET['id'];
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
}



if (isset($_POST['disetujui'])) {
    $query = "UPDATE tb_pengajuan SET status='Disetujui' WHERE id=" . $data['id'];
    $conn->query($query);
    new MailSender($data['email'], "PENGAJUAN", "DISETUJUI");
    echo "<script>window.location.href = '?page=pengajuan';</script>";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6">
                    <h1 class="text-center">Detail Anggaran</h1>
                </div>
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div> -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div id="a" class="col-md-6">
                    <div class="card card-primary">
                        <!-- <div class="card-header">
                            <h3 class="card-title">Data Pengajuan</h3>
                        </div> -->


                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="mb-4" style="font-weight: bold;">Rincian Vendor</h5>
                                    <div class="form-group">
                                    <div class="row mb-2">
                                            <div class="col-5"><b>Nama Klien</b></div>
                                            <div class="col">: <b><?= $data['nama_lengkap'] ?></b></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Konsep/Tema</div>
                                            <div class="col">: <?= $data['konsep'] ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Dekorasi</div>
                                            <div class="col">: <?= $data['dekorasi'] ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Dokumentasi</div>
                                            <div class="col">: <?= $data['dokumentasi'] ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Lighting</div>
                                            <div class="col">: <?= $data['lighting'] ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Sound</div>
                                            <div class="col">: <?= $data['sound'] ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Band</div>
                                            <div class="col">: <?= $data['band'] ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">MC</div>
                                            <div class="col">: <?= $data['mc'] ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">MUA</div>
                                            <div class="col">: <?= $data['mua'] ?></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-5">Anggaran Tambahan</div>
                                            <div class="col">: <b>*klik donwload R.A.B dibawah untuk detail data tambahan harga lengkapnya</b> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 pt-5">
                                    <div class="row mb-2">
                                        <div class="col-2"></div>
                                        <div class="col-4 text-right"><b>harga</b></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right">0</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right"><?= number_format($data['harga_dekorasi'], 0, ",", "."); ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right"><?= number_format($data['harga_dokumentasi'], 0, ",", "."); ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right"><?= number_format($data['harga_lighting'], 0, ",", "."); ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right"><?= number_format($data['harga_sound'], 0, ",", "."); ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right"><?= number_format($data['harga_band'], 0, ",", "."); ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right"><?= number_format($data['harga_mc'], 0, ",", "."); ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right"><?= number_format($data['harga_mua'], 0, ",", "."); ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Rp.</div>
                                        <div class="col-4 text-right"><?= number_format($data['anggaran_tambahan'], 0, ",", "."); ?></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">________________________ +</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-2">Total:</div>
                                        <div class="col-4 text-right">Rp. <?=
                                                                            number_format(
                                                                                $data['anggaran_tambahan'] + $data['harga_dekorasi'] + $data['harga_dokumentasi'] + $data['harga_lighting'] + $data['harga_sound'] + $data['harga_band'] + $data['harga_mc'] + $data['harga_mua'],
                                                                                0,
                                                                                ",",
                                                                                "."
                                                                            );
                                                                            ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=anggaran" class="btn btn-secondary mr-3">Kembali</a>
                            <a href="<?= $data['detail_anggaran'] ?>" class="btn btn-info mr-3">Download R.A.B</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
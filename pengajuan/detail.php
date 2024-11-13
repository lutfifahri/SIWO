<?php

if (isset($_GET['id'])) {
    $query = "
    SELECT 
    tb_pengajuan.*,
    tb_klien.nik,
    tb_klien.nama_lengkap,
    tb_klien.email,
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
    WHERE tb_pengajuan.id=" . $_GET['id'];
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
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #section-to-print,
        #section-to-print * {
            visibility: visible;
        }

        #section-to-print {
            position: absolute;
            left: 0;
            top: 0;
        }

        @page {
            size: landscape;


        }
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pengajuan</h1>
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
            <div class="row">

                <div id="a" class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Pengajuan</h3>
                        </div>


                        <div class="card-body" id="section-to-print">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="mb-4" style="font-weight: bold;">Bio Mempelai Laki - Laki</h5>
                                            <div class="form-group">
                                                <div class="row mb-2">
                                                    <div class="col-4">NIK</div>
                                                    <div class="col">: <?= $data['nik_l'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Nama Lengkap</div>
                                                    <div class="col">: <?= $data['nama_l'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Nama Ayah</div>
                                                    <div class="col">: <?= $data['nama_ayah_l'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Nama Ibu</div>
                                                    <div class="col">: <?= $data['nama_ibu_l'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Tempat Lahir</div>
                                                    <div class="col">: <?= $data['tempat_lahir_l'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Tanggal Lahir</div>
                                                    <?php
                                                    $eng_date = explode('-', explode(' ', $data['tanggal_lahir_l'])[0]);
                                                    $tanggal = $eng_date[2];
                                                    $bulan = $eng_date[1];
                                                    $tahun = $eng_date[0];
                                                    ?>
                                                    <div class="col">: <?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Nomor Telepon</div>
                                                    <div class="col">: <?= $data['nomor_telepon_l'] ?></div>
                                                </div>
                                                <div class="row mb-3 ">
                                                    <div class="col">
                                                        <img id="preview-foto-l" src="<?= $data['foto_l'] ?>" class="img-thumbnail img-fluid mr-2" style="width: 150px; height: 200px; object-fit: cover;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat_wedding">Tempat Wedding: <br> <?= $data['tempat_wedding'] ?></label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-4" style="font-weight: bold;">Bio Mempelai Wanita</h5>
                                            <div class="form-group">
                                                <div class="row mb-2">
                                                    <div class="col-4">NIK</div>
                                                    <div class="col">: <?= $data['nik_p'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Nama Lengkap</div>
                                                    <div class="col">: <?= $data['nama_p'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Nama Ayah</div>
                                                    <div class="col">: <?= $data['nama_ayah_p'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Nama Ibu</div>
                                                    <div class="col">: <?= $data['nama_ibu_p'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Tempat Lahir</div>
                                                    <div class="col">: <?= $data['tempat_lahir_p'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Tanggal Lahir</div>
                                                    <?php
                                                    $eng_date = explode('-', explode(' ', $data['tanggal_lahir_p'])[0]);
                                                    $tanggal = $eng_date[2];
                                                    $bulan = $eng_date[1];
                                                    $tahun = $eng_date[0];
                                                    ?>
                                                    <div class="col">: <?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Nomor Telepon</div>
                                                    <div class="col">: <?= $data['nomor_telepon_p'] ?></div>
                                                </div>
                                                <div class="row mb-3 ">
                                                    <div class="col">
                                                        <img id="preview-foto-l" src="<?= $data['foto_p'] ?>" class="img-thumbnail img-fluid mr-2" style="width: 150px; height: 200px; object-fit: cover;">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <?php
                                                $eng_date = explode('-', explode(' ', $data['tanggal_wedding'])[0]);
                                                $tanggal = $eng_date[2];
                                                $bulan = $eng_date[1];
                                                $tahun = $eng_date[0];
                                                ?>
                                                <label for="tanggal_wedding">Tanggal Wedding: <br> <?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="mb-4" style="font-weight: bold;">Rincian Vendor</h5>
                                            <div class="form-group">
                                                <div class="row mb-2">
                                                    <div class="col-4">Konsep/Tema</div>
                                                    <div class="col">: <?= $data['konsep'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Dekorasi</div>
                                                    <div class="col">: <?= $data['dekorasi'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Dokumentasi</div>
                                                    <div class="col">: <?= $data['dokumentasi'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Lighting</div>
                                                    <div class="col">: <?= $data['lighting'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Sound</div>
                                                    <div class="col">: <?= $data['sound'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">Band</div>
                                                    <div class="col">: <?= $data['band'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">MC</div>
                                                    <div class="col">: <?= $data['mc'] ?></div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">MUA</div>
                                                    <div class="col">: <?= $data['mua'] ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 pt-5">
                                            <div class="row mb-2">
                                                <div class="col-2">Rp.</div>
                                                <div class="col-4 lebarin text-right">0</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Rp.</div>
                                                <div class="col-4 lebarin text-right"><?= number_format($data['harga_dekorasi'], 0, ",", "."); ?></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Rp.</div>
                                                <div class="col-4 lebarin text-right"><?= number_format($data['harga_dokumentasi'], 0, ",", "."); ?></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Rp.</div>
                                                <div class="col-4 lebarin text-right"><?= number_format($data['harga_lighting'], 0, ",", "."); ?></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Rp.</div>
                                                <div class="col-4 lebarin text-right"><?= number_format($data['harga_sound'], 0, ",", "."); ?></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Rp.</div>
                                                <div class="col-4 lebarin text-right"><?= number_format($data['harga_band'], 0, ",", "."); ?></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Rp.</div>
                                                <div class="col-4 lebarin text-right"><?= number_format($data['harga_mc'], 0, ",", "."); ?></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Rp.</div>
                                                <div class="col-4 lebarin text-right"><?= number_format($data['harga_mua'], 0, ",", "."); ?></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col">________________________ +</div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-2">Total:</div>
                                                <div class="col-4 lebarin text-right">Rp. <?=
                                                                                            number_format(
                                                                                                $data['harga_dekorasi'] + $data['harga_dokumentasi'] + $data['harga_lighting'] + $data['harga_sound'] + $data['harga_band'] + $data['harga_mc'] + $data['harga_mua'],
                                                                                                0,
                                                                                                ",",
                                                                                                "."
                                                                                            );
                                                                                            ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=pengajuan" class="btn btn-secondary mr-3">Kembali</a>
                            <button id="cetak" class="btn btn-info mr-3">Cetak</button>
                            <?php if ($data['status'] == 'Pending' && $_SESSION['level'] == 'ADMIN') : ?>
                                <a href="?page=tolak_pengajuan&email=<?= $data['email'] ?>&id=<?= $data['id'] ?>" type="submit" class="btn btn-danger mr-3">Tolak</a>
                                <a href="?page=setujui_pengajuan&email=<?= $data['email'] ?>&id=<?= $data['id'] ?>" type="submit" class="btn btn-success">Setujui</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script>
        document.querySelector("#cetak").addEventListener('click', function() {
            document.querySelectorAll('.lebarin').forEach(function(value, index) {
                value.classList.remove('col-4');
                value.classList.add('col-10');
            });
            window.print()


        });

        window.onafterprint = () => {
            document.querySelectorAll('.lebarin').forEach(function(value, index) {
                value.classList.add('col-4');
                value.classList.remove('col-10');
            });
        }
    </script>

</div>
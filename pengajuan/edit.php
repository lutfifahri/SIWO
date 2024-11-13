<?php

if (isset($_GET['id'])) {
    $query = "
    SELECT 
    *
FROM 
    tb_pengajuan 
    WHERE tb_pengajuan.id=" . $_GET['id'];
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $nik_l = $_POST['nik_l'];
    $nama_l = $_POST['nama_l'];
    $nama_ayah_l = $_POST['nama_ayah_l'];
    $nama_ibu_l = $_POST['nama_ibu_l'];
    $tempat_lahir_l = $_POST['tempat_lahir_l'];
    $tanggal_lahir_l = $_POST['tanggal_lahir_l'];
    $nomor_telepon_l = $_POST['nomor_telepon_l'];

    $nik_p = $_POST['nik_p'];
    $nama_p = $_POST['nama_p'];
    $nama_ayah_p = $_POST['nama_ayah_p'];
    $nama_ibu_p = $_POST['nama_ibu_p'];
    $tempat_lahir_p = $_POST['tempat_lahir_p'];
    $tanggal_lahir_p = $_POST['tanggal_lahir_p'];
    $nomor_telepon_p = $_POST['nomor_telepon_p'];

    $tempat_wedding = $_POST['tempat_wedding'];
    $tanggal_wedding = $_POST['tanggal_wedding'];


    $konsep = $_POST['konsep'];
    $dekorasi = $_POST['dekorasi'];
    $dokumentasi = $_POST['dokumentasi'];
    $lighting = $_POST['lighting'];
    $sound = $_POST['sound'];
    $band = $_POST['band'];
    $mc = $_POST['mc'];
    $mua = $_POST['mua'];

    $target_dir = "uploads/";

    if ($_FILES['foto_l']['error'] != 4) {
        $foto_l = $target_dir . basename($_FILES["foto_l"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["foto_l"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["foto_l"]["tmp_name"], $foto_l);
    } else {
        $foto_l = $data['foto_l'];
    }


    if ($_FILES['foto_p']['error'] != 4) {
        $foto_p = $target_dir . basename($_FILES["foto_p"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["foto_p"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["foto_p"]["tmp_name"], $foto_p);
    } else {
        $foto_p = $data['foto_p'];
    }

    $query = "
        UPDATE tb_pengajuan SET 
            konsep='$konsep',
            dekorasi='$dekorasi',
            dokumentasi='$dokumentasi',
            lighting='$lighting',
            sound='$sound',
            band='$band',
            mc='$mc',
            mua='$mua',
            nik_l='$nik_l',
            nama_l='$nama_l', 
            nama_ayah_l='$nama_ayah_l',
            nama_ibu_l='$nama_ibu_l',
            tempat_lahir_l='$tempat_lahir_l',
            tanggal_lahir_l='$tanggal_lahir_l',
            nomor_telepon_l='$nomor_telepon_l',
            foto_l='$foto_l',
            nik_p='$nik_p',
            nama_p='$nama_p', 
            nama_ayah_p='$nama_ayah_p',
            nama_ibu_p='$nama_ibu_p',
            tempat_lahir_p='$tempat_lahir_p',
            tanggal_lahir_p='$tanggal_lahir_p',
            nomor_telepon_p='$nomor_telepon_p',
            foto_p='$foto_p',
            tempat_wedding='$tempat_wedding',
            tanggal_wedding='$tanggal_wedding',
            tanggal_pengajuan='" . Date("Y-m-d H:i:s") . "',
            status='Pending' 
        WHERE 
            id=" . $data['id'];
    if ($conn->query($query)) {
        echo "<script>alert('Pengajuan berhasil diperbaharui!');</script>";
        echo "<script>window.location.href = '?page=pengajuan';</script>";
    } else echo $conn->error;
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan</h1>
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
    <form action="" method="POST" enctype="multipart/form-data">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div id="a" class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Identitas Mempelai Suami</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>


                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nik_l">NIK</label>
                                                    <input type="text" class="form-control" id="nik_l" name="nik_l" placeholder="Masukkan NIK" value="<?= $data['nik_l'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_l">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nama_l" name="nama_l" value="<?= $data['nama_l'] ?>" placeholder="Masukkan Nama Lengkap Suami">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_ayah_l">Nama Ayah</label>
                                                    <input type="text" class="form-control" id="nama_ayah_l" name="nama_ayah_l" value="<?= $data['nama_ayah_l'] ?>" placeholder="Masukkan Nama Lengkap Suami">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_ibu_l">Nama Ibu</label>
                                                    <input type="text" class="form-control" id="nama_ibu_l" name="nama_ibu_l" value="<?= $data['nama_ibu_l'] ?>" placeholder="Masukkan Nama Lengkap Suami">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_lahir_l">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempat_lahir_l" name="tempat_lahir_l" value="<?= $data['tempat_lahir_l'] ?>" placeholder="Masukkan Tempat Lahir">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_lahir_l">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tanggal_lahir_l" name="tanggal_lahir_l" value="<?= $data['tanggal_lahir_l'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomor_telepon_l">Nomor Telepon</label>
                                                    <input type="text" class="form-control" id="nomor_telepon_l" name="nomor_telepon_l" value="<?= $data['nomor_telepon_l'] ?>" placeholder="Masukkan Nomor Telepon">
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto_l">Foto</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="foto_l" name="foto_l">
                                                            <label id="label_gambar_l" class="custom-file-label" for="foto_l">Pilih gambar suami</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_wedding">Tempat Wedding</label>
                                                    <input type="text" class="form-control" id="tempat_wedding" name="tempat_wedding" value="<?= $data['tempat_wedding'] ?>" placeholder="Masukkan Tempat Wedding">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nik_p">NIK</label>
                                                    <input type="text" class="form-control" id="nik_p" name="nik_p" value="<?= $data['nik_p'] ?>" placeholder="Masukkan NIK">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_p">Nama Lengkap</label>
                                                    <input type="text" class="form-control" id="nama_p" name="nama_p" value="<?= $data['nama_p'] ?>" placeholder="Masukkan Nama Lengkap Suami">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_ayah_p">Nama Ayah</label>
                                                    <input type="text" class="form-control" id="nama_ayah_p" name="nama_ayah_p" value="<?= $data['nama_ayah_p'] ?>" placeholder="Masukkan Nama Lengkap Suami">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_ibu_p">Nama Ibu</label>
                                                    <input type="text" class="form-control" id="nama_ibu_p" name="nama_ibu_p" value="<?= $data['nama_ibu_p'] ?>" placeholder="Masukkan Nama Lengkap Suami">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_lahir_p">Tempat Lahir</label>
                                                    <input type="text" class="form-control" id="tempat_lahir_p" name="tempat_lahir_p" value="<?= $data['tempat_lahir_p'] ?>" placeholder="Masukkan Tempat Lahir">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_lahir_p">Tanggal Lahir</label>
                                                    <input type="date" class="form-control" id="tanggal_lahir_p" name="tanggal_lahir_p" value="<?= $data['tanggal_lahir_p'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nomor_telepon_p">Nomor Telepon</label>
                                                    <input type="text" class="form-control" id="nomor_telepon_p" name="nomor_telepon_p" value="<?= $data['nomor_telepon_p'] ?>" placeholder="Masukkan Nomor Telepon">
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto_p">Foto</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="foto_p" name="foto_p">
                                                            <label id="label_gambar_p" class="custom-file-label" for="foto_p">Pilih gambar istri</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_wedding">Tanggal Wedding</label>
                                                    <input type="date" class="form-control" id="tanggal_wedding" value="<?= $data['tanggal_wedding'] ?>" name="tanggal_wedding">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group text-center">
                                            <label for="exampleInputEmail1">Preview Gambar</label>
                                            <div class="d-flex justify-content-center mt-5">
                                                <img id="preview-foto-l" src="<?= $data['foto_l'] ?>" class="img-thumbnail img-fluid mr-2" style="width: 300px; height: 400px; object-fit: cover;">
                                                <img id="preview-foto-p" src="<?= $data['foto_p'] ?>" class="img-thumbnail img-fluid ml-2" style="width: 300px; height: 400px; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="reset" class="btn btn-secondary mr-2">Reset</button>
                                <button id="next-btn" type="button" class="btn btn-primary">Next</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        $("#foto_l").on('change', function() {
                            const image = $(this);
                            const oFReader = new FileReader();
                            oFReader.readAsDataURL(image[0].files[0]);
                            oFReader.onload = function(oFREvent) {
                                $("#preview-foto-l").attr('src', oFREvent.target.result);
                                $("#label_gambar_l").text(image[0].files[0].name);
                            }
                        });
                        $("#foto_p").on('change', function() {
                            const image = $(this);
                            const oFReader = new FileReader();
                            oFReader.readAsDataURL(image[0].files[0]);
                            oFReader.onload = function(oFREvent) {
                                $("#preview-foto-p").attr('src', oFREvent.target.result);
                                $("#label_gambar_p").text(image[0].files[0].name);
                            }
                        });
                    </script>
                    <div id="b" class="col-12 d-none">
                        <div class="row">
                            <div class="col-4">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Pilih Vendor</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <?php $gambar = []; ?>
                                    <?php $total_biaya = []; ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <?php $result = $conn->query("SELECT * FROM tb_konsep"); ?>
                                            <label>Konsep/Tema</label>
                                            <select name="konsep" class="form-control select2" onchange="berubah(this, 'konsep', false)">
                                                <option selected="selected">Pilih Tema</option>
                                                <?php while ($row = $result->fetch_assoc()) : ?>
                                                    <?php
                                                    $konsep = $conn->query("SELECT * FROM tb_gambar_konsep WHERE id_konsep=" . $row['id']);
                                                    $konsep = $konsep->fetch_all(MYSQLI_ASSOC);
                                                    $gambar['konsep'][$row['id']] = $konsep;
                                                    ?>
                                                    <?php if ($data['konsep'] == $row['id']) : ?>
                                                        <option selected data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="0" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                                    <?php else : ?>
                                                        <option data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="0" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php $result = $conn->query("SELECT * FROM tb_produksi WHERE jenis='DEKORASI'"); ?>
                                            <label>Produksi</label>
                                            <h6>Dekorasi</h6>
                                            <select name="dekorasi" class="form-control select2" onchange="berubah(this, 'produksi', 'dekorasi')">
                                                <option selected="selected">Pilih Dekorasi</option>
                                                <?php while ($row = $result->fetch_assoc()) : ?>
                                                    <?php
                                                    $produksi = $conn->query("SELECT * FROM tb_gambar_produksi WHERE id_produksi=" . $row['id']);
                                                    $produksi = $produksi->fetch_all(MYSQLI_ASSOC);
                                                    $gambar['produksi'][$row['id']] = $produksi;
                                                    ?>
                                                    <?php if ($data['dekorasi'] == $row['id']) : ?>
                                                        <?php $total_biaya['dekorasi'] = $row['harga'] ?>
                                                        <option selected data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php else : ?>
                                                        <option data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php $result = $conn->query("SELECT * FROM tb_produksi WHERE jenis='DOKUMENTASI'"); ?>
                                            <h6>Dokumentasi</h6>
                                            <select name="dokumentasi" class="form-control select2" onchange="berubah(this, 'produksi', 'dokumentasi')">
                                                <option selected="selected">Pilih Dokumentasi</option>
                                                <?php while ($row = $result->fetch_assoc()) : ?>
                                                    <?php
                                                    $produksi = $conn->query("SELECT * FROM tb_gambar_produksi WHERE id_produksi=" . $row['id']);
                                                    $produksi = $produksi->fetch_all(MYSQLI_ASSOC);
                                                    $gambar['produksi'][$row['id']] = $produksi;
                                                    ?>
                                                    <?php if ($data['dokumentasi'] == $row['id']) : ?>
                                                        <?php $total_biaya['dokumentasi'] = $row['harga'] ?>
                                                        <option selected data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php else : ?>
                                                        <option data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php $result = $conn->query("SELECT * FROM tb_equipment WHERE jenis='LIGHTING'"); ?>
                                            <label>Equipment</label>
                                            <h6>Lighting</h6>
                                            <select name="lighting" class="form-control select2" onchange="berubah(this, 'equipment', 'lighting')">
                                                <option selected="selected" value="" disabled>Pilih Lighting</option>
                                                <?php while ($row = $result->fetch_assoc()) : ?>
                                                    <?php
                                                    $equipment = $conn->query("SELECT * FROM tb_gambar_equipment WHERE id_equipment=" . $row['id']);
                                                    $equipment = $equipment->fetch_all(MYSQLI_ASSOC);
                                                    $gambar['equipment'][$row['id']] = $equipment;
                                                    ?>
                                                    <?php if ($data['lighting'] == $row['id']) : ?>
                                                        <?php $total_biaya['lighting'] = $row['harga'] ?>
                                                        <option selected data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php else : ?>
                                                        <option data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php $result = $conn->query("SELECT * FROM tb_equipment WHERE jenis='SOUND'"); ?>
                                            <h6>Sound</h6>
                                            <select name="sound" class="form-control select2" onchange="berubah(this, 'equipment', 'sound')">
                                                <option selected="selected" value="" disabled>Pilih Sound</option>
                                                <?php while ($row = $result->fetch_assoc()) : ?>
                                                    <?php
                                                    $equipment = $conn->query("SELECT * FROM tb_gambar_equipment WHERE id_equipment=" . $row['id']);
                                                    $equipment = $equipment->fetch_all(MYSQLI_ASSOC);
                                                    $gambar['equipment'][$row['id']] = $equipment;
                                                    ?>
                                                    <?php if ($data['sound'] == $row['id']) : ?>
                                                        <?php $total_biaya['sound'] = $row['harga'] ?>
                                                        <option selected data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php else : ?>
                                                        <option data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php $result = $conn->query("SELECT * FROM tb_talent WHERE jenis='BAND'"); ?>
                                            <label>Telent</label>
                                            <h6>Band</h6>
                                            <select name="band" class="form-control select2" onchange="berubah(this, 'talent', 'band')">
                                                <option selected="selected" disabled value="">Pilih Talent</option>
                                                <?php while ($row = $result->fetch_assoc()) : ?>
                                                    <?php
                                                    $talent = $conn->query("SELECT * FROM tb_gambar_talent WHERE id_talent=" . $row['id']);
                                                    $talent = $talent->fetch_all(MYSQLI_ASSOC);
                                                    $gambar['talent'][$row['id']] = $talent;
                                                    ?>
                                                    <?php if ($data['band'] == $row['id']) : ?>
                                                        <?php $total_biaya['band'] = $row['harga'] ?>
                                                        <option selected data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php else : ?>
                                                        <option data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php $result = $conn->query("SELECT * FROM tb_talent WHERE jenis='MC'"); ?>
                                            <h6>MC</h6>
                                            <select name="mc" class="form-control select2" onchange="berubah(this, 'talent', 'mc')">
                                                <option selected="selected" disabled value="">Pilih Talent</option>
                                                <?php while ($row = $result->fetch_assoc()) : ?>
                                                    <?php
                                                    $talent = $conn->query("SELECT * FROM tb_gambar_talent WHERE id_talent=" . $row['id']);
                                                    $talent = $talent->fetch_all(MYSQLI_ASSOC);
                                                    $gambar['talent'][$row['id']] = $talent;
                                                    ?>
                                                    <?php if ($data['mc'] == $row['id']) : ?>
                                                        <?php $total_biaya['mc'] = $row['harga'] ?>
                                                        <option selected data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php else : ?>
                                                        <option data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <?php $result = $conn->query("SELECT * FROM tb_talent WHERE jenis='MUA'"); ?>
                                            <h6>MUA</h6>
                                            <select name="mua" class="form-control select2" onchange="berubah(this, 'talent', 'mua')">
                                                <option selected="selected" disabled value="">Pilih Talent</option>
                                                <?php while ($row = $result->fetch_assoc()) : ?>
                                                    <?php
                                                    $talent = $conn->query("SELECT * FROM tb_gambar_talent WHERE id_talent=" . $row['id']);
                                                    $talent = $talent->fetch_all(MYSQLI_ASSOC);
                                                    $gambar['talent'][$row['id']] = $talent;
                                                    ?>
                                                    <?php if ($data['mua'] == $row['id']) : ?>
                                                        <?php $total_biaya['mua'] = $row['harga'] ?>
                                                        <option selected data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php else : ?>
                                                        <option data-harga="<?= $row['harga']; ?>" data-id="<?= $row['id'] ?>" data-nama="<?= $row['nama'] ?>" data-harga="<?= "Rp. " . number_format($row['harga'], 0, ',', '.') ?>" data-detail="<?= htmlspecialchars($row['detail']); ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?> | Rp. <?= number_format($row['harga'], 0, ',', '.') ?></option>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-end">
                                        <button id="back" type="button" class="btn btn-secondary mr-2">Back</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card mb-3" style="width: 100%; height: 495px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-12">
                                            <div class="card-body d-flex">
                                                <div id="carouselExampleControls" class="carousel slide float-left mr-3" data-ride="carousel">
                                                    <div class="carousel-inner" style="width: 400px; height: 450px;">
                                                    </div>
                                                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="sr-only">Next</span>
                                                    </button>
                                                </div>

                                                <div>
                                                    <h3 id="nama_master"></h3>
                                                    <p id="detail_master"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h1 id="total_biaya">Total Biaya: Rp. 0</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </form>
</div>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
    document.querySelector('#next-btn').addEventListener('click', function() {
        document.querySelector('#a').classList.toggle('d-none')
        document.querySelector('#b').classList.toggle('d-none')
    });

    document.querySelector('#back').addEventListener('click', function() {
        document.querySelector('#b').classList.toggle('d-none')
        document.querySelector('#a').classList.toggle('d-none')
    });

    let total_biaya = JSON.parse('<?= json_encode($total_biaya); ?>');
    let edit_total = 0;
    for (const element in total_biaya) {
        edit_total += parseInt(total_biaya[element]);
    }
    document.querySelector("#total_biaya").innerHTML = formatRupiah(edit_total.toString(), "Rp. ");

    function berubah(element, jenis, harga) {
        gambar = JSON.parse('<?= json_encode($gambar); ?>');
        document.querySelector("#nama_master").innerHTML = element.options[element.options.selectedIndex].getAttribute('data-nama')
        document.querySelector("#detail_master").innerHTML = element.options[element.options.selectedIndex].getAttribute('data-detail')

        document.querySelector(".carousel-inner").innerHTML = "";
        document.querySelector(".carousel-inner").insertAdjacentHTML('beforeend', ` 
            <div class="carousel-item active">
                <img width="400" height="450" style="object-fit: cover;" src="${gambar[jenis][element.options[element.options.selectedIndex].getAttribute('data-id')][0]['gambar']}">
            </div>`);

        for (let i = 1; i < gambar[jenis][element.options[element.options.selectedIndex].getAttribute('data-id')].length; i++) {
            document.querySelector(".carousel-inner").insertAdjacentHTML('beforeend', ` 
            <div class="carousel-item">
                <img width="400" height="450" style="object-fit: cover;" src="${gambar[jenis][element.options[element.options.selectedIndex].getAttribute('data-id')][i]['gambar']}">
            </div>`);
        }
        total_biaya[harga] = element.options[element.options.selectedIndex].getAttribute('data-harga');
        let real_total = 0;
        for (const element in total_biaya) {
            real_total += parseInt(total_biaya[element]);
        }
        document.querySelector("#total_biaya").innerHTML = formatRupiah(real_total.toString(), "Rp. ");
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
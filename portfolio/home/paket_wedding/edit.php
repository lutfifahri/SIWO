<?php


if (isset($_GET['id'])) {
    $query = "SELECT 
            *
            FROM 
                tb_paket_wedding 
            WHERE 
                id=" . $_GET['id'];
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $konsep = $_POST['konsep'];
    $dekorasi = $_POST['dekorasi'];
    $dokumentasi = $_POST['dokumentasi'];
    $lighting = $_POST['lighting'];
    $sound = $_POST['sound'];
    $band = $_POST['band'];
    $mc = $_POST['mc'];
    $mua = $_POST['mua'];
    $keterangan = $_POST['keterangan'];

    $target_dir = "uploads/";

    if ($_FILES['gambar']['error'] != 4) {
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
    } else {
        $target_file = $data['gambar'];
    }

    $query = "UPDATE tb_paket_wedding SET nama='$nama', konsep='$konsep', dekorasi='$dekorasi', dokumentasi='$dokumentasi', lighting='$lighting', sound='$sound', band='$band', mc='$mc', mua='$mua', keterangan='$keterangan', gambar='$target_file' WHERE id=" . $data['id'];
    if ($conn->query($query)) {
        echo "<script>alert('Data Paket Wedding berhasil diperbaharui!');</script>";
        echo "<script>window.location.href = '?page=paket_wedding';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Paket Wedding</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary shadow">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= $data['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <?php $result = $conn->query("SELECT * FROM tb_konsep"); ?>
                                    <label for="nama">Konsep/Tema</label>
                                    <select name="konsep" class="form-control select2">
                                        <option selected="selected">Pilih Tema</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <?php if ($row['id'] == $data['konsep']) : ?>
                                                <option selected value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php $result = $conn->query("SELECT * FROM tb_produksi WHERE jenis='DEKORASI'"); ?>
                                    <label for="nama">Dekorasi</label>
                                    <select name="dekorasi" class="form-control select2">
                                        <option selected="selected">Pilih Dekorasi</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <?php if ($row['id'] == $data['dekorasi']) : ?>
                                                <option selected value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php $result = $conn->query("SELECT * FROM tb_produksi WHERE jenis='DOKUMENTASI'"); ?>
                                    <label for="nama">Dokumentasi</label>
                                    <select name="dokumentasi" class="form-control select2">
                                        <option selected="selected">Pilih Dokumentasi</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <?php if ($row['id'] == $data['dokumentasi']) : ?>
                                                <option selected value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php $result = $conn->query("SELECT * FROM tb_equipment WHERE jenis='LIGHTING'"); ?>
                                    <label for="nama">Lighting</label>
                                    <select name="lighting" class="form-control select2">
                                        <option selected="selected">Pilih Lighting</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <?php if ($row['id'] == $data['lighting']) : ?>
                                                <option selected value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php $result = $conn->query("SELECT * FROM tb_equipment WHERE jenis='SOUND'"); ?>
                                    <label for="nama">Sound</label>
                                    <select name="sound" class="form-control select2">
                                        <option selected="selected">Pilih Sound</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <?php if ($row['id'] == $data['sound']) : ?>
                                                <option selected value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php $result = $conn->query("SELECT * FROM tb_talent WHERE jenis='BAND'"); ?>
                                    <label for="nama">Band</label>
                                    <select name="band" class="form-control select2">
                                        <option selected="selected">Pilih Band</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <?php if ($row['id'] == $data['band']) : ?>
                                                <option selected value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php $result = $conn->query("SELECT * FROM tb_talent WHERE jenis='MC'"); ?>
                                    <label for="nama">MC</label>
                                    <select name="mc" class="form-control select2">
                                        <option selected="selected">Pilih MC</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <?php if ($row['id'] == $data['mc']) : ?>
                                                <option selected value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <?php $result = $conn->query("SELECT * FROM tb_talent WHERE jenis='MUA'"); ?>
                                    <label for="nama">MUA</label>
                                    <select name="mua" class="form-control select2">
                                        <option selected="selected">Pilih MUA</option>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <?php if ($row['id'] == $data['mua']) : ?>
                                                <option selected value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control"><?= $data['keterangan'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                            <label class="custom-file-label" for="gambar">Pilih foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
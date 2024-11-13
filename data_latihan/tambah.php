<?php

if (isset($_POST['submit'])) {
    $latihan_1 = $_POST['latihan_1'];
    $latihan_2 = $_POST['latihan_2'];
    $latihan_3 = $_POST['latihan_3'];
    $latihan_4 = $_POST['latihan_4'];
    // $tmt = $_POST['tmt'];
    $id_latihan_relasi = $_POST['id_latihan_relasi'];
    $target_dir = "uploads/";

    $target_file = $target_dir . basename($_FILES["gambar"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"]), PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    $query = "INSERT INTO tb_latihan (latihan_1, latihan_2, latihan_3, latihan_4, foto, id_latihan_relasi) VALUES ('$latihan_1', '$latihan_2', '$latihan_3', '$latihan_4', '$target_file', '$id_latihan_relasi')";
    if ($conn->query($query)) {
        echo "<script>alert('Data dan akun latihan berhasil ditambahkan!');</script>";
        echo "<script>window.location.href = '?page=latihan';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Latihan</h1>
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
                            <!-- <div class="form-group">
                                <label for="nama">Tanggal terdaftar</label>
                                <input type="date" class="form-control" id="nama" placeholder="Masukkan nama" name="tmt">
                            </div> -->
                            <div class="form-group">
                                <label for="latihan_1">Latihan 1</label>
                                <input type="text" class="form-control" id="latihan_1" placeholder="Masukkan Latihan1" name="latihan_1">
                            </div>
                            <div class="form-group">
                                <label for="latihan_2">Latihan 2</label>
                                <input type="text" class="form-control" id="latihan_2" placeholder="Masukkan latihan_2" name="latihan_2">
                            </div>
                            <div class="form-group">
                                <label for="latihan_3">Latihan 3</label>
                                <input type="text" class="form-control" id="latihan_3" placeholder="Masukkan Latihan 3" name="latihan_3">
                            </div>
                            <div class="form-group">
                                <label for="latihan_4">Latihan 4</label>
                                <input type="text" class="form-control" id="latihan_4" placeholder="Masukkan Latihan 4" name="latihan_4">
                            </div>
                            <div class="form-group">
                                <label for="latihan_relasi">Relasi</label>
                                <select class="form-control" name="id_latihan_relasi" id="id_latihan_relasi" required>
                                    <option value="" selected disabled>Pilih relasi</option>
                                    <?php $query = "SELECT * FROM tb_latihan_relasi";
                                    $result = $conn->query($query);
                                    ?>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['latihan_relasi'] ?></option>
                                    <?php endwhile; ?>
                                </select>
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
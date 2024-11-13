<?php

if (isset($_GET['id'])) {
    $query = "SELECT 
            *
            FROM 
                tb_latihan 
            WHERE 
                id=" . $_GET['id'];
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $latihan_1 = $_POST['latihan_1'];
    $latihan_2 = $_POST['latihan_2'];
    $latihan_3 = $_POST['latihan_3'];
    $latihan_4 = $_POST['latihan_4'];
    $id_latihan_relasi = $_POST['id_latihan_relasi'];
    $target_dir = "uploads/";

    if ($_FILES['gambar']['error'] != 4) {
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
    } else {
        $target_file = $row['foto'];
    }


    $query = "UPDATE tb_latihan SET latihan_1='$latihan_1', latihan_2='$latihan_2', latihan_3='$latihan_3', latihan_4='$latihan_4', foto='$target_file', id_latihan_relasi='$id_latihan_relasi' WHERE id=" . $_GET['id'];
    if ($conn->query($query)) {
        echo "<script>alert('Data latihan berhasil di edit!');</script>";
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
                    <h1>Edit Data Latihan</h1>
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
                                    <input type="date" class="form-control" id="nama" placeholder="Masukkan nama" name="latihan_1" value="<?= $row['latihan_1'] ?>">
                                </div> -->
                                <div class="form-group">
                                    <label for="nama">Latihan 1</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan NIK" name="latihan_1" value="<?= $row['latihan_1'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Latihan 2</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan NIK" name="latihan_2" value="<?= $row['latihan_2'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Latihan 3</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" name="latihan_3" value="<?= $row['latihan_3'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Latihan 4</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan No Telpepon" name="latihan_4" value="<?= $row['latihan_4'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jabatan</label>
                                    <select class="form-control" name="id_latihan_relasi" id="id_latihan_relasi" required>
                                        <?php $query = "SELECT * FROM tb_latihan_relasi";
                                        $result = $conn->query($query);
                                        ?>
                                        <?php while ($data = $result->fetch_assoc()) : ?>
                                            <?php if ($data['id'] == $row['id_latihan_relasi']) : ?>
                                                <option selected value="<?= $data['id'] ?>"><?= $data['latihan_relasi'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $data['id'] ?>"><?= $data['latihan_relasi'] ?></option>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" onchange="preview_text(this)" name="gambar">
                                            <label class="custom-file-label" for="gambar">Pilih foto</label>
                                        </div>
                                    </div>
                                    <script>
                                        function preview_text(input) {
                                            input.nextElementSibling.innerHTML = input.files[0].name;
                                        }
                                    </script>
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
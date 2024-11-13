<?php

if (isset($_GET['id'])) {
    $query = "SELECT 
            *
            FROM 
                tb_karyawan 
            WHERE 
                id=" . $_GET['id'];
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $tmt = $_POST['tmt'];
    $id_jabatan = $_POST['id_jabatan'];
    $target_dir = "uploads/";

    if ($_FILES['gambar']['error'] != 4) {
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
    } else {
        $target_file = $row['foto'];
    }


    $query = "UPDATE tb_karyawan SET nik='$nik', nama='$nama', no_telp='$no_telp', tmt='$tmt',  id_jabatan='$id_jabatan', foto='$target_file' WHERE id=" . $_GET['id'];
    if ($conn->query($query)) {
        echo "<script>alert('Data dan akun karyawan berhasil di edit!');</script>";
        echo "<script>window.location.href = '?page=karyawan';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Edit Data Karyawan</h1>
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
                                    <label for="nama">Tanggal terdaftar</label>
                                    <input type="date" class="form-control" id="nama" placeholder="Masukkan nama" name="tmt" value="<?= $row['tmt'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">NIK</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan NIK" name="nik" value="<?= $row['nik'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" name="nama" value="<?= $row['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">No Telepon</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan No Telpepon" name="no_telp" value="<?= $row['no_telp'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jabatan</label>
                                    <select class="form-control" name="id_jabatan" id="id_jabatan" required>
                                        <?php $query = "SELECT * FROM tb_jabatan";
                                        $result = $conn->query($query);
                                        ?>
                                        <?php while ($data = $result->fetch_assoc()) : ?>
                                            <?php if ($data['id'] == $row['id_jabatan']) : ?>
                                                <option selected value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
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
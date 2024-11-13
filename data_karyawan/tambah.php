<?php

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $no_telp = $_POST['no_telp'];
    $tmt = $_POST['tmt'];
    $id_jabatan = $_POST['id_jabatan'];
    $target_dir = "uploads/";

    $target_file = $target_dir . basename($_FILES["gambar"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"]), PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    $query = "INSERT INTO tb_karyawan (nik, nama, no_telp, tmt,  id_jabatan, foto) VALUES ('$nik', '$nama', '$no_telp', '$tmt', '$id_jabatan', '$target_file')";
    if ($conn->query($query)) {
        echo "<script>alert('Data dan akun karyawan berhasil ditambahkan!');</script>";
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
                    <h1>Tambah Data Karyawan</h1>
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
                                    <input type="date" class="form-control" id="nama" placeholder="Masukkan nama" name="tmt">
                                </div>
                                <div class="form-group">
                                    <label for="nama">NIK</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan NIK" name="nik">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">No Telepon</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan No Telpepon" name="no_telp">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jabatan</label>
                                    <select class="form-control" name="id_jabatan" id="id_jabatan" required>
                                        <option value="" selected disabled>Pilih Jabatan</option>
                                        <?php $query = "SELECT * FROM tb_jabatan";
                                        $result = $conn->query($query);
                                        ?>
                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
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
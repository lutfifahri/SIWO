<?php

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $keterangan = $_POST['keterangan'];
   
    $target_dir = "uploads/";

    $target_file = $target_dir . basename($_FILES["gambar"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"]), PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

    $query = "INSERT INTO tb_caraousel (judul, keterangan, gambar) VALUES ('$judul', '$keterangan', '$target_file')";
    if ($conn->query($query)) {
        echo "<script>alert('Data caraousel berhasil ditambahkan!');</script>";
        echo "<script>window.location.href = '?page=caraousel';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Caraousel</h1>
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
                                    <label for="nama">Judul</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Judul" name="judul">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Keterangan</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Keterangan" name="keterangan">
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
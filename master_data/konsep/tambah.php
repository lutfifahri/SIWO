<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $detail = $_POST['detail'];

    $query = "INSERT INTO tb_konsep (nama, detail) VALUES ('$nama', '$detail')";
    if ($conn->query($query)) {
        $last_id = $conn->insert_id;
        $target_dir = "uploads/";
        for ($i = 0; $i < count($_FILES['gambar']['name']); $i++) {
            $target_file = $target_dir . basename($_FILES["gambar"]["name"][$i]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"][$i]), PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["gambar"]["tmp_name"][$i], $target_file);
            $query = "INSERT INTO tb_gambar_konsep (id_konsep, gambar) VALUES ($last_id, '$target_file')";
            $conn->query($query);
        }
        echo "<script>alert('Data Konsep berhasil ditambahkan!');</script>";
        echo "<script>window.location.href = '?page=konsep';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Konsep</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary shadow">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Tema</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar[]" multiple>
                                            <label class="custom-file-label" for="gambar">Pilih gambar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detail">Detail</label>
                                    <input id="x" type="hidden" name="detail">
                                    <trix-editor input="x"></trix-editor>
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
</div>
<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    $detail = $_POST['detail'];

    $query = "INSERT INTO tb_talent (nama, harga, jenis, detail) VALUES ('$nama', '$harga', '$jenis', '$detail')";
    if ($conn->query($query)) {
        $last_id = $conn->insert_id;
        $target_dir = "uploads/";
        for ($i = 0; $i < count($_FILES['gambar']['name']); $i++) {
            $target_file = $target_dir . basename($_FILES["gambar"]["name"][$i]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"][$i]), PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["gambar"]["tmp_name"][$i], $target_file);
            $query = "INSERT INTO tb_gambar_talent (id_talent, gambar) VALUES ($last_id, '$target_file')";
            $conn->query($query);
        }
        echo "<script>alert('Data Talent berhasil ditambahkan!');</script>";
        echo "<script>window.location.href = '?page=talent';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Talent</h1>
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
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" placeholder="Masukkan harga" name="harga">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Talent</label>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="">Pilih Jenis Talent</option>
                                        <option value="BAND">Band</option>
                                        <option value="MC">MC</option>
                                        <option value="MUA">Make Up Artist</option>
                                    </select>
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
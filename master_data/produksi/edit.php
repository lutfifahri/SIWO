<?php
if (isset($_GET['id'])) {
    $query = "SELECT * FROM tb_produksi WHERE id=" . $_GET['id'];
    if ($result = $conn->query($query)) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $query = "SELECT * FROM tb_gambar_produksi WHERE  id_produksi=" . $_GET['id'];
    $result = $conn->query($query);
    $gambar = $result->fetch_all(MYSQLI_ASSOC);
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    $detail = $_POST['detail'];

    $query = "UPDATE tb_produksi SET nama='$nama', harga='$harga', jenis='$jenis', detail='$detail' WHERE id=" . $_GET['id'];
    if ($conn->query($query)) {
        if ($_FILES['gambar']['error'][0] != 4) {
            if ($conn->query("DELETE FROM tb_gambar_produksi WHERE id_produksi=" . $_GET['id'])) {
                $target_dir = "uploads/";
                for ($i = 0; $i < count($_FILES['gambar']['name']); $i++) {
                    $target_file = $target_dir . basename($_FILES["gambar"]["name"][$i]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"][$i]), PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["gambar"]["tmp_name"][$i], $target_file);
                    $query = "INSERT INTO tb_gambar_produksi (id_produksi, gambar) VALUES (" . $_GET['id'] . ", '$target_file')";
                    $conn->query($query);
                }
            }
        }
        echo "<script>alert('Data produksi berhasil diperbaharui!');</script>";
        echo "<script>window.location.href = '?page=produksi';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Produksi</h1>
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
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama" value="<?= $row['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga" placeholder="Masukkan harga" name="harga" value="<?= $row['harga']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Produksi</label>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option <?= $row['jenis'] === "DEKORASI" ? "selected" : ''; ?> value="DEKORASI">Dekorasi</option>
                                        <option <?= $row['jenis'] === "DOKUMENTASI" ? "selected" : ''; ?> value="DOKUMENTASI">Dokumentasi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar[]" multiple>
                                            <label class="custom-file-label" for="gambar">Pilih gambar untuk memperbaharui</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detail">Detail</label>
                                    <input id="x" type="hidden" name="detail" value="<?= $row['detail']; ?>">
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
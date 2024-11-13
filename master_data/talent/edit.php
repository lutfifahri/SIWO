<?php
if (isset($_GET['id'])) {
    $query = "SELECT * FROM tb_talent WHERE id=" . $_GET['id'];
    if ($result = $conn->query($query)) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    $query = "SELECT * FROM tb_gambar_talent WHERE  id_talent=" . $_GET['id'];
    $result = $conn->query($query);
    $gambar = $result->fetch_all(MYSQLI_ASSOC);
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    $detail = $_POST['detail'];

    $query = "UPDATE tb_talent SET nama='$nama', harga='$harga', jenis='$jenis', detail='$detail' WHERE id=" . $_GET['id'];
    if ($conn->query($query)) {
        if ($_FILES['gambar']['error'][0] != 4) {
            if ($conn->query("DELETE FROM tb_gambar_talent WHERE id_talent=" . $_GET['id'])) {
                $target_dir = "uploads/";
                for ($i = 0; $i < count($_FILES['gambar']['name']); $i++) {
                    $target_file = $target_dir . basename($_FILES["gambar"]["name"][$i]) . "." . strtolower(pathinfo(basename($_FILES["gambar"]["name"][$i]), PATHINFO_EXTENSION));
                    move_uploaded_file($_FILES["gambar"]["tmp_name"][$i], $target_file);
                    $query = "INSERT INTO tb_gambar_talent (id_talent, gambar) VALUES (" . $_GET['id'] . ", '$target_file')";
                    $conn->query($query);
                }
            }
        }
        echo "<script>alert('Data talent berhasil diperbaharui!');</script>";
        echo "<script>window.location.href = '?page=talent';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Edit Data Talent</h1>
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
                                        <option <?= $row['jenis'] === "BAND" ? "selected" : ''; ?> value="BAND">Band</option>
                                        <option <?= $row['jenis'] === "MC" ? "selected" : ''; ?> value="MC">MC</option>
                                        <option <?= $row['jenis'] === "MUA" ? "selected" : ''; ?> value="MUA">Make Up Artist</option>
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
<?php
if (isset($_GET['id'])) {
    $query = "SELECT * FROM tb_jabatan WHERE id=" . $_GET['id'];
    if ($result = $conn->query($query)) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];

    $query = "UPDATE tb_jabatan SET nama='$nama' WHERE id=" . $_GET['id'];
    if ($conn->query($query)) {
        echo "<script>alert('Data Berhasil Disimpan!');</script>";
        echo "<script>window.location.href = '?page=jabatan';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Edit Data Jabatan</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary shadow">
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama jabatan" name="nama" value="<?= $row['nama']; ?>">
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
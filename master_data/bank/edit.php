<?php
if (isset($_GET['id'])) {
    $query = "SELECT * FROM tb_bank WHERE id=" . $_GET['id'];
    if ($result = $conn->query($query)) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $atas_nama = $_POST['atas_nama'];
    $no_rek = $_POST['no_rek'];

    $query = "UPDATE tb_bank SET nama='$nama',atas_nama='$atas_nama',no_rek='$no_rek' WHERE id=" . $_GET['id'];
    if ($conn->query($query)) {
        echo "<script>alert('Data Berhasil Disimpan!');</script>";
        echo "<script>window.location.href = '?page=bank';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Edit Data Bank</h1>
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
                                    <label for="nama">Nama Bank</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama bank" value="<?= $row['nama']; ?>" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="atas_nama">Atas Nama</label>
                                    <input type="text" class="form-control" id="atas_nama" placeholder="Masukkan Atas Nama" value="<?= $row['atas_nama']; ?>" name="atas_nama">
                                </div>
                                <div class="form-group">
                                    <label for="no_rek">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="no_rek" placeholder="Masukkan Nomor Rekening" value="<?= $row['no_rek']; ?>" name="no_rek">
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
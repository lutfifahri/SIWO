<?php

$result = $conn->query("SELECT * FROM tb_portfolio_home");
$data = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    $kelebihan1 = $_POST['kelebihan1'];
    $kelebihan2 = $_POST['kelebihan2'];
    $kelebihan3 = $_POST['kelebihan3'];
    $kelebihan4 = $_POST['kelebihan4'];


    if ($result->num_rows) {
        $query = "UPDATE tb_portfolio_home SET kelebihan1='$kelebihan1',kelebihan2='$kelebihan2',kelebihan3='$kelebihan3',kelebihan4='$kelebihan4' WHERE id=" . $data['id'];
    } else {
        $query = "INSERT INTO tb_portfolio_home (kelebihan1,kelebihan2,kelebihan3,kelebihan4) VALUES ('$kelebihan1','$kelebihan2','$kelebihan3','$kelebihan4')";
    }

    if ($conn->query($query)) {
        echo "<script>alert('Data Kelebihan berhasil disimpan!');</script>";
        echo "<script>window.location.href = '?page=kelebihan';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Kelebihan</h1>
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
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Efesien Waktu dan Tenaga</label>
                                    <textarea name="kelebihan1" id="kelebihan1" cols="" rows="" class="form-control"><?= $data['kelebihan1'] ?? "" ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Hemat Biaya</label>
                                    <textarea name="kelebihan2" id="kelebihan2" cols="" rows="" class="form-control"><?= $data['kelebihan2'] ?? "" ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Bertemu Vendor-Vendor Terbaik</label>
                                    <textarea name="kelebihan3" id="kelebihan3" cols="" rows="" class="form-control"><?= $data['kelebihan3'] ?? "" ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tersusun dan Detail</label>
                                    <textarea name="kelebihan4" id="kelebihan4" cols="" rows="" class="form-control"><?= $data['kelebihan4'] ?? "" ?></textarea>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
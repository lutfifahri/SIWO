<?php

$result = $conn->query("SELECT * FROM tb_portfolio_vendor");
$data = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    $vendor_terbaik = $_POST['vendor_terbaik'];


    if ($result->num_rows) {
        $query = "UPDATE tb_portfolio_vendor SET vendor_terbaik='$vendor_terbaik' WHERE id=" . $data['id'];
    } else {
        $query = "INSERT INTO tb_portfolio_vendor (vendor_terbaik) VALUES ('$vendor_terbaik')";
    }

    if ($conn->query($query)) {
        echo "<script>alert('Data Vendor Terbaik berhasil disimpan!');</script>";
        echo "<script>window.location.href = '?page=vendor_terbaik';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Vendor Terbaik</h1>
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
                                    <label for="nama">VENDOR TERBAIK KAMI</label>
                                    <textarea name="vendor_terbaik" id="vendor_terbaik" cols="" rows="" class="form-control"><?= $data['vendor_terbaik'] ?? "" ?></textarea>
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
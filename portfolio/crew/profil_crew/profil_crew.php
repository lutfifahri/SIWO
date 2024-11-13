<?php

$result = $conn->query("SELECT * FROM tb_portfolio_crew");
$data = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    $prinsip_kami = $_POST['prinsip_kami'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];

    if ($result->num_rows) {
        $query = "UPDATE tb_portfolio_crew SET prinsip_kami='$prinsip_kami',alamat='$alamat',email='$email' WHERE id=" . $data['id'];
    } else {
        $query = "INSERT INTO tb_portfolio_crew (prinsip_kami,alamat,email) VALUES ('$prinsip_kami','$alamat','$email')";
    }

    if ($conn->query($query)) {
        echo "<script>alert('Data Profil berhasil disimpan!');</script>";
        echo "<script>window.location.href = '?page=profil_crew';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Profil</h1>
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
                                    <label for="nama">PRINSIP KAMI</label>
                                    <textarea name="prinsip_kami" id="prinsip_kami" cols="" rows="" class="form-control"><?= $data['prinsip_kami'] ?? "" ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="" rows="" class="form-control"><?= $data['alamat'] ?? "" ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Email</label>
                                    <textarea name="email" id="email" cols="" rows="" class="form-control"><?= $data['email'] ?? "" ?></textarea>
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
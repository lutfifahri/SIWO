<?php

$result = $conn->query("SELECT * FROM tb_portfolio_home");
$data = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    $profil = $_POST['profil'];


    if ($result->num_rows) {
        $query = "UPDATE tb_portfolio_home SET profil='$profil' WHERE id=" . $data['id'];
    } else {
        $query = "INSERT INTO tb_portfolio_home (profil) VALUES ('$profil')";
    }

    if ($conn->query($query)) {
        echo "<script>alert('Data Profil berhasil disimpan!');</script>";
        echo "<script>window.location.href = '?page=profil';</script>";
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
                                    <label for="nama">APA ITU JINGGA KREATIF?</label>
                                    <textarea name="profil" id="profil" cols="" rows="" class="form-control"><?= $data['profil'] ?? "" ?></textarea>
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
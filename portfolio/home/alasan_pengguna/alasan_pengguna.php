<?php

$result = $conn->query("SELECT * FROM tb_portfolio_home");
$data = $result->fetch_assoc();
if (isset($_POST['submit'])) {
    $alasan_pengguna = $_POST['alasan_pengguna'];


    if ($result->num_rows) {
        $query = "UPDATE tb_portfolio_home SET alasan_pengguna='$alasan_pengguna' WHERE id=" . $data['id'];
    } else {
        $query = "INSERT INTO tb_portfolio_home (alasan_pengguna) VALUES ('$alasan_pengguna')";
    }

    if ($conn->query($query)) {
        echo "<script>alert('Data alasan_pengguna berhasil disimpan!');</script>";
        echo "<script>window.location.href = '?page=alasan_pengguna';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Alasan Pengguna</h1>
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
                                    <label for="nama">ALASAN KENAPA HARUS PAKAI WO</label>
                                    <textarea name="alasan_pengguna" id="alasan_pengguna" cols="" rows="" class="form-control"><?= $data['alasan_pengguna'] ?? "" ?></textarea>
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
<?php

if (isset($_POST['submit'])) {
    $link_yt = $_POST['link_yt'];

    parse_str(parse_url($link_yt, PHP_URL_QUERY), $videoId);
    $link_yt = $videoId['v'];

    $query = "INSERT INTO tb_hasil_kerja (link_yt) VALUES ('$link_yt')";
    if ($conn->query($query)) {
        echo "<script>alert('Data Hasil Kerja berhasil ditambahkan!');</script>";
        echo "<script>window.location.href = '?page=hasil_kerja';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Hasil Kerja</h1>
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
                                    <label for="nama">Link Youtube</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Link Youtube" name="link_yt">
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
    <!-- /.content -->
</div>
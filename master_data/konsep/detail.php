<?php

if (isset($_GET['id'])) {
    $query = "SELECT * FROM tb_konsep WHERE id=" . $_GET['id'];
    if ($result = $conn->query($query)) {
        $row = $result->fetch_assoc();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }


    $query = "SELECT * FROM tb_gambar_konsep WHERE  id_konsep=" . $_GET['id'];
    $result = $conn->query($query);
    $gambar = $result->fetch_all(MYSQLI_ASSOC);
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Detail</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary shadow" style="height: 359px;">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" disabled value="<?= $row['nama']; ?>">
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="?page=konsep" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary shadow">
                        <div class="row">
                            <div class="col-6">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?= $gambar[0]['gambar']; ?>" class="d-block" style="width: 100%; height: 360px; object-fit: cover;">
                                        </div>
                                        <?php for ($i = 1; $i < count($gambar); $i++) : ?>
                                            <div class="carousel-item">
                                                <img src="<?= $gambar[$i]['gambar']; ?>" class="d-block" style="width: 100%; height: 360px; object-fit: cover;">
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <?= $row['detail'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
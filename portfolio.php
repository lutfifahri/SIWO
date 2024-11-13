<?php
session_start();
session_destroy();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <title>Jingga Kreatif</title>
</head>

<body>
    <style>
        .btn-primary {
            border-color: #ff5100;
            background-color: #ff5100 !important;
        }

        .btn-primary:hover {
            border-color: #e64900;
            background-color: #e64900 !important;
        }

        #btn-login:hover {
            background-color: #ff5100;
            color: white;
        }

        .navbar-brand:hover,
        .navbar-nav .nav-item a:hover {
            color: #ff5100 !important;
        }
    </style>
    <?php
    include_once("database/koneksi.php");
    $result = $conn->query("SELECT * FROM tb_caraousel");
    $caraousel = $result->fetch_all(MYSQLI_ASSOC);
    ?>
    <?php include_once("partials/navbar_portfolio.php"); ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <?php if (count($caraousel)) : ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <?php endif; ?>
            <?php for ($i = 1; $i < count($caraousel); $i++) : ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
            <?php endfor; ?>
        </div>
        <div class="carousel-inner">
            <?php if (count($caraousel)) : ?>
                <div class="carousel-item active">
                    <img src="<?= $caraousel[0]['gambar'] ?>" height="400" class="d-block w-100" alt="..." style="object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $caraousel[0]['judul'] ?></h5>
                        <p><?= $caraousel[0]['keterangan'] ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <?php for ($i = 1; $i < count($caraousel); $i++) : ?>
                <div class="carousel-item">
                    <img src="<?= $caraousel[$i]['gambar'] ?>" height="400" class="d-block w-100" alt="..." style="object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?= $caraousel[$i]['judul'] ?></h5>
                        <p><?= $caraousel[$i]['keterangan'] ?></p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        <?php if (count($caraousel) > 1) : ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        <?php endif; ?>
    </div>


    <?php
    $result = $conn->query("SELECT * FROM tb_portfolio_home");
    $data = $result->fetch_assoc();
    ?>

    <div class="container-fluid">
        <div class="row justify-content-center mb-3" style="background-color: #F5F5F7;">
            <div class="col-md-8 col-xl-6">
                <div class="text-center mt-2">
                    <a href="index.php?page=login" class="btn btn-primary mt-4">Pesan Disini</a>
                    <div class="py-4">
                        <h3 style="font-weight: 600;">APA ITU JINGGA KREATIF?</h3>
                        <p><?= $data['profil'] ?? "Data belum diisi" ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div class="text-center">
                    <div class="py-4">
                        <h3 style="font-weight: 600;">ALASAN KENAPA HARUS PAKAI WO</h3>
                        <p><?= $data['alasan_pengguna'] ?? "Data belum diisi" ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <div class="py-4 row justify-content-center">
                        <div class="col-sm-6 col-md-3 col-xl-2">
                            <div class="card border-0">
                                <div class="card-body text-center">
                                    <div class="mb-5"><i class="fas fa-user-clock " style="font-size: 50px; color: #ff5100;"></i></div>
                                    <h5 class="card-title" style="font-weight: 550;">Efesien Waktu dan Tenaga</h5>
                                    <p class="card-text"><?= $data['kelebihan1'] ?? "Data belum diisi" ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xl-2">
                            <div class="card border-0">
                                <div class="card-body text-center">
                                    <div class="mb-5"><i class="fas fa-coins" style="font-size: 50px;"></i></div>
                                    <h5 class="card-title" style="font-weight: 550;">Hemat Biaya</h5>
                                    <p class="card-text"><?= $data['kelebihan2'] ?? "Data belum diisi" ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xl-2">
                            <div class="card border-0">
                                <div class="card-body text-center">
                                    <div class="mb-5"><i class="fas fa-users " style="font-size: 50px; color: #ff5100;"></i></div>
                                    <h5 class="card-title" style="font-weight: 550;">Bertemu Vendor-Vendor Terbaik</h5>
                                    <p class="card-text"><?= $data['kelebihan3'] ?? "Data belum diisi" ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-xl-2">
                            <div class="card border-0">
                                <div class="card-body text-center">
                                    <div class="mb-5"><i class="fas fa-clipboard " style="font-size: 50px;"></i></div>
                                    <h5 class="card-title" style="font-weight: 550;">Tersusun dan Detail</h5>
                                    <p class="card-text"><?= $data['kelebihan4'] ?? "Data belum diisi" ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-xl-6">
                <div class="text-center">
                    <div class="py-4">
                        <h3 style="font-weight: 600;">PAKET WEDDING</h3>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $result = $conn->query("
        SELECT 
            tb_paket_wedding.*,
            (SELECT nama FROM tb_konsep WHERE id=tb_paket_wedding.konsep) AS konsep,
            (SELECT detail FROM tb_konsep WHERE id=tb_paket_wedding.konsep) AS detail_konsep,
            (SELECT nama FROM tb_produksi WHERE id=tb_paket_wedding.dekorasi) AS dekorasi,
            (SELECT harga FROM tb_produksi WHERE id=tb_paket_wedding.dekorasi) AS harga_dekorasi,
            (SELECT detail FROM tb_produksi WHERE id=tb_paket_wedding.dekorasi) AS detail_dekorasi,
            (SELECT nama FROM tb_produksi WHERE id=tb_paket_wedding.dokumentasi) AS dokumentasi,
            (SELECT harga FROM tb_produksi WHERE id=tb_paket_wedding.dokumentasi) AS harga_dokumentasi,
            (SELECT detail FROM tb_produksi WHERE id=tb_paket_wedding.dokumentasi) AS detail_dokumentasi,
            (SELECT nama FROM tb_equipment WHERE id=tb_paket_wedding.lighting) AS lighting,
            (SELECT harga FROM tb_equipment WHERE id=tb_paket_wedding.lighting) AS harga_lighting,
            (SELECT detail FROM tb_equipment WHERE id=tb_paket_wedding.lighting) AS detail_lighting,
            (SELECT nama FROM tb_equipment WHERE id=tb_paket_wedding.sound) AS sound,
            (SELECT harga FROM tb_equipment WHERE id=tb_paket_wedding.sound) AS harga_sound,
            (SELECT detail FROM tb_equipment WHERE id=tb_paket_wedding.sound) AS detail_sound,
            (SELECT nama FROM tb_talent WHERE id=tb_paket_wedding.band) AS band,
            (SELECT harga FROM tb_talent WHERE id=tb_paket_wedding.band) AS harga_band,
            (SELECT detail FROM tb_talent WHERE id=tb_paket_wedding.band) AS detail_band,
            (SELECT nama FROM tb_talent WHERE id=tb_paket_wedding.mc) AS mc,
            (SELECT harga FROM tb_talent WHERE id=tb_paket_wedding.mc) AS harga_mc,
            (SELECT detail FROM tb_talent WHERE id=tb_paket_wedding.mc) AS detail_mc,
            (SELECT nama FROM tb_talent WHERE id=tb_paket_wedding.mua) AS mua, 
            (SELECT harga FROM tb_talent WHERE id=tb_paket_wedding.mua) AS harga_mua,
            (SELECT detail FROM tb_talent WHERE id=tb_paket_wedding.mua) AS detail_mua, 
            (
                (SELECT harga FROM tb_produksi WHERE id=tb_paket_wedding.dekorasi)
                +
                (SELECT harga FROM tb_produksi WHERE id=tb_paket_wedding.dokumentasi)
                +
                (SELECT harga FROM tb_equipment WHERE id=tb_paket_wedding.lighting)
                +
                (SELECT harga FROM tb_equipment WHERE id=tb_paket_wedding.sound)
                +
                (SELECT harga FROM tb_talent WHERE id=tb_paket_wedding.band)
                +
                (SELECT harga FROM tb_talent WHERE id=tb_paket_wedding.mc)
                +
                (SELECT harga FROM tb_talent WHERE id=tb_paket_wedding.mua)
            ) AS total
        FROM 
            tb_paket_wedding 
        ");
        ?>
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 px-5 justify-content-center">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col" style="width: 18rem;">
                    <div class="card">
                        <img src="assets/img/k1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $row['nama'] ?></h5>
                            <p class="card-text"><?= $row['keterangan'] ?></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id'] ?>">LIHAT SELENGKAPNYA</button>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModal<?= $row['id'] ?>Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModal<?= $row['id'] ?>Label"><?= $row['nama'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-0">
                                <img src="assets/img/k1.jpg" class="w-100">
                                <div class="p-4">
                                    <p><?= $row['keterangan'] ?></p>
                                    <h5>Konsep: <?= $row['konsep'] ?></h5>
                                    <p><?= $row['detail_konsep'] ?></p>
                                    <h5>Band: <?= $row['band'] ?> (Rp. <?= number_format($row['harga_band'], 0, ",", "."); ?>)</h5>
                                    <p><?= $row['detail_band'] ?></p>
                                    <h5>MUA: <?= $row['mua'] ?> (Rp. <?= number_format($row['harga_mua'], 0, ",", "."); ?>)</h5>
                                    <p><?= $row['detail_mua'] ?></p>
                                    <h5>MC: <?= $row['mc'] ?> (Rp. <?= number_format($row['harga_mc'], 0, ",", "."); ?>)</h5>
                                    <p><?= $row['detail_mc'] ?></p>
                                    <h5>Dekorasi: <?= $row['dekorasi'] ?> (Rp. <?= number_format($row['harga_dekorasi'], 0, ",", "."); ?>)</h5>
                                    <p><?= $row['detail_dekorasi'] ?></p>
                                    <h5>Dokumentasi: <?= $row['dokumentasi'] ?> (Rp. <?= number_format($row['harga_dokumentasi'], 0, ",", "."); ?>)</h5>
                                    <p><?= $row['detail_dokumentasi'] ?></p>
                                    <h5>Sound: <?= $row['sound'] ?> (Rp. <?= number_format($row['harga_sound'], 0, ",", "."); ?>)</h5>
                                    <p><?= $row['detail_sound'] ?></p>
                                    <h5>Lighting: <?= $row['lighting'] ?> (Rp. <?= number_format($row['harga_lighting'], 0, ",", "."); ?>)</h5>
                                    <p><?= $row['detail_lighting'] ?></p>
                                    <br><br>
                                    <h5>Total Harga: (Rp. <?= number_format($row['total'], 0, ",", "."); ?>)</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php
        $result = $conn->query("SELECT * FROM tb_hasil_kerja");
        ?>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="text-center">
                    <h3 style="font-weight: 600;">HASIL KERJA KAMI</h3>
                    <div class="py-4 row justify-content-center">
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <div class="col-md-6 col-xl-4 mb-3">
                                <iframe width="100%" height="350" src="https://www.youtube.com/embed/<?= $row['link_yt'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("partials/footer_portfolio.php"); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>

</html>
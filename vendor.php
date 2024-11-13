<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

        .modal-body {
            text-align: left;
        }
    </style>
    <?php
    include_once("database/koneksi.php");
    $result = $conn->query("SELECT * FROM tb_portfolio_vendor");
    $vendor = $result->fetch_assoc();
    ?>
    <?php include_once("partials/navbar_portfolio.php"); ?>
    <div class="container-fluid">
        <div class="row justify-content-center p-5" style="background-color: #F5F5F7;">
            <div class="col-sm-6 col-md-8 col-lg-5 text-center">
                <h3 style="font-weight: 600;">APA ITU VENDOR ?</h3>
                <p><?= $vendor['profil'] ?? "Data belum diisi" ?></p>
            </div>
        </div>

        <div class="row justify-content-center p-5">
            <div class="col-sm-6 col-md-8 col-lg-5 text-center">
                <h3 style="font-weight: 600;">VENDOR TERBAIK KAMI</h3>
                <p><?= $vendor['vendor_terbaik'] ?? "Data belum diisi" ?></p>
                <br>
                <h5 style="color: #ff5100;">KLIK GAMBAR UNTUK MELIHAT INFO</h5>
            </div>
        </div>
        <!--  -->
        <style>
            .zoom {
                transition: all .1s ease-in-out;
                transition: 0.5s;
                cursor: pointer;
            }

            .zoom:hover {
                transform: scale(1.2);
            }
        </style>
        <div class="row justify-content-center p-5" style="background-color: #F5F5F7;">
            <div class="col pb-5">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-md-8 col-lg-5 text-center">
                        <h3 style="font-weight: 600;">KONSEP/TEMA</h3>
                    </div>
                </div>
                <?php
                $result = $conn->query("SELECT * FROM tb_konsep INNER JOIN tb_gambar_konsep ON tb_gambar_konsep.id_konsep=tb_konsep.id GROUP BY tb_konsep.id");
                ?>
                <div class="row text-center justify-content-center">
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-6 zoom" style="height: 250px;">
                            <img data-id="konsep_<?= $row['id'] ?>" src="<?= $row['gambar'] ?>" class="rounded-circle mb-3" style=" height: 100%; aspect-ratio: 1/1; object-fit: cover;">
                            <h5><?= $row['nama'] ?></h5>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="konsep_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="konsepModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="konsepModalLabel"><?= $row['nama'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-0">
                                        <img src="<?= $row['gambar'] ?>" style=" width: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                        <div class="p-2"><?= $row['detail'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>
            </div>
        </div>

        <?php
        $result = $conn->query("SELECT * FROM tb_produksi INNER JOIN tb_gambar_produksi ON tb_gambar_produksi.id_produksi=tb_produksi.id WHERE tb_produksi.jenis='DEKORASI' GROUP BY id_produksi");
        ?>
        <!-- Produksi -->
        <div class="row justify-content-center p-5">
            <div class="col pb-5">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2 style="font-weight: 600;">PRODUKSI</h2>
                    </div>
                </div>
                <div class="row text-center justify-content-evenly">
                    <div class="col-12 col-sm-6 mb-5">
                        <h3>DEKOR</h3>
                        <div class="row mt-4">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="col zoom" style="height: 150px; margin-bottom: 5rem;">
                                    <img data-id="dekor_<?= $row['id'] ?>" src="<?= $row['gambar'] ?>" class="rounded-circle mb-3" style=" height: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                    <h5><?= $row['nama'] ?></h5>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="dekor_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="tradisionalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tradisionalModalLabel"><?= $row['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="<?= $row['gambar'] ?>" style=" width: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                                <div class="p-2"><?= $row['detail'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modernModal" tabindex="-1" aria-labelledby="modernModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modernModalLabel">MODERN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <?php
                    $result = $conn->query("SELECT * FROM tb_produksi INNER JOIN tb_gambar_produksi ON tb_gambar_produksi.id_produksi=tb_produksi.id WHERE tb_produksi.jenis='DOKUMENTASI' GROUP BY id_produksi");
                    ?>
                    <div class="col-12 col-sm-6">
                        <h3>DOKUMENTASI</h3>
                        <div class="row mt-4">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="col zoom" style="height: 150px; margin-bottom: 5rem;">
                                    <img data-id="dokumentasi_<?= $row['id'] ?>" src="<?= $row['gambar'] ?>" class="rounded-circle mb-3" style=" height: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                    <h5><?= $row['nama'] ?></h5>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="dokumentasi_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="tradisionalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tradisionalModalLabel"><?= $row['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="<?= $row['gambar'] ?>" style=" width: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                                <div class="p-2"><?= $row['detail'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modernModal" tabindex="-1" aria-labelledby="modernModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modernModalLabel">MODERN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Equipment -->
        <div class="row justify-content-center p-5" style="background-color: #F5F5F7;">
            <div class="col pb-5">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2 style="font-weight: 600;">EQUIPMENT</h2>
                    </div>
                </div>
                <div class="row text-center justify-content-evenly">
                    <div class="col-12 col-sm-6">
                        <?php
                        $result = $conn->query("SELECT * FROM tb_equipment INNER JOIN tb_gambar_equipment ON tb_gambar_equipment.id_equipment=tb_equipment.id WHERE tb_equipment.jenis='LIGHTING' GROUP BY id_equipment");
                        ?>
                        <h3>LIGHTNING</h3>
                        <div class="row mt-4">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="col zoom" style="height: 150px; margin-bottom: 5rem;">
                                    <img data-id="lighting_<?= $row['id'] ?>" src="<?= $row['gambar'] ?>" class="rounded-circle mb-3" style=" height: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                    <h5><?= $row['nama'] ?></h5>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="lighting_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="tradisionalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tradisionalModalLabel"><?= $row['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="<?= $row['gambar'] ?>" style=" width: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                                <div class="p-2"><?= $row['detail'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modernModal" tabindex="-1" aria-labelledby="modernModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modernModalLabel">MODERN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <?php
                        $result = $conn->query("SELECT * FROM tb_equipment INNER JOIN tb_gambar_equipment ON tb_gambar_equipment.id_equipment=tb_equipment.id WHERE tb_equipment.jenis='SOUND' GROUP BY id_equipment");
                        ?>
                        <h3>SOUND</h3>
                        <div class="row mt-4">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="col zoom" style="height: 150px; margin-bottom: 5rem;">
                                    <img data-id="sound_<?= $row['id'] ?>" src="<?= $row['gambar'] ?>" class="rounded-circle mb-3" style=" height: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                    <h5><?= $row['nama'] ?></h5>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="sound_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="tradisionalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tradisionalModalLabel"><?= $row['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="<?= $row['gambar'] ?>" style=" width: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                                <div class="p-2"><?= $row['detail'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modernModal" tabindex="-1" aria-labelledby="modernModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modernModalLabel">MODERN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Talent -->
        <div class="row justify-content-center p-5">
            <div class="col pb-5">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <h2 style="font-weight: 600;">TALENT</h2>
                    </div>
                </div>
                <div class="row text-center justify-content-evenly mb-5">
                    <div class="col-12 col-sm-6">
                        <?php
                        $result = $conn->query("SELECT * FROM tb_talent INNER JOIN tb_gambar_talent ON tb_gambar_talent.id_talent=tb_talent.id WHERE tb_talent.jenis='BAND' GROUP BY id_talent");
                        ?>
                        <h3>BAND</h3>
                        <div class="row mt-4">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="col zoom" style="height: 150px; margin-bottom: 5rem;">
                                    <img data-id="band_<?= $row['id'] ?>" src="<?= $row['gambar'] ?>" class="rounded-circle mb-3" style=" height: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                    <h5><?= $row['nama'] ?></h5>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="band_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="tradisionalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tradisionalModalLabel"><?= $row['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="<?= $row['gambar'] ?>" style=" width: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                                <div class="p-2"><?= $row['detail'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modernModal" tabindex="-1" aria-labelledby="modernModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modernModalLabel">MODERN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <?php
                        $result = $conn->query("SELECT * FROM tb_talent INNER JOIN tb_gambar_talent ON tb_gambar_talent.id_talent=tb_talent.id WHERE tb_talent.jenis='MC' GROUP BY id_talent");
                        ?>
                        <h3>MC</h3>
                        <div class="row mt-4">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="col zoom" style="height: 150px; margin-bottom: 5rem;">
                                    <img data-id="mc_<?= $row['id'] ?>" src="<?= $row['gambar'] ?>" class="rounded-circle mb-3" style=" height: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                    <h5><?= $row['nama'] ?></h5>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="mc_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="tradisionalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tradisionalModalLabel"><?= $row['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="<?= $row['gambar'] ?>" style=" width: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                                <div class="p-2"><?= $row['detail'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modernModal" tabindex="-1" aria-labelledby="modernModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modernModalLabel">MODERN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="row text-center justify-content-evenly pt-5">
                    <div class="col-12 col-sm-6">
                        <?php
                        $result = $conn->query("SELECT * FROM tb_talent INNER JOIN tb_gambar_talent ON tb_gambar_talent.id_talent=tb_talent.id WHERE tb_talent.jenis='MUA' GROUP BY id_talent");
                        ?>
                        <h3>MUA</h3>
                        <div class="row mt-4">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <div class="col zoom" style="height: 150px; margin-bottom: 5rem;">
                                    <img data-id="mua_<?= $row['id'] ?>" src="<?= $row['gambar'] ?>" class="rounded-circle mb-3" style=" height: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                    <h5><?= $row['nama'] ?></h5>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="mua_<?= $row['id'] ?>" tabindex="-1" aria-labelledby="tradisionalModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tradisionalModalLabel"><?= $row['nama'] ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <img src="<?= $row['gambar'] ?>" style=" width: 100%; aspect-ratio: 1/1; object-fit: cover;">
                                                <div class="p-2"><?= $row['detail'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modernModal" tabindex="-1" aria-labelledby="modernModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modernModalLabel">MODERN</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <?php include_once("partials/footer_portfolio.php"); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <!-- Modal -->
    <div class="modal fade" id="tradisionalModal" tabindex="-1" aria-labelledby="tradisionalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tradisionalModalLabel">TRADISIONAL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modernModal" tabindex="-1" aria-labelledby="modernModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modernModalLabel">MODERN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="350" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur magnam rem libero cupiditate dolorum. Eius ex ut ad dicta ea incidunt magnam quidem minus ducimus similique! Optio eos perspiciatis qui.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("img#tradisional").on('click', function() {
            $("#tradisionalModal .modal-body iframe").attr('src', "https://www.youtube.com/embed/1SG2q2ZdX94");
            $("#tradisionalModal").modal('show');
        });
        $("#tradisionalModal").on("hidden.bs.modal", function() {
            $("#tradisionalModal .modal-body iframe").attr('src', "");
        });
    </script>
    <script>
        $("img#modern").on('click', function() {
            $("#modernModal .modal-body iframe").attr('src', "https://www.youtube.com/embed/alKGYA1W8H4");
            $("#modernModal").modal('show');
        });
        $("#modernModal").on("hidden.bs.modal", function() {
            $("#modernModal .modal-body iframe").attr('src', "");
        });
    </script>
    <script>
        $(".zoom").on('click', function() {
            const key = $(this).children()[0].getAttribute('data-id').split('_')[0];
            const number = $(this).children()[0].getAttribute('data-id').split('_')[1];
            $(`#${key}_${number}`).modal('show');
        })
    </script>
</body>

</html>
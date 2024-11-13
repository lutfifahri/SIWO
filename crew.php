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


        .nama-crew {
            background-color: #ff5100;
            border-radius: 30px;
            font-size: .9rem;
            padding: .4rem 1.5rem;
        }

        .jabatan-crew {
            font-weight: bold;
            display: inline-block;
            background-color: #E7EAED;
            border-radius: 30px;
            font-size: .7rem;
            padding: .4rem 1.5rem;
        }
    </style>
      <?php
        include_once("database/koneksi.php");
        $result = $conn->query("SELECT * FROM tb_portfolio_crew");
        $data = $result->fetch_assoc();
        ?>
    <?php include_once("partials/navbar_portfolio.php"); ?>
    <div class="container-fluid p-0">
        <div class="row g-0 justify-content-center p-5" style="background-color: #F5F5F7;">
            <div class="col-sm-6 col-md-8 col-lg-5 text-center">
                <h3 style="font-weight: bold;">PRINSIP KAMI</h3>
                <br>
                <p style="font-weight: bold; font-size: 1.5rem;"><?= $data['prinsip_kami'] ?? 'Belum diisi' ?></p>
            </div>
        </div>

        <div class="row g-0 p-5 justify-content-center">
            <div class="col-xl-10 col-xxl-6 col-md-12 pb-5">
                <div class="row g-5 text-center justify-content-center">
                    <?php
                    $result = $conn->query("SELECT tb_karyawan.*, tb_jabatan.nama AS nama_jabatan FROM tb_karyawan LEFT JOIN tb_jabatan ON tb_jabatan.id=tb_karyawan.id_jabatan");
                    ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <div class="col-xl-4 col-md-6 col-12 text-center mb-5">
                            <img id="tradisional" src="<?= $row['foto'] ?>" class="rounded-circle mb-3" style=" height: 150px; aspect-ratio: 1/1; object-fit: cover;">
                            <div class="text-white mb-2 nama-crew"><?= $row['nama'] ?></div>
                            <div class="w-75 jabatan-crew"><?= $row['nama_jabatan'] ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

        <div class="row g-0 justify-content-center py-5">
            <div class="col-6">
                <img src="assets/img/logo.png" width="100%" alt="">
            </div>
        </div>

        <div class="row g-0 text-center py-2">
            <div class="col-12 mb-3">
                <img src="assets/img/pin.png" style="width: 2rem;" alt="">
            </div>
            <div class="col-12">
                <h5><?= $data['alamat'] ?? 'Belum diisi' ?></h5>
            </div>
        </div>

        <div class="row g-0 text-center pb-5">
            <div class="col-12 mb-3">
                <img src="assets/img/email.png" style="width: 2rem;" alt="">
            </div>
            <div class="col-12">
                <h5><?= $data['email'] ?? 'Belum diisi' ?></h5>
            </div>
        </div>
    </div>

    <?php include_once("partials/footer_portfolio.php"); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>
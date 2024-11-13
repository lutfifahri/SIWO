<?php

if (isset($_POST['submit'])) {
    $konfirmasi_kode = $_POST['konfirmasi_kode'];

    if ($_COOKIE['kode'] == $konfirmasi_kode) {
        $query = "UPDATE tb_klien SET status='Aktif' WHERE id=".$_GET['id'];
        if ($conn->query($query)) {
            echo "<script>alert('Pendaftaran Berhasil! Silakan Login!');</script>";
            echo "<script>window.location.href = '?page=login';</script>";
        } else {
            echo $conn->error;
        }
    } else {
        echo "<script>alert('Kode salah!');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jingga Kreatif</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <style>
        .card-primary.card-outline {
            border-top-color: #F15A24;
        }

        .btn-primary:active {
            border-color: #ea480e !important;
            background-color: #ea480e !important;
        }

        .btn-primary:hover {
            border-color: #f05016;
            background-color: #f05016;
        }

        .btn-primary,
        .primary {
            border-color: #F15A24;
            background-color: #F15A24;
        }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="assets/img/logo.png" style="width: 100%;">
            </div>
            <div class="card-body">
                <p class="login-box-msg">Form Kode Verifikasi</p>

                <form action="" method="post">
                    <label for="">Konfirmasi Kode</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" autocomplete="off" required name="konfirmasi_kode" placeholder="Masukkan kode">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary btn-block">VERIFIKASI</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="row text-center justify-content-center">
                    <a href="index.php?page=login" class="text-center">Sudah punya akun?</a>

                </div>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/js/adminlte.min.js"></script>
</body>

</html>
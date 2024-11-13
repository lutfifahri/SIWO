<?php
include_once('MailSender.php');
if (isset($_POST['submit'])) {
  $nik = $_POST['nik'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $nomor_telepon = $_POST['nomor_telepon'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $konfirmasi_password = $_POST['konfirmasi_password'];

  if(strlen($password) < 8 || strlen($konfirmasi_password) < 8){
    echo "<script>alert('Password Minimal Memiliki 8 Karakter!');</script>";
  } else {
    $query = "SELECT * FROM tb_user WHERE username='$username'";
    $result = $conn->query($query);
    if ($result->num_rows == 0) {
      if ($password === $konfirmasi_password) {
        $query = "INSERT INTO tb_user (nama, username, password, level) VALUES ('$nama_lengkap', '$username', '$password', 'KLIEN')";
        if ($conn->query($query)) {
          $last_id = $conn->insert_id;
          $query = "INSERT INTO tb_klien (id_user, nik, nama_lengkap, nomor_telepon, email, status) VALUES ($last_id,'$nik', '$nama_lengkap', '$nomor_telepon', '$email', 'Pending')";
          if ($conn->query($query)) {
            $last_id = $conn->insert_id;
            new MailSender($email, "PENDAFTARAN");
            echo "<script>alert('Pendaftaran Berhasil! Silakan Cek Email untuk verifikasi kode!');</script>";
            echo "<script>window.location.href = '?page=verif&id=" . $last_id . "';</script>";
          } else echo $conn->error;
        } else echo $conn->error;
      } else {
        echo "<script>alert('Password Tidak Sama');</script>";
      }
    } else {
      echo "<script>alert('Username telah digunakan!');</script>";
    }
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

<body class="hold-transition register-page pt-5">
  <div class="register-box mt-5 mb-5">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="assets/img/logo.png" style="width: 100%;">
      </div>
      <div class="card-body">
        <p class="login-box-msg" style="font-weight: bold;">REGISTER</p>

        <form action="" method="post">
          <label for="">NIK</label>
          <div class="input-group mb-3">
            <input type="number" class="form-control" autocomplete="off" required name="nik" placeholder="NIK" value="<?= isset($_POST['submit']) ? $_POST['nik'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="far fa-id-card"></i>
              </div>
            </div>
          </div>
          <label for="">Nama Lengkap</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" autocomplete="off" required name="nama_lengkap" placeholder="Nama Lengkap" value="<?= isset($_POST['submit']) ? $_POST['nama_lengkap'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <label for="">Nomor Telepon</label>
          <div class="input-group mb-3">
            <input type="text" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" class="form-control" autocomplete="off" required name="nomor_telepon" placeholder="Nomor Telepon" value="<?= isset($_POST['submit']) ? $_POST['nomor_telepon'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-mobile-alt"></i>
              </div>
            </div>
          </div>
          <label for="">Username</label>
          <div class="input-group mb-3">
            <input type="text" class="form-control" autocomplete="off" required name="username" placeholder="Username" value="<?= isset($_POST['submit']) ? $_POST['username'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <label for="">Email</label>
          <div class="input-group mb-3">
            <input type="email" class="form-control" autocomplete="off" required name="email" placeholder="Ex: example@example.com" value="<?= isset($_POST['submit']) ? $_POST['email'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <label for="">Password</label>
          <div class="input-group mb-3">
            <input type="password" class="form-control" autocomplete="off" required name="password" placeholder="Password Miniman 8 Karakter" value="<?= isset($_POST['submit']) ? $_POST['password'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <label for="">Konfirmasi Password</label>
          <div class="input-group mb-3">
            <input type="password" class="form-control" autocomplete="off" required name="konfirmasi_password" placeholder="Masukan Ulang Password" value="<?= isset($_POST['submit']) ? $_POST['konfirmasi_password'] : ''; ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
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
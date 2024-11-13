<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT tb_user.*, tb_klien.id AS id_klien, tb_klien.status FROM tb_user LEFT JOIN tb_klien ON tb_klien.id_user=tb_user.id WHERE tb_user.username='$username' AND tb_user.password='$password'";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['id'] = $user['id'];
    $_SESSION['id_klien'] = $user['id_klien'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['level'] = $user['level'];
    if ($user['level'] === "KLIEN") {
      if ($user['status'] == "Aktif") {
        echo "<script>alert('Login berhasil!');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
      } else {
        echo "<script>alert('Akun belum terverifikasi!');</script>";
      }
    } else {
      echo "<script>alert('Login berhasil!');</script>";
      echo "<script>window.location.href = 'index.php';</script>";
    }
  } else {
    echo "<script>alert('Username atau Password salah!');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jingga Kreatif | Log in</title>

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

    .btn-primary:visited,
    .btn-primary:active {
      border-color: #ea480e !important;
      background-color: #ea480e !important;
    }

    .btn-primary:hover {
      border-color: #f05016;
      background-color: #f05016;
    }

    .btn-primary:focus,
    .btn-primary,
    .primary {
      border-color: #F15A24;
      background-color: #F15A24;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="assets/img/logo.png" style="width: 100%;">
      </div>
      <div class="card-body">
        <p class="login-box-msg">Login</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" name="submit">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

        <!-- <p class="mb-1 text-center">
          <a href="forgot-password.html">Lupa Password?</a>
        </p> -->
        <p class="mb-0 text-center">
          <a href="index.php?page=register" class="text-center">Daftar baru</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.min.js"></script>
</body>

</html>
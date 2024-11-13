<?php

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    if (strlen($password) < 8 || strlen($konfirmasi_password) < 8) {
        echo "<script>alert('Password Minimal Memiliki 8 Karakter!');</script>";
    } else {


        $query = "SELECT * FROM tb_user WHERE username='$username'";
        $result = $conn->query($query);
        if ($result->num_rows == 0) {
            if ($password === $konfirmasi_password) {
                $query = "INSERT INTO tb_user (nama, username, password, level) VALUES ('$nama_lengkap', '$username', '$password', 'KLIEN')";
                if ($conn->query($query)) {
                    $last_id = $conn->insert_id;
                    $query = "INSERT INTO tb_klien (id_user, nik, nama_lengkap, nomor_telepon, email) VALUES ($last_id,'$nik', '$nama_lengkap', '$nomor_telepon', '$email')";
                    if ($conn->query($query)) {
                        echo "<script>alert('Data dan akun klien berhasil ditambahkan!');</script>";
                        echo "<script>window.location.href = '?page=klien';</script>";
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="" method="POST">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Identitas</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control" name="nik" id="nik" required autocomplete="off" autofocus value="<?= isset($_POST['submit']) ? $_POST['nik'] : ''; ?>" placeholder="Masukkan NIK">
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required autocomplete="off" value="<?= isset($_POST['submit']) ? $_POST['nama_lengkap'] : ''; ?>" placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="text" pattern="\+?([ -]?\d+)+|\(\d+\)([ -]\d+)" class="form-control" name="nomor_telepon" id="nomor_telepon" required autocomplete="off" value="<?= isset($_POST['submit']) ? $_POST['nomor_telepon'] : ''; ?>" placeholder="Masukkan nomor telepon">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required autocomplete="off" value="<?= isset($_POST['submit']) ? $_POST['email'] : ''; ?>" placeholder="Masukkan email">
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Akun</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" required placeholder="Masukkan username" value="<?= isset($_POST['submit']) ? $_POST['username'] : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password" required name="password" value="<?= isset($_POST['submit']) ? $_POST['password'] : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="konfirmasi_password">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="konfirmasi_password" placeholder="Masukkan Konfirmais Password" required name="konfirmasi_password" value="<?= isset($_POST['submit']) ? $_POST['konfirmasi_password'] : ''; ?>">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
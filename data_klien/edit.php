<?php

if (isset($_GET['id'])) {
    $query = "SELECT 
                tb_klien.*,
                tb_user.id AS id_user,
                tb_user.username,
                tb_user.password 
            FROM 
                tb_klien 
            INNER JOIN 
                tb_user 
            ON 
                tb_user.id=tb_klien.id_user 
            WHERE 
                tb_klien.id=" . $_GET['id'];
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    $query = "SELECT * FROM tb_user WHERE username='$username'";
    $result = $conn->query($query);
    if ($result->num_rows == 0 || $username == $row['username']) {
        if ($password === $konfirmasi_password) {
            $query = "UPDATE tb_user SET nama='$nama_lengkap', username='$username', password='$password' WHERE id=" . $row['id_user'];
            if ($conn->query($query)) {
                $query = "UPDATE tb_klien SET nik='$nik', nama_lengkap='$nama_lengkap', nomor_telepon='$nomor_telepon', email='$email' WHERE id=" . $row['id'];
                if ($conn->query($query)) {
                    if($_SESSION['level'] == "ADMIN"){
                        echo "<script>alert('Data dan akun klien berhasil diedit!');</script>";
                        echo "<script>window.location.href = '?page=klien';</script>";
                    } else {
                        echo "<script>alert('Profil berhasil diedit! Silakan login kembali');</script>";
                        echo "<script>window.location.href = 'halaman_auth/logout.php';</script>";
                    }
                } else echo $conn->error;
            } else echo $conn->error;
        } else {
            echo "<script>alert('Password Tidak Sama');</script>";
        }
    } else {
        echo "<script>alert('Username telah digunakan!');</script>";
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
                                    <input type="text" class="form-control" name="nik" id="nik" required autocomplete="off" autofocus value="<?= isset($_POST['submit']) ? $_POST['nik'] : $row['nik']; ?>" placeholder="Masukkan NIK">
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" required autocomplete="off" value="<?= isset($_POST['submit']) ? $_POST['nama_lengkap'] : $row['nama_lengkap']; ?>" placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="form-group">
                                    <label for="nomor_telepon">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" required autocomplete="off" value="<?= isset($_POST['submit']) ? $_POST['nomor_telepon'] : $row['nomor_telepon']; ?>" placeholder="Masukkan nomor telepon">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required autocomplete="off" value="<?= isset($_POST['submit']) ? $_POST['email'] : $row['email']; ?>" placeholder="Masukkan email">
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
                                        <input type="text" class="form-control" id="username" name="username" autocomplete="off" required placeholder="Masukkan username" value="<?= isset($_POST['submit']) ? $_POST['username'] : $row['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password" required name="password" value="<?= $row['password']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="konfirmasi_password">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="konfirmasi_password" placeholder="Masukkan Konfirmais Password" required name="konfirmasi_password" value="<?= $row['password']; ?>">
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
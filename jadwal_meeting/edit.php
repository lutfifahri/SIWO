<?php
include_once('MailSender.php');
if (isset($_GET['id'])) {
    $query = "SELECT 
               tb_jadwal_meeting.id,
               DATE(tb_jadwal_meeting.jadwal_meeting_1) AS tanggal_meeting_1,
               DATE(tb_jadwal_meeting.jadwal_meeting_2) AS tanggal_meeting_2,
               DATE(tb_jadwal_meeting.jadwal_meeting_3) AS tanggal_meeting_3,
               TIME(tb_jadwal_meeting.jadwal_meeting_1) AS waktu_meeting_1,
               TIME(tb_jadwal_meeting.jadwal_meeting_2) AS waktu_meeting_2,
               TIME(tb_jadwal_meeting.jadwal_meeting_3) AS waktu_meeting_3,
               tb_jadwal_meeting.riwayat_meeting_1,
               tb_jadwal_meeting.riwayat_meeting_2,
               tb_jadwal_meeting.riwayat_meeting_3,
               tb_jadwal_meeting.tempat_meeting_1,
               tb_jadwal_meeting.tempat_meeting_2,
               tb_jadwal_meeting.tempat_meeting_3,
               tb_jadwal_meeting.jam_meeting_1,
               tb_jadwal_meeting.jam_meeting_2,
               tb_jadwal_meeting.jam_meeting_3,
               tb_klien.email,
               tb_pengajuan.nama_l,
               tb_pengajuan.nama_p ,
               tb_pengajuan.id AS id_pengajuan  
               FROM tb_jadwal_meeting 
               INNER JOIN tb_pengajuan ON
               tb_pengajuan.id=tb_jadwal_meeting.id_pengajuan 
               INNER JOIN tb_klien ON
               tb_klien.id=tb_pengajuan.id_klien 
            WHERE 
               tb_jadwal_meeting.id=" . $_GET['id'];
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    if (isset($_GET['riwayat_meeting_1'])) {
        $riwayat_meeting_1 = $_POST['riwayat_meeting_1'];
        $tempat_meeting_1 = $_POST['tempat_meeting_1'];
        $waktu_meeting_1 = $_POST['waktu_meeting_1'];
        $tanggal_meeting_1 = $_POST['tanggal_meeting_1'];
        $message = "<div>Tempat: " . $tempat_meeting_1 . "</div>";
        $message .= "<div>Tanggal: " . $tanggal_meeting_1 . "</div>";
        $message .= "<div>Jam: " . $waktu_meeting_1 . "</div>";
        $message .= "<div>Riwayat Meeting: " . $riwayat_meeting_1 . "</div>";
        new MailSender($row['email'], "MEETING", $message, "Riwayat Meeting 1");
        $query = "UPDATE tb_jadwal_meeting SET riwayat_meeting_1='$riwayat_meeting_1', tempat_meeting_1='$tempat_meeting_1', jadwal_meeting_1='" . ($tanggal_meeting_1 . ' ' . $waktu_meeting_1) . "' WHERE id=" . $row['id'];
    } else if (isset($_GET['riwayat_meeting_2'])) {
        $riwayat_meeting_2 = $_POST['riwayat_meeting_2'];
        $tempat_meeting_2 = $_POST['tempat_meeting_2'];
        $waktu_meeting_2 = $_POST['waktu_meeting_2'];
        $tanggal_meeting_2 = $_POST['tanggal_meeting_2'];
        $message = "<div>Tempat: " . $tempat_meeting_2 . "</div>";
        $message .= "<div>Tanggal: " . $tanggal_meeting_2 . "</div>";
        $message .= "<div>Jam: " . $waktu_meeting_2 . "</div>";
        $message .= "<div>Riwayat Meeting: " . $riwayat_meeting_2 . "</div>";
        new MailSender($row['email'], "MEETING", $message, "Riwayat Meeting 2");
        $query = "UPDATE tb_jadwal_meeting SET riwayat_meeting_2='$riwayat_meeting_2', tempat_meeting_2='$tempat_meeting_2', jadwal_meeting_2='" . ($tanggal_meeting_2 . ' ' . $waktu_meeting_2) . "' WHERE id=" . $row['id'];
    } else if (isset($_GET['riwayat_meeting_3'])) {
        $riwayat_meeting_3 = $_POST['riwayat_meeting_3'];
        $tempat_meeting_3 = $_POST['tempat_meeting_3'];
        $waktu_meeting_3 = $_POST['waktu_meeting_3'];
        $tanggal_meeting_3 = $_POST['tanggal_meeting_3'];
        $message = "<div>Tempat: " . $tempat_meeting_3 . "</div>";
        $message .= "<div>Tanggal: " . $tanggal_meeting_3 . "</div>";
        $message .= "<div>Jam: " . $waktu_meeting_3 . "</div>";
        $message .= "<div>Riwayat Meeting: " . $riwayat_meeting_3 . "</div>";
        new MailSender($row['email'], "MEETING", $message, "Riwayat Meeting 3");
        $query = "UPDATE tb_jadwal_meeting SET riwayat_meeting_3='$riwayat_meeting_3', tempat_meeting_3='$tempat_meeting_3', jadwal_meeting_3='" . ($tanggal_meeting_3 . ' ' . $waktu_meeting_3) . "' WHERE id=" . $row['id'];
    } else if (isset($_GET['jadwal_meeting_2'])) {
        $tempat_meeting_2 = $_POST['tempat_meeting_2'];
        $waktu_meeting_2 = $_POST['waktu_meeting_2'];
        $tanggal_meeting_2 = $_POST['tanggal_meeting_2'];
        $message = "<div>Tempat: " . $tempat_meeting_2 . "</div>";
        $message .= "<div>Jam: " . $waktu_meeting_2 . "</div>";
        $message .= "<div>Jadwal Meeting: " . $tanggal_meeting_2 . "</div>";
        new MailSender($row['email'], "MEETING", $message, "Waktu dan Tempat Meeting 2");
        $query = "UPDATE tb_jadwal_meeting SET tempat_meeting_2='$tempat_meeting_2', jadwal_meeting_2='" . ($tanggal_meeting_2 . ' ' . $waktu_meeting_2) . "' WHERE id=" . $row['id'];
    } else if (isset($_GET['jadwal_meeting_3'])) {
        $tempat_meeting_3 = $_POST['tempat_meeting_3'];
        $waktu_meeting_3 = $_POST['waktu_meeting_3'];
        $tanggal_meeting_3 = $_POST['tanggal_meeting_3'];
        $message = "<div>Tempat: " . $tempat_meeting_3 . "</div>";
        $message .= "<div>Jam: " . $waktu_meeting_3 . "</div>";
        $message .= "<div>Jadwal Meeting: " . $tanggal_meeting_3 . "</div>";
        new MailSender($row['email'], "MEETING", $message, "Waktu dan Tempat Meeting 3");
        $query = "UPDATE tb_jadwal_meeting SET tempat_meeting_3='$tempat_meeting_3', jadwal_meeting_3='" . ($tanggal_meeting_3 . ' ' . $waktu_meeting_3) . "' WHERE id=" . $row['id'];
    } else {
        $id_pengajuan = $_POST['id_pengajuan'];
        $jadwal_meeting_1 = $_POST['jadwal_meeting_1'];
        $query = "UPDATE tb_jadwal_meeting SET id_pengajuan=$id_pengajuan, jadwal_meeting_1='$jadwal_meeting_1' WHERE id=" . $row['id'];
    }

    if ($conn->query($query)) {
        echo "<script>alert('Jadwal Meeting berhasil diedit!');</script>";
        echo "<script>window.location.href = '?page=jadwal_meeting';</script>";
    } else echo $query . ": " . $conn->error;
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Jadwal Meeting</h1>
                </div>
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div> -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <form action="" method="POST" enctype="multipart/form-data">


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div id="a" class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <?php if (isset($_GET['riwayat_meeting_1'])) : ?>
                                                    <div class="form-group">
                                                        <label for="tempat_meeting_1">Tempat Meeting Pertemuan 1</label>
                                                        <input required type="text" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tempat_meeting_1" name="tempat_meeting_1" value="<?= $row['tempat_meeting_1'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_1">Tanggal Meeting Pertemuan 1</label>
                                                        <input required type="date" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tanggal_meeting_1" name="tanggal_meeting_1" value="<?= isset($row['tanggal_meeting_1']) ? $row['tanggal_meeting_1'] : Date("Y-m-d") ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_1">Jam Meeting Pertemuan 1</label>
                                                        <input required type="time" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="waktu_meeting_1" name="waktu_meeting_1" value="<?= $row['waktu_meeting_1'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="riwayat_meeting_1">Hasil Meeting Pertemuan 1</label>
                                                        <textarea required name="riwayat_meeting_1" id="riwayat_meeting_1" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?>><?= $row['riwayat_meeting_1'] ?></textarea>
                                                    </div>
                                                <?php elseif (isset($_GET['riwayat_meeting_2'])) : ?>
                                                    <div class="form-group">
                                                        <label for="tempat_meeting_1">Tempat Meeting Pertemuan 2</label>
                                                        <input required type="text" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tempat_meeting_2" name="tempat_meeting_2" value="<?= $row['tempat_meeting_2'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_2">Tanggal Meeting Pertemuan 2</label>
                                                        <input required type="date" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tanggal_meeting_2" name="tanggal_meeting_2" value="<?= isset($row['tanggal_meeting_2']) ? $row['tanggal_meeting_2'] : Date("Y-m-d") ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_2">Jam Meeting Pertemuan 2</label>
                                                        <input required type="time" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="waktu_meeting_2" name="waktu_meeting_2" value="<?= $row['waktu_meeting_2'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="riwayat_meeting_2">Hasil Meeting Pertemuan 2</label>
                                                        <textarea required name="riwayat_meeting_2" id="riwayat_meeting_2" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?>><?= $row['riwayat_meeting_2'] ?></textarea>
                                                    </div>
                                                <?php elseif (isset($_GET['riwayat_meeting_3'])) : ?>
                                                    <div class="form-group">
                                                        <label for="tempat_meeting_3">Tempat Meeting Pertemuan 3</label>
                                                        <input required type="text" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tempat_meeting_3" name="tempat_meeting_3" value="<?= $row['tempat_meeting_3'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_3">Tanggal Meeting Pertemuan 3</label>
                                                        <input required type="date" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tanggal_meeting_3" name="tanggal_meeting_3" value="<?= isset($row['tanggal_meeting_3']) ? $row['tanggal_meeting_3'] : Date("Y-m-d") ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_3">Jam Meeting Pertemuan 3</label>
                                                        <input required type="time" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="waktu_meeting_3" name="waktu_meeting_3" value="<?= $row['waktu_meeting_3'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="riwayat_meeting_3">Hasil Meeting Pertemuan 3</label>
                                                        <textarea required name="riwayat_meeting_3" id="riwayat_meeting_3" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?>><?= $row['riwayat_meeting_3'] ?></textarea>
                                                    </div>
                                                <?php elseif (isset($_GET['jadwal_meeting_2'])) : ?>
                                                    <div class="form-group">
                                                        <label for="tempat_meeting_1">Tempat Meeting Pertemuan 2</label>
                                                        <input required type="text" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tempat_meeting_2" name="tempat_meeting_2" value="<?= $row['tempat_meeting_2'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_2">Tanggal Meeting Pertemuan 2</label>
                                                        <input required type="date" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tanggal_meeting_2" name="tanggal_meeting_2" value="<?= isset($row['tanggal_meeting_2']) ? $row['tanggal_meeting_2'] : Date("Y-m-d") ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_2">Jam Meeting Pertemuan 2</label>
                                                        <input required type="time" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="waktu_meeting_2" name="waktu_meeting_2" value="<?= $row['waktu_meeting_2'] ?>">
                                                    </div>
                                                <?php elseif (isset($_GET['jadwal_meeting_3'])) : ?>
                                                    <div class="form-group">
                                                        <label for="tempat_meeting_1">Tempat Meeting Pertemuan 3</label>
                                                        <input required type="text" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tempat_meeting_3" name="tempat_meeting_3" value="<?= $row['tempat_meeting_3'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_3">Tanggal Meeting Pertemuan 3</label>
                                                        <input required type="date" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="tanggal_meeting_3" name="tanggal_meeting_3" value="<?= isset($row['tanggal_meeting_3']) ? $row['tanggal_meeting_3'] : Date("Y-m-d") ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jam_meeting_3">Jam Meeting Pertemuan 3</label>
                                                        <input required type="time" class="form-control" <?= $_SESSION['level'] == 'ADMIN' ? "" : "disabled"; ?> id="waktu_meeting_3" name="waktu_meeting_3" value="<?= $row['waktu_meeting_3'] ?>">
                                                    </div>
                                               
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="?page=jadwal_meeting" class="btn btn-secondary mr-2">Kembali</a>
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </form>
</div>

<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
</script>
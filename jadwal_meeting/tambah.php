<?php
include_once('MailSender.php');
if (isset($_POST['submit'])) {
    $id_pengajuan = $_POST['id_pengajuan'];
    $tanggal_meeting_1 = $_POST['tanggal_meeting_1'];
    $waktu_meeting_1 = $_POST['waktu_meeting_1'];
    $tempat_meeting_1 = $_POST['tempat_meeting_1'];

    $jadwal_meeting_1 = $tanggal_meeting_1." ".$waktu_meeting_1;
    $query = "
        INSERT INTO 
            tb_jadwal_meeting (
                id_pengajuan,
                tempat_meeting_1,
                jadwal_meeting_1
            ) VALUES (
            '$id_pengajuan',
            '$tempat_meeting_1',
            '$jadwal_meeting_1'

        )";
    if ($conn->query($query)) {
        $query = "SELECT tb_klien.email, tb_jadwal_meeting.jadwal_meeting_1, tb_jadwal_meeting.tempat_meeting_1 FROM tb_pengajuan INNER JOIN tb_klien ON tb_klien.id=tb_pengajuan.id_klien INNER JOIN tb_jadwal_meeting ON tb_jadwal_meeting.id_pengajuan=tb_pengajuan.id WHERE tb_pengajuan.id=" . $id_pengajuan;
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $message = "<div>Tempat: " . $row['tempat_meeting_1'] . "</div>";
        $message .= "<div>Tanggal Meeting: " . $tanggal_meeting_1 . "</div>";
        $message .= "<div>Jam Meeting: " . $waktu_meeting_1 . "</div>";
        new MailSender($row['email'], "MEETING", $message, "Waktu dan Tempat Meeting 1");
        echo "<script>alert('Jadwal Meeting berhasil ditambahkan!');</script>";
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
                                                <div class="form-group">
                                                    <?php $result = $conn->query("SELECT tb_pengajuan.*, tb_jadwal_meeting.id AS id_jadwal_meeting FROM tb_pengajuan LEFT JOIN tb_jadwal_meeting ON tb_pengajuan.id=tb_jadwal_meeting.id_pengajuan WHERE tb_pengajuan.status='Disetujui'"); ?>
                                                    <label>Pilih Pengajuan</label>
                                                    <select name="id_pengajuan" class="form-control" required>
                                                        <option selected="selected" disabled value="">Pilih Pengajuan</option>
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <?php if (is_null($row['id_jadwal_meeting'])) : ?>
                                                                <option value="<?= $row['id'] ?>"><?= $row['nama_l'] ?>|<?= $row['nama_p'] ?></option>
                                                            <?php endif; ?>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="anggaran_tambahan">Tanggal Meeting 1</label>
                                                    <input type="date" class="form-control" name="tanggal_meeting_1" value="<?= Date("Y-m-d") ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="anggaran_tambahan">Waktu Meeting 1</label>
                                                    <input type="time" class="form-control" name="waktu_meeting_1" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_meeting_1">Tempat Meeting 1</label>
                                                    <input type="text" class="form-control" name="tempat_meeting_1" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="reset" class="btn btn-secondary mr-2">Reset</button>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
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
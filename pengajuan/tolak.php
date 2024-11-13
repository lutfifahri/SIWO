<?php
include_once('MailSender.php');
if (isset($_POST['submit'])) {
    $keterangan = $_POST['keterangan'] == "" ? "Pengajuan Ditolak" : $_POST['keterangan'];
    $query = "UPDATE tb_pengajuan SET keterangan='$keterangan', status='Ditolak' WHERE id=" . $_GET['id'];
    if ($conn->query($query)) {
        echo "<script>alert('Berhasil Menolak Pengajuan!');</script>";
        new MailSender($_GET['email'], "PENGAJUAN", $keterangan);
        echo "<script>window.location.href = '?page=pengajuan';</script>";
    } else {
        echo "<script>alert('Gagal Menolak Pengajuan!');</script>";
    }
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tokak Pengajuan</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card card-primary shadow">
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
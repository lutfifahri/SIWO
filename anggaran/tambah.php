<?php

if (isset($_POST['submit'])) {


    // Check file size
    if ($_FILES["detail_anggaran"]["size"] > 2000000) {
        $_SESSION['error']['detail_anggaran'] = "File Detail Anggaran Tidak Dapat Melebihi 2MB";
        echo "<script>alert('File Detail Anggaran Tidak Dapat Lebih Dari 2MB')</script>";

        $_SESSION['id_pengajuan'] = $_POST['id_pengajuan'];
        $_SESSION['anggaran_tambahan'] = $_POST['anggaran_tambahan'];
    }


    if (!isset($_SESSION['error'])) {
        unset($_SESSION['error']);

        $id_pengajuan = $_POST['id_pengajuan'];
        $anggaran_tambahan = $_POST['anggaran_tambahan'];

        $target_dir = "uploads/";

        $detail_anggaran = $target_dir . basename($_FILES["detail_anggaran"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["detail_anggaran"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["detail_anggaran"]["tmp_name"], $detail_anggaran);

        $query = "
            INSERT INTO 
                tb_anggaran (
                    id_pengajuan,
                    anggaran_tambahan,
                    detail_anggaran 
                ) VALUES (
                '$id_pengajuan',
                '$anggaran_tambahan',
                '$detail_anggaran' 
            )";
        if ($conn->query($query)) {
            echo "<script>alert('Anggaran berhasil dilakukan!');</script>";
            echo "<script>window.location.href = '?page=anggaran';</script>";
        } else echo $query . ": " . $conn->error;
    } else {
        unset($_SESSION['error']);
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center">
                    <h1>Anggaran</h1>
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
                                                    <?php $result = $conn->query("SELECT tb_pengajuan.*, tb_anggaran.id AS id_anggaran FROM tb_pengajuan LEFT JOIN tb_anggaran ON tb_pengajuan.id=tb_anggaran.id_pengajuan WHERE tb_pengajuan.status='Disetujui'"); ?>
                                                    <label>Pilih Anggaran Pengajuan</label>
                                                    <select name="id_pengajuan" class="form-control" required>
                                                        <option selected="selected" value="" disabled>Pilih Pengajuan</option>
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <?php if (is_null($row['id_anggaran'])) : ?>
                                                                <option <?= isset($_SESSION['id_pengajuan']) ? ($_SESSION['id_pengajuan'] == $row['id'] ? 'selected' : '') : '' ?> value="<?= $row['id'] ?>"><?= $row['nama_l'] ?>|<?= $row['nama_p'] ?></option>
                                                            <?php endif; ?>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="anggaran_tambahan">Anggaran Tambahan</label>
                                                    <input type="number" class="form-control" id="anggaran_tambahan" value="<?= isset($_SESSION['anggaran_tambahan']) ? $_SESSION['anggaran_tambahan'] : '' ?>" name="anggaran_tambahan" placeholder="Masukkan Anggaran Tambahan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail_anggaran">Detail Anggaran</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="detail_anggaran" name="detail_anggaran" accept=".pdf,.doc,.docx,.xlsx,.csv,.xls">
                                                            <label id="label_gambar_l" class="custom-file-label" for="detail_anggaran">Pilih Dokumen</label>
                                                        </div>
                                                    </div>
                                                    <div class="font-italic text-muted">Maksimum File 2MB</div>
                                                </div>
                                                <script>
                                                    $("#detail_anggaran").on('change', function() {
                                                        const image = $(this);
                                                        const oFReader = new FileReader();
                                                        oFReader.readAsDataURL(image[0].files[0]);
                                                        oFReader.onload = function(oFREvent) {

                                                            $("#label_gambar_l").text(image[0].files[0].name);
                                                        }
                                                    });
                                                </script>
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
<?php
unset($_SESSION['id_pengajuan']);
unset($_SESSION['anggaran_tambahan']);
?>
<script>
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
</script>
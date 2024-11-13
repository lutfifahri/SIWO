<?php

if (isset($_GET['id'])) {
    $query = "SELECT 
                tb_pengajuan.*,
                tb_anggaran.anggaran_tambahan,
                tb_anggaran.detail_anggaran,
                tb_anggaran.id AS id_anggaran    
            FROM 
                tb_anggaran 
            INNER JOIN 
                tb_pengajuan 
            ON 
                tb_pengajuan.id=tb_anggaran.id_pengajuan 
            WHERE 
                tb_anggaran.id=" . $_GET['id'];
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $id_pengajuan = $_POST['id_pengajuan'];
    $anggaran_tambahan = $_POST['anggaran_tambahan'];

    $target_dir = "uploads/";

    if ($_FILES['detail_anggaran']['error'] != 4) {
        $detail_anggaran = $target_dir . basename($_FILES["detail_anggaran"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["detail_anggaran"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["detail_anggaran"]["tmp_name"], $detail_anggaran);
    } else {
        $detail_anggaran = $row['detail_anggaran'];
    }


    $query = "
        UPDATE tb_anggaran SET
                id_pengajuan='$id_pengajuan',
                anggaran_tambahan='$anggaran_tambahan',
                detail_anggaran='$detail_anggaran' 
            WHERE id=" . $row['id_anggaran'];
    if ($conn->query($query)) {
        echo "<script>alert('Anggaran berhasil diedit!');</script>";
        echo "<script>window.location.href = '?page=anggaran';</script>";
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
                    <h1>Anggaran</h1>
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
                                                <div class="form-group">
                                                <?php $result = $conn->query("SELECT tb_pengajuan.*, tb_anggaran.id AS id_anggaran FROM tb_pengajuan LEFT JOIN tb_anggaran ON tb_pengajuan.id=tb_anggaran.id_pengajuan WHERE tb_pengajuan.status='Disetujui'"); ?>
                                                    <label>Pilih Pengajuan</label>
                                                    <select name="id_pengajuan" class="form-control select2">
                                                        <option selected value="<?= $row['id'] ?>"><?= $row['nama_l'] ?>|<?= $row['nama_p'] ?></option>
                                                        <?php while ($data = $result->fetch_assoc()) : ?>
                                                            <?php if (is_null($data['id_anggaran'])) : ?>
                                                                <option value="<?= $data['id'] ?>"><?= $data['nama_l'] ?>|<?= $data['nama_p'] ?></option>
                                                            <?php endif; ?>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="anggaran_tambahan">Anggaran Tambahan</label>
                                                    <input type="text" class="form-control" id="anggaran_tambahan" name="anggaran_tambahan" value="<?= $row['anggaran_tambahan'] ?>" placeholder="Masukkan Anggaran Tambahan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="detail_anggaran">Detail Anggaran</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="detail_anggaran" name="detail_anggaran">
                                                            <label id="label_gambar_l" class="custom-file-label" for="detail_anggaran">Pilih Dokumen</label>
                                                        </div>
                                                    </div>
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
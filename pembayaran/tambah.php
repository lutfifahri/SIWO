<?php

if (isset($_POST['submit'])) {


    // Check file size
    if ($_FILES["file_bukti_pembayaran"]["size"] > 2000000) {
        $_SESSION['error']['file_bukti_pembayaran'] = "File Detail Anggaran Tidak Dapat Melebihi 2MB";
        echo "<script>alert('File Detail Anggaran Tidak Dapat Lebih Dari 2MB')</script>";

        $_SESSION['id_bank'] = $_POST['id_bank'];
    }


    if (!isset($_SESSION['error'])) {
        unset($_SESSION['error']);

        $id_bank = $_POST['id_bank'];

        $target_dir = "uploads/";

        $file_bukti_pembayaran = $target_dir . basename($_FILES["file_bukti_pembayaran"]["name"]) . "." . strtolower(pathinfo(basename($_FILES["file_bukti_pembayaran"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["file_bukti_pembayaran"]["tmp_name"], $file_bukti_pembayaran);

        $q = "SELECT * FROM tb_pembayaran WHERE id_anggaran=" . $_GET['id'];
        $cek = $conn->query($q);
        if ($cek->num_rows) {
            $query = "
            UPDATE tb_pembayaran SET 
                id_bank='$id_bank',
                status='Menunggu Verifikasi',
                file_bukti_pembayaran='$file_bukti_pembayaran',
                tanggal='" . Date("Y-m-d H:i:s") . "',
                tanggal_verifikasi=NULL, 
                keterangan='' 
                WHERE id_anggaran=" . $_GET['id'];
        } else {
            $query = "
            INSERT INTO 
                tb_pembayaran (
                    id_anggaran,
                    id_bank,
                    status,
                    file_bukti_pembayaran 
                ) VALUES (
                '" . $_GET['id'] . "',
                '$id_bank',
                'Menunggu Verifikasi',
                '$file_bukti_pembayaran' 
            )";
        }
        if ($conn->query($query)) {
            echo "<script>alert('Pembayaran berhasil dilakukan!');</script>";
            echo "<script>window.location.href = '?page=pembayaran';</script>";
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
                    <h1>Melakukan Pembayaran</h1>
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
                                                    <?php $result = $conn->query("SELECT * FROM tb_bank"); ?>
                                                    <label>Pilih Bank</label>
                                                    <select id="id_bank" name="id_bank" class="form-control" required>
                                                        <option selected="selected" value="" disabled>Pilih Bank</option>
                                                        <?php while ($row = $result->fetch_assoc()) : ?>
                                                            <option data-atas_nama="<?= $row['atas_nama'] ?>" data-no_rek="<?= $row['no_rek'] ?>" value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="atas_nama">Atas Nama</label>
                                                    <input type="text" class="form-control" id="atas_nama" value="" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_rek">Nomor Rekening</label>
                                                    <input type="text" class="form-control" id="no_rek" value="" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="total_pembayaran">Total Pembayaran</label>
                                                    <input type="text" class="form-control" id="total_pembayaran" value="Rp. <?= number_format($_GET['total'], 0, ",", "."); ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="file_bukti_pembayaran">Upload Bukti Pembayaran</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="file_bukti_pembayaran" name="file_bukti_pembayaran" accept=".jpg,.png,.jpeg" required>
                                                            <label id="label_gambar_l" class="custom-file-label" for="file_bukti_pembayaran">Pilih Dokumen</label>
                                                        </div>
                                                    </div>
                                                    <div class="font-italic text-muted">Maksimum File 2MB</div>
                                                </div>
                                                <script>
                                                    $("#file_bukti_pembayaran").on('change', function() {
                                                        const image = $(this);
                                                        const oFReader = new FileReader();
                                                        oFReader.readAsDataURL(image[0].files[0]);
                                                        oFReader.onload = function(oFREvent) {

                                                            $("#label_gambar_l").text(image[0].files[0].name);
                                                        }
                                                    });
                                                    $("#id_bank").on('change', function() {
                                                        $("#atas_nama").val($('#id_bank').find(":selected").data('atas_nama'));
                                                        $("#no_rek").val($('#id_bank').find(":selected").data('no_rek'));
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
unset($_SESSION['id_bank']);
?>
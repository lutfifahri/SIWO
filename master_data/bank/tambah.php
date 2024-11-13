<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $atas_nama = $_POST['atas_nama'];
    $no_rek = $_POST['no_rek'];

    $query = "INSERT INTO tb_bank (nama,atas_nama,no_rek) VALUES ('$nama','$atas_nama','$no_rek')";
    if ($conn->query($query)) {
        echo "<script>alert('Data berhasil ditambahkan!');</script>";
        echo "<script>window.location.href = '?page=bank';</script>";
    } else echo $conn->error;
}

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-center">
                <div class="col-sm-6 text-center">
                    <h1>Tambah Data Bank</h1>
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
                                    <label for="nama">Nama Bank</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama bank" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="atas_nama">Atas Nama</label>
                                    <input type="text" class="form-control" id="atas_nama" placeholder="Masukkan Atas Nama" name="atas_nama">
                                </div>
                                <div class="form-group">
                                    <label for="no_rek">Nomor Rekening</label>
                                    <input type="text" class="form-control" id="no_rek" placeholder="Masukkan Nomor Rekening" name="no_rek">
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
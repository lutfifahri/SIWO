<?php


if (isset($_GET['id'])) {
    $delete_gambar = "DELETE FROM tb_gambar_produksi WHERE id_produksi=" . $_GET['id'];
    $delete = "DELETE FROM tb_produksi WHERE id=" . $_GET['id'];
    if ($conn->query($delete_gambar) and $conn->query($delete)) {
        echo "<script>alert('Data produksi berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=produksi';</script>";
    } else {
        echo $conn->error;
    }
}

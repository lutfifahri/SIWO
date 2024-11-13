<?php


if (isset($_GET['id'])) {
    $delete = "DELETE FROM tb_hasil_kerja WHERE id=" . $_GET['id'];
    if ($conn->query($delete)) {
        echo "<script>alert('Data Hasil Kerja berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=hasil_kerja';</script>";
    } else {
        echo $conn->error;
    }
}
<?php


if (isset($_GET['id'])) {
    $delete = "DELETE FROM tb_paket_wedding WHERE id=" . $_GET['id'];
    if ($conn->query($delete)) {
        echo "<script>alert('Data Paket Wedding berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=paket_wedding';</script>";
    } else {
        echo $conn->error;
    }
}
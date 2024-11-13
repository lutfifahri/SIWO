<?php


if (isset($_GET['id'])) {
    $delete_gambar = "DELETE FROM tb_gambar_konsep WHERE id_konsep=" . $_GET['id'];
    $delete = "DELETE FROM tb_konsep WHERE id=" . $_GET['id'];
    if ($conn->query($delete_gambar) and $conn->query($delete)) {
        echo "<script>alert('Data konsep berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=konsep';</script>";
    } else {
        echo $conn->error;
    }
}

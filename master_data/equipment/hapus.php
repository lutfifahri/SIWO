<?php


if (isset($_GET['id'])) {
    $delete_gambar = "DELETE FROM tb_gambar_equipment WHERE id_equipment=" . $_GET['id'];
    $delete = "DELETE FROM tb_equipment WHERE id=" . $_GET['id'];
    if ($conn->query($delete_gambar) and $conn->query($delete)) {
        echo "<script>alert('Data equipment berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=equipment';</script>";
    } else {
        echo $conn->error;
    }
}

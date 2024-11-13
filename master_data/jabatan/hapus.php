<?php


if (isset($_GET['id'])) {
    $delete = "DELETE FROM tb_jabatan WHERE id=" . $_GET['id'];
    if ($conn->query($delete)) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=jabatan';</script>";
    } else {
        echo $conn->error;
    }
}

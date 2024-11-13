<?php


if (isset($_GET['id'])) {
    $delete = "DELETE FROM tb_karyawan WHERE id=" . $_GET['id'];
    if ($conn->query($delete)) {
        echo "<script>alert('Data karyawan berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=karyawan';</script>";
    } else {
        echo $conn->error;
    }
}
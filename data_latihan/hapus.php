<?php


if (isset($_GET['id'])) {
    $delete = "DELETE FROM tb_latihan WHERE id=" . $_GET['id'];
    if ($conn->query($delete)) {
        echo "<script>alert('Data latihan berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=latihan';</script>";
    } else {
        echo $conn->error;
    }
}
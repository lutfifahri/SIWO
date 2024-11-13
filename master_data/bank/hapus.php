<?php


if (isset($_GET['id'])) {
    $delete = "DELETE FROM tb_bank WHERE id=" . $_GET['id'];
    if ($conn->query($delete)) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=bank';</script>";
    } else {
        echo $conn->error;
    }
}

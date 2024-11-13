<?php


if (isset($_GET['id'])) {
    $delete_gambar = "DELETE FROM tb_gambar_talent WHERE id_talent=" . $_GET['id'];
    $delete = "DELETE FROM tb_talent WHERE id=" . $_GET['id'];
    if ($conn->query($delete_gambar) and $conn->query($delete)) {
        echo "<script>alert('Data talent berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=talent';</script>";
    } else {
        echo $conn->error;
    }
}

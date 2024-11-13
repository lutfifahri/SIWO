<?php


if (isset($_GET['id'])) {
    if ($conn->query("DELETE FROM tb_latihan_relasi WHERE id=" . $_GET['id'])) {
        echo "<script>alert('latihan relasi berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=latihan_relasi';</script>";
    }
}

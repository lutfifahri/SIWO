<?php


if (isset($_GET['id'])) {
    if ($conn->query("DELETE FROM tb_anggaran WHERE id=" . $_GET['id'])) {
        echo "<script>alert('Anggaran berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=anggaran';</script>";
    }
}

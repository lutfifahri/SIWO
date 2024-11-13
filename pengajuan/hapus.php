<?php


if (isset($_GET['id'])) {
    if ($conn->query("DELETE FROM tb_pengajuan WHERE id=" . $_GET['id'])) {
        echo "<script>alert('Pengajuan berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=pengajuan';</script>";
    }
}

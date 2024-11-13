<?php


if (isset($_GET['id'])) {
    if ($conn->query("DELETE FROM tb_jadwal_meeting WHERE id=" . $_GET['id'])) {
        echo "<script>alert('Jadwal Meeting berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=jadwal_meeting';</script>";
    }
}

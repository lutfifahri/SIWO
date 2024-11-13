<?php


if (isset($_GET['id'])) {
    $delete = "DELETE FROM tb_caraousel WHERE id=" . $_GET['id'];
    if ($conn->query($delete)) {
        echo "<script>alert('Data caraousel berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=caraousel';</script>";
    } else {
        echo $conn->error;
    }
}
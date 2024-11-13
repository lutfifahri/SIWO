<?php


if (isset($_GET['id'])) {
    $query = "SELECT 
                tb_klien.id,
                tb_user.id AS id_user,
                tb_user.username,
                tb_user.password 
            FROM 
                tb_klien 
            INNER JOIN 
                tb_user 
            ON 
                tb_user.id=tb_klien.id_user WHERE tb_klien.id=" . $_GET['id'];
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    if ($conn->query("DELETE FROM tb_klien WHERE id=" . $_GET['id']) && $conn->query("DELETE FROM tb_user WHERE id=" . $row['id_user'])) {
        echo "<script>alert('Data akun " . $row['username'] . " berhasil dihapus!');</script>";
        echo "<script>window.location.href = '?page=klien';</script>";
    }
}

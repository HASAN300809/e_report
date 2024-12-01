<?php

include '../config.php';
$id = $_GET['id'];
$data = $koneksi->query("DELETE FROM tb_pengaduan WHERE id_pengaduan='$id'");

if ($data) {
    echo "<script>alert('Data Berhasil Dihapus');location='index.php';</script>";
}

?>
<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $tarif = $_POST['tarif'];

    $query = mysqli_query($koneksi, "UPDATE lembur SET tarif = '$tarif' WHERE id = $id");

    if ($query) {
        echo "<script>alert('Tarif lembur berhasil diperbarui'); window.location='lembur.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui tarif lembur'); history.back();</script>";
    }
}
?>

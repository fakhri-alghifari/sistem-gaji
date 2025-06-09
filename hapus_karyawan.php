<?php
include 'config/koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id = $id");

if ($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location='karyawan.php';</script>";
} else {
    // die(mysqli_error($koneksi));
    echo "<script>alert('Gagal menghapus data'); history.back();</script>";
}
?>

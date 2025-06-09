<?php
include 'config/koneksi.php';
$id = (int) $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM rating WHERE id = $id");

if ($query) {
    echo "<script>alert('Data berhasil dihapus'); window.location='rating.php';</script>";
} else {
    // die(mysqli_error($koneksi));
    echo "<script>alert('Gagal menghapus data'); history.back();</script>";
}
?>

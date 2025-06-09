<?php 
include 'config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

// Periksa apakah ID ada
if ($id) {
    // Query untuk menghapus data gaji berdasarkan ID
    $query = mysqli_query($koneksi, "DELETE FROM gaji WHERE id = $id");

    if ($query) {
        // Redirect ke halaman daftar gaji karyawan
        echo "<script>alert('Gaji karyawan berhasil dihapus'); window.location='gaji.php';</script>";
    } else {
        // Jika gagal
        echo "<script>alert('Gagal menghapus gaji karyawan'); window.location='gaji.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid!'); window.location='gaji.php';</script>";
}
?>

<?php
include 'config/koneksi.php';

// Pastikan koneksi berhasil
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Pastikan id ada dan merupakan angka
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Mengubah id menjadi integer

    // Hapus data terkait di tabel lembur
    $deleteLembur = $koneksi->prepare("DELETE FROM lembur WHERE id_jabatan = ?");
    $deleteLembur->bind_param("i", $id);
    $deleteLembur->execute();
    $deleteLembur->close();

    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt = $koneksi->prepare("DELETE FROM jabatan WHERE id = ?");
    
    // Cek apakah statement berhasil dipersiapkan
    if ($stmt === false) {
        die("Kesalahan dalam persiapan statement: " . $koneksi->error);
    }

    $stmt->bind_param("i", $id); // "i" menunjukkan bahwa parameter adalah integer

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus'); window.location='jabatan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . $stmt->error . "'); history.back();</script>";
    }

    $stmt->close(); // Menutup statement
} else {
    echo "<script>alert('ID tidak valid'); history.back();</script>";
}

$koneksi->close(); // Menutup koneksi
?>

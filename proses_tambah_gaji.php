<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_karyawan   = $_POST['id_karyawan'];
    $id_jabatan    = $_POST['id_jabatan'];
    $periode_gaji  = $_POST['periode_gaji'];
    $bonus         = $_POST['bonus'];
    $tunjangan     = $_POST['tunjangan'];
    $jam_lembur    = $_POST['jam_lembur'];

    // Ambil tarif lembur berdasarkan jabatan
    $getTarif = mysqli_query($koneksi, "SELECT tarif FROM lembur WHERE id_jabatan = $id_jabatan");
    $dataTarif = mysqli_fetch_assoc($getTarif);
    $tarif = $dataTarif ? $dataTarif['tarif'] : 0;

    // Hitung total lembur dan total gaji
    $total_lembur = $tarif * $jam_lembur;
    $total_gaji = $bonus + $tunjangan + $total_lembur;

    // Simpan ke database
    $query = mysqli_query($koneksi, "INSERT INTO gaji (id_karyawan, id_jabatan, periode_gaji, bonus, tunjangan, jam_lembur, total_lembur, total_gaji)
                                     VALUES ('$id_karyawan', '$id_jabatan', '$periode_gaji', '$bonus', '$tunjangan', '$jam_lembur', '$total_lembur', '$total_gaji')");

    if ($query) {
        echo "<script>alert('Gaji berhasil ditambahkan'); window.location='gaji.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan gaji'); history.back();</script>";
    }
}
?>

<?php
include 'config/koneksi.php';

if (isset($_POST['id_karyawan'], $_POST['id_jabatan'], $_POST['periode_gaji'], $_POST['bonus'], $_POST['tunjangan'], $_POST['jam_lembur'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $id_jabatan = $_POST['id_jabatan'];
    $periode_gaji = $_POST['periode_gaji'];
    $bonus = $_POST['bonus'];
    $tunjangan = $_POST['tunjangan'];
    $jam_lembur = $_POST['jam_lembur'];

    // Mengambil tarif lembur dari tabel lembur berdasarkan jabatan
    $tarif_lembur = mysqli_query($koneksi, "SELECT tarif FROM lembur WHERE id = $id_jabatan");
    $tarif = mysqli_fetch_assoc($tarif_lembur)['tarif'];

    // Jika tarif tidak ditemukan, set tarif lembur menjadi 0
    if (!$tarif) {
        $tarif = 0;
    }

    // Menghitung total lembur
    $total_lembur = $tarif * $jam_lembur;

    // Menghitung total gaji
    $total_gaji = $bonus + $tunjangan + $total_lembur;

    // Menyimpan data gaji ke tabel gaji
    $query = mysqli_query($koneksi, "INSERT INTO gaji (id_karyawan, id_jabatan, periode_gaji, bonus, tunjangan, jam_lembur, total_lembur, total_gaji) 
                                      VALUES ('$id_karyawan', '$id_jabatan', '$periode_gaji', '$bonus', '$tunjangan', '$jam_lembur', '$total_lembur', '$total_gaji')");

    if ($query) {
        echo "<script>alert('Gaji karyawan berhasil ditambahkan'); window.location='gaji.php';</script>";
    } else {
        echo "<script>alert('Gagal menambah gaji'); history.back();</script>";
    }
}
?>

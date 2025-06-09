<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $divisi = $_POST['divisi'];
    $alamat = $_POST['alamat'];
    $umur = $_POST['umur'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $id_jabatan = $_POST['id_jabatan'];
    $id_rating = $_POST['id_rating'];

    $query = "UPDATE karyawan SET 
                nama = '$nama',
                divisi = '$divisi',
                alamat = '$alamat',
                umur = $umur,
                jenis_kelamin = '$jenis_kelamin',
                status = '$status',
                id_jabatan = $id_jabatan,
                id_rating = $id_rating
              WHERE id = $id";

    $update = mysqli_query($koneksi, $query);

    if ($update) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='karyawan.php';</script>";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($koneksi);
    }
} else {
    echo "Akses tidak diizinkan.";
}
?>

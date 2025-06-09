<?php
include 'config/koneksi.php';

$nama          = $_POST['nama'];
$divisi        = $_POST['divisi'];
$alamat        = $_POST['alamat'];
$umur          = $_POST['umur'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status        = $_POST['status'];
$id_jabatan    = $_POST['id_jabatan'];
$id_rating     = $_POST['id_rating'];

$query = "INSERT INTO karyawan (nama, divisi, alamat, umur, jenis_kelamin, status, id_jabatan, id_rating) 
          VALUES ('$nama', '$divisi', '$alamat', '$umur', '$jenis_kelamin', '$status', '$id_jabatan', '$id_rating')";

if (mysqli_query($koneksi, $query)) {
    header("Location: karyawan.php?status=sukses");
} else {
    echo "Gagal menambahkan karyawan: " . mysqli_error($koneksi);
}
?>

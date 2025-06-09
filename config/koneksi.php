<?php
$koneksi = mysqli_connect("localhost", "root", "", "sistem-gaji");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

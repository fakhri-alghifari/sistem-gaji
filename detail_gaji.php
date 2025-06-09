<?php
include 'config/koneksi.php';
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "
    SELECT g.*, k.nama AS nama_karyawan, j.nama_jabatan 
    FROM gaji g 
    JOIN karyawan k ON g.id_karyawan = k.id 
    JOIN jabatan j ON g.id_jabatan = j.id 
    WHERE g.id = $id
"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Gaji Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 5%;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            text-align: center;
        }
        table {
            margin: 0 auto;
            width: 100%;
        }
        td {
            text-align: left;
        }
        .btn-back {
            margin-top: 20px;
            margin-right:74%;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Detail Gaji Karyawan</h2>
    <table class="table table-bordered mt-4">
        <tr><th>Nama Karyawan</th><td><?= $data['nama_karyawan'] ?></td></tr>
        <tr><th>Jabatan</th><td><?= $data['nama_jabatan'] ?></td></tr>
        <tr><th>Bonus</th><td>Rp <?= number_format($data['bonus']) ?></td></tr>
        <tr><th>Tunjangan</th><td>Rp <?= number_format($data['tunjangan']) ?></td></tr>
        <tr><th>Jam Lembur</th><td><?= $data['jam_lembur'] ?> jam</td></tr>
        <tr><th>Gaji Lembur</th><td>Rp <?= number_format($data['total_lembur']) ?></td></tr>
        <tr><th>Total Gaji</th><td><strong>Rp <?= number_format($data['total_gaji']) ?></strong></td></tr>
    </table>
    <a href="gaji.php" class="btn btn-secondary btn-sm btn-back">← Kembali ke Daftar Gaji</a>
</div>
</body>
</html>

<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Sistem Gaji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            width: 250px;
            background-color:rgb(233, 200, 55);
            color: white;
            padding: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }
        .sidebar a:hover {
            background-color: #495057;
            border-radius: 5px;
        }
        .main-content {
            flex-grow: 1;
            padding: 30px;
        }
        table {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        h1, h3 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Sistem Gaji</h3>
        <a href="index.php">Dashboard</a>
        <a href="karyawan.php">Daftar Karyawan</a>
        <a href="jabatan.php">Daftar Jabatan</a>
        <a href="rating.php">Daftar Rating</a>
        <a href="lembur.php">Tarif Lembur</a>
        <a href="gaji.php">Gaji Karyawan</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="alert alert-success text-center bg-info" role="alert">
            <marquee behavior="scroll" direction="left">👋 <strong>Selamat datang!</strong> Kamu sedang mengakses web sistem manajemen gaji karyawan.</marquee>
        </div>

        <h1>Selamat datang di PT Fakhri</h1>
        <p class="text-center">Selamat datang di Sistem Manajemen Gaji Karyawan</p>

        <h3>Karyawan Terbaru</h3>

        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Jabatan</th>
                    <th>Rating</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($koneksi, "
                    SELECT k.nama, k.divisi, k.umur, k.jenis_kelamin, k.status, 
                           j.nama_jabatan, r.nilai_rating, k.created_at
                    FROM karyawan k
                    LEFT JOIN jabatan j ON k.id_jabatan = j.id
                    LEFT JOIN rating r ON k.id_rating = r.id
                    ORDER BY k.created_at DESC
                    LIMIT 5
                ");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['divisi'] ?></td>
                    <td><?= $row['umur'] ?> Tahun</td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['nama_jabatan'] ?? '-' ?></td>
                    <td><?= $row['nilai_rating'] ?? '-' ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

         <div class="text-center text-secondary border-top">
            Created by fahri &copy; 2025
        </div>   
    </div>
    
    

</body>
</html>

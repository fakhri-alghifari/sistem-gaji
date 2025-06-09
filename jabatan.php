<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Jabatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            margin-top: 8%;
        }
        .container {
            margin: 0 auto; /* Pusatkan container */
            padding: 20px;
            text-align: center;
            max-width: 1000px; /* Atur lebar maksimum */
        }
        h2 {
            margin-bottom: 20px; /* Atur jarak bawah sesuai kebutuhan */
        }
        table {
            width: 100%; /* Tabel mengambil lebar penuh */
            margin: 0 auto; /* Pusatkan tabel */
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        /* Tombol */
        .btn-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
            margin-right:65%;
        }
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                margin-left: 0;
                padding: 10px;
            }
            table {
                width: 100%;
            }
    
        }
    </style>
</head>
<body>

    <!-- Main Content -->
    <div class="container">
    
        <h2>Daftar Jabatan</h2>

        <!-- Tabel Daftar Jabatan -->
        <div class="table-container">
            <table class="table table-bordered table-striped">
            <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $jabatan = mysqli_query($koneksi, "SELECT * FROM jabatan");
                while ($row = mysqli_fetch_assoc($jabatan)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_jabatan'] ?></td>
                    <td>Rp <?= number_format($row['gaji_pokok'], 0, ',', '.') ?></td>
                    <td>
                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                        <a href="edit_jabatan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_jabatan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        <a href="detail_jabatan.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    </div>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol Tambah Jabatan di bawah tabel -->
        <div class="d-flex flex-wrap gap-2 mb-3">
        <a href="index.php" class="btn btn-secondary btn-sm">← Kembali ke Dashboard</a>
        <a href="tambah_jabatan.php" class="btn btn-primary btn-sm">+ Tambah jabatan</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

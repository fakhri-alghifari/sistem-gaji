<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tarif Lembur</title>
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

<div class="container">
    <h2>Daftar Tarif Lembur</h2>

    <div class="table-container">
        <div class="table-responsive"><table class="table table-bordered table-striped text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Tarif (Rp)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "
                    SELECT lembur.*, jabatan.nama_jabatan 
                    FROM lembur 
                    JOIN jabatan ON lembur.id_jabatan = jabatan.id
                ");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_jabatan'] ?></td>
                    <td>Rp <?= number_format($row['tarif']) ?></td>
                    <td>
                        <a href="edit_lembur.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_lembur.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                        <a href="detail_lembur.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table></div>
    </div>

    <!-- Tombol di bawah tabel -->
    <div class="d-flex flex-wrap gap-2 mb-3">
        <a href="index.php" class="btn btn-secondary btn-sm">← Kembali ke Dashboard</a>
        <a href="tambah_lembur.php" class="btn btn-primary btn-sm">+ Tambah Tarif Lembur</a>
        </div>
</div>

</body>
</html>

<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Karyawan</title>
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
        <h2 class="mb-4">Daftar Karyawan</h2>

        <table class="table table-bordered table-striped text-center">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Divisi</th>
                    <th>Alamat</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Jabatan</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "
                    SELECT k.*, j.nama_jabatan, r.nilai_rating 
                    FROM karyawan k
                    LEFT JOIN jabatan j ON k.id_jabatan = j.id
                    LEFT JOIN rating r ON k.id_rating = r.id
                ");
                while ($row = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['divisi'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['umur'] ?> Tahun</td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['nama_jabatan'] ?? '-' ?></td>
                    <td><?= $row['nilai_rating'] ?? '-' ?></td>
                    <td>
                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                        <a href="edit_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        <a href="detail_karyawan.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    </div>
                    </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="btn-container">
        <a href="index.php" class="btn btn-secondary btn-sm">← Kembali ke Dashboard</a>
        <a href="tambah_karyawan.php" class="btn btn-primary btn-sm">+ Tambah Karyawan</a>
    </div>
</div>

</body>
</html>

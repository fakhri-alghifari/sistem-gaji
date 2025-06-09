<?php 
include 'config/koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? null;  // Jika tidak ada id, maka null

// Periksa apakah ID ada
if ($id) {
    // Ambil data jabatan berdasarkan ID
    $query = mysqli_query($koneksi, "SELECT * FROM jabatan WHERE id = $id");

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
    } else {
        echo "<script>alert('Jabatan tidak ditemukan!'); window.location='jabatan.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak valid!'); window.location='jabatan.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Jabatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Edit Jabatan</h2>

        <form method="POST" action="proses_edit_jabatan.php">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" value="<?= $data['nama_jabatan'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" value="<?= $data['gaji_pokok'] ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Jabatan</button>
            <a href="jabatan.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>
</html>

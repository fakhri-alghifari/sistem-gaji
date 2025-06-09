<?php
include 'config/koneksi.php';

// Cek apakah ID dikirim
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data dari database
    $query = mysqli_query($koneksi, "SELECT * FROM lembur WHERE id = $id");

    // Cek hasil query
    if ($query && mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
    } else {
        echo "<script>alert('Data tidak ditemukan'); window.location='lembur.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='lembur.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Tarif Lembur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">

    <h2>Edit Tarif Lembur</h2>

    <form method="POST" action="proses_edit_lembur.php">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="mb-3">
            <label for="tarif">Tarif Lembur (Rp)</label>
            <input type="number" name="tarif" id="tarif" value="<?= $data['tarif'] ?>" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan lembur</button>
            <a href="lembur.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
</body>
</html>

<?php
// Memasukkan file konfigurasi database
include 'config.php';

// Inisialisasi variabel
$id_produk = $_GET['id'] ?? '';
$nama_produk = '';
$gambar_produk = '';
$error = '';

// Ambil data produk berdasarkan ID untuk ditampilkan di konfirmasi
if (!empty($id_produk)) {
    $query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $nama_produk = $row['nama_produk'];
        $gambar_produk = $row['gambar_produk'];
    } else {
        $error = "Produk tidak ditemukan!";
    }
} else {
    $error = "ID Produk tidak valid!";
}

// Proses penghapusan data produk jika tombol "Ya, Hapus" ditekan
if (isset($_POST['confirm_delete'])) {
    // Hapus data dari database
    $query_delete = "DELETE FROM produk WHERE id_produk = '$id_produk'";
    if (mysqli_query($conn, $query_delete)) {
        // Hapus file gambar jika ada
        if (!empty($gambar_produk) && file_exists("uploads/$gambar_produk")) {
            unlink("uploads/$gambar_produk");
        }
        header("Location: admin.php?pesan=Produk berhasil dihapus");
        exit();
    } else {
        $error = "Gagal menghapus produk!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Hapus Produk</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <div class="text-center">
                <a href="admin.php" class="btn btn-secondary">Kembali</a>
            </div>
        <?php else: ?>
            <div class="card mx-auto" style="max-width: 500px;">
                <img src="uploads/<?php echo htmlspecialchars($gambar_produk); ?>" class="card-img-top" alt="Gambar Produk">
                <div class="card-body text-center">
                    <h5 class="card-title">Apakah Anda yakin ingin menghapus produk ini?</h5>
                    <p class="card-text">
                        <strong>Nama Produk:</strong> <?php echo htmlspecialchars($nama_produk); ?>
                    </p>
                    <form method="POST">
                        <!-- Tombol Konfirmasi -->
                        <button type="submit" name="confirm_delete" class="btn btn-danger">Ya, Hapus</button>
                        <a href="admin.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

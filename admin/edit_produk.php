<?php
// Memasukkan file konfigurasi database
include 'config.php';

// Inisialisasi variabel
$id_produk = $_GET['id'] ?? '';
$nama_produk = '';
$harga_produk = '';
$gambar_produk = '';
$error = '';

// Proses pengambilan data produk berdasarkan ID
if (!empty($id_produk)) {
    $query = "SELECT * FROM produk WHERE id_produk = '$id_produk'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $nama_produk = $row['nama_produk'];
        $harga_produk = $row['harga_produk'];
        $gambar_produk = $row['gambar_produk'];
    } else {
        $error = "Produk tidak ditemukan!";
    }
} else {
    $error = "ID Produk tidak valid!";
}

// Proses update data produk
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $gambar_baru = $_FILES['gambar_produk'];

    if (!empty($nama_produk) && !empty($harga_produk)) {
        // Cek apakah file gambar baru diunggah
        if ($gambar_baru['size'] > 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($gambar_baru['name']);
            move_uploaded_file($gambar_baru['tmp_name'], $target_file);

            // Update dengan gambar baru
            $query = "UPDATE produk SET nama_produk='$nama_produk', harga_produk='$harga_produk', gambar_produk='" . $gambar_baru['name'] . "' WHERE id_produk='$id_produk'";
        } else {
            // Update tanpa mengganti gambar
            $query = "UPDATE produk SET nama_produk='$nama_produk', harga_produk='$harga_produk' WHERE id_produk='$id_produk'";
        }

        if (mysqli_query($conn, $query)) {
            header("Location: admin.php");
            exit();
        } else {
            $error = "Gagal mengupdate produk!";
        }
    } else {
        $error = "Nama dan harga produk wajib diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2>Edit Produk</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" value="<?php echo htmlspecialchars($nama_produk); ?>" required>
            </div>
            <div class="mb-3">
                <label for="harga_produk" class="form-label">Harga Produk:</label>
                <input type="number" id="harga_produk" name="harga_produk" class="form-control" value="<?php echo htmlspecialchars($harga_produk); ?>" required>
            </div>
            <div class="mb-3">
                <label for="gambar_produk" class="form-label">Gambar Produk:</label>
                <?php if ($gambar_produk): ?>
                    <img src="uploads/<?php echo htmlspecialchars($gambar_produk); ?>" alt="Gambar Produk" class="img-thumbnail mb-2" style="max-width: 150px;">
                <?php endif; ?>
                <input type="file" id="gambar_produk" name="gambar_produk" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="admin.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil input dan validasi
    $nama_produk = isset($_POST['nama_produk']) ? trim($_POST['nama_produk']) : '';
    $harga_produk = isset($_POST['harga_produk']) ? (float)$_POST['harga_produk'] : 0;
    $gambar_produk = isset($_FILES['gambar_produk']) ? $_FILES['gambar_produk'] : null;

    if (empty($nama_produk) || empty($harga_produk)) {
        echo "Nama produk dan harga produk harus diisi.";
        exit;
    }

    // Validasi file gambar
    if ($gambar_produk && $gambar_produk['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
        $file_type = mime_content_type($gambar_produk['tmp_name']);

        if (in_array($file_type, $allowed_types)) {
            // Tentukan direktori upload
            $upload_dir = 'uploads/';
            $file_name = uniqid() . '_' . basename($gambar_produk['name']);
            $upload_file = $upload_dir . $file_name;

            // Pindahkan file gambar
            if (move_uploaded_file($gambar_produk['tmp_name'], $upload_file)) {
                // Simpan ke database dengan prepared statement
                $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga_produk, gambar_produk) VALUES (?, ?, ?)");
                $stmt->bind_param("sds", $nama_produk, $harga_produk, $file_name);

                if ($stmt->execute()) {
                    echo "Produk berhasil ditambahkan!";
                } else {
                    echo "Gagal menyimpan produk: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Gagal mengunggah file.";
            }
        } else {
            echo "Format gambar tidak didukung. Hanya JPEG, PNG, atau JPG.";
        }
    } else {
        echo "Harap unggah gambar produk.";
    }

    $conn->close();
}
?>

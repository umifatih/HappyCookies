<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama_produk = $_POST['nama_produk'];
    $harga_produk = $_POST['harga_produk'];
    $gambar_produk = $_FILES['gambar_produk'];

    // Validasi input
    if (empty($nama_produk) || empty($harga_produk)) {
        die("Nama produk dan harga produk harus diisi.");
    }

    // Proses unggah gambar
    if ($gambar_produk['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $file_name = uniqid() . '_' . basename($gambar_produk['name']);
        $upload_file = $upload_dir . $file_name;

        if (move_uploaded_file($gambar_produk['tmp_name'], $upload_file)) {
            // Simpan data ke database
            $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga_produk, gambar_produk) VALUES (?, ?, ?)");
            $stmt->bind_param("sds", $nama_produk, $harga_produk, $file_name);

            if ($stmt->execute()) {
                echo "Produk berhasil ditambahkan!";
            } else {
                echo "Gagal menyimpan produk: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Gagal mengunggah file gambar.";
        }
    } else {
        echo "Harap unggah file gambar.";
    }

    $conn->close();
}
?>

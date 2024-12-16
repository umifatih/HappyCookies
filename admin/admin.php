<?php 
// Memasukkan file konfigurasi atau fungsi yang diperlukan
include 'config.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kukis - Admin Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #343a40;
            padding: 15px 0;
        }

        .logo img {
            max-width: 80px;
            height: auto;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: color 0.3s;
        }

        .menu a:hover {
            color: #ffc107;
        }

        .admin h1, .admin h2 {
            color: #343a40;
        }

        .cta-button {
            background-color: #ffc107;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #e0a800;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        footer .social-media a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }

        footer .social-media a:hover {
            color: #ffc107;
        }

                /* Custom Styles untuk Card */
        .card {
            border: none; /* Hilangkan border default */
            border-radius: 15px; /* Membuat sudut card lebih melengkung */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan shadow lembut */
            transition: all 0.3s ease; /* Efek transisi lembut */
            background-color: #ffffff; /* Warna background card */
            overflow: hidden; /* Mencegah konten keluar dari card */
        }

        .card:hover {
            transform: translateY(-10px); /* Efek naik saat hover */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Shadow lebih tegas saat hover */
        }

        .card-img-top {
            border-top-left-radius: 15px; /* Sesuaikan border radius gambar */
            border-top-right-radius: 15px;
            object-fit: cover; /* Menjaga gambar agar terlihat rapi */
            height: 200px; /* Tetapkan tinggi gambar */
        }

        .card-title {
            font-weight: bold;
            font-size: 1.2rem;
            color: #343a40; /* Warna judul */
            text-transform: capitalize; /* Huruf besar setiap kata */
        }

        .card-text {
            color: #6c757d; /* Warna teks */
            font-size: 0.95rem;
        }

        .action-buttons .btn {
            font-size: 0.9rem; /* Ukuran font tombol lebih kecil */
            padding: 5px 10px; /* Padding tombol */
            border-radius: 8px; /* Sudut tombol lebih lembut */
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand logo" href="#">
                    <img src="/asset/image/logo_kukis.png" alt="Kukis">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto menu">
                        <li class="nav-item"><a class="nav-link active" href="admin.php">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="akun.php">Akun</a></li>
                        <li class="nav-item"><a class="nav-link" href="pesanan.php">Pesanan</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Admin Section -->
    <section class="admin container my-5">
    <div class="row">
        <div class="col-lg-6 mx-auto text-center">
            <h1 class="mb-4">Halaman Admin</h1>
            <h2 class="mb-4">Kelola Produk</h2>
            <form action="proses_tambah_produk.php" method="post" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk:</label>
                    <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Masukkan nama produk" required>
                </div>
                <div class="mb-3">
                    <label for="harga_produk" class="form-label">Harga Produk:</label>
                    <input type="number" id="harga_produk" name="harga_produk" class="form-control" placeholder="Masukkan harga produk" required>
                </div>
                <div class="mb-3">
                    <label for="gambar_produk" class="form-label">Gambar Produk:</label>
                    <input type="file" id="gambar_produk" name="gambar_produk" class="form-control" accept="image/*" required>
                </div>
                <button type="submit" class="cta-button">Tambah Produk</button>
            </form>
        </div>
    </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <h2 class="mb-4 text-center">Menu Produk</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    <?php
                    // Ambil data produk dari database
                    $query = "SELECT * FROM produk";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="col">';
                            echo '  <div class="card h-100">';
                            echo '      <img src="uploads/' . $row['gambar_produk'] . '" class="card-img-top" alt="' . htmlspecialchars($row['nama_produk']) . '">';
                            echo '      <div class="card-body">';
                            echo '          <h5 class="card-title">' . htmlspecialchars($row['nama_produk']) . '</h5>';
                            echo '          <p class="card-text">Rp ' . number_format($row['harga_produk'], 0, ",", ".") . '</p>';
                            echo '          <div class="action-buttons">';
                            echo '              <a href="edit_produk.php?id=' . $row['id_produk'] . '" class="btn btn-primary btn-sm">Edit</a>';
                            echo '              <a href="hapus_produk.php?id=' . $row['id_produk'] . '" class="btn btn-danger btn-sm">Hapus</a>';
                            echo '          </div>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    } 
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Kukis. Semua Hak Cipta Dilindungi.</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Facebook</a></li>
            <li class="list-inline-item"><a href="#">Instagram</a></li>
            <li class="list-inline-item"><a href="#">Twitter</a></li>
        </ul>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

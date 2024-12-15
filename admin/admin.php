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

        .card img {
            max-height: 200px;
            object-fit: cover;
        }

        .action-buttons button {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand logo" href="#">
                    <img src="asset/image/logo kukis.png" alt="Kukis">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto menu">
                        <li class="nav-item"><a class="nav-link active" href="admin.php">Admin</a></li>
                        <li class="nav-item"><a class="nav-link" href="account/profile/akun.php">Akun</a></li>
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
                <form action="#" method="post" class="bg-light p-4 rounded shadow-sm">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Nama Produk:</label>
                        <input type="text" id="product-name" name="product-name" class="form-control" placeholder="Masukkan nama produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Harga:</label>
                        <input type="number" id="product-price" name="product-price" class="form-control" placeholder="Masukkan harga produk" required>
                    </div>
                    <button type="submit" class="cta-button">Tambah Produk</button>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <h2 class="mb-4 text-center">Menu Produk</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                    <!-- Menu Items -->
                    <div class="col">
                        <div class="card h-100">
                            <img src="kukis keju.jpg" class="card-img-top" alt="Cookies Keju">
                            <div class="card-body">
                                <h5 class="card-title">Cookies Keju</h5>
                                <p class="card-text">Rp 25.000</p>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="asset/image/soft kukis.jpg" class="card-img-top" alt="Soft Cookies">
                            <div class="card-body">
                                <h5 class="card-title">Soft Cookies</h5>
                                <p class="card-text">Rp 30.000</p>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="asset/image/mini kukis.jpg" class="card-img-top" alt="Mini Cookies">
                            <div class="card-body">
                                <h5 class="card-title">Mini Cookies</h5>
                                <p class="card-text">Rp 20.000</p>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="asset/image/chocolate kukis.jpg" class="card-img-top" alt="Chocolate Chip Cookies">
                            <div class="card-body">
                                <h5 class="card-title">Chocolate Chip Cookies</h5>
                                <p class="card-text">Rp 28.000</p>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="asset/image/kukis coklat.jpg" class="card-img-top" alt="Cookies Coklat">
                            <div class="card-body">
                                <h5 class="card-title">Cookies Coklat</h5>
                                <p class="card-text">Rp 22.000</p>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="asset/image/oatmeal kukis.jpg" class="card-img-top" alt="Oatmeal Cookies">
                            <div class="card-body">
                                <h5 class="card-title">Oatmeal Cookies</h5>
                                <p class="card-text">Rp 27.000</p>
                                <div class="action-buttons">
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
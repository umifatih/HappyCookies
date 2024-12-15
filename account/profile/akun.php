<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kukis - Dashboard Akun</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Logo styling */
        .logo img {
            height: 80px;
        }

        /* Sidebar menu styling */
        .sidebar {
            background-color: #f8f9fa;
            padding: 20px;
            height: auto;
        }

        .sidebar .menu a {
            display: block;
            margin: 10px 0;
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }

        .sidebar .menu a:hover {
            color: #ff6f61;
        }

        /* Footer styling */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        footer .social-media {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        footer .social-media a {
            text-decoration: none;
            color: white;
            font-size: 14px;
            transition: color 0.3s;
        }

        footer .social-media a:hover {
            color: #ff6f61;
        }

        /* Adjust content layout */
        .content {
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                order: 1;
                text-align: center;
            }
            .content {
                order: 2;
                text-align: center;
            }

            .content .card {
                margin-top: 20px;
            }
        }

        .row.flex-nowrap {
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <aside class="col-12 col-md-3 sidebar">
                <div class="logo mb-4 text-center">
                    <img src="asset/image/logo kukis.png" alt="Kukis">
                </div>
                <nav class="menu text-center text-md-start">
                    <a href="dashboard/dashboard.php">Home</a>
                    <a href="dashboard/cart/keranjang.php">Keranjang</a>
                    <a href="dashboard/home page.php">Logout</a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="col-12 col-md-9 content">
                <h1 class="mb-4">Halaman Akun</h1>
                <div class="card shadow-sm p-3">
                    <h2>Informasi Akun</h2>
                    <a href="edit-profile.php" class="btn btn-primary">Edit Profil</a>
                </div>
            </main>
        </div>
    </div>

    <footer class="mt-4">
        <p>&copy; 2024 Kukis. Semua Hak Cipta Dilindungi.</p>
        <ul class="social-media">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Twitter</a></li>
        </ul>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

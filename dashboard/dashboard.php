<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kukis - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Reset Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        /* Header and Navigation */
        header {
            background-color: #87CEEB;
            padding: 15px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo img {
            height: 100px;
            vertical-align: middle;
        }

        nav .menu {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        nav .menu li a {
            color: black;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }

        /* Dashboard Section */
        .dashboard {
            text-align: center;
            padding: 50px 20px;
            background-color: #fff;
            margin: 20px auto;
            max-width: 1200px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dashboard h1 {
            font-size: 50px;
            color: black;
            margin-bottom: 10px;
        }

        .dashboard p {
            font-size: 20px;
            color: #666;
            margin-bottom: 30px;
        }

        /* Menu Items */
        .menu-items {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .menu-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: 280px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .menu-item h2 {
            font-size: 20px;
            color: black;
            margin-bottom: 10px;
        }

        .menu-item p {
            font-size: 18px;
            color: black;
            margin-bottom: 15px;
        }

        .cta-button {
            background-color: #87CEEB;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #1E90FF;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 40px;
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
            color: #87CEEB;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="asset/image/logo kukis.png" alt="Logo">
        </div>
        <nav>
            <ul class="menu">
                <li><a href="dashboard/dashboard.php">Home</a></li>
                <li><a href="dashboard/cart/keranjang.php">Keranjang</a></li>
                <li><a href="account/profile/akun.php">Akun</a></li>
            </ul>
        </nav>
    </header>

    <section class="dashboard">
        <h1>Dashboard Menu Kukis</h1>
        <p>Pilih menu favorit Anda dan lihat harganya.</p>

        <div class="menu-items">
            <div class="menu-item">
                <h2>Cookies Keju</h2>
                <p>Rp 25.000</p>
                <button class="cta-button">Pilih</button>
            </div>
            <div class="menu-item">
                <h2>Soft Cookies</h2>
                <p>Rp 30.000</p>
                <button class="cta-button">Pilih</button>
            </div>
            <div class="menu-item">
                <h2>Mini Cookies</h2>
                <p>Rp 20.000</p>
                <button class="cta-button">Pilih</button>
            </div>
            <div class="menu-item">
                <h2>Chocolate Chip Cookies</h2>
                <p>Rp 28.000</p>
                <button class="cta-button">Pilih</button>
            </div>
            <div class="menu-item">
                <h2>Cookies Coklat</h2>
                <p>Rp 22.000</p>
                <button class="cta-button">Pilih</button>
            </div>
            <div class="menu-item">
                <h2>Oatmeal Cookies</h2>
                <p>Rp 27.000</p>
                <button class="cta-button">Pilih</button>
            </div>
        </div>
    </section>

    <footer>
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

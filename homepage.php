<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kukis - Home Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Reset some basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #87CEEB; /* Biru muda untuk menu */
            padding: 5px 0; /* Kurangi padding untuk membuatnya lebih ramping */
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px; /* Kurangi padding di dalam nav */
        }

        nav .logo img {
            max-width: 60px; /* Perkecil logo hingga 60px */
            height: auto;
        }

        nav .menu h1 {
            font-size: 1.5em;
            color: white;
            margin: 0; /* Hilangkan margin untuk tampilan rapat */
        }

        nav .auth-menu {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antar elemen dengan properti gap */
        }

        nav .auth-menu a {
            color: white;
            text-decoration: none;
            font-size: 14px; /* Ukuran tetap kecil */
        }

        nav .auth-menu a:hover {
            text-decoration: underline;
        }

        /* Hero Section */
        .hero {
            background-color: #ffffff; /* Latar belakang putih untuk .hero */
            color: black;
            text-align: center;
            padding: 80px 20px;
        }

        .hero h1 {
            font-size: 1.6em; /* Memperkecil ukuran judul hero */
            margin-bottom: 20px;
        }

        .cta-button {
            background-color: #f6a500;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .cta-button:hover {
            background-color: #d87f00;
        }

        /* Features Section */
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 50px 20px;
            background-color: #fff;
            margin-top: 20px;
        }

        .feature {
            text-align: center;
            width: 100%; /* Default to 100% on mobile */
            margin-bottom: 20px; /* Spacing between feature blocks */
        }

        .feature img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .feature h3 {
            margin-top: 20px;
            font-size: 1.4em; /* Memperkecil ukuran judul feature */
        }

        /* Footer */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        footer .social-media {
            list-style-type: none;
            padding: 10px 0;
        }

        footer .social-media li {
            display: inline;
            margin: 0 10px;
        }

        footer .social-media li a {
            color: white;
            text-decoration: none;
        }

        /* Responsiveness for Tablet and Desktop */
        @media (min-width: 768px) {
            nav .logo img {
                max-width: 60px; /* Ukuran tetap kecil pada desktop */
            }

            nav .menu h1 {
                font-size: 1.8em; /* Ukuran font sedikit lebih besar pada desktop */
            }

            .feature {
                width: 30%; /* Tampilan 3 kolom pada tablet dan desktop */
            }

            nav .auth-menu {
                gap: 15px; /* Jarak lebih besar pada desktop */
            }

            nav .auth-menu a {
                font-size: 16px; /* Sedikit lebih besar pada desktop */
            }
        }
    </style>
    <script>
        function redirectToLogin() {
            window.location.href = "account/login/login.php";
        }

        window.onload = function() {
            const pesanSekarangButton = document.querySelector('.cta-button');
            pesanSekarangButton.addEventListener('click', function(event) {
                event.preventDefault();
                redirectToLogin();
            });
        };
    </script>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="#">
                    <img src="asset/image/logo kukis.png" alt="Kukis">
                </a>
                <div class="menu">
                    <h1>Selamat Datang di Kukis!</h1>
                </div>
                <div class="auth-menu">
                    <a href="account/login/login.php">Login</a>
                    <a href="account/register/register.php">Daftar</a>
                </div>
            </div>
        </nav>        
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Nikmati Cookies lezat, hidangan terbaik dan enak!</h1>
        <a href="account/login/login.php" class="cta-button">Pesan Sekarang</a>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="feature">
            <img src="asset/image/kukis coklat.jpg" alt="Cookies Keju">
            <h3>Cookies Keju</h3>
            <p>Paduan rasa keju yang melimpah dengan topping pilihan!</p>
        </div>
        <div class="feature">
            <img src="asset/image/soft kukis.jpg" alt="Soft Cookies">
            <h3>Soft Cookies</h3>
            <p>Cookies dengan kelembutan rasa yang lezat!</p>
        </div>
        <div class="feature">
            <img src="asset/image/mini kukis.jpg" alt="Mini Cookies">
            <h3>Mini Cookies</h3>
            <p>Cookies Mini enak untuk cemilan saat gabut!</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Kukis. Semua Hak Cipta Dilindungi.</p>
        <ul class="social-media">
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Instagram</a></li>
            <li><a href="#">Twitter</a></li>
        </ul>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

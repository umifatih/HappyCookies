<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kukis - Login</title>
    <link rel="stylesheet" href="account/login/login.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="account/login/login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="login">
        <h1>Login</h1>
        <form action="#" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
            
            <label for="password">Kata Sandi:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda" required>
            
            <button type="submit" class="cta-button">Masuk</button>
        </form>
        <p>Belum punya akun? <a href="account/register/register.php">Daftar di sini</a></p>
    </section>

    <footer>
        <p>&copy; 2024 Kukis. Semua Hak Cipta Dilindungi.</p>
    </footer>
</body>
</html>

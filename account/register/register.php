<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kukis - Daftar</title>
    <link rel="stylesheet" href="account/register/register.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="account/register/register.php">Daftar</a></li>
            </ul>
        </nav>
    </header>

    <section class="register">
        <h1>Daftar Akun</h1>
        
        <!-- Form Pendaftaran dengan Email dan Password -->
        <form id="register-form">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" minlength="8" required>

            <button type="submit">Daftar</button>
        </form>
        
        <p>Sudah punya akun? <a href="account/login/login.php">Masuk di sini</a></p>
    </section>

    <script>
        // Validasi sederhana saat form disubmit
        document.getElementById('register-form').addEventListener('submit', function (event) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            if (!name || !email || !password) {
                alert('Harap isi semua kolom dengan benar!');
                event.preventDefault(); // Mencegah form terkirim jika ada kolom kosong
            } else {
                alert('Pendaftaran berhasil! Silakan masuk.');
            }
        });
    </script>
</body>
</html>

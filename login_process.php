<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validasi input
    if (empty($username) || empty($password)) {
        echo "Username dan password harus diisi!";
        exit();
    }

    // Query untuk mencari pengguna berdasarkan username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Login berhasil, simpan data ke sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect ke dashboard
            echo "Login berhasil!";
            header("Location: dashboard.php");
            exit();
        } else {
            // Jika password salah
            echo "Password salah.";
        }
    } else {
        // Jika pengguna tidak ditemukan
        echo "Username tidak ditemukan.";
    }
}
?>

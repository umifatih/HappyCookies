<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan validasi keberadaannya
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validasi input kosong
    if (empty($id) || empty($username) || empty($email) || empty($password)) {
        echo "Semua field harus diisi!";
    } else {
        // Gunakan prepared statements untuk keamanan
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ? AND username = ? AND email = ?");
        $stmt->bind_param("sss", $id, $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password (asumsi password di database sudah di-hash)
            if (password_verify($password, $user['password'])) {
                // Login berhasil
                echo "Login berhasil!";
                header("Location: header.php");
                exit(); // Hentikan eksekusi setelah redirect
            } else {
                // Jika password salah
                echo "Password salah.";
            }
        } else {
            // Jika data tidak ditemukan
            echo "Data pengguna tidak ditemukan.";
        }
    }
}
?>

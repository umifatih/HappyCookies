<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan validasi keberadaannya
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc(); 

            // Verifikasi password (asumsi password di database sudah di-hash)
            if (password_verify($password, $user['password'])) {
                // Login berhasil
                echo "Login berhasil!";
                header("Location: dashboard.php");
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



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'];
    $email = $_POST['name'];
    $password = password_verify($_POST['name'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}


?>

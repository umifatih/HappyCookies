<?php
session_start();
include 'koneksi.php';  // Pastikan koneksi database sudah ada

// Cek apakah user sudah login, jika tidak, maka beri pesan atau arahkan ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];  // ID user yang login
    $quantity = 1;  // Default quantity

    // Ambil detail produk dari database
    $query = "SELECT * FROM produk WHERE id_produk = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if ($product) {
        $total_price = $product['harga_produk'] * $quantity;

        // Periksa apakah produk sudah ada di cart
        $query_check = "SELECT * FROM cart WHERE user_id = ? AND product_id = ?";
        $stmt_check = $conn->prepare($query_check);
        $stmt_check->bind_param("ii", $user_id, $product_id);
        $stmt_check->execute();
        $check_result = $stmt_check->get_result();

        if ($check_result->num_rows > 0) {
            // Jika produk sudah ada di cart, update jumlah dan total harga
            $query_update = "UPDATE cart SET quantity = quantity + ?, total_price = total_price + ? WHERE user_id = ? AND product_id = ?";
            $stmt_update = $conn->prepare($query_update);
            $stmt_update->bind_param("idii", $quantity, $total_price, $user_id, $product_id);
            $stmt_update->execute();
        } else {
            // Jika produk belum ada, tambahkan ke cart
            $query_insert = "INSERT INTO cart (user_id, product_id, quantity, total_price) VALUES (?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($query_insert);
            $stmt_insert->bind_param("iiid", $user_id, $product_id, $quantity, $total_price);
            $stmt_insert->execute();
        }

        // Redirect ke halaman keranjang
        header("Location: cart.php");
        exit();
    } else {
        echo "Produk tidak ditemukan!";
    }
} else {
    echo "ID produk tidak ditemukan!";
}
?>

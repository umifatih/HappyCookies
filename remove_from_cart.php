<?php
session_start();
include 'koneksi.php';  // Pastikan koneksi database sudah ada

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $cart_id = $_GET['id'];

    // Hapus produk dari cart
    $query = "DELETE FROM cart WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $cart_id, $_SESSION['user_id']);
    $stmt->execute();

    // Redirect ke halaman cart
    header("Location: cart.php");
    exit();
} else {
    echo "ID cart tidak ditemukan!";
}
?>

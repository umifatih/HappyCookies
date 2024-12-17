<?php
session_start();
include 'koneksi.php'; // Include database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Get logged-in user ID

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data safely
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $company = htmlspecialchars($_POST['company'] ?? '');
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $email = htmlspecialchars($_POST['email']);
    $address1 = htmlspecialchars($_POST['address1']);
    $address2 = htmlspecialchars($_POST['address2']);
    $city = htmlspecialchars($_POST['city']);
    $zip_code = htmlspecialchars($_POST['zip_code']);
    $order_notes = htmlspecialchars($_POST['order_notes'] ?? '');

    // Insert data into orders table
    $query = "INSERT INTO orders (user_id, first_name, last_name, company_name, phone, email, address1, address2, city, zip, order_notes) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("issssssssss", $user_id, $first_name, $last_name, $company, $phone_number, $email, $address1, $address2, $city, $zip_code, $order_notes);
        if ($stmt->execute()) {
            $_SESSION['order_id'] = $conn->insert_id; // Save order ID to session after successful insert
            echo "<script>alert('Order berhasil diproses!'); window.location.href='confirmation.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid Request.";
}
?>

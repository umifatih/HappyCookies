<?php
session_start();
include 'koneksi.php'; // File koneksi database

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id']; // Ambil user_id dari session

// Ambil data produk dari database
$query = "SELECT c.*, p.nama_produk, p.gambar_produk, p.harga_produk
          FROM cart c
          JOIN produk p ON c.product_id = p.id_produk
          WHERE c.user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo kukis.png"/>
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Happy Cookies</title>

    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <!-- Start Header Area -->
    <?php include 'header.php'; ?>
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.php">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Baris Produk dari Database -->
                            <?php
                            // Cek apakah produk ada
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $product_id = $row['product_id'];
                                    $product_name = $row['nama_produk'];
                                    $product_price = $row['harga_produk'];
                                    $product_image = $row['gambar_produk'];
                                    $quantity = $row['quantity'];
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="admin/uploads/<?= $product_image ?>" alt="<?= $product_name ?>" width="75px">
                                                </div>
                                                <div class="media-body">
                                                    <p><?= $product_name ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="price"><?= number_format($product_price, 0, ',', '.') ?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                            <input type="number" class="qty-input" min="1" value="<?= $quantity ?>" data-product-id="<?= $product_id ?>" data-product-price="<?= $product_price ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="total-price"><?= number_format($product_price, 0, ',', '.') ?></h5>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Fungsi untuk menghitung total di setiap baris
        function updateTotal() {
            const rows = document.querySelectorAll("tbody tr"); // Ambil semua baris
            let subtotal = 0; // Untuk menyimpan total keseluruhan

            rows.forEach(row => {
                const priceElement = row.querySelector(".price");
                const qtyInput = row.querySelector(".qty-input");
                const totalElement = row.querySelector(".total-price");

                // Ambil nilai harga dan jumlah
                const price = parseFloat(priceElement.innerText.replace(".", "").replace(",", ".")); // Format untuk harga
                const qty = parseInt(qtyInput.value);

                // Hitung total harga untuk baris ini
                const total = price * qty;
                totalElement.innerText = `${total.toFixed(0).replace(".", ",")}`; // Menampilkan dengan format angka

                subtotal += total; // Tambahkan ke subtotal
            });

            // Update subtotal di bawah tabel
            document.getElementById("subtotal").innerText = `${subtotal.toFixed(0).replace(".", ",")}`;
        }

        // Tambahkan event listener ke input jumlah
        document.querySelectorAll(".qty-input").forEach(input => {
            input.addEventListener("input", updateTotal);
        });

        // Inisialisasi hitung total saat halaman pertama kali dimuat
        document.addEventListener("DOMContentLoaded", updateTotal);
    </script>

    <!-- Subtotal -->
    <div style="text-align: right; margin-top: 20px;">
        <h5>Subtotal: <span id="subtotal">0</span></h5>
    </div>

    <tr>
        <td>
            <div class="cupon_text d-flex align-items-center">
                <input type="text" placeholder="Coupon Code">
                <a class="primary-btn" href="#">Apply</a>
                <a class="gray_btn" href="#">Close Coupon</a>
            </div>
        </td>
    </tr>
    <tr class="out_button_area">
        <td></td>
        <td></td>
        <td></td>
        <td>
            <div class="checkout_btn_inner d-flex align-items-center">
                <a class="gray_btn" href="category.php">Continue Shopping</a>
                <a class="primary-btn" href="checkout.php">Proceed to checkout</a>
            </div>
        </td>
    </tr>

    <!-- start footer Area -->
    <?php include 'footer.php'; ?>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

<?php
include 'config.php'; // Include the database connection

// Query to fetch products from the database
$sql = "SELECT id_produk, nama_produk, harga_produk, gambar_produk FROM produk"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta charset="UTF-8">
    <title>Happy Cookies - Keranjang Belanja</title>
    
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    
    <!-- Meta Description -->
    <meta name="description" content="">
    
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    
    <!-- meta character set -->
    <meta charset="UTF-8">
    
    <!-- CSS -->
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
    <?php include 'header.php'; ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Keranjang Belanja</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.php">Keranjang</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <form action="konfirmasi_pesanan.php" method="POST">
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
                                <?php while($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="img/<?= $row['gambar_produk']; ?>" alt="<?= $row['nama_produk']; ?>" style="max-width: 100px;">
                                                </div>
                                                <div class="media-body">
                                                    <p><?= $row['nama_produk']; ?></p>
                                                    <input type="hidden" name="produk[]" value="<?= $row['nama_produk']; ?>">
                                                    <input type="hidden" name="harga[]" value="<?= $row['harga_produk']; ?>">
                                                    <input type="hidden" name="gambar[]" value="<?= $row['gambar_produk']; ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="price">Rp <?= number_format($row['harga_produk'], 0, ',', '.'); ?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input type="number" class="qty-input form-control" name="qty[]" min="0" max="10" value="0">
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="total-price">0</h5>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Coupon Area -->
                <div class="cupon_area d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Kode Kupon">
                                    <a class="primary-btn" href="#">Terapkan</a>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="cart_total">
                                    <div class="cart_total_inner">
                                        <h4>Total Keranjang</h4>
                                        <p>Subtotal: <span id="subtotal">Rp 0</span></p>
                                        <input type="hidden" name="subtotal" id="subtotal-hidden" value="0">
                                        <!-- Optional: Tambahkan biaya pengiriman jika diperlukan -->
                                        <p>Pengiriman: <span>Rp 0</span></p>
                                        <h5>Total: <span id="grand-total">Rp 0</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Checkout Button -->
                <div class="checkout_btn_inner d-flex align-items-center justify-content-end">
                    <a href="index.php" class="gray_btn">Lanjut Belanja</a>
                    <button type="submit" class="primary-btn ml-2">Lanjut ke Pembayaran</button>
                </div>
            </div>
        </section>
    </form>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
    <?php include 'footer.php'; ?>
    <!-- End footer Area -->

    <!-- JS Files -->
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    
    <script>
        function updateTotal() {
            const rows = document.querySelectorAll("tbody tr");
            let subtotal = 0;

            rows.forEach(row => {
                const priceElement = row.querySelector(".price");
                const qtyInput = row.querySelector(".qty-input");
                const totalElement = row.querySelector(".total-price");

                // Remove 'Rp ' and '.' from price string and convert to number
                const price = parseFloat(priceElement.innerText.replace('Rp ', '').replace(/\./g, ''));
                const qty = parseInt(qtyInput.value);

                const total = price * qty;
                totalElement.innerText = 'Rp ' + total.toLocaleString('id-ID');

                subtotal += total;
            });

            document.getElementById("subtotal").innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
            document.getElementById("grand-total").innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
            document.getElementById("subtotal-hidden").value = subtotal; 
        }

        document.querySelectorAll(".qty-input").forEach(input => {
            input.addEventListener("input", updateTotal);
        });

        document.addEventListener("DOMContentLoaded", updateTotal);
    </script>

    <script src="js/main.js"></script>


                            <!-- Subtotal -->
                            <div style="text-align: right; margin-top: 20px;">
                                <h5>Subtotal: <span id="subtotal">0</span></h5>
                            </div>
                            
                            <div style="text-align: right; margin-top: 10px;">
                                <a href="konfirmasi_pesanan.php">
                                    <button style="background-color: #28a745; color: white; border: none; padding: 10px 20px; cursor: pointer;">
                                        Checkout
                                    </button>
                                </a>
                            </div>

                                    <!-- <td>
                                        <div class="cupon_text d-flex align-items-center">
                                            <input type="text" placeholder="Coupon Code">
                                            <a class="primary-btn" href="#">Apply</a>
                                            <a class="gray_btn" href="#">Close Coupon</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>0</h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Shipping</h5>
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <ul class="list">
                                                <li><a href="#">Flat Rate: $5.00</a></li>
                                                <li><a href="#">Free Shipping</a></li>
                                                <li><a href="#">Flat Rate: $10.00</a></li>
                                                <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                            </ul>
                                            <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
                                            <select class="shipping_select">
                                                <option value="1">Bangladesh</option>
                                                <option value="2">India</option>
                                                <option value="4">Pakistan</option>
                                            </select>
                                            <select class="shipping_select">
                                                <option value="1">Select a State</option>
                                                <option value="2">Select a State</option>
                                                <option value="4">Select a State</option>
                                            </select>
                                            <input type="text" placeholder="Postcode/Zipcode">
                                            <a class="gray_btn" href="#">Update Details</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="#">Continue Shopping</a>
                                            <a class="primary-btn" href="#">Proceed to checkout</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section> -->
    <!--================End Cart Area =================-->

    

</body>

</html>
<?php
$conn->close(); // Close the database connection
?>
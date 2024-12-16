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
    <<title>Happy Cookies</title>

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
                                                    <!-- Baris Produk -->
                                                    <tr>
                                                        <td>
                                                            <div class="media">
                                                                <div class="d-flex">
                                                                    <img src="img/cart.jpg" alt="">
                                                                </div>
                                                                <div class="media-body">
                                                                    <p>Minimalistic shop for multipurpose use</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="price">25.000</h5>
                                                        </td>
                                                        <td>
                                                            <div class="product_count">
                                                                <input type="number" class="qty-input" min="0" value="0">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="total-price">0</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="media">
                                                                <div class="d-flex">
                                                                    <img src="img/cart.jpg" alt="">
                                                                </div>
                                                                <div class="media-body">
                                                                    <p>Minimalistic shop for multipurpose use</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="price">25.000</h5>
                                                        </td>
                                                        <td>
                                                            <div class="product_count">
                                                                <input type="number" class="qty-input" min="0" value="0">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="total-price">0</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="media">
                                                                <div class="d-flex">
                                                                    <img src="img/cart.jpg" alt="">
                                                                </div>
                                                                <div class="media-body">
                                                                    <p>Minimalistic shop for multipurpose use</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="price">25.000</h5>
                                                        </td>
                                                        <td>
                                                            <div class="product_count">
                                                                <input type="number" class="qty-input" min="0" value="0">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h5 class="total-price">0</h5>
                                                        </td>
                                                    </tr>
                                                    <!-- Tambahkan baris lain sesuai kebutuhan -->
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
                                        const price = parseFloat(priceElement.innerText.replace("$", ""));
                                        const qty = parseInt(qtyInput.value);

                                        // Hitung total harga untuk baris ini
                                        const total = price * qty;
                                        totalElement.innerText = `${total.toFixed(3)}`;

                                        subtotal += total; // Tambahkan ke subtotal
                                    });

                                    // Update subtotal di bawah tabel
                                    document.getElementById("subtotal").innerText = `${subtotal.toFixed(3)}`;
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

                                <td>
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
    </section>
    <!--================End Cart Area =================-->

    <!-- start footer Area -->
     <?php include 'footer.php'; ?>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
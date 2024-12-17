<?php
// Mulai sesi
session_start();

include 'koneksi.php';

// Ambil order_id dari session atau parameter
if (isset($_SESSION['order_id'])) {
    $order_id = $_SESSION['order_id'];
} else {
    die("Order not found. Please try again.");
}

// Ambil data order berdasarkan order_id
$query = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

// Ambil detail order (produk) dengan join produk
$query_items = "
    SELECT oi.*, p.nama_produk, p.harga_produk, p.gambar_produk
    FROM order_items oi
    JOIN produk p ON oi.product_id = p.id_produk
    WHERE oi.order_id = ?";

$stmt_items = $conn->prepare($query_items);
$stmt_items->bind_param("i", $order_id);
$stmt_items->execute();
$order_items = $stmt_items->get_result();
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
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
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
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.php">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Thank you. Your order has been received.</h3>
			<div class="row order_d_inner">
			<div class="col-lg-4">
    <div class="details_item">
        <h4>Order Info</h4>
        <ul class="list">
            <li><span>Order number</span> : <?php echo $order['id']; ?></li>
            <li><span>Date</span> : <?php echo date("d M Y", strtotime($order['created_at'])); ?></li>
            <li><span>Total</span> : $<?php echo number_format($order['total'], 2); ?></li>
            <li><span>Payment method</span> : <?php echo $order['payment_method']; ?></li>
        </ul>
    </div>
</div>

<div class="col-lg-4">
    <div class="details_item">
        <h4>Billing Address</h4>
        <ul class="list">
            <li><span>Street</span> : <?php echo $order['address1']; ?></li>
            <li><span>City</span> : <?php echo $order['city']; ?></li>
            <li><span>Country</span> : <?php echo $order['country']; ?></li>
            <li><span>Postcode</span> : <?php echo $order['zip_code']; ?></li>
        </ul>
    </div>
</div>

				<div class="col-lg-4">
					<div class="details_item">
						<h4>Shipping Address</h4>
						<ul class="list">
							<li><a href="#"><span>Street</span> : 56/8</a></li>
							<li><a href="#"><span>City</span> : Los Angeles</a></li>
							<li><a href="#"><span>Country</span> : United States</a></li>
							<li><a href="#"><span>Postcode </span> : 36952</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $subtotal = 0;
            while ($item = $order_items->fetch_assoc()): 
                $total_item = $item['price'] * $item['quantity'];
                $subtotal += $total_item;
            ?>
            <tr>
                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                <td>x <?php echo $item['quantity']; ?></td>
                <td>$<?php echo number_format($total_item, 2); ?></td>
            </tr>
            <?php endwhile; ?>
            <tr>
                <td><h4>Subtotal</h4></td>
                <td></td>
                <td>$<?php echo number_format($subtotal, 2); ?></td>
            </tr>
            <tr>
                <td><h4>Shipping</h4></td>
                <td></td>
                <td>Flat rate: $<?php echo number_format($order['shipping_fee'], 2); ?></td>
            </tr>
            <tr>
                <td><h4>Total</h4></td>
                <td></td>
                <td>$<?php echo number_format($order['total'], 2); ?></td>
            </tr>
        </tbody>
    </table>
</div>

			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->

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
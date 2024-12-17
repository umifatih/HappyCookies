<?php
session_start();
include 'koneksi.php'; // File koneksi database

// Pastikan user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil data produk dari database
$query = "SELECT nama_produk, harga_produk, gambar_produk FROM produk";
$result = $conn->query($query);
?>


<!DOCTYPE html>
<html lang="zxx" class="no-js">
  <head>
    <!-- Mobile Specific Meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/logo kukis.png" />
    <!-- Author Meta -->
    <meta name="author" content="CodePixar" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Happy Cookies</title>
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="css/linearicons.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/nouislider.min.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/main.css" />
  </head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo kukis.png" alt="logo" width="70px" height="auto"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Shop</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.php">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.php">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.php">Confirmation</a></li>
								</ul>
							</li>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Pages</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="registration.php">Register</a></li>
								</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

    <!-- start banner Area -->
    <section class="banner-area">
      <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
          <div class="col-lg-12">
            <div class="active-banner-slider owl-carousel">
              <!-- single-slide -->
              <div class="row single-slide align-items-center d-flex">
                <div class="col-lg-5 col-md-6">
                  <div class="banner-content">
                    <h1>Soft Cookies <br />Coklat</h1>
                    <p>
                    Rasakan kelezatan cookies coklat yang renyah di luar, lembut di dalam, dengan taburan coklat premium yang lumer di setiap gigitan. Dibuat dengan bahan-bahan pilihan dan cinta, cookies ini cocok untuk teman santai, hadiah spesial, atau camilan keluarga.
                    </p>
                    <div class="add-bag d-flex align-items-center"></div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="banner-img">
                    <img
                      class="img-fluid"
                      src="img/banner/cookies.png"
                      alt="banner" width="65px" height="auto"
                    />
                  </div>
                </div>
              </div>
               <div class="banner-content">              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End banner Area -->

    <!-- start features Area -->
    <section class="features-area section_gap">
      <div class="container">
        <div class="row features-inner">
          <!-- single features -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-features">
              <div class="f-icon">
                <img src="img/features/f-icon1.png" alt="" />
              </div>
              <h6>Gratis Ongkir</h6>
              <p>Gratis untuk setiap pemesanan</p>
            </div>
          </div>
          <!-- single features -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-features">
              <div class="f-icon">
                <img src="img/features/f-icon2.png" alt="" />
              </div>
              <h6>Garansi Produk</h6>
              <p>Gratis untuk setiap pemesanan</p>
            </div>
          </div>
          <!-- single features -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-features">
              <div class="f-icon">
                <img src="img/features/f-icon3.png" alt="" />
              </div>
              <h6>Dukungan 24/7</h6>
              <p>Gratis untuk setiap pemesanan</p>
            </div>
          </div>
          <!-- single features -->
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-features">
              <div class="f-icon">
                <img src="img/features/f-icon4.png" alt="" />
              </div>
              <h6>Pembayaran Mudah</h6>
              <p>Gratis untuk setiap pemesanan</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end features Area -->

    <!-- Start category Area -->
    <section class="category-area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-12">
        <div class="row">
          <!-- Gambar 1 -->
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="single-deal">
              <div class="overlay"></div>
              <img
                class="img-fluid uniform-img"
                src="img/category/cookies1.jpeg"
                alt="Delicious Chocolate Cookies"
              />
              <a href="img/category/cookies1.jpeg" class="img-pop-up" target="_blank">
                <div class="deal-details">
                  <h6 class="deal-title">Delicious Chocolate Cookies</h6>
                </div>
              </a>
            </div>
          </div>
          <!-- Gambar 2 -->
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="single-deal">
              <div class="overlay"></div>
              <img
                class="img-fluid uniform-img"
                src="img/category/cookies2.jpeg"
                alt="Freshly Baked Cookies"
              />
              <a href="img/category/cookies2.jpeg" class="img-pop-up" target="_blank">
                <div class="deal-details">
                  <h6 class="deal-title">Freshly Baked Cookies</h6>
                </div>
              </a>
            </div>
          </div>
          <!-- Gambar 3 -->
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="single-deal">
              <div class="overlay"></div>
              <img
                class="img-fluid uniform-img"
                src="img/category/cookies3.jpeg"
                alt="Red Velvet Cookies"
              />
              <a href="img/category/cookies3.jpeg" class="img-pop-up" target="_blank">
                <div class="deal-details">
                  <h6 class="deal-title">Red Velvet Cookies</h6>
                </div>
              </a>
            </div>
          </div>
          <!-- Gambar 4 -->
          <div class="col-lg-6 col-md-6 mb-4">
            <div class="single-deal">
              <div class="overlay"></div>
              <img
                class="img-fluid uniform-img"
                src="img/category/cookies4.jpeg"
                alt="Double Chocolate Delight"
              />
              <a href="img/category/cookies4.jpeg" class="img-pop-up" target="_blank">
                <div class="deal-details">
                  <h6 class="deal-title">Double Chocolate Delight</h6>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- Cookies 7 -->
      <div class="col-lg-4 col-md-10">
        <div class="single-deal">
          <div class="overlay"></div>
          <img
            class="img-fluid category-img"
            src="img/category/cookies7.jpeg"
            alt="Classic Chocolate Chip Cookies"
          />
          <a href="img/category/cookies7.jpeg" class="img-pop-up" target="_blank">
            <div class="deal-details">
              <h6 class="deal-title">Classic Chocolate Chip Cookies</h6>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- End category Area -->

    <!-- start product Area -->
    <section class="owl-carousel active-product-area section_gap">
      <!-- single product slide -->
      <div class="single-product-slider">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-title">
                <h1>Produk Terbaru</h1>
                <p>
                Dibuat dari bahan berkualitas, cookies ini renyah di luar, lembut di dalam. Hadir dalam berbagai rasa yang siap memanjakan lidah Anda!
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="img/product/p1.jpeg" alt="" />
                <div class="product-details">
                  <h6>Choconut Blast</h6>
                  <div class="price">
                    <h6>Rp 12000</h6>
                    <h6 class="l-through">Rp 20000</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="cart.php" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>             
                  </div>
                </div>
              </div>
            </div>
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="img/product/p2.jpeg" alt="" />
                <div class="product-details">
                <h6>Choco Prosoerity</h6>
                  <div class="price">
                    <h6>Rp 12000</h6>
                    <h6 class="l-through">Rp 20000</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="cart.php" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="img/product/p3.jpeg" alt="" />
                <div class="product-details">
                  <h6>chocochip OG</h6>
                  <div class="price">
                    <h6>Rp 12000</h6>
                    <h6 class="l-through">Rp 20000</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="cart.php" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="img/product/p4.jpeg" alt="" />
                <div class="product-details">
                <h6>Cream Cheese Red Velvet</h6>
                  <div class="price">
                    <h6>Rp 12000</h6>
                    <h6 class="l-through">Rp 20000</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="cart.php" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>

      <!-- single product slide -->
      <div class="single-product-slider">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-title">
                <h1>Produk Terbaru</h1>
                <p>
                Cookies spesial dengan rasa gurih dan aroma menggoda, cocok untuk camilan harian atau hadiah istimewa.
                </p>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="img/product/p5.jpeg" alt="" />
                <div class="product-details">
                <h6>Birthday Caramel</h6>
                  <div class="price">
                    <h6>Rp 12000</h6>
                    <h6 class="l-through">Rp 20000</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="cart.php" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="img/product/p1.jpeg" alt="" />
                <div class="product-details">
                <h6>Cookies Coklat</h6>
                  <div class="price">
                    <h6>Rp 12000</h6>
                    <h6 class="l-through">Rp 20000</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="cart.php" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="img/product/p2.jpeg" alt="" />
                <div class="product-details">
                <h6>Chocolate Melted</h6>
                  <div class="price">
                    <h6>Rp 12000</h6>
                    <h6 class="l-through">Rp 20000</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="cart.php" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- single product -->
            <div class="col-lg-3 col-md-6">
              <div class="single-product">
                <img class="img-fluid" src="img/product/p4.jpeg" alt="" />
                <div class="product-details">
                <h6>Cream Cheese</h6>
                  <div class="price">
                    <h6>Rp 12000</h6>
                    <h6 class="l-through">Rp 20000</h6>
                  </div>
                  <div class="prd-bottom">
                    <a href="cart.php" class="social-info">
                      <span class="ti-bag"></span>
                      <p class="hover-text">add to bag</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
           
          </div>
        </div>
      </div>
    </section>
    <!-- end product Area -->

    <!-- Start exclusive deal Area -->
    <section class="exclusive-deal-area">
      <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-6 no-padding exclusive-left">
            <div class="row clock_sec clockdiv" id="clockdiv">
              <div class="col-lg-12">
                <h1>Penawaran Menarik akan Berakhir</h1>
                <p>Rasakan kelezatan cookies lembut sekarang</p>
              </div>
              <div class="col-lg-12">
                <div class="row clock-wrap">
                  <div class="col clockinner1 clockinner">
                    <h1 class="days">150</h1>
                    <span class="smalltext">Days</span>
                  </div>
                  <div class="col clockinner clockinner1">
                    <h1 class="hours">23</h1>
                    <span class="smalltext">Hours</span>
                  </div>
                  <div class="col clockinner clockinner1">
                    <h1 class="minutes">47</h1>
                    <span class="smalltext">Mins</span>
                  </div>
                  <div class="col clockinner clockinner1">
                    <h1 class="seconds">59</h1>
                    <span class="smalltext">Secs</span>
                  </div>
                </div>
              </div>
            </div>
            <a href="cart.php" class="primary-btn">Shop Now</a>
          </div>
          <div class="col-lg-6 no-padding exclusive-right">
            <div class="active-exclusive-product-slider">
              <!-- single exclusive carousel -->
              <div class="single-exclusive-slider">
                <img class="img-fluid" src="img/product/cookies1.png" alt="" />
                <div class="product-details">
                  <div class="price">
                    <h6>Rp 15.000</h6>
                    <h6 class="l-through">Rp 20.000</h6>
                  </div>
                  <h4>Cookies Monster</h4>
                  <div
                    class="add-bag d-flex align-items-center justify-content-center"
                  >
                    <a class="add-btn" href="cart.php"><span class="ti-bag"></span></a>
                    <span class="add-text text-uppercase">Add to Bag</span>
                  </div>
                </div>
              </div>
              <!-- single exclusive carousel -->
              <div class="single-exclusive-slider">
                <img class="img-fluid" src="img/product/cookies2.png" alt="" />
                <div class="product-details">
                  <div class="price">
                  <h6>Rp 15.000</h6>
                    <h6 class="l-through">Rp 20.000</h6>
                  </div>
                  <h4>Original Cookies</h4>
                  <div
                    class="add-bag d-flex align-items-center justify-content-center"
                  >
                    <a class="add-btn" href="cart.php"><span class="ti-bag"></span></a>
                    <span class="add-text text-uppercase">Add to Bag</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End exclusive deal Area -->

    <!-- Start related-product Area -->
    <section id="reviews" class="section-padding bg-light">
  <div class="container">
    <!-- Judul Section -->
    <div class="row">
      <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="150">
        <div class="section-title">
          <h1 class="display-4 fw-semibold">Testimonials</h1>
          <div class="line"></div>
          <p>Kami berkomitmen memberikan Cookies terbaik yang diakui oleh pelanggan setia kami</p>
        </div>
      </div>
    </div>

    <!-- Kolom Testimonial -->
    <div class="row gy-5 gx-4">
      <!-- Testimonial 1 -->
      <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="150">
        <div class="review">
          <div class="review-head p-4 bg-white theme-shadow">
            <div class="text-warning">
            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
              
            </div>
            <p>Cookies-nya benar-benar enak! Tekstur renyah dan rasanya pas di lidah. Sempurna untuk camilan sore hari.</p>
          </div>
          <div class="review-person mt-4 d-flex align-items-center">
            <div class="ms-3">
              <h5>Farah Nur Fauziyyah</h5>
              <small>Baker</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Testimonial 2 -->
      <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="250">
        <div class="review">
          <div class="review-head p-4 bg-white theme-shadow">
            <div class="text-warning">
            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
            </div>
            <p>Rasanya bikin nagih! Cookies ini cocok untuk menemani kerja atau santai di rumah. Top banget!</p>
          </div>
          <div class="review-person mt-4 d-flex align-items-center">
            <div class="ms-3">
              <h5>Haruto Watanabe</h5>
              <small>Pegawai</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Testimonial 3 -->
      <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="350">
        <div class="review">
          <div class="review-head p-4 bg-white theme-shadow">
            <div class="text-warning">
            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
            </div>
            <p>Cookies lembut dengan aroma menggoda. Anak-anak saya sangat menyukainya. Pasti pesan lagi!</p>
          </div>
          <div class="review-person mt-4 d-flex align-items-center">
            <div class="ms-3">
              <h5>Zulfika Ajrun</h5>
              <small>Full Stack Developer</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Testimonial 4 -->
      <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="450">
        <div class="review">
          <div class="review-head p-4 bg-white theme-shadow">
            <div class="text-warning">
            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
            </div>
            <p>Varian rasanya unik dan semuanya lezat. Sangat cocok jadi hadiah spesial untuk orang tersayang.</p>
          </div>
          <div class="review-person mt-4 d-flex align-items-center">
            <div class="ms-3">
              <h5>Alya Maura Maharani</h5>
              <small>AI Developer</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Testimonial 5 -->
      <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="550">
        <div class="review">
          <div class="review-head p-4 bg-white theme-shadow">
            <div class="text-warning">
            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
            </div>
            <p>Kualitas cookies premium! Rasa manisnya pas, ditambah kemasan cantik yang menarik. Highly recommended!</p>
          </div>
          <div class="review-person mt-4 d-flex align-items-center">
            <div class="ms-3">
              <h5>Amin Triana</h5>
              <small>Desainer</small>
            </div>
          </div>
        </div>
      </div>

      <!-- Testimonial 6 -->
      <div class="col-lg-4 col-sm-6" data-aos="fade-down" data-aos-delay="650">
        <div class="review">
          <div class="review-head p-4 bg-white theme-shadow">
            <div class="text-warning">
            <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
            </div>
            <p>Cookies ini sempurna! Renyah di luar, lembut di dalam. Cocok jadi teman ngopi di pagi hari.</p>
          </div>
          <div class="review-person mt-4 d-flex align-items-center">
            
            <div class="ms-3">
              <h5>Arion Adiwangsa</h5>
              <small>Orang Tua</small>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

    <!-- End related-product Area -->

    <!-- start footer Area -->
    <footer class="footer-area section_gap">
  <div class="container">
    <div class="row">
      <!-- About Us (di kiri) -->
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>About Us</h6>
          <div class="line mb-3"></div>
          <p>
          Kami adalah produsen cookies berkualitas premium yang dibuat dengan bahan-bahan pilihan dan resep terbaik. Setiap gigitan memberikan cita rasa lezat yang sempurna, cocok untuk menemani momen spesial Anda. 
          </p>
        </div>
      </div>

      <!-- Contact (di tengah) -->
      <div class="col-lg-6 col-md-6 col-sm-6 text-center">
        <div class="single-footer-widget">
          <h6>Contact</h6>
          <div class="line mb-3 mx-auto"></div>
          <ul class="list-unstyled">
            <li>Cilacap, IDN 53213</li>
            <li>(+62) 856 0177 8422</li>
            <li>234110601047@mhs.uinsaizu.ac.id</li>
          </ul>
        </div>
      </div>

      <!-- Follow Us (di kanan) -->
      <div class="col-lg-3 col-md-6 col-sm-6 text-end">
        <div class="single-footer-widget">
          <h6>Follow Us</h6>
          <div class="line mb-3 ms-auto"></div>
          <p>Ikuti Kami untuk Pengalman lebih baik</p>
          <div class="footer-social d-flex justify-content-end align-items-center">
            <a href="https://www.instagram.com/thsarchive"><i class="fa fa-instagram"></i></a>
            <a href="https://github.com/umifatih"><i class="fa fa-github"></i></a>
            <a href="https://www.linkedin.com/in/umi-fatihaturrohmah-9a1ba9270/"><i class="fa fa-linkedin"></i></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
      <p class="footer-text m-0">
        
        Copyright &copy;
        <script>
          document.write(new Date().getFullYear());
        </script>
        All rights reserved by HappyCookies
      </p>
    </div>
  </div>
</footer>



    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
      integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
      crossorigin="anonymous"
    ></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

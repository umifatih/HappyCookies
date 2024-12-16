<?php 
    // Mendapatkan nama file halaman saat ini
    $current_page = basename($_SERVER['PHP_SELF']);
?>
<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand logo_h" href="index.php">
                    <img src="img/logo kukis.png" alt="logo" width="70px" height="auto">
                </a>
                <!-- Toggle Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Navbar Menu -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item <?= ($current_page == 'category.php') ? 'active' : '' ?>">
                            <a class="nav-link" href="category.php">Shop Category</a>
                        </li>
                        <li class="nav-item <?= ($current_page == 'checkout.php') ? 'active' : '' ?>">
                            <a class="nav-link" href="checkout.php">Product Checkout</a>
                        </li>
                        <li class="nav-item <?= ($current_page == 'cart.php') ? 'active' : '' ?>">
                            <a class="nav-link" href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="nav-item <?= ($current_page == 'contact.php') ? 'active' : '' ?>">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

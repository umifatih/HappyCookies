<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kukis - Keranjang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Logo styling */
        .logo img {
            height: 100px;
        }

        /* Menu item styling */
        .menu-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .menu-item h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .menu-item p {
            margin-bottom: 15px;
        }

        .menu-item button {
            width: 100%;
        }

        /* Pop-up styling */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 1040;
        }

        .keranjang-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 1050;
            display: none;
        }

        .keranjang-popup.show {
            display: block;
        }

        .overlay.show {
            display: block;
        }
    </style>
</head>
<body>
    <header class="p-3 bg-light border-bottom">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <img src="asset/image/logo kukis.png" alt="Kukis">
            </div>
            <!-- Tombol Kembali ke Dashboard -->
            <a href="dashboard/dashboard.php" class="btn btn-outline-primary">Kembali ke Dashboard</a>
        </div>
    </header>

    <section class="menu container my-5">
        <h1 class="text-center mb-4">Menu Pilihan</h1>
        <div class="row g-3" id="menu-container"></div>
        <div class="text-center mt-4">
            <button class="btn btn-primary" onclick="toggleCart()">Lihat Keranjang</button>
        </div>
    </section>

    <!-- Overlay untuk pop-up -->
    <div class="overlay" id="overlay"></div>

    <!-- Keranjang Pop-Up -->
    <section class="keranjang-popup" id="keranjang-popup">
        <h1 class="mb-4">Keranjang Belanja</h1>
        <p>Barang yang telah Anda pilih:</p>
        <ul id="keranjang-list" class="list-group mb-3"></ul>
        <p>Total: <span id="total" class="fw-bold">Rp 0</span></p>
        <a href="dashboard/cart/checkout.php" class="btn btn-success w-100" id="checkout-button" style="display:none;">Lanjut ke Checkout</a>
    </section>

    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-1">&copy; 2024 Kukis. Semua Hak Cipta Dilindungi.</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#" class="text-white">Facebook</a></li>
            <li class="list-inline-item"><a href="#" class="text-white">Instagram</a></li>
            <li class="list-inline-item"><a href="#" class="text-white">Twitter</a></li>
        </ul>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Barang yang tersedia di menu
        const menuItems = [
            { name: "Cookies Keju", price: 25000 },
            { name: "Soft Cookies", price: 30000 },
            { name: "Mini Cookies", price: 20000 },
            { name: "Chocolate Chip Cookies", price: 28000 },
            { name: "Cookies Coklat", price: 22000 },
            { name: "Oatmeal Cookies", price: 27000 }
        ];
    
        // Daftar keranjang yang kosong pada awalnya
        let cart = [];
    
        // Fungsi untuk menambahkan barang ke keranjang
        function addToCart(item) {
            cart.push(item);
            updateCart();
        }
    
        // Fungsi untuk memperbarui tampilan keranjang dan total harga
        function updateCart() {
            const cartList = document.getElementById('keranjang-list');
            cartList.innerHTML = ''; // Kosongkan daftar sebelum update
            let total = 0;
    
            cart.forEach(item => {
                const li = document.createElement('li');
                li.classList.add('list-group-item');
                li.textContent = `${item.name} - Harga: Rp ${item.price.toLocaleString()}`;
                cartList.appendChild(li);
                total += item.price;
            });
    
            // Tampilkan total harga
            document.getElementById('total').textContent = `Rp ${total.toLocaleString()}`;
    
            // Tampilkan tombol checkout jika keranjang tidak kosong
            const checkoutButton = document.getElementById('checkout-button');
            if (cart.length > 0) {
                checkoutButton.style.display = 'block';
                // Update URL checkout dengan data keranjang
                const cartData = cart.map(item => `${item.name}:${item.price}`).join(',');
                checkoutButton.href = `checkout.html?cart=${encodeURIComponent(cartData)}`;
            } else {
                checkoutButton.style.display = 'none';
            }
        }
    
        // Fungsi untuk membuat menu barang
        function createMenu() {
            const menuContainer = document.getElementById('menu-container');
            menuItems.forEach(item => {
                const menuItem = document.createElement('div');
                menuItem.classList.add('col-md-4');
                menuItem.innerHTML = `
                    <div class="menu-item">
                        <h2>${item.name}</h2>
                        <p>Rp ${item.price.toLocaleString()}</p>
                        <button class="btn btn-primary" onclick="addToCart({name: '${item.name}', price: ${item.price}})">Pilih</button>
                    </div>
                `;
                menuContainer.appendChild(menuItem);
            });
        }
    
        // Fungsi untuk menampilkan atau menyembunyikan keranjang
        function toggleCart() {
            const cartPopup = document.getElementById('keranjang-popup');
            const overlay = document.getElementById('overlay');
            cartPopup.classList.toggle('show');
            overlay.classList.toggle('show');
        }
    
        // Tutup keranjang jika overlay diklik
        document.getElementById('overlay').addEventListener('click', toggleCart);
    
        // Memanggil fungsi untuk menampilkan menu
        createMenu();
    </script>
    
</body>
</html>

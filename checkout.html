<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kukis - Checkout</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="p-3 bg-light border-bottom">
        <div class="container">
            <h1 class="text-center">Checkout</h1>
        </div>
    </header>

    <!-- Section: Rincian Pesanan -->
    <section class="container my-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="mb-4">Rincian Pesanan</h2>
                <ul id="checkout-list" class="list-group mb-3"></ul>
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold">Total:</h5>
                    <span id="checkout-total" class="fw-bold">Rp 0</span>
                </div>
                <button class="btn btn-primary w-100 mt-3">Konfirmasi Pesanan</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">&copy; 2024 Kukis. Semua Hak Cipta Dilindungi.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script -->
    <script>
        // Fungsi untuk mem-parsing data dari query string
        function parseCartData() {
            const params = new URLSearchParams(window.location.search);
            const cartData = params.get('cart');
            if (!cartData) return [];

            return cartData.split(',').map(item => {
                const [name, price] = item.split(':');
                return { name, price: parseInt(price, 10) };
            });
        }

        // Menampilkan data keranjang di halaman checkout
        function displayCheckout() {
            const cart = parseCartData();
            const checkoutList = document.getElementById('checkout-list');
            let total = 0;

            cart.forEach(item => {
                const li = document.createElement('li');
                li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
                li.innerHTML = `
                    <span>${item.name}</span>
                    <span class="fw-bold">Rp ${item.price.toLocaleString()}</span>
                `;
                checkoutList.appendChild(li);
                total += item.price;
            });

            document.getElementById('checkout-total').textContent = `Rp ${total.toLocaleString()}`;
        }

        displayCheckout();
    </script>
</body>
</html>

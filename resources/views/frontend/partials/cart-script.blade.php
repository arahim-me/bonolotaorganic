<script>
    document.addEventListener('DOMContentLoaded', function() {

        const CART_KEY = 'shopping_cart';
        const drawer = document.getElementById('cart-drawer');
        const cartItems = document.getElementById('cart-items');
        const cartEmpty = document.getElementById('cart-empty');
        const cartContent = document.getElementById('cart-content');
        const terms = document.getElementById('drawer-terms');
        const checkoutBtn = document.getElementById('cart-checkout-btn');

        const money = value => '৳' + Number(value).toFixed(2);

        function getCart() {
            try {
                return JSON.parse(localStorage.getItem(CART_KEY)) || [];
            } catch {
                return [];
            }
        }

        function saveCart(cart) {
            localStorage.setItem(CART_KEY, JSON.stringify(cart));
            renderCart();
        }

        function escapeHTML(value) {
            return String(value ?? '').replace(/[&<>"']/g, char => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[char]);
        }

        // Open Drawer
        function openDrawer() {
            if (!drawer) return;

            drawer.classList.remove('invisible');
            drawer.classList.add('active');
        }

        // Close Drawer
        function closeDrawer() {
            if (!drawer) return;

            drawer.classList.add('invisible');
            drawer.classList.remove('active');
        }

        // Update Header Cart Count
        function updateCartCount(cart) {
            const count = cart.reduce(
                (total, item) => total + Number(item.quantity), 0
            );

            document.querySelectorAll(
                '#cart-count, .cart-count, [data-cart-count]'
            ).forEach(element => {
                element.textContent = count;
            });
        }

        // Checkout Terms
        function updateCheckoutButton() {
            if (!terms || !checkoutBtn) return;

            const accepted = terms.checked;
            const hasItems = getCart().length > 0;

            checkoutBtn.classList.toggle(
                'opacity-50', !accepted || !hasItems
            );

            checkoutBtn.classList.toggle(
                'disabled', !accepted || !hasItems
            );

            checkoutBtn.classList.toggle(
                'pe-none', !accepted || !hasItems
            );

            checkoutBtn.setAttribute(
                'aria-disabled', String(!accepted || !hasItems)
            );
        }

        // Render Cart

        async function renderCart() {

            if (!cartItems) return;

            const cart = getCart();

            updateCartCount(cart);

            if (cart.length === 0) {
                cartEmpty?.classList.remove('d-none');
                cartContent?.classList.add('d-none');

                document.querySelectorAll('[data-cart-subtotal]')
                    .forEach(el => el.textContent = '৳0.00');

                updateCheckoutButton();
                return;
            }

            cartEmpty?.classList.add('d-none');
            cartContent?.classList.remove('d-none');

            try {
                const response = await fetch("{{ route('cart.products') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector(
                            'meta[name="csrf-token"]'
                        ).content
                    },
                    body: JSON.stringify({
                        items: cart.map(item => ({
                            id: item.id,
                            quantity: item.quantity
                        }))
                    })
                });

                const result = await response.json();

                if (!response.ok) {
                    console.error('Cart API Error:', result);
                    throw new Error(result.message || 'Cart API request failed');
                }

                console.log('Cart Products:', result.products);

                let subtotal = 0;

                const productMap = new Map(
                    result.products.map(product => [
                        String(product.id), product
                    ])
                );

                const validCart = [];

                cartItems.innerHTML = cart.map(item => {

                    const product = productMap.get(String(item.id));

                    if (!product) return '';

                    const price = Number(product.price);
                    const quantity = Number(item.quantity);
                    const total = price * quantity;

                    if (!Number.isFinite(price)) return '';

                    subtotal += total;

                    validCart.push(item);

                    const image = product.thumbnail ?
                        'uploads/products/thumbnails/' + product.thumbnail :
                        'uploads/products/thumbnails/default.png';

                    return `
                <div class="cart-drawer-item d-flex align-items-center ptb-15 beb">

                    <div class="cart-item-image width-80">
                        <img src="${escapeHTML(image)}"
                             alt="${escapeHTML(product.name)}"
                             class="w-100">
                    </div>

                    <div class="cart-item-info width-calc-80 pl-15">

                        <div class="d-flex justify-content-between">
                            <strong>${escapeHTML(product.name)}</strong>

                            <button type="button"
                                class="remove-cart"
                                data-id="${escapeHTML(item.id)}">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>

                        <div class="font-14 mst-5">
                            ${money(price)}
                        </div>

                        <div class="d-flex justify-content-between align-items-center mst-10">

                            <div class="d-flex align-items-center gap-2">

                                <button type="button"
                                    class="cart-qty"
                                    data-id="${escapeHTML(item.id)}"
                                    data-action="minus">-</button>

                                <span>${quantity}</span>

                                <button type="button"
                                    class="cart-qty"
                                    data-id="${escapeHTML(item.id)}"
                                    data-action="plus">+</button>

                            </div>

                            <strong>${money(total)}</strong>

                        </div>

                    </div>

                </div>
            `;

                }).join('');

                // Remove unavailable products
                if (validCart.length !== cart.length) {
                    localStorage.setItem(
                        CART_KEY,
                        JSON.stringify(validCart)
                    );
                }

                updateCartCount(validCart);

                document.querySelectorAll('[data-cart-subtotal]')
                    .forEach(el => el.textContent = money(subtotal));

                if (validCart.length === 0) {
                    cartEmpty?.classList.remove('d-none');
                    cartContent?.classList.add('d-none');
                }

                updateCheckoutButton();

            } catch (error) {
                console.error(error);
                cartItems.innerHTML = `
            <div class="text-center py-4">
                Unable to load cart products. Please try again.
            </div>
        `;
            }
        }

        // Add to Cart
        document.addEventListener('click', function(e) {

            const button = e.target.closest('.add-to-cart');

            if (!button) return;

            e.preventDefault();

            const product = {
                id: String(button.dataset.id),
                quantity: 1
            };

            if (!product.id || product.id === 'undefined') {
                return;
            }

            let cart = getCart();

            const existing = cart.find(item => item.id === product.id);

            if (existing) {
                existing.quantity++;
            } else {
                cart.push(product);
            }

            saveCart(cart);

            // Open Cart Drawer
            openDrawer();

        });
        // Increase / Decrease Quantity
        document.addEventListener('click', function(e) {

            const button = e.target.closest('.cart-qty');

            if (!button) return;

            const id = String(button.dataset.id);
            const action = button.dataset.action;

            let cart = getCart();

            const item = cart.find(item => item.id === id);

            if (!item) return;

            if (action === 'plus') {
                item.quantity++;
            }

            if (action === 'minus') {
                item.quantity--;

                if (item.quantity <= 0) {
                    cart = cart.filter(item => item.id !== id);
                }
            }

            saveCart(cart);
        });

        // Remove Product
        document.addEventListener('click', function(e) {

            const button = e.target.closest('.remove-cart');

            if (!button) return;

            const id = String(button.dataset.id);

            const cart = getCart().filter(item => item.id !== id);

            saveCart(cart);
        });

        // Clear Cart
        document.addEventListener('click', function(e) {

            if (!e.target.closest('#clear-cart')) return;

            localStorage.removeItem(CART_KEY);

            renderCart();
        });

        // Close Drawer
        document.addEventListener('click', function(e) {

            if (e.target.closest('.drawer-close-btn')) {
                closeDrawer();
            }

            if (e.target === drawer) {
                closeDrawer();
            }
        });

        // Terms Checkbox
        terms?.addEventListener('change', updateCheckoutButton);

        // Checkout Protection
        checkoutBtn?.addEventListener('click', function(e) {

            if (!terms?.checked || getCart().length === 0) {
                e.preventDefault();
                return;
            }

            // Seller Note and Coupon can be included at checkout.
            const checkoutData = {
                items: getCart(),
                note: document.getElementById('drawernote')?.value || '',
                coupon: document.getElementById('drawerdiscount')?.value || ''
            };

            sessionStorage.setItem(
                'checkout_data',
                JSON.stringify(checkoutData)
            );
        });

        // Initial Load
        renderCart();

        // Other scripts can access cart data
        window.getShoppingCart = getCart;

    });
</script>

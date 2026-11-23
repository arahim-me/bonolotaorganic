
(() => {
    'use strict';

    // Prevent duplicate initialization
    if (window.CartManagerInitialized) return;
    window.CartManagerInitialized = true;

    const CART_KEY = 'shopping_cart';

    const API_URL = document.querySelector(
        'meta[name="cart-products-url"]'
    )?.content;

    const CSRF_TOKEN = document.querySelector(
        'meta[name="csrf-token"]'
    )?.content;

    const DEFAULT_IMAGE = '/images/no-image.png';

    const drawer = document.querySelector('#cart-drawer');

    if (!drawer) {
        console.warn('Cart drawer not found.');
        return;
    }

    // Original theme elements
    const emptyCart = drawer.querySelector('.drawer-cart-empty');
    const drawerInner = drawer.querySelector('.drawer-inner');
    const cartTable = drawer.querySelector('.cart-drawer-table');

    const subtotalElement = drawer.querySelector(
        '.drawer-total .heading-color.heading-weight'
    );

    const termsCheckbox = drawer.querySelector('#drawer-terms');
    const checkoutButton = drawer.querySelector(
        '.drawer-cart-checkout a.secondary-btn'
    );

    let isRendering = false;
    let renderAgain = false;
    let renderVersion = 0;

    // ---------------------------------------
    // Cart Storage
    // ---------------------------------------

    function getCart() {
        try {
            const cart = JSON.parse(
                localStorage.getItem(CART_KEY) || '[]'
            );

            if (!Array.isArray(cart)) return [];

            return cart
                .filter(item =>
                    item &&
                    item.id !== undefined &&
                    Number.isInteger(Number(item.quantity)) &&
                    Number(item.quantity) > 0
                )
                .map(item => ({
                    id: String(item.id),
                    quantity: Number(item.quantity)
                }));

        } catch (error) {
            console.error('Cart storage error:', error);
            return [];
        }
    }

    function saveCart(cart) {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));

        updateCartCount();
        renderCart();
    }

    // ---------------------------------------
    // Helpers
    // ---------------------------------------

    function escapeHTML(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }

    function formatPrice(price) {
        return '৳' + new Intl.NumberFormat('en-BD', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(Number(price) || 0);
    }

    function getProductImage(product) {
        return product.image_url ||
            (product.thumbnail
                ? 'uploads/products/thumbnails/' + product.thumbnail
                : 'uploads/products/thumbnails/default.png');
    }

    function getProductUrl(product) {
        if (product.url) return product.url;

        if (product.slug) {
            return '/product/' + encodeURIComponent(product.slug);
        }

        return 'javascript:void(0)';
    }

    function showMessage(message) {
        console.log(message);

        const toast = document.querySelector('#cart-toast');

        if (toast && window.bootstrap) {
            const body = toast.querySelector('.toast-body');

            if (body) body.textContent = message;

            bootstrap.Toast.getOrCreateInstance(toast).show();
        }
    }

    // ---------------------------------------
    // Cart Count
    // ---------------------------------------

    function updateCartCount() {
        const count = getCart().reduce(
            (total, item) => total + item.quantity,
            0
        );

        document.querySelectorAll('[data-cart-count]').forEach(element => {
            element.textContent = count;
        });

        document.querySelectorAll('.cart-count').forEach(element => {
            if (!element.hasAttribute('data-cart-count')) {
                element.textContent = count;
            }
        });
    }

    // ---------------------------------------
    // Drawer Open / Close
    // ---------------------------------------

    function openCartDrawer() {
        drawer.classList.remove('invisible');

        document.body.classList.add('overflow-hidden');
    }

    function closeCartDrawer() {
        drawer.classList.add('invisible');

        document.body.classList.remove('overflow-hidden');
    }

    // ---------------------------------------
    // Add Product
    // ---------------------------------------

    function addToCart(productId, quantity = 1) {
        if (!productId) return;

        quantity = Math.max(1, parseInt(quantity, 10) || 1);

        const cart = getCart();

        const existing = cart.find(
            item => item.id === String(productId)
        );

        if (existing) {
            existing.quantity += quantity;
        } else {
            cart.push({
                id: String(productId),
                quantity: quantity
            });
        }

        saveCart(cart);
        openCartDrawer();

        showMessage('Product added to cart.');
    }

    // ---------------------------------------
    // Remove Product
    // ---------------------------------------

    function removeFromCart(productId) {
        const cart = getCart().filter(
            item => item.id !== String(productId)
        );

        saveCart(cart);

        showMessage('Product removed from cart.');
    }

    // ---------------------------------------
    // Update Quantity
    // ---------------------------------------

    function updateQuantity(productId, quantity) {
        quantity = parseInt(quantity, 10);

        if (!Number.isInteger(quantity) || quantity < 1) {
            removeFromCart(productId);
            return;
        }

        const cart = getCart();

        const item = cart.find(
            product => product.id === String(productId)
        );

        if (!item) return;

        item.quantity = quantity;

        saveCart(cart);
    }

    // ---------------------------------------
    // Fetch Products From Laravel
    // ---------------------------------------

    async function fetchProducts(cart) {
        if (!API_URL) {
            throw new Error('Cart products URL not found.');
        }

        if (!CSRF_TOKEN) {
            throw new Error('CSRF token not found.');
        }

        const response = await fetch(API_URL, {
            method: 'POST',

            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': CSRF_TOKEN
            },

            body: JSON.stringify({
                items: cart.map(item => ({
                    id: item.id,
                    quantity: item.quantity
                }))
            })
        });

        const result = await response.json().catch(() => ({}));

        if (!response.ok) {
            console.error('Cart API Error:', response.status, result);

            throw new Error(
                result.message || `HTTP Error ${response.status}`
            );
        }

        if (!Array.isArray(result.products)) {
            throw new Error('Invalid products response.');
        }

        return result.products;
    }

    // ---------------------------------------
    // Empty Cart
    // ---------------------------------------

    function renderEmptyCart() {
        if (emptyCart) {
            emptyCart.classList.remove('d-none');
        }

        if (drawerInner) {
            drawerInner.classList.add('d-none');
        }

        if (cartTable) {
            cartTable.innerHTML = '';
        }

        if (subtotalElement) {
            subtotalElement.textContent = formatPrice(0);
        }

        updateCheckoutButton();
    }

    // ---------------------------------------
    // Original Theme Cart Item HTML
    // ---------------------------------------

    function createCartItem(item, product) {
        const id = escapeHTML(item.id);
        const name = escapeHTML(product.name);
        const image = escapeHTML(getProductImage(product));
        const url = escapeHTML(getProductUrl(product));

        const price = Number(product.price) || 0;
        const quantity = Number(item.quantity);

        const total = price * quantity;

        // Optional product information
        const variant = product.variant_name || '';
        const material = product.material || '';

        const variantHTML = variant
            ? `<span class="d-block mst-7">${escapeHTML(variant)}</span>`
            : '';

        const materialHTML = material
            ? `<span class="d-block mst-7">${escapeHTML(material)}</span>`
            : '';

        // Optional stock warning
        const stock = product.stock_quantity !== undefined
            ? Number(product.stock_quantity)
            : null;

        const stockHTML = stock !== null && stock > 0 && stock <= 15
            ? `
                <div class="text-danger font-14 mst-7">
                    <i class="ri-error-warning-line mer-4"></i>
                    Hurry! Only
                    <span class="heading-weight">${stock}</span>
                    in stock.
                </div>
            `
            : '';

        return `
            <div class="cart-drawer-info ptb-15 bst"
                 data-cart-item
                 data-id="${id}">

                <div class="cart-drawer-content d-flex flex-wrap">

                    <div class="cart-drawer-image width-88">
                        <a href="${url}" class="d-block br-hidden">
                            <img
                                src="${image}"
                                class="w-100 img-fluid"
                                alt="${name}"
                                onerror="this.onerror=null;this.src='${DEFAULT_IMAGE}'"
                            >
                        </a>
                    </div>

                    <div class="cart-drawer-info width-calc-88 psl-15">

                        <div class="cart-drawer-detail">
                            <a href="${url}"
                               class="primary-link heading-weight">
                                ${name}
                            </a>

                            ${variantHTML}
                            ${materialHTML}
                        </div>

                        <div class="heading-color heading-weight mst-7">
                            ${formatPrice(price)}
                        </div>

                        <div class="cart-drawer-qty-remove d-flex align-items-end justify-content-between mst-16">

                            <div class="js-qty-wrapper">

                                <div class="js-qty-wrap d-flex body-bg border-full br-hidden">

                                    <button
                                        type="button"
                                        class="js-qty-adjust js-qty-adjust-minus body-color icon-16"
                                        data-cart-action="decrease"
                                        data-id="${id}"
                                        aria-label="Remove item"
                                    >
                                        <i class="ri-subtract-line d-block lh-1"></i>
                                    </button>

                                    <input
                                        type="number"
                                        name="cart_quantity_${id}"
                                        class="js-qty-num p-0 text-center border-0"
                                        value="${quantity}"
                                        min="1"
                                        data-cart-quantity
                                        data-id="${id}"
                                    >

                                    <button
                                        type="button"
                                        class="js-qty-adjust js-qty-adjust-plus body-color icon-16"
                                        data-cart-action="increase"
                                        data-id="${id}"
                                        aria-label="Add item"
                                    >
                                        <i class="ri-add-line d-block lh-1"></i>
                                    </button>

                                </div>

                            </div>

                            <button
                                type="button"
                                class="cart-drawer-remove text-danger icon-16"
                                data-cart-action="remove"
                                data-id="${id}"
                                aria-label="Remove item"
                            >
                                <i class="ri-delete-bin-line d-block lh-1"></i>
                            </button>

                        </div>

                        ${stockHTML}

                    </div>

                </div>

            </div>
        `;
    }

    // ---------------------------------------
    // Render Products
    // ---------------------------------------

    function renderProducts(cart, products) {
        const productMap = new Map(
            products.map(product => [
                String(product.id),
                product
            ])
        );

        let html = '';
        let subtotal = 0;

        const validCart = [];

        cart.forEach(item => {
            const product = productMap.get(String(item.id));

            if (!product) return;

            validCart.push(item);

            const price = Number(product.price) || 0;

            subtotal += price * item.quantity;

            html += createCartItem(item, product);
        });

        // Update localStorage if products are unavailable
        if (validCart.length !== cart.length) {
            localStorage.setItem(
                CART_KEY,
                JSON.stringify(validCart)
            );
        }

        if (!validCart.length) {
            renderEmptyCart();
            updateCartCount();
            return;
        }

        // Only replace the cart product list.
        // Recommended products, note, discount and footer stay untouched.
        if (cartTable) {
            cartTable.innerHTML = html;
        }

        if (emptyCart) {
            emptyCart.classList.add('d-none');
        }

        if (drawerInner) {
            drawerInner.classList.remove('d-none');
        }

        if (subtotalElement) {
            subtotalElement.textContent = formatPrice(subtotal);
        }

        updateCartCount();
        updateCheckoutButton();
    }

    // ---------------------------------------
    // Main Render
    // ---------------------------------------

    async function renderCart() {
        if (isRendering) {
            renderAgain = true;
            return;
        }

        isRendering = true;

        const currentVersion = ++renderVersion;

        try {
            const cart = getCart();

            if (!cart.length) {
                renderEmptyCart();
                updateCartCount();
                return;
            }

            const products = await fetchProducts(cart);

            // Ignore old response if another render started
            if (currentVersion !== renderVersion) return;

            renderProducts(cart, products);

        } catch (error) {
            console.error('Cart Render Error:', error);

            if (cartTable) {
                cartTable.innerHTML = `
                    <div class="ptb-15 text-center">
                        <p class="text-danger font-14">
                            Unable to load cart products.
                        </p>

                        <button
                            type="button"
                            class="btn-style secondary-btn"
                            data-cart-action="retry"
                        >
                            Try again
                        </button>
                    </div>
                `;
            }

        } finally {
            isRendering = false;

            if (renderAgain) {
                renderAgain = false;
                renderCart();
            }
        }
    }

    // ---------------------------------------
    // Checkout Button State
    // ---------------------------------------

    function updateCheckoutButton() {
        if (!checkoutButton) return;

        const hasItems = getCart().length > 0;
        const accepted = termsCheckbox
            ? termsCheckbox.checked
            : false;

        const enabled = hasItems && accepted;

        checkoutButton.classList.toggle(
            'opacity-50',
            !enabled
        );

        checkoutButton.classList.toggle(
            'disabled',
            !enabled
        );

        checkoutButton.classList.toggle(
            'pe-none',
            !enabled
        );

        checkoutButton.setAttribute(
            'aria-disabled',
            String(!enabled)
        );
    }

    // ---------------------------------------
    // Event Delegation
    // ---------------------------------------

    document.addEventListener('click', function (event) {

        // Add to cart
        const addButton = event.target.closest('.add-to-cart');

        if (addButton) {
            event.preventDefault();

            const productId = addButton.dataset.id;

            const quantityInput = document.querySelector(
                '[name="quantity"]'
            );

            const quantity = quantityInput
                ? quantityInput.value
                : 1;

            addToCart(productId, quantity);
            return;
        }

        // Cart actions
        const actionButton = event.target.closest(
            '[data-cart-action]'
        );

        if (actionButton) {
            event.preventDefault();

            const action = actionButton.dataset.cartAction;
            const id = actionButton.dataset.id;

            if (action === 'retry') {
                renderCart();
                return;
            }

            const item = getCart().find(
                product => product.id === String(id)
            );

            if (!item) return;

            if (action === 'increase') {
                updateQuantity(id, item.quantity + 1);
            }

            if (action === 'decrease') {
                updateQuantity(id, item.quantity - 1);
            }

            if (action === 'remove') {
                removeFromCart(id);
            }

            return;
        }

        // Close drawer
        if (event.target.closest('.drawer-close-btn')) {
            closeCartDrawer();
        }

    });

    // Quantity input change
    drawer.addEventListener('change', function (event) {
        const input = event.target.closest('[data-cart-quantity]');

        if (!input) return;

        updateQuantity(
            input.dataset.id,
            input.value
        );
    });

    // Prevent cart form submission
    const cartForm = drawer.querySelector('form');

    if (cartForm) {
        cartForm.addEventListener('submit', function (event) {
            event.preventDefault();
        });
    }

    // Terms checkbox
    if (termsCheckbox) {
        termsCheckbox.addEventListener('change', updateCheckoutButton);
    }

    // Checkout validation
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function (event) {
            if (!getCart().length) {
                event.preventDefault();
                showMessage('Your cart is empty.');
                return;
            }

            if (!termsCheckbox || !termsCheckbox.checked) {
                event.preventDefault();
                showMessage('Please accept the terms and conditions.');
            }
        });
    }

    // ---------------------------------------
    // Initialize
    // ---------------------------------------

    updateCartCount();
    updateCheckoutButton();
    renderCart();

    // Public methods
    window.CartManager = {
        getCart,
        addToCart,
        removeFromCart,
        updateQuantity,
        renderCart,
        openCartDrawer,
        closeCartDrawer,
        updateCartCount
    };

})();

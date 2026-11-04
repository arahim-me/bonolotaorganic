import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const cartStorageKey = 'simple-ecommerce-cart-v1';
const cartDrawer = document.querySelector('#cart-drawer');
const cartItems = document.querySelector('#cart-items');

if (cartDrawer && cartItems) {
	const emptyState = cartDrawer.querySelector('.drawer-cart-empty');
	const drawerContent = cartDrawer.querySelector('.drawer-inner');
	const subtotal = cartDrawer.querySelector('[data-cart-subtotal]');
	const counters = document.querySelectorAll('.cart-counter');
	let cart = readCart();

	function readCart() {
		try {
			const storedCart = JSON.parse(localStorage.getItem(cartStorageKey) || '[]');
			return Array.isArray(storedCart) ? storedCart.filter((item) => item && item.id && item.name) : [];
		} catch {
			return [];
		}
	}

	function saveCart() {
		localStorage.setItem(cartStorageKey, JSON.stringify(cart));
		renderCart();
	}

	function formatPrice(currency, amount) {
		return `${currency || '৳'}${Number(amount).toFixed(2)}`;
	}

	function renderCart() {
		cartItems.replaceChildren();
		const itemCount = cart.reduce((count, item) => count + item.quantity, 0);
		counters.forEach((counter) => {
			counter.textContent = itemCount;
		});

		emptyState?.classList.toggle('d-none', itemCount > 0);
		drawerContent?.classList.toggle('d-none', itemCount === 0);

		cart.forEach((item) => {
			const row = document.createElement('div');
			row.className = 'cart-drawer-info ptb-15 bst';
			row.innerHTML = `
				<div class="cart-drawer-content d-flex flex-wrap">
					<div class="cart-drawer-image width-88">
						<a class="d-block br-hidden" data-item-link><img class="w-100 img-fluid" data-item-image alt=""></a>
					</div>
					<div class="cart-drawer-info width-calc-88 psl-15">
						<div class="cart-drawer-detail"><a class="primary-link heading-weight" data-item-link data-item-name></a><span class="d-block mst-7" data-item-variant></span></div>
						<div class="heading-color heading-weight mst-7" data-item-price></div>
						<div class="cart-drawer-qty-remove d-flex align-items-end justify-content-between mst-16">
							<div class="js-qty-wrapper"><div class="js-qty-wrap d-flex body-bg border-full br-hidden">
								<button type="button" class="js-qty-adjust js-qty-adjust-minus body-color icon-16" data-quantity-change="-1" aria-label="Decrease quantity"><i class="ri-subtract-line d-block lh-1"></i></button>
								<input type="number" class="js-qty-num p-0 text-center border-0" min="1" aria-label="Quantity">
								<button type="button" class="js-qty-adjust js-qty-adjust-plus body-color icon-16" data-quantity-change="1" aria-label="Increase quantity"><i class="ri-add-line d-block lh-1"></i></button>
							</div></div>
							<button type="button" class="cart-drawer-remove text-danger icon-16" data-remove-item aria-label="Remove item"><i class="ri-delete-bin-line d-block lh-1"></i></button>
						</div>
					</div>
				</div>`;

			row.querySelectorAll('[data-item-link]').forEach((link) => {
				link.href = item.url || '#';
			});
			const image = row.querySelector('[data-item-image]');
			image.src = item.image || '';
			image.alt = item.name;
			row.querySelector('[data-item-name]').textContent = item.name;
			row.querySelector('[data-item-variant]').textContent = item.variant || '';
			row.querySelector('[data-item-price]').textContent = formatPrice(item.currency, item.price);
			row.querySelector('input').value = item.quantity;
			row.dataset.cartId = item.id;
			cartItems.append(row);
		});

		const total = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
		if (subtotal) {
			subtotal.textContent = formatPrice(cart[0]?.currency, total);
		}
	}

	function parsePrice(value) {
		const normalized = value.replace(/,/g, '').match(/[0-9]+(?:\.[0-9]+)?/);
		return normalized ? Number(normalized[0]) : 0;
	}

	function getProduct(button) {
		const card = button.closest('.single-product');
		const detail = button.closest('.product-detail');
		const nameElement = card?.querySelector('.product-title a') || detail?.querySelector('h2');
		const priceElement = card?.querySelector('.new-price') || detail?.querySelector('.new-price');
		const imageElement = card?.querySelector('.product-image img') || detail?.querySelector('.product-swiper-slide img');
		const linkElement = card?.querySelector('.product-image a.pro-img') || detail?.querySelector('.breadcrumb-area a');
		const productId = button.dataset.cartId || card?.dataset.cartId || linkElement?.href.match(/\/products\/show\/([^/?#]+)/)?.[1];
		const name = button.dataset.cartName || card?.dataset.cartName || nameElement?.textContent.trim();
		const priceText = priceElement?.textContent.trim() || '';
		const currency = button.dataset.cartCurrency || card?.dataset.cartCurrency || priceText.replace(/[\d\s.,]/g, '') || '৳';
		const price = Number(button.dataset.cartPrice || card?.dataset.cartPrice || parsePrice(priceText));
		const selectedOptions = detail ? [...detail.querySelectorAll('input[type="radio"]:checked')].map((option) => option.value) : [];
		const quantityInput = detail?.querySelector('.product-quantity-action input[type="number"]');

		if (!name || !price || !Number.isFinite(price)) {
			return null;
		}

		const id = productId || name.toLowerCase().replace(/[^a-z0-9]+/g, '-');
		const variant = selectedOptions.join(' / ');

		return {
			id: variant ? `${id}:${variant}` : id,
			name,
			price,
			currency,
			image: button.dataset.cartImage || card?.dataset.cartImage || imageElement?.src || '',
			url: button.dataset.cartUrl || card?.dataset.cartUrl || linkElement?.href || window.location.href,
			variant,
			quantity: Math.max(1, Number(quantityInput?.value) || 1),
		};
	}

	document.addEventListener('click', (event) => {
		const addButton = event.target.closest('.add-to-cart');
		if (addButton) {
			event.preventDefault();
			const product = getProduct(addButton);
			if (!product) {
				return;
			}

			const existingItem = cart.find((item) => item.id === product.id);
			if (existingItem) {
				existingItem.quantity += product.quantity;
			} else {
				cart.push(product);
			}
			saveCart();
			return;
		}

		const quantityButton = event.target.closest('[data-quantity-change]');
		const row = quantityButton?.closest('[data-cart-id]');
		if (row) {
			const item = cart.find((cartItem) => cartItem.id === row.dataset.cartId);
			if (item) {
				item.quantity = Math.max(1, item.quantity + Number(quantityButton.dataset.quantityChange));
				saveCart();
			}
		}

		const removeButton = event.target.closest('[data-remove-item]');
		const removeRow = removeButton?.closest('[data-cart-id]');
		if (removeRow) {
			cart = cart.filter((item) => item.id !== removeRow.dataset.cartId);
			saveCart();
		}
	});

	cartItems.addEventListener('change', (event) => {
		if (!event.target.matches('input[type="number"]')) {
			return;
		}
		const row = event.target.closest('[data-cart-id]');
		const item = cart.find((cartItem) => cartItem.id === row?.dataset.cartId);
		if (item) {
			item.quantity = Math.max(1, Number(event.target.value) || 1);
			saveCart();
		}
	});

	window.addEventListener('storage', (event) => {
		if (event.key === cartStorageKey) {
			cart = readCart();
			renderCart();
		}
	});

	renderCart();
}

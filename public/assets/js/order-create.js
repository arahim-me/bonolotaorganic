
(() => {
    const items = document.querySelector('[data-order-items]');
    const template = document.querySelector('#order-item-template');
    const addButton = document.querySelector('[data-add-order-item]');

    const subtotalElement = document.querySelector('[data-order-subtotal]');
    const shippingFeeElement = document.querySelector('[data-shipping-fee]');
    const totalElement = document.querySelector('[data-order-total]');

    const shippingSelect = document.querySelector('#shipping_fee_id');

    if (!items || !template || !addButton || !totalElement) {
        return;
    }

    let nextIndex = Number(items.dataset.nextIndex) || 0;

    function formatPrice(value) {
        return `৳${value.toFixed(2)}`;
    }

    function updateTotals() {
        let subtotal = 0;

        // Calculate product subtotal
        items.querySelectorAll('.order-item-row').forEach((row) => {
            const product = row.querySelector('[data-product-select]');
            const quantityInput = row.querySelector('[data-quantity]');

            const price = Number(
                product.selectedOptions[0]?.dataset.price
            ) || 0;

            const quantity = Math.max(
                1,
                Number(quantityInput.value) || 1
            );

            const lineTotal = price * quantity;

            row.querySelector('[data-unit-price]').textContent =
                formatPrice(price);

            row.querySelector('[data-line-total]').textContent =
                formatPrice(lineTotal);

            subtotal += lineTotal;
        });

        // Get selected shipping fee
        const shippingFee = Number(
            shippingSelect?.selectedOptions[0]?.dataset.fee
        ) || 0;

        // Calculate grand total
        const grandTotal = subtotal + shippingFee;

        // Update subtotal
        if (subtotalElement) {
            subtotalElement.textContent = formatPrice(subtotal);
        }

        // Update shipping fee
        if (shippingFeeElement) {
            shippingFeeElement.textContent = formatPrice(shippingFee);
        }

        // Update grand total
        totalElement.textContent = formatPrice(grandTotal);
    }

    function addRow() {
        const row = template.content.firstElementChild.cloneNode(true);

        row.querySelectorAll('[name]').forEach((field) => {
            field.name = field.name.replace(
                '__INDEX__',
                String(nextIndex)
            );
        });

        nextIndex += 1;

        items.append(row);

        updateTotals();
    }

    // Add new product row
    addButton.addEventListener('click', addRow);

    // Product selection change
    items.addEventListener('change', (event) => {
        if (event.target.matches('[data-product-select]')) {
            updateTotals();
        }
    });

    // Quantity change
    items.addEventListener('input', (event) => {
        if (event.target.matches('[data-quantity]')) {
            updateTotals();
        }
    });

    // Remove product row
    items.addEventListener('click', (event) => {
        const removeButton = event.target.closest(
            '[data-remove-order-item]'
        );

        if (!removeButton) {
            return;
        }

        removeButton.closest('.order-item-row').remove();

        if (items.querySelectorAll('.order-item-row').length === 0) {
            addRow();
        } else {
            updateTotals();
        }
    });

    // Shipping fee change
    shippingSelect?.addEventListener('change', updateTotals);

    // Initial calculation
    updateTotals();
})();

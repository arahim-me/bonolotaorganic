(() => {
    const items = document.querySelector('[data-order-items]');
    const template = document.querySelector('#order-item-template');
    const addButton = document.querySelector('[data-add-order-item]');
    const total = document.querySelector('[data-order-total]');

    if (!items || !template || !addButton || !total) {
        return;
    }

    let nextIndex = Number(items.dataset.nextIndex) || 0;

    function formatPrice(value) {
        return `৳${value.toFixed(2)}`;
    }

    function updateTotals() {
        let grandTotal = 0;

        items.querySelectorAll('.order-item-row').forEach((row) => {
            const product = row.querySelector('[data-product-select]');
            const quantityInput = row.querySelector('[data-quantity]');
            const price = Number(product.selectedOptions[0]?.dataset.price) || 0;
            const quantity = Math.max(1, Number(quantityInput.value) || 1);
            const lineTotal = price * quantity;

            row.querySelector('[data-unit-price]').textContent = formatPrice(price);
            row.querySelector('[data-line-total]').textContent = formatPrice(lineTotal);
            grandTotal += lineTotal;
        });

        total.textContent = formatPrice(grandTotal);
    }

    function addRow() {
        const row = template.content.firstElementChild.cloneNode(true);

        row.querySelectorAll('[name]').forEach((field) => {
            field.name = field.name.replace('__INDEX__', String(nextIndex));
        });

        nextIndex += 1;
        items.append(row);
        updateTotals();
    }

    addButton.addEventListener('click', addRow);

    items.addEventListener('change', (event) => {
        if (event.target.matches('[data-product-select]')) {
            updateTotals();
        }
    });

    items.addEventListener('input', (event) => {
        if (event.target.matches('[data-quantity]')) {
            updateTotals();
        }
    });

    items.addEventListener('click', (event) => {
        const removeButton = event.target.closest('[data-remove-order-item]');

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

    updateTotals();
})();

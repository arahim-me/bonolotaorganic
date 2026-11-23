document.addEventListener('DOMContentLoaded', function () {

    const apiUrl = document.querySelector(
        'meta[name="search-suggestions-url"]'
    )?.content;

    if (!apiUrl) {
        console.error('Search API URL not found.');
        return;
    }

    const forms = document.querySelectorAll('.search-form');

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
        return '৳' + Number(price).toLocaleString('en-BD');
    }

    forms.forEach(function (form) {

        const input = form.querySelector('.search-input');
        const button = form.querySelector('.search-btn');
        const results = form.querySelector('.search-results');
        const searchText = form.querySelector('.search-text');
        const searchTotal = form.querySelector('.search-total');
        const searchFail = form.querySelector('.search-fail');
        const searchMore = form.querySelector('.search-more');
        const productsContainer = form.querySelector('.search-products');

        if (!input || !results || !productsContainer) return;

        let timer = null;
        let controller = null;

        function renderProducts(products, total, keyword) {

            productsContainer.innerHTML = '';

            searchTotal.textContent = total;

            searchMore.querySelector('a').href =
                `${form.action}?q=${encodeURIComponent(keyword)}`;

            if (!products.length) {
                searchFail.classList.remove('d-none');
                searchMore.classList.add('d-none');
                return;
            }

            searchFail.classList.add('d-none');
            searchMore.classList.remove('d-none');

            productsContainer.innerHTML = products.map(product => `
                <a href="${escapeHTML(product.url)}"
                    class="search-product-item search-li ptb-5 plr-15 bst body-primary-color d-flex flex-wrap align-items-center">

                    <span class="width-48">
                        <img src="${escapeHTML(product.image)}"
                            class="w-100 img-fluid border-radius"
                            alt="${escapeHTML(product.name)}">
                    </span>

                    <span class="width-calc-48 psl-15 text-truncate">

                        <span class="d-block text-truncate">
                            ${escapeHTML(product.name)}
                        </span>

                        <small class="d-block body-secondary-color mt-1">
                            ${escapeHTML(product.category)}
                            <span class="mx-1">|</span>
                            ${escapeHTML(product.type)}
                        </small>

                    </span>
                </a>
            `).join('');
        }

        async function fetchProducts(keyword) {

            if (controller) {
                controller.abort();
            }

            controller = new AbortController();

            try {

                const url = new URL(apiUrl, window.location.origin);
                url.searchParams.set('q', keyword);

                const response = await fetch(url, {
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    signal: controller.signal
                });

                if (!response.ok) {
                    throw new Error(`HTTP Error: ${response.status}`);
                }

                const data = await response.json();

                if (!data.success) {
                    throw new Error('Search failed.');
                }

                renderProducts(data.products, data.total, keyword);

            } catch (error) {

                if (error.name !== 'AbortError') {
                    console.error('Search Error:', error);
                    searchFail.textContent = 'Unable to load search results.';
                    searchFail.classList.remove('d-none');
                    searchMore.classList.add('d-none');
                }
            }
        }

        input.addEventListener('input', function () {

            const keyword = this.value.trim();

            searchText.textContent = keyword;

            button.disabled = keyword.length < 2;

            clearTimeout(timer);

            if (keyword.length < 2) {
                results.classList.add('d-none');
                return;
            }

            results.classList.remove('d-none');
            productsContainer.innerHTML = '';
            searchFail.classList.add('d-none');
            searchMore.classList.add('d-none');

            timer = setTimeout(function () {
                fetchProducts(keyword);
            }, 350);

        });

        form.addEventListener('submit', function (event) {

            if (input.value.trim().length < 2) {
                event.preventDefault();
            }

        });

        document.addEventListener('click', function (event) {

            if (!form.contains(event.target)) {
                results.classList.add('d-none');
            }

        });

    });

});


@if ($categories)
    <div class="shop-sidebar shop-categories">
        <h6 class="font-18">Categories</h6>
        <div class="shop-cat-post mst-21">
            <div class="shop-cat ul-mtm-15">
                @foreach ($categories as $category)
                    <a href="collection-category.html"
                        class="body-primary-color d-flex align-items-center justify-content-between">
                        <span>{{ $category->name }}</span>
                        <span>{{ $category->products_count ?? 0 }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endif

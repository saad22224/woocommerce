@extends('main')
@section('content')
    <!-- Products Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>المنتجات</h1>
            <p>اكتشف مجموعتنا الواسعة من المنتجات المميزة</p>
        </div>
    </section>

    <!-- Filters and Products -->
    <section class="products-section">
        <div class="container">
            <div class="products-wrapper">
                <!-- Filters Sidebar -->
                <div class="filters-sidebar">
                    <h3>التصفية</h3>

                    <div class="filter-group">
                        <h4>الفئة</h4>
                        @foreach ($activesection as $section)
                            <label><input type="checkbox" value="electronics"> {{ $section->name }}</label>
                        @endforeach
                    </div>

                    <div class="filter-group">
                        <h4>السعر</h4>
                        <select id="price-filter">
                            <option value="">جميع الأسعار</option>
                            <option value="0-100">أقل من 100 ر.س</option>
                            <option value="100-500">100 - 500 ر.س</option>
                            <option value="500-1000">500 - 1000 ر.س</option>
                            <option value="1000+">أكثر من 1000 ر.س</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <h4>الترتيب</h4>
                        <select id="sort-filter">
                            <option value="newest">الأحدث</option>
                            <option value="price-low">الأرخص أولاً</option>
                            <option value="price-high">الأغلى أولاً</option>
                            <option value="popular">الأكثر شهرة</option>
                        </select>
                    </div>

                    <button class="clear-filters">مسح التصفية</button>
                </div>

                <!-- Products Grid -->
                <div class="products-content">
                    <div class="products-header">
                        <span class="products-count">عرض <span id="products-count">12</span> منتج</span>
                        <button class="filters-toggle" id="filters-toggle">🔽 التصفية</button>
                    </div>

                    <div id="all-products-grid" class="products-grid">
                        @foreach ($products as $product)
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ $product->image }}" alt="test">
                                     <button class="add-to-cart" data-id="{{ $product->id }}">إضافة للسلة</button>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title">
                                        <a href="#"
                                            style="text-decoration: none; color: inherit;">{{ $product->name }}</a>
                                    </h3>
                                    <div class="product-price">{{ $product->price }} ر.س</div>
                                    @php
                                        $truncated = Str::words($product->description, 20, '');
                                        $isTruncated = Str::wordCount($product->description) > 20;
                                    @endphp

                                    <p class="product-description">
                                        {{ $truncated }}
                                        @if ($isTruncated)
                                            <a href="#"
                                                style="margin-left:8px; color:#2563eb; font-weight:500; transition:color 0.2s;"
                                                onmouseover="this.style.color='#1e40af'"
                                                onmouseout="this.style.color='#2563eb'">
                                                عرض المزيد
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- زر عرض المزيد -->
                    <div style="text-align:center; margin-top:20px;">
                        <button id="load-more" data-offset="20"
                            style="background-color:rgb(102,126,234); color:white; padding:10px 20px; border:none; border-radius:6px; cursor:pointer; font-weight:bold; transition:opacity 0.3s;">
                            عرض المزيد
                        </button>
                        <div id="loading" style="display:none; margin-top:10px; color:#666; font-size:14px;">
                            جاري التحميل...
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Shopping Cart Sidebar -->


    <script>
        function truncateWords(str, limit) {
            let words = str.split(/\s+/);
            if (words.length <= limit) return str;
            return words.slice(0, limit).join(" ");
        }

        function wordCount(str) {
            return str.trim().split(/\s+/).length;
        }

        document.getElementById('load-more').addEventListener('click', function() {
            let offset = this.getAttribute('data-offset');
            let button = this;
            let loading = document.getElementById('loading');

            // إظهار اللودينج وإخفاء الزر مؤقتًا
            button.style.opacity = "0.6";
            button.disabled = true;
            loading.style.display = "block";

            fetch("{{ route('products') }}?offset=" + offset, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    let container = document.getElementById('all-products-grid');

                    data.forEach(p => {
                        let div = document.createElement('div');
                        div.classList.add('product-card');
                        div.innerHTML = `
                <div class="product-image">
                    <img src="${p.image}" alt="test">
                    <button class="add-to-cart" data-id="${p.id}">إضافة للسلة</button>
                </div>
                <div class="product-info">
                    <h3 class="product-title">
                        <a href="#" style="text-decoration: none; color: inherit;">${p.name}</a>
                    </h3>
                    <div class="product-price">${p.price} ر.س</div>
                    <p class="product-description">
                        ${truncateWords(p.description, 20)}
                        ${wordCount(p.description) > 20 
                            ? `<a href="#" 
                                      style="margin-left:8px; color:#2563eb; font-weight:500; transition:color 0.2s;"
                                      onmouseover="this.style.color='#1e40af'"
                                      onmouseout="this.style.color='#2563eb'">
                                      عرض المزيد
                                   </a>` 
                            : ''}
                    </p>
                </div>
            `;
                        container.appendChild(div);
                    });

                    // تحديث offset
                    button.setAttribute('data-offset', parseInt(offset) + 20);

                    // لو مفيش منتجات تاني نخفي الزر
                    if (data.length < 20) {
                        button.style.display = "none";
                        loading.textContent = "تم عرض كل المنتجات ✅";
                    } else {
                        button.style.opacity = "1";
                        button.disabled = false;
                        loading.style.display = "none";
                    }
                })
                .catch(() => {
                    loading.textContent = "حدث خطأ، حاول مرة أخرى ❌";
                    button.style.opacity = "1";
                    button.disabled = false;
                });
        });
    </script>
@endsection

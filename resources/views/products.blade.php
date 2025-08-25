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
                            
                      
                        <label><input 
                            type="checkbox" value="electronics"> {{ $section->name }}</label>
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

                    <div class="products-grid" id="all-products-grid">
                        <!-- Products will be loaded here -->
                        @foreach ($products as $product)
                            <div class="product-card">
                                <div class="product-image">
                                    <img src="{{ $product->image }}"
                                        alt="test">
                                     <button class="add-to-cart" data-id="{{ $product->id }}">إضافة للسلة</button>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title">
                                        <a href="#" style="text-decoration: none; color: inherit;">{{ $product->name }}</a>
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
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>

                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shopping Cart Sidebar -->
@endsection

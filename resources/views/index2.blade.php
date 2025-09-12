@extends('main')

@section('content')
    {{-- {{ dd($latestproducts) }} --}}
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h3 class="hero-title">اكتشف أحدث المنتجات</h3>
            <p class="hero-subtitle">تسوق من أفضل المنتجات بأسعار مميزة وجودة عالية</p>
            <button class="hero-btn">تسوق الآن</button>
        </div>
        <div class="hero-image">
            <img loading="lazy"
                src="https://images.pexels.com/photos/230544/pexels-photo-230544.jpeg?auto=compress&cs=tinysrgb&w=800"
                alt="Shopping">
        </div>
    </section>

    <!-- Services Section -->
    <section class="services">
        <div class="container">
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <svg loading="lazy" width="60" height="60" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="1" y="3" width="15" height="13" />
                            <polygon points="16,8 20,8 23,11 23,16 16,16 16,8" />
                            <circle cx="5.5" cy="18.5" r="2.5" />
                            <circle cx="18.5" cy="18.5" r="2.5" />
                        </svg>
                    </div>
                    <h3 class="service-title">سرعة التوصيل</h3>
                    <p class="service-description">توصيل سريع وخدمة ممتازة تصل إلى باب منزلك في وقت قياسي</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg loading="lazy" width="60" height="60" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon
                                points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26 12,2" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </div>
                    <h3 class="service-title">جودة عالية</h3>
                    <p class="service-description">منتجات ذات جودة عالية نضمن لك الأداء والاعتمادية التي تستحقها</p>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg loading="lazy" width="60" height="60" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v20" />
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                        </svg>
                    </div>
                    <h3 class="service-title">خدمة العملاء</h3>
                    <p class="service-description">فريق خدمة العملاء لدينا متواجد دائماً للإجابة على استفساراتك ومساعدتك في
                        كل ما تحتاجين إليه</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <div class="section-header">
                        <span class="section-badge">من نحن</span>
                        <h2 class="about-title">رحلتك للتسوق تبدأ من هنا</h2>
                    </div>
                    <p class="about-description">
                        نحن أكثر من مجرد متجر إلكتروني، نحن شريكك في اختيار الأفضل.
                        نعمل بشغف لتوفير منتجات أصلية، بأسعار تنافسية، وتجربة تسوق مريحة وآمنة من البداية وحتى وصول طلبك
                        لباب منزلك.
                    </p>
                    <div class="stats-container">
                        <div class="stat-item">
                            <div class="stat-number" data-target="5000">5000+</div>
                            <div class="stat-label">عميل يثق بنا</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-target="1200">1200+</div>
                            <div class="stat-label">منتج مميز</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-target="98">98%</div>
                            <div class="stat-label">رضا العملاء</div>
                        </div>
                    </div>
                    <div class="about-features">
                        <div class="feature-item">
                            <i class="feature-icon">✓</i>
                            <span>منتجات مضمونة 100%</span>
                        </div>
                        <div class="feature-item">
                            <i class="feature-icon">✓</i>
                            <span>تسليم سريع وآمن</span>
                        </div>
                        <div class="feature-item">
                            <i class="feature-icon">✓</i>
                            <span>دعم فني وخدمة عملاء على مدار الساعة</span>
                        </div>
                    </div>
                    <button class="about-btn">تسوق الان</button>
                </div>
                <div class="about-image">
                    <div class="image-wrapper">
                        <img loading="lazy"
                            src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=800"
                            alt="فريق العمل">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Featured Products -->
    <section class="featured-products">
        <div class="container">
            <h2 class="section-title">أحدث المنتجات</h2>

            <!-- Swiper -->
            <div class="swiper mySwiper" id="products-swiper">
                <div class="swiper-wrapper">
                    @foreach ($latestproducts as $product)
                        <div class="swiper-slide">
                            <div class="product-card">
                                <div class="product-image">
                                    @php
                                        $images = json_decode($product->image, true) ?? [];
                                    @endphp
                                 
                                        <img loading="lazy" src="{{ $images[0] }}" alt="{{ $product->name }}">
        
                                    <button class="add-to-cart" data-id="{{ $product->id }}">إضافة للسلة</button>

                                </div>
                                <div class="product-info">
                                    <h3 class="product-title">
                                        <a href="{{ route('product_details' , ['slug' => $product->name]) }}"
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
                                            <a href="{{ route('product_details' ,  ['slug' => $product->name]) }}" onmouseover="this.style.color='#1e40af'"
                                                onmouseout="this.style.color='#2563eb'">
                                                عرض المزيد
                                            </a>
                                        @endif


                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </section>


    <section class="featured-products" style="background-color: #f8f9fa">
        <div class="container">
            <h2 class="section-title">الأكثر مبيعا</h2>

            <!-- Swiper -->
            <div class="swiper mySwiper" id="products-swiper">
                <div class="swiper-wrapper">

                    @foreach ($bestseller as $product)
                        <div class="swiper-slide">
                            <div class="product-card">
                                <div class="product-image">
                                    @php
                                        $images = json_decode($product->image, true) ?? [];
                                    @endphp
                                 
                                        <img loading="lazy" src="{{ $images[0] }}" alt="{{ $product->name }}">
                                    <button class="add-to-cart" data-id="{{ $product->id }}">إضافة للسلة</button>
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title">
                                        <a href="{{ route('product_details'  , ['slug' => $product->name]) }}"
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
                                            <a href="{{ route('product_details'  , ['slug' => $product->name]) }}"
                                                style="margin-left:8px; color:#2563eb; font-weight:500; transition:color 0.2s;"
                                                onmouseover="this.style.color='#1e40af'"
                                                onmouseout="this.style.color='#2563eb'">
                                                عرض المزيد
                                            </a>
                                        @endif


                                    </p>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- كرر باقي المنتجات هنا بنفس الشكل -->
                    {{-- <div class="swiper-slide">
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
                    </div>
                    <div class="swiper-slide">
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
                    </div>
                    <div class="swiper-slide">
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
                    </div>
                    <div class="swiper-slide">
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
                    </div>
                    <div class="swiper-slide">
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
                    </div>
                    <div class="swiper-slide">
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
                    </div>
                    <div class="swiper-slide">
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
                    </div>
                    <div class="swiper-slide">
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
                    </div>
                    <div class="swiper-slide">
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
                    </div> --}}

                </div>
            </div>

        </div>
    </section>




    <!-- Shopping Cart Sidebar -->
@endsection

@extends('main')
@section('content')
    <!-- Product Detail -->
    <section class="product-detail">
        <div class="container">
            <div class="product-detail-wrapper">
                <div class="product-images">
                    <div class="main-image">
                        <img id="main-product-image" src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Product">
                    </div>
                    <div class="image-thumbnails">
                        <img class="thumbnail active" src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=200" alt="Image 1">
                        <img class="thumbnail" src="https://images.pexels.com/photos/1649771/pexels-photo-1649771.jpeg?auto=compress&cs=tinysrgb&w=200" alt="Image 2">
                        <img class="thumbnail" src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=200" alt="Image 3">
                    </div>
                </div>

                <div class="product-info">
                    <h1 id="product-title">هاتف ذكي فائق الجودة</h1>
                    {{-- <div class="product-rating">
                        <div class="stars">⭐⭐⭐⭐⭐</div>
                        <span>(128 تقييم)</span>
                    </div> --}}
                    
                    <div class="product-price">
                        <span class="current-price" id="product-price">1,299 ر.س</span>
                        {{-- <span class="old-price">1,499 ر.س</span> --}}
                        {{-- <span class="discount">وفر 200 ر.س</span> --}}
                    </div>

                    <div class="product-description" id="product-description">
                        <h3>وصف المنتج</h3>
                        <p>هاتف ذكي بتقنيات متطورة وكاميرا عالية الدقة. يتميز بشاشة عرض رائعة وبطارية تدوم طويلاً. مثالي للاستخدام اليومي والتصوير.</p>
                        
                        <h4>المواصفات:</h4>
                        <ul>
                            <li>شاشة 6.5 بوصة AMOLED</li>
                            <li>كاميرا خلفية ثلاثية 108MP</li>
                            <li>ذاكرة 128GB قابلة للتوسع</li>
                            <li>بطارية 5000mAh</li>
                            <li>نظام Android 13</li>
                        </ul>
                    </div>

                    {{-- <div class="product-options">
                        <div class="option-group">
                            <label>اللون:</label>
                            <div class="color-options">
                                <button class="color-option active" style="background: #000"></button>
                                <button class="color-option" style="background: #fff; border: 1px solid #ddd"></button>
                                <button class="color-option" style="background: #4a90e2"></button>
                                <button class="color-option" style="background: #e74c3c"></button>
                            </div>
                        </div>

                        <div class="option-group">
                            <label>الكمية:</label>
                            <div class="quantity-selector">
                                <button class="quantity-btn" id="decrease-qty">-</button>
                                <span class="quantity" id="quantity">1</span>
                                <button class="quantity-btn" id="increase-qty">+</button>
                            </div>
                        </div>
                    </div> --}}

                    <div class="product-actions">
                        <button class="add-to-cart-btn" id="add-to-cart-detail">إضافة للسلة</button>
                        {{-- <button class="buy-now-btn">اشتري الآن</button> --}}
                        {{-- <button class="wishlist-btn">❤️</button> --}}
                    </div>

                    <div class="product-features">
                        <div class="feature">
                            <span class="icon">🚚</span>
                            <span>شحن مجاني</span>
                        </div>
                        <div class="feature">
                            <span class="icon">↩️</span>
                            <span>إرجاع خلال 14 يوم</span>
                        </div>
                        <div class="feature">
                            <span class="icon">🛡️</span>
                            <span>ضمان سنة</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="featured-products">
        <div class="container">
            <h2 class="section-title">منتجات مشابهة</h2>

            <!-- Swiper -->
            <div class="swiper mySwiper" id="products-swiper">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="test">
                                <button class="add-to-cart">إضافة للسلة</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="{{ route('product_details') }}" style="text-decoration: none; color: inherit;">test</a>
                                </h3>
                                <div class="product-price">100 ر.س</div>
                                <p class="product-description">test</p>
                            </div>
                        </div>
                    </div>

                    <!-- كرر باقي المنتجات هنا بنفس الشكل -->
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

                </div>
            </div>

        </div>
    </section>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const mainImage = document.getElementById("main-product-image");
    const thumbnails = document.querySelectorAll(".thumbnail");

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener("click", function () {
            // تغيير الصورة الرئيسية
            mainImage.src = this.src;

            // إزالة active من الصور الأخرى
            thumbnails.forEach(img => img.classList.remove("active"));

            // إضافة active للصورة المختارة
            this.classList.add("active");
        });
    });
});

    </script>
@endsection
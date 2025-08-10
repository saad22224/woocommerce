@extends('main')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h3 class="hero-title">اكتشف أحدث المنتجات</h3>
            <p class="hero-subtitle">تسوق من أفضل المنتجات بأسعار مميزة وجودة عالية</p>
            <button class="hero-btn">تسوق الآن</button>
        </div>
        <div class="hero-image">
            <img src="https://images.pexels.com/photos/230544/pexels-photo-230544.jpeg?auto=compress&cs=tinysrgb&w=800"
                alt="Shopping">
        </div>
    </section>

    <!-- Services Section -->
    <section class="services">
        <div class="container">
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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

    <style>
        /* Services Section Styles */
        .services {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            padding: 0 20px;
        }

        .service-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #0056b3);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s ease;
        }

        .service-icon svg {
            width: 40px;
            height: 40px;
            color: white;
            transition: all 0.4s ease;
        }

        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(5deg);
            background: linear-gradient(135deg, #0056b3, #004085);
        }

        .service-card:hover .service-icon svg {
            transform: scale(1.1);
        }

        .service-title {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            font-family: 'Cairo', sans-serif;
        }

        .service-description {
            color: #6c757d;
            line-height: 1.8;
            font-size: 16px;
            font-family: 'Cairo', sans-serif;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .services {
                padding: 60px 0;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 0 15px;
            }

            .service-card {
                padding: 30px 20px;
            }

            .service-title {
                font-size: 20px;
            }

            .service-description {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .service-icon {
                width: 70px;
                height: 70px;
            }

            .service-icon svg {
                width: 35px;
                height: 35px;
            }
        }

        /* About Us Section */
        /* About Us Section */
        .about-us {
            padding: 100px 0;
            background: #335;
            position: relative;
            overflow: hidden;
        }

        .about-us::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.05"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.05"/><circle cx="50" cy="10" r="1" fill="%23ffffff" opacity="0.03"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(30px, -30px) rotate(1deg);
            }

            66% {
                transform: translate(-20px, 20px) rotate(-1deg);
            }
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .section-header {
            margin-bottom: 30px;
        }

        .section-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            backdrop-filter: blur(10px);
            margin-bottom: 15px;
        }

        .about-title {
            font-size: 42px;
            font-weight: 800;
            color: white;
            line-height: 1.2;
            font-family: 'Cairo', sans-serif;
            margin-bottom: 0;
        }

        .about-description {
            color: rgba(255, 255, 255, 0.9);
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 40px;
            font-family: 'Cairo', sans-serif;
        }

        .stats-container {
            display: flex;
            gap: 40px;
            margin-bottom: 40px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 800;
            color: #ffd700;
            display: block;
            margin-bottom: 5px;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            font-weight: 500;
        }

        .about-features {
            margin-bottom: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: white;
        }

        .feature-icon {
            background: #4CAF50;
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: bold;
            margin-left: 15px;
            flex-shrink: 0;
        }

        .about-btn {
            background: linear-gradient(135deg, #FF6B6B, #FF8E53);
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 107, 107, 0.3);
        }

        .about-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 107, 107, 0.4);
        }

        .about-image {
            position: relative;
        }

        .image-wrapper {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
        }

        .image-wrapper img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .image-wrapper:hover img {
            transform: scale(1.05);
        }

        .floating-card {
            position: absolute;
            top: 30px;
            right: 30px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: bounce 3s ease-in-out infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .card-icon {
            font-size: 24px;
        }

        .card-text strong {
            display: block;
            color: #333;
            font-weight: 700;
            font-size: 14px;
        }

        .card-text span {
            color: #666;
            font-size: 12px;
        }

        /* About Us Responsive */
        @media (max-width: 968px) {
            .about-content {
                grid-template-columns: 1fr;
                gap: 50px;
                text-align: center;
            }

            .stats-container {
                justify-content: center;
            }

            .about-title {
                font-size: 32px;
            }
        }

        @media (max-width: 768px) {
            .about-us {
                padding: 60px 0;
            }

            .stats-container {
                gap: 20px;
            }

            .stat-number {
                font-size: 28px;
            }

            .floating-card {
                position: static;
                margin-top: 20px;
                justify-content: center;
            }
        }
    </style>

    <!-- About Us Section -->
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
                        <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=800"
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


    <section class="featured-products" style="background-color: #f8f9fa">
        <div class="container">
            <h2 class="section-title">الأكثر مبيعا</h2>

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
                                    <a href="#" style="text-decoration: none; color: inherit;">test</a>
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



    <!-- Shopping Cart Sidebar -->
    <div class="cart-sidebar" id="cart-sidebar">
        <div class="cart-header">
            <h3>سلة التسوق</h3>
            <button class="close-cart" id="close-cart">×</button>
        </div>
        <div class="cart-items" id="cart-items">
            <p class="empty-cart">السلة فارغة</p>
        </div>
        <div class="cart-footer">
            <div class="cart-total">
                <strong>الإجمالي: <span id="cart-total">0</span> ر.س</strong>
            </div>
            <button class="checkout-btn" onclick="location.href='checkout.html'">إتمام الشراء</button>
        </div>
    </div>

    <!-- Cart Overlay -->
    <div class="cart-overlay" id="cart-overlay"></div>
@endsection

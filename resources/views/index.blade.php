@extends('main')


@section('content')

{{-- <h1>hello</h1> --}}

  <div id="homePage" class="page active">
            <!-- Hero Section -->
            <section class="hero">
                <div class="container">
                    <div class="hero-content">
                        <div class="hero-text">
                            <h1>مرحباً بك في متجر الإلكترونيات</h1>
                            <p>اكتشف أحدث المنتجات التقنية بأفضل الأسعار</p>
                            <button class="cta-btn" onclick="showPage('category', 'electronics')">تسوق الآن</button>
                        </div>
                        <div class="hero-image">
                            <img src="https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=600"
                                alt="منتجات إلكترونية">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Featured Categories -->
            <section class="featured-categories">
                <div class="container">
                    <h2>الأقسام الرئيسية</h2>
                    <div class="categories-grid">
                        <div class="category-card" onclick="showPage('category', 'electronics')">
                            <div class="category-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2" stroke="currentColor"
                                        stroke-width="2" />
                                    <line x1="8" y1="21" x2="16" y2="21" stroke="currentColor" stroke-width="2" />
                                    <line x1="12" y1="17" x2="12" y2="21" stroke="currentColor" stroke-width="2" />
                                </svg>
                            </div>
                            <h3>إلكترونيات</h3>
                            <p>أجهزة إلكترونية متنوعة</p>
                        </div>
                        <div class="category-card" onclick="showPage('category', 'phones')">
                            <div class="category-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="5" y="2" width="14" height="20" rx="2" ry="2" stroke="currentColor"
                                        stroke-width="2" />
                                    <line x1="12" y1="18" x2="12.01" y2="18" stroke="currentColor" stroke-width="2" />
                                </svg>
                            </div>
                            <h3>هواتف ذكية</h3>
                            <p>أحدث الهواتف الذكية</p>
                        </div>
                        <div class="category-card" onclick="showPage('category', 'accessories')">
                            <div class="category-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M19 10v2a7 7 0 0 1-14 0v-2" stroke="currentColor" stroke-width="2" />
                                    <line x1="12" y1="19" x2="12" y2="23" stroke="currentColor" stroke-width="2" />
                                    <line x1="8" y1="23" x2="16" y2="23" stroke="currentColor" stroke-width="2" />
                                </svg>
                            </div>
                            <h3>إكسسوارات</h3>
                            <p>إكسسوارات متنوعة</p>
                        </div>
                        <div class="category-card" onclick="showPage('category', 'computers')">
                            <div class="category-icon">
                                <svg width="48" height="48" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2" stroke="currentColor"
                                        stroke-width="2" />
                                    <line x1="8" y1="21" x2="16" y2="21" stroke="currentColor" stroke-width="2" />
                                    <line x1="12" y1="17" x2="12" y2="21" stroke="currentColor" stroke-width="2" />
                                </svg>
                            </div>
                            <h3>أجهزة كمبيوتر</h3>
                            <p>لابتوب وأجهزة كمبيوتر</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Latest Products -->
            <section class="latest-products">
                <div class="container">
                    <h2>أحدث المنتجات</h2>
                    <div class="products-grid" id="latestProductsGrid">
                        <!-- Products will be loaded here -->
                    </div>
                </div>
            </section>
        </div>
@endsection
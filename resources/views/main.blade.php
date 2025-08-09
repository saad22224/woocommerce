<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجري الإلكتروني - أحدث المنتجات</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <h2>متجري 🛍️</h2>
            </div>

            <div class="nav-menu" id="nav-menu">
                <a href="index.html" class="nav-link active">الرئيسية</a>
                <a href="products.html" class="nav-link">المنتجات</a>
                <div class="dropdown">
                    <a href="#" class="nav-link">الأقسام ▼</a>
                    <div class="dropdown-content">
                        <a href="products.html?category=electronics">إلكترونيات</a>
                        <a href="products.html?category=fashion">أزياء</a>
                        <a href="products.html?category=home">منزل</a>
                        <a href="products.html?category=books">كتب</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-link">تواصل معنا</a>
                @auth

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button
                            style="border: none ; background: none ; 
                        cursor: pointer ;     color: white;
    text-decoration: none;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    transition: all 0.3s ease;
    font-size: 1rem;"
                            class="nav-link">تسجيل الخروج</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">تسجيل حساب</a> <a href="{{ route('login') }}"
                        class="nav-link">تسجيل الدخول</a>
                @endauth
            </div>

            <div class="nav-actions">
                <button class="cart-btn" id="cart-btn">
                    🛒 <span id="cart-count">0</span>
                </button>
                <div class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    <style>
        .payment-icons img {
            height: 25px;
            margin-top: 10px;
            margin-right: 8px;
            background: #fff;
            padding: 3px;
            border-radius: 4px;
        }

        .secure-pay {
            font-size: 13px;
            color: #ccc;
            margin-top: 8px;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #f1f1f1;
            border-radius: 50%;
            color: #333;
            font-size: 18px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">

                <!-- About -->
                <div class="footer-section about">
                    <h4>متجري</h4>
                    <p>أفضل متجر إلكتروني للتسوق الآمن والموثوق. نقدم منتجات أصلية بأسعار تنافسية مع خدمة توصيل سريعة
                        ودعم على مدار الساعة.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section links">
                    <h4>روابط سريعة</h4>
                    <ul>
                        <li><a href="index.html">الرئيسية</a></li>
                        <li><a href="products.html">المنتجات</a></li>
                        <li><a href="offers.html">العروض</a></li>
                        <li><a href="contact.html">تواصل معنا</a></li>
                        <li><a href="faq.html">الأسئلة الشائعة</a></li>
                    </ul>
                </div>

                <!-- My Account -->
                <div class="footer-section account">
                    <h4>حسابي</h4>
                    <ul>
                        <li><a href="login.html">تسجيل الدخول</a></li>
                        <li><a href="register.html">إنشاء حساب</a></li>
                        <li><a href="orders.html">طلباتي</a></li>
                        <li><a href="wishlist.html">قائمة المفضلة</a></li>
                    </ul>
                </div>

                <!-- Policies -->
                <div class="footer-section policy">
                    <h4>سياساتنا</h4>
                    <ul>
                        <li><a href="shipping.html">سياسة الشحن</a></li>
                        <li><a href="returns.html">سياسة الإرجاع</a></li>
                        <li><a href="privacy.html">سياسة الخصوصية</a></li>
                        <li><a href="terms.html">الشروط والأحكام</a></li>
                    </ul>
                </div>

                <!-- Payment & Security -->
                <div class="footer-section payment">
                    <h4>طرق الدفع</h4>
                    <div class="payment-icons">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b7/MasterCard_Logo.svg"
                            alt="MasterCard">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg"
                            alt="Apple Pay">
                    </div>
                    <p class="secure-pay">🔒 الدفع آمن 100% عبر بروتوكولات مشفرة</p>
                </div>

            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 متجري الإلكتروني. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>


    <script src="script.js"></script>
</body>

</html>


@extends('main')
@section('content')

    <!-- Checkout Steps -->
    <section class="checkout-steps">
        <div class="container">
            <div class="steps">
                <div class="step active">
                    <span class="step-number">1</span>
                    <span class="step-title">السلة</span>
                </div>
                <div class="step active">
                    <span class="step-number">2</span>
                    <span class="step-title">معلومات الشحن</span>
                </div>
                <div class="step">
                    <span class="step-number">3</span>
                    <span class="step-title">الدفع</span>
                </div>
                <div class="step">
                    <span class="step-number">4</span>
                    <span class="step-title">تأكيد الطلب</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkout Content -->
    <section class="checkout-section">
        <div class="container">
            <div class="checkout-wrapper">
                <!-- Checkout Form -->
                <div class="checkout-form">
                    <h2>معلومات الشحن</h2>
                    <form id="checkout-form">
                        <div class="form-section">
                            <h3>معلومات شخصية</h3>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="firstName">الاسم الأول *</label>
                                    <input type="text" id="firstName" name="firstName" required>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">اسم العائلة *</label>
                                    <input type="text" id="lastName" name="lastName" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="email">البريد الإلكتروني *</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">رقم الهاتف *</label>
                                    <input type="tel" id="phone" name="phone" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3>عنوان الشحن</h3>
                            <div class="form-group">
                                <label for="address">العنوان *</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="city">المدينة *</label>
                                    <select id="city" name="city" required>
                                        <option value="">اختر المدينة</option>
                                        <option value="riyadh">الرياض</option>
                                        <option value="jeddah">جدة</option>
                                        <option value="dammam">الدمام</option>
                                        <option value="mecca">مكة المكرمة</option>
                                        <option value="medina">المدينة المنورة</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="district">الحي *</label>
                                    <input type="text" id="district" name="district" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="postalCode">الرمز البريدي</label>
                                <input type="text" id="postalCode" name="postalCode">
                            </div>
                        </div>

                       <div class="form-section">
    <h3>طريقة الدفع</h3>
    <div class="payment-methods">
        
        <!-- الدفع عند الاستلام -->
        <label class="payment-method">
            <input type="radio" name="payment" value="cod" checked>
            <div class="method-info">
                <span class="method-icon"><i class="fas fa-money-bill-wave"></i></span>
                <span class="method-title">الدفع عند الاستلام</span>
                {{-- <span class="payment-icons">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-apple-pay"></i>
                    <i class="fas fa-credit-card"></i>
                </span> --}}
            </div>
        </label>

        <!-- تمارا -->
        <label class="payment-method">
            <input type="radio" name="payment" value="tamara">
            <div class="method-info">
                <span class="method-icon"><i class="fas fa-wallet"></i></span>
                <span class="method-title">تمارا</span>
                <span class="payment-icons">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-apple-pay"></i>
                </span>
            </div>
        </label>

    </div>
</div>

                        <div class="form-section card-details" id="card-details">
                            <h3>بيانات البطاقة</h3>
                            <div class="form-group">
                                <label for="cardNumber">رقم البطاقة *</label>
                                <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456">
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="expiry">تاريخ الانتهاء *</label>
                                    <input type="text" id="expiry" name="expiry" placeholder="MM/YY">
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV *</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="123">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cardName">اسم حامل البطاقة *</label>
                                <input type="text" id="cardName" name="cardName">
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="order-summary">
                    <h3>ملخص الطلب</h3>
                    <div class="summary-items" id="summary-items">
                        <!-- Order items will be loaded here -->
                    </div>
                    
                    <div class="summary-totals">
                        <div class="summary-row">
                            <span>المجموع الفرعي:</span>
                            <span id="subtotal">0 ر.س</span>
                        </div>
                        <div class="summary-row">
                            <span>الشحن:</span>
                            <span id="shipping">مجاني</span>
                        </div>
                        <div class="summary-row">
                            <span>الضريبة (15%):</span>
                            <span id="tax">0 ر.س</span>
                        </div>
                        <div class="summary-row total">
                            <span>الإجمالي:</span>
                            <span id="final-total">0 ر.س</span>
                        </div>
                    </div>

                    {{-- <div class="promo-code">
                        <input type="text" placeholder="كود الخصم" id="promo-input">
                        <button type="button" id="apply-promo">تطبيق</button>
                    </div> --}}

                    <button class="place-order-btn" id="place-order">تأكيد الطلب</button>

                    <div class="security-info">
                        <p>🔒 معاملتك آمنة ومشفرة</p>
                        <div class="payment-logos">
                            <span>💳</span>
                            <span>🏦</span>
                            <span>📱</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
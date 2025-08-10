@extends('main')

@section('content')
    <style>

    </style>
    <!-- Contact Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>تواصل معنا</h1>
            <p>نحن هنا لمساعدتك في أي وقت</p>
        </div>
    </section>

    <!-- Contact Section -->
  <section class="contact-section">
    <div class="container">
        <div class="contact-wrapper">
            <!-- Contact Info -->
            <div class="contact-info">
                <h3>معلومات التواصل</h3>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="contact-details">
                        <h4>العنوان</h4>
                        <p>الرياض، المملكة العربية السعودية<br>
                            حي العليا، طريق الملك فهد</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-phone"></i></div>
                    <div class="contact-details">
                        <h4>الهاتف</h4>
                        <p>+966 50 123 4567<br>
                           +966 11 234 5678</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                    <div class="contact-details">
                        <h4>البريد الإلكتروني</h4>
                        <p>info@mystore.com<br>
                           support@mystore.com</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-clock"></i></div>
                    <div class="contact-details">
                        <h4>ساعات العمل</h4>
                        <p>السبت - الخميس: 9 صباحاً - 10 مساءً<br>
                           الجمعة: 2 ظهراً - 10 مساءً</p>
                    </div>
                </div>

                <div class="social-links">
                    <h4>تابعنا على</h4>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-x-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h3>أرسل لنا رسالة</h3>
                <form id="contact-form">
                    <div class="form-group">
                        <label for="name">الاسم الكامل *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">البريد الإلكتروني *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-group">
                        <label for="subject">الموضوع *</label>
                        <select id="subject" name="subject" required>
                            <option value="">اختر الموضوع</option>
                            <option value="general">استفسار عام</option>
                            <option value="order">استفسار عن طلب</option>
                            <option value="complaint">شكوى</option>
                            <option value="suggestion">اقتراح</option>
                            <option value="technical">مشكلة تقنية</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">الرسالة *</label>
                        <textarea id="message" name="message" rows="5" required placeholder="اكتب رسالتك هنا..."></textarea>
                    </div>

                    <button type="submit" class="submit-btn">إرسال الرسالة</button>
                </form>
            </div>
        </div>
    </div>
</section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2>الأسئلة الشائعة</h2>
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <h4>ما هي طرق الدفع المتاحة؟</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>نقبل جميع بطاقات الائتمان، التحويل البنكي، والدفع عند الاستلام في المدن الرئيسية.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>كم تستغرق عملية التوصيل؟</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>التوصيل داخل الرياض خلال 24 ساعة، وباقي المدن خلال 2-5 أيام عمل.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>هل يمكنني إرجاع المنتج؟</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>نعم، يمكنك إرجاع المنتج خلال 14 يوم من تاريخ الاستلام في حالته الأصلية.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>هل التوصيل مجاني؟</h4>
                        <span class="faq-toggle">+</span>
                    </div>
                    <div class="faq-answer">
                        <p>التوصيل مجاني للطلبات التي تزيد عن 200 ريال سعودي.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const faqItems = document.querySelectorAll(".faq-item");

            faqItems.forEach(item => {
                const question = item.querySelector(".faq-question");
                const answer = item.querySelector(".faq-answer");
                const toggle = item.querySelector(".faq-toggle");

                question.addEventListener("click", () => {
                    // قفل الباقي
                    faqItems.forEach(i => {
                        if (i !== item) {
                            i.querySelector(".faq-answer").classList.remove("active");
                            i.querySelector(".faq-toggle").textContent = "+";
                        }
                    });

                    // فتح/غلق الحالي
                    answer.classList.toggle("active");
                    toggle.textContent = answer.classList.contains("active") ? "-" : "+";
                });
            });
        });
    </script>
@endsection

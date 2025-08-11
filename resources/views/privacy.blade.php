@extends('main')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>سياسة الخصوصية</h1>
            {{-- <p>اكتشف مجموعتنا الواسعة من المنتجات المميزة</p> --}}
        </div>
    </section>

    <!-- Cheerly Live - Privacy Policy Section (RTL, right-aligned)
             Copy the <section> into your page where you want the privacy policy to appear.
             Uses Google Font 'Cairo' for Arabic typography.
        -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <section id="cheerly-privacy" dir="rtl" aria-labelledby="privacy-title" style="font-family: 'Cairo', sans-serif;">
        <style>
            /* Section styles (self-contained) */
            #cheerly-privacy .wrap {
                max-width: 900px;
                margin: 40px auto;
                padding: 28px;
                background: linear-gradient(180deg, rgba(255, 255, 255, 0.98), #fbfbfb);
                border-radius: 14px;
                box-shadow: 0 10px 30px rgba(17, 24, 39, 0.06);
                border: 1px solid rgba(15, 23, 42, 0.04);
            }

            /* Right-side vertical accent */
            #cheerly-privacy .accent {
                float: left;
                /* because direction is rtl, float left visually becomes a right-side stripe */
                width: 6px;
                height: 100%;
                background: linear-gradient(180deg, #16a34a, #06b6d4);
                border-radius: 8px;
                margin-left: 18px;
            }

            #cheerly-privacy h2 {
                font-size: 22px;
                margin: 0 0 8px 0;
                font-weight: 700;
                color: #0f172a;
            }

            #cheerly-privacy .subtitle {
                font-size: 14px;
                color: #475569;
                margin-bottom: 18px;
            }

            #cheerly-privacy ol {
                margin: 0;
                padding: 0 18px;
                list-style: none;
                counter-reset: item;
            }

            #cheerly-privacy li {
                margin: 18px 0;
                padding-right: 6px;
                text-align: right;
                line-height: 1.6;
                color: #0f172a;
                position: relative;
            }

            /* Number badge */
            #cheerly-privacy li::before {
                counter-increment: item;
                content: counter(item);
                position: absolute;
                right: -54px;
                top: 6px;
                background: #ecfdf5;
                color: #065f46;
                width: 38px;
                height: 38px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border-radius: 10px;
                font-weight: 700;
                box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
            }

            #cheerly-privacy p,
            #cheerly-privacy li p {
                margin: 8px 0 0 0;
                color: #475569;
            }

            @media (max-width: 640px) {
                #cheerly-privacy .wrap {
                    padding: 20px;
                    margin: 20px
                }

                #cheerly-privacy li::before {
                    right: -44px;
                    width: 34px;
                    height: 34px
                }
            }
        </style>

        <div class="wrap">
            <div class="accent" aria-hidden="true"></div>

            <header>
                <h2 id="privacy-title">سياسة الخصوصية </h2>
                <p class="subtitle"> نولي أهمية قصوى لحماية خصوصيتك وضمان سرية بياناتك. توضح هذه
                    السياسة كيفية جمع المعلومات واستخدامها ومشاركتها عند زيارتك لموقعنا أو إجراء عملية شراء من خلاله.</p>
            </header>

            <ol>
                <li>
                    <strong>1. المعلومات التي نقوم بجمعها</strong>
                    <p>عند استخدامك لمتجرنا، قد نقوم بجمع المعلومات التالية:</p>
                    <p>- الاسم الكامل</p>
                    <p>- عنوان البريد الإلكتروني</p>
                    <p>- رقم الجوال</p>
                    <p>- عنوان الشحن والتوصيل</p>
                    <p>- تفاصيل الدفع (بطريقة آمنة ومشفرة)</p>
                    <p>- سجل الطلبات والتفاعل مع الموقع</p>
                </li>

                <li>
                    <strong>2. كيفية استخدام المعلومات</strong>
                    <p>نستخدم المعلومات التي نجمعها للأغراض التالية:</p>
                    <p>- معالجة الطلبات وتأكيد الشراء</p>
                    <p>- تحسين تجربة المستخدم داخل الموقع</p>
                    <p>- التواصل معك بشأن العروض أو التحديثات المتعلقة بالطلب</p>
                    <p>- لأغراض تحليلية وتطوير خدماتنا</p>
                </li>

                <li>
                    <strong>3. حماية البيانات</strong>
                    <p>نلتزم باتخاذ التدابير الأمنية اللازمة لحماية بياناتك من الوصول غير المصرح به أو التعديل أو الإتلاف.
                        كما أن جميع بيانات الدفع تتم من خلال بوابات دفع آمنة معتمدة وبتشفير تام.</p>
                </li>

                <li>
                    <strong>4. مشاركة المعلومات</strong>
                    <p>لا نبيع أو نشارك بياناتك الشخصية مع أي طرف ثالث، باستثناء الحالات التالية:</p>
                    <p>- شركاء الشحن لتوصيل المنتجات</p>
                    <p>- مزودي خدمات الدفع لإتمام العمليات المالية</p>
                    <p>- عند طلب قانوني من الجهات المختصة</p>
                </li>

                <li>
                    <strong>5. ملفات تعريف الارتباط (Cookies)</strong>
                    <p>يستخدم متجرنا ملفات تعريف الارتباط لتحسين تجربة التصفح وتخصيص المحتوى. يمكنك التحكم بها من خلال
                        إعدادات المتصفح الخاص بك.</p>
                </li>

                <li>
                    <strong>6. حقوق المستخدم</strong>
                    <p>يحق لك:</p>
                    <p>- طلب الوصول إلى البيانات التي نحتفظ بها عنك</p>
                    <p>- تعديل أو تصحيح بياناتك</p>
                    <p>- طلب حذف حسابك أو بياناتك (باستثناء ما نحتفظ به لأغراض قانونية أو مالية)</p>
                </li>

                <li>
                    <strong>7. تحديثات سياسة الخصوصية</strong>
                    <p>قد نقوم بتحديث سياسة الخصوصية بين الحين والآخر. وسيتم نشر أي تغييرات في هذه الصفحة مع تحديث تاريخ
                        المراجعة.</p>
                </li>
            </ol>

        </div>
    </section>
@endsection

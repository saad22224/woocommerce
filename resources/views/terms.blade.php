@extends('main')

@section('content')
   <section class="page-header">
        <div class="container">
            <h1>الشروط والأحكام</h1>
            {{-- <p>اكتشف مجموعتنا الواسعة من المنتجات المميزة</p> --}}
        </div>
    </section>

    <!-- Cheerly Live - Terms Section (RTL, right-aligned)
     Copy the <section> into your page where you want the terms to appear.
     Uses Google Font 'Cairo' for Arabic typography.
-->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
<section id="cheerly-terms" dir="rtl" aria-labelledby="terms-title" style="font-family: 'Cairo', sans-serif;">
  <style>
    /* Section styles (self-contained) */
    #cheerly-terms .terms-wrap{
      max-width: 900px;
      margin: 40px auto;
      padding: 28px;
      background: linear-gradient(180deg, rgba(255,255,255,0.98), #fbfbfb);
      border-radius: 14px;
      box-shadow: 0 10px 30px rgba(17,24,39,0.06);
      border: 1px solid rgba(15,23,42,0.04);
    }

    /* Right-side vertical accent */
    #cheerly-terms .accent{
      float: left; /* because direction is rtl, float left visually becomes a right-side stripe */
      width: 6px;
      height: 100%;
      background: linear-gradient(180deg,#7c3aed,#06b6d4);
      border-radius: 8px;
      margin-left: 18px;
    }

    #cheerly-terms h2{
      font-size: 22px;
      margin: 0 0 8px 0;
      font-weight: 700;
      color: #0f172a;
    }

    #cheerly-terms .subtitle{
      font-size: 14px;
      color: #475569;
      margin-bottom: 18px;
    }

    #cheerly-terms ol{
      margin: 0;
      padding: 0 18px;
      list-style: none;
      counter-reset: item;
    }

    #cheerly-terms li{
      margin: 18px 0;
      padding-right: 6px; /* keep text away from the right edge */
      text-align: right;
      line-height: 1.6;
      color: #0f172a;
      background: transparent;
      position: relative;
    }

    /* Number badge */
    #cheerly-terms li::before{
      counter-increment: item;
      content: counter(item);
      position: absolute;
      right: -54px; /* positions the badge to the right of the list text */
      top: 6px;
      background: #eef2ff;
      color: #3730a3;
      width: 38px;
      height: 38px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      border-radius: 10px;
      font-weight: 700;
      box-shadow: 0 6px 18px rgba(15,23,42,0.05);
    }

    #cheerly-terms p{
      margin: 8px 0 0 0;
      color: #475569;
    }

    /* Responsive */
    @media (max-width: 640px){
      #cheerly-terms .terms-wrap{padding:20px;margin:20px}
      #cheerly-terms li::before{right:-44px; width:34px; height:34px}
    }
  </style>

  <div class="terms-wrap">
    <div class="accent" aria-hidden="true"></div>

    <header>
      <h2 id="terms-title">الشروط والأحكام – Cheerly Live</h2>
      <p class="subtitle">يرجى قراءة هذه الشروط بعناية قبل استخدام متجر Cheerly Live. بدخولك إلى موقعنا أو استخدامك لأي من خدماتنا، فإنك توافق على الالتزام بالشروط والأحكام التالية:</p>
    </header>

    <ol>
      <li>
        <strong> القبول بالشروط</strong>
        <p>باستخدامك لموقع Cheerly Live، فإنك توافق على الالتزام بهذه الشروط والأحكام، وعلى التقيد بجميع الأنظمة والقوانين المعمول بها في المملكة. إذا كنت لا توافق على أي من هذه الشروط، يُرجى الامتناع عن استخدام الموقع.</p>
      </li>

      <li>
        <strong> المنتجات والأسعار</strong>
        <p>- جميع المنتجات المعروضة في المتجر تتعلق بمجال الإلكترونيات وتخضع للتحديث المستمر لضمان الجودة والمواكبة.</p>
        <p>- الأسعار تشمل ضريبة القيمة المضافة (إن وُجدت).</p>
        <p>- رغم حرصنا على دقة المعلومات، قد توجد فروقات بسيطة بين صور المنتجات ووصفها الفعلي.</p>
        <p>- تحتفظ Cheerly Live بحق تعديل الأسعار أو تغييرها في أي وقت دون إشعار مسبق.</p>
      </li>

      <li>
        <strong> الطلبات والدفع</strong>
        <p>- نحتفظ بالحق في قبول أو إلغاء أي طلب في حال وجود خطأ في البيانات أو عدم توفر المنتج.</p>
        <p>- الدفع يتم عبر وسائل الدفع الإلكترونية الآمنة المتوفرة في المتجر.</p>
        <p>- العميل مسؤول عن إدخال معلومات الشحن بشكل دقيق لتفادي التأخير أو الخطأ في التوصيل.</p>
      </li>

      <li>
        <strong> الشحن والتوصيل</strong>
        <p>- يتم تجهيز وشحن الطلبات خلال المدة الموضحة في صفحة الدفع، وتختلف حسب المنطقة الجغرافية.</p>
        <p>- لا تتحمل Cheerly Live مسؤولية التأخير الناتج عن شركات الشحن، ولكننا نتابع مع العميل لضمان استلام المنتج.</p>
      </li>

      <li>
        <strong> حقوق الملكية الفكرية</strong>
        <p>- جميع محتويات الموقع بما فيها (النصوص، الصور، التصاميم، الشعارات، المحتوى الرقمي) هي ملك حصري لمتجر Cheerly Live.</p>
        <p>- لا يجوز استخدام أو نسخ أو إعادة نشر أي من المحتويات دون إذن كتابي مسبق.</p>
      </li>

      <li>
        <strong> التعديلات على الشروط</strong>
        <p>يحتفظ متجر Cheerly Live بالحق في تعديل هذه الشروط والأحكام في أي وقت. سيتم نشر النسخة المحدثة على الموقع، ويُعد استمرارك في استخدام الموقع موافقة ضمنية على تلك التعديلات.</p>
      </li>
    </ol>

  </div>
</section>


@endsection
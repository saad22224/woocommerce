@extends('main')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1>سياسة الإستبدال والإسترجاع</h1>
            {{-- <p>اكتشف مجموعتنا الواسعة من المنتجات المميزة</p> --}}
        </div>
    </section>

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
<section id="terms-section" dir="rtl" aria-labelledby="terms-title" style="font-family: 'Cairo', sans-serif;">
  <style>
    #terms-section .wrap{
      max-width: 900px;
      margin: 40px auto;
      padding: 28px;
      background: linear-gradient(180deg, rgba(255,255,255,0.98), #fbfbfb);
      border-radius: 14px;
      box-shadow: 0 10px 30px rgba(17,24,39,0.06);
      border: 1px solid rgba(15,23,42,0.04);
    }
    #terms-section .accent{
      float: left;
      width: 6px;
      height: 100%;
      background: linear-gradient(180deg,#16a34a,#06b6d4);
      border-radius: 8px;
      margin-left: 18px;
    }
    #terms-section h2{
      font-size: 22px;
      margin: 0 0 8px 0;
      font-weight: 700;
      color: #0f172a;
    }
    #terms-section .subtitle{
      font-size: 14px;
      color: #475569;
      margin-bottom: 18px;
    }
    #terms-section ol{
      margin: 0;
      padding: 0 18px;
      list-style: none;
      counter-reset: item;
    }
    #terms-section li{
      margin: 18px 0;
      padding-right: 6px;
      text-align: right;
      line-height: 1.6;
      color: #0f172a;
      position: relative;
    }
    #terms-section li::before{
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
      box-shadow: 0 6px 18px rgba(15,23,42,0.05);
    }
    #terms-section p, #terms-section li p{
      margin: 8px 0 0 0;
      color: #475569;
    }
    @media (max-width: 640px){
      #terms-section .wrap{padding:20px;margin:20px}
      #terms-section li::before{right:-44px; width:34px; height:34px}
    }
  </style>

  <div class="wrap">
    <div class="accent" aria-hidden="true"></div>

    <header>
      <h2 id="terms-title">سياسة الاستبدال والاسترجاع</h2>
      <p class="subtitle">رضاكم هو أولويتنا. نلتزم بتوفير تجربة تسوق موثوقة ومريحة، ولذلك نمنحك الحق في الاستبدال أو الاسترجاع وفقًا للشروط التالية:</p>
    </header>

    <ol>
      <li>
        <strong>أولاً: شروط الاسترجاع</strong>
        <p>- يحق طلب استرجاع المنتج خلال 7 أيام من تاريخ الاستلام.</p>
        <p>- يجب أن يكون المنتج في حالته الأصلية وغير مستخدم، مع كامل التغليف والملحقات.</p>
        <p>- لا يُقبل استرجاع المنتجات التي تم استخدامها أو فتح تغليفها بشكل يخل بحالة المنتج.</p>
        <p>- لا يشمل الاسترجاع المنتجات المخفضة ضمن العروض أو التصفية النهائية إلا في حالة وجود خلل مصنعي.</p>
      </li>

      <li>
        <strong>ثانياً: شروط الاستبدال</strong>
        <p>- يحق طلب استبدال المنتج خلال 7 أيام من تاريخ الاستلام.</p>
        <p>- يجب أن يكون المنتج غير مستخدم وفي حالته الأصلية.</p>
        <p>- يتم الاستبدال في حال:</p>
        <p>استلام منتج غير مطابق لما تم طلبه.</p>
        <p>وجود عيب أو تلف مصنعي مثبت بالصور.</p>
        <p>خطأ في المقاس أو اللون بسببنا.</p>
      </li>

      <li>
        <strong>ثالثاً: خطوات تقديم طلب الاسترجاع أو الاستبدال</strong>
        <p>- التواصل عبر صفحة اتصل بنا أو البريد الإلكتروني مع رقم الطلب والتفاصيل.</p>
        <p>- إرسال صور المنتج وتفاصيل المشكلة.</p>
        <p>- مراجعة الطلب خلال 2-3 أيام عمل.</p>
        <p>- في حال الموافقة، يتم ترتيب الشحن أو تحويل المبلغ حسب الطريقة المناسبة.</p>
      </li>

      <li>
        <strong>رابعاً: سياسة الشحن والتكاليف</strong>
        <p>- في حال كان الخطأ من المتجر، يتحمل تكلفة الشحن بالكامل.</p>
        <p>- في حال رغبة العميل في الاستبدال أو الإرجاع دون وجود خطأ، يتحمل رسوم الشحن.</p>
      </li>

      <li>
        <strong>خامساً: المبالغ المسترجعة</strong>
        <p>- يتم استرداد المبلغ إلى وسيلة الدفع الأصلية خلال 7-10 أيام عمل بعد استلام المنتج وفحصه.</p>
        <p>- لا تُسترد الرسوم الإضافية مثل رسوم الدفع عند الاستلام أو الشحن (إلا في حال كان الخطأ من المتجر).</p>
      </li>
    </ol>
  </div>
</section>

@endsection

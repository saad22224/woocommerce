<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('home', absolute: false), navigate: true);
    }
};
?>


<div dir="rtl" class="min-h-screen flex items-center justify-center p-6 auth-background">
    <style>
        /* خلفية وردية متدرجة بدلاً من الخلفية الزرقاء */
        .auth-background {
            background: linear-gradient(135deg, #ffeef8 0%, #f8f4ff 50%, #fff0f5 100%);
            position: relative;
            overflow: hidden;
        }

        /* نقاط ديكورية وردية في الخلفية */
        .auth-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,105,180,0.1)"/><circle cx="80" cy="80" r="3" fill="rgba(255,182,193,0.1)"/><circle cx="40" cy="70" r="1" fill="rgba(255,192,203,0.1)"/><circle cx="60" cy="30" r="1.5" fill="rgba(255,105,180,0.08)"/></svg>');
        }

        /* أنيميشن البطاقة */
        @keyframes fadeUpScale {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }

            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* أنيميشن الحقول - بألوان وردية */
        @keyframes inputFocus {
            0% {
                box-shadow: 0 0 0 rgba(255, 105, 180, 0);
                transform: scale(1);
                border-color: rgba(255, 182, 193, 0.5);
            }

            100% {
                box-shadow: 0 0 25px rgba(255, 105, 180, 0.3), 0 0 50px rgba(255, 182, 193, 0.2);
                transform: scale(1.02);
                border-color: rgba(255, 105, 180, 0.8);
            }
        }

        /* تأثير الكتابة في الإنبت - وردي */
        @keyframes inputType {
            0% {
                box-shadow: inset 0 0 0 rgba(255, 105, 180, 0);
            }

            100% {
                box-shadow: inset 0 0 20px rgba(255, 182, 193, 0.15);
            }
        }

        /* أنيميشن اللابل - وردي */
        @keyframes labelFloat {
            0% {
                transform: translateY(0px);
                color: rgba(255, 105, 180, 0.7);
            }

            100% {
                transform: translateY(-5px);
                color: rgba(255, 105, 180, 1);
            }
        }

        /* أنيميشن النص - توهج وردي */
        @keyframes textGlow {

            0%,
            100% {
                text-shadow: 0 0 10px rgba(255, 105, 180, 0.3);
            }

            50% {
                text-shadow: 0 0 20px rgba(255, 105, 180, 0.6), 0 0 30px rgba(255, 182, 193, 0.4);
            }
        }

        /* أنيميشن الزر - وردي */
        @keyframes buttonPulse {
            0% {
                transform: scale(1);
                box-shadow: 0 8px 25px rgba(255, 105, 180, 0.4);
            }

            50% {
                transform: scale(1.05);
                box-shadow: 0 12px 35px rgba(255, 105, 180, 0.6);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 8px 25px rgba(255, 105, 180, 0.4);
            }
        }

        .auth-card {
            animation: fadeUpScale 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 182, 193, 0.3);
            position: relative;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.85);
            box-shadow: 0 20px 60px rgba(255, 182, 193, 0.3);
        }

        .auth-input {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background: rgba(255, 255, 255, 0.7);
            border: 2px solid rgba(255, 182, 193, 0.4);
            color: #555;
        }

        .auth-input::placeholder {
            color: rgba(255, 105, 180, 0.6);
        }

        .auth-input:focus {
            animation: inputFocus 0.4s ease-out forwards;
            background: rgba(255, 255, 255, 0.9);
        }

        .auth-input:not(:placeholder-shown) {
            animation: inputType 0.3s ease-out forwards;
        }

        /* تأثير خاص للإنبت عند الكتابة - وردي */
        .auth-input:focus:not(:placeholder-shown) {
            box-shadow:
                0 0 25px rgba(255, 105, 180, 0.3),
                0 0 50px rgba(255, 182, 193, 0.2),
                inset 0 0 20px rgba(255, 182, 193, 0.1);
            border-color: rgba(255, 105, 180, 0.9);
        }

        /* تأثير الريبل عند الكليك - وردي */
        .auth-input::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 182, 193, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
            pointer-events: none;
            z-index: 1;
        }

        .auth-input:focus::before {
            width: 100%;
            height: 100%;
        }

        .welcome-text {
            animation: textGlow 3s ease-in-out infinite;
            background: linear-gradient(135deg, #ff69b4, #ff8fa3, #ffb6c1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .auth-button {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #ff69b4, #ffb6c1) !important;
            border: none !important;
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.4);
        }

        .auth-button:hover {
            animation: buttonPulse 0.6s ease-in-out;
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(255, 105, 180, 0.6) !important;
        }

        /* تأثير الموجة عند الضغط على الزر - وردي */
        .auth-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .auth-button:active::before {
            width: 300px;
            height: 300px;
        }

        /* أنيميشن الروابط - وردي */
        .auth-link {
            position: relative;
            transition: all 0.3s ease;
            color: rgba(255, 105, 180, 0.8) !important;
        }

        .auth-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(45deg, #ff69b4, #ffb6c1);
            transition: width 0.3s ease;
        }

        .auth-link:hover::after {
            width: 100%;
        }

        .auth-link:hover {
            transform: translateY(-1px);
            color: #ff69b4 !important;
        }

        /* تأثير الإيموجي المتحرك */
        .animated-emoji {
            display: inline-block;
            animation: wave 1s ease-in-out infinite alternate;
        }

        @keyframes wave {
            0% {
                transform: rotate(0deg) scale(1);
            }

            100% {
                transform: rotate(10deg) scale(1.1);
            }
        }

        /* أنيميشن الفورم */
        .form-field {
            animation: slideInRight 0.6s ease forwards;
            opacity: 0;
        }

        .form-field:nth-child(1) {
            animation-delay: 0.1s;
        }

        .form-field:nth-child(2) {
            animation-delay: 0.2s;
        }

        .form-field:nth-child(3) {
            animation-delay: 0.3s;
        }

        .form-field:nth-child(4) {
            animation-delay: 0.4s;
        }

        @keyframes slideInRight {
            0% {
                opacity: 0;
                transform: translateX(30px);
            }

            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* تأثيرات إضافية */
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 182, 193, 0.2);
        }

        /* أنيميشن لودينغ للزر */
        .loading-button {
            position: relative;
        }

        .loading-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            opacity: 0;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* تحسين ألوان النص */
        .auth-card p {
            color: rgba(255, 105, 180, 0.8);
        }

        /* تحسين checkbox */
        input[type="checkbox"] {
            accent-color: #ff69b4;
        }

        /* تأثير تفاعلي إضافي على البطاقة */
        .auth-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 182, 193, 0.05), transparent);
            transform: rotate(45deg);
            animation: shimmer 6s ease-in-out infinite;
            z-index: -1;
        }

        @keyframes shimmer {

            0%,
            100% {
                transform: translateX(-100%) translateY(-100%) rotate(45deg);
            }

            50% {
                transform: translateX(100%) translateY(100%) rotate(45deg);
            }
        }
    </style>

    <div class="w-full max-w-md bg-white/10 dark:bg-zinc-900/20 rounded-2xl shadow-2xl p-8 auth-card glass-effect">
        <!-- رسالة ترحيب -->
        <div class="text-right mb-6">
            <h1 class="text-3xl font-bold text-white welcome-text">
                أهلاً بك معنا <span class="animated-emoji">🎉</span>
            </h1>
            <p class="text-sm text-gray-200 mt-1 opacity-90">
                يُرجى إدخال بياناتك لإنشاء حساب جديد والانضمام إلينا.
            </p>
        </div>


        <!-- حالة السيشن -->
        <x-auth-session-status class="text-right mb-4" :status="session('status')" />

        <form wire:submit.prevent="register" class="flex flex-col gap-5">
            <!-- الاسم -->
            <div class="form-field">
                <flux:input wire:model="name" label="الاسم" type="text" required autofocus autocomplete="name"
                    placeholder="الاسم الكامل"
                    class="auth-input rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300" />
            </div>

            <!-- البريد الإلكتروني -->
            <div class="form-field">
                <flux:input wire:model="email" label="البريد الإلكتروني" type="email" required autocomplete="email"
                    placeholder="name@example.com"
                    class="auth-input rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300" />
            </div>

            <!-- كلمة المرور -->
            <div class="form-field">
                <flux:input wire:model="password" label="كلمة المرور" type="password" required
                    autocomplete="new-password" placeholder="أدخل كلمة المرور" viewable
                    class="auth-input rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300" />
            </div>

            <!-- تأكيد كلمة المرور -->
            <div class="form-field">
                <flux:input wire:model="password_confirmation" label="تأكيد كلمة المرور" type="password" required
                    autocomplete="new-password" placeholder="أعد إدخال كلمة المرور" viewable
                    class="auth-input rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300" />
            </div>

            <!-- زر التسجيل -->
            <div class="form-field">
                <flux:button variant="primary" type="submit"
                    class="w-full py-3 rounded-lg text-white font-semibold auth-button">
                    إنشاء الحساب
                </flux:button>
            </div>
        </form>

        <div class="mt-6 text-center text-sm text-gray-700">
            لديك حساب بالفعل؟
            <flux:link :href="route('login')" wire:navigate class="text-white font-semibold auth-link">
                تسجيل الدخول
            </flux:link>
        </div>
    </div>
</div>

<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => 'بيانات الدخول غير صحيحة.',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('home', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => "محاولات كثيرة. حاول مرة أخرى خلال {$seconds} ثانية.",
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div dir="rtl" class="min-h-screen flex items-center justify-center p-6 auth-background">
    <style>
        /* خلفية ثابتة */
        .auth-background {
            background: #333355;
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

        /* أنيميشن الحقول - متحسن */
        @keyframes inputFocus {
            0% { 
                box-shadow: 0 0 0 rgba(255,255,255,0);
                transform: scale(1);
                border-color: rgba(255,255,255,0.3);
            }
            100% { 
                box-shadow: 0 0 25px rgba(255,255,255,0.3), 0 0 50px rgba(255,255,255,0.1);
                transform: scale(1.02);
                border-color: rgba(255,255,255,0.8);
            }
        }

        /* تأثير الكتابة في الإنبت */
        @keyframes inputType {
            0% { 
                box-shadow: inset 0 0 0 rgba(255,255,255,0);
            }
            100% { 
                box-shadow: inset 0 0 20px rgba(255,255,255,0.1);
            }
        }

        /* أنيميشن اللابل */
        @keyframes labelFloat {
            0% {
                transform: translateY(0px);
                color: rgba(255,255,255,0.7);
            }
            100% {
                transform: translateY(-5px);
                color: rgba(255,255,255,1);
            }
        }

        /* أنيميشن النص */
        @keyframes textGlow {
            0%, 100% { text-shadow: 0 0 5px rgba(51,51,85,0.3); }
            50% { text-shadow: 0 0 20px rgba(51,51,85,0.6); }
        }

        /* أنيميشن الزر */
        @keyframes buttonPulse {
            0% { 
                transform: scale(1);
                box-shadow: 0 4px 15px rgba(51,51,85,0.3);
            }
            50% { 
                transform: scale(1.05);
                box-shadow: 0 8px 25px rgba(51,51,85,0.5);
            }
            100% { 
                transform: scale(1);
                box-shadow: 0 4px 15px rgba(51,51,85,0.3);
            }
        }

        .auth-card {
            animation: fadeUpScale 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            position: relative;
            overflow: hidden;
        }

        .auth-input {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            background: rgba(255,255,255,0.1);
            border: 2px solid rgba(255,255,255,0.3);
        }

        .auth-input:focus {
            animation: inputFocus 0.4s ease-out forwards;
        }

        .auth-input:not(:placeholder-shown) {
            animation: inputType 0.3s ease-out forwards;
        }

        /* تأثير خاص للإنبت عند الكتابة */
        .auth-input:focus:not(:placeholder-shown) {
            box-shadow: 
                0 0 25px rgba(255,255,255,0.3), 
                0 0 50px rgba(255,255,255,0.1),
                inset 0 0 20px rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.9);
        }

        /* تأثير الريبل عند الكليك */
        .auth-input::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.1);
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
        }

        .auth-button {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .auth-button:hover {
            animation: buttonPulse 0.6s ease-in-out;
            transform: translateY(-2px);
        }

        /* تأثير الموجة عند الضغط على الزر */
        .auth-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .auth-button:active::before {
            width: 300px;
            height: 300px;
        }

        /* أنيميشن الروابط */
        .auth-link {
            position: relative;
            transition: all 0.3s ease;
        }

        .auth-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(45deg, #333355, #5a5a7a);
            transition: width 0.3s ease;
        }

        .auth-link:hover::after {
            width: 100%;
        }

        .auth-link:hover {
            transform: translateY(-1px);
        }

        /* تأثير الإيموجي المتحرك */
        .animated-emoji {
            display: inline-block;
            animation: wave 1s ease-in-out infinite alternate;
        }

        @keyframes wave {
            0% { transform: rotate(0deg) scale(1); }
            100% { transform: rotate(10deg) scale(1.1); }
        }

        /* أنيميشن الفورم */
        .form-field {
            animation: slideInRight 0.6s ease forwards;
            opacity: 0;
        }

        .form-field:nth-child(1) { animation-delay: 0.1s; }
        .form-field:nth-child(2) { animation-delay: 0.2s; }
        .form-field:nth-child(3) { animation-delay: 0.3s; }
        .form-field:nth-child(4) { animation-delay: 0.4s; }

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
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255,255,255,0.1);
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
            border-top: 2px solid rgba(255,255,255,0.6);
            border-radius: 50%;
            animation: spin 1s linear infinite;
            opacity: 0;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    <div class="w-full max-w-md bg-white/10 dark:bg-zinc-900/20 rounded-2xl shadow-2xl p-8 auth-card glass-effect">
        <!-- رسالة ترحيب -->
        <div class="text-right mb-6">
            <h1 class="text-3xl font-bold text-white welcome-text">
                مرحباً بعودتك <span class="animated-emoji">👋</span>
            </h1>
            <p class="text-sm text-gray-200 mt-1 opacity-90">
                يُرجى إدخال بياناتك لتسجيل الدخول إلى حسابك.
            </p>
        </div>

        <!-- حالة السيشن -->
        <x-auth-session-status class="text-right mb-4" :status="session('status')" />

        <form wire:submit="login" class="flex flex-col gap-5">
            <!-- البريد الإلكتروني -->
            <div class="form-field">
                <flux:input
                    wire:model="email"
                    label="البريد الإلكتروني"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="example@mail.com"
                    class="auth-input rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300"
                />
            </div>

            <!-- كلمة المرور -->
            <div class="relative form-field">
                <flux:input
                    wire:model="password"
                    label="كلمة المرور"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="********"
                    viewable
                    class="auth-input rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300"
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute start-0 top-0 text-sm text-white/80 hover:text-white auth-link" :href="route('password.request')" wire:navigate>
                        نسيت كلمة المرور؟
                    </flux:link>
                @endif
            </div>

            <!-- تذكرني -->
            <div class="form-field">
                <flux:checkbox wire:model="remember" label="تذكّرني" class="text-white" />
            </div>

            <!-- زر الدخول -->
            <div class="form-field">
                <flux:button
                    variant="primary"
                    type="submit"
                    class="w-full py-3 rounded-lg text-white font-semibold auth-button"
                    style="background: linear-gradient(135deg, #333355, #4a4a6a); border: none;"
                >
                    تسجيل الدخول
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="mt-6 text-center text-sm text-gray-200">
                لا تملك حساباً؟
                <flux:link :href="route('register')" wire:navigate class="text-white font-semibold auth-link">
                    سجّل الآن
                </flux:link>
            </div>
        @endif
    </div>
</div>
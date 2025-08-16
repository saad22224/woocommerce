<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Section;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $activesection = Section::where('status', 1)->get();
        view()->share('activesection', $activesection);
        
    }
}

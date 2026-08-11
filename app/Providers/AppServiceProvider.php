<?php

namespace App\Providers;

use App\Models\Policy_type;
use App\Models\SiteInfo;
use Illuminate\Support\ServiceProvider;
use View;

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
        View::share('siteInfo', SiteInfo::first());
        View::share('policyTypes', Policy_type::all());
    }
}

<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\Policy_type;
use App\Models\Review;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\Schema;
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
        View::share('siteInfo', Schema::hasTable('site_infos') ? SiteInfo::first() : null);
        View::share('publishedPolicies', Schema::hasTable('policy_types') ? Policy_type::where('is_published', true)->get() : collect());
        View::share('unreadMessagesCount', Schema::hasTable('messages') ? Message::where('is_read', false)->count() : 0);
        View::share('notApprovedReviewsCount', Schema::hasTable('reviews') ? Review::where('is_approved', false)->count() : 0);

    }
}

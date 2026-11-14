<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Policy_type;
use App\Models\Product;
use App\Models\Review;
use App\Models\SiteInfo;
use App\Models\Status;
use App\Models\User;
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
        view::composer(
            ['layouts.dashboard', 'dashboard.*'],
            function ($view) {
                $user = auth()->user();
                $statuses = Status::all();
                $usersCount = User::all()->count();
                $categoriesCount = Category::all()->count();
                $productsCount = Product::all()->count();
                $unreadMessages = Message::where('is_read', false)->count();
                $unreadNotifyCount = $user->unreadNotifications()->count();
                $notAcceptOordersCount = Order::where('is_accept', false)->count();

                $view->with([
                    'statuses' => $statuses,
                    'usersCount' => $usersCount,
                    'categoriesCount' => $categoriesCount,
                    'productsCount' => $productsCount,
                    'unreadMessages' => $unreadMessages,
                    'unreadNotifyCount' => $unreadNotifyCount,
                    'notAcceptOordersCount' => $notAcceptOordersCount,
                ]);
            }
        );
        View::composer(
            ['layouts.dashboard', 'partials.notifications'],
            function ($view) {

                if (auth()->check()) {

                    $user = auth()->user();

                    $notifications = $user->notifications()
                        ->latest()
                        ->take(5)
                        ->get();

                    $unreadNotifyCount = $user->unreadNotifications()
                        ->count();

                } else {

                    $notifications = collect();
                    $unreadNotifyCount = 0;

                }

                $view->with([
                    'headerNotifications' => $notifications,
                    'notifications' => $notifications,
                    'unreadNotifyCount' => $unreadNotifyCount,
                ]);

            }
        );
    }
}

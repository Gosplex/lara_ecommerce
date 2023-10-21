<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $websiteSetting = Setting::first();
        $categories = Category::latest()->take(5)->get();
        $teamDetails = Team::all();
        Paginator::useBootstrap();
        View::share('websiteSetting', $websiteSetting);
        View::share('categoriesDisplay', $categories);
        View::share('teamDetails', $teamDetails);
    }
}

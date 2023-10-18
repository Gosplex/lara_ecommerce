<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\Setting;
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
        $teamDetails = Team::all();
        Paginator::useBootstrap();
        View::share('websiteSetting', $websiteSetting);
        View::share('teamDetails', $teamDetails);
    }
}

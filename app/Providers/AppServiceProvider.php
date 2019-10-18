<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Categories;
use App\Products;
use App\User;
use App\Ads;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        View::share('userData', User::all()->count());
        View::share('categoryData', Categories::all()->count());
        View::share('productData', Products::all()->count());
        View::share('adsData', Ads::all()->count());
    }
}

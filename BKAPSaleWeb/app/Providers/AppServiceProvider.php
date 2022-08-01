<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\Cart;
use App\Models\Category;
use App\Models\Brand;

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
        view()->composer('*', function($view){
            $view->with([
                'cart'=>new Cart(),
            ]);
            $view->with([
                'categoryMenu'=> Category::all(),
            ]);
            $view->with([
                'brandMenu'=> Brand::all(),
            ]);
        });
    }
}

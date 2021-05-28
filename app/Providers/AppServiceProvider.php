<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Menu;
use App\Models\Logo;

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
        Schema::defaultStringLength(191);


        view()->composer('frontend.master', function ($view) {

            $menu = Menu::where('id', 1)->first();
            $view->with('menu', $menu);

            $logo = Logo::where('id', 1)->first();
            $view->with('logo', $logo);
            
        });

        

    }
}

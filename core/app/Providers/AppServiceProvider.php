<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\GeneralSetting as GS;
use App\Social;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $gs = GS::first();
      $socials = Social::all();
      $menus = Menu::all();
      View::share('gs', $gs);
      View::share('socials', $socials);
      View::share('menus', $menus);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

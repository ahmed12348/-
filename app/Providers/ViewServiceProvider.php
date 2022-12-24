<?php

namespace App\Providers;
use App\Models\Cat;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //helper function view

        view()->composer('front.inc.header',function($view)
        {
            $view->with('cats',Cat::select('id','name')->get());
            $view->with('sett',Setting::select('logo','favicon')->first());
        });

        view()->composer('front.inc.footer',function($view)
        {
            $view->with('sett',Setting::first());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

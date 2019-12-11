<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Route;

class ManageOrderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        View::composer(['admin.order.*'], function ($view) {
//            $view->order = Order::where('id', $id)->first();
//        });
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

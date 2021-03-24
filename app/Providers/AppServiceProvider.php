<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       Schema::defaultStringLength(350);
       \Carbon\Carbon::setToStringFormat('d-m-Y h:i A');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       /* $this->app->bind('path.public', function()
        {
                return base_path('public_html');
        });*/
    }
}

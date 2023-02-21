<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        Blade::directive('rupiah', function ($money) {
            return "Rp. <?php echo number_format($money, 0, '', '.')?>,-";
        });
        Blade::directive('getTahun', function() {
            return Carbon::now()->format('Y');
        });
        Paginator::useBootstrap();
    }
}

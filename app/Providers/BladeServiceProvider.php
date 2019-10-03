<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Parsedown;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('parsedown', function () {
            return new Parsedown();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** Blade Components */
        Blade::component('shared.components.datatable', 'datatable');


        /** Blade Directives */
        Blade::directive('markdown', function ($expression) {
            return "<?php echo app('parsedown')->text($expression); ?>";
        });
    }
}

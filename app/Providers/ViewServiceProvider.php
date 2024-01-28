<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;
use Modules\Dashboard\Services\DashboardMenuService;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $menus = DashboardMenuService::readModulesConfig();

        \Illuminate\Support\Facades\View::composer('dashboard::layouts.master', static function (View $view) use ($menus) {
            $view->with('menus', $menus);
        });
    }
}

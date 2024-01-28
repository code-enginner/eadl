<?php

namespace App\Providers;

use App\Models\Media;
use App\Models\SystemLog;
use App\Observers\AdminObserver;
use App\Observers\BlogMainCategoryObserver;
use App\Observers\CategoryObserver;
use App\Observers\MediaObserver;
use App\Observers\SystemLogObserver;
use App\Observers\TagObserver;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Entities\Admin;
use Modules\Blog\Entities\BlogMainCategory;
use Modules\Category\Entities\Category;
use Modules\Tag\Entities\Tag;
use Opcodes\LogViewer\Facades\LogViewer;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LogViewer::auth(function ($request) {
            //todo set auth login to access logViewer
            return TRUE;
        });
        //
        Media::observe(MediaObserver::class);
        Admin::observe(AdminObserver::class);
    }
}

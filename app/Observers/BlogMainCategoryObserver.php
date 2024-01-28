<?php

namespace App\Observers;

use Illuminate\Support\Str;
use Modules\Blog\Entities\BlogMainCategory;

class BlogMainCategoryObserver
{
    /**
     * Handle the BlogMainCategory "created" event.
     */
    public function created(BlogMainCategory $blogMainCategory): void
    {
        //
    }

    public function creating(BlogMainCategory $blogMainCategory): void
    {
        $blogMainCategory->uuid = Str::uuid();
    }

    /**
     * Handle the BlogMainCategory "updated" event.
     */
    public function updated(BlogMainCategory $blogMainCategory): void
    {
        //
    }

    /**
     * Handle the BlogMainCategory "deleted" event.
     */
    public function deleted(BlogMainCategory $blogMainCategory): void
    {
        //
    }

    /**
     * Handle the BlogMainCategory "restored" event.
     */
    public function restored(BlogMainCategory $blogMainCategory): void
    {
        //
    }

    /**
     * Handle the BlogMainCategory "force deleted" event.
     */
    public function forceDeleted(BlogMainCategory $blogMainCategory): void
    {
        //
    }
}

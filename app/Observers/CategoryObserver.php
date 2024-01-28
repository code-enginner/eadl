<?php

namespace App\Observers;

use Illuminate\Support\Str;
use Modules\Category\Entities\Category;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     */
    public function creatied(Category $category): void
    {

    }

    public function creating(Category $category): void
    {
        $category->uuid = Str::uuid();
    }

    /**
     * Handle the category "updated" event.
     */
    public function updated(Category $category): void
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     */
    public function deleted(category $category): void
    {
        //
    }

    /**
     * Handle the category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}

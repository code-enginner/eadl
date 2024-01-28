<?php

namespace App\Observers;

use App\Models\SystemLog;
use Illuminate\Support\Str;

class SystemLogObserver
{

    public function creating(SystemLog $systemLog): void
    {
        $systemLog->uuid = Str::uuid();
    }

    /**
     * Handle the SystemLog "created" event.
     */
    public function created(SystemLog $systemLog): void
    {
        //
    }

    /**
     * Handle the SystemLog "updated" event.
     */
    public function updated(SystemLog $systemLog): void
    {
        //
    }

    /**
     * Handle the SystemLog "deleted" event.
     */
    public function deleted(SystemLog $systemLog): void
    {
        //
    }

    /**
     * Handle the SystemLog "restored" event.
     */
    public function restored(SystemLog $systemLog): void
    {
        //
    }

    /**
     * Handle the SystemLog "force deleted" event.
     */
    public function forceDeleted(SystemLog $systemLog): void
    {
        //
    }
}

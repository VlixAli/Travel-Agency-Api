<?php

namespace App\Observers;

use App\Models\Travel;
use Illuminate\Support\Str;

class TravelObserver
{
    /**
     * Handle the Travel "creating" event.
     */
    public function creating(Travel $travel): void
    {
        $travel->id = Str::uuid();
        $travel->slug = Str::slug($travel->name);
    }

    /**
     * Handle the Travel "updating" event.
     */
    public function updating(Travel $travel): void
    {
        $travel->slug = Str::slug($travel->name);
    }

    /**
     * Handle the Travel "deleted" event.
     */
    public function deleted(Travel $travel): void
    {
        //
    }

    /**
     * Handle the Travel "restored" event.
     */
    public function restored(Travel $travel): void
    {
        //
    }

    /**
     * Handle the Travel "force deleted" event.
     */
    public function forceDeleted(Travel $travel): void
    {
        //
    }
}

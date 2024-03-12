<?php

namespace App\Observers;

use App\Models\Tour;
use Illuminate\Support\Str;

class TourObserver
{
    /**
     * Handle the Tour "creating" event.
     */
    public function creating(Tour $tour): void
    {
        $tour->id = Str::uuid();
    }

    /**
     * Handle the Tour "updated" event.
     */
    public function updated(Tour $tour): void
    {
        //
    }

    /**
     * Handle the Tour "deleted" event.
     */
    public function deleted(Tour $tour): void
    {
        //
    }

    /**
     * Handle the Tour "restored" event.
     */
    public function restored(Tour $tour): void
    {
        //
    }

    /**
     * Handle the Tour "force deleted" event.
     */
    public function forceDeleted(Tour $tour): void
    {
        //
    }
}

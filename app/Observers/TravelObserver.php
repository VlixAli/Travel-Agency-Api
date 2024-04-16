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
    }

}

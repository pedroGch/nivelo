<?php

namespace App\Observers;

use App\Models\Place;
use App\Events\PlaceCreated;

class PlaceObserver
{
    /**
     * Handle the Place "updated" event.
     *
     * @param  \App\Models\Place  $place
     * @return void
     */
    public function updated(Place $place)
    {
        if ($place->status == 1 && $place->getOriginal('status') == 0) {
            event(new PlaceCreated($place));
        }
    }
}

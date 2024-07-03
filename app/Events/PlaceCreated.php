<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Place;

class PlaceCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $place;

    public function __construct(Place $place)
    {
        $this->place = $place;
    }
}

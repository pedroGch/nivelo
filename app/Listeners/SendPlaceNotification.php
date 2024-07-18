<?php

namespace App\Listeners;

use App\Events\PlaceCreated;
use App\Models\Notification;
use App\Models\User;
use App\Services\LocationService;
use App\Mail\NewNotification;
use Illuminate\Support\Facades\Mail;

class SendPlaceNotification
{
    protected $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function handle(PlaceCreated $event)
    {
        $place = $event->place;
        $users = User::all();

        foreach ($users as $user) {
            if ($this->isNearby($user, $place)) {
                $notification = Notification::create([
                    'user_id' => $user->id,
                    'message' => '<b>Nuevo lugar cercano:</b><br> ' . $place->name,
                    'category_id' => $place->category_id,
                    'place_id' => $place->place_id,
                ]);

                // Enviar correo electrónico de notificación
                Mail::to($user->email)->send(new NewNotification($notification));
            }
        }
    }

    private function isNearby($user, $place)
    {
        $distance = $this->locationService->calculateDistance(
            $user->latitude,
            $user->longitude,
            $place->latitude,
            $place->longitude
        );

        // Consideramos "cercano" si está a menos de 20 km
        return $distance <= 20;
    }
}

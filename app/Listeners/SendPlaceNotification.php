<?php

// namespace App\Listeners;

// use App\Events\PlaceCreated;
// use App\Models\Notification;
// use App\Models\User;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;

// class SendPlaceNotification
// {
//     public function handle(PlaceCreated $event)
//     {
//         $place = $event->place;
//         $users = User::all(); // Después filtrar usuarios por proximidad acá

//         foreach ($users as $user) {
//             if ($this->isNearby($user, $place)) {
//                 Notification::create([
//                     'user_id' => $user->id,
//                     'message' => 'Nuevo lugar cercano: ' . $place->name,
//                 ]);
//             }
//         }
//     }

//     private function isNearby($user, $place)
//     {
//         // Implementa la lógica para determinar si el lugar es cercano al usuario
//         return true; // Placeholder
//     }
// }

namespace App\Listeners;

use App\Events\PlaceCreated;
use App\Models\Notification;
use App\Models\User;
use App\Services\LocationService;

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
                Notification::create([
                    'user_id' => $user->id,
                    'message' => 'Nuevo lugar cercano: ' . $place->name,
                    'category_id' => $place->category_id,
                    'place_id' => $place->place_id,
                ]);
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

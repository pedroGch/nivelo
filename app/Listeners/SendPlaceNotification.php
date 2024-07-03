<?php

namespace App\Listeners;

use App\Events\PlaceCreated;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPlaceNotification
{
    public function handle(PlaceCreated $event)
    {
        $place = $event->place;
        $users = User::all(); // Puedes filtrar usuarios por proximidad aquí

        foreach ($users as $user) {
            if ($this->isNearby($user, $place)) {
                Notification::create([
                    'user_id' => $user->id,
                    'message' => 'Nuevo lugar cercano: ' . $place->name,
                ]);
            }
        }
    }

    private function isNearby($user, $place)
    {
        // Implementa la lógica para determinar si el lugar es cercano al usuario
        return true; // Placeholder
    }
}

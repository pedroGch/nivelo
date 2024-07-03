<?php

namespace App\Listeners;

use App\Events\PlaceCreated;
use App\Models\UserToken;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class SendPlaceNotification
{
    public function handle(PlaceCreated $event)
    {
        $place = $event->place;

        // Obtén los tokens de los usuarios (puedes añadir lógica para filtrar por ubicación)
        $userTokens = UserToken::all();
        $tokens = $userTokens->pluck('fcm_token')->toArray();

        $notificationBuilder = new PayloadNotificationBuilder('Nuevo lugar disponible');
        $notificationBuilder->setBody('Se ha cargado un nuevo lugar cerca de tu ubicación.')
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['place_id' => $place->id]);

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60 * 20);

        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        $options = $optionBuilder->build();

        FCM::sendTo($tokens, $options, $notification, $data);
    }
}

<?php

namespace App\Listeners;

use App\Events\UserStatusChanged;
use App\Mail\NewNotification;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserStatusChangedMail;

class SendUserStatusNotification
{
    public function __construct()
    {
        //
    }

    public function handle(UserStatusChanged $event)
    {
        $user = $event->user;

        // Crear la notificación en la base de datos
        $notification = Notification::create([
            'user_id' => $user->id,
            'message' => $user->status ? 'Tu cuenta ha sido <b>desbloqueada</b>.' : 'Tu cuenta ha sido <b>bloqueada</b>.',
        ]);

        // Enviar correo electrónico de notificación
        Mail::to($user->email)->send(new NewNotification($notification));;
    }
}

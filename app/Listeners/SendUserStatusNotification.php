<?php

namespace App\Listeners;

use App\Events\UserStatusChanged;
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
        Notification::create([
            'user_id' => $user->id,
            'message' => $user->status ? 'Tu cuenta ha sido desbloqueada.' : 'Tu cuenta ha sido bloqueada.',
        ]);

        // Enviar el correo electrónico
        // Mail::to($user->email)->send(new UserStatusChangedMail($user));
    }
}

<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class SendWelcomeNotification
{
    public function handle(UserRegistered $event)
    {
        $user = $event->user;

        // Crear la notificación
        Notification::create([
            'user_id' => $user->id,
            'message' => '¡Bienvenido a <b>nivelo</b>, ' . $user->name . '!',
        ]);

        // Enviar correo electrónico de bienvenida
        Mail::to($user->email)->send(new WelcomeEmail($user));
    }
}




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * Muestra las notificaciones del usuario autenticado
     */
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())->get();
        return view('notifications.notifications', compact('notifications'));
    }

    /**
     * Marca una notificación como leída
     * @param int $id
     */
    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        $notification->update(['read' => true]);
        return redirect()->route('notificationsView');
    }
}

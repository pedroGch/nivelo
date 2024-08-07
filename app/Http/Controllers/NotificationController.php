<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Muestra las notificaciones del usuario autenticado
     */
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
          ->orderBy('created_at', 'desc')
          ->get();
        $notificationsViewActive = true;
        return view('notifications.notifications', compact('notifications', 'notificationsViewActive'));
    }

    /**
     * Marca una notificación como leída
     * @param int $id
     */
    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        if ($notification && $notification->user_id == Auth::id()) {
          $notification->update(['read' => true]);
        }
        return redirect()->route('notificationsView');
    }
}

<?php

namespace App\Events;
use App\Models\User;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MessageEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $username;
    public $message;
    public $chat_id;


    public function __construct($user_id, $chat_id, $message)
    {
        // Crear un nuevo mensaje y guardarlo en la base de datos
        $newMessage = new Message();
        $newMessage->user_id = $user_id;
        $newMessage->chat_id = $chat_id;
        $newMessage->message = $message;
        $newMessage->save();

        // Asignar valores a las propiedades del evento
        $this->message = $message;
        $this->username = User::find($user_id)->name;
        $this->chat_id = $chat_id;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat-channel'),
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'user_id' => $this->chat_id,
            'message' => $this->message,
            'chat_id' => $this->chat_id,
        ];
    }
}

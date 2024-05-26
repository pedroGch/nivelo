<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\MessageEvent;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatComponent extends Component
{
  public $message;
  public $conversation = [];

  public function mount()
  {
    /*
    aca debo buscar las conversaciones del usuario

    */
    $messages = Message::all();
    foreach ($messages as $m)
    {
      $this->conversation[] = [
        'username' => $m->user->name,
        'message'  => $m->message,
        'user_id'  => $m->user_id
      ];
    }
  }
  public function submitMessage()
  {
    MessageEvent::dispatch(Auth::user()->id, $this->message);
    $this->message = "";
  }
  #[On('echo:chat-channel,MessageEvent')]
  public function listenForMessage($data)
  {
    $this->conversation[] = [
      'username' => $data['username'],
      'message'  => $data['message']
    ];
  }

  public function chatInbox(Chat $chat)
  {
    //$this->authorize('view', $chat);
    return view('chat.chat', compact('chat'));
  }

  public function render()
  {
    return view('livewire.chat-component');
  }

  public function startChat(Request $request)
  {

    $request->validate([
      'receiver_id' => 'required|exists:users,id',
    ]);
    $sender_id = Auth::id();
    $receiver_id = $request->input('receiver_id');
    // Verificar si ya existe un chat entre estos usuarios
    $chat = Chat::where(function ($query) use ($sender_id, $receiver_id) {
      $query->where('sender_id', $sender_id)
            ->where('receiver_id', $receiver_id);
      })->orWhere(function ($query) use ($sender_id, $receiver_id) {
          $query->where('sender_id', $receiver_id)
                ->where('receiver_id', $sender_id);
      })->first();

    if (!$chat) {
      // Crear un nuevo chat si no existe
      $chat = Chat::create([
        'sender_id' => $sender_id,
        'receiver_id' => $receiver_id,
      ]);
    }

    return redirect()->route('chatInbox', ['chat' => $chat->id]);
  }
}

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
  public $chats = [];
  public $chat_id;
  public $selectedChat;

  public function mount($chat_id = null)
  {
    $this->loadChats();

    if ($chat_id) {
        $this->chat_id = $chat_id;
        $this->loadMessages();
    }
  }

  public function loadChats()
  {
    $user_id = Auth::id();
    $this->chats = Chat::where('sender_id', $user_id)
      ->orWhere('receiver_id', $user_id)
      ->get();
  }

  public function loadMessages()
  {
    if ($this->chat_id) {
      $messages = Message::where('chat_id', $this->chat_id)->get();
      $this->conversation = [];

      foreach ($messages as $m)
      {
        if (isset($m->user_id)) {
          $this->conversation[] = [
            'message'  => $m->message,
            'user_id'  => $m->user_id
          ];
        } else {
          $this->conversation[] = [
            'message'  => $m->message,
            'user_id'  => null
          ];
        }
      }
    }
  }

  public function submitMessage()
  {
    $user_id = Auth::user()->id;
    $chat_id = $this->chat_id;
    $message = $this->message;

    // Emitir el evento MessageEvent
    event(new MessageEvent($user_id, $chat_id, $message));

    // Limpiar el campo del mensaje
    $this->message = "";
  }

  #[On('echo:chat-channel,MessageEvent')]
  public function listenForMessage($data)
  {
    if ($data['chat_id'] == $this->chat_id) {
      $this->conversation[] = [
        'message'  => $data['message'],
        'user_id'  => $data['user_id']
      ];
    }
  }

  public function chatInbox(Chat $chat)
  {
    $existingChats = true;
    $chatInboxActive = true;
    $chats = Chat::all();
    if ($chats->isEmpty()){
      $existingChats = false;
    }

    return view('chat.chat', compact('chat', 'chatInboxActive', 'existingChats'));
  }

  public function selectChat($chat_id)
  {
      $this->chat_id = $chat_id;
      $this->loadMessages();
      $this->markMessagesAsRead($chat_id); // Llamar al método para marcar mensajes como leídos
  }

  public function markMessagesAsRead($chat_id)
  {
      $chat = Chat::find($chat_id);

      if ($chat && $chat->receiver_id == Auth::id()) {
          Message::where('chat_id', $chat_id)
              ->where('read', false)
              ->update(['read' => true]);
      }
  }

  public function render()
  {
    return view('livewire.chat-component', ['chat_id' => '8']);
  }

  public function startChat(Request $request)
  {
      $request->validate([
          'receiver_id' => 'required|exists:users,id',
      ]);

      $existingChats = true;
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

      // Contar los mensajes no leídos en todos los chats del usuario autenticado
      $unreadMessages = Message::whereHas('chat', function ($query) {
          $query->where('receiver_id', Auth::id());
      })->where('read', false)->count();

      $chatInboxActive = true;

      // Pasar la variable unreadMessages a la vista
      return view('chat.chat', [
          'chat_id' => $chat->id,
          'chatInboxActive' => $chatInboxActive,
          'existingChats' => $existingChats,
          'unreadMessages' => $unreadMessages,
      ]);
  }
}

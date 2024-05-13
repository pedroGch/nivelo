<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\MessageEvent;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class ChatComponent extends Component
{
  public $message;
  public $conversation = [];

  public function mount()
  {

    $messages = Message::all();

    foreach ($messages as $m)
    {
      $this->conversation[] = [
        'username' => $m->user->name,
        'message'  => $m->message
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
    //dd($data);
    $this->conversation[] = [
      'username' => $data['username'],
      'message'  => $data['message']
    ];
  }
  public function render()
  {
      return view('livewire.chat-component');
  }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class ChatComponent extends Component
{
  public $message;
  public $messages = [];

  public function submitMessage()
  {
    dump($this->message);
    $this->message = "";
  }
  public function render()
  {
      return view('livewire.chat-component');
  }
}

<div>
  <div class="row h-100"> <!-- Cambiamos el tamaño a 100% -->
    <!-- Conversaciones -->
    <div class="col-md-4 mb-3 conversations-border pe-0"> <!-- Cambiamos el tamaño a 30% y aplicamos el borde derecho -->
      <!-- Conversación 1 -->
      @foreach ($chats as $chat)
        <a href="#" wire:click.prevent="selectChat({{ $chat->id }})" class="fw-bold text-reset text-decoration-none">
          <div class="d-flex align-items-center {{ $selectedChatId === $chat->id ? 'selected-chat' : '' }}">
            <img src="{{ url('/img/avatars/'.$chat->receiver->avatar) }}" alt="avatar" class="rounded-image me-3">
            <div class="pt-3 ps-2">
              <h3 class="h5">{{ $chat->sender_id == Auth::id() ? $chat->receiver->username : $chat->sender->name }}</h3>
              <span class="mensaje-extracto">
                <p class="mensaje-extracto-contenedor">
                  {{-- Último mensaje enviado por {{ $chat->sender_id == Auth::id() ? 'tú' : $chat->sender->name }} --}}
                  Iniciado el {{ $chat->created_at }}
                </p>
              </span>
            </div>
          </div>
        </a>
      @endforeach
    </div>

    <!-- Bloque de Conversación -->
    <div class="col-md-8 mb-3 position-relative"> <!-- Cambiamos el tamaño a 70% y establecemos posición relativa -->
      <!-- Contenedor de mensajes -->
      <div class="row">
        <div class="conversation shadow-sm">
          @foreach ($conversation as $convoItem )
            <!-- Mensajes enviados emisor -->
            @if (isset($convoItem['user_id']) && Auth::user()->id == $convoItem['user_id'])
              <div class="message sent-message">
                <p>{{$convoItem['message']}}</p>
                <small class="text-muted">{{$convoItem['created_at']}}</small>
              </div>
            @else
              <!-- Mensajes recibidos receptor -->
              <div class="message received-message">
                <p>{{$convoItem['message']}}</p>
                <small class="text-muted">{{$convoItem['created_at']}}</small>
              </div>
            @endif
          @endforeach
        </div>

        <!-- Campo de entrada y botón para enviar mensaje -->
        <form wire:submit.prevent="submitMessage"  class="input-group mt-3">
            <input wire:model="message" class="form-control" placeholder="Escribí tu mensaje...">
            <input type="hidden" wire:model="chat_id">
            <button type="submit" class="btn bg-verde-principal btn-verde-hover text-light fw-bold">Enviar</button>
        </form>
      </div>
    </div>
  </div>
  <script>
    Livewire.on('messageSent', () => {
        @this.call('loadMessages');
    });
</script>
</div>

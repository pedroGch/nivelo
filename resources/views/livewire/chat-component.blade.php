<div>
  <div class="row h-100"> <!-- Cambiamos el tamaño a 100% -->
    <!-- Conversaciones -->
    <div class="col-md-4 mb-3 conversations-border"> <!-- Cambiamos el tamaño a 30% y aplicamos el borde derecho -->
      <!-- Conversación 1 -->
      @foreach ($chats as $chat)
        <a href="#" wire:click.prevent="selectChat({{ $chat->id }})">
          <div class="d-flex align-items-center">
            <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Persona 1" class="rounded-image me-3">
            <div>
              <h3 class="h5">{{ $chat->sender_id == Auth::id() ? $chat->receiver->name : $chat->sender->name }}</h3>
              <span class="mensaje-extracto">
                <p class="mensaje-extracto-contenedor">
                  Último mensaje enviado por {{ $chat->sender_id == Auth::id() ? 'tú' : $chat->sender->name }}
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
        <div class="conversation">
          @foreach ($conversation as $convoItem )
            <!-- Mensajes enviados emisor -->
            @if (isset($convoItem['user_id']) && Auth::user()->id == $convoItem['user_id'])
              <div class="message sent-message">
                {{$convoItem['message']}}
              </div>
            @else
              <!-- Mensajes recibidos receptor -->
              <div class="message received-message">
                {{$convoItem['message']}}
              </div>
            @endif
          @endforeach
        </div>

        <!-- Campo de entrada y botón para enviar mensaje -->
        <form wire:submit.prevent="submitMessage"  class="input-group mt-3">
            <input wire:model="message" class="form-control" placeholder="Escribe tu mensaje...">
            <input type="hidden" wire:model="chat_id">
            <button type="submit" class="btn btn-primary">Enviar</button>
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

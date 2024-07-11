<div>
  <div class="row h-100"> <!-- Cambiamos el tamaño a 100% -->
    <!-- Conversaciones -->
    <div class="col-12 col-md-4 mb-3 conversations-border pe-0"> <!-- Cambiamos el tamaño a 100% en móvil y 30% en desktop y aplicamos el borde derecho -->
      <!-- Conversación 1 -->
      @foreach ($chats as $chat)
        <a href="#" wire:click.prevent="selectChat({{ $chat->id }})" class="text-reset text-decoration-none">
          <div class="d-flex align-items-center {{ $selectedChatId === $chat->id ? 'selected-chat' : '' }}">
            <img src="{{ url('/img/avatars/'.$chat->receiver->avatar) }}" alt="avatar" class="rounded-image me-3" style="width: 50px; height: 50px;">
            <div class="pt-3 ps-2">
              <h2 class="h6 fw-bold">{{ $chat->sender_id == Auth::id() ? $chat->receiver->username : $chat->sender->name }}</h2> <!-- Cambié el tamaño del encabezado -->
              <span class="mensaje-extracto">
                <p class="mensaje-extracto-contenedor">
                  Iniciado el {{ $chat->created_at }}
                </p>
              </span>
            </div>
          </div>
        </a>
      @endforeach
    </div>

    <!-- Bloque de Conversación -->
    <div class="col-12 col-md-8 mb-3 position-relative"> <!-- Cambiamos el tamaño a 100% en móvil y 70% en desktop y establecemos posición relativa -->
      <!-- Contenedor de mensajes -->
      <div class="row">
        <div class="conversation shadow-sm" style="max-height: 70vh; overflow-y: auto;"> <!-- Ajustamos el contenedor de mensajes -->
          @foreach ($conversation as $convoItem)
            <!-- Mensajes enviados emisor -->
            @if (isset($convoItem['user_id']) && Auth::user()->id == $convoItem['user_id'])
              <div class="message sent-message">
                <p>{{$convoItem['message']}}</p>
              </div>
            @else
              <!-- Mensajes recibidos receptor -->
              <div class="message received-message">
                <p>{{$convoItem['message']}}</p>
              </div>
            @endif
          @endforeach
        </div>

        <!-- Campo de entrada y botón para enviar mensaje -->
        <form wire:submit.prevent="submitMessage" class="input-group mt-3">
          <input id="messageInput" wire:model="message" class="form-control" placeholder="Escribí tu mensaje...">
          <input type="hidden" wire:model="chat_id">
          <button id="sendButton" type="submit" class="btn bg-verde-principal btn-verde-hover text-light fw-bold" disabled>Enviar</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    Livewire.on('messageSent', () => {
        @this.call('loadMessages');
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const messageInput = document.getElementById('messageInput');
        const sendButton = document.getElementById('sendButton');

        messageInput.addEventListener('input', function() {
            if (messageInput.value.trim() === '') {
                sendButton.disabled = true;
            } else {
                sendButton.disabled = false;
            }
        });

        // Inicializar el estado del botón cuando se carga la página
        if (messageInput.value.trim() === '') {
            sendButton.disabled = true;
        } else {
            sendButton.disabled = false;
        }
    });
  </script>
</div>

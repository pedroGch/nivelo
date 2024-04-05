@extends('layouts.main')

@section('title', 'Blog de nivelo, noticias de accesibilidad')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="container custom-container"> <!-- Agregamos la clase "custom-container" -->
    <div class="row h-100"> <!-- Cambiamos el tamaño a 100% -->
      <!-- Conversaciones -->
      <div class="col-md-4 mb-3 conversations-border"> <!-- Cambiamos el tamaño a 30% y aplicamos el borde derecho -->
        <!-- Conversación 1 -->
        <div class="d-flex align-items-center">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Persona 1" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 1</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 1
              </p>
            </span>
          </div>
        </div>
        <!-- Conversación 2 -->
        <div class="d-flex align-items-center mt-3">
          <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Persona 2" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 2</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 2
              </p>
            </span>
          </div>
        </div>        <div class="d-flex align-items-center">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Persona 1" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 1</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 1
              </p>
            </span>
          </div>
        </div>
        <!-- Conversación 2 -->
        <div class="d-flex align-items-center mt-3">
          <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Persona 2" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 2</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 2
              </p>
            </span>
          </div>
        </div>        <div class="d-flex align-items-center">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Persona 1" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 1</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 1
              </p>
            </span>
          </div>
        </div>
        <!-- Conversación 2 -->
        <div class="d-flex align-items-center mt-3">
          <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Persona 2" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 2</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 2
              </p>
            </span>
          </div>
        </div>        <div class="d-flex align-items-center">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Persona 1" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 1</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 1
              </p>
            </span>
          </div>
        </div>
        <!-- Conversación 2 -->
        <div class="d-flex align-items-center mt-3">
          <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="Persona 2" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 2</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 2
              </p>
            </span>
          </div>
        </div>        <div class="d-flex align-items-center">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Persona 1" class="rounded-image me-3">
          <div>
            <h5>Nombre Persona 1</h5>
            <span class="mensaje-extracto">
              <p class="mensaje-extracto-contenedor">
                Último mensaje enviado por Persona 1
              </p>
            </span>
          </div>
        </div>
      </div>

      <!-- Bloque de Conversación -->
      <div class="col-md-8 mb-3 position-relative"> <!-- Cambiamos el tamaño a 70% y establecemos posición relativa -->
        <!-- Contenedor de mensajes -->
        <div class="row">
          <div class="conversation">
            <!-- Mensajes enviados -->
            <div class="message sent-message">Mensaje enviado por el usuario emisor</div>
            <!-- Mensajes recibidos -->
            <div class="message received-message">Mensaje recibido por el usuario receptor</div>
            <!-- Puedes agregar más mensajes aquí -->
            <!-- Mensajes enviados -->
            <div class="message sent-message">Mensaje enviado por el usuario emisor</div>
            <!-- Mensajes recibidos -->
            <div class="message received-message">Mensaje recibido por el usuario receptor</div>
            <!-- Puedes agregar más mensajes aquí -->
            <!-- Mensajes enviados -->
            <div class="message sent-message">Mensaje enviado por el usuario emisor</div>
            <!-- Mensajes recibidos -->
            <div class="message received-message">Mensaje recibido por el usuario receptor</div>
            <!-- Puedes agregar más mensajes aquí -->
            <!-- Mensajes enviados -->
            <div class="message sent-message">Mensaje enviado por el usuario emisor</div>
            <!-- Mensajes recibidos -->
            <div class="message received-message">Mensaje recibido por el usuario receptor</div>
            <!-- Puedes agregar más mensajes aquí -->
            <!-- Mensajes enviados -->
            <div class="message sent-message">Mensaje enviado por el usuario emisor</div>
            <!-- Mensajes recibidos -->
            <div class="message received-message">Mensaje recibido por el usuario receptor</div>
            <!-- Puedes agregar más mensajes aquí -->
            <!-- Mensajes enviados -->
            <div class="message sent-message">Mensaje enviado por el usuario emisor</div>
            <!-- Mensajes recibidos -->
            <div class="message received-message">Mensaje recibido por el usuario receptor</div>
            <!-- Puedes agregar más mensajes aquí -->
            <!-- Mensajes enviados -->
            <div class="message sent-message">Mensaje enviado por el usuario emisor</div>
            <!-- Mensajes recibidos -->
            <div class="message received-message">Mensaje recibido por el usuario receptor</div>
            <!-- Puedes agregar más mensajes aquí -->
            <!-- Mensajes enviados -->
            <div class="message sent-message">Mensaje enviado por el usuario emisor</div>
            <!-- Mensajes recibidos -->
            <div class="message received-message">Mensaje recibido por el usuario receptor</div>
            <!-- Puedes agregar más mensajes aquí -->
          </div>

          <!-- Campo de entrada y botón para enviar mensaje -->
          <div class="input-group mt-3">
            <input type="text" class="form-control" placeholder="Escribe tu mensaje...">
            <button class="btn btn-primary">Enviar</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

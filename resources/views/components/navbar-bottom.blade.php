@props(['mapViewActive' => $mapViewActive ?? false]);
@props(['notificationsViewActive' => $notificationsViewActive ?? false]);
@props(['addPlaceActive' => $addPlaceActive ?? false]);
@props(['chatInboxActive' => $chatInboxActive ?? false]);
@props(['UserProfileActive' => $UserProfileActive ?? false]);

<div class="row d-flex fixed-bottom justify-content-center bg-gris-claro shadow-top">
  <div class="col-12 col-md-9 col-lg-6 footer-nav">
    <nav class="d-flex justify-content-around">
      <div>
        <a href="{{ route('mapViewForm') }}">
          @if($mapViewActive)
          <span class="icon pb-2">
            <img src="{{ url('/img/icons/maps-icon-fill.png') }}" alt="nuevo lugar" width="22px" class="img-fluid">
          </span>
          @else
          <span class="icon pb-2">
            <img src="{{ url('/img/icons/maps-icon-outline.png') }}" alt="nuevo lugar" width="22px" class="img-fluid">
          </span>
          @endif
          <span class="text">Mapa</span>
        </a>
      </div>
      <div>
        <a href="{{ route('notificationsView') }}">
          @if($notificationsViewActive)
          <span class="icon pb-2 position-relative">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-naranja-principal text-dark">
              +99
              <span class="visually-hidden">Nuevas notificaciones</span>
            </span>
            <img src="{{ url('/img/icons/bell-icon-fill.png') }}" alt="Notificaciones" width="22px" class="img-fluid">
          </span>
          @else
          <span class="icon pb-2 position-relative">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-naranja-principal text-dark">
              +99
              <span class="visually-hidden">Nuevas notificaciones</span>
            </span>
            <img src="{{ url('/img/icons/bell-icon-outline.png') }}" alt="Notificaciones" width="22px" class="img-fluid">
          </span>
          @endif
          <span class="text">Notificaciones</span>
        </a>
      </div>

      @if (Auth::user()->status)
        <div class="btn bg-verde-principal btn-verde-hover py-2 px-4 rounded-circle shadow-sm">
          <a href="{{ route('addPlaceForm') }}" class="text-decoration-none">
            @if ($addPlaceActive)
            <span class="icon pb-2">
            <img src="{{ url('/img/icons/plus-icon-fill.png') }}" alt="nuevo lugar" class="img-fluid">
            </span>
            @else
            <span class="icon pb-2">
            <img src="{{ url('/img/icons/plus-icon-outline.png') }}" alt="nuevo lugar" class="img-fluid">
            </span>
            @endif
            <span class="text">Nuevo lugar</span>
          </a>
      </div>
      @else
        <div class="btn bg-secondary py-2 px-4 rounded-circle shadow-sm">
          <a href="#" class="text-decoration-none">
            @if ($addPlaceActive)
            <span class="icon pb-2">
            <img src="{{ url('/img/icons/plus-icon-fill.png') }}" alt="nuevo lugar" class="img-fluid">
            </span>
            @else
            <span class="icon pb-2">
            <img src="{{ url('/img/icons/plus-icon-outline.png') }}" alt="nuevo lugar" class="img-fluid">
            </span>
            @endif
            <span class="text">Nuevo lugar</span>
          </a>
        </div>
      @endif
      <div>
        <a href="{{ route('chatInbox') }}">
          @if($chatInboxActive)
          <span class="icon pb-2 position-relative">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-naranja-principal text-dark">
              +99
              <span class="visually-hidden">Nuevos mensajes</span>
            </span>
            <img src="{{ url('/img/icons/chat-icon-fill.png') }}" alt="chat" class="img-fluid">
          </span>
          @else
          <span class="icon pb-2 position-relative">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-naranja-principal text-dark">
              +99
              <span class="visually-hidden">Nuevos mensajes</span>
            </span>
            <img src="{{ url('/img/icons/chat-icon-outline.png') }}" alt="chat" class="img-fluid">
          </span>
          @endif
          <span class="text">Chat</span>
        </a>
      </div>
      <div>
        <a href="{{ route('userProfile') }}">
          @if($UserProfileActive)
          <span class="icon pb-2">
            <img src="{{ url('/img/icons/profile-icon-fill.png') }}" alt="mi perfil" class="img-fluid">
          @else
          <span class="icon pb-2">
            <img src="{{ url('/img/icons/profile-icon-outline.png') }}" alt="mi perfil" class="img-fluid">
          @endif
          <span class="text">Perfil</span>
        </a>
      </div>
    </nav>
  </div>
</div>

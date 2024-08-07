@props(['mapViewActive' => $mapViewActive ?? false])
@props(['notificationsViewActive' => $notificationsViewActive ?? false])
@props(['addPlaceActive' => $addPlaceActive ?? false])
@props(['chatInboxActive' => $chatInboxActive ?? false])
@props(['UserProfileActive' => $UserProfileActive ?? false])
@props(['unreadNotifications'])
@props(['unreadMessages'])

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
          <span class="icon pb-2 position-relative">
            @if($unreadNotifications > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-naranja-principal text-dark">
              {{ $unreadNotifications }}
              <span class="visually-hidden">Nuevas notificaciones</span>
            </span>
            @endif
            @if($notificationsViewActive)
            <img src="{{ url('/img/icons/bell-icon-fill.png') }}" alt="Notificaciones" width="22px" class="img-fluid">
            @else
            <img src="{{ url('/img/icons/bell-icon-outline.png') }}" alt="Notificaciones" width="22px" class="img-fluid">
            @endif
          </span>
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
            @else
            <span class="icon pb-2">
            <img src="{{ url('/img/icons/plus-icon-outline.png') }}" alt="nuevo lugar" class="img-fluid">
            @endif
            <span class="text">Nuevo lugar</span>
          </a>
        </div>
      @endif
      <div>
        <a href="{{ route('chatInbox') }}">
          <span class="icon pb-2 position-relative">
            @if($unreadMessages > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-naranja-principal text-dark">
              {{ $unreadMessages }}
              <span class="visually-hidden">Nuevos mensajes</span>
            </span>
            @endif
            @if($chatInboxActive)
            <img src="{{ url('/img/icons/chat-icon-fill.png') }}" alt="chat" class="img-fluid">
            @else
            <img src="{{ url('/img/icons/chat-icon-outline.png') }}" alt="chat" class="img-fluid">
            @endif
          </span>
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

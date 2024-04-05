@props(['UserProfileActive' => $UserProfileActive ?? false])


<div class="row d-flex fixed-bottom justify-content-center bg-gris-claro shadow-top">
  <div class="col-12 col-md-9 col-lg-6 footer-nav">
    <nav class="d-flex justify-content-around">
      <div>
        <a href="#">
          <span class="icon">
            <ion-icon name="location-outline"></ion-icon>
          </span>
          <span class="text">Mapa</span>
        </a>
      </div>
      <div>
        <a href="#">
          <span class="icon">
            <ion-icon name="notifications-outline"></ion-icon>
          </span>
          <span class="text">Notificaciones</span>
        </a>
      </div>
      <div class="btn bg-verde-principal btn-verde-hover py-2 px-4 rounded-circle shadow-sm">
        <a href="{{ route('addPlaceForm') }}" class="text-decoration-none">
          <ion-icon class="" name="add-circle-outline" size="large" style="color: #fff"></ion-icon>
          <span class="text">Nuevo lugar</span>
        </a>
      </div>
      <div>
        <a href="{{ route('chatInbox') }}">
          <span class="icon">
            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
          </span>
          <span class="text">Chat</span>
        </a>
      </div>
      <div>
        <a href="{{ route('userProfile') }}">
          @if($UserProfileActive)
          <span class="icon">
            <ion-icon name="person"></ion-icon>
          </span>
          @else
          <span class="icon">
            <ion-icon name="person-outline"></ion-icon>
          </span>
          @endif
          <span class="text">Perfil</span>
        </a>
      </div>
    </nav>
  </div>
</div>

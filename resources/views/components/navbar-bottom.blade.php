@props(['UserProfileActive' => $UserProfileActive ?? false])


<div class="row d-flex fixed-bottom justify-content-center bg-gris-claro">
  <div class="col-12 col-md-9 col-lg-6 footer-nav">
    <nav>
      <a href="">
        <span class="icon">
          <ion-icon name="location-outline"></ion-icon>
        </span>
        <span class="text">Mapa</span>
      </a>
      <a href="">
        <span class="icon">
          <ion-icon name="notifications-outline"></ion-icon>
        </span>
        <span class="text">Notificaciones</span>
      </a>
      <div class="bg-verde-principal p-4  rounded-top-circle">
        <a href="{{ route('addPlaceForm') }}" class="text-decoration-none">
          {{-- <span class="text-white fw-semibold h1 pb-5">
            +
          </span> --}}
          <ion-icon class="mb-2" name="add-circle-outline" size="large" style="color: #fff"></ion-icon>
          <span class="text">Nuevo lugar</span>
        </a>
      </div>
      <a href="">
        <span class="icon">
          <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
        </span>
        <span class="text">Chat</span>
      </a>
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
    </nav>
  </div>
</div>

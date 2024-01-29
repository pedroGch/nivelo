<div class="fixed-top">
  <nav class="navbar bg-violeta-dark">
    <div class="container container-fluid py-2 d-flex align-items-center">
      <div>
        <a class="navbar-brand" href="{{ route('categories') }}"><img src="{{ url('/img/logo_h_blanco.png') }}" alt="logo de nivelo"></a>
      </div>
      <div class="d-flex align-items-center">
        <div class="pe-2">
          <a href="#">
<<<<<<< HEAD
          {{-- <img src="{{ url('/img/bookmark.png') }}" alt="favoritos" class=""> --}}
          <ion-icon title="lugares guardados" style="color: #fff" name="bookmark-outline" size="large" class="icon-hover"></ion-icon>
=======
          <ion-icon style="color: #fff" name="bookmark-outline" size="large" class="icon-hover"></ion-icon>
>>>>>>> 06495e78b417c9f88c5a679e86be42e9cd6d7294
          </a>
        </div>
        <div>
          <button class="btn text-white pe-3 pb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon  pb-1">
              <ion-icon style="color: #fff" name="menu-outline" size="large" class="icon-hover"></ion-icon>
            </span>
          </button>
        </div>
      </div>
      <div class="offcanvas offcanvas-end bg-violeta-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <img src="{{ url('/img/logo_h_blanco.png') }}" alt="logo de nivelo">
          <button type="button" class="btn text-white" data-bs-dismiss="offcanvas"  aria-label="Close"><ion-icon name="close-outline" size="large"></ion-icon></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-1">
            <li class="pe-2 pt-3 nav-item text-end">
              <a href="{{ route('userProfile') }}" class="nav-link active text-white link-offcanvas link-offcanvas-hover" aria-current="page">Mi cuenta ( {{ Auth::user()->email }} )</a>
            </li>
            <li class="pe-2 pt-2 nav-item text-end">
              <a class="nav-link text-white link-offcanvas link-offcanvas-hover" href="{{ route('categories') }}">Categorías</a>
            </li>
            <li class="pe-2 pt-2 nav-item text-end">
              <a class="nav-link text-white link-offcanvas link-offcanvas-hover" href="#">Blog</a>
            </li>
            <li class="pe-2 pt-2 nav-item text-end">
              <a class="nav-link text-white link-offcanvas link-offcanvas-hover" aria-disabled="true">Acerca de nivelo</a>
            </li>
            <li class="pe-2 pt-2 nav-item text-end">
              <a class="nav-link text-white link-offcanvas link-offcanvas-hover" aria-disabled="true">Términos y condiciones</a>
            </li>
            @auth
            <li class="nav-item pt-2 text-end link-offcanvas link-offcanvas-hover">
              <form action="{{ route('logoutAction') }}" method="post">
                @csrf
                <button type="submit" class="btn text-white">
                  Cerrar sesión
                </button>
              </form>
            </li>
          @else
            <li class="nav-item text-end">
              <a href="{{ route('signup') }}">Registrate</a>
            </li>
            <li class="nav-item text-end ps-2">
              <a href="{{ route('login') }}">Iniciá sesión</a>
            </li>
          @endauth
          </ul>
        </div>
      </div>
    </div>
  </nav>
</div>

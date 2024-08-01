@props(['favoritesPlacesActive' => $favoritesPlacesActive ?? false]);
@props(['UserProfileActive' => $UserProfileActive ?? false]);
@props(['dashboardViewActive' => $dashboardViewActive ?? false]);
@props(['categoriesViewActive' => $categoriesViewActive ?? false]);
@props(['blogViewActive' => $blogViewActive ?? false]);
@props(['aboutViewActive' => $aboutViewActive ?? false]);
@props(['termsViewActive' => $termsViewActive ?? false]);


<div class="fixed-top">
  <nav class="navbar bg-violeta-dark">
    <div class="container container-fluid py-2 d-flex align-items-center">
      <div>
        <a class="navbar-brand" href="{{ route('categories') }}"><img src="{{ url('/img/logo_h_blanco.png') }}" alt="logo de nivelo"></a>
      </div>
      <div class="d-flex align-items-center">
        <div class="pe-2">
          <a href="{{ route('showFavoritePlaces') }}">
            @if($favoritesPlacesActive)
            <img src="{{ url('/img/icons/bookmark-fill.png') }}" alt="Notificaciones" width="22px" class="img-fluid">
            @else
            <img src="{{ url('/img/icons/bookmark-outline.png') }}" alt="Notificaciones" width="22px" class="img-fluid">
            @endif
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
        <div class="offcanvas-header d-flex justify-content-between">
          <img src="{{ url('/img/logo_h_blanco.png') }}" alt="logo de nivelo">
          <button type="button" class="btn text-white pt-4" data-bs-dismiss="offcanvas"  aria-label="Close"><ion-icon name="close-outline" size="large"></ion-icon></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-1">
            <li class="pe-2 pt-3 nav-item text-end">
              <a href="{{ route('userProfile') }}" class="nav-link active text-white @if($UserProfileActive) link-active @endif link-offcanvas link-offcanvas-hover" aria-current="page">Mi cuenta ( {{ Auth::user()->email }} )</a>
            </li>
            @if (Auth::user()->rol == 'admin')

              <li class="pe-2 pt-2 nav-item text-end">
                <a class="nav-link text-white @if($dashboardViewActive) link-active @endif link-offcanvas link-offcanvas-hover" href="{{ route('dashboard') }}">Panel de administración</a>
              </li>

            @endif
            <li class="pe-2 pt-2 nav-item text-end">
              <a class="nav-link text-white @if($categoriesViewActive) link-active @endif link-offcanvas link-offcanvas-hover" href="{{ route('categories') }}">Categorías</a>
            </li>
            <li class="pe-2 pt-2 nav-item text-end">
              <a class="nav-link text-white @if($blogViewActive) link-active @endif  link-offcanvas link-offcanvas-hover" href="{{ route('blogIndex') }}">Blog</a>
            </li>
            <li class="pe-2 pt-2 nav-item text-end">
              <a href="{{ route('about') }}" class="nav-link text-white @if($aboutViewActive) link-active @endif link-offcanvas link-offcanvas-hover" aria-disabled="true">Acerca de nivelo</a>
            </li>
            <li class="pe-2 pt-2 nav-item text-end">
              <a href="{{route('terms')}}"class="nav-link text-white @if($termsViewActive) link-active @endif link-offcanvas link-offcanvas-hover" aria-disabled="true">Términos y condiciones</a>
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
          <div class="col-12 mx-auto pt-5 mt-5">
            <form action="{{ route('startChat') }}" method="POST" class="mb-3">
              @csrf
              <input type="hidden" name="receiver_id" value="3">
              <button type="submit" class="text-dark mt-1 btn btn-naranja-hover form-control rounded-pill p-3 shadow-sm bg-naranja-principal fw-semibold ">Chateá con nivelo</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>

<div class="fixed-top">
  <nav class="navbar bg-violeta-dark">
    <div class="container-fluid py-2 d-flex align-items-center">
      <div>
        <a class="navbar-brand" href="{{ route('categories') }}"><img src="{{ url('/img/logo_h_blanco.png') }}" alt="logo de nivelo"></a>
      </div>
      <div class="d-flex align-items-center">
        <div class="pe-4">
          <a href="">
          <img src="{{ url('/img/bookmark.png') }}" alt="vista perfil de usuario" class=""></a>
        </div>
        <div>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><img src="{{ url('/img/category.png') }}" alt="menú"></span>
          </button>
        </div>
      </div>
      <div class="offcanvas offcanvas-end bg-violeta-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <img src="{{ url('/img/logo_h_blanco.png') }}" alt="logo de nivelo">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"  aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="pe-3 pt-3 nav-item text-end">
              <a href="{{ route('userProfile') }}" class="nav-link active text-white" aria-current="page" href="#">Mi cuenta ( {{ Auth::user()->email }} )</a>
            </li>
            <li class="pe-3 pt-2 nav-item text-end">
              <a class="nav-link text-white" href="{{ route('categories') }}">Categorías</a>
            </li>
            <li class="pe-3 pt-2 nav-item text-end">
              <a class="nav-link text-white disabled" href="#">Blog</a>
            </li>
            <li class="pe-3 pt-2 nav-item text-end">
              <a class="nav-link text-white disabled" aria-disabled="true">Acerca de Nivelo</a>
            </li>
            <li class="pe-3 pt-2 nav-item text-end">
              <a class="nav-link text-white disabled" aria-disabled="true">Términos y condiciones</a>
            </li>
            @auth
            <li class="nav-item pt-2 text-end">
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
            <li class="nav-item text-end">
              <a href="{{ route('login') }}">Iniciá sesión</a>
            </li>
          @endauth
          </ul>

        </div>
      </div>
    </div>
  </nav>


</div>

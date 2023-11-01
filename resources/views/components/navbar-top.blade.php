<div>
  <nav class="navbar navbar-expand-lg bg-violeta-dark">
    <div class="py-1 container-fluid">
      <div>
        <a class="navbar-brand" href="#"><img src="{{ url('/img/logo_h_blanco.png') }}" alt="logo de nivelo">
        </a>
      </div>
      <div class="flex">
        <img src="{{ url('/img/bookmark.png') }}" alt="vista perfil de usuario" class="me-3">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"><img src="{{ url('/img/category.png') }}" alt="menú"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="pe-3 pt-3 nav-item text-end">
            <a class="nav-link active text-white" aria-current="page" href="#">Mi cuenta ( {{ Auth::user()->email }} )</a>
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
  </nav>
</div>

<div class="fixed-top">
  <nav class="navbar bg-violeta-dark navbar-expand-lg shadow-sm navbar-dark">
    <div class="container container-fluid py-2 d-flex align-items-center">
      <div>
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('/img/logo_h_blanco.png') }}" alt="logo de nivelo"></a>
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end pt-3" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item  me-4">
            <a class="nav-link underlined-hover100 active text-light" aria-current="page" href="{{ route('home') }}#home">HOME</a>
          </li>
          <li class="nav-item  me-4">
            <a class="nav-link underlined-hover100 text-light" href="{{ route('home') }}#app">LA APP</a>
          </li>
          {{-- <li class="nav-item  me-4">
            <a class="nav-link underlined-hover100 text-light" href="#">CONTACTO</a>
          </li> --}}
          <li class="nav-item  me-4">
            <a class="nav-link underlined-hover100 text-light" href="{{ route('login') }}">INGRESAR</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link underlined-hover100 text-white"  href="#">DESCARGAR</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>
</div>

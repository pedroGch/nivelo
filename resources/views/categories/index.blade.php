@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Categorías')

@section('header')

<header>
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
</header>
@endsection

@section('content')


  <section class="container">
    <div class="my-4">
      @if (\Session::has('status.message'))
          <div class="alert alert-success d-flex align-items-center row alert-dismissible fade show" role="alert">
            {!! \Session::get('status.message') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
          </div>
        @endif
      <div class="row">
        <div class="col-6 ">
          <h2 class="titulo fw-bold mt-3">Categorías</h2>
        </div>
        <div class="col-6">
          <div class="">
            <a class="btn rounded-pill p-3 shadow bg-verde-principal text-white w-standard " >
              {{-- <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-geo-alt-fill me-1" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
              </svg> --}}
              <img src="{{ url('/img/location.png') }}" alt="vista perfil de usuario" class="me-1">
              <span class="fw-semibold">Ver mapa</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="row my-3">
      <div class="col-12">
        <div class="input-group">
          <input type="text" class="form-control buscador-principal" placeholder="Buscar" aria-label="buscar" aria-describedby="buscar">
          <button class="btn bg-verde-principal" type="button" id="button-addon2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#FFF" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </div>
      </div>
    </div>
    <div class="row my-3">
      <div class="col-12 mb-2">
        <img src="{{ url('/img/cat_restaurante.png') }}" alt="restaurante" class="w-100">
      </div>
      <div class="col-12 mb-2">
        <img src="{{ url('/img/cat_comercios.png') }}" alt="comercio de ropa" class="w-100">
      </div>
      <div class="col-12 mb-2">
        <img src="{{ url('/img/cat_shoppings.png') }}" alt="shopping" class="w-100">
      </div>
    </div>

  </section>

  <footer class=" ">
    <nav >
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
      <a href="" class="new_place text-decoration-none pb-2">
        <span class="text-white fw-semibold fs-1">
          {{-- <ion-icon name="add-outline"></ion-icon> --}}
          +
        </span>
        <span class="text">Nuevo lugar</span>
      </a>
      <a href="">
        <span class="icon">
          <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
        </span>
        <span class="text">Chat</span>
      </a>
      <a href="">
        <span class="icon">
          <ion-icon name="person-outline"></ion-icon>
        </span>
        <span class="text">Perfil</span>
      </a>

    </nav>
  </footer>
@endsection
@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Detalle del Lugar')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

  <section class="container margin-navs">
    <div class="my-4">
      @if (\Session::has('status.message'))
          <div class="alert alert-success d-flex align-items-center row alert-dismissible fade show" role="alert">
            {!! \Session::get('status.message') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
          </div>
        @endif
    </div>
    <div class="row border-bottom border-dark-subtle pb-3">
      <div class="col-6 col-md-9 d-flex mt-3 align-items-center">
        <a href="#"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1" height="20px"></a>
        <p class="h4 titulo fw-bold  ps-2"><a href="{{ route('categories') }}" class="text-decoration-none text-reset">Categorías</a> / <a href="{{ route('categoryDetail') }}" class="text-decoration-none text-reset">Restaurantes</a></p>
      </div>
      <div class="mt-3">
        <h2 class="fw-bold ps-2">Condor Clift - Pizza & Pasta</h2>
      </div>
      <div class="mt-3 d-flex align-items-center">
        <div>
          <p class="h5 ps-2">Calificación:</p>
        </div>
        <div class="d-flex">
          <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1"></div>
          <div>
            <p class="ps-1 pt-1">8</p>
          </div>
          <div>
            <p class="ps-3 pt-1">(5 reseñas)</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row border-bottom border-dark-subtle pb-3">
      <div class="col-12">
        <div class="mt-3 d-flex align-items-center">
          <div>
            <p class="h5 ps-2">Dirección:</p>
          </div>
        </div>
        <div>
          <p class="ps-2">Lorem ipsum dolor sit amet consectetur adipisicing</p>
        </div>
        <div class="col-12 col-lg-auto d-flex">
          <div class="">
            <a class="btn w-100 rounded-pill p-3 shadow bg-verde-principal text-white " >
              <img src="{{ url('/img/location.png') }}" alt="vista perfil de usuario" class="me-1">
              <span class="fw-semibold">Ver en el mapa</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row border-bottom border-dark-subtle pb-3">
      <div class="col-12">
        <div class="mt-3 d-flex align-items-center">
          <div>
            <p class="h5 ps-2">Características:</p>
          </div>
        </div>
      </div>
      <div class="col-12">
        <form action="#" method="POST">
          @csrf
          <div class="row">
            <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
              <input type="checkbox" class="btn-check" id="xxx" name="xxx"  autocomplete="off">
              <label class="bg-gris-claro border border-0 shadow fw-semibold btn rounded-pill" for="xxx">Entrada accesible</label>
            </div>
            <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
              <input type="checkbox" class="btn-check" id="xxx" name="xxx"  autocomplete="off">
              <label class="bg-gris-claro border border-0 shadow fw-semibold btn rounded-pill" for="xxx">Entrada accesible (requiere asistencia)</label>
            </div>
            <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
              <input type="checkbox" class="btn-check" id="xxx" name="xxx"  autocomplete="off">
              <label class="bg-gris-claro border border-0 shadow fw-semibold btn rounded-pill" for="xxx">Circulación interna</label>
            </div>
            <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
              <input type="checkbox" class="btn-check" id="xxx" name="xxx"  autocomplete="off">
              <label class="bg-gris-claro border border-0 shadow fw-semibold btn rounded-pill" for="xxx">Baño adaptado</label>
            </div>
            <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
              <input type="checkbox" class="btn-check" id="xxx" name="xxx"  autocomplete="off">
              <label class="bg-gris-claro border border-0 shadow fw-semibold btn rounded-pill" for="xxx">Cambiador para adultos</label>
            </div>
            <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
              <input type="checkbox" class="btn-check" id="xxx" name="xxx"  autocomplete="off">
              <label class="bg-gris-claro border border-0 shadow fw-semibold btn rounded-pill" for="xxx">Estacionamiento común</label>
            </div>
            <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
              <input type="checkbox" class="btn-check" id="xxx" name="xxx"  autocomplete="off">
              <label class="bg-gris-claro border border-0 shadow fw-semibold btn rounded-pill" for="xxx">Estacionamiento adaptado</label>
            </div>
            <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
              <input type="checkbox" class="btn-check" id="xxx" name="xxx"  autocomplete="off">
              <label class="bg-gris-claro border border-0 shadow fw-semibold btn rounded-pill" for="xxx">Ascensor / plataforma</label>
            </div>


        </form>
        </div>
        <div class="mb-4">
          <a href="{{ route('categories') }}" class="form-control btn rounded-pill p-3 shadow bg-verde-principal text-white">Cancelar</a>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

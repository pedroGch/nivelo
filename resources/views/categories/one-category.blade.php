@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Categorías')

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
      <div class="row">
        <div class="col-6 col-md-9 d-flex mt-3 align-items-center">
          <a href="#"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1" height="20px"></a>
          <h2 class="titulo fw-bold  ps-2"><a href="{{ route('categories') }}" class="text-decoration-none text-reset">Categorías</a> / Restaurantes</h2>
        </div>
        <div class="col-6 col-md-3 d-flex justify-content-end">
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

    <div class="row g-3 my-3 pt-3 d-flex">

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat_comercios.jpg') }}" alt="comercio de ropa" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Comercios</p>
            </div>
          </div>
        </a>
      </div>


      <div class="col-12 col-md-6 col-xl-4 mb-2 shadow d-flex rounded-2">
        <div class="col-4">
          <img src="{{ url('/img/places/2.jpeg') }}" alt="restaurante **id 2** " class="h-100 img-fluid rounded-start">
        </div>
        <div class="col-8 ps-1">
          <h3 class="h5 fw-bold">Condor Clift - Pizza & Pasta</h3>
          <p class="text-muted">Restaurantes</p>
          <div class="d-flex">
            <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid"></div>
            <div>
              <p class="text-muted">8</p>
            </div>
          </div>
        </div>

      </div>

    </div>

  </section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

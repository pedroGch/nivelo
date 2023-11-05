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
        <div class="col-6 col-md-9">
          <h2 class="titulo fw-bold mt-3 ps-2">Categorías</h2>
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
    <div class="row g-3 my-3 pt-3 d-flex">
      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat_gastronomia.jpg') }}" alt="Gastronomía" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Gastronomía</p>
            </div>
          </div>
        </a>
      </div>

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

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat_shoppings.jpg') }}" alt="shoppings" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Shoppings</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-alojamientos.jpg') }}" alt="alojamiento" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Alojamiento</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-recreacion-cultura.jpg') }}" alt="recreacion y cultura" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Recreación y Cultura</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-plazas-parques.jpg') }}" alt="plazas y parques" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Plazas y parques</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-playas-balnearios.jpg') }}" alt="Playas y Balnearios" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Playas y Balnearios</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-oficinas-estado.jpg') }}" alt="Oficinas del Estado" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Oficinas del Estado</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-educacion.jpg') }}" alt="Educación" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Educación</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-deporte.jpg') }}" alt="Deporte" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Deporte</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-salud.jpg') }}" alt="Salud" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Salud</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-transporte.jpg') }}" alt="Transporte" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Transporte</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-12 col-md-6 col-xl-4 position-relative">
        <a href=" {{ route('categoryDetail') }} ">
          <div class="col-12 d-flex">
            <img src="{{ url('/img/categorias/cat-albergues-transitorios.jpg') }}" alt="Albergues transitorios" class="w-100 rounded rounded-3 shadow">
            <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-3 ms-3 shadow">
              <p class="pt-2 px-4 text-white">Albergues transitorios</p>
            </div>
          </div>
        </a>
      </div>

    </div>

  </section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

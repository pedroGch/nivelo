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
    </div>
    <div class="row">
      <div class="col-6 col-md-9 d-flex mt-3 align-items-center">
        <a href="#"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1" height="20px"></a>
        <h2 class="titulo fw-bold  ps-2"><a href="{{ route('categories') }}" class="text-decoration-none text-reset">Categorías</a> / Restaurantes</h2>
      </div>
      <div class="col-6 col-md-3 d-flex justify-content-end">
        <div class="">
          <a class="btn rounded-pill p-3 shadow bg-verde-principal text-white w-standard " >
            <img src="{{ url('/img/location.png') }}" alt="vista perfil de usuario" class="me-1">
            <span class="fw-semibold">Ver mapa</span>
          </a>
        </div>
      </div>
    </div>


    <div class="row g-4 my-2 pt-2 d-flex justify-content-around">

      <div class="card col-6 col-lg-3" style="width: 18rem;">
        <a href="{{ route('placeDetail') }}" class="text-reset text-decoration-none">
          <img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="h5 fw-bold mt-3">Condor Clift - Pizza & Pasta</h3>
              <p class="h6">Restaurantes</p>
              <div class="d-flex">
                <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid"></div>
                <div>
                  <p>8</p>
                </div>
              </div>
          </div>
        </a>
      </div>
      <div class="card col-6 col-lg-3" style="width: 18rem;">
        <a href="{{ route('placeDetail') }}" class="text-reset text-decoration-none">
          <img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="h5 fw-bold mt-3">Condor Clift - Pizza & Pasta</h3>
              <p class="h6">Restaurantes</p>
              <div class="d-flex">
                <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid"></div>
                <div>
                  <p>8</p>
                </div>
              </div>
          </div>
        </a>
      </div>
      <div class="card col-6 col-lg-3" style="width: 18rem;">
        <a href="{{ route('placeDetail') }}" class="text-reset text-decoration-none">
          <img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="h5 fw-bold mt-3">Condor Clift - Pizza & Pasta</h3>
              <p class="h6">Restaurantes</p>
              <div class="d-flex">
                <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid"></div>
                <div>
                  <p>8</p>
                </div>
              </div>
          </div>
        </a>
      </div>
      <div class="card col-6 col-lg-3" style="width: 18rem;">
        <a href="{{ route('placeDetail') }}" class="text-reset text-decoration-none">
          <img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="h5 fw-bold mt-3">Condor Clift - Pizza & Pasta</h3>
              <p class="h6">Restaurantes</p>
              <div class="d-flex">
                <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid"></div>
                <div>
                  <p>8</p>
                </div>
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

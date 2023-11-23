<?php

/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place[] $places
 */


?>


@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Categorías')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

  <section class="container margin-navs">
    <div class="mx-2 my-4">
      @if (\Session::has('status.message'))
              <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
                {!! \Session::get('status.message') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
              </div>
            @endif
    </div>
    <div class="row">
      <div class="col-6 col-md-9 d-flex mt-3 align-items-center">
        <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1" height="20px"></a>
        <h2 class="titulo fw-bold  ps-2"><a href="{{ route('categories') }}" class="text-decoration-none text-reset">Categorías</a> / {{ $category->name }}</h2>
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


    <div class="row g-4 my-2 mb-5 pt-2 d-flex justify-content-around">

      @forelse ($places as $place)
      <div class="card col-6 col-lg-3" style="width: 18rem;">
        <a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id  ] ) }}" class="text-reset text-decoration-none">
          <img src="{{asset('storage/'. $place->main_img) }}" class="card-img-top" alt="{{ $place->alt_main_img }}">
          <div class="card-body">
            <p class="h6">{{ $category->name }}</p>
            <h3 class="h5 fw-bold mt-3">{{ $place->name }}</h3>
            <p class="h6">{{ $place->city }}</p>

            <div class="col-12 mt-2 mb-3 d-flex justify-content-center">
              @switch($place->totalAverageScore)
                @case($place->totalAverageScore >= 1 && $place->totalAverageScore < 2)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @case($place->totalAverageScore >= 2 && $place->totalAverageScore < 3)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @case($place->totalAverageScore >= 3 && $place->totalAverageScore < 4)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @case($place->totalAverageScore >= 4 && $place->totalAverageScore < 5)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @case($place->totalAverageScore == 5)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break

                @default
                <div class="d-flex">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                </div>
              @endswitch
            </div>
          </div>
        </a>
      </div>
      @empty
      <div class="col-12">
        <p class="h5 fw-bold">¡Aún no hay lugares cargados para esta categoría!</p>
        <div class="my-4">
          <a href="{{ route('addPlaceForm') }}" class="btn w-100 rounded-pill p-3 shadow bg-verde-principal btn-verde-hover text-white " >
            <span class="fw-semibold">Cargar un lugar</span>
          </a>
        </div>
      </div>
      @endforelse
    </div>
  </section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

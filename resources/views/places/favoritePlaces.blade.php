<?php

/**
 * @var \App\Models\Place[] $places
 */
?>

@extends('layouts.main')


@section('title', 'Lugares favoritos')

@section('header')

<x-NavbarTop :favoritesPlacesActive="$favoritesPlacesActive ? 'true' : 'false'"/>

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
    <div class="col-12 my-2 d-flex border-bottom border-dark-subtle pb-3">
      <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mt-2 mb-2" height="20px"></a>
      <div class="d-flex ">
        <h1 class="h3 fw-bold">Mis Lugares favoritos</h1>
        <span class="bg-movimiento ms-3"></span>
      </div>
    </div>
  </div>
  <div class="row g-4 my-2 pt-2 d-flex justify-content-around">
    @forelse ($placesResult as $place)
    <div class="card col-6 col-lg-3 shadow-sm place-card mb-4 position-relative">
      @if($place->notablePlace || $place->place_id == 5)
      <div class="position-absolute top-0 end-0 pt-1 z-3">
        <img src="/img/icons/notable-place.png" alt="lugar destacado" style="height: 70px">
      </div>
      @endif
      <div class="place-image-wrapper">
      <a href="{{ route('placeDetail', ['category_id' => $place->categories->category_id, 'place_id' => $place->place_id  ] ) }}" class="text-reset text-decoration-none">
        <img src="{{asset('storage/'. $place->main_img) }}" class="card-img-top img-fluid place-image image-hover-bright" alt="{{ $place->alt_main_img }}">
      </div>
        <div class="card-body d-flex flex-column">
          <p class="h6">{{ $place->categories->name }}</p>
          <h3 class="h5 fw-bold mt-3 place-name">{{ $place->name }}</h3>
          @if($place->city != null)
          <p class="h6">{{ $place->city }}</p>
          @else
          <div class="pt-4">
          </div>
          @endif
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
            <div class="my-3">
              <form action="{{ route('places.unfavorite', $place->place_id) }}" method="POST">
                @csrf
                <button type="submit" class="btn d-flex align-items-center justify-content-center rounded-pill shadow-sm bg-verde-principal btn-verde-hover text-white">
                  <ion-icon style="color: #fff" name="trash-outline" size="large" class="me-2 icon-hover"></ion-icon>
                  <span class="fw-semibold">Quitar de Favoritos</span>
                </button>
              </form>
            </div>
          </div>
        </a>
      </div>
    @empty
      <div class="alert alert-warning align-self-center" role="alert">
        Todavía no agregaste ningun lugar.
      </div>

      <div>
        <p class="h4 lh-md text-center px-5 pt-5">Con nivelo podés buscar lugares por nombre, categoría y características de accesibilidad, o navegar por el mapa y descubrir lugares cercanos.</p>
      </div>

      <div class="my-4 d-flex justify-content-center">
        <a href="{{ route('mapViewForm') }}" class="my-3 form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white w-50 fw-bold">Explorar lugares cercanos</a>
      </div>
    @endforelse
  </div>

</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

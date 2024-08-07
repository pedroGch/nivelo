<?php
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place[] | \Illuminate\Database\Eloquent\Collection | \Illuminate\Pagination\LengthAwarePaginator $places
 */
?>

@extends('layouts.main')

@section('title', $category->name)

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
  <div class="row border-bottom border-dark-subtle pb-3">
    <div class="col-12 col-md-9 d-flex mt-3 align-items-center">
      <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mb-2" height="20px"></a>
      <h1 class="h5 fw-bold ps-2"><a href="{{ route('categories') }}" class="text-decoration-none text-reset">Categorías</a> / {{ $category->name }}</h1>
    </div>
  </div>
  <div class="row g-4 my-2 mb-5 pt-2 d-flex justify-content-around">
    @forelse ($places as $place)
    <div class="card col-6 col-lg-3 shadow-sm place-card mb-4 position-relative">
      @if($place->notablePlace || $place->place_id == 5)
      <div class="position-absolute top-0 end-0 pt-1 z-3">
        <img src="/img/icons/notable-place.png" alt="lugar destacado" style="height: 70px">
      </div>
      @endif
      <div class="place-image-wrapper">
        <a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id  ] ) }}" class="text-reset text-decoration-none">
          <img src="{{ asset('storage/'. $place->main_img) }}" class="card-img-top img-fluid place-image image-hover-bright" alt="{{ $place->alt_main_img }}">
      </div>
        <div class="card-body d-flex flex-column">
          <p class="h6">{{ $category->name }}</p>
          <h2 class="h5 fw-bold mt-3 place-name">{{ $place->getFirstPartOfName() }}</h2>
          @if($place->city != null)
          <p class="h6">{{ $place->city }}</p>
          @else
          <div class="pt-4">
          </div>
          @endif

          <div class="col-12 mt-2 mb-3 d-flex justify-content-center">
            @switch($place->totalAverageScore)
              @case($place->totalAverageScore >= 1 && $place->totalAverageScore < 2)
                <div class="visually-hidden">Puntaje: 1 de 5</div>
                <div class="d-flex" aria-hidden="true">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                </div>
              @break
              @case($place->totalAverageScore >= 2 && $place->totalAverageScore < 3)
                <div class="visually-hidden">Puntaje: 2 de 5</div>
                <div class="d-flex" aria-hidden="true">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                </div>
              @break
              @case($place->totalAverageScore >= 3 && $place->totalAverageScore < 4)
                <div class="visually-hidden">Puntaje: 3 de 5</div>
                <div class="d-flex" aria-hidden="true">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                </div>
              @break
              @case($place->totalAverageScore >= 4 && $place->totalAverageScore < 5)
              <div class="visually-hidden">Puntaje: 4 de 5</div>
                <div class="d-flex" aria-hidden="true">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                </div>
              @break
              @case($place->totalAverageScore == 5)
                <div class="visually-hidden">Puntaje: 5 de 5</div>
                <div class="d-flex" aria-hidden="true">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                </div>
              @break
              @default
              <div class="visually-hidden">Puntaje: 1 de 5</div>
              <div class="d-flex" aria-hidden="true">
                <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid pt-1">
              </div>
            @endswitch
          </div>
        </div>
      </a>
    </div>
    @empty
    <div class="col-12">
      <p class="h6 fw-bold">¡Aún no hay lugares cargados para esta categoría!</p>
      <div class="col-12 col-lg-4 my-4">
        <a href="{{ route('addPlaceForm') }}" class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
          <span class="fw-semibold">Cargar un lugar</span>
        </a>
      </div>
    </div>
    @endforelse
  </div>
  <div>
    {{ $places->links() }}
  </div>
</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

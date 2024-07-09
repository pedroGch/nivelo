<?php

/**
 * @var \App\Models\Place[] $placesResult
 * @var string $searchPlace
 */
?>

@extends('layouts.main')


@section('title', 'Resultado de Búsqueda')

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
    <div class="row border-bottom border-dark-subtle pb-3 d-flex">
      <div class="col-12 col-md-9 d-flex mt-3 align-items-center">
        <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1  mb-2" height="20px"></a>
        <div class="d-flex ">
          <h2 class="h3 fw-bold">Resultados de tu búsqueda</h2>
          <span class="bg-movimiento ms-3"></span>
        </div>
      </div>
    </div>
  </div>
  <div class="row my-3">
    <div class="col-12">
      <form action="{{ route('searchPlaces') }}" method="get">
        @csrf
        <div class="input-group">
          <input type="text" class="form-control buscador-principal" name="buscar" id="buscar" placeholder="Lugar, ciudad o provincia" aria-label="buscar" aria-describedby="buscar" value="{{ $searchPlace }}">
          <button class="btn bg-verde-principal" type="submit" id="button-addon2">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#FFF" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </div>
        <div class="mt-3">
          <p class="d-inline-flex gap-1">
          <button class="btn rounded-pill py-2 shadow-sm bg-verde-principal text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Búsqueda avanzada
            </button>
          </p>
          <div class="collapse" id="collapseExample">
            <div>
              <label for="category_id" class="form-label h5">Categoría:</label>
            <select class="form-select" id="category_id" name="category_id">
              <option value="">Todas</option>
              @foreach ($categories as $category)
              <option value="{{ $category->category_id }}" {{ (int) old('category_id', $request->category_id) === $category->category_id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
              @endforeach
            </select>
            </div>
            <div>
              <fieldset class="mt-4">
                <legend class="h5">Características de accesibilidad:</legend>
                <div class="d-flex justify-content-around my-3">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="access_entrance" id="access_entrance" name="features[]"{{ in_array('access_entrance', $request->features ?? []) ? 'checked' : '' }}>
                      <label class="form-check-label" for="access_entrance">
                        Entrada
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="assisted_access_entrance" id="assisted_access_entrance" name="features[]"{{ in_array('assisted_access_entrance', $request->features ?? []) ? 'checked' : '' }}>
                      <label class="form-check-label" for="assisted_access_entrance">
                        Entrada accesible con asistencia
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="internal_circulation" id="internal_circulation" name="features[]"{{ in_array('internal_circulation', $request->features ?? []) ? 'checked' : '' }}>
                      <label class="form-check-label" for="internal_circulation">
                        Circulación interna
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="bathroom" id="bathroom" name="features[]"{{ in_array('bathroom', $request->features ?? []) ? 'checked' : '' }}>
                      <label class="form-check-label" for="bathroom">
                        Baño adaptado
                      </label>
                  </div>
                </div>
                <div class="d-flex justify-content-around">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="adult_changing_table" id="adult_changing_table" name="features[]"{{ in_array('adult_changing_table', $request->features ?? []) ? 'checked' : '' }}>
                      <label class="form-check-label" for="adult_changing_table">
                        Cambiador para adultos
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="parking" id="parking" name="features[]"{{ in_array('parking', $request->features ?? []) ? 'checked' : '' }}>
                      <label class="form-check-label" for="parking">
                        Estacionamiento
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="elevator" id="elevator" name="features[]"{{ in_array('elevator', $request->features ?? []) ? 'checked' : '' }}>
                      <label class="form-check-label" for="elevator">
                        Ascensor / plataforma
                      </label>
                  </div>
                </div>
              </fieldset>
            </div>
          <div class="my-3">
            <button class="btn rounded-pill py-2 shadow-sm bg-verde-principal text-white" type="submit">Aplicar filtros</button>
            <button class="btn rounded-pill py-2 shadow-sm bg-verde-principal text-white" type="button" onclick="window.location.href='{{ route('searchPlaces') }}';">
              Resetear filtros
                    </button>
          </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="row g-4 my-2 mb-5 pt-2 d-flex justify-content-around">
    @forelse ($placesResult as $place)
    <div class="card col-6 col-lg-3 shadow-sm-sm place-card mb-4 position-relative">
      {{-- @if($place->notablePlace) --}}
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
        <h3 class="h5 fw-bold mt-3 place-name">{{ $place->getFirstPartOfName() }}</h3>
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
      </div>
    </a>
    </div>
    @empty
    <div class="col-12">
      <p class="h5 fw-bold">Aún no hay lugares que coincidan con los criterios de tu búsqueda.</p>
      <p class="h6"> ¿Conocés alguno? ¡Te invitamos a subirlo a nivelo para hacer crecer nuestra base de datos y permitir que otros usuarios se animen a visitarlo!.</p>
        <div class="my-4">
          <a href="{{ route('addPlaceForm') }}" class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
            <span class="fw-semibold">Cargar un lugar</span>
          </a>
        </div>
    </div>
    @endforelse
  </div>

  <div class="pt-4">
    {{ $placesResult->links() }}
  </div>
</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

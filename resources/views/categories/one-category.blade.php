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


    <div class="row g-4 my-2 pt-2 d-flex justify-content-around">

      @forelse ($places as $place)
      <div class="card col-6 col-lg-3" style="width: 18rem;">
        <a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id  ] ) }}" class="text-reset text-decoration-none">
          <img src="{{asset('storage/'. $place->main_img) }}" class="card-img-top" alt="{{ $place->alt_main_img }}">
          <div class="card-body">
            <p class="h6">{{ $category->name }}</p>
            <h3 class="h5 fw-bold mt-3">{{ $place->name }}</h3>
            <p class="h6">{{ $place->city }}</p>

              <div class="d-flex">
                <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid"></div>
                <div>
                  <p>8</p>
                </div>
              </div>
          </div>
        </a>
      </div>
      @empty
      <div class="col-12">
        <p class="h5 fw-bold">Aún no hay lugares cargados para esta categoría</p>
      </div>
      @endforelse
    </div>
  </section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

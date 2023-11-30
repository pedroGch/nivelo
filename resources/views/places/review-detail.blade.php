<?php
/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place $place
 * @var \App\Models\Review $review
 */

 ?>

@extends('layouts.main')

@section('title', 'Detalle de reseña')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="mx-2 my-4">
    @if (\Session::has('status.message'))
      <div class="alert alert-success d-flex align-items-center row alert-dismissible fade show" role="alert">
        {!! \Session::get('status.message') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif
  </div>
  <div class="row border-bottom border-dark-subtle pb-3 d-flex">
    <div class="col-12 col-md-9 d-flex mt-3 align-items-center">
      <a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id  ] ) }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mb-2" height="20px"></a>
      <p class="h5 fw-bold ps-2"><a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id]) }}" class="text-decoration-none text-reset">{{ $place->name }}  </a> / </p>
    </div>
    <h2 class="h3 fw-bold ps-2 mt-3">Comentario de: {{ $review->user->username }}</h2>
  </div>
  <div class="row border-bottom border-dark-subtle pb-4">
    <div>
      <p class="h5 mt-3 fw-bold">Calificación:</p>
    </div>
    <div class="col-12 mt-2 d-flex justify-content-center">
      @switch($review->score)
        @case($review->score == 1)
          <div class="d-flex">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluidpt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
          </div>
        @break
        @case($review->score == 2)
          <div class="d-flex">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
          </div>
        @break
        @case($review->score == 3)
          <div class="d-flex">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
          </div>
        @break
        @case($review->score == 4)
          <div class="d-flex">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
          </div>
        @break
        @case($review->score == 5)
          <div class="d-flex">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
          </div>
        @break

        @default
        <div class="d-flex">
          <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
        </div>
      @endswitch
    </div>
  </div>
  <div class="row border-bottom border-dark-subtle pb-4">
    <div>
      <p class="h5 mt-3 fw-bold">Acerca del usuario:</p>
    </div>
    <div>
      @if($review->user->user_definition->none == 0 && $review->user->user_definition->sticks == 0 && $review->user->user_definition->crutches == 0 && $review->user->user_definition->walker == 0 && $review->user->user_definition->difficult_walking == 0 && $review->user->user_definition->manual_wheelchair == 0 && $review->user->user_definition->electric_wheelchair == 0 && $review->user->user_definition->scooter == 0)
        <p>Aún no cargó ninguna información sobre su movilidad.</p>
      @else
        @if ($review->user->user_definition->none == 1)
        <ul>
          <li>No posee discapacidad pero se sumó a la "Comunidad #YoNivelo"</li>
        </ul>
        @endif
        @if($review->user->user_definition->none == 0)
          <p>Se moviliza con:</p>
          <ul>
          @if($review->user->user_definition->sticks == 1)
            <li>Bastones</li>
          @endif
          @if($review->user->user_definition->crutches == 1)
            <li>Muletas</li>
          @endif
          @if($review->user->user_definition->walker == 1)
            <li>Andador</li>
          @endif
          @if($review->user->user_definition->difficult_walking == 1)
            <li>Camina con dificultad</li>
          @endif
          @if($review->user->user_definition->manual_wheelchair == 1)
            <li>Silla de ruedas manual</li>
          @endif
          @if($review->user->user_definition->electric_wheelchair == 1)
            <li>Silla de ruedas eléctrica</li>
          @endif
          @if($review->user->user_definition->scooter == 1)
            <li>Scooter</li>
          @endif
          </ul>
        @endif
      @endif
    </div>
  </div>
  <div class="row border-bottom border-dark-subtle pb-4">
    <div>
      <p class="h5 mt-3 fw-bold">Su opinión sobre este lugar:</p>
    </div>
    <div class="col-12 d-flex justify-content-center">
      @if($review->review)
      <p>"{!! nl2br($review->review) !!}"</p>
      @else
      <p class="h6">Sólo utilizó la calificación de estrellas.</p>
      @endif
    </div>
  </div>
  <div class="row border-bottom border-dark-subtle pb-4">
    <div>
      <p class="h5 mt-3 fw-bold">Fotos:</p>
    </div>
    <div class="col-12 d-flex justify-content-center">
      @if($review->pic_1 || $review->pic_2 || $review->pic_3)
      <div class="col-12 col-md-10 col-lg-7">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            @if($review->pic_1)
            <div class="carousel-item active">
              <img src="{{asset('storage/'. $review->pic_1) }}" class="d-block w-100" alt="{{ $review->alt_pic_1 }}">
            </div>
            @endif
            @if($review->pic_2)
            <div class="carousel-item">
              <img src="{{asset('storage/'. $review->pic_2) }}" class="d-block w-100" alt="{{ $review->alt_pic_2 }}">
            </div>
            @endif
            @if($review->pic_3)
            <div class="carousel-item">
              <img src="{{asset('storage/'. $review->pic_3) }}" class="d-block w-100" alt="{{ $review->alt_pic_3 }}">
            </div>
            @endif
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
          </button>
        </div>
      </div>
      @else
      <p class="h6">El usuario no subió fotos</p>
      @endif
    </div>
  </div>
</section>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

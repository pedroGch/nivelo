<?php
/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place $place
 * @var \App\Models\Review $review
 */

 ?>

@extends('layouts.main')

@section('title', 'Detalle Comentario')

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
    <div class="row border-bottom border-dark-subtle pb-3 d-flex">
      <div class="col-12 col-md-9 d-flex mt-3 align-items-center">
        <a href="#"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1" height="20px"></a>
        <h2 class="h4 titulo fw-bold ps-2"><a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id]) }}" class="text-decoration-none text-reset">{{ $place->name }}  </a> / Comentario de {{ $review->user->user_more_info->username }}</h2>
      </div>
    </div>
    <div class="row border-bottom border-dark-subtle pb-4">
      <div>
        <p class="h5 mt-3 ps-2">Calificación:</p>
      </div>
      <div class="col-12 mt-2 d-flex justify-content-center">
        @switch($review->score)
          @case($review->score == 1)
            <div class="d-flex">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            </div>
          @break
          @case($review->score == 2)
            <div class="d-flex">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            </div>
          @break
          @case($review->score == 3)
            <div class="d-flex">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            </div>
          @break
          @case($review->score == 4)
            <div class="d-flex">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
              <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
            </div>
          @break
          @case($review->score == 5)
            <div class="d-flex">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
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



</section>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

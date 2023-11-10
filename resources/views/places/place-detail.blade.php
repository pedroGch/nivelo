<?php
/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place $place
 * @var \App\Models\Review[] $reviews
 * @var \App\Models\User $user_more_info
 *
 */

 ?>

@extends('layouts.main')

@section('title', 'Detalle del Lugar')

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
      <div class="col-12 col-lg-7">
        <div class="col-12 col-md-9 d-flex mt-3 align-items-center">
          <a href="#"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1" height="20px"></a>
          <p class="h4 titulo fw-bold  ps-2"><a href="{{ route('categories') }}" class="text-decoration-none text-reset">Categorías</a> / <a href="{{ route('categoryDetail', ['category_id' => $category->category_id ]) }}" class="text-decoration-none text-reset">{{ $category->name }}</a></p>
        </div>
        <div class="mt-3">
          <h2 class="fw-bold ps-2">{{ $place->name }}</h2>
        </div>
        <div class="mt-3 d-flex align-items-center border-bottom border-dark-subtle pb-3">
          <div>
            <p class="h5 ps-2">Calificación:</p>
          </div>
          <div class="d-flex">
            <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1"></div>
            <div>
              <p class="ps-1 pt-1">8</p>
            </div>
            <div>
              <p class="ps-3 pt-1">(5 reseñas)</p>
            </div>
          </div>
        </div>
      <div class="col-12 col-lg-6 ">
        <div class="mt-3 d-flex align-items-center">
          <div>
            <p class="h5 ps-2 mt-3">Dirección:</p>
          </div>
        </div>
        <div>
          <p class="ps-2">{{ $place->address }}, {{ $place->city }}, {{ $place->province }}.</p>
        </div>
        <div class="col-12 d-flex">
          <div class="my-3">
            <a class="btn w-100 rounded-pill p-3 shadow bg-verde-principal btn-verde-hover text-white " >
              <img src="{{ url('/img/location.png') }}" alt="vista perfil de usuario" class="me-1">
              <span class="fw-semibold">Ver en el mapa</span>
            </a>
          </div>
        </div>
      </div>
      </div>
      <div class="col-12 col-lg-5">
        <img src="{{asset('storage/'. $place->main_img) }}" alt="{{ $place->alt_main_img }}" class="w-100 rounded rounded-3 shadow m-md-2 m-lg-3">
      </div>
    </div>

    <div class="row border-bottom border-dark-subtle pb-3">
      <div class="col-12">
        <div class="mt-3 d-flex align-items-center">
          <div>
            <p class="h5 ps-2 mt-3">Características:</p>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="row ms-3 my-3 flex justify-content-center align-items-center">
          <ul>
          @if($place->access_entrance == 1)
          <li>Entrada accesible</li>
          @endif
          @if($place->access_entrance_assisted == 1)
          <li>Entrada accesible (con asistencia)</li>
          @endif
          @if($place->internal_circulation == 1)
          <li>Circulación interna accesible</li>
          @endif
          @if($place->bathroom == 1)
          <li>Baño adaptado</li>
          @endif
          @if($place->adult_changing_table == 1)
          <li>Cambiador para adultos</li>
          @endif
          @if($place->parking == 1)
          <li>Estacionamiento</li>
          @endif
          @if($place->elevator == 1)
          <li>Ascensor / Plataforma</li>
          @endif
          </ul>
        </div>
      </div>
    </div>
    <div class="row border-bottom border-dark-subtle pb-3">
      <div class="mt-3 d-flex align-items-center">
        <div>
          <p class="h5 ps-2 mt-3">Descripción:</p>
        </div>
      </div>
      <div>
        <p class="ps-2">{{ $place->description }}</p>
      </div>
    </div>
    <div class="row my-3 d-flex justify-content-center text-center border-bottom border-dark-subtle">
      <p>{{ $place->src_information->name }}</p>
      @if($place->src_information->src_info_id == 2)
      <p>Lugar cargado por: {{ $place->users->name }} </p>
      @endif
    </div>

    <div class="row pb-3">
      <div class="mt-3 d-flex align-items-center">
        <div>
          <p class="h5 ps-2 mt-3">Reseñas:</p>
        </div>
      </div>
      <div class="col-12 d-flex">
        <div class="my-3">
          <a class="btn w-100 rounded-pill p-3 shadow bg-verde-principal btn-verde-hover text-white " >
            <img src="{{ url('/img/location.png') }}" alt="vista perfil de usuario" class="me-1">
            <span class="fw-semibold">Opiná sobre este lugar</span>
          </a>
        </div>
      </div>
    </div>

    <div class="row g-2 my-3 pt-3 d-flex">

      @forelse($reviews as $review)
      <div class="col-12 col-md-6 col-xl-4 rounded rounded-3 bg-violeta-ultra-light shadow ">
        <div>
          <div class="mx-2">
            <p class="h6 ps-2 mt-3">Comentario:</p>
            <p>{{ $review->review }}</p>

          </div>
          <div class="mx-2 mt-3 d-flex align-items-center pb-3">
            <div class="mx-2 d-flex">
              <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1"></div>
              <div>
                <p class="d-none">Puntaje otorgado:</p>
                <p class="ps-1 pt-1">{{ $review->score }}</p>
              </div>
            </div>
          </div>
          <div class="row d-flex-justify-content-around mx-2">
            @if($review->pic_1)
            <div class="col-4"><a href="#""><img src="{{asset('storage/'. $review->pic_1) }}" class="card-img-top rounded rounded-2" alt="{{ $review->alt_pic_1 }}"></a></div>
            @endif
            @if($review->pic_2)
            <div class="col-4"><a href="#"><img src="{{asset('storage/'. $review->pic_2) }}" class="card-img-top rounded rounded-2" alt="{{ $review->alt_pic_2 }}"></a></div>
            @endif
            @if($review->pic_3)
            <div class="col-4"><a href="#"><img src="{{asset('storage/'. $review->pic_3) }}" class="card-img-top rounded rounded-2" alt="{{ $review->alt_pic_3 }}"></a></div>
            @endif
          </div>
          <div class="row">
            <div class="col-6">
              <p class="h6 ps-2 mt-3">Fecha: {{ $review->created_at }}</p>
              {{-- <p class="h6 ps-2 mt-3">Usuario: {{ $review->userMoreInfo->username}} </p> --}}
              <p class="h6 ps-2 mt-3">Usuario: {{ $review->user->user_more_info->username}} </p>
            </div>
            <div class="col-6">
              <div class="mt-3 pb-4 d-flex justify-content-center"><a href="{{ route('reviewDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id, 'review_id' => $review->review_id]) }}" class="btn rounded-pill p-3 px-4 shadow bg-verde-principal btn-verde-hover text-white ">Ver más</a></div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <p class="h6 ps-2 mt-3">Aún no hay reseñas. ¿Conocés este lugar?, ¡Contanos cómo fue tu experiencia!</p>
      </div>
      @endforelse




    </div>

    <div class="row my-3 d-flex justify-content-center">
      <div class="col-12 col-lg-3 justify-content-center">
        <div class="mb-4">
          <!--back-->
          <a href="#" class="my-3 form-control btn w-100 rounded-pill p-3 shadow bg-verde-principal btn-verde-hover text-white">Atrás</a>
        </div>
      </div>
    </div>




</section>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

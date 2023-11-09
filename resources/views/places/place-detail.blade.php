<?php
/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place $place
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
            <a class="btn w-100 rounded-pill p-3 shadow bg-verde-principal text-white " >
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
        <div class="row my-3 flex justify-content-center align-items-center">
          <div class="mb-3 px-2 d-flex justify-content-center col-6 col-md-4 col-lg-3">
            <p class="p-3 bg-gris-claro border border-0 shadow fw-semibold rounded-pill p-btn-chicos text-center">Entrada accesible</p>
          </div>
          <div class="mb-3 px-2 d-flex justify-content-center col-6 col-md-4 col-lg-3">
            <p class="p-3 bg-gris-claro border border-0 shadow fw-semibold rounded-pill p-btn-chicos text-center" >Entrada accesible (con asistencia)</p>
          </div>
          <div class="mb-3 px-2 d-flex justify-content-center col-6 col-md-4 col-lg-3">
            <p class="p-3 bg-gris-claro border border-0 shadow fw-semibold rounded-pill p-btn-chicos text-center">Circulación interna accesible</p>
          </div>
          <div class="mb-3 px-2 d-flex justify-content-center col-6 col-md-4 col-lg-3">
            <p class="p-3 bg-gris-claro border border-0 shadow fw-semibold rounded-pill p-btn-chicos text-center">Baño adaptado</p>
          </div>
          <div class="mb-3 px-2 d-flex justify-content-center col-6 col-md-4 col-lg-3">
            <p class="p-3 bg-gris-claro border border-0 shadow fw-semibold rounded-pill p-btn-chicos text-center">Cambiador para adultos</p>
          </div>
          <div class="mb-3 px-2 d-flex justify-content-center col-6 col-md-4 col-lg-3">
            <p class="p-3 bg-gris-claro border border-0 shadow fw-semibold rounded-pill p-btn-chicos text-center">Estacionamiento</p>
          </div>
          <div class="mb-3 px-2 d-flex justify-content-center col-6 col-md-4 col-lg-3">
            <p class="p-3 bg-gris-claro border border-0 shadow fw-semibold rounded-pill p-btn-chicos text-center">Ascensor / Plataforma</p>
          </div>
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
      <p>{{ $place->src_info->name }}</p>
    </div>

    <div class="row pb-3">
      <div class="mt-3 d-flex align-items-center">
        <div>
          <p class="h5 ps-2 mt-3">Reseñas:</p>
        </div>
      </div>
      <div class="col-12 d-flex">
        <div class="my-3">
          <a class="btn w-100 rounded-pill p-3 shadow bg-verde-principal text-white " >
            <img src="{{ url('/img/location.png') }}" alt="vista perfil de usuario" class="me-1">
            <span class="fw-semibold">Opiná sobre este lugar</span>
          </a>
        </div>
      </div>
    </div>

    <div class="row g-2 my-3 pt-3 d-flex">
      <div class="col-12 col-md-6 col-xl-4 rounded rounded-3 shadow ">
        <div>
          <div class="mx-2">
            <p class="h6 ps-2 mt-3">Comentario:</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed veritatis quia, assumenda pariatur vero facere nostrum!.</p>
          </div>
          <div class="mx-2 mt-3 d-flex align-items-center pb-3">
            <div class="mx-2 d-flex">
              <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1"></div>
              <div>
                <p class="d-none">Puntaje otorgado:</p>
                <p class="ps-1 pt-1">10</p>
              </div>
            </div>
          </div>
          <div class="row d-flex-justify-content-around mx-2">
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
          </div>
          <div class="col-12">
            <p class="h6 ps-2 mt-3">Fecha: 01/01/2001</p>
            <p class="h6 ps-2 mt-3">Usuario: ro_scotto</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-xl-4 rounded rounded-3 shadow p-3">
        <div>
          <div class="mx-2 mt-2">
            <p class="h6 ps-2 mt-3">Comentario:</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed veritatis quia, assumenda pariatur vero facere nostrum!.</p>
          </div>
          <div class="mt-3 d-flex align-items-center pb-3">
            <div class="mx-2 d-flex">
              <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1"></div>
              <div>
                <p class="d-none">Puntaje otorgado:</p>
                <p class="ps-1 pt-1">10</p>
              </div>
            </div>
          </div>
          <div class="row d-flex-justify-content-between">
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
          </div>
          <div class="col-12 mx-2 mb-2">
            <p class="h6 ps-2 mt-3">Fecha: 01/01/2001</p>
            <p class="h6 ps-2 mt-3">Usuario: ro_scotto</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 col-xl-4 rounded rounded-3 shadow">
        <div>
          <div class="mx-2">
            <p class="h6 ps-2 mt-3">Comentario:</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed veritatis quia, assumenda pariatur vero facere nostrum!.</p>
          </div>
          <div class="mt-3 d-flex align-items-center pb-3">
            <div class="mx-2 d-flex">
              <div><img src="{{ url('/img/icon_star.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1"></div>
              <div>
                <p class="d-none">Puntaje otorgado:</p>
                <p class="ps-1 pt-1">10</p>
              </div>
            </div>
          </div>
          <div class="row d-flex-justify-content-around">
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
            <div class="col-4"><a href=""><img src="{{ url('/img/places/2.jpeg') }}" class="card-img-top rounded rounded-2" alt="..."></a></div>
          </div>
          <div class="col-12">
            <p class="h6 ps-2 mt-3">Fecha: 01/01/2001</p>
            <p class="h6 ps-2 mt-3">Usuario: ro_scotto</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row my-3 d-flex justify-content-center">
      <div class="col-12 col-lg-3 justify-content-center">
        <div class="mb-4">
          <!--back-->
          <a href="#" class="my-3 form-control btn w-100 rounded-pill p-3 shadow bg-verde-principal text-white">Atrás</a>
        </div>
      </div>
    </div>




</section>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

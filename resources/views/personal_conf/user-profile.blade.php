<?php
/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place $place
 * @var \App\Models\Place[] $myPlaces
 * @var \App\Models\Review $review
 * @var \App\Models\Review[] $madeReviews
 * @var $UserProfileActive
 */
 ?>

@extends('layouts.main')

@section('title', 'Mi perfil')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs pb-4">
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
      <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1  mb-2" height="20px"></a>
      <div class="d-flex ">
        <h2 class="h3 fw-bold">Mi perfil</h2>
        <span class="bg-movimiento ms-3"></span>
      </div>
    </div>
  </div>
  <div>
    <p class="h5 mt-5 mb-2 fw-bold"> Nombre y apellido:</p>
    <p> {{ $userDB->name }} {{ $userDB->surname }}</p>
    <p class="h5 mt-5 mb-2 fw-bold"> Email: </p>
    <p> {{ $userDB->email }} </p>
    <p class="h5 mt-5 mb-2 fw-bold"> Nombre de usuario: </p>
    <p> {{ $userDB->username }} </p>
  </div>
  <div class="border-bottom border-dark-subtle pb-3">
    <div class="mt-5 mb-2 d-flex align-items-center">
      <p class="h5 fw-bold"> Acerca de mí: </p>
      <a href="{{ route('aboutYouForm') }}">
        <span class="icon ps-3">
          <ion-icon name="create-outline" aria-label="Editar" size="large" style="color: #000;"></ion-icon>
        </span>
      </a>
    </div>
    @if($userDB->user_definition->none == 0 && $userDB->user_definition->sticks == 0 && $userDB->user_definition->crutches == 0 && $userDB->user_definition->walker == 0 && $userDB->user_definition->difficult_walking == 0 && $userDB->user_definition->manual_wheelchair == 0 && $userDB->user_definition->electric_wheelchair == 0 && $userDB->user_definition->scooter == 0)
      <p>Aún no cargaste ninguna información sobre tu movilidad.</p>
      <div class="my-3">
        <a href="{{ route('aboutYouForm') }}" class="btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
          <span class="fw-semibold">Agregar información</span>
        </a>
      </div>
    @else
      @if ($userDB->user_definition->none == 1)
        <ul>
          <li>No posee discapacidad pero se suma a la "Comunidad #YoNivelo"</li>
        </ul>
      @endif
      @if($userDB->user_definition->none == 0)
        <ul>
        @if($userDB->user_definition->sticks == 1)
          <li>Camina con bastones</li>
        @endif
        @if($userDB->user_definition->crutches == 1)
          <li>Camina con muletas</li>
        @endif
        @if($userDB->user_definition->walker == 1)
          <li>Utiliza andador</li>
        @endif
        @if($userDB->user_definition->difficult_walking == 1)
          <li>Camina con dificultad</li>
        @endif
        @if($userDB->user_definition->manual_wheelchair == 1)
          <li>Utiliza silla de ruedas manual</li>
        @endif
        @if($userDB->user_definition->electric_wheelchair == 1)
          <li>Utiliza silla de ruedas eléctrica</li>
        @endif
        @if($userDB->user_definition->scooter == 1)
          <li>Utiliza scooter</li>
        @endif
          </ul>
      @endif
    @endif
  </div>
  <div>
    <h3 class="h4 mt-5 mb-2 fw-bold"> Mis aportes y reseñas: </h3>
    <h4 class="mt-5 mb-2 fw-bold"> Lugares nuevos:</h4>
    <table>
      @if ($myPlaces)
      <thead>
        <tr class="bg-violeta-ultra-light w-100">
          <th class="col p-2">Nombre</th>
          <th class="col p-2">Fecha</th>
        </tr>
      </thead>
      @endif
      <tbody>
        @forelse ($myPlaces as $place)
        <tr>
          <td width="50%" class="col p-2"><a href="{{ route('placeDetail', ['category_id' => $place->categories->category_id, 'place_id' => $place->place_id  ] ) }}" class="text-reset text-decoration-none p-links">{{ $place->name }}</a></td>
          <td width="25%" class="col px-2">{{ $place->created_at}}</td>
        </tr>
        @empty
        <p> No subiste ningún lugar aún.</p>
        <div class="my-4">
          <a href="{{ route('addPlaceForm') }}" class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
            <span class="fw-semibold">Cargar un lugar</span>
          </a>
        </div>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="pb-4">
    <h4 class="mt-5 mb-2 fw-bold">Opiniones: </h4>
    <table>
      @if ($myPlaces)
      <thead>
        <tr class="bg-violeta-ultra-light">
          <th class="col p-2">Nombre</th>
          <th class="col p-2">Fecha</th>
        </tr>
      </thead>
      @endif
      <tbody>
        @forelse ($madeReviews as $review)
        <tr>
          <td width="50%" class="col p-2"><a href="{{ route('placeDetail', ['category_id' => $review->place->categories->category_id, 'place_id' => $review->place->place_id  ] ) }}" class="text-reset text-decoration-none p-links">{{ $review->place->name }}</a></td>
          <td width="25%" class="col px-2">{{ $review->created_at}}</td>
        </tr>
        @empty
        <p>No has opinado sobre ningún lugar.</p>
        <div class="my-4">
          <a href="{{ route('categories') }}" class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
            <span class="fw-semibold">Buscar lugar</span>
          </a>
        </div>
        @endforelse
      </tbody>
    </table>
  </div>
</section>
@endsection

@section('footer')

<x-NavbarBottom :UserProfileActive="$UserProfileActive ? 'true' : 'false'" />


@endsection

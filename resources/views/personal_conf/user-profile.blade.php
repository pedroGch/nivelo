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

<x-NavbarTop :UserProfileActive="$UserProfileActive ? 'true' : 'false'"/>

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
        <h1 class="h3 fw-bold">Mi perfil</h1>
        <span class="bg-movimiento ms-3"></span>
      </div>
    </div>
  </div>
  <div class="my-4 col-12 col-lg-3">
    <a href="{{ route('editProfileForm') }}" class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
      <span class="fw-semibold">Editar perfil</span>
    </a>
  </div>
  <div class="row border-bottom border-dark-subtle pb-3">
    <div class="col-12 col-lg-6">
      <p class="h5 mt-5 mb-2 fw-bold"> Nombre y apellido:</p>
      <p> {{ $userDB->name }} {{ $userDB->surname }}</p>
      <p class="h5 mt-5 mb-2 fw-bold"> Sobre mí:</p>
      @if ($userDB->bio)
        <p> {{ $userDB->bio }}</p>
      @else
        <p>Por el momento tu biografía se encuentra vacía, ¡animate! <a href="{{ route('editProfileForm') }}" class="fw-bold text-reset text-decoration-none">editá tu perfíl</a> y presentate.</p>
      @endif
      <p class="h5 mt-5 mb-2 fw-bold"> Email: </p>
      <p> {{ $userDB->email }} </p>
      <p class="h5 mt-5 mb-2 fw-bold"> Nombre de usuario: </p>
      <p> {{ $userDB->username }} </p>
    </div>
    <div class="col-12 col-lg-6">
      <div>
        <p class="h5 fw-bold"> Mi avatar: </p>
        <img src="{{ url('/img/avatars/'. $userDB->avatar)}}" alt="avatar" class="rounded-image me-3 shadow-sm" style="width: 150px; height: 150px; object-fit: cover;"></div>
      <div class="mt-5 mb-2 d-flex align-items-center">
        <p class="h5 fw-bold"> Cómo me movilizo: </p>
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
          <ul class="list-unstyled">
            <li>
              <div class="row mb-1">
                <div class="col-10">
                  <p class="acerca-de-mi-descript">No posee discapacidad pero se suma a la <b>"Comunidad #YoNivelo"</b></p>
                </div>
            </li>
          </ul>
        @endif
        @if($userDB->user_definition->none == 0)
          <ul class="acerca-de-mi">
          @if($userDB->user_definition->sticks == 1)
          <li>
            <div class="row mb-1">
              <div class="col-1 p-2 d-flex justify-content-center">
                <img src="{{ url('/img/bastones.png') }}" class="bg-gris-claro rounded-5 p-2" alt="">
              </div>
              <div class="col-11">
                <p class="acerca-de-mi-descript">Utiliza bastón/es</p>
              </div>
            </div>
          </li>
          @endif
          @if($userDB->user_definition->crutches == 1)
          <li>
            <div class="row mb-1">
              <div class="col-1 p-2 d-flex justify-content-center">
                <img src="{{ url('/img/muletas.png') }}" class="bg-gris-claro rounded-5 p-2" alt="">
              </div>
              <div class="col-11">
                <p class="acerca-de-mi-descript">Camina con muletas</p>
              </div>
            </div>
          </li>
          @endif
          @if($userDB->user_definition->walker == 1)
            <li>
              <div class="row mb-1">
                <div class="col-1 p-2 d-flex justify-content-center">
                  <img src="{{ url('/img/andador.png') }}" class="bg-gris-claro rounded-5 p-2" alt="">
                </div>
                <div class="col-11">
                  <p class="acerca-de-mi-descript">Utiliza andador</p>
                </div>
              </div>
            </li>
            @endif
            @if($userDB->user_definition->difficult_walking == 1)
            <li>
              <div class="row mb-1">
                <div class="col-1 p-2 d-flex justify-content-center">
                  <img src="{{ url('/img/camina_dificultad.png') }}" class="bg-gris-claro rounded-5 p-2" alt="">
                </div>
                <div class="col-11">
                  <p class="acerca-de-mi-descript">Camina con dificultad</p>
                </div>
              </div>
            </li>
            @endif
            @if($userDB->user_definition->manual_wheelchair == 1)
            <li>
              <div class="row mb-1">
                <div class="col-1 p-2 d-flex justify-content-center">
                  <img src="{{ url('/img/silla_ruedas_manual.png') }}" class="bg-gris-claro rounded-5 p-2" alt="">
                </div>
                <div class="col-11">
                  <p class="acerca-de-mi-descript">Utiliza silla de ruedas manual</p>
                </div>
              </div>
            </li>
          @endif
          @if($userDB->user_definition->electric_wheelchair == 1)
            <li>
              <div class="row">
                <div class="col-1 p-2 d-flex justify-content-center">
                  <img src="{{ url('/img/silla_ruedas_electrica.png') }}" class="bg-gris-claro rounded-5 p-2" alt="">
                </div>
                <div class="col-11">
                  <p class="acerca-de-mi-descript">Utiliza silla de ruedas eléctrica</p>
                </div>
              </div>
            </li>
          @endif
          @if($userDB->user_definition->scooter == 1)
            <li>
              <div class="row">
                <div class="col-1 p-2 d-flex justify-content-center">
                  <img src="{{ url('/img/scooter.png') }}" class="bg-gris-claro rounded-5 p-2" alt="">
                </div>
                <div class="col-11">
                  <p class="acerca-de-mi-descript">Utiliza scooter</p>
                </div>
              </div>
            </li>
          @endif
            </ul>
        @endif
      @endif
    </div>
  </div>
  <div>
    <h2 class="mt-5 mb-2 fw-bold"> Mis aportes y reseñas: </h2>
    <h3 class="mt-5 mb-2 fw-bold"> Lugares nuevos:</h3>
    @if ($status)
      @if($myPlaces->isEmpty())
      <p> No subiste ningún lugar aún.</p>
      <div class="row">
        <div class="col-12 col-lg-4 my-4">
          <a href="{{ route('addPlaceForm') }}" class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
            <span class="fw-semibold">Cargar un lugar</span>
          </a>
        </div>
      </div>
      @endif
    @else
      <p class="alert alert-dark" role="alert"> No podes subir lugares nuevos. Comunicate con el equipo de nivelo.</p>
    @endif
    <table>
      @unless ($myPlaces->isEmpty())
      <thead>
        <tr class="bg-violeta-ultra-light w-100">
          <th class="col p-2">Nombre</th>
          <th class="col p-2">Fecha</th>
          <th class="col p-2">Estado</th>
        </tr>
      </thead>
      @endunless
      <tbody>
        @forelse ($myPlaces as $place)
        <tr>
          <td width="62%" class="col p-2"><a href="{{ route('placeDetail', ['category_id' => $place->categories->category_id, 'place_id' => $place->place_id  ] ) }}" class="text-reset text-decoration-none p-links">{{ $place->name }}</a></td>
          <td width="30%" class="col p-2">{{ $place->created_at}}</td>
          <td width="30%" class="col p-2">
            @if($place->status == 0)
            <p class="text-warning">Pendiente</p>
            @elseif ($place->status == 1)
            <p class="text-success">Aprobado</p>
            @else
            <p class="text-danger">Rechazado</p>
            @endif
          </td>
        </tr>
        @empty

        @endforelse
      </tbody>
    </table>
  </div>
  <div class="pb-4">
    <h3 class="mt-5 mb-2 fw-bold">Opiniones: </h3>
    <table>
      @unless ($madeReviews->isEmpty())
      <thead>
        <tr class="bg-violeta-ultra-light">
          <th class="col p-2">Lugar</th>
          <th class="col p-2">Puntaje</th>
          <th class="col p-2">Fecha</th>
          <th class="col p-2">Estado</th>
        </tr>
      </thead>
      @endunless
      <tbody>
        @forelse ($madeReviews as $review)
        <tr>
          <td width="50%" class="col p-2"><a href="{{ route('placeDetail', ['category_id' => $review->place->categories->category_id, 'place_id' => $review->place->place_id  ] ) }}" class="text-reset text-decoration-none p-links">{{ $review->place->name }}</a></td>
          <td width="25%" class="col px-2">
            @switch($review->score)
              @case($review->score == 1)
                <p>⭐️</p>
              @break
              @case($review->score == 2)
                <p>⭐️⭐️</p>
              @break
              @case($review->score == 3)
                <p>⭐️⭐️⭐️</p>
              @break
              @case($review->score == 4)
                <p>⭐️⭐️⭐️⭐️</p>
              @break
              @case($review->score == 5)
                <p>⭐️⭐️⭐️⭐️⭐️</p>
              @break
              @default
                <p>⭐️</p>
            @endswitch
          <td width="25%" class="col px-2">{{ $review->created_at}}</td>
          <td width="25%" class="col px-2">
            @if ($review->status == 'approved')
              <p class="text-success">Aprobado</p>
            @elseif ($review->status == 'rejected')
              <p class="text-danger">Rechazado</p>
            @else
              <p class="text-warning">Pendiente</p>
            @endif
        </tr>
        @empty
        <p>No has opinado sobre ningún lugar.</p>
        <div class="row">
          <div class="col-12 col-lg-4 my-4">
            <a href="{{ route('categories') }}" class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
              <span class="fw-semibold">Buscar lugar</span>
            </a>
          </div>
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

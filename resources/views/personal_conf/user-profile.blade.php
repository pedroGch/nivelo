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

@section('title', 'Perfil de Usuario')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

  <section class="container margin-navs pb-4">
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
        <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1" height="20px"></a>
        <h2 class="h4 titulo fw-bold ps-2">Mi perfil</h2>
      </div>
    </div>

    <div>
      <p class="h5 mt-5 mb-2"> Nombre y Apellido:</p>
      <p> {{ $userDB->name }} {{ $userDB->surname }}</p>
      <p class="h5 mt-5 mb-2"> Email: </p>
      <p> {{ $userDB->email }} </p>
      <p class="h5 mt-5 mb-2"> Nombre de usuario: </p>
      <p> {{ $userDB->username }} </p>
    </div>

    <div>
      <p class="h5 mt-5 mb-2"> Acerca de mí: </p>

      @if($userDB->user_definition->none == 0 && $userDB->user_definition->sticks == 0 && $userDB->user_definition->crutches == 0 && $userDB->user_definition->walker == 0 && $userDB->user_definition->difficult_walking == 0 && $userDB->user_definition->manual_wheelchair == 0 && $userDB->user_definition->electric_wheelchair == 0 && $userDB->user_definition->scooter == 0)
        <p>Aún no cargaste ninguna información sobre tu movilidad.</p>
        <div class="my-3">
          <a href="{{ route('aboutYouForm') }}" class="btn rounded-pill p-3 shadow bg-verde-principal btn-verde-hover text-white " >
            <span class="fw-semibold">Agregar información</span>
          </a>
        </div>
      @else
      @if ($userDB->user_definition->none == 1)
        <ul>
          <li>No poseo ninguna discapacidad pero me sumé a la "Comunidad ¡Yo, nivelo!"</li>
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
      <p class="h5 mt-5 mb-2"> Lugares nuevos que subí a la app:</p>
      <table>
        <thead>
          <tr class="bg-violeta-ultra-light w-100">
            <th class="col p-2">Nombre</th>
            <th class="col p-2">Categoría</th>
            <th class="col p-2">Fecha</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($myPlaces as $place)
          <tr>
            <td width="50%" class="col p-2"><a href="{{ route('placeDetail', ['category_id' => $place->categories->category_id, 'place_id' => $place->place_id  ] ) }}" class="fw-bold text-reset text-decoration-none">{{ $place->name }}</a></td>
            <td width="25%" class="col px-2">{{ $place->categories->name}}</td>
            <td width="25%" class="col px-2">{{ $place->created_at}}</td>
          </tr>
          @empty
          <tr>
            <td width="100%">No subiste ningún lugar aún.</td>
          </tr>
          @endforelse
      </table>
    </div>

    <div class="pb-4">
      <p class="h5 mt-5 mb-2"> Lugares sobre los que opiné: </p>
      <table>
        <thead>
          <tr class="bg-violeta-ultra-light">
            <th class="col p-2">Nombre</th>
            <th class="col p-2">Categoría</th>
            <th class="col p-2">Fecha</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($madeReviews as $review)
          <tr>
            <td width="50%" class="col p-2"><a href="{{ route('placeDetail', ['category_id' => $review->place->categories->category_id, 'place_id' => $review->place->place_id  ] ) }}" class="fw-bold text-reset text-decoration-none">{{ $review->place->name }}</a></td>
            <td width="25%" class="col px-2">{{ $review->place->categories->name}}</td>
            <td width="25%" class="col px-2">{{ $review->created_at}}</td>
          </tr>
          @empty
          <tr>
            <td width="100%">No opinaste sobre ningún lugar aún.</td>
          </tr>
          @endforelse
      </table>
    </div>

</section>
@endsection

@section('footer')

<x-NavbarBottom :UserProfileActive="$UserProfileActive ? 'true' : 'false'" />


@endsection

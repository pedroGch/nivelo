<?php
/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place $place
 * @var \App\Models\Review $review
 */

 ?>

@extends('layouts.main')

@section('title', 'Perfil de Usuario')

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
        <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1" height="20px"></a>
        <h2 class="h4 titulo fw-bold ps-2">Mi perfil</h2>
      </div>
    </div>

    <div>
      <p class="h5 my-3"> Nombre y Apellido:</p>
      <p> {{ $userDB->name }} {{ $userDB->surname }}</p>
      <p class="h5 my-3"> Email: </p>
      <p> {{ $userDB->email }} </p>
      <p class="h5 my-3"> Nombre de usuario: </p>
      <p> {{ $userDB->username }} </p>
    </div>

    <div>
      <p class="h5 my-3"> Acerca de vos: </p>
      @if ($userDB->user_definition->none == 1)
      <ul>
        <li>No posees ninguna discapacidad pero te sumaste a la "Comunidad ¡Yo, nivelo!"</li>
      </ul>
      @endif

      @if($userDB->user_definition->none == 0)
        <ul>
        @if($userDB->user_definition->sticks == 1)
          <li>Bastones</li>
        @endif
        @if($userDB->user_definition->crutches == 1)
          <li>Muletas</li>
        @endif
        @if($userDB->user_definition->walker == 1)
          <li>Andador</li>
        @endif
        @if($userDB->user_definition->difficult_walking == 1)
          <li>Camina con dificultad</li>
        @endif
        @if($userDB->user_definition->manual_wheelchair == 1)
          <li>Silla de ruedas manual</li>
        @endif
        @if($userDB->user_definition->electric_wheelchair == 1)
          <li>Silla de ruedas eléctrica</li>
        @endif
        @if($userDB->user_definition->scooter == 1)
          <li>Scooter</li>
        @endif
        </ul>
      @endif
    </div>

</section>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

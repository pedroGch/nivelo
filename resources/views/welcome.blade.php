@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Inicio')

@section('content')

<h1>INICIO LANDING</h1>


@auth
  <form action="<?= url('/cerrar-sesion') ?>" method="post">
    @csrf
    <button type="submit" class="">
      Cerrar sesión
    </button>
  </form>

@else

  <a href="<?= url('/iniciar-sesion') ?>">Iniciar sesión</a>

@endauth

@endsection

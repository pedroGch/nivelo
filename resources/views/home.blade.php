@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Inicio')

@section('content')

<h1>INICIO LANDING</h1>


@auth
  <form action="{{ route('logoutAction') }}" method="post">
    @csrf
    <button type="submit" class="">
      Cerrar sesión
    </button>
  </form>

@else

  <a href="{{ route('signup') }}">Registrate</a>
  <a href="{{ route('login') }}">Iniciá sesión</a>

@endauth

@endsection

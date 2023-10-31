@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Inicio')

@section('content')

<h1>INICIO LANDING</h1>

<a href="<?= url('/iniciar-sesion') ?>">Iniciar sesión</a>
@endsection

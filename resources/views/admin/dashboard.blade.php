<?php
/**
 * @var \App\Models\Noticia[] $noticias
 * @var \App\Models\Place[] $lugares
 * @var \App\Models\User[] $usuarios
 * @var \App\Models\Subscriber[] $suscriptores
 * @var \App\Models\Review[] $reviews
 * @var \App\Models\Review[] $reviewsPendientes
 */

?>

@extends('layouts.main')

@section('title', 'Panel de administración')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="row d-flex vh-100">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-2 d-flex border-bottom border-dark-subtle pb-3">
          <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mt-2 mb-2" height="20px"></a>
          <div class="d-flex ">
            <h2 class="h3 fw-bold">Panel de administración</h2>
            <span class="bg-movimiento ms-3"></span>
          </div>
        </div>
        <div class="mx-2 col-12 my-1">
          @if (\Session::has('status.message'))
            <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
              {!! \Session::get('status.message') !!}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
          @endif

        </div>
        <div class="mt-3 row">
          <div class="col-md-4 mb-3">
            <div class="p-3 rounded rounded-3 bg-violeta-ultra-light">
              <h3 class="mt-2 text-center">Administrar blog</h3>
              <p class="text-center">Cantidad de noticias: {{ $noticias->count() }}</p>
              <div class="mb-2">
                <a href="{{ route('blogAdmin') }}" class="mt-1 form-control btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white">Ver</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="p-3 rounded rounded-3 bg-violeta-ultra-light">
              <h3 class="mt-2 text-center">Administrar lugares</h3>
              <p class="text-center">Cantidad de lugares: {{ $lugares->count() }}</p>
              <div class="mb-2">
                <a href="#" class="mt-1 form-control btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white">Ver</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="p-3 rounded rounded-3 bg-violeta-ultra-light">
              <h3 class="mt-2 text-center">Usuarios registrados</h3>
              <p class="text-center">Cantidad de usuarios: {{ $usuarios->count() }}</p>
              <div class="mb-2">
                <a href="#" class="mt-1 form-control btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white">Ver</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <div class="p-3 rounded rounded-3 bg-violeta-ultra-light">
              <h3 class="mt-2 text-center">Suscriptores</h3>
              <p class="text-center">Cantidad: {{ $suscriptores->count() }}</p>
              <div class="mb-2">
                <a href="#" class="mt-1 form-control btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white">Ver</a>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3">
            <div class="p-3 rounded rounded-3 bg-violeta-ultra-light">
              <h3 class="mt-2 text-center">Reseñas</h3>
              <p class="text-center">Total: {{ $reviews->count() }} | Pendientes: {{ $reviewsPendientes->count() }} </p>
              <div class="mb-2">
                <a href="#" class="mt-1 form-control btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white">Ver</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

@extends('layouts.main')

@section('title', 'Administrar lugares')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="row d-flex vh-100">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-2 d-flex border-bottom border-dark-subtle pb-3">
          <a href="{{ route('dashboard') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mt-2 mb-2" height="20px"></a>
          <div class="d-flex ">
            <h2 class="h3 fw-bold">Administrar Usuarios</h2>
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
        <ul class="nav nav-tabs" id="adminTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">Usuarios</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="estadistics-tab" data-bs-toggle="tab" data-bs-target="#estadistics" type="button" role="tab" aria-controls="estadistics" aria-selected="false">Estadísticas</button>
          </li>
        </ul>
        <div class="tab-content" id="adminTabContent">
          <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
            <h3 class="mt-3">Administrar Usuarios</h3>

          </div>
          <div class="tab-pane fade" id="estadistics" role="tabpanel" aria-labelledby="estadistics-tab">
            <h3 class="mt-3">Estadísticas de usuarios</h3>

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


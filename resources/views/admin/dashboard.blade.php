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
          @if($errors->any())
          <div class="alert alert-danger d-flex align-items-center row alert-dismissible fade show" role="alert">
            <p>❌ Hay errores en los datos ingresados. Por favor, corregilos para cargar correctamente el lugar.</p>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
          </div>
          @endif
        </div>

        <div class="row d-flex flex-sm-column flex-md-row col-12 my-2 mb-5">


        </div>
      </div>
    </div>
  </div>


</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

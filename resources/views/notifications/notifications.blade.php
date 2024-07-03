@extends('layouts.main')

@section('title', 'Notificaciones')

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
        <h2 class="h3 fw-bold">Notificaciones</h2>
        <span class="bg-movimiento ms-3"></span>
      </div>
      <div>
        <ul>
          @foreach($notifications as $notification)
              <li>
                  <a href="{{ route('notifications.read', $notification->id) }}" class="{{ $notification->read ? '' : 'font-weight-bold' }}">
                      {{ $notification->message }}
                  </a>
              </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>



</section>
@endsection

@section('footer')

<x-NavbarBottom :notificationsViewActive="$notificationsViewActive ? 'true' : 'false'" />


@endsection

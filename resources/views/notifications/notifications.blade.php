<?php

/**
 * @var \App\Models\Notification[] $notifications
 */
?>

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
    </div>
  </div>
  <div>
    <ul>
      @foreach($notifications as $notification)
          <li>
              <a href="{{ route('notificationsRead', $notification->id) }}" class="{{ $notification->read ? '' : 'font-weight-bold' }}">
                  {{ $notification->message }}
              </a>
          </li>
      @endforeach
    </ul>
  </div>

  <div class="row g-4 my-2 pt-2 d-flex justify-content-around">
    @forelse ($notifications as $notification)
    <div class="card col-6 col-lg-3 shadow-sm" style="width: 18rem;">
      @if ($notification->read == 0)
      <div class="card-body">
        <p class="h6">{{ $notification->message }}</p>
        <p class="h6">{{ $notification->created_at->diffForHumans() }}</p>
        <div class="col-12 mt-2 mb-3 d-flex justify-content-center">
          <form action="{{ route('notificationsRead', $notification->id) }}" method="GET">
            @csrf
            <button type="submit" class="btn d-flex align-items-center justify-content-center rounded-pill shadow-sm bg-verde-principal btn-verde-hover text-white">
              <ion-icon style="color: #fff" name="checkmark-outline" size="large" class="me-2 icon-hover"></ion-icon>
              <span class="fw-semibold">Marcar como leída</span>
            </button>
          </form>
        </div>
      </div>
      @endif
    </div>
    @empty
    <div class="col-12 d-flex justify-content-center">
      <h2 class="h5 fw-bold">No hay notificaciones</h2>
    </div>
    @endforelse
  </div>




</section>
@endsection

@section('footer')

<x-NavbarBottom />
{{-- <x-NavbarBottom :notificationsViewActive="$notificationsViewActive ? 'true' : 'false'" /> --}}


@endsection

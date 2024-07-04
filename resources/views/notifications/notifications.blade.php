<?php

/**
 * @var \App\Models\Notification[] $notifications
 * @var int $unreadNotifications
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

  <div class="row g-4 my-2 pt-2 d-flex justify-content-around">
    @forelse ($notifications as $notification)
            @if ($notification->read == 0)
                <div class="col-10 shadow-sm my-4">
                    <div class="card-body">
                        <p class="h5">{{ $notification->message }}</p>
                        <p class="h6">{{ $notification->created_at->diffForHumans() }}</p>
                        <div class="col-12 mt-2 mb-3 d-flex justify-content-center">
                            <form action="{{ route('notificationsRead', $notification->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn d-flex align-items-center justify-content-center rounded-pill shadow-sm bg-verde-principal btn-verde-hover text-white">
                                    <ion-icon style="color: #fff" name="checkmark-outline" size="large" class="me-2 icon-hover"></ion-icon>
                                    <span class="fw-semibold">Marcar como leído</span>
                                </button>
                            </form>
                            <a href="{{ route('placeDetail', ['category_id' => $notification->category_id, 'place_id' => $notification->place_id]) }}" class="btn d-flex align-items-center justify-content-center rounded-pill shadow-sm bg-verde-principal btn-verde-hover text-white ms-3 px-4">
                                <span class="fw-semibold">Ver lugar</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12 d-flex justify-content-center">
                <h2 class="h5 fw-bold">No hay notificaciones</h2>
            </div>
        @endforelse
  </div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEetZLrPoooCSa5fQ9TQVTgKP_YadJpIk&libraries=places"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  });

  function showPosition(position) {
    const lat = position.coords.latitude;
    const lng = position.coords.longitude;
    console.log("Latitude: " + lat + " Longitude: " + lng);

    // Enviar la ubicación al servidor
    fetch('{{ route("saveLocation") }}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({
        latitude: lat,
        longitude: lng
      })
    }).then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
  }

  function showError(error) {
    switch(error.code) {
      case error.PERMISSION_DENIED:
        alert("User denied the request for Geolocation.");
        break;
      case error.POSITION_UNAVAILABLE:
        alert("Location information is unavailable.");
        break;
      case error.TIMEOUT:
        alert("The request to get user location timed out.");
        break;
      case error.UNKNOWN_ERROR:
        alert("An unknown error occurred.");
        break;
    }
  }
</script>

@endsection

@section('footer')

<x-NavbarBottom :notificationsViewActive="$notificationsViewActive ? 'true' : 'false'" />

@endsection

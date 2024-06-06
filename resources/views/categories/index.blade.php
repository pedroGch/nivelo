<?php

/**
 * @var \App\Models\Category[] $categories
 */

?>

@extends('layouts.main')

@section('title', 'Categorías')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="mx-2 my-4 mb-5">
    @if (\Session::has('status.message'))
      <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
        {!! \Session::get('status.message') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif
    <div class="row pt-3">
      <div class="col-6 col-md-9 d-flex mt-3 ps-2">
        <h2 class="h3 fw-bold">Categorías</h2>
      </div>
      <div class="col-6 col-md-3 d-flex justify-content-end" data-bs-toggle="modal" data-bs-target="#showNearbyPlaces">
        <div>
          <a id="show-nearby-places" class="btn rounded-pill pt-3 px-3 pb-3 shadow-sm bg-verde-principal text-white w-standard " >
            <img src="{{ url('/img/location.png') }}" alt="icono lugar" class="me-1 mb-2">
            <span class="fw-semibold mt-2">Ver mapa</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row my-3">
    <div class="col-12">
      <form action="{{ route('searchPlaces') }}" method="get">
        @csrf
        <div class="input-group">
          <input type="text" class="form-control buscador-principal" name="buscar" id="buscar" placeholder="Lugar, ciudad o provincia" aria-label="buscar" aria-describedby="buscar">
          <button class="btn bg-verde-principal" type="submit" id="button-addon2">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#FFF" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
  <div class="row g-3 my-3 mb-5 pt-3 d-flex">
    @foreach ($categories as $category)
    <div class="col-12 col-md-6 col-xl-4 position-relative">
      <a href=" {{ route('categoryDetail', ['category_id' => $category->category_id ]) }} ">
        <div class="stablished-height col-12 d-flex">
          <img src="{{asset('storage/'.$category->image_cat) }}" alt="{{ $category->alt_img_cat }}" class="w-100 rounded rounded-3 shadow-sm">
          <div class="bg-violeta-dark rounded rounded-3 position-absolute start-0 bottom-0 mb-0 ms-2 shadow-sm">
            <h3 class="fs-6 pt-3 pb-2 px-4 text-white">{{ $category->name }}</h3>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="showNearbyPlaces" tabindex="-1" aria-labelledby="showNearbyPlacesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nearbyPlacesModalLabel">Lugares Cercanos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="gmp-map" style="height: 500px;"></div>
        <ul id="places-list" class="list-group mt-3"></ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEetZLrPoooCSa5fQ9TQVTgKP_YadJpIk&callback=initMap&libraries=places&v=weekly" defer></script>

<script>
  let myLatLng = {
    lat: 0,
    lng: 0
  };
  let map;
  let marker;
  function successCallback(position) {
    myLatLng.lat = position.coords.latitude;
    myLatLng.lng = position.coords.longitude;

  }

  function errorCallback(error) {
    switch (error.code) {
      case error.PERMISSION_DENIED:
        console.error("El usuario ha denegado el permiso de geolocalización.");
        break;
      case error.POSITION_UNAVAILABLE:
        console.error("No se puede obtener la posición del dispositivo.");
        break;
      case error.TIMEOUT:
        console.error("El tiempo de espera para obtener la posición ha expirado.");
        break;
      case error.UNKNOWN_ERROR:
        console.error("Un error desconocido ocurrió.");
        break;
    }
  }

  function initMap(){
    map = new google.maps.Map(document.getElementById("gmp-map"), {
      zoom: 10,
      center: myLatLng,
      fullscreenControl: false,
      zoomControl: true,
      streetViewControl: false
    });
    marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: "Estoy acá",
      icon: "../../img/icons/icon-red.png" //<body data-base-url="{{ url('/') }}>
    });
  }

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
  } else {
    console.error('Geolocation not supported');
    alert('Geolocalización no es soportada por tu navegador');
  }
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('show-nearby-places').addEventListener('click', function(event) {
      event.preventDefault();
      fetch(`{{ route('nearbyPlaces') }}?latitude=${myLatLng.lat}&longitude=${myLatLng.lng}`)
      .then(response => response.json())
      .then(places => {
        console.log('Places fetched:', places);
        console.log('Latitud:',  myLatLng.lat);
        console.log('Longitud:', myLatLng.lng);
        const map = new google.maps.Map(document.getElementById("gmp-map"), {
          zoom: 12,
          center: myLatLng,
        });
        console.log(places);
        const placesList = document.getElementById('places-list');
        placesList.innerHTML = '';
        places.forEach(place => {
          new google.maps.Marker({
            position: { lat: parseFloat(place.latitude), lng: parseFloat(place.longitude) },
            map: map,
            icon: "../../img/icons/icon-red.png",
            title: place.name,
          });

          const listItem = document.createElement('li');
          listItem.classList.add('list-group-item');
          listItem.textContent = `${place.name} - ${place.address} (${place.distance.toFixed(2)} km)`;
          placesList.appendChild(listItem);
        });
        marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: "Estoy acá",
          icon: "../../img/icons/icon-red.png"
        });
        const nearbyPlacesModal = new bootstrap.Modal(document.getElementById('showNearbyPlaces'));
        nearbyPlacesModal.show();
      });
    });
  });
</script>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection


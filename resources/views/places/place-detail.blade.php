<?php
/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place $place
 * @var \App\Models\Review[] $reviews
 * @var \App\Models\User $user_more_info
 * @var $averagePlaceScore
 * @var $notablePlace
 * @var $placeExist bool
 *
 */

 ?>

@extends('layouts.main')

@section('title', 'Detalle de lugar')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="mx-2 my-4">
    @if (\Session::has('status.message'))
      <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
        {!! \Session::get('status.message') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif
  </div>
  <div class="row border-bottom border-dark-subtle pb-3 d-flex">
    <div class="col-12 col-lg-7">
      <div class="col-12 col-md-9 d-flex mt-3 align-items-center">
        <a href="{{ route('categoryDetail', ['category_id' => $category->category_id ]) }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mb-2" style="height: 20px" ></a>
        <p class="h5 titulo fw-bold ps-2"><a href="{{ route('categories') }}" class="text-decoration-none text-reset">Categorías</a> / <a href="{{ route('categoryDetail', ['category_id' => $category->category_id ]) }}" class="text-decoration-none text-reset">{{ $category->name }}</a></p>
      </div>
      <div class="mt-3">
        <div class="row">
          <div class="col-12">
            <h2 class="fw-bold ps-2">{{ $place->getFirstPartOfName() }}
              @if($notablePlace) <span class="badge bg-naranja-principal">Lugar destacado</span>
              @endif</h2>
            <p class="h4 ps-2">{{ $place->getSecondPartOfName() }}</p>
          </div>
          <div class="col-12">
            <div class="d-flex">
              <div class="my-3">
                @if(!$placeExist)
                <form action="{{ route('places.favorite', $place->place_id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn d-flex align-items-center justify-content-center rounded-pill pt-3 px-3 pb-3 shadow-sm bg-verde-principal btn-verde-hover text-white">
                    <ion-icon style="color: #fff" name="bookmark-outline" size="large" class="me-2 icon-hover"></ion-icon>
                    <span class="fw-semibold">Agregar a Favoritos</span>



                  </button>
              </form>
              @else
              <form action="{{ route('places.unfavorite', $place->place_id) }}" method="POST">
                @csrf
                <button type="submit" class="btn d-flex align-items-center justify-content-center rounded-pill pt-3 px-3 pb-3 shadow-sm bg-verde-principal btn-verde-hover text-white">
                  <ion-icon style="color: #fff" name="bookmark" size="large" class="me-2 icon-hover"></ion-icon>
                  <span class="fw-semibold">Quitar de Favoritos</span>
                </button>
              @endif
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-3 align-items-center border-bottom border-top border-dark-subtle pb-3">
        <div>
          <p class="h5 ps-2 mt-3">Promedio de calificaciones:</p>
        </div>
        <div class="col-12 mt-2 d-flex">
          @switch($averagePlaceScore)
            @case($averagePlaceScore >= 1 && $averagePlaceScore < 2)
              <div class="d-flex">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
              </div>
            @break
            @case($averagePlaceScore >= 2 && $averagePlaceScore < 3)
              <div class="d-flex">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
              </div>
            @break
            @case($averagePlaceScore >= 3 && $averagePlaceScore < 4)
              <div class="d-flex">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
              </div>
            @break
            @case($averagePlaceScore >= 4 && $averagePlaceScore < 5)
              <div class="d-flex">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_40.png') }}" alt="ícono estrella hueco" class="img-fluid ps-3 pt-1">
              </div>
            @break
            @case($averagePlaceScore == 5)
              <div class="d-flex">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
                <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
              </div>
            @break
            @default
            <div class="d-flex">
              <img src="{{ url('/img/icon_star_fill_40.png') }}" alt="ícono estrella relleno" class="img-fluid ps-3 pt-1">
            </div>
          @endswitch
        </div>
      </div>
    <div class="col-12 col-lg-6 ">
      <div class="mt-3 d-flex align-items-center">
        <div>
          <p class="h5 ps-2 mt-3 fw-bold">Dirección:</p>
        </div>
      </div>
      <div>
        <p class="ps-2">{{ $place->address }}, {{ $place->city }}, {{ $place->province }}.</p>
      </div>
      <div class="col-12 d-flex">
        <div class="my-3" data-bs-toggle="modal" data-bs-target="#showNearbyPlaces">
          <a id="show-nearby-places" class="btn rounded-pill pt-3 px-3 pb-3 shadow-sm bg-verde-principal btn-verde-hover text-white w-standard " >
            <img src="{{ url('/img/location.png') }}" alt="icono lugar" class="me-1 mb-2">
            <span class="fw-semibold mt-2">Ver mapa</span>
          </a>
        </div>
      </div>
    </div>
    </div>
    <div class="col-12 col-lg-5 position-relative">
      @if($notablePlace)
      <div class="position-absolute top-0 end-0 pt-4">
        <img src="/img/icons/notable-place.png" alt="lugar destacado" style="height: 80px">
      </div>
      @endif
      <div>
        <img src="{{asset('storage/'. $place->main_img) }}" alt="{{ $place->alt_main_img }}" class="w-100 rounded rounded-3 shadow-sm m-md-2 m-lg-3 image-hover-bright">
      </div>
    </div>
  </div>
  <div class="row border-bottom border-dark-subtle pb-3">
    <div class="col-12">
      <div class="mt-3 d-flex align-items-center">
        <div class="d-flex">
          <div class="me-4"><img src="/img/icons/wheelchair.png" alt="icono silla de ruedas"></div>
          <p class="h5 ps-2 mt-3 fw-bold">Características de accesibilidad:</p>
        </div>
      </div>
    </div>
    <div class="col-12 ps-5">
      <div class="row ms-3 my-3 flex justify-content-center align-items-center">
        <ul>
        @if($place->access_entrance == 1)
        <li>Entrada accesible</li>
        @endif
        @if($place->assisted_access_entrance == 1)
        <li>Entrada accesible (con asistencia)</li>
        @endif
        @if($place->internal_circulation == 1)
        <li>Circulación interna accesible</li>
        @endif
        @if($place->bathroom == 1)
        <li>Baño adaptado</li>
        @endif
        @if($place->adult_changing_table == 1)
        <li>Cambiador para adultos</li>
        @endif
        @if($place->parking == 1)
        <li>Estacionamiento</li>
        @endif
        @if($place->elevator == 1)
        <li>Ascensor / Plataforma</li>
        @endif
        </ul>
      </div>
    </div>
  </div>
  <div class="row border-bottom border-dark-subtle pb-3">
    <div class="mt-3 d-flex align-items-center">
      <div>
        <p class="h5 ps-2 mt-3 fw-bold">Descripción:</p>
      </div>
    </div>
    <div>
      <p class="ps-2">{!! nl2br($place->description) !!}</p>
    </div>
  </div>
  <div class="row my-3 d-flex justify-content-center text-center border-bottom border-dark-subtle">
    <p>{{ $place->src_information->name }}</p>
    @if($place->src_information->src_info_id == 2)
    <p>Lugar cargado por: {{ $place->users->username }} </p>
      @if($place->users->id != Auth::id())
        <form action="{{ route('startChat') }}" method="POST" class="mb-3">
          @csrf
          <input type="hidden" name="receiver_id" value="{{ $place->users->id }}">
          <button type="submit" class="text-dark mt-1 btn btn-naranja-hover form-control rounded-pill p-3 shadow-sm bg-naranja-principal fw-semibold w-25">Chateá con: {{ $place->users->username }}</button>
        </form>
      @else
      <div class="alert alert-warning align-self-center" role="alert">
        <p><strong>Si cometiste un error en los datos ingresados</strong> o querés realizar una modificación, pór favor contactate con el Equipo de nivelo para que podamos resolverlo.</p>
      </div>
      <form action="{{ route('startChat') }}" method="POST" class="mb-3">
        @csrf
        <input type="hidden" name="receiver_id" value="3">
        <button type="submit" class="text-dark mt-1 btn btn-naranja-hover form-control rounded-pill p-3 shadow-sm bg-naranja-principal fw-semibold w-25">Chateá con: Equipo de nivelo</button>
      </form>
      @endif
    @endif
  </div>
  <div class="row pb-3">
    <div class="mt-3 d-flex align-items-center">
      <div>
        <h3 class="h5 ps-2 mt-3 fw-bold">Reseñas:</h3>
      </div>
    </div>
    <div class="col-12 d-flex">
      <div class="my-3">
        @if (!$status)
        <a href="#" disable class="btn w-100 rounded-pill p-3 shadow-sm bg-secondary text-white " >
          <span class="fw-semibold">No podes realizar reseñas</span>
        </a>
        @else
          <a href="{{ route('addReviewForm', ['category_id' => $category->category_id, 'place_id' => $place->place_id ]) }}" class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white " >
            <img src="{{ url('/img/location.png') }}" alt="icono lugar" class="me-1 mb-2">
            <span class="fw-semibold">Opiná sobre este lugar</span>
          </a>
        @endif

      </div>
    </div>
  </div>
  <div class="row g-3 my-3 pt-3 d-flex justify-content-center review-container">
    @forelse($reviews as $review)
    <div class="col-12 col-md-6 col-xl-4 review-item">
      <div class="p-3 rounded rounded-3 bg-violeta-ultra-light review-content">
        <div class="mx-2 border-bottom border-dark-subtle pb-3">
          <p class="h5 mt-3 fw-bold text-center">Comentario de  {{ $review->user->username}}</p>
          <p class="text-center"> {{ $review->created_at }}</p>
          <div class="d-flex justify-content-center">
            <div class="col-12 d-flex justify-content-center">
              @switch($review->score)
                @case($review->score > 0 && $review->score < 2)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @case($review->score >= 2 && $review->score < 3)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @case($review->score >= 3 && $review->score < 4)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @case($review->score >= 4 && $review->score < 5)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @case($review->score == 5)
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
                @break
                @default
                  <div class="d-flex">
                    <img src="{{ url('/img/icon_star_fill_30.png') }}" alt="ícono estrella" class="img-fluid ps-3 pt-1">
                  </div>
              @endswitch
            </div>
          </div>
        </div>
        <div class="mx-2 mt-3 d-flex align-items-center pb-3">
          @if ($review->review == null)
          <p>Sólo puntuado con estrellas</p>
          @else
          <p>{{ $review->shortened_paragraph(10) }}</p>
          @endif
        </div>
        <div class="mb-2 row d-flex justify-content-around mx-2">
          @if($review->pic_1)
          <div class="col-4"><a href="#"><img src="{{asset('storage/'. $review->pic_1) }}" class="card-img-top rounded rounded-2" alt="{{ $review->alt_pic_1 }}"></a></div>
          @endif
          @if($review->pic_2)
          <div class="col-4"><a href="#"><img src="{{asset('storage/'. $review->pic_2) }}" class="card-img-top rounded rounded-2" alt="{{ $review->alt_pic_2 }}"></a></div>
          @endif
          @if($review->pic_3)
          <div class="col-4"><a href="#"><img src="{{asset('storage/'. $review->pic_3) }}" class="card-img-top rounded rounded-2" alt="{{ $review->alt_pic_3 }}"></a></div>
          @endif
        </div>

        <div class="row pt-4">
          @if ($review->user_id == Auth::id())
          <div class="col-6">
            <div class="mt-1 pb-3 d-flex justify-content-center"><a href="{{ route('reviewDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id, 'review_id' => $review->review_id]) }}" class="btn rounded-pill p-3 px-4 shadow-sm bg-verde-principal btn-verde-hover text-white w-100">Ver detalle</a></div>
          </div>
          <div class="col-6">
            <div class="mt-1 pb-3 d-flex justify-content-center"><a href="{{ route('editReviewForm', ['review_id' => $review->review_id ]) }}" class="btn rounded-pill p-3 px-4 shadow-sm bg-verde-principal btn-verde-hover text-white w-100">Editar</a>
            </div>
            @else
            <div class="col-12">
              <div class="mt-1 pb-3 d-flex justify-content-center"><a href="{{ route('reviewDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id, 'review_id' => $review->review_id]) }}" class="btn rounded-pill p-3 px-4 shadow-sm bg-verde-principal btn-verde-hover text-white w-50">Ver detalle</a></div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @empty
    <div class="col-12">
      <p class="h6 ps-2 mt-3">Aún no hay reseñas. ¿Conocés este lugar?, ¡Contanos cómo fue tu experiencia!</p>
    </div>
    @endforelse
  </div>

    <div class="row my-3 d-flex justify-content-center">
      <div class="col-12 col-lg-3 justify-content-center">
        <div class="mb-4">
          <a href="{{ route('categoryDetail', ['category_id' => $category->category_id ]) }}" class="my-3 form-control btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white">Atrás</a>
        </div>
      </div>
    </div>
    <div class="modal fade" id="showNearbyPlaces" tabindex="-1" aria-labelledby="showNearbyPlacesLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="nearbyPlacesModalLabel">{{$place->getFirstPartOfName()}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="gmp-map" style="height: 500px;"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
</section>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEetZLrPoooCSa5fQ9TQVTgKP_YadJpIk&callback=initMap&libraries=places&v=weekly" defer></script>

<script>
  let myLatLng = {
    lat: {{ $place->latitude }},
    lng: {{ $place->longitude }}
  };
  let map;
  let marker;
  function initMap(){
    map = new google.maps.Map(document.getElementById("gmp-map"), {
      zoom: 10,
      center: myLatLng,
      fullscreenControl: true,
      zoomControl: true,
      streetViewControl: true
    });
    marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: "Estoy acá",
      icon: "../../img/icons/icon-red.png" //<body data-base-url="{{ url('/') }}>
    });
  }
</script>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

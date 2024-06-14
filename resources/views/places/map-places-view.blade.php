@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Nuevo lugar')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')
<section class="container margin-navs">

  <div class="row d-flex vh-100">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-4 border-bottom border-dark-subtle pb-3">
          <div class="d-flex ">
            <h2 class="h3 fw-bold">Mapa</h2>
            <span class="bg-movimiento ms-3"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-12 mb-3">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="row mb-3">
                    <div class="col-md-4 col-sm-12">
                      <h3 class="modal-title d-inline" id="nearbyPlacesModalLabel">Filtrar por:</h3>
                    </div>
                    <div class="col-md-8 col-sm-12">
                      <select class="form-select d-inline" aria-label="Default select example" name="category" id="category">
                        <option selected value="-1">Elegí una categoría</option>
                          @foreach($categories as $category)
                            <option class="@error('category') is-invalid @enderror" value="{{ $category->category_id }}"
                              {{ old('category') == $category->category_id ? 'selected' : '' }}
                              @error('category')
                              aria-describedby="error-category"
                              aria-invalid="true"
                              @enderror
                              >{{ $category->name }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-12 mb-3">
                    <div class="row">
                      <div class="col-6 mx-auto">
                        <p  id="sin_filtro" class="text-center fw-bold"> Aún no aplicaste ningún filtro </p>
                      </div>
                      <div class="col-12" id="con_filtro">
                        <div class="container my-4" id="getPlacesAccordion">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div id="gmp-map" style="height: 500px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBEetZLrPoooCSa5fQ9TQVTgKP_YadJpIk&callback=initMap&libraries=places&v=weekly" defer></script>
<script>
  let inputLugarNombre
  let map
  let marker
  let autocomplete
  let semaforo = {
    red: '../../img/icons/icon-red.png',
    yellow: '../../img/icons/icon-yellow.png',
    green: '../../img/icons/icon-green.png'
  }
  function getCurrentPosition(map, marker) {
    if (navigator.geolocation){
      navigator.geolocation.getCurrentPosition(
        ({coords: {latitude, longitude} }) => {
          const coords = {
            lat: latitude,
            lng: longitude,
          };

          map.setCenter(coords)
          map.setZoom(12)
          marker.setPosition(coords)
        },
        () => {
          console.log("ocurrio un error")
        }
      )
    }else{
      console.log('tu navegador no dispone de geolocalizacion')
    }
  }
  function initMap(){
    const myLatLng = {
    lat: -34.916667,
    lng: -57.95
    };
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
      icon: "../../img/icons/icon-red.png"

    });

    getCurrentPosition(map,marker)
    const options = {
      componentRestrictions: {country: "ar"},
      fields: ["address_components", "geometry", "icon", "name", "plus_code"],
      strictBounds: false

    }
  }
  document.getElementById('category').addEventListener('change', function() {
    const categoryId = this.value;
    const accordionContainer = document.getElementById('getPlacesAccordion');
    const sin_filtro = document.getElementById('sin_filtro');
    const con_filtro = document.getElementById('con_filtro');

    if (categoryId == -1){
      sin_filtro.classList.remove('d-none');
      con_filtro.classList.add('d-none');

    }else{
      sin_filtro.classList.add('d-none');
      con_filtro.classList.remove('d-none');
      fetch(`/categories/${categoryId}/places`)
        .then(response => response.json())
        .then(places => {

          if (places.length != 0) {
            places.forEach(place => {
              const position = {
                lat: parseFloat(place.latitude),
                lng: parseFloat(place.longitude)
              };

              new google.maps.Marker({
                position: position,
                map: map,
                title: place.name
              });
              insertPlaces(places, accordionContainer);
            });
          }else{
            console.log(places.length);
            accordionContainer.innerHTML = '';
            const placeHTML = `<p class="text-center fw-bold">No hay resultados para esta categoría</p>`
            accordionContainer.insertAdjacentHTML('beforeend', placeHTML);
          }
      })
      .catch(error => console.error('Error fetching places:', error));
    }
  })
  function viewOnMap(lat, lng) {
    const coords = { lat: parseFloat(lat), lng: parseFloat(lng) };
    // Centrar el mapa en las nuevas coordenadas
    map.setCenter(coords);
    map.setZoom(14); // Ajustar el nivel de zoom según sea necesario

    // Agregar un marcador en las nuevas coordenadas
    new google.maps.Marker({
      position: coords,
      map: map,
      title: "Lugar seleccionado"
    });
  }
  function insertPlaces(places, accordionContainer) {
    accordionContainer.innerHTML = '';

    places.forEach((place, index) => {
    const placeHTML = `
    <div class="container">
      <div class="card mb-3 w-100" id="placeCard${place.place_id}">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="${place.main_img}" alt="${place.alt_main_img}" class="img-fluid rounded-start" style="width: 100%; height: 100%; object-fit: cover;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">${place.name}</h5>
              <p class="card-text">Puntaje: 4.5</p>
              <div class="d-flex justify-content-end">
                <button class="btn btn-primary me-2" onclick="viewOnMap(${place.latitude}, ${place.longitude})">Ver en el mapa</button>
                <button
                  class="btn btn-secondary"
                  data-bs-toggle="modal"
                  data-bs-target="#reviewsModal${place.place_id}"
                  onclick="loadReviews(${place.place_id})"> Opiniones</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Reviews -->
    <div class="modal fade" id="reviewsModal${place.place_id}" tabindex="-1" aria-labelledby="reviewsModalLabel${place.place_id}" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reviewsModalLabel${place.place_id}">Opiniones sobre ${place.name}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="reviewsContainer${place.place_id}">
            <!-- Aquí irían las opiniones del lugar -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>`;
    accordionContainer.insertAdjacentHTML('beforeend', placeHTML);
    });
  }
  function loadReviews(placeId) {
    fetch(`/places/${placeId}/reviews`)
      .then(response => response.json())
      .then(reviews => {
        const reviewsContainer = document.getElementById(`reviewsContainer${placeId}`);
        reviewsContainer.innerHTML = ''; // Limpiar el contenido anterior

        if (reviews.length === 0) {
          reviewsContainer.innerHTML = '<p>No hay opiniones disponibles.</p>';
          return;
        }

        reviews.forEach(review => {
          const reviewHTML = `
            <div class="d-flex mb-3">
              <img src="${review.user.profile_picture}" alt="Foto del usuario" class="img-fluid me-3 rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
              <div>
                <h6 class="mb-1">${review.user.username}</h6>
                <p class="mb-0">Puntaje: ${review.score}</p>
                <p class="mb-0">Comentario: ${review.review}</p>
              </div>
            </div>`;
          reviewsContainer.insertAdjacentHTML('beforeend', reviewHTML);
        });
      })
      .catch(error => console.error('Error al obtener las opiniones:', error));
  }
</script>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

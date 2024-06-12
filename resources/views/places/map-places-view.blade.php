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
                        <option selected>Elegí una categoría</option>
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
                        <!-- Contenido del elemento -->
                        <p class="text-center fw-bold"> Aún no aplicaste ningún filtro </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div id="gmp-map" style="height: 500px;"></div>
            <ul id="places-list" class="list-group mt-3"></ul>
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
  function getCurrentPosition(map, marker) {
    if (navigator.geolocation){
      navigator.geolocation.getCurrentPosition(
        ({coords: {latitude, longitude} }) => {
          const coords = {
            lat: latitude,
            lng: longitude,
          };
          console.log(cords);
          map.setCenter(coords)
          map.setZoom(8)
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
      icon: "../../img/icons/icon-red.png" //<body data-base-url="{{ url('/') }}>

    });

    getCurrentPosition(map,marker)
    const options = {
      componentRestrictions: {country: "ar"},
      fields: ["address_components", "geometry", "icon", "name", "plus_code"],
      strictBounds: false

    }

    autocomplete = new google.maps.places.Autocomplete(place_name, options)

    autocomplete.addListener("place_changed",() =>{
      const aPlace = autocomplete.getPlace()
      map.setCenter(aPlace.geometry.location)
      marker.setPosition(aPlace.geometry.location)

      document.getElementById('namePlace').value = aPlace.name
      document.getElementById('addressPlace').value = aPlace.address_components[0].long_name
      document.getElementById('cityPlace').value = aPlace.address_components[1].long_name
      document.getElementById('provincePlace').value = aPlace.address_components[2].long_name
      document.getElementById('latitude').value = aPlace.geometry.location.lat()
      document.getElementById('longitude').value = aPlace.geometry.location.lng()

    })
  }

</script>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

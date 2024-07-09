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
            <h1 class="h3 fw-bold">Cargar un nuevo lugar</h1>
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
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
          </div>
          @endif
        </div>
        <div class="col-12 mb-5">
          <form action="{{ route('addPlaceAction') }}" method="POST" id="new_place_create" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12 mb-4">
                <label for="place_name" class="form-label h5 my-3">Buscá el lugar:</label>
                <input type="text"   name="place_name" class="form-control p-3 @error('place_name') is-invalid @enderror" id="place_name" placeholder="Ingresá un nombre o dirección" value="{{ old('place_name') }}"
                @error('place_name')
                aria-describedby="error-place_name"
                aria-invalid="true"
                @enderror>
                @error('place_name')
                <p class="text-danger" id="error-place_name">{{ $message }}</p>
                @enderror
                <input type="hidden" name="namePlace" id="namePlace">
                <input type="hidden" name="addressPlace" id="addressPlace">
                <input type="hidden" name="cityPlace" id="cityPlace">
                <input type="hidden" name="provincePlace" id="provincePlace">
                <input type="hidden" name="coordinatesPlace" id="coordinatesPlace">
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
              </div>
              <div class="col-12 mb-3">
                <div id="gmp-map"></div>
              </div>
              <div class="col-12 my-4 border-bottom border-dark-subtle pb-3">
                <label for="category" class="form-label my-3 h5">¿Qué tipo de lugar es?</label>
                <select class="form-select mb-3" aria-label="Default select example" name="category" id="category">
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
                @error('category')
                <p class="text-danger" id="error-category">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12 mb-4 border-bottom border-dark-subtle pb-3">
                <label for="main_img" class="block font-bold mb-3 h5"> Imagen principal del lugar </label>
                <div class="mb-3">
                  <input type="file" name="main_img" id="main_img" class="@error('main_img') is-invalid @enderror"
                  @error('main_img')
                  aria-describedby="error-main_img"
                  aria-invalid="true"
                  @enderror>
                  @error('main_img')
                  <p class="text-danger" id="error-main_img">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-12 border-bottom border-dark-subtle pb-3">
                <div class="row">
                  <h3 class="mt-1 mb-4 h5">Características de <strong>accesibilidad</strong> que posee:</h3>
                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="acces_entrance" name="acces_entrance"
                    @if(old('acces_entrance')) checked @endif
                    />
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill" for="acces_entrance">Entrada</label>
                  </div>
                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="asisted_entrance" name="asisted_entrance" autocomplete="off"
                    @if(old('asisted_entrance')) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill" for="asisted_entrance">Entrada  (con asistencia)</label>
                  </div>
                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="internal_circulation" name="internal_circulation"  autocomplete="off"
                    @if(old('internal_circulation')) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill" for="internal_circulation">Circulación interna </label>
                  </div>
                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="bathroom" name="bathroom"  autocomplete="off"
                    @if(old('bathroom')) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill ps-3" for="bathroom">Baño adaptado</label>
                  </div>
                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="adult_changing_table" name="adult_changing_table"  autocomplete="off"
                    @if(old('adult_changing_table')) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill ps-3" for="adult_changing_table">Cambiador para adultos</label>
                  </div>
                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="parking" name="parking"  autocomplete="off"
                    @if(old('parking')) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill ps-3" for="parking">Estacionamiento</label>
                  </div>
                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="elevator" name="elevator"  autocomplete="off"
                    @if(old('elevator')) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill ps-3" for="elevator">Ascensor / Plataforma</label>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="mb-4 mt-1 d-flex flex-column pb-4">
                  <label for="place_description" class="form-label h5 my-3">Descripción:</label>
                  <textarea name="place_description" id="place_description" class="form-control p-3 @error('place_description') is-invalid @enderror"
                  @error('place_description')
                  aria-describedby="error-place_description"
                  aria-invalid="true"
                  @enderror
                  >{{ old('place_description') }}</textarea>
                  @error('place_description')
                  <p class="text-danger" id="error-place_description">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="mb-4">
                <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold" value=""> Agregar </button>
              </div>
            </div>
            </form>
            <div class="mb-5">
              <a href="{{ route('categories') }}" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal  btn-verde-hover text-white">Cancelar</a>
            </div>
          </form>
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

<x-NavbarBottom :addPlaceActive="$addPlaceActive ? 'true' : 'false'" />

@endsection

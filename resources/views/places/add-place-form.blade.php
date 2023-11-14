@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Nuevo lugar')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')
<section class="container margin-navs">
    <div class="row d-flex vh-100">
      <div class="">
        <div class="row my-4 mx-auto">
          <div class="col-12 my-4">
              <div class="d-flex ">
                <h2 class="fw-bold">Cargar un nuevo lugar</h2>
                <span class="bg-movimiento mx-2 mt-1"></span>
              </div>
          </div>
          <div class="col-12 my-1">
            @if (\Session::has('status.message'))
              <div class="alert alert-success d-flex align-items-center row alert-dismissible fade show" role="alert">
                {!! \Session::get('status.message') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
              </div>
            @endif
            </div>
          <div class="col-12">
            <form action="#" method="POST" id="new_place_create">
                @csrf
                <div class="row">
                  <div class="col-12 mb-4">
                    <label for="place_name" class="form-label ">¿Dónde queda este lugar?</label>
                    <input type="text" name="place_name" class="form-control p-3" id="place_name" placeholder="ingresá un nombre o dirección">
                  </div>
                  <div class="col-12 mb-3">
                    <div id="gmp-map"></div>
                  </div>
                  <div class="col-12 col-md-6 mb-4">
                    <label for="category" class="form-label ">¿Qué lugar visitaste?</label>
                    <select class="form-select" aria-label="Default select example" name="category" id="category">
                      <option selected>Elegí una categoría</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="col-12 col-md-6 mb-4">
                    <label for="imagen_prod" class="block font-bold my-2"> Imagen producto </label>
                    <input type="file" name="imagen_prod" id="imagen_prod">

                  </div>
                  <div class="col-12">
                    <div class="row ">
                      <h3 class="mb-3">Características de <strong>accesibilidad</strong> que posee:</h3>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="acces_entrance" name="acces_entrance"   />
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill" for="acces_entrance">Entrada </label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="asisted_entrance" name="asisted_entrance"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill" for="asisted_entrance">Entrada  (con asistencia)</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="internal_circulation" name="internal_circulation"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill" for="internal_circulation">Circulación interna </label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="bathroom" name="bathroom"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill ps-3" for="bathroom">Baño adaptado</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="adult_changing_table" name="adult_changing_table"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill ps-3" for="adult_changing_table">Cambiador para adultos</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="parking" name="parking"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill ps-3" for="parking">Estacionamiento</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="elevator" name="elevator"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill ps-3" for="elevator">Ascensor / Plataforma</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-4 d-flex flex-column">
                      <label for="place_description" class="form-label">Descripción:</label>
                      <textarea name="place_description" id="place_description" class="form-control p-3">
                      </textarea>
                    </div>
                  </div>
                  <div class="mb-4">
                    <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow bg-verde-principal text-white fw-semibold" value=""> Agregar </button>
                  </div>
                </div>
                </form>

                <div class="mb-4">
                  <a href="{{ route('categories') }}" class="form-control btn rounded-pill p-3 shadow bg-verde-principal text-white">Cancelar</a>
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
  let place_selected = {}
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
      title: "My location"
    });

    const options = {
      componentRestrictions: {country: "ar"},
      fields: ["address_components", "geometry", "icon", "name", "plus_code"],
      strictBounds: false

    }

    autocomplete = new google.maps.places.Autocomplete(place_name, options)

    autocomplete.addListener("place_changed",() =>{
      const aPlace = autocomplete.getPlace()
      console.log(aPlace)
      place_selected.name = aPlace.name
      place_selected.address = aPlace.address_components[0].long_name
      place_selected.city = aPlace.address_components[1].long_name
      place_selected.province = aPlace.address_components[2].long_name
      place_selected.coordinates = aPlace.plus_code.global_code
    })
  }

  const formulario = document.getElementById("new_place_create");
  formulario.addEventListener('submit', function(event) {
    event.preventDefault();
    place_selected.main_img = "places/1.jpg"
    place_selected.atl_main_img = "imagen cargada por usuario"
    place_selected.category = document.getElementById("category").value
    place_selected.acces_entrance = document.getElementById("acces_entrance").checked
    place_selected.asisted_entrance = document.getElementById("asisted_entrance").checked
    place_selected.internal_circulation = document.getElementById("internal_circulation").checked
    place_selected.bathroom = document.getElementById("bathroom").checked
    place_selected.adult_changing_table = document.getElementById("adult_changing_table").checked
    place_selected.parking = document.getElementById("parking").checked
    place_selected.elevator = document.getElementById("elevator").checked
    place_selected.place_description = document.getElementById("place_description").value


    formulario.reset();
  });
</script>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

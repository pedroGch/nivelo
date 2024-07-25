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
        <div class="col-12 my-2 d-flex border-bottom border-dark-subtle pb-3">
          <a href="{{ route('AdminPlacesView') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mt-2 mb-2" height="20px"></a>
          <div class="d-flex ">
            <h1 class="h3 fw-bold">Editar lugar</h1>
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
          <h2>Vas a editar {{$place->name}}</h2>
          <form action="{{ route('editPlaceAction') }}" method="POST" id="new_place_create" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12 my-4 border-bottom border-dark-subtle pb-3">
                <label for="category" class="form-label my-3 h5">¿Qué tipo de lugar es?</label>
                <select class="form-select mb-3" aria-label="Default select example" name="category" id="category">
                  <option>Elegí una categoría</option>
                  @foreach($categories as $category)
                    <option class="@error('category') is-invalid @enderror" value="{{ $category->category_id }}"
                      {{ old('category', $place->category_id) == $category->category_id ? 'selected' : '' }}
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
              <input type="hidden" name="placeId" value="{{$place->place_id}}">
              <div class="col-12 border-bottom border-dark-subtle pb-3">
                <div class="row">
                  <h3 class="mt-1 mb-4 h5">Características de <strong>accesibilidad</strong> que posee:</h3>

                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="acces_entrance" name="acces_entrance"
                      @if(old('acces_entrance', $place->access_entrance)) checked @endif
                    />
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill" for="acces_entrance">Entrada</label>
                  </div>

                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="asisted_entrance" name="asisted_entrance" autocomplete="off"
                      @if(old('asisted_entrance', $place->asisted_entrance)) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill" for="asisted_entrance">Entrada (con asistencia)</label>
                  </div>

                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="internal_circulation" name="internal_circulation" autocomplete="off"
                      @if(old('internal_circulation', $place->internal_circulation)) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill" for="internal_circulation">Circulación interna</label>
                  </div>

                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="bathroom" name="bathroom" autocomplete="off"
                      @if(old('bathroom', $place->bathroom)) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill ps-3" for="bathroom">Baño adaptado</label>
                  </div>

                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="adult_changing_table" name="adult_changing_table" autocomplete="off"
                      @if(old('adult_changing_table', $place->adult_changing_table)) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill ps-3" for="adult_changing_table">Cambiador para adultos</label>
                  </div>

                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="parking" name="parking" autocomplete="off"
                      @if(old('parking', $place->parking)) checked @endif
                    >
                    <label class="bg-gris-claro border border-0 shadow-sm p-btn-chicos text-center btn-form-w-center fw-semibold btn rounded-pill ps-3" for="parking">Estacionamiento</label>
                  </div>

                  <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                    <input type="checkbox" class="btn-check" id="elevator" name="elevator" autocomplete="off"
                      @if(old('elevator', $place->elevator)) checked @endif
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
                  >
                    {{ trim(old('place_description', $place->description)) }}
                  </textarea>
                  @error('place_description')
                  <p class="text-danger" id="error-place_description">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-6 mb-5">
                  <a href="{{ route('categories') }}" class="form-control btn rounded-pill p-3 shadow-sm bg-violeta-principal  btn-violeta-hover text-white fw-semibold">Cancelar</a>
                </div>
                <div class="col-12 col-lg-6 mb-5">
                  <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold" value=""> Editar </button>
                </div>
              </div>
            </div>
            </form>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

</script>
@endsection

@section('footer')

<x-NavbarBottom :addPlaceActive="$addPlaceActive ? 'true' : 'false'" />

@endsection

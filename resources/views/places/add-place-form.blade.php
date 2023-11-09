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
            <form action="#" method="POST">
                @csrf
                <div class="row">
                  <div class="col-12 mb-4">
                    <label for="place_name" class="form-label ">Nombre del lugar</label>
                    <input type="text" name="place_name" class="form-control p-3" id="place_name" placeholder="Nombre">
                  </div>
                  <div class="col-12 col-md-6 mb-4">
                    <label for="category" class="form-label ">Categoría</label>
                    <select class="form-select" aria-label="Default select example">
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
                  <div class="mb-4">
                      <label for="l_name" class="form-label">Dirección:</label>
                      <input type="text" name="l_name" class="form-control p-3" id="l_name"
                          placeholder="Ingresá la dirección completa">
                  </div>
                  <div class="col-12">
                    <div class="row ">
                      <label for="place_characteristics" class="form-label">Características que posee:</label>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="sticks" name="sticks"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill" for="sticks">Entrada accesible</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="crutches" name="crutches"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill" for="crutches">Entrada accesible (con asistencia)</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="walker" name="walker"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill" for="walker">Circulación interna accesible</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="difficult_walking" name="difficult_walking"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill ps-3" for="difficult_walking">Baño adaptado</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="difficult_walking" name="difficult_walking"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill ps-3" for="difficult_walking">Cambiador para adultos</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="difficult_walking" name="difficult_walking"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill ps-3" for="difficult_walking">Estacionamiento</label>
                      </div>
                      <div class="mb-4 d-flex justify-content-center col-6 col-md-4 col-lg-3">
                        <input type="checkbox" class="btn-check" id="difficult_walking" name="difficult_walking"  autocomplete="off">
                        <label class="bg-gris-claro border border-0 shadow p-btn-chicos text-center btn-form-w fw-semibold btn rounded-pill ps-3" for="difficult_walking">Ascensor / Plataforma</label>
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
                  <div class="form-check d-flex justify-content-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="ms-2 mb-2 form-check-label" for="flexCheckDefault"> Acepto los <a href="#" class="fw-bold text-reset text-decoration-none">términos y condiciones</a>
                    </label>
                  </div>
                    <div class="mb-4">
                      <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow bg-verde-principal text-white fw-semibold" value=""> Agregar </button>
                    </div>
                </div>
                </form>

                <div class="mb-4">
                  <a href="{{ route('categories') }}" class="form-control btn rounded-pill p-3 shadow bg-verde-principal text-white">Cancelar</a>
                </div>
5           </form>
          </div>
        </div>
      </div>

    </div>
</section>
@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

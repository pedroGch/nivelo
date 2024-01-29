@extends('layouts.main')

{{-- @section('title') Blog @endsection --}}

@section('title', 'Acerca de mí')

@section('content')
<section>
  <div class="row d-flex vh-100">
    <div class="col-12 col-md-6 col-lg-4 mt-lg-5 ms-lg-5 pt-3 container-xxl bg-white rounded shadow-sm" >
      <div class="pt-5 d-flex justify-content-center my-6">
        <img src="{{ url('/img/logo_horizontal.png') }}" alt="logo de nivelo">
      </div>
      <div class="row my-4 mx-auto border-top redondeo-superior-login  shadow-sm-top">
        <div class="col-12 my-4">
          <div class="d-flex ">
            <h2 class="fw-bold">
              ¿Cómo te movilizás?
            </h2>
            <span class="bg-movimiento ms-3 mt-1"></span>
          </div>
          <div class="col-12">
            <p>Podés elegir más de una opción</p>
          </div>
        </div>
        <div class="mx-2 col-12 my-1">
          @if (\Session::has('status.message'))
            <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
            {!! \Session::get('status.message') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
          @endif
        </div>
        <div class="col-12">
          <form action="{{ route('aboutYouAction') }}" method="POST">
            @csrf
            <div class="row ">
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="sticks" name="sticks"  autocomplete="off">
                <label class="bg-gris-claro border border-0 shadow-sm btn-form-w fw-semibold btn rounded-pill bg-bastones bg-conf-icono" for="sticks">Bastón/es</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="crutches" name="crutches"  autocomplete="off">
                <label class="bg-gris-claro border border-0 shadow-sm btn-form-w fw-semibold btn rounded-pill bg-muletas bg-conf-icono" for="crutches">Muletas</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="walker" name="walker"  autocomplete="off">
                <label class="bg-gris-claro border border-0 shadow-sm btn-form-w fw-semibold btn rounded-pill bg-andador bg-conf-icono" for="walker">Andador</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="difficult_walking" name="difficult_walking"  autocomplete="off">
                <label class="bg-gris-claro border border-0 shadow-sm btn-form-w fw-semibold btn rounded-pill bg-camina_dificultad bg-conf-icono ps-3" for="difficult_walking">Camina con dificultad</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="manual_wheelchair" name="manual_wheelchair"  autocomplete="off">
                <label class="bg-gris-claro border border-0 shadow-sm btn-form-w fw-semibold btn rounded-pill bg-silla_ruedas_manual bg-conf-icono ps-3" for="manual_wheelchair">Silla de ruedas manual</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="electric_wheelchair" name="electric_wheelchair"  autocomplete="off">
                <label class="bg-gris-claro border border-0 shadow-sm btn-form-w fw-semibold btn rounded-pill bg-silla_ruedas_electrica bg-conf-icono" for="electric_wheelchair">Silla de ruedas eléctrica</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="scooter" name="scooter"  autocomplete="off">
                <label class="px-4 bg-gris-claro border border-0 shadow-sm btn-form-w fw-semibold btn rounded-pill bg-scooter bg-conf-icono" for="scooter">Scooter</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="none" name="none"  autocomplete="off">
                <label class="bg-gris-claro border border-0 shadow-sm btn-form-w fw-semibold btn rounded-pill bg-acompaniante bg-conf-icono" for="none">Ninguna de las anteriores</label>
              </div>
            </div>
            <div class="mb-4">
              <input type="submit" class="form-control rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white" value="Continuar">
            </div>
          </form>
          </div>
          <div class="mb-4">
            <a href="{{ route('categories') }}" class="form-control btn btn-verde-hover rounded-pill p-3 shadow-sm bg-verde-principal text-white">Omitir por ahora</a>
          </div>
        </div>
      </div>
      <div class="col-12 d-none d-sm-block bg-login">
      </div>
  </div>
</section>
@endsection

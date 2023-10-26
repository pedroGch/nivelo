@extends('layouts.main')

{{-- @section('title') Blog @endsection --}}

@section('title', 'About you')

@section('content')
  <section class="container">
    <div class="row my-5" >
      <div class="d-flex justify-content-center my-6">
        <img src="{{ url('/img/logo_horizontal.png') }}" alt="logo de nivelo">
      </div>

      <div class="row my-4 mx-auto border-top redondeo-superior-login  shadow-top">
        <div class="col-12 my-4">
          <div class="d-flex ">
            <h2 class="fw-bold">
              ¿Cómo te movilizás?
            </h2>
            <span class="bg-movimiento mx-1"></span>
          </div>
          <div class="col-12">
            <p>Podés elegir más de una opción</p>
          </div>
        </div>
        <div class="col-12">
          <form action="#" method="POST">
            @csrf
            <div class="row ">
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="bg-gris-form btn rounded-pill" for="btn-check-2">Checked</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="bg-gris-form btn rounded-pill" for="btn-check-2">Checked</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="bg-gris-form btn rounded-pill" for="btn-check-2">Checked</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="bg-gris-form btn rounded-pill" for="btn-check-2">Checked</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="bg-gris-form btn rounded-pill" for="btn-check-2">Checked</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="bg-gris-form btn rounded-pill" for="btn-check-2">Checked</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="bg-gris-form btn rounded-pill" for="btn-check-2">Checked</label>
              </div>
              <div class="mb-4 d-flex justify-content-center col-6">
                <input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                <label class="bg-gris-form btn rounded-pill" for="btn-check-2">Checked</label>
              </div>
            </div>

            <div class="col-12 mb-3 d-flex justify-content-center">
              <button class="form-control btn bg-violeta-principal rounded-pill p-2 text-white shadow">Google</button>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-center">
              <p>¿No tenés una cuenta? <a href="<?= url('/signup') ?>" class="fw-bold">Registrate</a></p>
            </div>


          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

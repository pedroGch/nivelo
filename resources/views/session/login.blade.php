@extends('layouts.main')

{{-- @section('title') Blog @endsection --}}

@section('title', 'Iniciar sesión')

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
              Iniciar sesión
            </h2>
            <span class="bg-movimiento mx-1"></span>
          </div>
        </div>
        @if (\Session::has('status.message'))
          <div class="" role="alert">
            {!! \Session::get('status.message') !!}
          </div>
        @endif
        <div class="col-12">
          <form action="{{ route('loginAction') }}" method="POST">
            @csrf
            <div class="mb-4">
              <label for="email" class="form-label d-none">Email</label>
              <input type="email" name="email" class="form-control p-3" id="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="mb-4">
              <label for="password" class="form-label d-none">Contraseña</label>
              <input type="password" name="password" class="form-control p-3" id="password" placeholder="Contraseña">
            </div>
            <div class="mb-4">
              <button type="submit" class="form-control rounded-pill p-3 shadow bg-verde-principal text-white fw-semibold" value=""> Continuar </button>
            </div>
          </form>
          <div class="row">
            <div class="col-12 mb-3 d-flex justify-content-center">
              <p>¿Olvidaste tu contraseña?</p>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-center">
              <a href="<?= url('/login-google') ?>" class="form-control btn bg-violeta-principal rounded-pill p-2 text-white shadow fw-semibold">Google</>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-center">
              <p>¿No tenés una cuenta? <a href="<?= url('/registrate') ?>" class="fw-bold text-reset text-decoration-none">Registrate</a></p>
            </div>


          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

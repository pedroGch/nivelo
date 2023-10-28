@extends('layouts.main')

{{-- @section('title') Blog @endsection --}}

@section('title', 'Log in')

@section('content')
  <section class="container">
    <div class="row my-5" >
      <div class="d-flex justify-content-center my-6">
        <img src="{{ url('./../public/img/logo_horizontal.png') }}" alt="logo de nivelo">
      </div>

      <div class="row my-4 mx-auto border-top redondeo-superior-login  shadow-top">
        <div class="col-12 my-4">
          <div class="d-flex ">
            <h2 class="fw-bold">
              Registrate
            </h2>
            <span class="bg-movimiento mx-2"></span>
          </div>
        </div>
        <div class="col-12">
          <form action="#" method="POST">
            @csrf
            <div class="mb-4">
              <label for="name" class="form-label d-none">Nombre</label>
              <input type="text" name="name" class="form-control p-3" id="name" placeholder="Nombre">
            </div>
            <div class="mb-4">
              <label for="l_name" class="form-label d-none">Apellido</label>
              <input type="text" name="l_name" class="form-control p-3" id="l_name" placeholder="Apellido">
            </div>
            <div class="mb-4">
              <label for="user-name" class="form-label d-none">Nombre de usuario</label>
              <input type="text" name="user-name" class="form-control p-3" id="user-name" placeholder="Nombre de usuario">
            </div>
            <div class="mb-4">
              <label for="email" class="form-label d-none">Email</label>
              <input type="email" name="email" class="form-control p-3" id="email" placeholder="Email">
            </div>
            <div class="mb-4">
              <label for="b_date" class="form-label d-none">Nombre</label>
              <input type="date" name="b_date" class="form-control p-3" id="b_date" placeholder="Nombre">
            </div>
            <div class="mb-4">
              <label for="password" class="form-label d-none">Contraseña</label>
              <input type="password" name="password" class="form-control p-3" id="password" placeholder="Contraseña">
            </div>
            <div class="mb-4">
              <label for="password-repeart" class="form-label d-none">Repetir contraseña</label>
              <input type="password" name="password-repeart" class="form-control p-3" id="password-repeart" placeholder="Repetir contraseña">
            </div>
            <div class="mb-4 d-flex justify-content-center">
              <a>Términos y condiciones</a>
              <input type="checkbox" class="btn-check" id="terms_ok" name="terms_ok" autocomplete="off">
              <label class="btn btn-outline-primary" for="terms_ok">Acepto los términos y condiciones</label>
            </div>
            <div class="mb-4">
              <input type="submit" class="form-control rounded-pill p-3 shadow bg-verde-principal text-white" value="Continuar">
            </div>
          </form>
          <div class="row">
            <div class="col-12 mb-3 d-flex justify-content-center">
              <p>¿Ya tenés una cuenta? <a href="<?= url('/') ?>" class="fw-bold">Iniciá sesión</a></p>
            </div>


          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

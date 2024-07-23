@extends('layouts.main')

{{-- @section('title') Blog @endsection --}}

@section('title', 'Iniciá sesión')

@section('content')
<section>
  <div class="row d-flex vh-100 no_maring-right">
    <div class="col-12 col-md-6 col-lg-4 mt-lg-5 ms-lg-5 pt-3 container-xxl bg-white rounded shadow-sm">
      <div class="pt-5 d-flex justify-content-center my-6">
        <a href="{{ route('home') }}" class="d-flex"><img class="w-75" src="{{ url('/img/logo_horizontal.png') }}" alt="logo de nivelo"></a>
      </div>
      <div class="row pb-5 mt-4 mx-auto border-top redondeo-superior-login shadow-sm-top">
        <div class="col-12 my-4">
          <div class="d-flex ">
            <h1 class="fw-bold">Iniciá sesión</h1>
            <span class="bg-movimiento ms-3 mt-1"></span>
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
          <form action="{{ route('loginAction') }}" method="POST">
            @csrf
            <div class="mb-4">
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}"
                @error('email') aria-describedby="error-email" aria-invalid="true" @enderror>
                <label for="email">Email</label>
                @error('email')
                <p class="text-danger" id="error-email">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="mb-4">
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" value="{{ old('password') }}">
                <label for="password">Contraseña</label>
              </div>
            </div>
            <div class="mb-4">
              <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold" value=""> Continuar </button>
            </div>
          </form>
          <div class="row">
            <div class="col-12 mb-3 d-flex justify-content-center">
              <p>¿Olvidaste tu contraseña? <a href="{{ route('password.request') }}" class="fw-bold text-reset text-decoration-none">Hacé click acá</a></p>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-center">
              <a href="<?= url('/sesion-google') ?>" class="form-control btn bg-violeta-principal btn-violeta-active rounded-pill p-3 text-white shadow-sm fw-semibold">Google</a>
            </div>
            <div class="col-12 mb-3 d-flex justify-content-center">
              <p>¿No tenés una cuenta? <a href="{{ route('signup') }}" class="fw-bold text-reset text-decoration-none">Registrate</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 d-none d-sm-block bg-login">
    </div>
  </div>
</section>
@endsection

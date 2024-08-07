@extends('layouts.main')

{{-- @section('title') Blog @endsection --}}

@section('title', 'Registrate')

@section('content')
<section>
  <div class="row d-flex vh-100 no_maring-right">
    <div class="mt-lg-5 ms-lg-5 pt-3 container-xxl col-12 col-md-6 col-lg-4 bg-white rounded shadow-sm">
      <div class="d-flex justify-content-center my-6 pt-3">
        <a href="#" onclick="event.preventDefault(); window.history.back();"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="mt-2 me-4" height="40px"></a>
        <a href="{{ route('home') }}"><img src="{{ url('/img/logo_horizontal.png') }}" alt="logo de nivelo"></a>
      </div>
      <div class="row my-4 mx-auto border-top redondeo-superior-login  shadow-sm-top">
        <div class="col-12 my-4">
          <div class="d-flex ">
            <h1 class="fw-bold">Registrate</h1>
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
            @if($errors->any())
            <div class="alert alert-danger d-flex align-items-center row alert-dismissible fade show" role="alert">
              <p>❌ Hay errores en los datos ingresados. Por favor, corregilos para poder registrarte.</p>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
            @endif
          </div>
          <div class="col-12">
              <form action="{{ route('signupAction') }}" method="POST">
                  @csrf
                  <div><input type="hidden" name="avatar" id="avatar" value="03.jpg"></div>
                  <div class="mb-4">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre" value="{{ old('name') }}"
                            @error('name') aria-describedby="error-name" aria-invalid="true" @enderror>
                        <label for="name">Nombre</label>
                        @error('name')
                        <p class="text-danger" id="error-name">{{ $message }}</p>
                        @enderror
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-floating">
                        <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" id="surname" placeholder="Apellido" value="{{ old('surname') }}"
                            @error('surname') aria-describedby="error-surname" aria-invalid="true" @enderror>
                        <label for="surname">Apellido</label>
                        @error('surname')
                        <p class="text-danger" id="error-surname">{{ $message }}</p>
                        @enderror
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Nombre de usuario" value="{{ old('username') }}"
                            @error('username') aria-describedby="error-username" aria-invalid="true" @enderror>
                        <label for="username">Nombre de usuario</label>
                        @error('username')
                        <p class="text-danger" id="error-username">{{ $message }}</p>
                        @enderror
                    </div>
                  </div>
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
                        <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" placeholder="Fecha de nacimiento" value="{{ old('birth_date') }}"
                            @error('birth_date') aria-describedby="error-birth_date" aria-invalid="true" @enderror>
                        <label for="birth_date">Fecha de nacimiento</label>
                        @error('birth_date')
                        <p class="text-danger" id="error-birth_date">{{ $message }}</p>
                        @enderror
                    </div>
                  </div>
                  <div class="mb-4">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Contraseña"
                            @error('password') aria-describedby="error-password" aria-invalid="true" @enderror>
                        <label for="password">Contraseña</label>
                        @error('password')
                        <p class="text-danger" id="error-password">{{ $message }}</p>
                        @enderror
                        <button type="button" class="btn btn-outline-secondary position-absolute end-0 top-50 translate-middle-y pe-2 me-3" onclick="togglePassword('password')">Mostrar</button>
                    </div>
                  </div>
                  <div class="form-check d-flex justify-content-center">
                      <!-- Campo hidden con valor 0 (para caso de que no esté marcado) -->
                      <input type="hidden" name="terms" value="0">
                      <!-- Checkbox que se enviará con valor 1 si está marcado -->
                      <input class="form-check-input" type="checkbox" value="1" id="terms" name="terms"
                      @error('terms')
                      aria-describedby="error-terms"
                      aria-invalid="true"
                      @enderror>
                      <label class="ms-2 mb-2 form-check-label" for="flexCheckDefault" for="terms">
                          Acepto los <a href="{{route('terms')}}" class="fw-bold text-reset text-decoration-none">términos y condiciones</a>
                      </label>
                  </div>
                  @error('terms')
                      <p class="text-danger" id="error-terms">{{ $message }}</p>
                  @enderror
                  <div class="mb-4">
                    <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold" value=""> Continuar </button>
                  </div>
              </form>
              <div class="row">
                  <div class="col-12 mb-3 d-flex justify-content-center">
                      <p>¿Ya tenés una cuenta? <a href="{{ route('login') }}" class="fw-bold text-reset text-decoration-none">Iniciá sesión</a></p>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <div class="container-fluid col-12 d-none d-lg-block bg-login">
    </div>
  </div>
</section>
<script>
  function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
    field.setAttribute('type', type);
  }
</script>
@endsection

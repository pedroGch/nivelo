@extends('layouts.main')

{{-- @section('title') Blog @endsection --}}

@section('title', 'Registrate')

@section('content')
    <section>
        <div class="row d-flex vh-100">
          <div class="mt-lg-5 ms-lg-5 pt-3 container-xxl col-12 col-md-6 col-lg-4 bg-white rounded shadow">
              <div class="d-flex justify-content-center my-6">
                  <img src="{{ url('/img/logo_horizontal.png') }}" alt="logo de nivelo">
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
                  <div class="col-12 my-1">
                    @if (\Session::has('status.message'))
                      <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
                      {!! \Session::get('status.message') !!}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                      </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger d-flex align-items-center row alert-dismissible fade show" role="alert">
                      <p>❌ Hay errores en los datos ingresados. Por favor, corregilos para poder registrarte.</p>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                    </div>
                    @endif
                  </div>
                  <div class="col-12">
                      <form action="{{ route('signupAction') }}" method="POST">
                          @csrf
                          <div class="mb-4">
                              <label for="name" class="form-label d-none">Nombre</label>
                              <input type="text" name="name" class="form-control p-3 @error('name') is-invalid @enderror" id="name"  placeholder="Nombre" value="{{ old('name') }}"
                              @error('name')
                              aria-describedby="error-name"
                              aria-invalid="true"
                              @enderror>
                              @error('name')
                              <p class="text-danger" id="error-name">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="mb-4">
                              <label for="surname" class="form-label d-none">Apellido</label>
                              <input type="text" name="surname" class="form-control p-3 @error('surname') is-invalid @enderror" id="surname"  placeholder="Apellido" value="{{ old('surname') }}"
                              @error('surname')
                              aria-describedby="error-surname"
                              aria-invalid="true"
                              @enderror>
                              @error('surname')
                              <p class="text-danger" id="error-surname">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="mb-4">
                              <label for="username" class="form-label d-none">Nombre de usuario</label>
                              <input type="text" name="username" class="form-control p-3 @error('username') is-invalid @enderror" id="username"  placeholder="Nombre de usuario" value="{{ old('username') }}"
                              @error('username')
                              aria-describedby="error-username"
                              aria-invalid="true"
                              @enderror>
                              @error('username')
                              <p class="text-danger" id="error-username">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="mb-4">
                              <label for="email" class="form-label d-none">Email</label>
                              <input type="email" name="email" class="form-control p-3 @error('email') is-invalid @enderror" id="email"  placeholder="Email" value="{{ old('email') }}"
                              @error('email')
                              aria-describedby="error-email"
                              aria-invalid="true"
                              @enderror>
                              @error('email')
                              <p class="text-danger" id="error-email">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="mb-4">
                              <label for="birth_date" class="form-label ">Fecha de nacimiento</label>
                              <input type="date" name="birth_date" class="form-control p-3 @error('birth_date') is-invalid @enderror" id="birth_date" placeholder="Nombre" value="{{ old('birth_date') }}"
                              @error('birth_date')
                              aria-describedby="error-birth_date"
                              aria-invalid="true"
                              @enderror>
                              @error('birth_date')
                              <p class="text-danger" id="error-birth_date">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="mb-4">
                              <label for="password" class="form-label d-none">Contraseña</label>
                              <input type="password" name="password" class="form-control p-3 @error('password') is-invalid @enderror" id="password" placeholder="Contraseña"
                              @error('password')
                              aria-describedby="error-password"
                              aria-invalid="true"
                              @enderror>
                              @error('password')
                              <p class="text-danger" id="error-password">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="mb-4">
                              <label for="password-repeat" class="form-label d-none">Repetir contraseña</label>
                              <input type="password" name="password-repeat" class="form-control p-3 @error('password-repeat') is-invalid @enderror" id="password-repeat" placeholder="Repetir contraseña"
                              @error('password-repeat')
                              aria-describedby="error-password-repeat"
                              aria-invalid="true"
                              @enderror>
                              @error('password-repeat')
                              <p class="text-danger" id="error-password-repeat">{{ $message }}</p>
                              @enderror
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
                                  Acepto los <a href="#" class="fw-bold text-reset text-decoration-none">términos y
                                      condiciones</a>
                              </label>
                          </div>
                          @error('terms')
                              <p class="text-danger" id="error-terms">{{ $message }}</p>
                          @enderror
                          <div class="mb-4">
                            <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow bg-verde-principal text-white fw-semibold" value=""> Continuar </button>
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
@endsection

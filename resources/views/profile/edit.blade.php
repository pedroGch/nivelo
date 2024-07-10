<?php
/**
 * @var \App\Models\Category $category
 * @var \App\Models\Place $place
 * @var \App\Models\Place[] $myPlaces
 * @var \App\Models\Review $review
 * @var \App\Models\Review[] $madeReviews
 * @var $UserProfileActive
 */
?>

@extends('layouts.main')

@section('title', 'Editar mi perfil')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs pb-4">
  <div class="mx-2 my-4">
    @if (\Session::has('status.message'))
      <div class="alert alert-success d-flex align-items-center row alert-dismissible fade show" role="alert">
        {!! \Session::get('status.message') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
      </div>
    @endif
  </div>
  <div class="row border-bottom border-dark-subtle pb-3 d-flex">
    <div class="col-12 col-md-9 d-flex mt-3 align-items-center">
      <a href="{{ route('userProfile') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1  mb-2" height="20px"></a>
      <div class="d-flex ">
        <h1 class="h3 fw-bold">Editar mi perfil</h1>
        <span class="bg-movimiento ms-3"></span>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12">
      <form action="{{ route('editProfileAction') }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <div class="mb-4">
          <div class="form-floating">
            <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Nombre de usuario" value="{{ old('username', auth()->user()->username) }}"
            @error('username') aria-describedby="error-username" aria-invalid="true" @enderror>
            <label for="username">Nombre de usuario</label>
            @error('username')
            <p class="text-danger" id="error-username">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="mb-4">
          <div class="form-floating">
            <input type="password" name="password_old" class="form-control" id="password_old" placeholder="Contraseña anterior" value="{{ old('password_old') }}"
            @error('password_old') aria-describedby="error-password_old" aria-invalid="true" @enderror>
            <label for="password_old">Contraseña anterior</label>
            @error('password_old')
            <p class="text-danger" id="error-password_old">{{ $message }}</p>
            @enderror
          </div>
        </div>
        <div class="mb-4">
          <div class="form-floating">
            <input type="password" name="password_new" class="form-control" id="password_new" placeholder="Contraseña nueva" value="{{ old('password_new') }}"
            @error('password_new') aria-describedby="error-password_new" aria-invalid="true" @enderror>
            <label for="password_new">Contraseña nueva</label>
            @error('password_new')
            <p class="text-danger" id="error-password_new">{{ $message }}</p>
            @enderror
            <button type="button" class="btn btn-outline-secondary position-absolute end-0 top-50 translate-middle-y" onclick="togglePassword('password_new')">Mostrar</button>
          </div>
        </div>
        <div class="mb-4">
          <div class="form-floating">
            <input type="text" name="bio" class="form-control" id="bio" placeholder="Biografía" value="{{ old('bio', auth()->user()->bio) }}">
            <label for="bio">Biografía</label>
          </div>
        </div>

        <div class="mb-4">
          <label for="avatar" class="form-label">Selecciona tu avatar:</label>
          <div class="d-flex flex-wrap gap-3">
            @for ($i = 1; $i <= 6; $i++)
              <div class="form-check">
                <input class="form-check-input" type="radio" name="avatar" id="0{{ $i }}" value="0{{ $i }}.jpg" {{ old('avatar', auth()->user()->avatar) == "avatar$i.jpg" ? 'checked' : '' }}>
                <label class="form-check-label" for="avatar{{ $i }}">
                  <img src="{{ url("/img/avatars/0$i.jpg") }}" alt="avatar{{ $i }}" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                </label>
              </div>
            @endfor
          </div>
        </div>

        <div class="mb-4">
          <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold" value=""> Continuar </button>
        </div>
      </form>
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

@section('footer')

{{-- <x-NavbarBottom :UserProfileActive="$UserProfileActive ? 'true' : 'false'" /> --}}
<x-NavbarBottom/>

@endsection

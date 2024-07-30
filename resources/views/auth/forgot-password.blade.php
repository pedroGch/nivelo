{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
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
            <h1 class="fw-bold font-23">Restablecer contraseña</h1>
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
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-4">
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" value="{{ old('email') }}"
                @error('email') aria-describedby="error-email" aria-invalid="true" @enderror>
                <label for="email">Ingresá tu correo electrónico</label>
                @error('email')
                <p class="text-danger" id="error-email">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="mb-4">
              <x-primary-button class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold">
                  {{ __('Reestablecer') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-12 d-none d-sm-block bg-login">
    </div>
  </div>
</section>
@endsection
</x-guest-layout>

@extends('layouts.main')

{{-- @section('title') Blog @endsection --}}

@section('title', 'Log in')

@section('content')
  <section class="container">
    <div class="row">
      <div class="flex ">
        <img src="{{ url('./../public/img/logo_horizontal.png') }}" alt="logo de nivelo">
      </div>

      <div class="flex ">
        <h2>
          Log in
          <span> aca va el enfasis </span>
        </h2>
      </div>
    </div>
  </section>
@endsection

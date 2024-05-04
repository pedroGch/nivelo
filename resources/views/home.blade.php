@extends('layouts.main')

@section('title', 'Inicio')

@section('header')

<x-NavbarLanding/>

@endsection

@section('content')

<div id="home"  class="mt-5 pt-5 container">
  <div class="row mt-5">
    <div class="col-6 d-flex justify-content-center">
      <img src="{{ url('/img/mockup-cellphone.jpg') }}" alt="mano sosteniendo celular con pantalla de presentación de la app" class="img-fluid">
    </div>
    <div class="col-6">
      <h2 class="fw-bolder titulo-h1 mt-5">Conocé nivelo</h2>
      <p>La App que revolucionará la accesibilidad para personas con movilidad reducida en nuestro país.</p>
    </div>
  </div>
</div>

<div class="mt-4 pt-5">
  <iframe src="https://www.youtube.com/embed/1xpyPGC_Ysw" frameborder="0" width="1900" height="720"></iframe>
</div>


<div id="app" class="bg-violeta-dark">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-6">
        <h2 class="fw-bolder titulo-h1 mt-5 text-white">La App</h2>
        <p class="text-white pe-4"><strong>Nivelo es una app gratuita que te permite mapear lugares en todo el país, y compartir en primera persona tus vivencias y experiencias al visitarlos</strong>, para que otros usuarios tengan la posibilidad de planear sus salidas teniendo la certeza de que esos lugares brindan condiciones de seguridad y comodidad para que todas las personas puedan desenvolverse de la forma más autónoma posible.</p>
      </div>
      <div class="col-6 d-flex justify-content-center">
        <img src="{{ url('/img/la-app.jpg') }}" alt="dos mujeres sonriendo y tomando una cerveza en un bar, una de ellas usa silla de ruedas" class="img-fluid">
      </div>
  </div>
</div>
@endsection


@section('footer')

<x-FooterLanding/>

@endsection


<script>
  window.onload = function() {
      var scrollPosition = sessionStorage.getItem('scrollPosition');
      if (scrollPosition) {
          window.scrollTo(0, scrollPosition);
          sessionStorage.removeItem('scrollPosition');
      }
      window.onscroll = function() {
          sessionStorage.setItem('scrollPosition', window.pageYOffset);
      };
  };
  </script>

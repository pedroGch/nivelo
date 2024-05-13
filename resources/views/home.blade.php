@extends('layouts.main')

@section('title', 'Inicio')

@section('header')

<x-NavbarLanding/>

@endsection

@section('content')

<div id="home"  class="mt-5 pt-5 container">
  <div class="row mt-4">
    <div class="col-lg-6 order-sm-1 order-lg-2">
      <h2 class="fw-bolder titulo-h1 mt-5">Conocé nivelo</h2>
      <p>La App que revolucionará la accesibilidad para personas con movilidad reducida en nuestro país.</p>
    </div>
    <div class="col-lg-6 mb-5 d-flex justify-content-center order-sm-2 order-lg-1">
      <img src="{{ url('/img/mockup-cellphone.jpg') }}" alt="mano sosteniendo celular con pantalla de presentación de la app" class="img-fluid">
    </div>
  </div>
</div>

<div class="mt-4 pt-5 d-lg-none d-xl-none d-xxl-none">
  <iframe src="https://www.youtube.com/embed/1xpyPGC_Ysw" frameborder="0" width="320" height="240"></iframe>
</div>

<div class="mt-4 pt-5 d-xs-none d-sm-none d-md-none">
  <iframe src="https://www.youtube.com/embed/1xpyPGC_Ysw" frameborder="0" width="1900" height="720"></iframe>
</div>


<div class="bg-violeta-dark">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-6">
        <h2 class="fw-bolder titulo-h1 mt-5 text-white">El desafío de la accesibilidad</h2>
        <p class="text-white pe-4"><strong>Si tenés movilidad reducida y antes de ir a un lugar preguntás cómo es, pedís fotos de la entrada, las puertas, los baños, chequeás en Google Maps cómo es el acceso, nivelo es para vos.</strong></p>
        <p class="text-white pe-4">Vas a poder navegar a través del mapa y conocer lugares cercanos, realizar búsquedas por categoría o nombre de lugares y si otra persona ya lo subió, podrás acceder a su reseña completa, contribuir con tu opinión ¡y también agregar lugares nuevos!.</p>
      </div>
      <div class="col-6 d-flex justify-content-center">
        <img src="{{ url('/img/la-app.jpg') }}" alt="dos mujeres sonriendo y tomando una cerveza en un bar, una de ellas usa silla de ruedas" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<div id="app">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-6 d-flex justify-content-center">
        <img src="{{ url('/img/la-app.jpg') }}" alt="dos mujeres sonriendo y tomando una cerveza en un bar, una de ellas usa silla de ruedas" class="img-fluid">
      </div>
      <div class="col-6">
        <h2 class="fw-bolder titulo-h1 mt-5">La App</h2>
        <p class="pe-4"><strong>Nivelo es una app gratuita que te permite mapear lugares en todo el país, y compartir en primera persona tus vivencias y experiencias al visitarlos</strong>, para que otros usuarios tengan la posibilidad de planear sus salidas teniendo la certeza de que esos lugares brindan condiciones de seguridad y comodidad para que todas las personas puedan desenvolverse de la forma más autónoma posible.</p>
      </div>
    </div>
  </div>
</div>

<div class="bg-violeta-dark">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-6">
        <h2 class="fw-bolder titulo-h1 mt-5 text-white">El desafío de la accesibilidad</h2>
        <p class="text-white pe-4"><strong>Si tenés movilidad reducida y antes de ir a un lugar preguntás cómo es, pedís fotos de la entrada, las puertas, los baños, chequeás en Google Maps cómo es el acceso, nivelo es para vos.</strong></p>
        <p class="text-white pe-4">Vas a poder navegar a través del mapa y conocer lugares cercanos, realizar búsquedas por categoría o nombre de lugares y si otra persona ya lo subió, podrás acceder a su reseña completa, contribuir con tu opinión ¡y también agregar lugares nuevos!.</p>
      </div>
      <div class="col-6 d-flex justify-content-center">
        <img src="{{ url('/img/la-app.jpg') }}" alt="dos mujeres sonriendo y tomando una cerveza en un bar, una de ellas usa silla de ruedas" class="img-fluid">
      </div>
    </div>
  </div>
</div>

<div id="app">
  <div class="container py-5">
    <div class="row d-flex justify-content-center">
      <div class="col-6 d-flex justify-content-center">
        <img src="{{ url('/img/la-app.jpg') }}" alt="dos mujeres sonriendo y tomando una cerveza en un bar, una de ellas usa silla de ruedas" class="img-fluid">
      </div>
      <div class="col-6">
        <h2 class="fw-bolder titulo-h1 mt-5">La App</h2>
        <p class="pe-4"><strong>Nivelo es una app gratuita que te permite mapear lugares en todo el país, y compartir en primera persona tus vivencias y experiencias al visitarlos</strong>, para que otros usuarios tengan la posibilidad de planear sus salidas teniendo la certeza de que esos lugares brindan condiciones de seguridad y comodidad para que todas las personas puedan desenvolverse de la forma más autónoma posible.</p>
      </div>
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

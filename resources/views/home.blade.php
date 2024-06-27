@extends('layouts.main')

@section('title', 'Inicio')

@section('header')

<x-NavbarLanding/>

@endsection

@section('content')

<div id="home"  class="pt-5">
  <div class="mt-4 bg-home">
    <div class="container">
      <div class="row p-t-b-80px p-t-b-200px">
        <div class="col-lg-6 bg-white p-100px rounded-5">
          <h2 class="fw-bolder titulo-h1 titulo-h1-mb">Conocé nivelo</h2>
          <p class="h5 lh-base pt-md-2 pt-lg-3">La App que revolucionará la accesibilidad para personas con movilidad reducida en nuestro país.</p>
          <a href="{{ route('home') }}#app"><button class="mt-4 btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold w-50">Saber más</button></a>
        </div>
        <div class="col-lg-5">

        </div>
      </div>
    </div>
  </div>
</div>

<div class="my-lg-4 pb-5 py-lg-5 container">
  <div class="row">
    <div class="col-12 col-lg-6">
      <div class="d-flex justify-content-center">
      <iframe src="https://www.youtube.com/embed/1xpyPGC_Ysw" frameborder="0" width="1900" height="520"></iframe>
      </div>
    </div>
    <div class="col-12 col-lg-6">
      <div class="px-3 ps-lg-3 pt-5">
        <h2 class="fw-bolder titulo-h1 titulo-h1-mb">El desafío de la accesibilidad</h2>
        <p class="h5 lh-base pt-3"><strong>Según la OMS, entre el 10 y el 15% de la población mundial tiene o va a tener algún tipo de discapacidad a lo largo de su vida.</strong> Un gran porcentaje de esas personas tiene dificultades motrices y la falta de accesibilidad en el entorno, les dificulta o imposibilita salir de sus casas para estudiar, trabajar, o simplemente disfrutar del  tiempo libre.</p>
      </div>
    </div>
  </div>
</div>


<div id="app" class="bg-violeta-dark">
  <div class="container py-5">
    <div class="row d-flex justify-content-center px-3 px-lg-0">
      <div class="col-12 col-lg-6 pb-5">
        <h2 class="fw-bolder titulo-h1 titulo-h1-mb mt-5 text-white">La app</h2>
        <p class="text-white pe-4 pt-3 h5 lh-base"><strong>Si tenés movilidad reducida y antes de ir a un lugar preguntás cómo es, pedís fotos de la entrada, las puertas, los baños, chequeás en Google Maps cómo es el acceso, nivelo es para vos.</strong></p>
        <p class="text-white pe-4 lh-base pt-3">Vas a poder navegar a través del mapa y conocer lugares cercanos, realizar búsquedas por categoría o nombre de lugares y si otra persona ya lo subió, podrás acceder a su reseña completa, contribuir con tu opinión ¡y también agregar lugares nuevos!.</p>
      </div>
      <div class="col-12 col-lg-6 d-flex justify-content-center">
        <img src="{{ url('/img/la-app.jpg') }}" alt="dos mujeres sonriendo y tomando una cerveza en un bar, una de ellas usa silla de ruedas" class="img-fluid rounded-5">
      </div>
    </div>
  </div>
</div>

<div>
  <div class="container py-5">
    <div class="row d-flex justify-content-center pb-5 px-3 px-lg-0">
      <h2 class="text-center fw-bolder titulo-h1 titulo-h1-mb mt-4 pb-5">Con nivelo podés</h2>
      <div class="col-lg-8 d-flex justify-content-center">
        <img src="{{ url('/img/pantalla-nuevo-lugar.jpg') }}" alt="pantalla de celular y notebook mostrando la aplicación" class="img-fluid">
      </div>
      <div class="col-lg-4 d-flex flex-column justify-content-around ps-4">
        <div>
          <p class="h4 fw-bold">Buscar</p>
          <p>Lugares con las características de accesibilidad que vos necesites.</p>
        </div>
        <div>
          <p class="h4 fw-bold">Calificar</p>
          <p>Contribuir a la comunidad #YoNivelo dejando reseñas de tus experiencias.</p>
        </div>
        <div>
          <p class="h4 fw-bold">Descubrir</p>
          <p>Lugares accesibles cerca tuyo, y en todo el país.</p>
        </div>
        <div>
          <p class="h4 fw-bold">Sumar</p>
          <p>Lugares nuevos para promover que otros usuarios los visiten.</p>
        </div>
      </div>

      <button class="text-dark mt-5 btn btn-naranja-hover form-control rounded-pill p-3 shadow-sm bg-naranja-principal fw-semibold w-50 w-lg-25">Descargá la app</button>
    </div>
  </div>
</div>

<div class="bg-naranja-principal pt-2 mb-5">

</div>

<div>
  <div class="container py-5">
    <div class="row d-flex justify-content-center px-3 px-lg-0">
      <div class="col-12 col-lg-6 pb-lg-5 pb-3 order-2 order-lg-1">
        <h2 class="fw-bolder titulo-h1 titulo-h1-mb pt-5 pt-lg-0">Comunidad #YoNivelo</h2>
        <p class=" pt-3 h5 lh-base">Consideramos que estar "al mismo nivel" implica tener las mismas oportunidades para decidir sobre nuestras vidas, y la accesibilidad es la condición previa que posibilita el acceso a todos los derechos fundamentales.</p>
        <p class=" pt-3 h5 lh-base"><strong>Creemos que nivelar el mundo es responsabilidad de todos.</strong></p>
        <p class=" pt-3 h5 lh-base">Yo, me sumo.</p>
        <a href="{{ route('login') }}">
          <button class="mt-4 btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold w-50">#YoNivelo</button>
        </a>
      </div>
      <div class="col-12 col-lg-6 d-flex justify-content-center pb-lg-5 order-1 order-lg-2">
        <img src="{{ url('/img/mockup-cellphone.jpg') }}" alt="mano sosteniendo celular que muestra en la pantalla la app" class="img-fluid rounded-5">
      </div>
    </div>
  </div>
</div>


<div class="bg-trama py-5">

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

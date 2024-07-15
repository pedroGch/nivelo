@extends('layouts.main')

@section('title', 'Acerca de nivelo')

@section('header')
@if($user = Auth::user())
<x-NavbarTop :aboutViewActive="$aboutViewActive ? 'true' : 'false'"/>
@else
<x-NavbarLanding/>
@endif

@endsection

@section('content')

<div class="mt-5 pt-5 container">
  <div class="row mb-5">
    <div class="col-12">
      <div class="d-flex">
        <a href="#" onclick="event.preventDefault(); window.history.back();"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="mt-2 me-4" height="40px"></a>
        <h1 class="h2 fw-bolder mt-2 mb-3">Acerca de nivelo</h1>
      </div>
      <p>Versión: 1.0.0</p>
      <p><strong>Nivelo es una aplicación web desarrollada en Argentina por un equipo de jóvenes y apasionados desarrolladores comprometidos en brindar soluciones innovadoras a la comunidad a través de las nuevas tecnologías. Nuestra aplicación es completamente gratuita y está diseñada para compartir experiencias y descubrir lugares en todo el país.</strong></p>

      <p>Nuestra misión es proporcionar a los usuarios una plataforma donde puedan compartir en primera persona sus vivencias al visitar diversos lugares, desde parques y museos hasta restaurantes y hoteles, con el objetivo de ayudar a otros usuarios con movilidad reducida a planificar sus salidas de manera segura y cómoda.</p>

      <p>En nivelo, <strong>creemos en la importancia de la comunidad y en el poder de las experiencias compartidas.</strong> Creemos que cada lugar tiene su propia historia y que compartir estas historias puede enriquecer la experiencia de todos. Por eso, te invitamos a unirte a nuestra comunidad, explorar nuevos lugares, compartir tus experiencias y ayudar a otros usuarios a descubrir lo mejor de nuestro país.</p>

      <p>En nivelo,<strong> nos comprometemos a proporcionar una plataforma segura, confiable y fácil de usar.</strong> Trabajamos constantemente para mejorar nuestra aplicación y agregar nuevas funciones que enriquezcan la experiencia de nuestros usuarios.</p>

      <p><em>¡Gracias por ser parte de nivelo! Si tienes alguna pregunta, comentario o sugerencia, no dudes en ponerte en contacto con nosotros escribiendo a <b>info@nivelo.com.ar</b>. Estamos aquí para ayudarte y hacer de tu experiencia en nivelo algo inolvidable.</em></p>

      <p><em>¡Yo me sumo!, <b>#YoNivelo</b>.</em></p>
    </div>
  </div>
</div>

@endsection


@section('footer')

@if($user = Auth::user())
<x-NavbarBottom/>
@else
<x-FooterLanding/>
@endif

@endsection


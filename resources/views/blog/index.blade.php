@extends('layouts.main')

@section('title', 'Blog de nivelo, noticias de accesibilidad')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="row d-flex vh-100">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-2 border-bottom border-dark-subtle pb-3">
          <div class="d-flex ">
            <h2 class="h3 fw-bold">Blog</h2>
            <span class="bg-movimiento ms-3"></span>
          </div>
        </div>

        <div class="row d-flex col-12 my-2">

          @foreach ($noticias as $noticia)
          <article class="col-4">
            <div class="my-2">
              <h3>{{ $noticia->title }}</h3>
            </div>
            <div class="imagenDeTapa">
              <img src="{{asset('storage/places/kSysaXa4dXROO7kTgdV6hZSEMskBJNZdb4SmpQIE.jpg') }}" class="d-block w-100 1:3" alt="una imagen">
            </div>
            <div class="my-2">
              <p>{{ $noticia->descripcion_reducida() }}</p>
            </div>
            <div class="my-2">
              <div>
                <form action="{{ url('/blog/' . $noticia->id . '/leer_mas') }}" method="get">
                  <button class="btn bg-verde-principal" type="submit">
                    Leer más
                  </button>
                </form>
              </div>
            </div>
          </article>
          @endforeach

        </div>
      </div>
    </div>
  </div>


</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

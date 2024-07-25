@extends('layouts.main')

@section('title', 'Blog')


@section('header')

<x-NavbarTop :blogViewActive="$blogViewActive ? 'true' : 'false'"/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="row d-flex vh-100">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-2 d-flex border-bottom border-dark-subtle pb-3">
          <a href="{{ route('categories') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mt-2 mb-2" height="20px"></a>
          <div class="d-flex ">
            <h1 class="h3 fw-bold">Blog</h1>
            <span class="bg-movimiento ms-3"></span>
          </div>
        </div>

        <div class="row d-flex flex-sm-column flex-md-row col-12 my-2 mb-5">

          @foreach ($noticias as $noticia)
          <article class="col-12 col-lg-4 py-3">
            <div class="my-2">
              <h2>{{ $noticia->title }}</h2>
              <p> {{ $noticia->created_at }}</p>
            </div>
            <div class="imagenDeTapa">
              <a href="{{ url('/blog/' . $noticia->id . '/leer_mas') }}"><img src="{{asset('storage/' . $noticia->image)}}" class="d-block w-100 1:3" alt="{{$noticia->alt}}"></a>
            </div>
            <div class="my-2 h-100px">
              <p>{{ $noticia->descripcion_reducida() }}</p>
            </div>
            <div class="my-2">
              <div>
                <form action="{{ url('/blog/' . $noticia->id . '/leer_mas') }}" method="get">
                  <button class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white fw-semibold" type="submit">
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

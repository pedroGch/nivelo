<?php
/**
 * @var \App\Models\Noticia $noticia
 * @var \App\Models\Noticia[] $noticias
 */

?>

@extends('layouts.main')

@section('title', 'Blog :: '.$noticia->title)


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="row d-flex">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-2 border-bottom border-dark-subtle pb-3">
          <div class="d-flex ">
            <a href="{{ route('blogIndex') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class=" me-1" height="20px"></a>
            <a href="{{ route('blogIndex') }}" class="text-reset text-decoration-none">
              <p class="h5 fw-bold">Blog / Noticia</p>
            </a>

          </div>
        </div>

        <div class="row d-flex col-12 my-2">
          <article class="col-12">
            <div class="my-4">
              <h1>{{ $noticia->title }}</h1>
              <p> {{ $noticia->created_at }}</p>
            </div>
            <div class="imagenDeTapa mt-3 mb-5">
              <img src="{{asset('storage/' . $noticia->image)}}" class="d-block w-100" alt="{{$noticia->alt}}">
            </div>
            <div class="my-2">
              <p>{!! nl2br($noticia->content) !!}</p>
            </div>
            @if($noticia->video)
            <div class="my-5" style="position: relative; padding-bottom: 56.25%; /* 16:9 aspect ratio */ height: 0; overflow: hidden; max-width: 100%;">
              <iframe style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                src="{{ $noticia->video }}"
                title="YouTube video player"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>
            @endif

            @if ($noticia->source)
            <div class="my-5">
              <a href="{{ $noticia->source }}" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white" target="_blank">Ver fuente</a>

            @endif
          </article>
        </div>
        <div class="container">
          <div class="d-flex">
            <h2 class="h3 fw-bold">Últimas noticias</h2>
            <span class="bg-movimiento ms-3"></span>
          </div>
          <div class="row my-3">
            <div class="col-12 newsContainer d-md-flex justify-content-around ">
              @foreach($noticias as $noticia)
              <a href="{{ url('/blog/' . $noticia->id . '/leer_mas') }}" class="text-decoration-none">
                <div class="col-sm-4 py-2">
                  <div class="card">
                    <img src="{{asset('storage/' . $noticia->image ) }}" class="card-img-top" alt="{{ $noticia->alt }}">
                    <div class="card-body">
                      <h3 class="card-title"> {{ $noticia->title }}</h3>
                      <p> {{ $noticia->created_at }}</p>
                    </div>
                  </div>
                </div>
              </a>
              @endforeach
            </div>
          </div>
          <div class="my-5">
            <a href="{{ route('blogIndex') }}" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal  btn-verde-hover text-white">Ver todas</a>
          </div>
        </div>

      </div>
    </div>
  </div>


</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

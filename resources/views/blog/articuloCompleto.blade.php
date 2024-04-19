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
            <h2 class="h3 fw-bold">Blog</h2>
            <span class="bg-movimiento ms-3"></span>
          </div>
        </div>

        <div class="row d-flex col-12 my-2">
          <article class="col-12">
            <div class="my-3">
              <h3>{{ $noticia->title }}</h3>
            </div>
            <div class="imagenDeTapa mt-3 mb-5">
              <img src="{{asset('storage/' . $noticia->image)}}" class="d-block w-100" alt="{{$noticia->alt}}">
            </div>
            <div class="my-2">
              <p>{!! nl2br($noticia->content) !!}</p>
            </div>
            @if($noticia->video)
            <div class="my-5">
              <iframe width="1200" height="720"
              src="{{ $noticia->video }}"
              title="YouTube video player"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
            </div>
            @endif
          </article>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12 newsContainer">
              <div class="col-sm-4">
                <div class="card">
                  <img src="{{asset('storage/places/kSysaXa4dXROO7kTgdV6hZSEMskBJNZdb4SmpQIE.jpg') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 1</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <img src="{{asset('storage/places/kSysaXa4dXROO7kTgdV6hZSEMskBJNZdb4SmpQIE.jpg') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 1</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <img src="{{asset('storage/places/kSysaXa4dXROO7kTgdV6hZSEMskBJNZdb4SmpQIE.jpg') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 1</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <img src="{{asset('storage/places/kSysaXa4dXROO7kTgdV6hZSEMskBJNZdb4SmpQIE.jpg') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 1</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="card">
                  <img src="{{asset('storage/places/kSysaXa4dXROO7kTgdV6hZSEMskBJNZdb4SmpQIE.jpg') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Título de la Noticia 1</h5>
                  </div>
                </div>
              </div>
            </div>
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

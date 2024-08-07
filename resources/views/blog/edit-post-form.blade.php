<?php
/**
 * @var \App\Models\Noticia $noticia
*/
?>
@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Editar noticia' . $noticia->title)

@section('header')

<x-NavbarTop/>

@endsection

@section('content')
<section class="container margin-navs">
  <div class="row d-flex vh-100">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-2 d-flex border-bottom border-dark-subtle pb-3">
          <a href="{{ route('blogAdmin') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mt-2 mb-2" height="20px"></a>
          <div class="d-flex ">
            <h1 class="h3 fw-bold">Editar noticia</h1>
            <span class="bg-movimiento ms-3"></span>
          </div>
        </div>
        <div class="mx-2 col-12 my-1">
          @if (\Session::has('status.message'))
            <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
              {!! \Session::get('status.message') !!}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
          @endif
          @if($errors->any())
          <div class="alert alert-danger d-flex align-items-center row alert-dismissible fade show" role="alert">
            <p>❌ Hay errores en los datos ingresados. Por favor, corregilos para cargar correctamente el lugar.</p>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
          </div>
          @endif
        </div>
        <div class="col-12 mb-5">
          <form action="{{ route('editPostAction', ['id' => $noticia->id]) }}"" method="POST" id="edit_post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12 mb-4">
                <label for="title" class="form-label h5 my-3">Título de la noticia:</label>
                <input type="text"   name="title" class="form-control p-3 @error('title') is-invalid @enderror" id="title" value="{{ old('title', $noticia->title) }}"
                @error('title')
                aria-describedby="error-title"
                aria-invalid="true"
                @enderror>
                @error('title')
                <p class="text-danger" id="error-title">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12 mb-4 border-bottom border-dark-subtle pb-3">
                <label for="image" class="block font-bold mb-3 h5"> Imagen principal actual</label>
                <div class="mb-3">
                  <img src="{{asset('storage/' . $noticia->image)}}" class="d-block w-100" alt="{{$noticia->alt}}">
              </div>
              <div class="col-12 mb-4 border-bottom border-dark-subtle pb-3">
                <label for="image" class="block font-bold mb-3 h5"> Subir nueva imagen principal</label>
                <div class="mb-3">
                  <input type="file" name="image" id="image" class="@error('image') is-invalid @enderror"
                  @error('image')
                  aria-describedby="error-image"
                  aria-invalid="true"
                  @enderror>
                  @error('image')
                  <p class="text-danger" id="error-image">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div>
                <label for="alt" class="form-label h5 my-3">Descripción de la imagen:</label>
                <input type="text" name="alt" class="form-control p-3 @error('alt') is-invalid @enderror" id="alt" value="{{ old('alt', $noticia->alt) }}"
                @error('alt')
                aria-describedby="error-alt"
                aria-invalid="true"
                @enderror>
                @error('alt')
                <p class="text-danger" id="error-alt">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12">
                <div class="mb-4 mt-1 d-flex flex-column pb-4">
                  <label for="content" class="form-label h5 my-3">Contenido:</label>
                  <textarea name="content" id="content" class="form-control p-3 @error('content') is-invalid @enderror"
                  @error('content')
                  aria-describedby="error-content"
                  aria-invalid="true"
                  @enderror
                  >{{ trim(old('contenido', $noticia->content)) }}</textarea>
                  @error('content')
                  <p class="text-danger" id="error-content">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="mb-4 mt-1 d-flex flex-colum pb-4">
                  <label for="video" class="form-label h5 my-3"> Link de video (opcional):</label>
                  <input type="text" name="video" class="form-control p-3 @error('video') is-invalid @enderror" id="video" value="{{ old('video', $noticia->video) }}"
                  @error('video')
                  aria-describedby="error-video"
                  aria-invalid="true"
                  @enderror>
                  @error('video')
                  <p class="text-danger" id="error-video">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="mb-4 mt-1 d-flex flex-colum pb-4">
                  <label for="source" class="form-label h5 my-3"> Link de la fuente original (opcional):</label>
                    <input type="text" name="source" class="form-control p-3 @error('source') is-invalid @enderror" id="source"  value="{{ old('source', $noticia->source) }}"
                    @error('source')
                    aria-describedby="error-source"
                    aria-invalid="true"
                    @enderror>
                    @error('source')
                    <p class="text-danger" id="error-source">{{ $message }}</p>
                    @enderror

                </div>
              </div>

            </div>
              <div class="row">
                <div class="col-12 col-lg-6 pt-3 mb-5">
                  <a href="{{ route('categories') }}" class="form-control btn rounded-pill p-3 shadow-sm bg-violeta-principal  btn-violeta-hover text-white fw-semibold">Cancelar</a>
                </div>
                <div class="col-12 col-lg-6 pt-3 mb-4">
                  <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold" value=""> Editar </button>
                </div>
              </div>
            </form>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('footer')

<x-NavbarBottom/>

@endsection

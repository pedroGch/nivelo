<?php
/**
  * Vista para editar una reseña de un lugar.
  *
  * @var App\Models\Place $place
  * @var App\Models\Review $review
  */
?>

@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Editar reseña')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')
<section class="container margin-navs">
    <div class="row d-flex vh-100">
      <div class="pb-5">
        <div class="row my-4 mx-auto pb-5">
          <div class="col-12 mb-4">
              <div class="d-flex border-bottom border-dark-subtle">
                <h2 class="fw-bold pb-1">Editar tu reseña</h2>
                <span class="bg-movimiento ms-3 mt-1"></span>
              </div>
          </div>
          <div class="mx-2 col-12 my-1">
            @if (\Session::has('status.message'))
              <div class="alert alert-success d-flex align-items-center row alert-dismissible fade show" role="alert">
                {!! \Session::get('status.message') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
              </div>
            @endif
            @if($errors->any())
            <div class="alert alert-danger d-flex align-items-center row alert-dismissible fade show" role="alert">
              <p>❌ Hay errores en los datos ingresados. Por favor, corregilos para cargar correctamente tu opinión.</p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
            @endif
          </div>
          <div class="col-12">
            <p class="h4 my-4">¿Cómo fue tu experiencia en <b>{{ $place->name }}</b>?</p>
            <form action="{{ route('editReviewAction', ['review_id' => $review->review_id]) }}" method="POST" id="edit_review" enctype="multipart/form-data">
              @csrf
              <div class="d-flex justify-content-center">
                <input type="hidden" name="place_id" value="{{$place->place_id}}">
                <div class="col-6 col-lg-12 mb-4 d-flex flex-wrap justify-content-lg-around">
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="excelente" value="5" @if(old('score', $review->score) == 5) checked @endif>
                    <label class="fs-6 fw-medium form-check-label" for="excelente">👍 Excelente</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="buena" value="4" @if(old('score', $review->score) == 4) checked @endif>
                    <label class="fs-6 fw-medium form-check-label" for="buena">😌 Buena</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="regular" value="3" @if(old('score', $review->score) == 3) checked @endif>
                    <label class="fs-6 fw-medium form-check-label" for="regular">😐 Regular</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="mala" value="2" @if(old('score', $review->score) == 2) checked @endif>
                    <label class="fs-6 fw-medium form-check-label" for="mala">🙁 Mala</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="muy-mala" value="1" @if(old('score', $review->score) == 1) checked @endif
                    @error('score')
                    aria-describedby="error-score"
                    aria-invalid="true"
                    @enderror>
                    <label class="fs-6 fw-medium form-check-label" for="muy-mala">👎 Muy mala</label>
                  </div>
                </div>

              </div>
              <div>
                @error('score')
                <p class="text-danger" id="error-score">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-12 mb-3">
                <label for="review" class="h5">Tu opinión:</label>
                <textarea name="review" id="review" class="form-control p-3 @error('review') is-invalid @enderror"
                @error('review')
                aria-describedby="error-review"
                aria-invalid="true"
                @enderror
                >{{ old('review', $review->review) }}</textarea>
              </div>
              @error('review')
                <p class="text-danger" id="error-review">{{ $message }}</p>
              @enderror
              <div class="col-12 mb-3">
                <p class="h5 my-4">Podés subir hasta tres fotos para ayudar a otros usuarios a conocer más en detalle la accesibilidad de este lugar. </p>
                <p>Te invitamos a que puedas describir en pocas palabras lo que se ve en cada foto; es opcional, pero brindará accesibilidad para las personas con discapacidad visual que utilicen la app.</p>
                <div class="row">
                  <div class="col-4">

                  </div>
                  <div class="col-4"></div>
                  <div class="col-4"></div>
                </div>
                <div class="my-3">
                  <label for="pic_1" class="h5 mt-4">Foto 1:</label>
                  <img height="150" class="mb-3" src="{{ asset('storage/' . $review->pic_1 ) }}" alt="{{ $review->alt_pic_1 }}">
                  <input type="file" name="pic_1" id="pic_1" class="form-control p-3 @error('pic_1') is-invalid @enderror"
                  @error('pic_1')
                  aria-describedby="error-pic_1"
                  aria-invalid="true"
                  @enderror
                  >
                </div>
                <div>
                  <label for="alt_pic_1">Descripción foto 1:</label>
                  <input type="text" name="alt_pic_1" id="alt_pic_1" class="form-control p-3 @error('alt_pic_1') is-invalid @enderror" value="{{ old('alt_pic_1', $review->alt_pic_1) }}">
                </div>
                <div class="my-3">
                  <label for="pic_2" class="h5  mt-4">Foto 2:</label>
                  <img height="150" class="mb-3" src="{{ asset('storage/' . $review->pic2 ) }}" alt="{{ $review->alt_pic_2 }}">
                  <input type="file" name="pic_2" id="pic_2" class="form-control p-3 @error('pic_2') is-invalid @enderror"
                  @error('pic_2')
                  aria-describedby="error-pic_2"
                  aria-invalid="true"
                  @enderror
                  >
                </div>
                <div>
                  <label for="alt_pic_2">Descripción foto 2:</label>
                  <input type="text" name="alt_pic_2" id="alt_pic_2" class="form-control p-3 @error('alt_pic_2') is-invalid @enderror" value="{{ old('alt_pic_2', $review->alt_pic_2) }}">
                </div>
                <div class="my-3">
                  <label for="pic_3" class="h5  mt-4">Foto 3:</label>
                  <img height="150" class="mb-3" src="{{ asset('storage/' . $review->pic_3 ) }}" alt="{{ $review->alt_pic_3 }}">
                  <input type="file" name="pic_3" id="pic_3" class="form-control p-3 @error('pic_3') is-invalid @enderror"
                  @error('pic_3')
                  aria-describedby="error-pic_3"
                  aria-invalid="true"
                  @enderror
                  >
                </div>
                <div class="mb-4">
                  <label for="alt_pic_3">Descripción foto 3:</label>
                  <input type="text" name="alt_pic_3" id="alt_pic_3" class="form-control p-3 @error('alt_pic_3') is-invalid @enderror" value="{{ old('alt_pic_3', $review->alt_pic_3) }}">
                </div>
                <div class="mb-4">
                  <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold" value=""> Editar </button>
                </div>
              </div>
            </form>
            <div class="mb-4">
              <a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id  ] ) }}" class="form-control btn btn-verde-hover rounded-pill p-3 shadow-sm bg-verde-principal text-white">Cancelar</a>
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

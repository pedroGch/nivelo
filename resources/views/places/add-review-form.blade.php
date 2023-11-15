@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Nueva reseña')

@section('header')

<x-NavbarTop/>

@endsection

@section('content')
<section class="container margin-navs">
    <div class="row d-flex vh-100">
      <div class="">
        <div class="row my-4 mx-auto">
          <div class="col-12 my-4">
              <div class="d-flex ">
                <h2 class="fw-bold">Nueva reseña</h2>
                <span class="bg-movimiento mx-2 mt-1"></span>
              </div>
              <h3 class="mt-3">¿Cómo fue tu experiencia en <b>{{ $place->name }}</b> ?</h3>
          </div>
          <div class="col-12 my-1">
            @if (\Session::has('status.message'))
              <div class="alert alert-success d-flex align-items-center row alert-dismissible fade show" role="alert">
                {!! \Session::get('status.message') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
              </div>
            @endif
            </div>
          <div class="col-12">
            <form action="" method="POST" id="new_review_create" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 d-flex flex-wrap justify-content-around">
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-4 form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                    <label class="fs-5 form-check-label" for="inlineRadio1">👎 Muy mala</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-4 form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                    <label class="fs-5 form-check-label" for="inlineRadio2">🙁 Mala</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-4 form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                    <label class="fs-5 form-check-label" for="inlineRadio3">😐 Regular</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-4 form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="4">
                    <label class="fs-5 form-check-label" for="inlineRadio3">😌 Buena</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-4 form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="5">
                    <label class="fs-5 form-check-label" for="inlineRadio3">👍 Excelente</label>
                  </div>
                </div>

                <div class="col-12 mb-3">
                  <label for="review_text">Tu opinión:</label>
                  <textarea name="review_text" id="review_text" class="form-control p-3"></textarea>
                </div>

                  <div class="mb-4">
                    <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow bg-verde-principal text-white fw-semibold" value=""> Agregar </button>
                  </div>
                </div>
                </form>

                <div class="mb-4">
                  <a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id  ] ) }}" class="form-control btn rounded-pill p-3 shadow bg-verde-principal text-white">Cancelar</a>
                </div>
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

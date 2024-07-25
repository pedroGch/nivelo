@extends('layouts.main')

{{-- @section('title') Página Principal @endsection --}}

@section('title', 'Nueva reseña')

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
                <h1 class="fw-bold pb-1">Nueva reseña</h1>
                <span class="bg-movimiento ms-3 mt-1"></span>
              </div>
          </div>
          <div class="mx-2 col-12 my-1">
            @if (\Session::has('status.message'))
            <div class="alert alert-{{ \Session::get('status.type', 'success') }} d-flex align-items-center row alert-dismissible fade show" role="alert">
              {!! \Session::get('status.message') !!}
              @if (\Session::has('status.link'))
                <p>Para editar tu reseña hacé <a href="{{ \Session::get('status.link') }}" class="text-reset  ms-2">click acá</a></p>
              @endif
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
            <form action="{{ route('addReviewAction') }}" method="POST" id="new_review_create" enctype="multipart/form-data">
              @csrf
              <div class="d-flex justify-content-center">
                <input type="hidden" name="place_id" value="{{$place->place_id}}">
                <div class="col-6 col-lg-12 mb-4 d-flex flex-wrap justify-content-lg-around">
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="excelente" value="5">
                    <label class="fs-6 fw-medium form-check-label" for="excelente">👍 Excelente</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="buena" value="4">
                    <label class="fs-6 fw-medium form-check-label" for="buena">😌 Buena</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="regular" value="3">
                    <label class="fs-6 fw-medium form-check-label" for="regular">😐 Regular</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="mala" value="2">
                    <label class="fs-6 fw-medium form-check-label" for="mala">🙁 Mala</label>
                  </div>
                  <div class="my-2 form-check form-check-inline">
                    <input class="fs-6 fw-medium form-check-input" type="radio" name="score" id="muy-mala" value="1"
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
                <label for="review_text" class="h5">Tu opinión:</label>
                <textarea name="review_text" id="review_text" class="form-control p-3 @error('review_text') is-invalid @enderror"
                @error('review_text')
                aria-describedby="error-review_text"
                aria-invalid="true"
                @enderror
                >{{ old('review_text') }}</textarea>
              </div>
              @error('format')
                <p class="text-danger" id="error-review_text">{{ $message }}</p>
              @enderror
              <div class="col-12 mb-3">
                <p class="h5 my-4">Podés subir hasta tres fotos para ayudar a otros usuarios a conocer más en detalle la accesibilidad de este lugar. </p>
                <p>Te invitamos a que puedas describir en pocas palabras lo que se ve en cada foto; es opcional, pero brindará accesibilidad para las personas con discapacidad visual que utilicen la app.</p>
                <div class="my-3">
                  <label for="pic_1" class="h5 mt-4">Foto 1:</label>
                  <input type="file" name="pic_1" id="pic_1" class="form-control p-3 @error('pic_1') is-invalid @enderror"
                  @error('pic_1')
                  aria-describedby="error-pic_1"
                  aria-invalid="true"
                  @enderror
                  >
                </div>
                <div>
                  <label for="alt_pic_1">Descripción foto 1:</label>
                  <input type="text" name="alt_pic_1" id="alt_pic_1" class="form-control p-3 @error('alt_pic_1') is-invalid @enderror">
                </div>
                <div class="my-3">
                  <label for="pic_2" class="h5  mt-4">Foto 2:</label>
                  <input type="file" name="pic_2" id="pic_2" class="form-control p-3 @error('pic_2') is-invalid @enderror"
                  @error('pic_2')
                  aria-describedby="error-pic_2"
                  aria-invalid="true"
                  @enderror
                  >
                </div>
                <div>
                  <label for="alt_pic_2">Descripción foto 2:</label>
                  <input type="text" name="alt_pic_2" id="alt_pic_2" class="form-control p-3 @error('alt_pic_2') is-invalid @enderror">
                </div>
                <div class="my-3">
                  <label for="pic_3" class="h5  mt-4">Foto 3:</label>
                  <input type="file" name="pic_3" id="pic_3" class="form-control p-3 @error('pic_3') is-invalid @enderror"
                  @error('pic_3')
                  aria-describedby="error-pic_3"
                  aria-invalid="true"
                  @enderror
                  >
                </div>
                <div class="mb-4">
                  <label for="alt_pic_3">Descripción foto 3:</label>
                  <input type="text" name="alt_pic_3" id="alt_pic_3" class="form-control p-3 @error('alt_pic_3') is-invalid @enderror">
                </div>
                <div class="row pt-3">
                  <div class="col-12 col-lg-6 mb-4">
                    <a href="{{ route('placeDetail', ['category_id' => $category->category_id, 'place_id' => $place->place_id  ] ) }}" class="form-control btn rounded-pill p-3 shadow-sm bg-violeta-principal  btn-violeta-hover text-white fw-semibold">Cancelar</a>
                  </div>
                  <div class="col-12 col-lg-6 mb-4">
                    <button type="submit" class="btn btn-verde-hover form-control rounded-pill p-3 shadow-sm bg-verde-principal text-white fw-semibold" value=""> Agregar </button>
                  </div>
                </div>
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

<?php
/**
 * @var \App\Models\Review[] $reviews
 * @var \App\Models\Review[] $reviewsPendientes
 */

?>

@extends('layouts.main')

@section('title', 'Administrar reseñas')


@section('header')

<x-NavbarTop/>

@endsection

@section('content')

<section class="container margin-navs">
  <div class="row d-flex vh-100">
    <div class="mb-2">
      <div class="row my-4 mx-auto">
        <div class="col-12 my-2 d-flex border-bottom border-dark-subtle pb-3">
          <a href="{{ route('dashboard') }}"><img src="{{ url('/img/icons/back_icon.svg') }}" alt="atrás" class="me-1 mt-2 mb-2" height="20px"></a>
          <div class="d-flex ">
            <h1 class="h3 fw-bold">Administrar reseñas de usuarios</h1>
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
        </div>
        <div class="mt-3 row">
          <div class="d-flex justify-content-end mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="sortPendingReviews" onclick="sortReviews()">
              <label class="form-check-label" for="sortPendingReviews">
                Ordenar por pendientes
              </label>
            </div>
          </div>
          <div class="lg:mx-6  mt-2 mb-5 flex justify-center flex-row flex-wrap">
            <table class="mb-4">
              <thead class="border-2">
                <tr>
                  <th class="p-3">ID</th>
                  <th class="p-3">Fotos</th>
                  <th class="p-3">Reseña</th>
                  <th class="p-3">Estado</th>
                  <th class="p-3">Acciones</th>
                </tr>
              </thead>
              <tbody class="border-2" id="reviewsTableBody">
              @foreach ($reviews as $review)
                <tr class="border-2">
                  <td class="p-3 border-2">{{ $review->review_id }}</td>
                  <td class="text-sm p-3 border-2" width="50%">
                    @if($review->pic_1 || $review->pic_2 || $review->pic_3)
                    <div class="d-flex">
                      @if($review->pic_1)
                      <div class="p-1">
                        <img src="{{asset('storage/' . $review->pic_1)}}" class="d-block w-100" alt="{{$review->alt_pic_1}}">
                      </div>
                      @endif
                      @if($review->pic_2)
                      <div class="p-1">
                        <img src="{{asset('storage/' . $review->pic_2)}}" class="d-block w-100" alt="{{$review->alt_pic_2}}">
                      </div>
                      @endif
                      @if($review->pic_3)
                      <div class="p-1">
                        <img src="{{asset('storage/' . $review->pic_3)}}" class="d-block w-100" alt="{{$review->alt_pic_3}}">
                      </div>
                      @endif
                      @else
                      <p class="h6">El usuario no subió fotos</p>
                      @endif
                    </div>
                    <div>
                      @if($review->alt_pic_1)
                      <p class="text-sm"><b>Descripción de la foto 1:</b> {{$review->alt_pic_1}}</p>
                      @endif
                      @if($review->alt_pic_2)
                      <p class="text-sm"><b>Descripción de la foto 2:</b> {{$review->alt_pic_2}}</p>
                      @endif
                      @if($review->alt_pic_3)
                      <p class="text-sm"><b>Descripción de la foto 3:</b> {{$review->alt_pic_3}}</p>
                      @endif

                    </div>
                  </td>
                  <td class="text-sm p-3 border-2" width="40%">
                    <p><b>Fecha:</b> {{ $review->created_at }}</p>
                    <p><b>Lugar:</b> {{ $review->place->name }}</p>
                    @if($review->review)
                    <p><b>Reseña:</b> "{!! nl2br($review->review) !!}"</p>
                    @else
                    <p><b>Reseña:</b> -</p>
                    @endif
                    <div class="col-12 mt-2">
                      <p><b>Calificación: {{$review->score}} </b></p>
                    </div>
                    <p ><b>Usuario:</b> {{ $review->user->username }}</p>
                  </td>
                  <td class="text-sm p-4">
                    @if($review->status == 'pending')
                    <img src="{{ url('/img/icons/status-pending.png') }}" alt="pendiente" class="me-1 mt-2 mb-2">
                    @elseif($review->status == 'hidden')
                    <img src="{{ url('/img/icons/status-hidden.png') }}" alt="oculto" class="me-1 mt-2 mb-2">
                    @else
                    <img src="{{ url('/img/icons/status-approved.png') }}" alt="aprobado" class="me-1 mt-2 mb-2">
                    @endif
                  </td>
                  <td class="p-3 border-2" width="15%">
                    @if ($review->status == "pending")
                      <form action="{{ url('/dashboard/administrar-resenas/' . $review->review_id . '/aprobar') }}" method="GET">
                        <button type="submit" class="form-control btn rounded-pill shadow-sm bg-verde-principal btn-verde-hover text-white fw-semibold">Aprobar</button>
                      </form>
                    @endif
                    @if($review->status == "approved")
                      <form action="{{ url('/dashboard/administrar-resenas/' . $review->review_id . '/ocultar') }}" method="GET">
                      <button type="submit" class="form-control btn rounded-pill shadow-sm bg-rojo btn-rojo-hover text-white fw-semibold">Ocultar</button>
                    </form>
                    @elseif($review->status == "hidden")
                      <form action="{{ url('/dashboard/administrar-resenas/' . $review->review_id . '/aprobar') }}" method="GET">
                      <button type="submit" class="form-control btn rounded-pill shadow-sm bg-verde-principal btn-verde-hover text-white fw-semibold">Mostrar</button>
                    </form>
                    @endif
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
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

<script>
  function sortReviews() {
    const tableBody = document.getElementById('reviewsTableBody');
    const rows = Array.from(tableBody.querySelectorAll('tr'));
    const sortPending = document.getElementById('sortPendingReviews').checked;

    rows.sort((a, b) => {
        const aStatus = a.querySelector('img').alt;
        const bStatus = b.querySelector('img').alt;

        if (sortPending) {
            if (aStatus === 'pendiente' && bStatus !== 'pendiente') return -1;
            if (aStatus !== 'pendiente' && bStatus === 'pendiente') return 1;
            return 0; // maintain order among similar status
        } else {
            return a.rowIndex - b.rowIndex;
        }
    });

    // Clear the table body
    tableBody.innerHTML = '';

    // Append sorted rows back to the table body
    rows.forEach(row => tableBody.appendChild(row));
}
  function borrarReview(id, review) {
    Swal.fire({
      title: '¿Estás seguro que querés eliminar la noticia?',
      text:'"' + title + '"',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#13BA41',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Borrar',
      cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
        fetch(`/blog/${id}/eliminar`, {
            method: 'get',
            headers: {
               'X-Requested-With': 'XMLHttpRequest'
            },
        })
        location.reload();
      }
    })
  }
</script>

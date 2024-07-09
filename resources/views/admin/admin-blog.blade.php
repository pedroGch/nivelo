<?php
/**
 * @var \App\Models\Noticia[] $noticias
 */

?>

@extends('layouts.main')

@section('title', 'Administrar blog')


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
            <h1 class="h3 fw-bold">Administrar blog de noticias</h1>
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
          <div class="lg:mx-6 mb-8 mt-2 mb-5 flex justify-center flex-row flex-wrap">
            <div class="col-12 col-lg-3">
              <form action="{{ route('addPostAction') }}" method="GET">
                <button type="submit" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white mb-3">Agregar noticia nueva</button>
              </form>
            </div>
            <table class="mb-4">
              <thead class="border-2">
                <tr>
                  <th class="p-3">ID</th>
                  <th class="p-3">Imagen principal</th>
                  <th class="p-3">Título</th>
                  <th class="p-3">Fecha de creación</th>
                  <th class="p-3">Acciones</th>
                </tr>
              </thead>
              <tbody class="border-2">
              @foreach ($noticias as $noticia)
                <tr class="border-2">
                  <td class="p-3 border-2">{{ $noticia->id }}</td>
                  <td class="text-sm p-3 border-2" width="20%">
                    <img src="{{asset('storage/' . $noticia->image)}}" class="d-block w-100" alt="{{$noticia->alt}}">
                  </td>
                  <td class="text-sm p-3 border-2" width="50%">{{ $noticia->title }}</td>
                  <td class="text-sm p-3 border-2">{{ $noticia->created_at }}</td>
                  <td class="p-3 border-2" width="15%">
                    <form action="{{ url('/blog/' . $noticia->id . '/editar') }}" method="GET">
                      <button type="submit" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white">Editar</button>
                    </form>
                    <button type="button" onclick="borrarNoticia({{ $noticia->id }}, '{{ $noticia->title }}')" class="mb-3 form-control btn rounded-pill p-3 shadow-sm bg-rojo btn-rojo-hover text-white">Eliminar
                    </button>
                    <form action="{{ url('/blog/' . $noticia->id . '/leer_mas') }}" method="GET">
                      <button type="submit" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white">Leer más</button>
                    </form>
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
  function borrarNoticia(id, title) {
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

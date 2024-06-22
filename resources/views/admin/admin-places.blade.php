<?php
/**
 * @var \App\Models\Noticia[] $noticias
 */

?>

@extends('layouts.main')

@section('title', 'Administrar lugares')


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
            <h2 class="h3 fw-bold">Administrar lugares</h2>
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
        <div class="row">
          <div class="col-12 col-lg-3">
            <form action="{{ route('addPlaceForm') }}" method="GET">
              <button type="submit" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white mb-3">Agregar lugar</button>
            </form>
          </div>
        </div>
        <div class="col-12 ">
          <select id="categorySelect" class="form-select mb-3" aria-label="Select Category">
            <option >Selecciona una categoria</option>
            <option value="all">Todos los lugares</option>
            <option value="pending">Lugares por autorizar</option>
            @foreach($categorias as $categoria)
              <option value="{{ $categoria->category_id }}">{{ $categoria->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="row">
          <div class="col-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Ciudad</th>
                  <th>Provincia</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody id="placesTableBody">

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
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('categorySelect').addEventListener('change', function() {
      const category_id = this.value;
      fetch(`/categories/${category_id}/places`)
        .then(response => response.json())
        .then(data => {
          const tbody = document.getElementById('placesTableBody');
          tbody.innerHTML = '';
          data.forEach(place => {
            const row = document.createElement('tr');
            row.id = `placeRow${place.place_id}`;
            row.innerHTML = `
              <td>${place.name}</td>
              <td>${place.address}</td>
              <td>${place.city}</td>
              <td>${place.province}</td>
              <td>
                <a href="/lugares/${place.place_id}/editar" class="btn btn-sm btn-primary">Editar</a>
                <button onclick="borrarLugar(${place.place_id}, '${place.name}')" class="btn btn-sm btn-danger">Eliminar</button>
              </td>
            `;
            tbody.appendChild(row);
          });
        });
    });
  });
  function borrarLugar(id, name) {
    Swal.fire({
        title: '¿Estás seguro que querés eliminar este lugar?',
        text: '"' + name + '"',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#13BA41',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Borrar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
          fetch(`/lugares/${id}/eliminar`, {
            method: 'get',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Content-Type': 'application/json',
            }
          })
          .then(data => {
            console.log(data);
            if (data.status == 200) {
              // Eliminar la fila de la tabla
              document.getElementById(`placeRow${id}`).remove();
              Swal.fire('Eliminado', 'El lugar ha sido eliminado.', 'success');
            } else {
              Swal.fire('Error', data.message, 'error');
            }
          })
          .catch(error => {
            Swal.fire('Error', 'Hubo un problema al eliminar el lugar.', 'error');
          });
        }
    });
  }
</script>

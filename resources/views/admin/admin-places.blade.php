<?php
/**
 * @var \App\Models\Place[] $categoriasLugares
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
            <h1 class="h3 fw-bold">Administrar lugares</h1>
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
        <ul class="nav nav-tabs" id="adminTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="places-tab" data-bs-toggle="tab" data-bs-target="#places" type="button" role="tab" aria-controls="places" aria-selected="true">Lugares</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categories" type="button" role="tab" aria-controls="categories" aria-selected="false">Categorías</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="estadistics-tab" data-bs-toggle="tab" data-bs-target="#estadistics" type="button" role="tab" aria-controls="estadistics" aria-selected="false">Estadísticas</button>
          </li>
        </ul>
        <div class="tab-content" id="adminTabContent">
          <div class="tab-pane fade show active" id="places" role="tabpanel" aria-labelledby="places-tab">
            <h3 class="mt-3">Administrar Lugares</h3>
            <!-- Contenido de administración de lugares -->
            <div class="row">
              <div class="col-12 col-lg-3">
                <form action="{{ route('addPlaceForm') }}" method="GET">
                  <button type="submit" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white mb-3 fw-semibold">Agregar lugar</button>
                </form>
              </div>
            </div>
            <div class="col-12 ">
              <select id="categorySelect" class="form-select mb-3" aria-label="Select Category">
                <option >Selecciona una categoría</option>
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
          <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
            <h3 class="mt-3">Administrar Categorías</h3>
            <!-- Contenido de administración de categorías -->
            <div class="row">
              <div class="col-12 col-lg-3">
                <button type="button" class="form-control btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white mb-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                  Nueva categoría
                </button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>

                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="categoriesTableBody">
                  <!-- Categorías se cargarán aquí dinámicamente -->
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="estadistics" role="tabpanel" aria-labelledby="estadistics-tab">
            <h3 class="mt-3">Cantidad de lugares por categoría</h3>
            <!-- Contenido de administración de categorías -->
            <div class="row">
              <div class="col-12 col-lg-3">
                  <div style="width: 1200px; height: 400px;" >
                    <canvas id="cuadroCategorias"></canvas>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Modal Agregar Lugar -->
      <div class="modal fade" id="addPlaceModal" tabindex="-1" aria-labelledby="addPlaceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addPlaceModalLabel">Agregar Lugar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="addPlaceForm">
                <!-- Formulario para agregar lugar -->
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Agregar Categoría -->
      <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addCategoryModalLabel">Agregar Categoría</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form id="addCategoryForm" action="{{route('addCategorieAction')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="categoryName" class="form-label h5">Nombre de la Categoría</label>
                  <input type="text" class="form-control" id="categoryName" name="name">
                </div>
                <div class="mb-3">
                  <label for="categoryImage" class="form-label h5">Imagen</label>
                  <input type="file" class="form-control" id="categoryImage" name="image_cat" accept="image/*">
                </div>
                <div class="mb-3">
                  <label for="imageDescription" class="form-label h5">Descripción de la Imagen</label>
                  <input type="text" class="form-control" id="imageDescription" name="alt_img_cat">
                </div>
                <button type="submit" id="btnCategoriaAction" class="btn rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white mb-3 fw-semibold">Agregar Categoría</button>
              </form>
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

<script>

  document.addEventListener('DOMContentLoaded', function() {
    let ctx = document.getElementById('cuadroCategorias').getContext('2d');
      let categories = @json(array_keys($categoriasLugares));
      let counts = @json(array_values($categoriasLugares));

      let cuadroCategorias = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: categories,
              datasets: [{
                  label: 'Lugares',
                  data: counts,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1
              }]
          },
          options: {
              responsive: true,
              scales: {
                  y: {
                      beginAtZero: true,
                      ticks: {
                        precision: 0 // Configura la precisión a 0 para mostrar números enteros
                      }
                  }
              },
              plugins: {
                title: {
                    display: true,
                    font: {
                        family: 'Montserrat', // Cambia la familia de fuentes aquí
                        size: 32, // Cambia el tamaño de la fuente aquí
                        weight: '500' // Opcional: cambia el peso de la fuente (por ejemplo, 'bold', 'normal', etc.)
                    }
                },
        }
          }
      });
    document.getElementById('addCategoryModal').addEventListener('hidden.bs.modal', function () {
      // Reset form when modal is hidden
      document.getElementById('addCategoryForm').reset();
      document.getElementById('addCategoryForm').action = '{{route('addCategorieAction')}}';
      document.getElementById('addCategoryModalLabel').innerText = 'Agregar categoría';
      document.getElementById('btnCategoriaAction').innerText = 'Agregar categoría';
    });
    document.getElementById('categories-tab').addEventListener('shown.bs.tab', function (event) {
      loadCategories();
    });
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
                  <a href="/lugares/${place.place_id}/editar" class="btn btn-sm bg-naranja-principal btn-naranja-hover text-white fw-semibold rounded-pill">Editar</a>
                  <button onclick="borrarLugar(${place.place_id}, '${place.name}')" class="btn btn-sm bg-rojo btn-rojo-hover text-white fw-semibold rounded-pill">Eliminar</button>
                  ${category_id === 'pending' ? `<button onclick="autorizarLugar(${place.place_id})" class="btn btn-sm bg-verde-principal btn-verde-hover text-white fw-semibold rounded-pill">Autorizar</button>` : ''}
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

  function loadCategories() {
  fetch(`/administrar/categorias`)
    .then(response => response.json())
    .then(data => {
      const tbody = document.getElementById('categoriesTableBody');
      tbody.innerHTML = '';
      data.forEach(category => {
        const row = document.createElement('tr');
        const imageContent = category.image_cat ? `<img src="/storage/${category.image_cat}" alt="${category.name}" class="img-fluid" height: 15px;">` : 'ninguno';

        row.innerHTML = `
          <td>${category.name}</td>
          <td>${imageContent}</td>
          <td>${category.alt_img_cat}</td>
          <td>
            <button class="btn btn-sm bg-naranja-principal btn-naranja-hover text-white fw-semibold rounded-pill" onclick="editCategory(${category.category_id})">Editar</button>
          </td>
        `;
        tbody.appendChild(row);
      });
    });
}


  function editCategory(id) {
    fetch(`/categorias/${id}/editar`, {
        method: 'get',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Content-Type': 'application/json',
        }
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        document.getElementById('categoryName').value = data[0].name;
        document.getElementById('imageDescription').value = data[0].alt_img_cat;
        // No podemos previsualizar archivos cargados (icon e imagen), solo podemos cambiarlos.

        const form = document.getElementById('addCategoryForm');
        form.action = `/categorias/${id}/editar`;
        const modal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
        document.getElementById('addCategoryModalLabel').innerText = 'Modificar categoría';
        document.getElementById('btnCategoriaAction').innerText = 'Modificar categoría';

        modal.show();
      });
  }
  function autorizarLugar(id) {
    Swal.fire({
        title: '¿Estás seguro que querés autorizar este lugar?',
        text: 'Este lugar será autorizado y visible para todos.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#13BA41',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Autorizar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`/lugares/${id}/autorizar`, {
                method: 'post',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(data => {
                console.log(data);
                if (data.status == 200) {
                    // Actualizar la fila de la tabla
                    document.getElementById(`placeRow${id}`).remove();
                    Swal.fire('Autorizado', 'El lugar ha sido autorizado. Recordá autorizar también la reseña vinculada al mismo.', 'success');
                } else {
                    Swal.fire('Error', data.message, 'error');
                }
            })
            .catch(error => {
                Swal.fire('Error', 'Hubo un problema al autorizar el lugar.', 'error');
            });
        }
    });
  }
</script>

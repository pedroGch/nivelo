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
            <h2 class="h3 fw-bold">Administrar Usuarios</h2>
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
            <button class="nav-link active" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="true">Usuarios</button>
          </li>
          {{-- <li class="nav-item" role="presentation">
            <button class="nav-link" id="estadistics-tab" data-bs-toggle="tab" data-bs-target="#estadistics" type="button" role="tab" aria-controls="estadistics" aria-selected="false">Estadísticas</button>
          </li> --}}
        </ul>
        <div class="tab-content" id="adminTabContent">
          <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
            <h3 class="mt-3">Administrar Usuarios</h3>
            <div class="col-12 ">
              <div class="col-12 mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Buscar por nombre, ID o estado de bloqueo">
              </div>
              <div class="col-12">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>User name</th>
                      <th>Email</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody id="usersTableBody">
                    @foreach ($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        @if ($user->status)
                          <td>Activo</td>
                        @else
                          <td>Bloqueado</td>
                        @endif
                        <td>
                          <input class="form-check-input" type="checkbox" @checked($user->status) onchange="toggleBlock({{$user->id}})">
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          {{-- <div class="tab-pane fade" id="estadistics" role="tabpanel" aria-labelledby="estadistics-tab">
            <h3 class="mt-3">Estadísticas de usuarios</h3>

          </div> --}}
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
    document.getElementById('searchInput').addEventListener('input', function() {
      filterUsers(this.value);
    });
  })
  function filterUsers(query) {
    const rows = Array.from(document.getElementById('usersTableBody').querySelectorAll('tr'));
    rows.forEach(row => {
      const cells = Array.from(row.querySelectorAll('td'));
      const matches = cells.some(cell => cell.textContent.toLowerCase().includes(query.toLowerCase()));
      row.style.display = matches ? '' : 'none';
    });
  }
  function toggleBlock(userId) {
    fetch(`/administrar/usuarios/${userId}/bloquear-desbloquear`, {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Content-Type': 'application/json'
      }
    }).then(response => {
      if (response.ok) {
        Swal.fire('Autorizado', 'El estado del usuario cambio correctamente.', 'success');
      } else {
        alert('Error al cambiar el estado de bloqueo');
      }
    });
  }

</script>

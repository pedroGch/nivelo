<div class="bg-gris-claro d-flex flex-column min-vh-40">
   <div class="container container-fluid py-2 align-items-center">
     <div class="row py-4 py-lg-5">
       <div class="col-12 col-md-3 col-lg-4 d-flex justify-content-center justify-content-lg-start">
        <img src="{{ url('/img/logo_footer.png') }}" alt="logo de nivelo" height="180px"></a>
       </div>
       <div class="col-12 col-md-5 col-lg-4">
        <h2 class="h5 pt-2 pb-2 pt-lg-0">Suscribite para ser parte del lanzamiento</h2>
        <form id="subscription-form" onsubmit="event.preventDefault(); subscribe();">
          @csrf
          <input
            type="text"
            name="name-subscriber"
            class="form-control mb-3
            @error('name-subscriber')
            is-invalid
            @enderror"
            id="name-subscriber"
            placeholder="Nombre"
            value="{{ old('name-subscriber') }}">
          @error('name-subscriber')
          <p class="text-danger" id="error-name-subscriber">{{ $message }}</p>
          @enderror
          <input
            type="email"
            name="email-subscriber"
            class="form-control mb-3
            @error('email-subscriber')
            is-invalid
            @enderror"
            id="email-subscriber"
            placeholder="Email"
            value="{{ old('email-subscriber') }}">
          @error('email-subscriber')
          <p class="text-danger" id="error-email-subscriber">{{ $message }}</p>
          @enderror
          <button class="btn w-100 rounded-pill p-3 shadow-sm bg-verde-principal btn-verde-hover text-white" type="submit">
            Suscribirme
          </button>
        </form>

       </div>
       <div class="col-12 col-md-4 px-3 px-md-0">
        <ul class="navbar-nav">
          <li class="pe-2 pt-2 nav-item text-center  text-md-end">
            <b>info@nivelo.com.ar</b>
          </li>
          <li class="pe-2 pt-2 nav-item text-center text-md-end">
            <a class="nav-link underlined-hover50 fw-bold" aria-disabled="true" href="{{ route('about') }}">Acerca de nivelo</a>
          </li>
          <li class="pe-2 pt-2 nav-item text-center text-md-end">
            <a class="nav-link underlined-hover50 fw-bold" aria-disabled="true" href="{{ route('terms') }}">Términos y condiciones</a>
          </li>
        </ul>
       </div>
       <div>
        <hr>
        <p>© 2024 Nivelo. Todos los derechos reservados.</p>
       </div>
     </div>
   </div>

</div>

<script>
 function subscribe() {
  const name = document.getElementById('name-subscriber').value;
  const email = document.getElementById('email-subscriber').value;

  Swal.fire({
    title: '¿Querés suscribirte?',
    text: "Sumate a la comunidad #YoNivelo y recibí todas las novedades en tu correo.",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#13BA41',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, suscribirme',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch('{{ route('subscribeAction') }}', {
          method: 'post',
          headers: {
             'X-Requested-With': 'XMLHttpRequest',
             'Content-Type': 'application/json',
             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({ 'name-subscriber': name, 'email-subscriber': email })
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        Swal.fire(
          '¡Perfecto!',
          data.message,
          'success'
        );
      })
      .catch(error => {
        Swal.fire(
          'Error',
          'Hubo un problema con la suscripción. Intenta nuevamente.',
          'error'
        );
      });
    }
  });
}

</script>


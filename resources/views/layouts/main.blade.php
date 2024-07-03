<!-- template madre -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="<?= url('css/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= url('css/app.css')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">
    <title> @yield('title') :: nivelo</title>
    @vite(['resources/js/app.js'])
</head>

<body>
  <header>
    <h1 class="d-none">Nivelo</h1>
    @yield('header')
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    @yield('footer')
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', function() {
        navigator.serviceWorker.register('./firebase-messaging-sw.js').then(function(registration) {
          console.log('ServiceWorker registrado con éxito:', registration);
        }, function(error) {
          console.log('Registro de ServiceWorker fallido:', error);
        });
      });
    }

    let deferredPrompt; // Variable global para guardar el evento

    window.addEventListener('beforeinstallprompt', (e) => {
      // Prevent Chrome 67 and earlier from automatically showing the prompt
      e.preventDefault();
      // Save the event so it can be triggered later.
      deferredPrompt = e;
      console.log('Evento beforeinstallprompt capturado');
      document.getElementById('installButton').style.display = 'block'; // Mostrar el botón de instalación
    });

    // Función para el botón que dispara el pop-up de instalación
    function instalarApp() {
      if (deferredPrompt) {
        deferredPrompt.prompt(); // Mostrar el prompt de instalación
        deferredPrompt.userChoice.then((choiceResult) => {
          if (choiceResult.outcome === 'accepted') {
            console.log('El usuario aceptó instalar la app');
          } else {
            console.log('El usuario no aceptó instalar la app');
          }
          deferredPrompt = null; // Resetear la variable después de usarla
        }).catch((error) => {
          console.error('Error durante el prompt de instalación:', error);
        });
      } else {
        console.log('No se ha capturado el evento beforeinstallprompt');
      }
    }
  </script>
</body>
</html>
</body>

</html>



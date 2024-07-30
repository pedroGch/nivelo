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
      <!-- Scripts -->
      @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div>
          {{ $slot }}
        </div>
    </body>
</html>

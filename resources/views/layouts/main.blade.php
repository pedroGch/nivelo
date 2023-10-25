<!-- template madre -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> @yield('title') :: Nivelo</title>
</head>

<body>
    <div id="app" class="min-h-screen flex flex-col">

        <!-- Main navigation container -->
<nav>

</nav>
  <main>
    <!-- espacio cedido a templates anexos -->
    @yield('content')
  </main>
</body>

</html>



<!DOCTYPE html>
<html>
<head>
    <title>Nueva Notificación</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .header {
            background-color: #5A3E8C; /* Usa el color exacto que necesitas para .bg-violeta-principal */
            padding: 10px 0;
            text-align: center;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.8em;
            color: #555;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <img src="https://www.nivelo.com.ar/img/logo_h_blanco.png" alt="Logo Nivelo" class="img-fluid">
        </div>
    </header>
    <div class="container content">
        <h1>Hola, {{ $notification->user->name }}</h1>
        <p>¡Tenés una nueva notificación!</p>
        <p>Para saber más detalles ingresá a tu app de 'nivelo', o desde cualquier navegador entrando a <a href="http://www.nivelo.com.ar">www.nivelo.com.ar</a>.</p>
        <p>Gracias por usar nuestra aplicación.</p>

        <p>Equipo de <b>nivelo</b></p>
    </div>
    <div class="container footer">
        <p><b>© 2024 Nivelo.</b> Todos los derechos reservados.</p>
    </div>
</body>
</html>

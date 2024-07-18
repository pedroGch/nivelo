<!DOCTYPE html>
<html>
<head>
    <title>¡Se ha creado tu cuenta en <b>nivelo</b>!</title>
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
        <h1>Hola, {{ $user->name }}</h1>
        <p>¡Bienvenido a <b>nivelo</b>! Estamos encantados de tenerte con nosotros.</p>
        <p>Ya podés ingresar a tu app de 'nivelo', o desde cualquier navegador entrando a <a href="http://www.nivelo.com.ar">www.nivelo.com.ar</a>.</p>
        <p>Gracias por sumarte a la comunidad #YoNivelo.</p>

        <p>Equipo de <b>nivelo</b></p>
    </div>
    <div class="container footer">
        <p><b>© 2024 nivelo.</b> Todos los derechos reservados.</p>
    </div>
</body>
</html>

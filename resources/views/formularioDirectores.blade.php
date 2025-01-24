<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir Directores - DWSStreaming</title>
    <link href="{{ asset('formulario.css') }}" rel="stylesheet">
    @include('head')
</head>
<body>
    <h2>Añadir directores</h2>
    <p>Introduzca los datos del director</p>

    <form action="{{ route('guardarDirectores') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        <br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required>
        <br>
        <label for="dni">DNI:</label>
        <input type="text" id="dni" name="dni" required>
        <br>
        <br>
        <button type="submit">Añadir director</button>
    </form>
</body>
</html>

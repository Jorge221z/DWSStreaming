<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo actores - DWW Streaming</title>
    <link href="{{ asset('tabla.css') }}" rel="stylesheet">
    @include('head')
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($elenco as $actor)
                <tr>
                    <td>{{ $actor->nombre }}</td>
                    <td>{{ $actor->apellidos }}</td>
                    <td>{{ $actor->dni }}</td>
                    <td>{{ $actor->tipo }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    @if(session('isAdmin'))
    <a  class="bot" class="btn btn-primary" href="{{ route('formularioElenco') }}" role="button">Añadir actor</a>
    @else
    <a class="bot" class="btn btn-primary" href="{{ route('formulario') }}" role="button" style="border: 3px solid black">Acceso admins</a>
    @endif
    <br><br><br>

    <a  class="bot" class="btn btn-primary" href="{{ route('salir') }}" role="button">Ir a inicio</a>
    <a  class="bot" class="btn btn-primary" href="{{ route('catalogo') }}" role="button">Ir a catalogo</a>

</body>
</html>

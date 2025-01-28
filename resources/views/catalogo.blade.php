<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo - DWW Streaming</title>
    <link href="{{ asset('tabla.css') }}" rel="stylesheet">
    @include('head')
</head>
<body>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Título</th>
                <th>Director</th>
                <th>Tipo</th>
                <th>Edad Recomendada</th>
                <th>ISCR</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peliculas->zip($isrc) as $peli)
                <tr>
                    <td>{{ $peli[0]->titulo }}</td>
                    <td>
                        @if ($peli[0]->director)   <!--caso en el que se añadan actores pero no director a una peli-->
                        {{ $peli[0]->director->nombre }} {{ $peli[0]->director->apellidos }}</td>
                        @else
                       <em>No especificado</em>
                        @endif
                    </td>
                    <td>{{ $peli[0]->tipo }}</td>
                    <td>{{ $peli[0]->edad }}</td>
                    <td>{{ $peli[1]->isrc }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    @if (Auth::guard('sanctum')->check())
    <div style="color: green; text-align: center; font-size: 18px; font-weight: bold;">
        {{ session('success') }}
    </div>
    @endif

    <br>
    <br>
    @if(Auth::guard('sanctum')->check()) <!--Metodo de autenticacion por tokens con sanctum-->
    <a style="font-weight: bold; color:forestgreen; font-size:22px; ">Admin confirmado: </a><br>
    <a class="bot" href="{{ route('formularioPelis') }}">Añadir Película</a>
    <a class="bot" href="{{ route('formularioDirectores') }}">Añadir Director</a>
    <a class="bot" href="{{ route('formularioElenco') }}">Añadir Actor</a>
    <a class="bot" href="{{ route('logout') }}" style="border: 3px solid black">Cerrar sesión</a>
    @else
    <a class="bot" class="btn btn-primary" href="{{ route('formulario') }}" role="button" style="border: 3px solid black">Acceso admins</a>
    @endif
    <br><br><br>

    <a class="bot" class="btn btn-primary" href="{{ route('catalogoDirectores') }}" role="button">Lista de directores</a><br>
    <a class="bot" class="btn btn-primary" href="{{ route('catalogoElenco') }}" role="button">Lista de actores</a><br>
    <a  class="bot" class="btn btn-primary" href="{{ route('salir') }}" role="button">Volver a inicio</a>
</body>
</html>

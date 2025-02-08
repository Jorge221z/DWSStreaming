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
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.surname') }}</th>
                <th>{{ __('messages.DNI') }}</th>
                <th>{{ __('messages.type') }}</th>
                <th>{{ __('messages.aparitions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($elenco as $actor)
                <tr>
                    <td>{{ $actor->nombre }}</td>
                    <td>{{ $actor->apellidos }}</td>
                    <td>{{ $actor->dni }}</td>
                    <td>{{ $actor->tipo }}</td>
                    <!-- Nueva columna para películas -->
                    <td>
                        @if ($actor->peliculas->isNotEmpty())
                            @foreach ($actor->peliculas as $pelicula)
                                {{ $pelicula->titulo }}@if (!$loop->last),@endif
                            @endforeach
                        @else
                        {{ __('messages.without_movies') }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (Auth::guard('sanctum')->check())
        <div style="color: green; text-align: center; font-size: 18px; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    <br><br>
    @if (Auth::guard('sanctum')->check())
        <!--Metodo de autenticacion por tokens con sanctum-->
        <a style="font-weight: bold; color:forestgreen; font-size:22px; ">{{ __('messages.admin_confirmed') }}: </a><br>
        <a class="bot" class="btn btn-primary" href="{{ route('formularioElenco') }}" role="button">{{ __('messages.add_actor') }}</a>
    @else
        <a class="bot" class="btn btn-primary" href="{{ route('formulario') }}" role="button"
            style="border: 3px solid black">{{ __('messages.admin_access') }}</a>
    @endif
    <br><br>

    @include('lang')

    <a class="bot" class="btn btn-primary" href="{{ route('salir') }}" role="button">{{ __('messages.back_home') }}</a>
    <a class="bot" class="btn btn-primary" href="{{ route('catalogo') }}" role="button">{{ __('messages.list_movies') }}</a>

</body>

</html>

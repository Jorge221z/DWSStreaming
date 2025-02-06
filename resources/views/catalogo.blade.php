<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catálogo - DWW Streaming</title>
    <link href="{{ asset('tabla.css') }}" rel="stylesheet">
    @include('head')
    <style>

    </style>
</head>

<body>
    <table border="1" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>{{ __('messages.title') }}</th>
                <th>{{ __('messages.director') }}</th>
                <th>{{ __('messages.type') }}</th>
                <th>{{ __('messages.age') }}</th>
                <th>{{ __('messages.isrc') }}</th>
                <th>{{ __('messages.trailer') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peliculas->zip($isrc) as $peli)
                <tr>
                    <td>{{ $peli[0]->titulo }}</td>
                    <td>
                        @if ($peli[0]->director)
                            <!--caso en el que se añadan actores pero no director a una peli-->
                            {{ $peli[0]->director->nombre }} {{ $peli[0]->director->apellidos }}
                    </td>
                @else
                    <em>{{ __('messages.not_specified') }}</em>
            @endif
            </td>
            <td>{{ $peli[0]->tipo }}</td>
            <td>{{ $peli[0]->edad }}</td>
            <td>{{ $peli[1]->isrc }}</td>
            <td>
                @if ($peli[0]->trailer_url)
                    <!-- Verifica si hay URL -->
                    {!! $peli[0]->video !!} <!-- Usa el accesor de modelo.php(getVideoAttribute) -->
                @else
                    <em>{{ __('messages.video_not_available') }}</em>
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

    <br>
    <br>
    @if (Auth::guard('sanctum')->check())
        <!--Metodo de autenticacion por tokens con sanctum-->
        <a style="font-weight: bold; color:forestgreen; font-size:22px; ">{{ __('messages.admin_confirmed') }}: </a><br>
        <a class="bot" href="{{ route('formularioPelis') }}">{{ __('messages.add_movie') }}</a>
        <a class="bot" href="{{ route('formularioDirectores') }}">{{ __('messages.add_director') }}</a>
        <a class="bot" href="{{ route('formularioElenco') }}">{{ __('messages.add_actor') }}</a>
        <a class="bot" href="{{ route('logout') }}" style="border: 3px solid black">{{ __('messages.logout') }}</a>
    @else
        <a class="bot" class="btn btn-primary" href="{{ route('formulario') }}" role="button"
            style="border: 3px solid black">{{ __('messages.admin_access') }}</a>
    @endif
    <br><br>

    @include('lang')

    <a class="bot" class="btn btn-primary" href="{{ route('catalogoDirectores') }}" role="button">{{ __('messages.list_directors') }}</a><br>

    <a class="bot" class="btn btn-primary" href="{{ route('catalogoElenco') }}" role="button">{{ __('messages.list_actors') }}</a><br>

    <a class="bot" class="btn btn-primary" href="{{ route('salir') }}" role="button">{{ __('messages.back_home') }}</a>
</body>

</html>

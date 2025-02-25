<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DWS Streaming</title>
    <link href="{{ asset('inicio.css') }}" rel="stylesheet">
    @include('head')
</head>

<body>
    <h1>DWS Streaming</h1>
    <p>Elija una opcion del menú</p>

    @include('nav')

    @if ($errors->any()) {{-- Receptor de erros de formulario(credenciales incorrectas) --}}
    <div style="color: red; display: flex; justify-content: center; align-items: center; flex-direction: column; height: 20vh; text-align: center;">
        <ul style="margin: 0; padding: 0;">
            @foreach ($errors->all() as $error)
                <li style="list-style: none; font-size: 23px; font-weight: bold;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!localStorage.getItem('firstVisit')) {
            localStorage.setItem('firstVisit', 'true');
            document.cookie.split(";").forEach(function(c) {
                document.cookie = c.trim().split('=')[0] + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/";
            });
        }
    });
</script>
</body>
</html>


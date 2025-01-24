<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceso admin - DWSStreaming</title>
    <style>
        .bot {
            text-decoration: none;
            font-size: 18px;
            border: solid 1px rgb(0, 0, 0);
            border-radius: 5px;
            background-color: cornflowerblue;
            color: black;
            margin: 10px;
            padding: 8px 12px;
            display: inline-block;
        }
    </style>
    <link href="{{ asset('formulario.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @include('head')
</head>

<body>
    <h2>Acceso como administrador</h2>
    <p>Introduzca sus datos</p>

    <form action="{{ route('validar') }}" method="POST">
        @csrf
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="{{ old('usuario') }}" required>
        @error('usuario')
            <div style="color: red; font-size:21px; font-weight:bold;">{{ $message }}</div>
        @enderror
        <br>
        <label for="contraseña">Contraseña:</label>
        <div style="position: relative; display: inline-block; width: 100%;">
            <input type="password" id="contraseña" name="contraseña" required
                style="padding-right: 40px; width: calc(100% - 40px);">
            <span id="togglePassword"
                style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                <img id="eyeIcon" src="{{ asset('images/ojo.png') }}" alt="Ver Contraseña"
                    style="width: 20px; height: 20px;">
            </span>
        </div>
        @error('contraseña')
            <div style="color: red; font-size: 25px; font-weight: bold;">{{ $message }}</div>
        @enderror
        <br>
        <br>
        <button class="bot" type="submit">Iniciar sesión</button>
    </form>
</body>

</html>

<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('contraseña');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', () => {
        // Cambia entre password y text
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // Cambia la imagen
        if (type === 'password') {
            eyeIcon.src = "{{ asset('images/ojo.png') }}"; // Imagen de ojo tachado
        } else {
            eyeIcon.src = "{{ asset('images/ojo-tachado.png') }}"; // Imagen de ojo abierto
        }
    });
</script>

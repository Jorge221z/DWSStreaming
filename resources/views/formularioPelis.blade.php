<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Añadir Peliculas - DWSStreaming</title>
    <link href="{{ asset('formulario.css') }}" rel="stylesheet">
    @include('head')
</head>
<body>
    <h2>Añadir película</h2>
    <p>Introduzca los datos de la película</p>

    <form action="{{ route('guardarPelis') }}" method="POST">
        @csrf
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        <br>
        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required>
        <br>
        <label for="edad">Edad recomendada:</label>
        <input type="text" id="edad" name="edad" required>
        <br>
        <label for="isrc">ISRC:</label>
        <input type="text" id="isrc" name="isrc" required>
        <br>

        <!-- Opción para seleccionar director -->
        <label for="director_id">Seleccionar director:</label>
        <input type="radio" id="director_option" name="selection" value="director" onclick="toggleSelection()" checked>
        <br>

        <select id="director_id" name="director_id">
            <option value="" disabled selected>Seleccione un director</option>
            @foreach ($directores as $director)
                <option value="{{ $director->id }}">{{ $director->nombre }} {{ $director->apellidos }}</option>
            @endforeach
        </select>
        <br>

        <!-- Opción para seleccionar actores -->
        <label for="elenco_option">Seleccionar elenco (actores/actrices):</label>
        <input type="radio" id="elenco_option" name="selection" value="elenco" onclick="toggleSelection()">
        <br>

        <select id="elenco" name="elenco[]" multiple>
            <option value="" disabled selected>Seleccione actores</option>
            @foreach ($elenco as $actor)
                <option value="{{ $actor->id }}">{{ $actor->nombre }} {{ $actor->apellidos }}</option>
            @endforeach
        </select>
        <br>

        <button type="submit">Añadir película</button>
    </form>

    <script>
        // Mostrar u ocultar los campos según la opción seleccionada
        function toggleSelection() {
            const directorSelect = document.getElementById('director_id');
            const elencoSelect = document.getElementById('elenco');
            if (document.getElementById('director_option').checked) {
                directorSelect.style.display = 'block';
                elencoSelect.style.display = 'none';
                elencoSelect.selectedIndex = 0;
            } else {
                directorSelect.style.display = 'none';
                elencoSelect.style.display = 'block';
                directorSelect.selectedIndex = 0;
            }
        }

        // Inicializar el formulario mostrando solo el director
        window.onload = function() {
            toggleSelection();
        };
    </script>
</body>
</html>

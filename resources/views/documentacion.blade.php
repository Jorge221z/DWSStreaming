@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="h3 mb-0">📌 DWSStreaming - Documentación</h1>
        </div>

        <div class="card-body">
            <!-- Descripción principal -->
            <section class="mb-5">
                <p class="lead">Esta aplicación web permite almacenar y visualizar películas, además de relacionarlas con sus respectivos directores y actores. Entre sus principales funciones destacan la reproducción de videos de YouTube directamente desde su URL en la vista principal, la autenticación mediante tokens y la opción de elegir entre Español e Inglés como idioma de la aplicación.</p>
            </section>

            <!-- Requisitos -->
            <section class="mb-5">
                <h2 class="h4 mb-3 text-primary">🚀 Requisitos</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">PHP >= 8.1</li>
                    <li class="list-group-item">Composer</li>
                    <li class="list-group-item">Laravel >= 10</li>
                    <li class="list-group-item">MySQL</li>
                </ul>
            </section>

            <!-- Instalación -->
            <section class="mb-5">
                <h2 class="h4 mb-3 text-primary">📥 Instalación</h2>
                <div class="bg-light p-3 rounded">
                    <ol class="mb-0">
                        <li class="mb-2">Instalar dependencias de Composer:
                            <pre class="bg-dark text-white p-2 rounded"><code>composer install</code></pre>
                        </li>
                        <li class="mb-2">Configurar la base de datos:
                            <ul>
                                <li>Crea una base de datos vacía con el mismo nombre que el especificado en el archivo <code>.env</code> ('peliculas').</li>
                                <li>Asegúrate de que los datos de conexión en <code>.env</code> sean correctos.</li>
                            </ul>
                        </li>
                        <li class="mb-2">Regenerar clave de aplicación(si fuese necesario):
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan key:generate</code></pre>
                        </li>
                    </ol>
                </div>
            </section>

            <!-- Migraciones y seeders -->
            <section class="mb-5">
                <h2 class="h4 mb-3 text-primary">🔄 Migraciones y seeders</h2>
                <div class="bg-light p-3 rounded">
                    <ol class="mb-0">
                        <li class="mb-2">Generar migraciones:
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan migrate</code></pre>
                        </li>
                        <li>Cargar datos iniciales (seeders):
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan db:seed</code></pre>
                            <p>Este seed nos creará el primer usuario admin</p>
                            <p>Credenciales de acceso-> name: 'admin', password: '1234'</p>
                            <p>Y además un primer registro para todas las tablas.</p>
                        </li>
                    </ol>
                </div>
            </section>

            <!-- Uso, inicio del servidor y rutas -->
            <section class="mb-5">
                <h2 class="h4 mb-3 text-primary">🚀 Uso, inicio del servidor y rutas</h2>
                <div class="bg-light p-3 rounded">
                    <ol class="mb-0">
                        <li class="mb-2">Iniciar el servidor:
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan serve</code></pre>
                        </li>
                        <li>Rutas más relevantes:
                            <ul>
                                <li><code>/inicio [GET]</code></li>
                                <li><code>/catalogo [GET]</code></li>
                                <li><code>/formulario [GET]</code></li>
                            </ul>
                            <p class="mb-0"><strong>Nota:</strong> Puedes ver todas las rutas con el comando <code>php artisan route:list</code>.</p>
                        </li>
                    </ol>
                </div>
            </section>

            <!-- Estructura del proyecto -->
            <section class="mb-5">
                <h2 class="h4 mb-3 text-primary">📂 Estructura del proyecto (directorios)</h2>
                <div class="bg-light p-3 rounded">
                    <ul class="mb-0">
                        <li><code>app/</code> - Lógica del backend (controladores) y modelos</li>
                        <li><code>routes/</code> - Definición de rutas (<code>web.php</code>)</li>
                        <li><code>database/</code> - Migraciones y seeders</li>
                        <li><code>resources/</code> - Vistas y assets</li>
                    </ul>
                </div>
            </section>

            <!-- Endpoints WEB -->
            <section class="mb-5">
                <h2 class="h4 mb-3 text-primary">🔗 Endpoints WEB</h2>

                <!-- Endpoints Públicos -->
                <h3 class="h5 mb-3">Endpoints Públicos</h3>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Método</th>
                                <th>Ruta</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GET</td>
                                <td>/</td>
                                <td>Muestra la vista principal (inicio).</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/inicio</td>
                                <td>Alias de <code>/</code>.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/catalogo</td>
                                <td>Recupera todas las películas y registros ISRC para mostrarlas en el catálogo.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/catalogoDirectores</td>
                                <td>Muestra el catálogo de directores junto con sus películas.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/catalogoElenco</td>
                                <td>Muestra el catálogo del elenco (actores/actrices) junto con sus películas.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/formulario</td>
                                <td>Muestra el formulario de login.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/salir</td>
                                <td>Cierra la sesión (o redirige a la página de inicio sin realizar logout explícito).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Endpoints Protegidos -->
                <h3 class="h5 mb-3">Endpoints Protegidos (Requieren Autenticación con Sanctum)</h3>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Método</th>
                                <th>Ruta</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GET</td>
                                <td>/formularioPelis</td>
                                <td>Muestra el formulario para crear o editar películas.</td>
                            </tr>
                            <tr>
                                <td>GET|POST</td>
                                <td>/guardarPelis</td>
                                <td>Guarda una nueva película junto con su registro ISRC y, opcionalmente, la relación con director y elenco.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/formularioDirectores</td>
                                <td>Muestra el formulario para añadir un nuevo director.</td>
                            </tr>
                            <tr>
                                <td>GET|POST</td>
                                <td>/guardarDirectores</td>
                                <td>Guarda un nuevo director.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/formularioElenco</td>
                                <td>Muestra el formulario para agregar un nuevo actor/actriz.</td>
                            </tr>
                            <tr>
                                <td>GET|POST</td>
                                <td>/guardarElenco</td>
                                <td>Guarda un actor o actriz en la base de datos.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Endpoints Adicionales -->
                <h3 class="h5 mb-3">Endpoints Adicionales</h3>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Método</th>
                                <th>Ruta</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>GET</td>
                                <td>/lang/{lang}</td>
                                <td>Permite cambiar el idioma de la aplicación.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/logout</td>
                                <td>Cierra la sesión del usuario autenticado.</td>
                            </tr>
                            <tr>
                                <td>GET</td>
                                <td>/documentacion</td>
                                <td>Muestra la página de documentación.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Pruebas -->
            <section class="mb-5">
                <h2 class="h4 mb-3 text-primary">🔍 Pruebas</h2>
                <div class="bg-light p-3 rounded">
                    <p>En este proyecto las pruebas se han llevado a cabo con <strong>PEST3</strong>. Para ejecutar las pruebas, instala la extensión de VSC llamada <strong>BetterPest</strong>. Abre el test que quieras ejecutar, abre la paleta de comandos con <code>Ctrl+Shift+P</code>, luego selecciona <strong>Better Pest Run</strong> y se ejecutará el test.</p>
                </div>
            </section>

            <!-- Mantenimiento -->
            <section class="mb-5">
                <h2 class="h4 mb-3 text-primary">🛠️ Mantenimiento de la aplicación</h2>
                <div class="bg-light p-3 rounded">
                    <p>Para el mantenimiento de DWSStreaming, ejecuta los siguientes comandos en la terminal:</p>
                    <ul class="mb-0">
                        <li>Limpiar caché de aplicación:
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan cache:clear</code></pre>
                        </li>
                        <li>Limpiar caché de rutas:
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan route:clear</code></pre>
                        </li>
                        <li>Limpiar caché de configuración:
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan config:clear</code></pre>
                        </li>
                        <li>Limpiar caché de vistas:
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan view:clear</code></pre>
                        </li>
                        <li>Limpiar caché general:
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan optimize:clear</code></pre>
                        </li>
                        <li>Actualizar dependencias de Composer:
                            <pre class="bg-dark text-white p-2 rounded"><code>composer update</code></pre>
                        </li>
                        <li>Instalar dependencias de Composer:
                            <pre class="bg-dark text-white p-2 rounded"><code>composer install</code></pre>
                        </li>
                        <li>Optimizar la aplicación:
                            <pre class="bg-dark text-white p-2 rounded"><code>php artisan optimize</code></pre>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Contribución -->
            <section>
                <h2 class="h4 mb-3 text-primary">🤝 Contribución</h2>
                <div class="bg-light p-3 rounded">
                    <ol class="mb-0">
                        <li class="mb-2"><strong>Fork y clonación:</strong> Haz fork del repositorio y clónalo localmente.<br>(https://github.com/Jorge221z/DWSStreaming.git)</li>
                        <li class="mb-2"><strong>Rama de trabajo:</strong> Crea una rama nueva con un nombre descriptivo.</li>
                        <li class="mb-2"><strong>Commits:</strong> Realiza commits pequeños y claros, siguiendo los estándares del proyecto.</li>
                        <li class="mb-2"><strong>Pruebas:</strong> Verifica que tu código pase las pruebas y añade más si es necesario.</li>
                        <li class="mb-2"><strong>Pull Request:</strong> Envía el PR con una descripción concisa de los cambios.</li>
                        <li><strong>Revisión:</strong> Responde a comentarios y actualiza tu PR si es necesario.</li>
                    </ol>
                </div>
            </section>
            <br><br>
            <footer style="font-size: 13px; text-align: center;">
                DWSStreaming 2025 - Jorge Muñoz Castillo
            </footer>

        </div>
    </div>
</div>
@endsection

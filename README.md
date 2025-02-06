# 📌 DWSStreaming

Esta aplicación web permite almacenar y visualizar películas, además de relacionarlas con sus respectivos directores y actores. Entre sus principales funciones destacan la reproducción de videos de YouTube directamente desde su URL en la vista principal, la autenticación mediante tokens y la opción de elegir entre Español e Inglés como idioma de la aplicación.

## 🚀 Requisitos

Antes de comenzar, asegúrate de tener instalado:
- PHP >= 8.1
- Composer
- Laravel >= 10 
- MySQL 

## 📥 Instalación

Sigue estos pasos para instalar y configurar el proyecto:

1️⃣ Primero instalaremos las dependencias de composer necesarias en el proyecto con el comando:
    composer install

2️⃣ Configurar la base de datos
    Crea una base de datos vacía con el mismo nombre que el especificado en el archivo .env (por defecto: 'peliculas').
    Asegúrate de que los datos de conexión en .env sean correctos.

5️⃣ Si es necesario, puedes regenerar la clave de la aplicación con:
    php artisan key:generate

6️⃣ Por ultimo debemos arrancar nuestro servidor de laravel con:
    php artisan serve

## 🔄  Migraciones y seeders

1️⃣ Generar migraciones 
    Para generar las tablas en la base de datos ejecutaremos las migraciones con:
    php artisan migrate

2️⃣ Cargar datos iniciales (seeders)
    Para crear el primer usuario administrador y otros datos iniciales ejecutaremos:
    php artisan db:seed

## 🚀 Uso, inicio del servidor y rutas

1️⃣ Por ultimo debemos arrancar nuestro servidor de laravel con:
    php artisan serve

2️⃣ Las rutas mas relevantes son: 
    /inicio[GET], /catalogo[GET] y /formulario[GET]

    Nota: con el comando 'php artisan route:list' podemos verlas todas.

## 📂 Estructura del proyecto(directorios)

-app/ - Lógica del backend(controladores) y modelos
-routes/ - Definición de rutas (web.php)
-database/ - Migraciones y seeders
-resources/ - Vistas y assets

## 🔗 Endpoints WEB

Endpoints Públicos
1. Página de Inicio y Catálogos

    -GET /
    Descripción: Muestra la vista principal (inicio).
    Middleware: web
    Respuesta: Renderiza la vista inicio.

    -GET /inicio
    (Alias de /)
    Descripción: Igual que el endpoint anterior.

    -GET /catalogo
    Descripción: Recupera todas las películas y registros ISRC para mostrarlas en el catálogo.
    Middleware: web
    Acción:
        Obtiene todos los registros de la tabla peliculas y isrc.
        Retorna la vista catalogo con variables peliculas e isrc.

    -GET /catalogoDirectores
    Descripción: Muestra el catálogo de directores junto con sus películas.
    Middleware: web
    Acción:
        Recupera directores con relación peliculas (utilizando with('peliculas')).
        Renderiza la vista catalogoDirectores con la variable directores.

    -GET /catalogoElenco
    Descripción: Muestra el catálogo del elenco (actores/actrices) junto con sus películas.
    Middleware: web
    Acción:
        Recupera el elenco usando with('peliculas').
        Retorna la vista catalogoElenco con la variable elenco.

2. Autenticación y Navegación

    -GET /formulario
    Descripción: Muestra el formulario de login.
    Middleware: web
    Respuesta: Renderiza la vista formulario.

    -GET /salir
    Descripción: Cierra la sesión (o redirige a la página de inicio sin realizar logout explícito).
    Middleware: web
    Acción:
        Redirige a la ruta inicio.

Endpoints Protegidos (Requieren Autenticación con Sanctum)
1. Gestión de Películas

    -GET /formularioPelis
    Descripción: Muestra el formulario para crear o editar películas.
    Middleware: web, auth:sanctum
    Acción:
        Recupera todos los directores y actores del elenco para llenar la tabla correspondiente.
        Retorna la vista formularioPelis con las variables directores y elenco.

    -GET|POST /guardarPelis
    Descripción: Guarda una nueva película junto con su registro ISRC y, opcionalmente, la relación con director y elenco.
    Middleware: web, auth:sanctum
        Acción:
        Crea la película en la tabla peliculas.
        Crea el registro en isrc y asocia la película.
        Actualiza el campo isrc_id en la película.
        Si se envía director_id, se asocia al registro.
        Si se envía elenco, se asocian los actores mediante attach().
        Ejemplo de acción exitosa:
        Redirección a la ruta catalogo con mensaje: "Película añadida correctamente."

2. Gestión de Directores

    -GET /formularioDirectores
    Descripción: Muestra el formulario para añadir un nuevo director.
    Middleware: web, auth:sanctum
    Respuesta: Renderiza la vista formularioDirectores.

    -GET|POST /guardarDirectores
    Descripción: Guarda un nuevo director.
    Middleware: web, auth:sanctum
    Validaciones:
        Acción:
        Crea el director en la base de datos.
        Redirige a catalogoDirectores con mensaje: "Director añadido correctamente."

3. Gestión del Elenco

    GET /formularioElenco
    Descripción: Muestra el formulario para agregar un nuevo actor/actriz.
    Middleware: web, auth:sanctum
    Respuesta: Renderiza la vista formularioElenco.

    GET|POST /guardarElenco
    Descripción: Guarda un actor o actriz en la base de datos.
    Middleware: web, auth:sanctum
        Acción:
        Crea el registro en la tabla elenco.
        Redirige a catalogoElenco con mensaje: "Actor añadido correctamente."

Endpoints Adicionales
1. Cambio de Idioma
    GET /lang/{lang}
    Descripción: Permite cambiar el idioma de la aplicación.
    Parámetros en la URL:
        lang (string (requerido)): Valores permitidos: en o es. (inglés o español)
        Middleware: web
        Acción:
        Verifica que el valor de lang sea válido.
        Guarda el idioma en la sesión (locale).
        Redirige a la página anterior.
        Se apoya en el middleware 'LanguageMiddleware', que transmite esta variable mediante la sesión.

2. Logout

    GET /logout
    Descripción: Cierra la sesión del usuario autenticado.
    Middleware:
        En la ruta protegida se utiliza auth:sanctum (en este caso se asume que el logout del usuario autenticado es requerido).
        Acción:
        Ejecuta el método logout del AuthController para finalizar la sesión.
        Redirige a la ruta /inico.

3. Documentacion
    /documentacion
    Descripcion: Nos muestra la pagiana de documentacion(identica a este archivo)
        
## 🔍 Pruebas

 En este proyecto las pruebas las hemos llevado a cabo con PEST3.
 En concreto para su ejecucion debemos de instalar la extension de VSC llamada BetterPest
 Abrimos el test que queremos ejecutar y abrimos la paleta de comandos con 'Ctrl+Shift+P', luego pulsamos 'Better Pest Run' y se ejecutará el test.

## 🛠️ Mantenimiento de la aplicación

Para el mantenimiento de DWSStreaming puedes seguir estos pasos:

Ejecuta los siguientes comandos en la terminal:
        Caché de aplicación:

-php artisan cache:clear

    Caché de rutas:

-php artisan route:clear

    Caché de configuración:

-php artisan config:clear

    Caché de vistas:
       
-php artisan view:clear

    Caché general:

-php artisan optimize:clear

Actualizar dependencias
    Para actualizar todas las dependencias de composer:

-composer update

Para instalar nuevas dependencias o asegurarte de tener la versión definida en el composer.lock:

-composer install

Otras tareas de mantenimiento

    Optimizar la aplicación:

-php artisan optimize

## 🤝 Contribucion

Fork y clonación: Haz fork del repositorio y clónalo localmente.
(https://github.com/Jorge221z/DWSStreaming.git)

Rama de trabajo: Crea una rama nuevacon un nombre descriptivo.
Commits: Realiza commits pequeños y claros, siguiendo los estándares del proyecto.
Pruebas: Verifica que tu código pase las pruebas y añade mas si es necesario.
Pull Request: Envía el PR con una descripción concisa de los cambios.
Revisión: Responde a comentarios y actualiza tu PR si es necesario.

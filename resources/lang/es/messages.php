<?php

return [
    //vista catalogo.blade.php
    'title' => 'Título',
    'director' => 'Director',
    'type' => 'Tipo',
    'age' => 'Edad Recomendada',
    'isrc' => 'ISRC',
    'trailer' => 'Tráiler YouTube',
    'not_specified' => 'No especificado',
    'video_not_available' => 'Video no disponible',
        //botones
    'admin_confirmed' => 'Admin confirmado',
    'add_movie' => 'Añadir Película',
    'add_director' => 'Añadir Director',
    'add_actor' => 'Añadir Actor',
    'logout' => 'Cerrar sesión',
    'admin_access' => 'Acceso admins',
    'list_directors' => 'Lista de directores',
    'list_actors' => 'Lista de actores',
    'back_home' => 'Volver a inicio',

    //vista catalogoDirectores.blade.php
    'name' => 'Nombre',
    'surname' => 'Apellido',
    'DNI' => 'DNI',
    'movies_directed' => 'Peliculas que dirige',
//botones(se reusa el de admin_confimed, add_director y back_home)//
    'list_movies' => 'Lista de peliculas',

    //vista catalogoElenco.blade.php (reusamos las que podemos)//
    'aparitions' => 'Peliculas en las que aparece',
    'without_movies' => 'Sin peliculas registradas',

     //formulario de login(formulario.blade.php//
     'texto1' => 'Acceso como administrador',
     'texto2' => 'Introduzca sus datos',
     'user' => 'Usuario',
     'password' => 'Contraseña',
     'log_in' => 'Iniciar sesión',

     //mensajes flash de controlador//
     'movie_added' => 'Película añadida correctamente',
     'director_added' => 'Director añadido correctamente',
     'actor_added' => 'Actor añadido correctamente',
];


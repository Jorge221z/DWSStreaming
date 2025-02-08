<?php

return [
        //vista catalogo.blade.php
    'title' => 'Title',
    'director' => 'Director',
    'type' => 'Type',
    'age' => 'Recommended age',
    'isrc' => 'ISRC',
    'trailer' => 'Youtube Trailer',
    'not_specified' => 'Not specified',
    'video_not_available' => 'Video not available',
        //botones
    'admin_confirmed' => 'Confirmed Admin user',
    'add_movie' => 'Add movie',
    'add_director' => 'Add director',
    'add_actor' => 'Add actor',
    'logout' => 'Log out',
    'admin_access' => 'Admin access',
    'list_directors' => 'List of directors',
    'list_actors' => 'List of actors',
    'back_home' => 'Back to home',

    //vista catalogoDirectores.blade.php
    'name' => 'Name',
    'surname' => 'Surname',
    'DNI' => 'ID',
    'movies_directed' => 'Movies he directs',
//botones(se reusa el de admin_confimed, add_director y back_home)//
    'list_movies' => 'List of movies',

    //vista catalogoElenco.blade.php (reusamos las que podemos)//
    'aparitions' => 'Movies in which he appears',
    'without_movies' => 'No registered movies yet',

    //formulario de login(formulario.blade.php//
    //formulario de login(formulario.blade.php//
    'texto1' => 'Access as admin',
    'texto2' => 'Enter your details',
    'user' => 'User',
    'password' => 'Password',
    'log_in' => 'Log in',

    //mensajes flash de controlador//
    'movie_added' => 'Movie added successfully',
    'director_added' => 'Director added successfully',
    'actor_added' => 'Actor added successfully',
];

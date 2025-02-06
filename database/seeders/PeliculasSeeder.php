<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculasSeeder extends Seeder
{
    public function run()
    {
        // Insertar un director
        $directorId = DB::table('director')->insertGetId([
            'nombre' => 'Quentin',
            'apellidos' => 'Tarantino',
            'dni' => '12345678A',
        ]);

        // Insertar un miembro del elenco
        $elencoId = DB::table('elenco')->insertGetId([
            'nombre' => 'Leonardo',
            'apellidos' => 'DiCaprio',
            'dni' => '87654321B',
            'tipo' => 'principal',
        ]);

        // Insertar una película
        $peliculaId = DB::table('peliculas')->insertGetId([
            'titulo' => 'Inception',
            'tipo' => 'Ciencia Ficción',
            'edad' => 12,
            'trailer_url' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
            'isrc_id' => null, // Este valor se actualizará después.
            'director_id' => $directorId,
        ]);

        // Insertar un ISRC
        $isrcId = DB::table('isrc')->insertGetId([
            'isrc' => 'US-ABC12345678',
            'tipo' => 'Película',
            'peliculas_id' => $peliculaId,
        ]);

        // Actualizar la película con el ID del ISRC
        DB::table('peliculas')
            ->where('id', $peliculaId)
            ->update(['isrc_id' => $isrcId]);

        // Insertar en la tabla pivote elenco_peliculas
        DB::table('elenco_peliculas')->insert([
            'pelicula_id' => $peliculaId,
            'elenco_id' => $elencoId,
        ]);
    }
}

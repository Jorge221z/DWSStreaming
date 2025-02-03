<?php

namespace App\Http\Controllers;

use App\Models\Model_DIRECTOR;
use App\Models\Model_ELENCO;
use App\Models\Model_ISRC;
use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\OEmbedUrl;

class Controlador extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }

    public function catalogo()
    {

        $peliculas = Modelo::all(); // Carga todas las películas que haya en la bd//
        $isrc = Model_ISRC::all(); //carga todos los registro de la tabla isrc//
        return view('catalogo', compact('peliculas', 'isrc')); // Envía los datos a la vista
    }

    public function catalogoDirectores()
    {
        $directores = Model_DIRECTOR::with('peliculas')->get();
        return view('catalogoDirectores', compact('directores')); // Envía los datos a la vista
    }

    public function catalogoElenco()
    {
        $elenco = Model_ELENCO::with('peliculas')->get(); // Recupera los datos y carga la relacion
        return view('catalogoElenco', compact('elenco')); // Envía los datos a la vista
    }

    public function formulario()
    {
        return view('formulario');
    }


    public function formularioPelis()
    {
        $directores = Model_DIRECTOR::all();
        $elenco = Model_ELENCO::all();
        return view('formularioPelis', compact('directores', 'elenco'));
    }

    public function guardarPelis(Request $request)
    {
        $request->validate([
            'titulo' => "required|string|max:255",
            'tipo' => "required|string|max:255",
            'edad' => "required|string|max:255",
            'trailer_url' => ['nullable', new OEmbedUrl(['youtube'])], //validacion de regla creadd(OEmbedUrl.php) //
            'isrc' => "required|string|max:255",
            'director_id' => "string|max:255", //quitamos el required para el caso en el que se relaciones actores y no un director con la pelicula que se va a agregar//
        ]);

        // Crear una nueva película en la tabla peliculas//
        $pelicula = Modelo::create([
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'edad' => $request->edad,
            'trailer_url' => $request->trailer_url,
        ]);


        $isrc = Model_ISRC::create([
            'isrc' => $request->isrc,
            'tipo' => $request->tipo,
            'peliculas_id' => $pelicula->id, //asocia la pelicula a la tabla isrc
        ]);

        //le metemos el id del isrc a la tabla peliculas//
        $pelicula->update([
            'isrc_id' => $isrc->id,
        ]);

        if ($request->director_id) {
            $pelicula->update([
                'director_id' => $request->director_id, //lo añado aqui para que esté al final//
            ]);
        }

        // Asociar los actores/actrices a la película (Many-to-Many)
        if ($request->has('elenco')) {
            $pelicula->elenco()->attach($request->elenco);  // Asocia los actores seleccionados
        }


        // Redirigir al catálogo con un mensaje de éxito
        return redirect()->route('catalogo')->with('success', 'Película añadida correctamente.');
    }

    public function formularioDirectores()
    {
        return view('formularioDirectores');
    }

    public function guardarDirectores(Request $request)
    {
        $request->validate([
            'nombre' => "required|string|max:255",
            'apellidos' => "required|string|max:255",
            'dni' => "required|string|max:255",
        ]);

        Model_DIRECTOR::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
        ]);

        return redirect()->route('catalogoDirectores')->with('success', 'Director añadido correctamente.');
    }


    public function formularioElenco()
    {
        return view('formularioElenco');
    }

    public function guardarElenco(Request $request)
    {
        $request->validate([
            'nombre' => "required|string|max:255",
            'apellidos' => "required|string|max:255",
            'dni' => "required|string|max:255",
        ]);

        Model_ELENCO::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('catalogoElenco')->with('success', 'Actor añadido correctamente.');
    }

    public function salir()
    {
        return redirect()->route('inicio'); //redirigimos a la vista de inicio//
    }






    public function testRelation() //para probar el hasOne y el belongsTo//
    {
        $pelicula = Modelo::with('isrc')->find(5); // Incluye la relación en el modelo

        if (!$pelicula) {
            return response()->json(['error' => 'Película no encontrada'], 404);
        }

        return response()->json($pelicula); // Devuelve solo la película con su relación
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Model_DIRECTOR;
use App\Models\Model_ELENCO;
use App\Models\Model_ISRC;
use Illuminate\Http\Request;
use App\Models\Modelo; // Importamos el modelo para interactuar con la BD llamada 'peliculas' //
use App\Models\User;

class Controlador extends Controller
{
    public function inicio()
    {
        session(['isAdmin' => false]); // Ponemos la variable de admin en false para evitar sesiones previas
        $isAdmin = session('isAdmin', false); // Comprobación de si está registrado como admin o no
        return view('inicio', compact('isAdmin'));
    }

    public function catalogo()
    {       // Cargar películas desde la base de datos
        $peliculas = Modelo::all(); // Carga todas las películas que haya en la bd//
        $isrc = Model_ISRC::all(); //carga todos los registro de la tabla isrc//
        return view('catalogo', compact('peliculas', 'isrc'));
    }

    public function catalogoDirectores()
    {
        $directores = Model_DIRECTOR::all();
        return view('catalogoDirectores', compact('directores'));
    }

    public function catalogoElenco()
    {
        $elenco = Model_ELENCO::all(); // Recupera los datos
        return view('catalogoElenco', compact('elenco')); // Envía los datos a la vista
    }

    public function formulario()
    {
        return view('formulario');
    }

    public function validar(Request $request) //funcion que valida los credenciales de acceso//
    {
        $request->validate([
            'usuario' => "required|min:2",
            'contraseña' => "required|min:2",
        ], [
            'usuario.min' => "El nombre de usuario debe tener mínimo 2 letras",
            'contraseña.min' => "La contraseña debe tener mínimo 2 caracteres",
        ]);
        //esta verificacion de credenciales actua con el fin de dejarnos agregar peliculas solo si introducimos los datos bien//
        //esta verificacion se hace respecto a la tabla users de la bd//

        $user = User::where('name', $request->usuario)->first();

        if ($user && $request->contraseña === $user->password) {
            session(['isAdmin' => true]);
            return redirect()->route('catalogo');
        }
        return redirect()->route('inicio')->withErrors('Credenciales de acceso incorrectas');
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
            'isrc' => "required|string|max:255",
            'director_id' => "string|max:255", //quitamos el required para el caso en el que se relaciones actores y no un director con la pelicula que se va a agregar//
        ]);

        // Crear una nueva película en la tabla peliculas//
        $pelicula = Modelo::create([
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'edad' => $request->edad,
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
        session()->forget('isAdmin'); //le decimos al programa que ya no es admin//
        return redirect()->route('inicio'); //y redirigimos a la vista de inicio//
    }

    public function logout()
    {
        session()->forget('isAdmin');
        return redirect()->route('catalogo');
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

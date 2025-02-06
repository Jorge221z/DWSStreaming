<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validamos los datos de entrada
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'required|min:2',
        ]);

        $credenciales = $request->only('name', 'password');

        // Verificar si el nombre existe en la base de datos
        if (!User::where('name', $credenciales['name'])->exists()) {
            return redirect()->route('inicio')->withErrors('El usuario no existe');
        } else { //si existe guarda la info en la variable '$users' para compararla luego//
            $user = User::where('name', $request->name)->first(); //no usamos firstOrFail() porque sería redundante//
        }


        // Intentar autenticar con las credenciales dadas//
        if ($user && Hash::check($request->password, $user->password)) { //compara la info de la tabla 'users' con los de la request//
            $user->tokens()->delete();
            $token = $user->createToken('auth_token')->plainTextToken;
            return redirect()->route('catalogo')->with('success', 'Acceso correcto')
            ->cookie(
                'sanctum_token',
                $token,
                null, // cookie de sesion
                '/',
                '127.0.0.1', // Dominio explícito(evita fallos)
                false, // Secure (false para HTTP)
                true   // HttpOnly
            );
        }

        // Si la contraseña es incorrecta
        return redirect()->route('inicio')->withErrors('Credenciales incorrectas');
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); // Eliminar tokens del usuario

        return redirect()
            ->route('inicio')
            ->with('success', 'Sesión cerrada con éxito')
            ->withoutCookie('sanctum_token'); // Eliminar la cookie
    }
}

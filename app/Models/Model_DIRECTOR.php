<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model_DIRECTOR extends Model
{
    protected $table = 'director';

    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
    ];

    public function peliculas()
    {
        return $this->hasMany(Modelo::class);
    }




    public $timestamps = false; //desactivamos los timestamps para evitar fallos a la hora de agregar una nueva pelicula//
}

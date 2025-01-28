<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table = 'peliculas'; //tabla de la bd en la que queremos agregar nuevos datos//

    protected $fillable = [ //campos a los que se puede acceder directamente con create() por ejemplo//
        'titulo',
        'director',
        'tipo',
        'edad',
        'isrc_id',
        'director_id',
    ];


    public function isrc() //funcion que relaciona una tabla(peliculas) con la otra (isrc)
    {   //relacion One-to-One//
        return $this->hasOne(Model_ISRC::class, 'peliculas_id', 'id');
    }

    public function director()
    {
        return $this->belongsTo(Model_DIRECTOR::class, 'director_id', 'id');
    }

    public function elenco()
    {
        return $this->belongsToMany(Model_ELENCO::class, 'elenco_peliculas', 'peliculas_id', 'elenco_id');
    }


    public $timestamps = false; //desactivamos los timestamps para evitar fallos a la hora de agregar una nueva pelicula//
}

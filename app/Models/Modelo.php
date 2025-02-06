<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cohensive\OEmbed\Facades\OEmbed;

class Modelo extends Model
{
    protected $table = 'peliculas'; //tabla de la bd en la que queremos agregar nuevos datos//

    protected $fillable = [ //campos a los que se puede acceder directamente con create() por ejemplo//
        'titulo',
        'director',
        'tipo',
        'edad',
        'trailer_url',
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
        return $this->belongsToMany(Model_ELENCO::class, 'elenco_peliculas', 'pelicula_id', 'elenco_id');
    }


    public function getVideoAttribute($value) //funcion que obtiene el video de la url(Accessor)//
    {
        $embed = OEmbed::get($this->trailer_url);

        if($embed) {
            return $embed->html(['width' => 330, 'height' => 185]);
        }
    }


    public $timestamps = false; //desactivamos los timestamps para evitar fallos a la hora de agregar una nueva pelicula//
}

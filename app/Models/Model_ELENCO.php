<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model_ELENCO extends Model
{
    protected $table = 'elenco';
    protected $fillable = ['nombre', 'apellidos', 'dni', 'tipo'];

    public function peliculas()
    {
        return $this->belongsToMany(Modelo::class, 'elenco_peliculas', 'elenco_id', 'peliculas_id');
    }

    public $timestamps = false;

}

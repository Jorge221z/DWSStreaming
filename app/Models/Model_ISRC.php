<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model_ISRC extends Model
{
    protected $table = 'isrc'; //tabla que maneja el modelo//

    protected $fillable = [ //campos que sobre los que se pueden ejecutar metodos CRUD//
        'isrc',
        'tipo',
        'peliculas_id'
    ];


    public function peliculas() //funcion que relaciona la tabla isrc con la de peliculas//
    {   //relacion One-to-One//
        return $this->belongsTo(Modelo::class, 'peliculas_id', 'id');
    }


    public $timestamps = false;//desactivamos las eventos temporales para evitar fallos de agregacion//
}

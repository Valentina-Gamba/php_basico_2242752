<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;

class Cliente extends Model
{
    protected $table = "customer";
    protected $primaryKey = "CustomerId";
    public $timestamps = false;

    //RELACION 1 A MUCHOS CON LA TAABLA COMPRA
    public function compras(){
        //hasmany: parametros
        //1. modelo a relacionar
        //2. FK del artista (papa) en los discos(hijo)
        return $this->hasMany('App\Compra', 'CustomerId');
    }
}

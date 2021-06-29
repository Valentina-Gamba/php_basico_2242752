<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "employee";
    protected $primaryKey = "EmployeeId";
    public $timestamps = false;

    //RELACION 1 A MUCHOS CON COMPRAS
    public function compras(){
            //hasmany: establece una relacion uno a muchos con una tabla intermedia
            //1. Modelo destino: tercer modelo
            //2. Modelo intermedio: segundo modelo
            //3. FK del modelo 1 en el modelo 2
            //4. FK del modelo 2 en el modelo 3
            //5. PK del modelo 1
            //6. PK del modelo 2
            return $this->hasManyThrough('App\Compra',
                                         'App\Cliente',
                                         'SupportRepId',
                                         'CustomerId',
                                         'EmployeeId',
                                         'CustomerId',);
    }

}

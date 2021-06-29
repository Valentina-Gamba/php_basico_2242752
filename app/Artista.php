<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = "artist";
    protected $primaryKey = "ArtistId";
    public $timestamps = false;

    //ESTABLECER RELACION UNO A MUCHOS ENTRE ARTISTA Y MUCHOS ALBUNES
    public function discos(){
        //hasmany: parametros
        //1. modelo a relacionar
        //2. FK del artista (papa) en los discos(hijo)
        return $this->hasMany('App\Disco', 'ArtistId');
    }

    //ESTABLECER LA RELACION DE UN ARTISTA A MUCHAS CANCIONES
    public function canciones(){
        //hasmany: establece una relacion uno a muchos con una tabla intermedia
        //1. Modelo destino: tercer modelo (cancion)
        //2. Modelo intermedio: segundo modelo (albun)
        //3. FK del modelo 1 en el modelo 2
        //4. FK del modelo 2 en el modelo 3
        //5. PK del modelo 1 (artista)
        //6. PK del modelo 2 (albun)
        return $this->hasManyThrough('App\Cancion',
                                     'App\Disco',
                                     'ArtistId',
                                     'AlbumId',
                                     'ArtistId',
                                     'AlbumId',);
    }

}

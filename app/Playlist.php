<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = "playlist";
    protected $primaryKey = "PlaylistId";
    public $timestamps = false;

    //RELACION MUCHOS A MUCHOS CON PLAYLIST CON CANCIONES
    public function canciones(){

        //belongsToMany (muchos a muchos con pivote)
        //PAAMETROS: 1. EL MODELO A RELACIONAR
        //2. Tabla pivote
        //3. LLAVE FORANEA EN LA TABLA PIVOTE RELAACIONADA A ESTE MODELO (PLAYLIST)
        //4.LLAVE FORANEA DE LA TABLA PIVOTE DEL MODELO CON EL QUE SE VA A RELACIONAR (TRACK)
        return $this->belongsToMany('App\Cancion',
                             'playlisttrack',
                             'PlaylistId',
                             'TrackId');

    }


}

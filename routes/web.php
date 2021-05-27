<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('variables' , function(){
    $mensaje = 20;
    //Funcion nativa de PHP: analisa el contenido de la variable
    //Variable: tipo de dato, datos
    var_dump($mensaje);
    echo "<hr />";
    $mensaje = "Hola 2242753";
    var_dump($mensaje);
} );

Route::get('arreglos' , function(){
    //Definir un arreglo en PHP
    //Tamaño: numero de elementos del arreglo
    //Tamaño del arreglo estudiantes es 3
    $estudiantes = [ "AN" => "Ana" ,
                     2 => "Valeria" ,
                     "JO" => "Jorge" ];
    echo "<pre>";
    print_r($estudiantes);
    echo "</pre>";
} );

Route::get ("paises", function(){
    $paises = [
        "Colombia" => [
            "capital" => "Bogota",
            "moneda" => "Peso",
            "poblacion" => 51
        ],
        "Peru"=> [
            "capital" => "Lima",
            "moneda" => "Sol",
            "poblacion" => 33.19
        ],
        "Paraguay" => [
            "capital" => "Asuncion",
            "moneda" => "Guarani",
            "poblacion" => 7
        ]
    ];

    //Mostrar la vista de paises
    //Llevando arreglo de paises
    return view('paises')->with("naciones", $paises);

});

Route::get('mostrar_formulario','MetabuscadorController@mostrar_formulario' );

Route::post('buscar_termino', 'MetabuscadorController@buscar_termino' );


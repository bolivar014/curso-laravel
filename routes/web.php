<?php

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

// // Rutas anonimas
// Route::get('/test', function () {
//     return 'Este es un mensaje de prueba';
// });

Route::get('/test', function () {
     return view('test');
});

    
// Rutas con array
Route::get('/array', function () {
    return [
        'saludo' => 'Este es un',
        'nombre' => 'mensaje de prueba'
    ];
});

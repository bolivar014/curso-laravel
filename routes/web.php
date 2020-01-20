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

Route::get('/', 'HomeController@index');

// // Rutas anonimas
// Route::get('/test', function () {
//     return 'Este es un mensaje de prueba';
// });

Route::get('/dashboard', 'DashboardController@index');

    
// Rutas con array
Route::get('/array', function () {
    return [
        'saludo' => 'Este es un',
        'nombre' => 'mensaje de prueba'
    ];
});

Route::resource('/expense_reports', 'ExpenseReportController');

Route::get('/expense_reports/{id}/confirmDelete', 'ExpenseReportController@confirmDelete');

Route::get('/expense_reports/{expense_report}/expenses/create','ExpenseController@create');

Route::post('/expense_reports/{expense_report}/expenses','ExpenseController@store');

Route::get('/expense_reports/{id}/confirmSendEmail', 'ExpenseReportController@confirmSendEmail');

Route::post('/expense_reports/{id}/SendEmail', 'ExpenseReportController@SendEmail');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

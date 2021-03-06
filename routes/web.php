<?php

use App\Http\Controllers\CandidatoController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

/*
* 
* Rutas de Vacantes 
* 
*/

// Protejer ruta ante autenticación y verificación del usuario 
// Rutas protegidas
Route::group(['middleware' => ['auth', 'verified']], function(){
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes', 'VacanteController@store')->name('vacantes.store');
    
    // Skills
    Route::get('/skills', 'SkillController@index')->name('skill.index');
    
    // Subir imagen
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');

    // Notificaciones
    Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones');
});

// Enviar datos de postulante a una vacante
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store');

// Rutas publicas
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');

/*
*   ------------------
*/
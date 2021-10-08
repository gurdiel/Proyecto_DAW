<?php
use App\User;
use App\Clase;
use App\Docente;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/users/vista', 'AdminUsersController@vista')->name('users.vista');

Route::get('admin/users/administrador','AdminUsersController@administrador')->name('users.administrador');

Route::resource('/admin/escolares','AdminEscolaresController');

Route::resource('/admin/progenitores','AdminProgenitoresController');

Route::resource('/admin/items','AdminItemsController');

Route::resource('/admin/docentes','AdminDocentesController');//solo usamos el show

Route::resource('/admin/mensajes', 'AdminMensajesController');

Route::resource('/admin/clases', 'AdminClasesController');

Route::get('admin/mensajes/create/{id}','AdminMensajesController@create')->name('mensajes.create');//Le pasamos un ID por eso lo creamos aquí.

Route::resource('admin/users','AdminUsersController');

Route::get('admin/escolares/create/{aulaid}', 'AdminEscolaresController@createConAula')->name('escolares.create');

/* Ahora lo que hacemos es en cada rol redireccionar a su controlador y no en el controlador general para evitar duplicidad.

Route::get('register/docente','AdminUsersController@registerDocente')->name('register.docente');
Route::get('register/progenitor','AdminUsersController@registerProgenitor')->name('register.Progenitor');
Route::get('register/escolar','AdminUsersController@registerEscolar')->name('register.Escolar');
Route::get('register/administrador','AdminUsersController@registerAdministrador')->name('register.Administrador');

*/

/*
Código de pruebas 

Route::get("/user/4/docente", function(){

    $nombre = User::all();
    foreach($nombre as $n)
        $nombres[]= $n->docente;

    return $nombres;
    
    $array = Docente::find(4)->clase;


    return $array;
});
*/
